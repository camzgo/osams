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

Route::get('/', 'FrontendController@fronte');

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


Route::prefix('scholarship')->group(function(){
    Route::get('/getdata', 'ScholarshipMainController@getdata')->name('scholar.getdata');
    Route::post('/postdata', 'ScholarshipMainController@postdata')->name('scholar.postdata');
    Route::get('/fetchdata', 'ScholarshipMainController@fetchdata')->name('scholar.fetchdata');
    Route::get('/removedata', 'ScholarshipMainController@removedata')->name('scholar.removedata');
});

// Route::get('scholarship/getstat', 'ScholarshipMainController@getstat')->name('scholar.getstat');

Route::prefix('faqs')->group(function(){
    Route::get('/getdata', 'FaqsMainController@getdata')->name('faqs.getdata');
    Route::post('/postdata', 'FaqsMainController@postdata')->name('faqs.postdata');
    Route::get('/fetchdata', 'FaqsMainController@fetchdata')->name('faqs.fetchdata');
});
// Route::get('faqs/removedata', 'FaqsMainController@removedata')->name('faqs.removedata');
// Route::get('faqs/massremove', 'FaqsMainController@massremove')->name('faqs.massremove');

Route::prefix('announcement')->group(function(){
    Route::get('/getdata', 'AnnounceMainController@getdata')->name('announce.getdata');
    Route::get('/fetchdata', 'AnnounceMainController@fetchdata')->name('announce.fetchdata');
    Route::post('/postdata', 'AnnounceMainController@postdata')->name('announce.postdata');
});


Route::prefix('applicant')->group(function(){
    Route::get('/getdata', 'ApplicantMainController@getdata')->name('applicant.getdata');
    Route::post('/postdata', 'ApplicantMainController@postdata')->name('applicant.postdata');
    Route::get('/fetchdata', 'ApplicantMainController@fetchdata')->name('applicant.fetchdata');
});


Route::prefix('archive/faqs')->group(function(){
    Route::get('/getdata', 'FaqArchiveController@getdata')->name('archivefaqs.getdata');
    Route::get('/fetchdata', 'FaqArchiveController@fetchdata')->name('archivefaqs.fetchdata');
    Route::post('/postdata', 'FaqArchiveController@postdata')->name('archivefaqs.postdata');
    Route::get('/removedata', 'FaqArchiveController@removedata')->name('archivefaqs.removedata');
});


Route::prefix('archive/announcement')->group(function(){
    Route::get('/getdata', 'AnnounceArchiveController@getdata')->name('archiveannounce.getdata');
    Route::get('/fetchdata', 'AnnounceArchiveController@fetchdata')->name('archiveannounce.fetchdata');
    Route::post('/postdata', 'AnnounceArchiveController@postdata')->name('archiveannounce.postdata');
    Route::get('/removedata', 'AnnounceArchiveController@removedata')->name('archiveannounce.removedata');
});


Route::prefix('archive/applicant')->group(function(){
    Route::get('/getdata', 'ApplicantArchiveController@getdata')->name('archiveapplicant.getdata');
    Route::get('/fetchdata', 'ApplicantArchiveController@fetchdata')->name('archiveapplicant.fetchdata');
    Route::post('/postdata', 'ApplicantArchiveController@postdata')->name('archiveapplicant.postdata');
    Route::get('/removedata', 'ApplicantArchiveController@removedata')->name('archiveapplicant.removedata'); 
});

Route::prefix('employee')->group(function(){
    Route::get('/getdata', 'UsersMainController@getdata')->name('users.getdata');
    Route::get('/fetchdata', 'UsersMainController@fetchdata')->name('users.fetchdata');
    Route::post('/postdata', 'UsersMainController@postdata')->name('users.postdata');
    Route::get('/removedata', 'UsersMainController@removedata')->name('users.removedata'); 
    Route::post('/', 'UsersMainController@store')->name('users.store');
    Route::get('/create', 'UsersMainController@create');
    Route::post('/create/fetch', 'UsersMainController@fetch')->name('users.fetch');
});

Route::prefix('archive/employee')->group(function()
{
    Route::get('/getdata', 'UsersArchiveController@getdata')->name('archiveusers.getdata');
    Route::get('/fetchdata', 'UsersArchiveController@fetchdata')->name('archiveusers.fetchdata');
    Route::post('/postdata', 'UsersArchiveController@postdata')->name('archiveusers.postdata');
    Route::get('/removedata', 'UsersArchiveController@removedata')->name('archiveusers.removedata'); 
    Route::get('/', 'UsersArchiveController@index');
});


Route::prefix('archive/application')->group(function()
{
    Route::get('/', 'ApplicationArchiveController@index');
    Route::get('/getdata', 'ApplicationArchiveController@getdata')->name('archiveapplication.getdata');
    // Route::get('/getdata2', 'ApplicationMainController@getdata2')->name('application.getdata2');
    Route::post('/postdata', 'ApplicationArchiveController@postdata')->name('archiveapplication.postdata');
    Route::get('/fetchdata', 'ApplicationArchiveController@fetchdata')->name('archiveapplication.fetchdata');
    Route::get('/removedata', 'ApplicationArchiveController@removedata')->name('archiveapplication.removedata'); 
});

