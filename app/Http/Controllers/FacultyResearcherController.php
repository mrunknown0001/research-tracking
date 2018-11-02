<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacultyResearcherController extends Controller
{
    // method use to go to dashboard of fr
    public function dashboard()
    {
    	return view('fr.dashboard');
    }


    // method use to logout of fr
	public function logout()
	{
		$action = 'Logout';
		GeneralController::log($action);

		return redirect()->route('logout');
	}
}
