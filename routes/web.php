<?php

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/login', function () {
	return redirect()->route('login');
});

Route::post('/login', 'LoginController@postLogin')->name('login.post');

