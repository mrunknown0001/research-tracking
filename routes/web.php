<?php

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::post('/', 'LoginController@postLogin')->name('login.post');
