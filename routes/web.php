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

Route::get('/frontend', function () {
    return view('applicant_frontend.dashboard');
});
// Route::get('ajaxdata', 'AjaxdataController@index')->name('ajaxdata');
// Route::get('ajaxdata/getdata', 'AjaxdataController@getdata')->name('ajaxdata.getdata');
Route::get('ajaxdata', 'AjaxdataController@index')->name('ajaxdata');
Route::get('ajaxdata/getdata', 'AjaxdataController@getdata')->name('ajaxdata.getdata');

Route::post('ajaxdata/postdata', 'AjaxdataController@postdata')->name('ajaxdata.postdata');

Route::get('ajaxdata/fetchdata', 'AjaxdataController@fetchdata')->name('ajaxdata.fetchdata');
Route::get('ajaxdata/removedata', 'AjaxdataController@removedata')->name('ajaxdata.removedata');
Route::get('ajaxdata/massremove', 'AjaxdataController@massremove')->name('ajaxdata.massremove');

Route::get('scholarship/getdata', 'ScholarshipMainController@getdata')->name('scholar.getdata');
Route::post('scholarship/postdata', 'ScholarshipMainController@postdata')->name('scholar.postdata');
Route::get('scholarship/fetchdata', 'ScholarshipMainController@fetchdata')->name('scholar.fetchdata');
Route::get('scholarship/removedata', 'ScholarshipMainController@removedata')->name('scholar.removedata');
Route::get('scholarship/getstat', 'ScholarshipMainController@getstat')->name('scholar.getstat');

Route::get('faqs/getdata', 'FaqsMainController@getdata')->name('faqs.getdata');
Route::post('faqs/postdata', 'FaqsMainController@postdata')->name('faqs.postdata');
Route::get('faqs/fetchdata', 'FaqsMainController@fetchdata')->name('faqs.fetchdata');
Route::get('faqs/removedata', 'FaqsMainController@removedata')->name('faqs.removedata');
Route::get('faqs/massremove', 'FaqsMainController@massremove')->name('faqs.massremove');


Route::get('apply/getdata', 'ApplyController@getdata')->name('apply.getdata');


// Route::get ( '/here', function () {
//     $data = Data::all ();
//     return view ('admin.file_maintenance.applicant.sample')->withData ( $data );
// } );


Route::resource('admin', 'AdminPagesController');

Route::resource('applicant', 'ApplicantMainController');
Route::resource('application', 'ApplicationMainController');
Route::resource('announcement', 'AnnounceMainController');
Route::resource('faqs', 'FaqsMainController');
Route::resource('scholarship', 'ScholarshipMainController');
Route::resource('users', 'UsersMainController');
Route::resource('reg', 'RegisterMainController');
Route::resource('apply', 'ApplyController');



Route::get('create', 'DisplayDataController@create');
Route::get('getdata', 'DisplayDataController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

