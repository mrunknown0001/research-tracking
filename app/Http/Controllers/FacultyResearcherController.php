<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Auth;
use App\Http\Controllers\GeneralController;
use DB;

use App\User;
use App\Form;
use App\Research;
use App\ResearchCoauthor;

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

        // get all researches involved by
        $researches = Research::where('author_id', Auth::user()->id)
                            ->orderBy('created_at', 'desc')
                            ->get();

        $co_researches = ResearchCoauthor::where('co_author_id', Auth::user()->id)
                            ->orderBy('created_at', 'desc')
                            ->get();

    	return view('fr.dashboard', ['researchers' => $researchers, 'researches' => $researches, 'co_researches' => $co_researches]);
    }


    // method use to submit research 
    public function postSubmitResearch(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'files.*' => 'required|file|mimes:pdf,doc,docx|max:5000'
        ]);

        $title = $request['title'];
        $co_authors = $request['co_authors'];

        $files = $request['files'];

        // check if files count is greater than 7
        if(count($files) > 7) {
            return redirect()->back()->with('error', 'File Upload is not more than 7 files');
        }


        $research_file = null;
        $research_file_count = 0;
        $research_filename = '';

        foreach($files as $file) {

            // determine the research file
            $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            if($ext == 'doc' || $ext == 'docx') {
                $research_filename = $file->getClientOriginalName();
                $research_file = 1;
                $research_file_count++;
            }
        }

        // check if there is more than 1 research file
        if($research_file_count > 1) {
            return redirect()->back()->with('error', 'More than 1 research document found.');
        }

        // check if the research file is found
        if($research_file == null) {
            return redirect()->back()->with('error', 'Research File Not Found. It must be in .doc or .docx file format');
        }

        // generate unique tracking number
        $tracking_number = GeneralController::generate_tracking_number();

        $researcher = Auth::user();

        // save research here
        $research = new Research();
        $research->author_id = Auth::user()->id;
        $research->title = $title;
        $research->tracking_number = $tracking_number;
        $research->research_filename = $research_filename;
        $research->college_id = $researcher->frAssignment->college->id;
        $research->department_id = $researcher->frAssignment->department->id;
        $research->time_posted = now();
        $research->save();


        $filenames = [];

        foreach($files as $file) {

            // posible rename and/or upload file to folder
            // move to entry folder
            $renamed = Auth::user()->id_number . '.' . time().'.'.$file->getClientOriginalExtension();

            /*
            talk the select file and move it public directory and make avatars
            folder if doesn't exsit then give it that unique name.
            */
            $file->move(public_path('uploads/files'), $renamed);

            $filenames[] = [
                'original_filename' => $file->getClientOriginalName(),
                'unique_filename' => $renamed
            ];

        }


        // save filenames in database for download
        $uploaded_files = [];

        foreach($filenames as $f) {
            $uploaded_files[] = [
                'research_id' => $research->id,
                'original_filename' => $f['original_filename'],
                'unique_filename' => $f['unique_filename']
            ];
        }

        DB::table('research_uploaded_files')->insert($uploaded_files);

        // save co author
        // this can be multiple
        if($co_authors != null) {
            $co = new ResearchCoauthor();
            $co->research_id = $research->id;
            $co->co_author_id = $co_authors;
            $co->save();
        }

        $action = 'Submitted Research';
        GeneralController::log($action);

        return redirect()->back()->with('success', 'Research Submitted!');

    }


    // method use to view research details
    public function researchDetails($id = null)
    {
        $research = Research::findorfail($id);

        $fr = Auth::user();

        if($research->author_id != $fr->id) {
            return redirect()->back()->with('error', 'Please Try Again Later!');
        }

        return view('fr.research-details', ['research' => $research]);


    }


    // method use to update research
    public function researchUpdate($id = null)
    {
        $research = Research::findorfail($id);

        $fr = Auth::user();

        if($research->author_id != $fr->id) {
            return redirect()->back()->with('error', 'Please Try Again Later!');
        }

        $researchers = User::where('active', 1)
                            ->where('id', '!=', Auth::user()->id)
                            ->where('user_type', 8)
                            ->orderBy('lastname', 'asc')
                            ->get();

        // redirect to update form
        return view('fr.research-update', ['research' => $research, 'researchers' => $researchers]);

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
