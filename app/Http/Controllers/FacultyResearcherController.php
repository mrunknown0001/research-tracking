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
            'files.*' => 'required|file|mimes:pdf,doc,docx|max:20480'
        ]);

        $title = $request['title'];
        $co_authors = $request['co_authors'];

        $files = $request['files'];

        // check if files count is greater than 7
        if(count($files) > 7) {
            return redirect()->back()->with('error', 'File Upload is not more than 7 files');
        }


        // generate tracking number for tracking of the research

        $filenames = [];
        $research_file = null;
        $research_file_count = 0;

        foreach($files as $file) {

            // determine the research file
            $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            if($ext == 'doc' || $ext == 'docx') {
                $research_file = 1;
                $research_file_count++;
            }
        }

        // check if there is more than 1 research file
        if($research_file_count > 1) {
            return redirect()->back()->with('error', 'More than 1 research document found.');
        }

        // check if the reserach file is found
        if($research_file == null) {
            return redirect()->back()->with('error', 'Research File Not Found. It must be in .doc or .docx file format');
        }



        foreach($files as $file) {

            // posible rename and/or upload file to folder

        }

        return GeneralController::generate_tracking_number();

        return 'renaming/uploading and attaching tracking number next...  code found in 
        app\Http\Controllers\FacultyResearcherController @ method postSubmitResearch lines 29 to 88 ';

        // add co - authors/contributors to the research 
        // and reflect to thier accounts as their research document(s)

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
