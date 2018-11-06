<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\User;
use App\Form;

class DrcController extends Controller
{
    // method use to go to dashboard of drc
    public function dashboard()
    {
    	return view('drc.dashboard');
    }


    // method use to access incomingResearch
    public function incomingResearch()
    {
        $drc = Auth::user();

        $college_id = $drc->drcAssignment->college->id;
        $deparment_id = $drc->drcAssignment->deparment->id;

        // get all the researches that has an incoming status in drc
        $incomming2 = Research::where('college_id', $college_id)
                            ->where('deparment_id', $deparment_id)
                            ->get();

        return view('drc.research-incoming');
    }


    // method use to access outgoingResearch
    public function outgoingResearch()
    {
        return view('drc.research-outgoing');
    }


    // method use to view forms
    public function forms()
    {
    	$forms = Form::get();

    	return view('drc.forms', ['forms' => $forms]);
    }


    // method use to access sendRequestForm
    public function sendRequestForm()
    {
        $forms = Form::get();

        return view('drc.send-request-form', ['forms' => $forms]);
    }


    // method use to logout of fr
	public function logout()
	{
		$action = 'Logout';
		GeneralController::log($action);

		return redirect()->route('logout');
	}
}
