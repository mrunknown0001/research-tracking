<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\GeneralController;

use App\AuditTrail;
use App\College;
use App\User;
use App\Form;
use App\Research;

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
		$incoming8 = Research::where('step_number', 8)
							->where('step_8_received', 0)
							->get();

		$incoming12 = Research::where('step_number', 12)
							->where('step_12_received', 0)
							->get();

		$incoming14 = Research::where('step_number', 14)
							->where('step_14_received', 0)
							->get();

		return view('admin.research-incoming', ['incoming8' => $incoming8, 'incoming12' => $incoming12, 'incoming14' => $incoming14]);
	}


	// method use to show outgoing research
	public function outgoingResearch()
	{
		return view('admin.research-outgoing');
	}


	// method use to go to forms
	public function forms()
	{
		$forms = Form::get();

		return view('admin.forms', ['forms' => $forms]);
	}


	// method use to go to research
	public function research()
	{
		// get all colleges
		$colleges = College::get();

		return view('admin.research', ['colleges' => $colleges]);
	}


	// method use to go to accounts
	public function accounts()
	{
		$accounts = User::where('active', 1)->orderBy('id_number', 'asc')->paginate(10);

		return view('admin.accounts', ['accounts' => $accounts]);
	}


	public function logout()
	{
		$action = 'Logout';
		GeneralController::log($action);

		return redirect()->route('logout');
	}



	// method use to download form
	public function downloadForm($filename)
	{
		$action = 'Form Download ' . $filename;
		GeneralController::log($action);

		return response()->download(public_path("uploads/fillable/{$filename}"));
	}
}
