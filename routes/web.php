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

Route::group(array('prefix' => 'roles'), function() {
	Route::get('/create', 'RoleController@index')->name('role.create');
	Route::post('/store', 'RoleController@store')->name('role.store');
});

Route::group(array('prefix' => 'staff', 'middleware' => 'auth'), function() {
	Route::get('/index', 'StaffController@index')->name('staff.index');
	Route::get('/{user}/delete', 'StaffController@destroy')->name('staff.delete');
	Route::get('/{user}/edit', 'StaffController@edit')->name('staff.edit');
	Route::post('/{user}/update', 'StaffController@update')->name('staff.update');
	Route::post('/search', 'StaffController@search')->name('staff.search');
});