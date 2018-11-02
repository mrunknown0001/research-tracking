<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\GeneralController;

use App\AuditTrail;

class AdminController extends Controller
{
    // method use to go to admin dashboard
	public function dashboard()
	{
		$logs = AuditTrail::orderBy('created_at', 'desc')->paginate(10);

		return view('admin.dashboard', ['logs' => $logs]);
	}


	public function logout()
	{
		$action = 'Logout';
		GeneralController::log($action);

		return redirect()->route('logout');
	}
}
