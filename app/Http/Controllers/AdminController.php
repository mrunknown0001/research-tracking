<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\GeneralController;

use App\AuditTrail;
use App\College;
use App\User;
use App\Form;
use App\Research;
use App\Agenda;
use App\FormRequest;
use App\CollegeDepartment;
use App\CollegeClerkAssignment;
use App\ResearchProgressReport;

class AdminController extends Controller
{
    // method use to go to admin dashboard
	public function dashboard()
	{
		$logs = AuditTrail::orderBy('created_at', 'desc')->simplePaginate(4);

		$form_requests = FormRequest::orderBy('created_at', 'desc')->orderBy('approved', 'asc')->get();

		return view('admin.dashboard', ['logs' => $logs, 'form_requests' => $form_requests]);
	}


	// method use to access admin profile
	public function profile()
	{
		return view('admin.profile');
	}


	// method use to access change password view
	public function changePassword()
	{
		return view('admin.password-change');
	}


	// method use to update admin password
	public function postChangePassword(Request $request)
	{
		$request->validate([
			'current_password' => 'required',
			'password' => 'required|confirmed|min:6'
		]);

		$current_password = $request['current_password'];
		$password = $request['password'];

		// validate current password if matched
		if(!password_verify($current_password, Auth::user()->password)) {
			return redirect()->route('admin.change.password')->with('error', 'Incorrect Password!');
		}

		// if true, change password
		Auth::user()->password = bcrypt($password);

		if(Auth::user()->save()) {
			// add to activitily
			$action = 'Changed Password';
			GeneralController::log($action);

			return redirect()->route('admin.change.password')->with('success', 'Password Changed!');
		}

		return redirect()->route('admin.change.password')->with('error', 'Error Changing Password!');
	}


	// method use to update profile
	public function updateProfile()
	{
		return view('admin.profile-update');
	}


	// method use to update profile
	public function postUpdateProfile(Request $request)
	{
		$request->validate([
			'firstname' => 'required',
			'middlename' => 'nullable',
			'lastname' => 'required',
			'id_number' => 'required',
			'contact_number' => 'required',
			'email' => 'required|email',
		]);

		$firstname = $request['firstname'];
		$middlename = $request['middlename'];
		$lastname = $request['lastname'];
		$id_number = $request['id_number'];
		$contact_number = $request['contact_number'];
		$email = $request['email'];

		$user = Auth::user();

		$user->firstname = $firstname;
		$user->middlename = $middlename;
		$user->lastname = $lastname;
		$user->id_number = $id_number;
		$user->contact_number = $contact_number;
		$user->email = $email;
		$user->save();

		// add to activity log
		$action = 'Updated Profile';
		GeneralController::log($action);

		return redirect()->back()->with('success', $action);
	}


	// method use to show incoming research page
	public function incomingResearch()
	{
		$incoming8 = Research::where('step_number', 8)
							->where('step_8_received', 0)
							->get();

		$incoming12 = Research::where('step_number', 12)
							->where('step_12_received', 0)
							->get();

		$incoming14 = Research::where('step_number', 14)
							->where('step_14_received', 0)
							->get();

		return view('admin.research-incoming', ['incoming8' => $incoming8, 'incoming12' => $incoming12, 'incoming14' => $incoming14]);
	}


	// method use to receive incoming research in admin
	public function postReceiveIncomingResearch(Request $request)
	{
		$id = $request['research_id'];

		$research = Research::findorfail($id);

		$action = 'Research Received';

		if($research->step_number == 8) {
			$research->step_8_received = 1;
			$research->step_8_date_received = now();

			$action = 'Research Received on Step 8';
		}
		else if($research->step_number == 12) {
			$research->step_12_received = 1;
			$research->step_12_date_received = now();

			$action = 'Research Received on Step 12';
		}
		else if($research->step_number == 14) {
			$research->step_14_received = 1;
			$research->step_14_date_received = now();

			$action = 'Research Received on Step 14';
		}
		else {
			return redirect()->back()->with('error', 'Please Try Again Later');
		}

		$research->save();

		GeneralController::log($action);

		return redirect()->route('admin.incoming.research')->with('success', 'Research Received');


	}


