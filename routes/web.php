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
//Route::get('/pdf','route');
Route::get('pdf', function(){
    $fpdf = new Fpdf();
    $fpdf->AddPage();
    $fpdf->SetFont('Arial','B',16);
    $fpdf->Cell(40,10,'Hello World!');
    $fpdf->Output();
    exit;
    
    });


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
Route::get('/year/create','Mst_YearController@create');
Route::post('/year/store','Mst_YearController@store');
Route::get('/year/inactive/{year_id}','Mst_YearController@inactive');

//Department
Route::get('/department','Mst_DepartmentController@index');
Route::get('/department/create','Mst_DepartmentController@create');
Route::post('/department/store','Mst_DepartmentController@store');
Route::get('/department/edit/{id}','Mst_DepartmentController@edit');
Route::post('/department/update/{id}','Mst_DepartmentController@update');
Route::get('/department/inactive/{id}','Mst_DepartmentController@inactive');

//mst_class controller
Route::get('/class','Mst_ClassnameController@index');
Route::get('/class/create','Mst_ClassnameController@create');
Route::post('/class/store','Mst_ClassnameController@store');
Route::get('/class/inactive/{class_id}','Mst_ClassnameController@destroy');

// mst_subject controller
Route::get('/subject','Mst_SubjectController@index');
Route::get('/subject/create','Mst_SubjectController@create');
Route::post('/subject/store','Mst_SubjectController@store');
Route::get('/subject/inactive/{subject_id}','Mst_SubjectController@inactive');

//setting controller
Route::get('/setting','SettingController@index');
Route::post('/setting/store','SettingController@store');
Route::post('/setting/update/{id}','SettingController@update');
//Route::post('/setting/update/{{$id}}','SettingController@update');

//Admission Controller
Route::get('admission','AdmissionController@index');
Route::get('admission/new','AdmissionController@create');
Route::post('admission/store','AdmissionController@store');
Route::get('admission/view/{id}','AdmissionController@show');
Route::get('admission/edit/{id}','AdmissionController@edit');
Route::post('admission/update/{id}','AdmissionController@update');
Route::get('admission/downloadall','AdmissionController@downloadallstudent');
Route::get('admission/downloadstudent/{id}','AdmissionController@downloadstudent');


//RegistrationController
Route::get('/registration','StudentRegistrationController@index');
Route::get('/registration/new','StudentRegistrationController@create');
Route::get('/registration/store','StudentRegistrationController@store');

/// ResultController controller
Route::get('/result/create','ResultController@create');
Route::post('/result/store','ResultController@store');

//MstCollectionCategoryController
Route::get('/collectioncategory','MstCollectionCategoryController@index');
Route::get('/collectioncategory/create','MstCollectionCategoryController@create');
Route::post('/collectioncategory/store','MstCollectionCategoryController@store');
Route::get('/collectioncategory/inactive/{id}','MstCollectionCategoryController@inactive');
Route::get('/collectioncategory/edit/{id}','MstCollectionCategoryController@edit');
Route::post('/collectioncategory/update/{id}','MstCollectionCategoryController@update');

//TutionFeeController
Route::get('/tution/create','TutionFeeController@create');

// CollectionController
Route::get('/collection','CollectionController@index');
// uploadcontroller just for test
Route::get('upload','UploadTest@index');
Route::post('upload/store','UploadTest@store');

//AjaxLive Just for test controller and its resources
Route::get('/ajax','AjaxLive@index');
Route::get('/search','AjaxLive@search');

//LibSubject
Route::get('/lib/subject/','LibSubjectController@index');
Route::get('/lib/subject/create','LibSubjectController@create');
Route::post('/lib/subject/store','LibSubjectController@store');

//LibClass
Route::get('/lib/class/','LibClassController@index');
Route::get('/lib/class/create','LibClassController@create');
Route::post('/lib/class/store','LibClassController@store');