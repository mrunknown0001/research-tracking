<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Auth;
use App\Http\Controllers\GeneralController;
use DB;

use App\User;
use App\Form;
use App\Research;
use App\ResearchCoauthor;
use App\FormRequest;
use App\ResearchIncentive;

class FacultyResearcherController extends Controller
{
    // method use to access profile
    public function profile()
    {
        return view('fr.profile');
    }


    // method use to change password
    public function changePassword()
    {
        return view('fr.password-change');
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
            return redirect()->route('fr.change.password')->with('error', 'Incorrect Password!');
        }

        // if true, change password
        Auth::user()->password = bcrypt($password);

        if(Auth::user()->save()) {
            // add to activitily
            $action = 'Changed Password';
            GeneralController::log($action);

            return redirect()->route('fr.change.password')->with('success', 'Password Changed!');
        }

        return redirect()->route('fr.change.password')->with('error', 'Error Changing Password!');
    }

    // method use to go to dashboard of fr
    public function dashboard()
    {
        $researchers = User::where('active', 1)
                            ->where('id', '!=', Auth::user()->id)
                            ->where('user_type', 8)
                            ->orderBy('lastname', 'asc')
                            ->get();

        // get all researches involved by
        $researches = Research::where('author_id', Auth::user()->id)
                            ->orderBy('created_at', 'desc')
                            ->get();

        $co_researches = ResearchCoauthor::where('co_author_id', Auth::user()->id)
                            ->orderBy('created_at', 'desc')
                            ->get();

    	return view('fr.dashboard', ['researchers' => $researchers, 'researches' => $researches, 'co_researches' => $co_researches]);
    }


    // method use to submit research 
    public function postSubmitResearch(Request $request)
    {
        // return $request;

        $request->validate([
            'title' => 'required',
            'files.*' => 'required|file|mimes:pdf,doc,docx|max:20000'
        ]);

        $title = $request['title'];
        $co_authors = $request['co_authors'];


        $files = $request['files'];

        // check if files count is greater than 7
        if(count($files) > 7) {
            return redirect()->back()->with('error', 'File Upload is not more than 7 files');
        }


        $research_file = null;
        $research_file_count = 0;
        $research_filename = '';

        foreach($files as $file) {

            // determine the research file
            $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            if($ext == 'doc' || $ext == 'docx') {
                $research_filename = $file->getClientOriginalName();
                $research_file = 1;
                $research_file_count++;
            }
        }

        // check if there is more than 1 research file
        if($research_file_count > 1) {
            return redirect()->back()->with('error', 'More than 1 research document found.');
        }

        // check if the research file is found
        if($research_file == null) {
            return redirect()->back()->with('error', 'Research File Not Found. It must be in .doc or .docx file format');
        }

        // generate unique tracking number
        $tracking_number = GeneralController::generate_tracking_number();

        $researcher = Auth::user();

        // save research here
        $research = new Research();
        $research->author_id = Auth::user()->id;
        $research->title = $title;
        $research->tracking_number = $tracking_number;
        $research->research_filename = $research_filename;
        $research->college_id = $researcher->frAssignment->college->id;
        $research->department_id = $researcher->frAssignment->department->id;
        $research->time_posted = now();
        $research->save();

        $incentive = new ResearchIncentive();
        $incentive->research_id = $research->id;
        $incentive->save();


        $filenames = [];

        foreach($files as $file) {

            // posible rename and/or upload file to folder
            // move to entry folder
            $renamed = Auth::user()->id_number . '.' . time().'.'.$file->getClientOriginalExtension();

            /*
            talk the select file and move it public directory and make avatars
            folder if doesn't exsit then give it that unique name.
            */
            $file->move(public_path('uploads/files'), $renamed);

            $filenames[] = [
                'original_filename' => $file->getClientOriginalName(),
                'unique_filename' => $renamed
            ];

        }


        // save filenames in database for download
        $uploaded_files = [];

        foreach($filenames as $f) {
            $uploaded_files[] = [
                'research_id' => $research->id,
                'original_filename' => $f['original_filename'],
                'unique_filename' => $f['unique_filename']
            ];
        }

        DB::table('research_uploaded_files')->insert($uploaded_files);

        // save co author
        // this can be multiple
        if($co_authors != null) {
          foreach($co_authors as $c) {
            $co = new ResearchCoauthor();
            $co->research_id = $research->id;
            $co->co_author_id = $c;
            $co->save();
          }
        }


        // create notification 
        // $user_id = ID of user to whom for the notification is
        // $message = 'Notification Message';
        // $url = name of the url
        // GeneralController::create_notification($user_id, $url, $message);
        // notificatio for the current drc of the department
        $drc_id = Auth::user()->frAssignment->department->assigned_drc->drc->id;
        $url = 'drc.incoming.research';
        $message = 'Research Submitted by ' . Auth::user()->firstname . ' ' . Auth::user()->lastname;
        GeneralController::create_notification($drc_id, $url, $message);


        $action = 'Submitted Research';
        GeneralController::log($action);

        return redirect()->back()->with('success', 'Research Submitted!');

    }


    // method use to update research documents
    public function postUpdateResearch(Request $request)
    {
        // return $request;
        $id = $request['research_id'];

        $researcher = Auth::user();

        $research = Research::findorfail($id);

        if($research->author_id != $researcher->id) {
            return redirect()->back()->with('error', 'Please Try Again Later');
        }

        // check the uploaded files to change
        foreach($research->files as $file) {
            // change the files
            if(isset($request['file'.$file->id])) {
                $f = $request['file'.$file->id];

                $f->move(public_path('uploads/files'), $file->unique_filename);
            }
        }

        $action = 'Updated Research Documents';
        GeneralController::log($action);

        return redirect()->back()->with('success', 'Research Documents Updated!');
    }


    // method use to view research details
    public function researchDetails($id = null)
    {
        $research = Research::findorfail($id);

        $fr = Auth::user();

        if($research->author_id != $fr->id) {
            return redirect()->back()->with('error', 'Please Try Again Later!');
        }

        return view('fr.research-details', ['research' => $research]);


    }


    // method use to update research
    public function researchUpdate($id = null)
    {
        $research = Research::findorfail($id);

        $fr = Auth::user();

        if($research->author_id != $fr->id) {
            return redirect()->back()->with('error', 'Please Try Again Later!');
        }

        $researchers = User::where('active', 1)
                            ->where('id', '!=', Auth::user()->id)
                            ->where('user_type', 8)
                            ->orderBy('lastname', 'asc')
                            ->get();

        // redirect to update form
        return view('fr.research-update', ['research' => $research, 'researchers' => $researchers]);

    }


    // method use to send progress report
    public function sendProgressReport($id = null)
    {
        return view('fr.report-send-progress-report', ['id' => $id]);
    }


    // method use to save progress report
    public function postSendProgressReport(Request $request)
    {
        return $request;
        
        $request->validate([
            'files.*' => 'required|file|mimes:pdf,doc,docx|max:20000'
        ]);
    }



    // method use to access incoming research
    public function incomingResearch()
    {
        $researcher = Auth::user();

        $incoming3 = Research::where('author_id', $researcher->id)
                            ->where('step_number', 3)
                            ->where('step_3_received', 0)
                            ->get();

        $incoming6 = Research::where('author_id', $researcher->id)
                            ->where('step_number', 6)
                            ->where('step_6_received', 0)
                            ->get();

        $incoming9 = Research::where('author_id', $researcher->id)
                            ->where('step_number', 9)
                            ->where('step_9_received', 0)
                            ->get();

        $incoming11 = Research::where('author_id', $researcher->id)
                            ->where('step_number', 11)
                            ->where('step_11_received', 0)
                            ->get();

        $incoming15 = Research::where('author_id', $researcher->id)
                            ->where('step_number', 15)
                            ->where('step_15_received', 0)
                            ->get();

        return view('fr.research-incoming', ['incoming3' => $incoming3, 'incoming6' => $incoming6, 'incoming9' => $incoming9, 'incoming11' => $incoming11, 'incoming15' => $incoming15]);
    }


    // method use to receive document
    public function postReceiveIncomingResearch(Request $request)
    {
        $research_id = $request['research_id'];

        $research = Research::findorfail($research_id); 

        if($research->author_id != Auth::user()->id) {
            return redirect()->back()->with('error', 'Please Try Again Later!');
        }

        if($research->step_number == 3) {
            $research->step_3_received = 1;
            $research->step_3_date_received = now();
        }
        else if($research->step_number == 6) {
            $research->step_6_received = 1;
            $research->step_6_date_received = now();
        }
        else if($research->step_number == 9) {
            $research->step_9_received = 1;
            $research->step_9_date_received = now();
        }
        else if($research->step_number == 11) {
            $research->step_11_received = 1;
            $research->step_11_date_received = now();
        }
        else if($research->step_number == 15) {
            $research->step_15_received = 1;
            $research->step_15_date_received = now();
        }
        else {
            return redirect()->back()->with('error', 'Please Try Again Later!');
        }

        $research->save();



        // create notification for the based on the user type


        $action = 'Received Research';
        GeneralController::log($action);

        return redirect()->route('fr.incoming.research')->with('success', 'Research Received');
    }


    // method use to access outgoing research
    public function outgoingResearch()
    {
        $researcher = Auth::user(); 

        $outgoing3 = Research::where('author_id' , $researcher->id)
                        ->where('step_number', 3)
                        ->where('step_3_received', 1)
                        ->get();

        $outgoing6 = Research::where('author_id' , $researcher->id)
                        ->where('step_number', 6)
                        ->where('step_6_received', 1)
                        ->get();

        $outgoing9 = Research::where('author_id' , $researcher->id)
                        ->where('step_number', 9)
                        ->where('step_9_received', 1)
                        ->get();

        $outgoing11 = Research::where('author_id' , $researcher->id)
                        ->where('step_number', 11)
                        ->where('step_11_received', 1)
                        ->get();

        return view('fr.research-outgoing', ['outgoing3' => $outgoing3, 'outgoing6' => $outgoing6, 'outgoing9' => $outgoing9, 'outgoing11' => $outgoing11]);
    }


    // method use to proceed research document to next step
    public function postProceedOutgoingResearch(Request $request)
    {
        $id = $request['research_id'];

        $research = Research::findorfail($id);

        $researcher = Auth::user();

        if($research->author_id != $researcher->id) {
            return redirect()->back()->with('error', 'Please Try Again Later');
        }

        $action = 'Research Proceeded';

        // proceed to next step of the process
        if($research->step_number == 3) {
            $research->step_number = 4;
            $research->step_3_proceeded = 1;
            $research->step_3_date_proceeded = now();

            $action = 'Research Proceeded from Step 3 to 4';

            // get the id of the office clerk in step 4
            $id = 2;
            $url = 'oc.incoming.research';
            $message = 'Researcher Proceeded the Research to Step 4';
        }
        else if($research->step_number == 6) {
            $research->step_number = 7;
            $research->step_6_proceeded = 1;
            $research->step_6_date_proceeded = now();

            $action = 'Research Proceeded from Step 6 to 7';

            $id = 3;
            $url = 'oc.incoming.research';
            $message = 'Researcher Proceeded the Research to Step 7';
        }
        else if($research->step_number == 9) {
            $research->step_number = 10;
            $research->step_9_proceeded = 1;
            $research->step_9_date_proceeded = now();

            $id = 4;
            $url = 'oc.incoming.research';
            $message = 'Researcher Proceeded the Research to Step 10';

            $action = 'Research Proceeded from Step 9 to 10';
        }
        else if($research->step_number == 11) {
            $research->step_number = 12;
            $research->step_11_proceeded = 1;
            $research->step_11_date_proceeded = now();

            $id = 1;
            $url = 'admin.incoming.research';
            $message = 'Researcher Proceeded the Research to Step 12';

            $action = 'Research Proceeded from Step 11 to 12';
        }
        else {
            return redirect()->back()->with('error', 'Please Try Again Later');
        }

        // save 
        $research->save();


        // add to notification
        GeneralController::create_notification($id, $url, $message);


        // add to activity logs
        
        GeneralController::log($action);

        // return to outgoing research
        return redirect()->route('fr.outgoing.research')->with('success', 'Research Proceeded');
    }


    // method use to track document research
    public function trackResearchDocument($id = null)
    {
        $researcher = Auth::user();

        $research = Research::findorfail($id);

        if($research->author_id != $researcher->id) {
            return redirect()->back()->with('error', 'Please Try Again');
        }

        return view('fr.research-tracking', ['research' => $research]);
    }


    // method use to go to forms
    public function forms()
    {
    	$forms = Form::get();

    	return view('fr.forms', ['forms' => $forms]);
    }


    // method use to upload form request
    public function postRequestForm(Request $request)
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
        $req->researcher_id = Auth::user()->id;
        $req->form_id = $form->id;
        $req->comment = $comment;
        $req->original_filename = $file->getClientOriginalName();
        $req->unique_filename = $renamed;
        $req->save();


        // add to activity log
        $action = 'Requested Form';
        GeneralController::log($action);

        // return redirect back
        return redirect()->back()->with('success', 'Form Request Submitted');
    }


    // method use to access send form
    public function sendRequestForm()
    {
        $forms = Form::get();

        return view('fr.send-request-form', ['forms' => $forms]);
    }

    // method use to logout of fr
	public function logout()
	{
		$action = 'Logout';
		GeneralController::log($action);

		return redirect()->route('logout');
	}
}
