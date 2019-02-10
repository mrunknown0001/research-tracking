<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Http\Controllers\GeneralController;
use Zipper;

use App\User;
use App\Form;
use App\Research;
use App\FormRequest;

class DrcController extends Controller
{
    // method use to go to dashboard of drc
    public function dashboard()
    {
        // get all researches involved by
        $researches = Research::where('department_id', Auth::user()->drcAssignment->department->id)
                            ->orderBy('created_at', 'desc')
                            ->get();

    	return view('drc.dashboard', ['researches' => 
            $researches]);
    }


    // method use to access profile of drc
    public function profile()
    {
        return view('drc.profile');
    }



    // method use to update profile
    public function updateProfile()
    {
        return view('drc.profile-update');
    }


    // method use to update profile
    public function postUpdateProfile(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'middlename' => 'nullable',
            'lastname' => 'required',
            'id_number' => 'required',
            'contact_number' => 'required',
            'email' => 'required|email',
        ]);

        $firstname = $request['firstname'];
        $middlename = $request['middlename'];
        $lastname = $request['lastname'];
        $id_number = $request['id_number'];
        $contact_number = $request['contact_number'];
        $email = $request['email'];

        $user = Auth::user();

        $user->firstname = $firstname;
        $user->middlename = $middlename;
        $user->lastname = $lastname;
        $user->id_number = $id_number;
        $user->contact_number = $contact_number;
        $user->email = $email;
        $user->save();

        // add to activity log
        $action = 'Updated Profile';
        GeneralController::log($action);

        return redirect()->back()->with('success', $action);
    }


    // method use to change password
    public function changePassword()
    {
        return view('drc.password-change');
    }


    // method use to save new password
    public function postChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:6'
        ]);

        $current_password = $request['current_password'];
        $password = $request['password'];

        // validate current password if matched
        if(!password_verify($current_password, Auth::user()->password)) {
            return redirect()->route('drc.change.password')->with('error', 'Incorrect Password!');
        }

        // if true, change password
        Auth::user()->password = bcrypt($password);

        if(Auth::user()->save()) {
            // add to activitily
            $action = 'Changed Password';
            GeneralController::log($action);

            return redirect()->route('drc.change.password')->with('success', 'Password Changed!');
        }

        return redirect()->route('drc.change.password')->with('error', 'Error Changing Password!');
    }


    // method use to access incomingResearch
    public function incomingResearch()
    {
        $drc = Auth::user();

        $college_id = $drc->drcAssignment->college->id;
        $department_id = $drc->drcAssignment->department->id;

        // get all the researches that has an incoming status in drc
        $incoming2 = Research::where('college_id', $college_id)
                            ->where('department_id', $department_id)
                            ->where('step_number', 2)
                            ->where('step_2_received', 0)
                            ->get();

        $incoming5 = Research::where('college_id', $college_id)
                            ->where('department_id', $department_id)
                            ->where('step_number', 5)
                            ->where('step_5_received', 0)
                            ->get();

        return view('drc.research-incoming', ['incoming2' => $incoming2, 'incoming5' => $incoming5]);
    }


    // method use to receive research 
    public function postReceiveIncomingResearch(Request $request)
    {
        $research_id = $request['research_id'];

        $research = Research::findorfail($research_id);


        if($research->step_number == 2) {
            $research->step_2_received = 1;
            $research->step_2_date_received = now();
        }
        else if($research->step_number == 5) {
            $research->step_5_received = 1;
            $research->step_5_date_received = now();
        }
        else {
            return redirect()->back()->with('error', 'Please Try Again Later!');
        }

        $research->save();

        // add activity log
        $action = 'Received Research';
        GeneralController::log($action);

        return redirect()->route('drc.incoming.research')->with('success', 'Research Received');

    }


    // method use to access outgoingResearch
    public function outgoingResearch()
    {
        $drc = Auth::user();

        $college_id = $drc->drcAssignment->college->id;
        $department_id = $drc->drcAssignment->department->id;

        $outgoing2 = Research::where('college_id', $college_id)
                            ->where('department_id', $department_id)
                            ->where('step_number', 2)
                            ->where('step_2_received', 1)
                            ->get();

        $outgoing5 = Research::where('college_id', $college_id)
                            ->where('department_id', $department_id)
                            ->where('step_number', 5)
                            ->where('step_5_received', 1)
                            ->get();

        return view('drc.research-outgoing', ['outgoing2' => $outgoing2, 'outgoing5' => $outgoing5]);
    }


    // method use to proceed to step three
    public function postProceedStepThree(Request $request)
    {
        $id = $request['research_id'];

        $comment = $request['comment'];

        $research = Research::findorfail($id);


        // add comment, move step_number to 3, step 2 proceeded, step 2 date proceeded
        $research->step_number = 3;
        $research->step_2_comment = $comment;
        $research->step_2_proceeded = 1;
        $research->step_2_date_proceeded = now();

        // save research
        $research->save();


        $fr_id = $research->author_id;
        $url = 'fr.incoming.research';
        $message = 'DRC Proceeded Your Research';
        GeneralController::create_notification($fr_id, $url, $message);


        // add audit trail
        $action = 'Proceeded Research from Step 2 to 3';
        GeneralController::log($action);

        // return redirect back
        return redirect()->back()->with('success', 'Research Proceeded');
    }


    // method use to proceed to step five
    public function postProceedStepSix(Request $request)
    {
        $request->validate([
            'grade' => 'required|numeric|max:100'
        ]);

        $id = $request['research_id'];
        $grade = $request['grade'];
        $comment = $request['comment'];

        $research = Research::findorfail($id);

        // proceed
        $research->step_number = 6;
        $research->step_5_comment = $comment;
        $research->colloquium_grade = $grade;
        $research->step_5_proceeded = 1;
        $research->step_5_date_proceeded = now();


        $fr_id = $research->author_id;
        $url = 'fr.incoming.research';
        $message = 'DRC Proceeded to Step 6';

        GeneralController::create_notification($fr_id, $url, $message);

        // save
        $research->save();

        $action = 'Proceeded Research from Step 5 to 6';
        GeneralController::log($action);

        // return redirect back
        return redirect()->back()->with('success', 'Research Proceeded');
    }


    // method use to track document research
    public function trackResearch($id)
    {
        $research = Research::findorfail($id);

        return view('drc.research-tracking', ['research' => $research]);
    }


    // method use to view research details
    public function researchDetails($id)
    {
        $research = Research::findorfail($id);

        return view('drc.research-details', ['research' => $research]);
    }


    // method use to view forms
    public function forms()
    {
    	$forms = Form::get();

    	return view('drc.forms', ['forms' => $forms]);
    }


    // method use to access sendRequestForm
    public function sendRequestForm()
    {
        $forms = Form::get();

        return view('drc.send-request-form', ['forms' => $forms]);
    }

    // method use to send form request
    public function postSendRequestForm(Request $request)
    {
        $request->validate([
            'form' => 'required',
            'file' => 'required|file|mimes:pdf'
        ]);

        $id = $request['form'];
        $file = $request['file'];
        $comment = $request['comment'];

        $form = Form::findorfail($id);

        // generate file name
        $renamed = Auth::user()->id_number . '.' . time().'.'.$file->getClientOriginalExtension();

        // upload form request
        $file->move(public_path('/uploads/form_requests'), $renamed);

        // new form  request upload
        $req = new FormRequest();
        $req->drc_id = Auth::user()->id;
        $req->form_id = $form->id;
        $req->comment = $comment;
        $req->original_filename = $file->getClientOriginalName();
        $req->unique_filename = $renamed;
        $req->save();



        // add to activity log
        $action = 'Requested Form';
        GeneralController::log($action);
        
        $url = 'admin.dashboard';
        $message = 'DRC Form Request';
        // add notification
        GeneralController::create_notification($req->id, $url, $message);

        // return redirect back
        return redirect()->back()->with('success', 'Form Request Submitted');
    }


    // method use to logout of fr
	public function logout()
	{
		$action = 'Logout';
		GeneralController::log($action);

		return redirect()->route('logout');
	}
}
