<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\CollegeDepartment;

class CollegeClerkController extends Controller
{
    // method use to go to dashboard of cc
    public function dashboard()
    {
    	$college_id = Auth::user()->collegeClerkAssignment->college->id;

    	$departments = CollegeDepartment::where('college_id', $college_id)->get();

    	return view('cc.dashboard', ['departments' => $departments]);
    }


    // method use to go to add account
    public function addAccount()
    {
    	return view('cc.account-add');
    }


    // method use to logout of fr
	public function logout()
	{
		$action = 'Logout';
		GeneralController::log($action);

		return redirect()->route('logout');
	}
}
