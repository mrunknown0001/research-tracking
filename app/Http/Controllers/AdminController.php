<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\GeneralController;

class AdminController extends Controller
{
    // method use to go to admin dashboard
	public function dashboard()
	{
		return view('admin.dashboard');
	}


	public function logout()
	{
		$action = 'Logout';
		GeneralController::log($action);

		return redirect()->route('logout');
	}
}
