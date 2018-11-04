<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\GeneralController;

use App\User;
use App\Form;

class FacultyResearcherController extends Controller
{
    // method use to go to dashboard of fr
    public function dashboard()
    {
    	return view('fr.dashboard');
    }


    // method use to go to forms
    public function forms()
    {
    	$forms = Form::get();

    	return view('fr.forms', ['forms' => $forms]);
    }


    // method use to logout of fr
	public function logout()
	{
		$action = 'Logout';
		GeneralController::log($action);

		return redirect()->route('logout');
	}
}
