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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/temp','HomeController@temp');


// Master Data route
//Admin Controller
Route::get('/admin/list','AdminController@index');
Route::get('/admin/create','AdminController@create');
Route::post('/admin/store', 'AdminController@store');
Route::get('/admin/show/{id}', 'AdminController@show');
Route::get('/admin/edit', 'AdminController@edit');
Route::post('/admin/update', 'AdminController@update');
Route::get('/admin/delete/{id}', 'AdminController@destroy');

// Semester Controller
Route::get('/semester','SemesterController@index');
Route::get('/semester/create','SemesterController@create');
Route::post('/semester/store','SemesterController@store');
Route::get('/semester/delete/{id}','SemesterController@destroy');

//year controller
Route::get('/year','YearController@index');