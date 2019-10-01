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
Route::get('/admin/list','Mst_AdminController@index');
Route::get('/admin/create','Mst_AdminController@create');
Route::post('/admin/store', 'Mst_AdminController@store');
Route::get('/admin/show/{id}', 'Mst_AdminController@show');
Route::get('/admin/edit', 'Mst_AdminController@edit');
Route::post('/admin/update', 'Mst_AdminController@update');
Route::get('/admin/delete/{id}', 'Mst_AdminController@destroy');

// Semester Controller
Route::get('/semester','Mst_SemesterController@index');
Route::get('/semester/create','Mst_SemesterController@create');
Route::post('/semester/store','Mst_SemesterController@store');
Route::get('/semester/delete/{id}','Mst_SemesterController@destroy');

//year controller
Route::get('/year','Mst_YearController@index');

//Department
Route::get('/department','Mst_DepartmentController@index');
Route::get('/department/create','Mst_DepartmentController@create');
Route::post('/department/store','Mst_DepartmentController@store');
Route::get('/department/edit/{id}','Mst_DepartmentController@edit');
Route::post('/department/update/{id}','Mst_DepartmentController@update');

//mst_class controller
Route::get('/class','Mst_ClassnameController@index');

// mst_subject controller
Route::get('/subject','Mst_SubjectController@index');
Route::get('/subject/create','Mst_SubjectController@create');
Route::post('/subject/store','Mst_SubjectController@store');

//setting controller
Route::get('/setting','SettingController@index');
Route::post('/setting/store','SettingController@store');
Route::post('/setting/update/{id}','SettingController@update');
//Route::post('/setting/update/{{$id}}','SettingController@update');

//Admission Controller\
Route::get('dropdownlist/getstates/{id}','AdmissionController@getStates');
Route::get('admission/new','AdmissionController@create');


/// Testcontroller
Route::get('/create','TestController@create');
Route::post('/store','TestController@store');
