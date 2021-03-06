<?php

Route::group(['middleware' => 'prevent.back.history'], function () {
	Route::get('/', 'LoginController@login')->name('login');

	Route::get('/login', function () {
		return redirect()->route('login');
	});

	Route::post('/login', 'LoginController@postLogin')->name('login.post');

	// route to agree with privacy statement
	Route::get('/privacy-statement/proceed', 'GeneralController@privacyStatementAgree')->name('privacy.statement.agree');

	// route to decline privacy statement
	Route::get('/privacy-statement/declined', 'GeneralController@declinedPrivacyStatement')->name('declined.privacy.statement');

	// route use to agree with privacy statement
	Route::post('/privacy-statement/agreed', 'GeneralController@postAgreedPrivacyStatement')->name('agreed.privacy.statement.post');

	// route to view privacy statement
	Route::get('/privacy-statement', 'GeneralController@viewPrivacyStatement')->name('privacy.statement');

	// route to change default password
	Route::get('/change-default-password', 'GeneralController@changeDefaultPassword')->name('change.default.password');

	Route::post('/change-default-password', 'GeneralController@postChangeDefaultPassword')->name('change.default.password.post');
});


Route::get('/logout', 'LoginController@logout')->name('logout');


///////////////////////////////
//start of admin route group //
///////////////////////////////
Route::group(['prefix' => 'admin', 'middleware' => ['check.admin', 'prevent.back.history']], function () {
	Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');

	// route to access profile of admin
	Route::get('/profile', 'AdminController@profile')->name('admin.profile');

	Route::get('/profile/update', 'AdminController@updateProfile')->name('admin.update.profile');

	Route::post('/profile/update', 'AdminController@postUpdateProfile')->name('admin.update.profile.post');

	// route to change password of admin
	Route::get('/password', 'AdminController@changePassword')->name('admin.change.password');

	Route::post('/password', 'AdminController@postChangePassword')->name('admin.change.password.post');

	// route to go to incoming research
	Route::get('/research/incoming', 'AdminController@incomingResearch')->name('admin.incoming.research');

	// route to receive incoming research
	Route::post('/research/incoming/receive', 'AdminController@postReceiveIncomingResearch')->name('admin.receive.incoming.research.post');

	Route::get('/research/incoming/receive', function () {
		return redirect()->route('admin.incoming.research');
	});

	// route to go to outgoing research
	Route::get('/research/outgoing', 'AdminController@outgoingResearch')->name('admin.outgoing.research');

	// route to proceed to step 9
	Route::post('/research/proceed/step/nine', 'AdminController@postProceedStepNine')->name('admin.proceed.step.nine.post');

	Route::get('/research/proceed/step/nine', function () {
		return redirect()->route('admin.outgoing.research');
	});


	// route to proceed to step 13
	Route::post('/research/proceed/step/thirteen', 'AdminController@postProceedStepThirteen')->name('admin.proceed.step.thirteen.post');

	// route to proceed to step 15
	Route::post('/research/outgoing/proceed/step/fifteen', 'AdminController@postProceedStepFifteen')->name('admin.proceed.step.fifteen.post');

	// route to go to forms
	Route::get('/forms', 'AdminController@forms')->name('admin.forms');

	// route to update form
	Route::post('/forms', 'AdminController@postFormUpdate')->name('admin.form.update.post');

	// route to go to researches
	Route::get('/research', 'AdminController@research')->name('admin.research');


	// route to view research per department
	Route::get('/research/department/{id}', 'AdminController@departmentResearch')->name('admin.department.research');

	// route to view tracking details of research
	Route::get('/research/tracking/{id}', 'AdminController@researchTracking')->name('admin.research.tracking');

	// route to add incentive for the research
	Route::get('/research/{id}/incentive', 'AdminController@researchIncentive')->name('admin.research.incentive');

	Route::post('/reserch/incentive', 'AdminController@postResearchIncentive')->name('admin.research.incentive.post');

	Route::get('/research/incentive', function () {
		return redirect()->route('admin.dashboard');
	});


	// route to see progress reports of research
	Route::get('/research/{id}/progress-report', 'AdminController@researchProgressReports')->name('admin.research.progress.reports');

	// route to go to accounts
	Route::get('/accounts', 'AdminController@accounts')->name('admin.accounts');


	// route to settings
	Route::get('/settings', 'AdminController@settings')->name('admin.settings');


	// route to college management
	Route::get('/colleges', 'AdminController@colleges')->name('admin.colleges');

	Route::get('/college/add', 'AdminController@addCollege')->name('admin.add.college');

	Route::post('/college/add', 'AdminController@storeCollege')->name('admin.store.college');

	Route::get('/college/update/{id}', 'AdminController@updateCollege')->name('admin.update.college');

	Route::get('/college/delete/{id}', 'AdminController@deleteCollege')->name('admin.remove.college');

	// route to department management
	Route::get('/departments', 'AdminController@departments')->name('admin.departments');

	Route::get('/department/add', 'AdminController@addDepartment')->name('admin.add.department');

	Route::post('/department/add', 'AdminController@storeDepartment')->name('admin.store.department');

	Route::get('/department/update/{id}', 'AdminController@updateDepartment')->name('admin.update.department');

	Route::get('/department/remove/{id}', 'AdminController@removeDepartment')->name('admin.remove.department');

	// route to college clerk management
	Route::get('/college/clerks', 'AdminController@collegeClerks')->name('admin.college.clerks');

	Route::get('/college/clerk/add', 'AdminController@addCollegeClerk')->name('admin.add.college.clerk');

	Route::post('/college/clerk/add', 'AdminController@storeCollegeClerk')->name('admin.store.college.clerk');

	Route::get('/college/clerk/remove/{id}', 'AdminController@removeCollegeClerk')->name('admin.remove.college.clerk');

	Route::get('/logout', 'AdminController@logout')->name('admin.logout');
});

