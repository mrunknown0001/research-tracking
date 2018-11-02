<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\AuditTrail;

class GeneralController extends Controller
{
    // method to use to add in audit trail
    public static function log($action)
    {
    	$log = new AuditTrail();
    	$log->user_id = Auth::user()->id;
    	$log->transaction = $action;
    	$log->save();
    }


    // return to intended dashboard 
    public static function auth_check()
    {
    	if(Auth::user()->user_type == 1) {
			return redirect()->route('admin.dashboard');
		}
        else if(Auth::user()->user_type == 8) {
            return redirect()->route('fr.dashboard');
        }
    }


    // method use to agree with privacy statement
    public function privacyStatementAgree()
    {
    	// check if authenticated
    	// if not redirect to login
    	if(!Auth::check()) {
    		return redirect()->route('login');
    	}
        else {
            return $this->auth_check();
        }

    	// show privacy statement
    	return view('privacy-statement');
    }


    // method use to decline privacy statement
    public function declinedPrivacyStatement()
    {
		// add activity log for audit trail
		$action = 'Declined Privacy Statement';
		$this->log($action);

    	return redirect()->route('logout');
    }


    // method use to agree with privacy statement
    public function postAgreedPrivacyStatement(Request $request)
    {
    	// save to user record that agreed
    	Auth::user()->agreed = 1;
    	Auth::user()->save();

    	$action = 'Agreed with Privacy Statement';
    	GeneralController::log($action);

    	// redirect to change password
    	return redirect()->route('change.default.password');
    }


    // method use to change default password
    public function changeDefaultPassword()
    {
    	// check user if agreed in privacy statement
    	if(Auth::user()->agreed == 0) {
    		return redirect()->route('privacy.statement.agree');
    	}

        if(Auth::user()->password_changed == 1) {
            return $this->auth_check();
        }

    	// return to change password form
    	return view('change-default-password');

    }


    // method use to change default password
    public function postChangeDefaultPassword(Request $request)
    {
    	$request->validate([
    		'password' => 'required|min:6|max:32|confirmed'
    	]);

    	$password = $request['password'];

    	Auth::user()->password = bcrypt($password);
    	Auth::user()->password_changed = 1;
    	Auth::user()->save();

    	$action = 'Change Default Password';
    	GeneralController::log($action);

    	// return to its intended dashboard
    	return $this->auth_check();

    }
}
