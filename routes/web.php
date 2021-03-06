<?php

require_once(app_path('Helpers/Input.php'));

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {

	Route::resource('news', 'NewsController');
	
	Route::group(['prefix' => 'profile'], function() {
		Route::get('/edit', 'ProfileController@edit')->name('profile.edit');
		Route::put('/update', 'ProfileController@update')->name('profile.update');
		// Route::get('/edit', function() {
		// 	dd('profile edit');
		// })->name('user.edit');
	});
});
