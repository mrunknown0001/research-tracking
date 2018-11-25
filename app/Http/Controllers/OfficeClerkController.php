<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Research;

class OfficeClerkController extends Controller
{
    // method use to go to dashboard of oc
    public function dashboard()
    {
    	return view('oc.dashboard');
    }


    // method to access incoming research
    public function incomingResearch()
    {
        $incoming4 = Research::where('step_number', 4)
                            ->where('step_4_received', 0)
                            ->get();

        $incoming7 = Research::where('step_number', 7)
                            ->where('step_7_received', 0)
                            ->get();

        $incoming10 = Research::where('step_number', 10)
                            ->where('step_10_received', 0)
                            ->get();

        $incoming13 = Research::where('step_number', 13)
                            ->where('step_13_received', 0)
                            ->get();

    	return view('oc.research-incoming', ['incoming4' => $incoming4, 'incoming7' => $incoming7, 'incoming10' => $incoming10, 'incoming13' => $incoming13]);
    }


    // method use to receive incoming reports
    public function postReceiveIncomingResearch(Request $request)
    {
        $id = $request['research_id'];

        $research = Research::findorfail($id);

        // check the step number if valid for office clerk
        $action = 'Received Research';

        if($research->step_number == 4) {
            $research->step_4_received = 1;
            $research->step_4_date_received = now();

            $action = 'Received Research on Step 4';
        }
        else if($research->step_number == 7) {
            $research->step_7_received = 1;
            $research->step_7_date_received = now();

            $action = 'Received Research on Step 7';
        }
        else if($research->step_number == 10) {
            $research->step_10_received = 1;
            $research->step_10_date_received = now();

            $action = 'Received Research on Step 10';
        }
        else if($research->step_number == 13) {
            $research->step_13_received = 1;
            $research->step_13_date_received = now();

            $action = 'Received Research on Step 13';
        }
        else {
            return redirect()->back()->with('error', 'Please Try Again Later');
        }

        $research->save();

        // add to activity log/ audit trail
        
        GeneralController::log($action);

        // return redirect to outgoing research
        return redirect()->route('oc.outgoing.research')->with('success', 'Research Received');

    }


    // method to access outgoing research
    public function outgoingResearch()
    {
        $outgoing4 = Research::where('step_number', 4)
                        ->where('step_4_received', 1)
                        ->get();

        $outgoing7 = Research::where('step_number', 7)
                        ->where('step_7_received', 1)
                        ->get();

        $outgoing10 = Research::where('step_number', 10)
                        ->where('step_10_received', 1)
                        ->get();

        $outgoing13 = Research::where('step_number', 13)
                        ->where('step_13_received', 1)
                        ->get();

    	return view('oc.research-outgoing', ['outgoing4' => $outgoing4, 'outgoing7' => $outgoing7, 'outgoing10' => $outgoing10, 'outgoing13' => $outgoing13]);
    }


    // method use to proceed to step 5 from step 4
    public function postProceedStepFive(Request $request)
    {
        $id = $request['research_id'];
        $comment = $request['comment'];
        
        $research = Research::findorfail($id);

        $research->step_number = 5;
        $research->step_4_comment = $comment;
        $research->step_4_proceeded = 1;
        $research->step_4_date_proceeded = now();


        // create notificaiton for college department drc
        $n_id = $research->author->frAssignment->department->assigned_drc->drc->id;;
        $url = 'drc.incoming.research';
        $message = 'CREC Proceeded to Step 5';


        GeneralController::create_notification($n_id, $url, $message);

        // save research
        $research->save();
        $action = 'Proceeded Research From Step 4 to 5';
        GeneralController::log($action);

        // return redirect back
        return redirect()->back()->with('success', 'Research Proceeded');


    }


    // method use to proceed to step 8 from step 7
    public function postProceedStepEight(Request $request)
    {
        $id = $request['research_id'];
        $comment = $request['comment'];

        $research = Research::findorfail($id);
        $research = Research::findorfail($id);

        $research->step_number = 8;
        $research->step_7_comment = $comment;
        $research->step_7_proceeded = 1;
        $research->step_7_date_proceeded = now();

        // save research
        $research->save();
        $action = 'Proceeded Research From Step 7 to 8';
        GeneralController::log($action);

        // return redirect back
        return redirect()->back()->with('success', 'Research Proceeded');
    }


    // method use to proceed to step eleven
    public function postProceedStepEleven(Request $request)
    {
        $id = $request['research_id'];
        $comment = $request['comment'];

        $research = Research::findorfail($id);

        // proceed 
        $research->step_number = 11;
        $research->step_10_comment = $comment;
        $research->step_10_proceeded = 1;
        $research->step_10_date_proceeded = now();
        $research->save();

        // add to activity log / audit trail
        $action = 'Research Proceeded to Step 11';
        GeneralController::log($action);

        // return redirect back
        return redirect()->back()->with('success', 'Research Proceeded');
    }


    // method use to procced to step 14
    public function postProceedStepFourteen(Request $request)
    {
        $id = $request['research_id'];
        $comment = $request['comment'];

        $research = Research::findorfail($id);

        // proceed 
        $research->step_number = 14;
        $research->step_13_comment = $comment;
        $research->step_13_proceeded = 1;
        $research->step_13_date_proceeded = now();
        $research->save();

        // add to activity log / audit trail
        $action = 'Research Proceeded to Step 13';
        GeneralController::log($action);

        // return redirect back
        return redirect()->back()->with('success', 'Research Proceeded');
    }


    // method use to logout of fr
	public function logout()
	{
		$action = 'Logout';
		GeneralController::log($action);

		return redirect()->route('logout');
	}
}
