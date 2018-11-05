<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\User;
use App\Form;

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
        return view('drc.research-incoming');
    }

    // method use to view forms
    public function forms()
    {
    	$forms = Form::get();

    	return view('drc.forms', ['forms' => $forms]);
    }


    // method use to logout of fr
	public function logout()
	{
		$action = 'Logout';
		GeneralController::log($action);

		return redirect()->route('logout');
	}
}
