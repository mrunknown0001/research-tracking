<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\GeneralController;

class LoginController extends Controller
{
    // method use to show login
    public function login()
    {
        if(Auth::check()) {
            return GeneralController::auth_check();
        }

        return view('login');
    }

    // method use to login users
    public function postLogin(Request $request)
    {
        if(Auth::check()) {
            return GeneralController::auth_check();
        }
        
    	$request->validate([
    		'id_number' => 'required',
    		'password' => 'required'
    	]);

    	$id_number = $request['id_number'];
    	$password = $request['password'];

    	// attempt to login
    	// redirect intedned or to user type dashboard
    	if(Auth::attempt(['id_number' => $id_number, 'password' => $password])) {
    		// redirect to specific user type dashboard
    		// add activity log for audit trail
			$action = 'Login';
			GeneralController::log($action);

			// check if user is agreed with terms and condition
			if(Auth::user()->agreed == 0) {
				return redirect()->route('privacy.statement.agree');
			}

			// check if user changes its default password
			if(Auth::user()->password_changed == 0) {
				return redirect()->route('change.default.password');
			}


    		return GeneralController::auth_check();
    	}

    	return redirect()->back()->with('error', 'Invalid Username or Password!');
    }


    // method use to logout user
    public function logout()
    {

		Auth::logout();

    	return redirect()->route('login');
    }
}
