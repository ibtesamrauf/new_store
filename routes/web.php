<?php

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
    return view('welcome');
});

Auth::routes();
Auth::routes(['register' => false]);
Route::get('/admin', function () {
    return redirect('login');
});
Route::group(['middleware' => 'auth', 'prefix' => 'admin/'], function() {
	Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');
	Route::get('table_sample', 'Admin\DashboardController@tableSample')->name('tableSample');
	Route::get('form_sample', 'Admin\DashboardController@formSample')->name('formSample');

	Route::resource('categorie', 'Admin\CategorieController');

});
Route::get('/home', 'HomeController@index')->name('home');