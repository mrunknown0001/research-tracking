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

	// route to go to forms
	Route::get('/forms', 'AdminController@forms')->name('admin.forms');

	// route to go to researches
	Route::get('/research', 'AdminController@research')->name('admin.research');

	// route to go to accounts
	Route::get('/accounts', 'AdminController@accounts')->name('admin.accounts');

	Route::get('/logout', 'AdminController@logout')->name('admin.logout');
});

// end of admin route group
 

// start of office clerk route group
Route::group(['prefix' => 'oc', 'middleware' => ['check.oc', 'prevent.back.history']], function () {
	Route::get('/', 'OfficeClerkController@dashboard')->name('oc.dashboard');

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

	// route to logout fr
	Route::get('/logout', 'OfficeClerkController@logout')->name('oc.logout');
});


// start of college clerk route group
Route::group(['prefix' => 'clerk', 'middleware' => ['check.cc', 'prevent.back.history']], function () {
	Route::get('/', 'CollegeClerkController@dashboard')->name('cc.dashboard');

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

	// route to go to forms
	Route::get('/forms', 'DrcController@forms')->name('drc.forms');

	// route to access send request forms
	Route::get('/form/send', 'DrcController@sendRequestForm')->name('drc.send.request.form');

	// route to logout fr
	Route::get('/logout', 'DrcController@logout')->name('drc.logout');
});


// start of faculty researcher route group
Route::group(['prefix' => 'fr', 'middleware' => ['check.fr', 'prevent.back.history']], function () {

	// route to access profile
	Route::get('/profile', 'FacultyResearcherController@profile')->name('fr.profile');

	// route to access dashboard
	Route::get('/', 'FacultyResearcherController@dashboard')->name('fr.dashboard');

	// route to submit research
	Route::post('/', 'FacultyResearcherController@postSubmitResearch')->name('fr.submit.research.post');

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




	// route to view forms
	Route::get('/forms', 'FacultyResearcherController@forms')->name('fr.forms');

	// route to access send forms
	Route::get('/form/send', 'FacultyResearcherController@sendRequestForm')->name('fr.send.request.form');

	// route to logout fr
	Route::get('/logout', 'FacultyResearcherController@logout')->name('fr.logout');
});








// downloadable forms routes here
Route::get('/downloadable/form/{filename}', 'AdminController@downloadForm')->name('admin.download.form');

// route to download all research project documents in zip for
Route::get('/research/{id}/download/zipped', 'GeneralController@downloadResearchZip')->name('download.research.zip');