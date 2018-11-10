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

        if($research->step_number == 4) {
            $research->step_4_received = 1;
            $research->step_4_date_received = now();
        }
        else if($research->step_number == 7) {
            $research->step_7_received = 1;
            $research->step_7_date_received = now();
        }
        else if($research->step_number == 10) {
            $research->step_10_received = 1;
            $research->step_10_date_received = now();
        }
        else if($research->step_number == 13) {
            $research->step_13_received = 1;
            $research->step_13_date_received = now();
        }
        else {
            return redirect()->back()->with('error', 'Please Try Again Later');
        }

        $research->save();

        // add to activity log/ audit trail
        $action = 'Received Research';
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


    // method use to logout of fr
	public function logout()
	{
		$action = 'Logout';
		GeneralController::log($action);

		return redirect()->route('logout');
	}
}
