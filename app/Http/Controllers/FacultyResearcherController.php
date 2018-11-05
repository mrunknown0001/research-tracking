<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Auth;
use App\Http\Controllers\GeneralController;

use App\User;
use App\Form;

class FacultyResearcherController extends Controller
{
    // method use to go to dashboard of fr
    public function dashboard()
    {
        $researchers = User::where('active', 1)
                            ->where('id', '!=', Auth::user()->id)
                            ->where('user_type', 8)
                            ->orderBy('lastname', 'asc')
                            ->get();

    	return view('fr.dashboard', ['researchers' => $researchers]);
    }


    // method use to submit research 
    public function postSubmitResearch(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'co_authors' => 'required',
            'files.*' => 'required|mimes:pdf,doc,docx'
        ]);

        $title = $request['title'];
        $co_authors = $request['co_authors'];

        $files = $request['files'];

        foreach($files as $file) {
            return $file->getClientOriginalName();
        }

    }

    // method use to access incoming research
    public function incomingResearch()
    {
        return view('fr.research-incoming');
    }


    // method use to access outgoing research
    public function outgoingResearch()
    {
        return view('fr.research-outgoing');
    }


    // method use to go to forms
    public function forms()
    {
    	$forms = Form::get();

    	return view('fr.forms', ['forms' => $forms]);
    }


    // method use to access send form
    public function sendRequestForm()
    {
        $forms = Form::get();

        return view('fr.send-request-form', ['forms' => $forms]);
    }

    // method use to logout of fr
	public function logout()
	{
		$action = 'Logout';
		GeneralController::log($action);

		return redirect()->route('logout');
	}
}
