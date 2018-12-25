<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Zipper;
use Illuminate\Filesystem\Filesystem;

use App\AuditTrail;
use App\Research;
use App\FormRequest;
use App\Notification;

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
        // check if user is agreed with terms and condition
        if(Auth::user()->agreed != 1) {
            return redirect()->route('privacy.statement.agree');
        }

        // check if user changes its default password
        if(Auth::user()->password_changed != 1) {
            return redirect()->route('change.default.password');
        }

    	if(Auth::user()->user_type == 1) {
			return redirect()->route('admin.dashboard');
		}
        else if(Auth::user()->user_type == 2 || Auth::user()->user_type == 3 || Auth::user()->user_type == 4 || Auth::user()->user_type == 5) {
            return redirect()->route('oc.incoming.research');
        }
        else if(Auth::user()->user_type == 6) {
            return redirect()->route('cc.dashboard');
        }
        else if(Auth::user()->user_type == 7) {
            return redirect()->route('drc.dashboard');
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

        if($password == 'password') {
            return redirect()->back()->with('error', 'Please Choose Another Password!');
        }

    	Auth::user()->password = bcrypt($password);
    	Auth::user()->password_changed = 1;
    	Auth::user()->save();

    	$action = 'Change Default Password';
    	GeneralController::log($action);

    	// return to its intended dashboard
    	return $this->auth_check();

    }


    // method use to view privacy statement
    public function viewPrivacyStatement()
    {
        return view('privacy-statement');
    }


    // static method use to generate tracking number
    // 94f1ebea-7fe
    public static function generate_tracking_number($length = 8, $slength = 3)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
        $string2 = '';
        for ($i = 0; $i < $slength; $i++) {
            $string2 .= $characters[rand(0, $charactersLength - 1)];
        }

        $tracking = $randomString . '-' . $string2;

       if(Research::where('tracking_number', $tracking)->exists()) {
            return self::generate_tracking_number();
        }

        return $tracking;
    }


    // method use to download all files in research in zip format
    public function downloadResearchZip($id = null)
    {
        if(!Auth::check()) {
            return redirect()->route('login')->with('error', 'Login First');
        }

        $research = Research::findorfail($id);

        $files = [];

        // get file then rename to its original file
        foreach($research->files as $file) {
            $files[] = [
                'filename' => '/public/uploads/tmp_zipped/'.$file->original_filename
            ];

            \File::copy(base_path('public/uploads/files/'.$file->unique_filename),base_path('public/uploads/tmp_files_copy/'.$file->original_filename));
        }
        
        // zip all rename files 
        $files = glob(public_path('/uploads/tmp_files_copy/*'));
        Zipper::make(public_path('/uploads/tmp_zipped/'.$research->title . '.zip'))->add($files)->close();


        // delete all renamed files
        $file_remover = new Filesystem;
        $file_remover->cleanDirectory(public_path('/uploads/tmp_files_copy'));        


        // add to activity log


        // download zipped files
        return response()->download(public_path("uploads/tmp_zipped/{$research->title}".'.zip'));

 
    }


    // method use to download form request
    public function downloadFormRequest($id = null)
    {
        if(!Auth::check()) {
            return redirect()->route('login')->with('error', 'Login First');
        }

        $fr = FormRequest::findorfail($id);

        // add to activity log
        $action = 'Downloaded Form Request';
        $this->log($action);

        // download
        return response()->download(public_path("uploads/form_requests/{$fr->unique_filename}"));

    }



    // method use to generate notification for all users
    public static function create_notification($id, $url, $message)
    {
        $n = new Notification();
        $n->user_id = $id;
        $n->message = $message;
        $n->url = $url;
        $n->save();
    }



    // method use to load notifications
    public function notifications()
    {

        // if the user id has notification that is unread
        $notifications = Notification::where('user_id', Auth::user()->id)->where('viewed', 0)->orderBy('created_at', 'desc')->get();

        return view('includes.notification-content', ['notifications' => $notifications]);
    }


    // method use to count notification
    public function notificationCount()
    {

        $notifications = Notification::where('user_id', Auth::user()->id)->where('viewed', 0)->get();

        if(count($notifications) > 0) {
            $notificationCount = count($notifications);
            return view('includes.notification-badge', ['notificationCount' => $notificationCount]);
        }

        return view('includes.notification-badge-no-class');
    }


    public function notificationRead($id)
    {
        $id = decrypt($id);

        $notification = Notification::findorfail($id);
        $notification->viewed = 1;
        $notification->save();

        return redirect()->route($notification->url);
    }

}
