<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DrcController extends Controller
{
    // method use to go to dashboard of drc
    public function dashboard()
    {
    	return view('drc.dashboard');
    }


    // method use to logout of fr
	public function logout()
	{
		$action = 'Logout';
		GeneralController::log($action);

		return redirect()->route('logout');
	}
}
