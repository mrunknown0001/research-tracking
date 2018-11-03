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

	// route to go to incomming research
	Route::get('/research/incoming', 'AdminController@incomingResearch')->name('admin.incoming.research');

	// route to go to outgoing research
	Route::get('/research/outgoing', 'AdminController@outgoingResearch')->name('admin.outgoing.research');

	Route::get('/logout', 'AdminController@logout')->name('admin.logout');
});

// end of admin route group
 

// start of office clerk route group
Route::group(['prefix' => 'oc', 'middleware' => ['check.oc', 'prevent.back.history']], function () {
	Route::get('/', 'OfficeClerkController@dashboard')->name('oc.dashboard');


	// route to logout fr
	Route::get('/logout', 'OfficeClerkController@logout')->name('oc.logout');
});


// start of college clerk route group
Route::group(['prefix' => 'clerk', 'middleware' => ['check.cc', 'prevent.back.history']], function () {
	Route::get('/', 'CollegeClerkController@dashboard')->name('cc.dashboard');


	// route to logout fr
	Route::get('/logout', 'CollegeClerkController@logout')->name('cc.logout');
});


// start of department research chairperson route group
Route::group(['prefix' => 'drc', 'middleware' => ['check.drc', 'prevent.back.history']], function () {
	Route::get('/', 'DrcController@dashboard')->name('drc.dashboard');


	// route to logout fr
	Route::get('/logout', 'DrcController@logout')->name('drc.logout');
});


// start of faculty researcher route group
Route::group(['prefix' => 'fr', 'middleware' => ['check.fr', 'prevent.back.history']], function () {
	Route::get('/', 'FacultyResearcherController@dashboard')->name('fr.dashboard');


	// route to logout fr
	Route::get('/logout', 'FacultyResearcherController@logout')->name('fr.logout');
});