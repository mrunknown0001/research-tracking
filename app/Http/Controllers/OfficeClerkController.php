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


    // method use to logout of fr
	public function logout()
	{
		$action = 'Logout';
		GeneralController::log($action);

		return redirect()->route('logout');
	}
}
