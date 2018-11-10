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

    	return view('oc.research-incoming', ['incoming4' => $incoming4]);
    }


    // method to access outgoing research
    public function outgoingResearch()
    {
    	return view('oc.research-outgoing');
    }


    // method use to logout of fr
	public function logout()
	{
		$action = 'Logout';
		GeneralController::log($action);

		return redirect()->route('logout');
	}
}