// end of admin route group
 

// start of office clerk route group
Route::group(['prefix' => 'oc', 'middleware' => ['check.oc', 'prevent.back.history']], function () {
	Route::get('/', 'OfficeClerkController@dashboard')->name('oc.dashboard');

	// route to access profile of office clerk
	Route::get('/profile', 'OfficeClerkController@profile')->name('oc.profile');


	// route to udpate profile
	Route::get('/profile/update', 'OfficeClerkController@updateProfile')->name('oc.profile.udpate');

	// route to post update profile
	Route::post('/profile/update', 'OfficeClerkController@postUpdateProfile')->name('oc.update.profile.post');


	// route to change password
	Route::get('/password', 'OfficeClerkController@changePassword')->name('oc.change.password');

	// route to save new password
	Route::post('/password', 'OfficeClerkController@postChangePassword')->name('oc.change.password.post');

	// route to incoming research
	Route::get('/research/incoming', 'OfficeClerkController@incomingResearch')->name('oc.incoming.research');

	// route to receive incoming research
	Route::post('/research/incoming/receive', 'OfficeClerkController@postReceiveIncomingResearch')->name('oc.receive.incoming.research.post');

	Route::get('/research/incoming/receive', function() {
		return redirect()->route('oc.incoming.research');
	});
	
	// route to outgoing research
	Route::get('/research/outgoing', 'OfficeClerkController@outgoingResearch')->name('oc.outgoing.research');

	// route to proceed to step 5 from step 4|
	Route::post('/research/outgoing/proceed/step/five', 'OfficeClerkController@postProceedStepFive')->name('oc.proceed.step.five');

	Route::get('/research/outgoing/proceed/step/five', function () {
		return redirect()->route('oc.outgoing.research');
	});

	// route to proceed to 8 from step 7
	Route::post('/research/outgoing/proceed/step/eight', 'OfficeClerkController@postProceedStepEight')->name('oc.proceed.step.eight.post');

	Route::get('/research/outgoing/proceed/step/eight', function () {
		return redirect()->route('oc.outgoing.research');
	});

	// route to proceed to 11  from step 7
	Route::post('/research/outgoing/proceed/step/eleven', 'OfficeClerkController@postProceedStepEleven')->name('oc.proceed.step.eleven.post');

	// route to proceed to 14 from step 13
	Route::post('/research/outgoing/proceed/step/fourteen', 'OfficeClerkController@postProceedStepFourteen')->name('oc.proceed.step.fourteen.post');


	// route to logout fr
	Route::get('/logout', 'OfficeClerkController@logout')->name('oc.logout');
});


