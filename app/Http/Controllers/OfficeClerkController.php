<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    	return view('oc.research-incoming');
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