	// method use to show outgoing research
	public function outgoingResearch()
	{
		$outgoing8 = Research::where('step_number', 8)
						->where('step_8_received', 1)
						->get();


		$outgoing12 = Research::where('step_number', 12)
						->where('step_12_received', 1)
						->get();


		$outgoing14 = Research::where('step_number', 14)
						->where('step_14_received', 1)
						->get();

		$agendas = Agenda::orderBy('title', 'asc')->get();

		return view('admin.research-outgoing', ['outgoing8' => $outgoing8, 'outgoing12' => $outgoing12, 'outgoing14' => $outgoing14, 'agendas' => $agendas]);
	}


	// method use to proceed to step 9
	public function postProceedStepNine(Request $request)
	{
		$request->validate([
			'grade' => 'required|numeric',
			'agenda' => 'required',
		]);

		$id = $request['research_id'];
		$grade = $request['grade'];
		$agenda_id = $request['agenda'];
		$comment = $request['comment'];

		$research = Research::findorfail($id);

		$agenda = Agenda::findorfail($agenda_id);

		// proceed
		$research->step_number = 9;
		$research->agenda_id = $agenda->id;
		$research->urec_grade = $grade;
		$research->step_8_proceeded = 1;
		$research->step_8_comment = $comment;
		$research->step_8_date_proceeded = now();
		$research->save();


		$r_id = $research->author_id;
		$url = 'fr.incoming.research';
		$message = 'Admin Proceeded Your Research to Step 9';

		GeneralController::create_notification($r_id, $url, $message);

		// add to activity log
		$action = 'Research Proceeded to Step 9';
		GeneralController::log($action);

		// return redirect back
		return redirect()->back()->with('success', 'Research Proceeded');
	}


	// method use to procced to step 13
	public function postProceedStepThirteen(Request $request)
	{
		$id = $request['research_id'];

		$comment = $request['comment'];

		$research = Research::findorfail($id);

		// proceed
		$research->step_number = 13;
		$research->step_12_comment = $comment;
		$research->step_12_proceeded = 1;
		$research->step_12_date_proceeded = now();
		$research->save();


		$o_id = 5;
		$url = 'oc.incoming.research';
		$message = 'Admin Proceeded Your Research to Step 13';

		GeneralController::create_notification($o_id, $url, $message);


		// add to activity log
		$action = 'Research Proceeded to Step 13';
		GeneralController::log($action);

		// return redirect back
		return redirect()->back()->with('success', 'Research Proceeded');

	}


	// method use to proceed to step 15
	public function postProceedStepFifteen(Request $request)
	{
		$request->validate([
			'funding_type' => 'required'
		]);

		$id = $request['research_id'];
		$funding_type = $request['funding_type'];
		$comment = $request['comment'];

		$research = Research::findorfail($id);

		// proceed
		$research->step_number = 15;
		$research->funding_type = $funding_type;
		$research->step_14_proceeded = 1;
		$research->step_14_date_proceeded = now();
		$research->step_14_comment = $comment;
		$research->save();


		$r_id = $research->author_id;
		$url = 'fr.incoming.research';
		$message = 'Admin Proceeded Your Research to Step 15';

		GeneralController::create_notification($r_id, $url, $message);

		// add to activity log
		$action = 'Research Proceeded to Step 15';
		GeneralController::log($action);

		// return redirect back
		return redirect()->back()->with('success', 'Research Proceeded');
	}


	// method use to go to forms
	public function forms()
	{
		$forms = Form::get();

		return view('admin.forms', ['forms' => $forms]);
	}


	// method use to update form 
	public function postFormUpdate(Request $request)
	{
		$request->validate([
			'form' => 'required',
			'file' => 'required|mimes:pdf'
		]);

		$file = $request['file'];

		$id = $request['form'];

		$form = Form::findorfail($id);

		// replace form
		$file->move(public_path('/uploads/fillable'), $form->filename);

        $action = 'Form ' . $form->alias . ' Updated';
        GeneralController::log($action);

        return redirect()->back()->with('success', 'Form Updated!');

	}


	// method use to go to research
	public function research()
	{
		// get all colleges
		$colleges = College::get();

		return view('admin.research', ['colleges' => $colleges]);
	}


