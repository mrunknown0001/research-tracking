<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\GeneralController;

use App\AuditTrail;
use App\College;

class AdminController extends Controller
{
    // method use to go to admin dashboard
	public function dashboard()
	{
		$logs = AuditTrail::orderBy('created_at', 'desc')->paginate(10);

		return view('admin.dashboard', ['logs' => $logs]);
	}


	// method use to show incoming research page
	public function incomingResearch()
	{
		return view('admin.research-incoming');
	}


	// method use to show outgoing research
	public function outgoingResearch()
	{
		return view('admin.research-outgoing');
	}


	// method use to go to forms
	public function forms()
	{
		return view('admin.forms');
	}


	// method use to go to research
	public function research()
	{
		// get all colleges
		$colleges = College::get();

		return view('admin.research', ['colleges' => $colleges]);
	}


	public function logout()
	{
		$action = 'Logout';
		GeneralController::log($action);

		return redirect()->route('logout');
	}
}
