<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Http\Controllers\GeneralController;

use App\User;
use App\Form;
use App\Research;

class DrcController extends Controller
{
    // method use to go to dashboard of drc
    public function dashboard()
    {
    	return view('drc.dashboard');
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

        return redirect()->route('drc.outgoing.research')->with('success', 'Research Received');

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


    // method use to logout of fr
	public function logout()
	{
		$action = 'Logout';
		GeneralController::log($action);

		return redirect()->route('logout');
	}
}