	// method use to view researcher per department
	public function departmentResearch($id)
	{
		$id = decrypt($id);

		$department = CollegeDepartment::findorfail($id);

		return view('admin.research-department', ['department' => $department]);
	}


	// method use to track research
	public function researchTracking($id)
	{
		$id = decrypt($id);

		$research = Research::findorfail($id);

		return view('admin.research-tracking', ['research' => $research]);
	}


	// method use to add research incentive
	public function researchIncentive($id)
	{
		$id = decrypt($id);

		$research = Research::findorfail($id);

		return view('admin.research-incentive', ['research' => $research]);
	}


	// method use to save research incentive
	public function postResearchIncentive(Request $request)
	{
		$request->validate([
			'publication_incentive' => 'nullable|numeric|min:0',
			'presentation_incentive' => 'nullable|numeric|min:0',
			'citation_incentive' => 'nullable|numeric|min:0',
			'competition_incentive' => 'nullable|numeric|min:0',
			'completed_research_incentive' => 'nullable|numeric|min:0'
		]);

		$publication_incentive = $request['publication_incentive'];
		$presentation_incentive = $request['presentation_incentive'];
		$citation_incentive = $request['citation_incentive'];
		$competition_incentive = $request['competition_incentive'];
		$completed_research_incentive = $request['completed_research_incentive'];

		$research_id = $request['research_id'];

		$research = Research::findorfail($research_id);

		$research->incentive->publication_incentive = $publication_incentive;
		$research->incentive->presentation_incentive = $presentation_incentive;
		$research->incentive->citation_incentive = $citation_incentive;
		$research->incentive->competition_incentive = $competition_incentive;
		$research->incentive->completed_research_incentive = $completed_research_incentive;

		if($research->incentive->save()) {

			$action = 'Admin Added Incentives';
			GeneralController::log($action);
			return redirect()->route('admin.research.incentive', ['id' => encrypt($research->id)])->with('success', 'Incentives Added!');
		}
	}


	// method use to show progress reports
	public function researchProgressReports($id)
	{
		$id = decrypt($id);

		$research = Research::findorfail($id);

		return view('admin.research-progress-report', ['research' => $research]);
	}


	// method use to go to accounts
	public function accounts()
	{
		$accounts = User::where('active', 1)->orderBy('id_number', 'asc')->paginate(10);

		return view('admin.accounts', ['accounts' => $accounts]);
	}


	// method use to access settings
	public function settings()
	{
		return view('admin.settings');
	}


	// method to access college management
	public function colleges()
	{
		$colleges = College::where('active', 1)->orderBy('name')->get();

		return view('admin.colleges', ['colleges' => $colleges]);
	}



	public function addCollege()
	{
		return view('admin.college-add', ['college' => null]);
	}


	public function storeCollege(Request $request)
	{
		$request->validate([
			'name' => 'required',
			'code' => 'required'
		]);

		$name = $request['name'];
		$code = $request['code'];

		$college_id = $request['college_id'];

		if($college_id == null) {
			$college = new College();
			$message = 'Added New College';

		}
		else {
			$college = College::findorfail($college_id);
			$message = 'Updated College';
		}

		$college->name = $name;
		$college->code = $code;

		if($college->save()) {
			GeneralController::log($message);
			return redirect()->route('admin.add.college')->with('success', $message);
		}

		return redirect()->route('admin.add.college')->with('error', 'Error! Please Try Again Later.');

	}



	public function updateCollege($id)
	{
		$college = College::findorfail($id);

		return view('admin.college-add', ['college' => $college]);
	}


	public function deleteCollege($id)
	{
		$college = College::findorfail($id);
		$college->active = 0;

		if($college->save()) {
			GeneralController::log('Removed College');
			return redirect()->route('admin.colleges')->with('success', 'College Removed');

		}

		return redirect()->route('admin.colleges')->with('error', 'Please Try Again Later');
	}



	// departments
	public function departments()
	{
		$departments = CollegeDepartment::where('active', 1)->get();

		return view('admin.departments', ['departments' => $departments]);
	}


	// add department
	public function addDepartment()
	{
		$colleges = College::where('active', 1)->orderBy('name', 'asc')->get();

		return view('admin.department-add', ['department' => null, 'colleges' => $colleges]);
	}


