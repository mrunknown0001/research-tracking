<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\CollegeDepartment;
use App\User;
use App\DrcAssignment;
use App\FrAssignment;

class CollegeClerkController extends Controller
{
    // method use to go to dashboard of cc
    public function dashboard()
    {
        $college_id = Auth::user()->collegeClerkAssignment->college->id;

        $departments = CollegeDepartment::where('college_id', $college_id)->get();

    	return view('cc.dashboard', ['departments' => $departments]);
    }


    // method use to access profile of college clerk
    public function profile()
    {
        return view('cc.profile');
    }


    // method use to go to add account
    public function addAccount()
    {
        $college_id = Auth::user()->collegeClerkAssignment->college->id;

        $departments = CollegeDepartment::where('college_id', $college_id)->get();

    	return view('cc.account-add', ['departments' => $departments]);
    }


    // method use to save new account
    public function postAddAccount(Request $request)
    {
        $request->validate([
            'id_number' => 'required|unique:users',
            'department' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'contact_number' => 'required|digits:11',
            'user_type' => 'required'
        ]);

        $id_number = $request['id_number'];
        $department = $request['department'];
        $firstname = $request['firstname'];
        $middlename = $request['middlename'];
        $lastname = $request['lastname'];
        $email = $request['email'];
        $contact_number = $request['contact_number'];
        $user_type = $request['user_type'];

        $dept = CollegeDepartment::findOrFail($department);

        if($user_type != 8 && $user_type != 7) {
            return redirect()->back()->with('error', 'Please Try Again Later!');
        }

        // save new user
        $user = new User();
        $user->firstname = $firstname;
        $user->middlename = $middlename;
        $user->lastname = $lastname;
        $user->id_number = $id_number;
        $user->password = bcrypt('password');
        $user->email = $email;
        $user->contact_number = $contact_number;
        $user->user_type = $user_type;

        if($user_type == 8) {
            $user->save();

            $fr = new FrAssignment();
            $fr->fr_id = $user->id;
            $fr->college_id = $dept->college->id;
            $fr->department_id = $dept->id;
            $fr->save();

            $action = 'Added Faculty Researcher';
        }
        else {
            // check if there is assign drc to the department
            $check_drc_assign = DrcAssignment::where('department_id', $dept->id)->first();

            if(count($check_drc_assign) > 0 && $check_drc_assign->drc->active == 1) {
                return redirect()->back()->with('error', ucwords($dept->name) . ' Department Already has Chairperson');
            }
            else if(count($check_drc_assign) > 0 && $check_drc_assign->drc->active == 0) {
                $user->save();

                $check_drc_assign->drc_id = $user->id;
                $check_drc_assign->save();

                $action = 'Added Department Research Chairperson';
            }
            else {
                $user->save();

                $drc = new DrcAssignment();
                $drc->drc_id = $user->id;
                $drc->college_id = $dept->college->id;
                $drc->department_id = $dept->id;
                $drc->save();

                $action = 'Added Department Research Chairperson';
            }

        }


        // add to audit trail/activity logs
        GeneralController::log($action);

        // return back with success message
        return redirect()->back()->with('success', 'User Added');
    }


    // method use to update account
    public function updateAccount($id = null)
    {
        $college_id = Auth::user()->collegeClerkAssignment->college->id;

        $departments = CollegeDepartment::where('college_id', $college_id)->get();

        $user = User::findOrFail($id);

        // check if the user belongs to this college
        $clerk = Auth::user();

        if($user->user_type == 7) {
            if($clerk->collegeClerkAssignment->college->id != $user->drcAssignment->college->id) {
                // return back with error
                return redirect()->back()->with('error', 'Please Reoad This Page and Try Again!');
            }
        }
        else if($user->user_type == 8) {
            if($clerk->collegeClerkAssignment->college->id != $user->frAssignment->college->id) {
                // return back with error
                return redirect()->back()->with('error', 'Please Reoad This Page and Try Again!');
            } 
        }

        return view('cc.account-edit', ['user' => $user, 'departments' => $departments]);
    }


    // method use to save updates on user 
    public function postUpdateAccount(Request $request)
    {
        $request->validate([
            'id_number' => 'required',
            'department' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'contact_number' => 'required|digits:11',
            'user_type' => 'required'
        ]);

        $id = $request['id'];

        $user = User::findOrFail($id);
        
        $id_number = $request['id_number'];
        $department = $request['department'];
        $firstname = $request['firstname'];
        $middlename = $request['middlename'];
        $lastname = $request['lastname'];
        $email = $request['email'];
        $contact_number = $request['contact_number'];
        $user_type = $request['user_type'];

        $dept = CollegeDepartment::findOrFail($department);

        // check id_number ais used
        $check_id_number = User::where('id_number', $id_number)->first();

        if(count($check_id_number) > 0 && $check_id_number->id != $user->id) {
            return redirect()->back()->with('error', 'ID Number already used');
        }


        $user->firstname = $firstname;
        $user->middlename = $middlename;
        $user->lastname = $lastname;
        $user->id_number = $id_number;
        $user->email = $email;
        $user->contact_number = $contact_number;
        $user->user_type = $user_type;
        $user->save();

        if($user_type == 8) {
            $user->save();

            $user->frAssignment->fr_id = $user->id;
            $user->frAssignment->college_id = $dept->college->id;
            $user->frAssignment->department_id = $dept->id;
            $user->frAssignment->save();

            $action = 'Updated Faculty Researcher';
        }
        else {
            // check if there is assign drc to the department
            $check_drc_assign = DrcAssignment::where('department_id', $dept->id)->first();

            if(count($check_drc_assign) > 0 && $check_drc_assign->drc->active == 1 && $check_drc_assign->drc->id != $user->id) {
                return redirect()->back()->with('error', ucwords($dept->name) . ' Department Already has Chairperson');
            }
            else {
                $user->save();

                $user->drcAssignment->drc_id = $user->id;
                $user->drcAssignment->college_id = $dept->college->id;
                $user->drcAssignment->department_id = $dept->id;
                $user->drcAssignment->save();

                $action = 'Updated Department Research Chairperson';
            }

        }

        GeneralController::log($action);

        // return back with success message
        return redirect()->back()->with('success', 'User Updated');

    }


    // method use to resset password to password
    public function postResetPassword(Request $request)
    {
        $id = $request['user_id'];

        $user = User::findOrFail($id);

        $user->password = bcrypt('password');
        $user->save();

        if($user->user_type == 8) {
            $action = 'Reset Password of FR';
        }
        else {
            $action = 'Reset Password of DRC';
        }
        
        GeneralController::log($action);

        return redirect()->back()->with('success', 'Password Reset Successful!');
    }


    // method use to remove the user 
    public function postRemoveAccount(Request $request)
    {
        $id = $request['user_id'];

        $user = User::findOrFail($id);
        $user->active = 0;
        $user->save();

        // add to audit trail/activity logs
        if($user->user_type == 8) {
            $action = 'Removed Faculty Researcher';
        }
        else if($user->user_type == 7) {
            $action = 'Removed DRC Account';
        }
        else {
            $action = 'User Account Removed';
        }

        GeneralController::log($action);

        // return back with success message
        return redirect()->back()->with('success', $action);
    }


    // method use to logout of fr
	public function logout()
	{
		$action = 'Logout';
		GeneralController::log($action);

		return redirect()->route('logout');
	}
}
