<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollegeClerkController extends Controller
{
    // method use to go to dashboard of cc
    public function dashboard()
    {
    	return view('cc.dashboard');
    }


    // method use to logout of fr
	public function logout()
	{
		$action = 'Logout';
		GeneralController::log($action);

		return redirect()->route('logout');
	}
}