	public function storeDepartment(Request $request)
	{
		$request->validate([
			'name' => 'required',
			'college' => 'required'
		]);

		$department_id = $request['department_id'];
		$name = $request['name'];
		$college_id = $request['college'];

		$college = College::findorfail($college_id);

		if($department_id == null) {
			// create
			$department = new CollegeDepartment();
			$message = 'Department Created!';
		}
		else {
			// update
			$department = CollegeDepartment::findorfail($department_id);
			$message = 'Department Updated!';
		}

		$department->name = $name;
		$department->college_id = $college_id;

		if($department->save()) {
			GeneralController::log($message);
			return redirect()->route('admin.add.department')->with('success', $message);
		}

		return redirect()->back()->with('error', 'Error Occured! Please Try Again Later!');
	}


	public function updateDepartment($id)
	{
		$id = decrypt($id);

		$department = CollegeDepartment::findorfail($id);
		$colleges = College::where('active', 1)->orderBy('name', 'asc')->get();


		return view('admin.department-add', ['department' => $department, 'colleges' => $colleges]);
	}


	public function removeDepartment($id)
	{
		$id = decrypt($id);

		$department = CollegeDepartment::findorfail($id);

		$department->active = 0;

		if($department->save()) {
			$message = 'College Department Removed';
			GeneralController::log($message);
			return redirect()->route('admin.departments')->with('success', $message);
		}
	}


	// COLLEGE CLERKS
	public function collegeClerks()
	{
		$clerks = User::where('user_type', 6)->where('active', 1)->orderBy('lastname', 'asc')->get();

		return view('admin.college-clerks', ['clerks' => $clerks]);
	}


	public function addCollegeClerk()
	{
		$colleges = College::where('active', 1)->orderBy('name', 'asc')->get();

		return view('admin.college-clerk-add', ['clerk' => null, 'colleges' => $colleges]);
	}


	public function storeCollegeClerk(Request $request)
	{
		$request->validate([
			'college' => 'required',
			'firstname' => 'required',
			'middlename' => 'required',
			'lastname' => 'required'
		]);

		$clerk_id = $request['clerk_id'];
		$college_id = $request['college'];
		$id_number = $request['id_number'];
		$firstname = $request['firstname'];
		$middlename = $request['middlename'];
		$lastname = $request['lastname'];

		$check_user = User::where('id_number', $id_number)->first();

		if(!empty($check_user)) {
			return redirect()->back()->with('error', 'ID Number Already Used!');
		}

		if(GeneralController::checkClerk($clerk_id, $college_id)) {
			$user = new User();
			$user->firstname = $firstname;
			$user->middlename = $middlename;
			$user->lastname = $lastname;
			$user->id_number = $id_number;
			$user->user_type = 6;
			$user->password = bcrypt('password');
			$user->save();

			$clerk = new CollegeClerkAssignment();
			$clerk->clerk_id = $user->id;
			$clerk->college_id = $college_id;
			$clerk->save();
		}

		return redirect()->back()->with('warning', 'The College has a Clerk.');
	}


	public function removeCollegeClerk($id)
	{
		$id = decrypt($id);

		$clerkAssign = CollegeClerkAssignment::where('clerk_id', $id)->first();
		$clerkAssign->delete();

		return redirect()->route('admin.college.clerks')->with('success', 'Clerk Assignment Removed!');
	}


	public function logout()
	{
		$action = 'Logout';
		GeneralController::log($action);

		return redirect()->route('logout');
	}



	// method use to download form
	public function downloadForm($filename)
	{
		if(!Auth::check()) {
			return redirect()->route('login')->with('error', 'Login First');
		}

		$action = 'Form Download ' . $filename;
		GeneralController::log($action);

		return response()->download(public_path("uploads/fillable/{$filename}"));
	}


	// method use to download progress report
	public function downloadProgressReport($id)
	{
		$pr = ResearchProgressReport::findorfail($id);

		// return $pr;
		$filename = $pr->unique_filename;

		$action = 'Progress Report Download ' . $filename;
		GeneralController::log($action);


		return response()->download(public_path("uploads/files/{$filename}"));
	}
}