// start of college clerk route group
Route::group(['prefix' => 'clerk', 'middleware' => ['check.cc', 'prevent.back.history']], function () {
	Route::get('/', 'CollegeClerkController@dashboard')->name('cc.dashboard');

	// route to access profile of college clerk
	Route::get('/profile', 'CollegeClerkController@profile')->name('cc.profile');

	// route to udpate profile
	Route::get('/profile/update', 'CollegeClerkController@updateProfile')->name('cc.profile.udpate');

	// route to post update profile
	Route::post('/profile/update', 'CollegeClerkController@postUpdateProfile')->name('cc.update.profile.post');

	// route to change password
	Route::get('/password', 'CollegeClerkController@changePassword')->name('cc.change.password');
	Route::post('/password', 'CollegeClerkController@postChangePassword')->name('cc.change.password.post');

	// route to go to add account
	Route::get('/add-account', 'CollegeClerkController@addAccount')->name('cc.add.account');

	// route to save new account
	Route::post('/add-account', 'CollegeClerkController@postAddAccount')->name('cc.add.account.post');

	// route to update account
	Route::get('/account/{id}/update', 'CollegeClerkController@updateAccount')->name('cc.update.account');

	// route to save update on account
	Route::post('/account/update', 'CollegeClerkController@postUpdateAccount')->name('cc.update.account.post');

	Route::get('/account/update', function () {
		return abort(404);
	});

	// route to reset password of a user
	Route::post('/reset/password', 'CollegeClerkController@postResetPassword')->name('cc.reset.password.post');

	// route to remove use account
	Route::post('/remove-account', 'CollegeClerkController@postRemoveAccount')->name('cc.remove.account.post');

	Route::get('/remove-account', function () {
		return abort(404);
	});

	// route to logout fr
	Route::get('/logout', 'CollegeClerkController@logout')->name('cc.logout');
});


// start of department research chairperson route group
Route::group(['prefix' => 'drc', 'middleware' => ['check.drc', 'prevent.back.history']], function () {
	Route::get('/', 'DrcController@dashboard')->name('drc.dashboard');

	// route to access profile of drc
	Route::get('/profile', 'DrcController@profile')->name('drc.profile');

	// route to udpate profile
	Route::get('/profile/update', 'DrcController@updateProfile')->name('drc.profile.udpate');

	// route to post update profile
	Route::post('/profile/update', 'DrcController@postUpdateProfile')->name('drc.update.profile.post');


	// route to change password
	Route::get('/password', 'DrcController@changePassword')->name('drc.change.password');

	Route::post('/password', 'DrcController@postChangePassword')->name('drc.change.password.post');

	// route to access incoming research
	Route::get('/research/incoming', 'DrcController@incomingResearch')->name('drc.incoming.research');

	// route to accept step 2 incoming research
	Route::post('/research/incoming/receive', 'DrcController@postReceiveIncomingResearch')->name('drc.receive.incoming.research.post');

	Route::get('/research/incoming/receive', function () {
		return redirect()->route('drc.incoming.research');
	});

	// route to access outgoing research
	Route::get('/research/outgoing', 'DrcController@outgoingResearch')->name('drc.outgoing.research');

	// route to proceed in step 3
	Route::post('/research/proceed/step/three', 'DrcController@postProceedStepThree')->name('dr.proceed.step.three');

	Route::get('/research/proceed/step/three', function () {
		return redirect()->route('drc.outgoing.research');
	});

	// route to proceed to step 6, inclueded with input of colloquium grade
	Route::post('/research/proceed/step/six', 'DrcController@postProceedStepSix')->name('dr.proceed.step.six');

	Route::get('/research/proceed/step/six', function() {
		return redirect()->route('drc.outgoing.research');
	});


	// route to track research document
	Route::get('/research/tracking/{id}', 'DrcController@trackResearch')->name('drc.track.research.document');

	// route to research details
	Route::get('/resaerch/{id}/details', 'DrcController@researchDetails')->name('drc.research.details');

	// route to go to forms
	Route::get('/forms', 'DrcController@forms')->name('drc.forms');

	// route to access send request forms
	Route::get('/form/send', 'DrcController@sendRequestForm')->name('drc.send.request.form');

	// route to send request forms
	Route::post('/form/send', 'DrcController@postSendRequestForm')->name('drc.send.request.form.post');

	// route to logout fr
	Route::get('/logout', 'DrcController@logout')->name('drc.logout');
});


