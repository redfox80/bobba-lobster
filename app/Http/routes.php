<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('login');
})->name('login');


Route::group(['prefix' => 'home'], function(){

	Route::get('/about', function(){
		return view('about');
	});

	Route::get('', function(){
		return view('home');
	});
});


Route::group(['prefix' => 'test'], function() {

	Route::get('test', function(){
		return view('login');
	});

	Route::get('', function(){
		return view('welcome');
	});
});