Route::prefix('apply/scholarship-category')->group(function(){

    
    Route::get('/eefap2', 'ScholarshipCatController@shoW');
    Route::post('/eefap/fetch', 'ScholarshipCatController@fetch')->name('eefap.fetch');
    
    Route::post('/pcl/fetch', 'ScholarshipCatController@pfetch')->name('pcl.fetch');
    Route::get('/eefap-gv/{id}', 'ScholarshipCatController@gvShow');
    Route::post('/eefap', 'ScholarshipCatController@eefapStore');
    Route::post('/eefap-gv', 'ScholarshipCatController@eefapgvStore');
    Route::post('/pcl', 'ScholarshipCatController@pclStore');
// });

    Route::get('/gad/{id}', 'ScholarshipCatController@gadShow');
    Route::get('/graduate-private/{id}', 'ScholarshipCatController@gradprivate');
    Route::get('/graduate-public/{id}', 'ScholarshipCatController@gradpublic');
    Route::get('/ncw/{id}', 'ScholarshipCatController@ncw');
    Route::get('/vg-oldnew/{id}', 'ScholarshipCatController@oldnew');


    Route::get('/honor-rank/{id}', 'ScholarshipCatController@honors');
    Route::get('/vg-dhvtsu/{id}', 'ScholarshipCatController@dhvtsu');

    Route::get('/pcl/{id}', 'ScholarshipCatController@pclShow');
});


Route::prefix('apply')->group(function(){
    Route::get('/getdata', 'ApplyController@getdata')->name('apply.getdata');
    Route::get('/getdata2', 'ApplyController@applydata')->name('apply.data');
    Route::get('/getdata3', 'ApplyController@scholardata')->name('apply.scholardata');
    Route::get('/scholarship-category', 'ApplyController@showCat');
    Route::get('/send', 'ApplyController@showsend');
});


Route::prefix('application')->group(function()
{
    Route::get('/getdata', 'ApplicationMainController@getdata')->name('application.getdata');
    Route::get('/getdata2', 'ApplicationMainController@getdata2')->name('application.getdata2');
    Route::post('/postdata', 'ApplicationMainController@postdata')->name('application.postdata');
    Route::get('/fetchdata', 'ApplicationMainController@fetchdata')->name('application.fetchdata');
});
Route::prefix('approve')->group(function()
{
    Route::get('/', 'ApproveController@approveShow');
    Route::get('/fetchdata', 'ApproveController@searchData')->name('search.fetchdata');
    Route::post('/', 'ApproveController@approved')->name('approved.postdata');
    Route::get('/getdata', 'ApproveController@listapproved')->name('list.getdata');
});


Route::prefix('permission-access')->group(function(){
    Route::get('/', 'UtilitiesController@permission');
    Route::get('/getdata', 'UtilitiesController@getdata')->name('permission.getdata');
    Route::post('/postdata', 'UtilitiesController@postdata')->name('permission.postdata');
    Route::get('/fetchdata', 'UtilitiesController@fetchdata')->name('permission.fetchdata');
    Route::get('/removedata', 'UtilitiesController@removedata')->name('permission.removedata'); 
});


Route::get('/reg/success', 'RegisterMainController@send');
Route::get('/admindash', 'ApproveController@admindash');
Route::get('/barcode', 'BarcodeController@barcode');

Route::prefix('fronte')->group(function()
{
    Route::get('/', 'FrontendController@fronte');
    Route::get('/faqs', 'FrontendController@faq');
    Route::get('/about-us', 'FrontendController@about');
    Route::get('/contact', 'FrontendController@contact');
    Route::get('/profile', 'FrontendController@profile');
    Route::get('/scholarship', 'FrontendController@scholarship');
    Route::get('/scholarship/details', 'FrontendController@sdetails');
    Route::get('/profile/personal-information', 'FrontendController@myProfile');
    Route::get('/profile/guardian-information', 'FrontendController@guardian');
    Route::get('/profile/education-information', 'FrontendController@education');
    Route::get('/account', 'FrontendController@account');
    Route::post('/profile/personal-information/fetch', 'FrontendController@fetch')->name('profile.fetch');
});



Route::get('/pampanga','AddressController@municipal');
Route::get('/json-barangay','AddressController@barangay');


Route::get('/indonesia','CountryController@provinces');

Route::get('/json-regencies','CountryController@regencies');

Route::get('/json-districts', 'CountryController@districts');

Route::get('/json-village', 'CountryController@villages');
// Route::get ( '/here', function () {
//     $data = Data::all ();
//     return view ('admin.file_maintenance.applicant.sample')->withData ( $data );
// } );


// Route::resource('admin', 'AdminPagesController');

Route::resource('applicant', 'ApplicantMainController');
Route::resource('application', 'ApplicationMainController');
Route::resource('announcement', 'AnnounceMainController');
Route::resource('faqs', 'FaqsMainController');
Route::resource('scholarship', 'ScholarshipMainController');
Route::resource('employee', 'UsersMainController');
Route::resource('reg', 'RegisterMainController');
Route::resource('apply', 'ApplyController');
Route::resource('archive/faqs', 'FaqArchiveController');
Route::resource('archive/announcement', 'AnnounceArchiveController');
Route::resource('archive/applicant', 'ApplicantArchiveController');

Route::get('create', 'DisplayDataController@create');
Route::get('getdata', 'DisplayDataController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/user/logout', 'Auth\LoginController@user_logout')->name('user.logout');

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});