// start of faculty researcher route group
Route::group(['prefix' => 'fr', 'middleware' => ['check.fr', 'prevent.back.history']], function () {

	// route to access profile
	Route::get('/profile', 'FacultyResearcherController@profile')->name('fr.profile');

	// route to udpate profile
	Route::get('/profile/update', 'FacultyResearcherController@updateProfile')->name('fr.profile.udpate');

	// route to post update profile
	Route::post('/profile/update', 'FacultyResearcherController@postUpdateProfile')->name('fr.update.profile.post');

	// route to change password
	Route::get('/password', 'FacultyResearcherController@changePassword')->name('fr.change.password');

	Route::post('/password', 'FacultyResearcherController@postChangePassword')->name('fr.change.password.post');

	// route to access dashboard
	Route::get('/', 'FacultyResearcherController@dashboard')->name('fr.dashboard');

	// route to submit research
	Route::post('/', 'FacultyResearcherController@postSubmitResearch')->name('fr.submit.research.post');

	// route to update research documents 
	Route::post('/research/document/update', 'FacultyResearcherController@postUpdateResearch')->name('fr.update.research.post');

	// route to view details of research
	Route::get('/research/{id}/details', 'FacultyResearcherController@researchDetails')->name('fr.research.details');

	// route to update research
	Route::get('/research/{id}/update', 'FacultyResearcherController@researchUpdate')->name('fr.research.update');

	// route to incoming research
	Route::get('/research/incoming', 'FacultyResearcherController@incomingResearch')->name('fr.incoming.research');

	// route to receive document research
	Route::post('/research/incoming/receive', 'FacultyResearcherController@postReceiveIncomingResearch')->name('fr.receive.incoming.research.post');

	Route::get('/research/incoming/receive', function () {
		return redirect()->route('fr.incoming.research');
	});

	// route to outgoing research
	Route::get('/research/outgoing', 'FacultyResearcherController@outgoingResearch')->name('fr.outgoing.research');

	// route to proceed research
	Route::post('/research/outgoing/proceed', 'FacultyResearcherController@postProceedOutgoingResearch')->name('fr.procced.outgoing.research.post');


	// route to view tracking of reserach document
	Route::get('/research/{id}/track/document', 'FacultyResearcherController@trackResearchDocument')->name('fr.track.research.document');


	// route to send progress report
	Route::get('/research/{id}/progress-report', 'FacultyResearcherController@sendProgressReport')->name('fr.send.progress.report');

	// route to save sent progress report
	Route::post('/research/progress-report', 'FacultyResearcherController@postSendProgressReport')->name('fr.send.progress.report.post');

	Route::get('/research/progress-report', function () {
		return redirect()->route('fr.dashboard');
	});


	// route to view forms
	Route::get('/forms', 'FacultyResearcherController@forms')->name('fr.forms');

	// route to upload request form
	Route::post('/forms', 'FacultyResearcherController@postRequestForm')->name('fr.form.request.post');

	// route to access send forms
	Route::get('/form/send', 'FacultyResearcherController@sendRequestForm')->name('fr.send.request.form');

	// route to logout fr
	Route::get('/logout', 'FacultyResearcherController@logout')->name('fr.logout');
});








// downloadable forms routes here
Route::get('/downloadable/form/{filename}', 'AdminController@downloadForm')->name('admin.download.form');

// route to download all research project documents in zip for
Route::get('/research/{id}/download/zipped', 'GeneralController@downloadResearchZip')->name('download.research.zip');


// route to download form request
Route::get('/form/request/{id}/download', 'GeneralController@downloadFormRequest')->name('download.form.request');

// route to download progress report
Route::get('/research/progress-report/{id}/download', 'AdminController@downloadProgressReport')->name('admin.download.progress.report');



// route to add notification in notification div
Route::get('/notifications', 'GeneralController@notifications')->name('notifications');

Route::get('/notification-count', 'GeneralController@notificationCount')->name('notification.count');

Route::get('/notification-badge', 'GeneralController@notificationBadge')->name('notification.badge');


// route to read notification
Route::get('/notification/read/{id}', 'GeneralController@notificationRead')->name('notification.read');