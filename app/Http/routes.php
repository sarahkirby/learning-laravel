<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('about', function () {
	return view('about');
});

Route::get('contact', function () {
	return view('contact');
});

Route::post('contact', function() {
	return 'Sent contact form';
});

// get request products page. Calls Products Controller and run function index
Route::get('products', 'ProductsController@index');
Route::get('products/create', 'ProductsController@create')->middleware('web');
// when submit form - post request and store function. middleware - authentication - login restigation etc i think. This is how we display $errors
Route::post('products/store', 'ProductsController@store')->middleware('web');
// Single product page
Route::get('products/{id}', 'ProductsController@show');
Route::get('products/{id}/edit', 'ProductsController@edit')->middleware('web');
Route::post('products/{id}/edit', 'ProductsController@update')->middleware('web');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
