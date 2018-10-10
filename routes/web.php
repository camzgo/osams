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

// Route::get('/frontend', function () {
//     return view('applicant_frontend.dashboard');
// });
// Route::get('ajaxdata', 'AjaxdataController@index')->name('ajaxdata');
// Route::get('ajaxdata/getdata', 'AjaxdataController@getdata')->name('ajaxdata.getdata');
Route::get('ajaxdata', 'AjaxdataController@index')->name('ajaxdata');
Route::get('ajaxdata/getdata', 'AjaxdataController@getdata')->name('ajaxdata.getdata');

Route::post('ajaxdata/postdata', 'AjaxdataController@postdata')->name('ajaxdata.postdata');

Route::get('ajaxdata/fetchdata', 'AjaxdataController@fetchdata')->name('ajaxdata.fetchdata');
Route::get('ajaxdata/removedata', 'AjaxdataController@removedata')->name('ajaxdata.removedata');
Route::get('ajaxdata/massremove', 'AjaxdataController@massremove')->name('ajaxdata.massremove');


Route::prefix('admin/scholarship')->group(function(){
    Route::get('/getdata', 'ScholarshipMainController@getdata')->name('scholar.getdata');
    Route::post('/postdata', 'ScholarshipMainController@postdata')->name('scholar.postdata');
    Route::get('/fetchdata', 'ScholarshipMainController@fetchdata')->name('scholar.fetchdata');
    Route::get('/removedata', 'ScholarshipMainController@removedata')->name('scholar.removedata');
});

// Route::get('scholarship/getstat', 'ScholarshipMainController@getstat')->name('scholar.getstat');

Route::prefix('admin/faqs')->group(function(){
    Route::get('/getdata', 'FaqsMainController@getdata')->name('faqs.getdata');
    Route::post('/postdata', 'FaqsMainController@postdata')->name('faqs.postdata');
    Route::get('/fetchdata', 'FaqsMainController@fetchdata')->name('faqs.fetchdata');
});
// Route::get('faqs/removedata', 'FaqsMainController@removedata')->name('faqs.removedata');
// Route::get('faqs/massremove', 'FaqsMainController@massremove')->name('faqs.massremove');

Route::prefix('admin/announcement')->group(function(){
    Route::get('/getdata', 'AnnounceMainController@getdata')->name('announce.getdata');
    Route::get('/fetchdata', 'AnnounceMainController@fetchdata')->name('announce.fetchdata');
    Route::post('/postdata', 'AnnounceMainController@postdata')->name('announce.postdata');
});


Route::prefix('admin/applicant')->group(function(){
    Route::get('/getdata', 'ApplicantMainController@getdata')->name('applicant.getdata');
    Route::post('/postdata', 'ApplicantMainController@postdata')->name('applicant.postdata');
    Route::get('/fetchdata', 'ApplicantMainController@fetchdata')->name('applicant.fetchdata');
    Route::get('/reg/success', 'ApplicantMainController@sendsuccess');
});


Route::prefix('admin/archive/faqs')->group(function(){
    Route::get('/getdata', 'FaqArchiveController@getdata')->name('archivefaqs.getdata');
    Route::get('/fetchdata', 'FaqArchiveController@fetchdata')->name('archivefaqs.fetchdata');
    Route::post('/postdata', 'FaqArchiveController@postdata')->name('archivefaqs.postdata');
    Route::get('/removedata', 'FaqArchiveController@removedata')->name('archivefaqs.removedata');
});


Route::prefix('admin/archive/announcement')->group(function(){
    Route::get('/getdata', 'AnnounceArchiveController@getdata')->name('archiveannounce.getdata');
    Route::get('/fetchdata', 'AnnounceArchiveController@fetchdata')->name('archiveannounce.fetchdata');
    Route::post('/postdata', 'AnnounceArchiveController@postdata')->name('archiveannounce.postdata');
    Route::get('/removedata', 'AnnounceArchiveController@removedata')->name('archiveannounce.removedata');
});


Route::prefix('admin/archive/applicant')->group(function(){
    Route::get('/getdata', 'ApplicantArchiveController@getdata')->name('archiveapplicant.getdata');
    Route::get('/fetchdata', 'ApplicantArchiveController@fetchdata')->name('archiveapplicant.fetchdata');
    Route::post('/postdata', 'ApplicantArchiveController@postdata')->name('archiveapplicant.postdata');
    Route::get('/removedata', 'ApplicantArchiveController@removedata')->name('archiveapplicant.removedata'); 
});

Route::prefix('admin/employee')->group(function(){
    Route::get('/getdata', 'UsersMainController@getdata')->name('users.getdata');
    Route::get('/fetchdata', 'UsersMainController@fetchdata')->name('users.fetchdata');
    Route::post('/postdata', 'UsersMainController@postdata')->name('users.postdata');
    Route::get('/removedata', 'UsersMainController@removedata')->name('users.removedata'); 
    Route::post('/', 'UsersMainController@store')->name('users.store');
    Route::get('/create', 'UsersMainController@create');
    Route::post('/create/fetch', 'UsersMainController@fetch')->name('users.fetch');
});

Route::prefix('admin/archive/employee')->group(function()
{
    Route::get('/getdata', 'UsersArchiveController@getdata')->name('archiveusers.getdata');
    Route::get('/fetchdata', 'UsersArchiveController@fetchdata')->name('archiveusers.fetchdata');
    Route::post('/postdata', 'UsersArchiveController@postdata')->name('archiveusers.postdata');
    Route::get('/removedata', 'UsersArchiveController@removedata')->name('archiveusers.removedata'); 
    Route::get('/', 'UsersArchiveController@index');
});


Route::prefix('admin/archive/application')->group(function()
{
    Route::get('/', 'ApplicationArchiveController@index');
    Route::get('/getdata', 'ApplicationArchiveController@getdata')->name('archiveapplication.getdata');
    // Route::get('/getdata2', 'ApplicationMainController@getdata2')->name('application.getdata2');
    Route::post('/postdata', 'ApplicationArchiveController@postdata')->name('archiveapplication.postdata');
    Route::get('/fetchdata', 'ApplicationArchiveController@fetchdata')->name('archiveapplication.fetchdata');
    Route::get('/removedata', 'ApplicationArchiveController@removedata')->name('archiveapplication.removedata'); 
});

Route::prefix('admin/apply/scholarship-category')->group(function(){

    
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


Route::prefix('admin/apply')->group(function(){
    Route::get('/getdata', 'ApplyController@getdata')->name('apply.getdata');
    Route::get('/getdata2', 'ApplyController@applydata')->name('apply.data');
    Route::get('/getdata3', 'ApplyController@scholardata')->name('apply.scholardata');
    Route::get('/scholarship-category', 'ApplyController@showCat');
    Route::get('/send/{id}', 'ApplyController@showsend');
    Route::get('/application/form/{id}', 'ScholarshipCatController@printeefap');
    Route::get('/invalid', 'ScholarshipCatController@spes3');
    Route::get('/invalid2', 'ScholarshipCatController@spes4');
});


Route::prefix('admin/application')->group(function()
{
    Route::get('/getdata', 'ApplicationMainController@getdata')->name('application.getdata');
    Route::get('/getdata2', 'ApplicationMainController@getdata2')->name('application.getdata2');
    Route::get('/getdata3', 'ApplicationMainController@getdata3')->name('application.getdata3');
    Route::post('/postdata', 'ApplicationMainController@postdata')->name('application.postdata');
    Route::get('/fetchdata', 'ApplicationMainController@fetchdata')->name('application.fetchdata');
    Route::get('/details/{app}/{scid}', 'ApplicationMainController@scdetails');


});
Route::prefix('admin/approve')->group(function()
{
    Route::get('/', 'ApproveController@approveShow');
    Route::get('/fetchdata', 'ApproveController@searchData')->name('search.fetchdata');
    Route::post('/', 'ApproveController@approved')->name('approved.postdata');
    Route::get('/getdata', 'ApproveController@listapproved')->name('list.getdata');
    Route::get('/getdata2', 'ApproveController@listapproved2')->name('list.getdata2');
});


Route::prefix('admin/permission')->group(function(){
    Route::get('/', 'UtilitiesController@permission');
    Route::get('/getdata', 'UtilitiesController@getdata')->name('permission.getdata');
    Route::post('/postdata', 'UtilitiesController@postdata')->name('permission.postdata');
    Route::get('/fetchdata', 'UtilitiesController@fetchdata')->name('permission.fetchdata');
    Route::get('/removedata', 'UtilitiesController@removedata')->name('permission.removedata'); 
});

Route::prefix('admin/backup-restore')->group(function()
{
    Route::get('/', 'UtilitiesController@backup_restore');
    Route::get('/backup', 'UtilitiesController@backup2');
    Route::get('/getdata2', 'UtilitiesController@getdata2')->name('backup.getdata');
    Route::post('/postdata', 'UtilitiesController@postdata')->name('permission.postdata');
});
Route::prefix('admin/reports')->group(function()
{
    Route::get('/master-list', 'ReportsController@index');
    Route::get('/master-list/applicant/{data}', 'ReportsController@appreports');
    Route::get('/master-list/applied/{data}', 'ReportsController@appreports2');
    Route::get('/master-list/applicant/municipality/{data}', 'ReportsController@appmuni');
    Route::get('/master-list/applied/municipality/{data}', 'ReportsController@appmuni2');
    Route::get('/master-list/applicant/scholarship/{data}', 'ReportsController@appsc');
    Route::get('/master-list/scholarship', 'ReportsController@screpo');
    Route::get('/master-list/form-1', 'ReportsController@af1');
    Route::get('/master-list/form-2', 'ReportsController@af2');
    Route::get('/master-list/form-3', 'ReportsController@af3');
});


  // Backup routes
        Route::get('backup', 'BackupController@index');
        Route::get('backup/create', 'BackupController@create');
        Route::get('backup/download/{file_name}', 'BackupController@download');
        Route::get('backup/delete/{file_name}', 'BackupController@delete');
        

Route::get('admin/reg/success', 'RegisterMainController@send');
Route::get('/admindash', 'ApproveController@admindash');
Route::get('/barcode', 'BarcodeController@barcode');


Route::prefix('/')->group(function()
{
    Route::get('/faqs', 'FrontendController@faq');
    Route::get('/about', 'FrontendController@about');
    Route::get('/contact', 'FrontendController@contact');
    Route::get('/signup', 'FrontendController@signup');
    Route::get('/sitemap', 'FrontendController@sitemap');
    Route::get('/profile', 'FrontendController@profile');
    Route::get('/scholarship', 'FrontendController@scholarship');
    Route::get('/scholarship/details', 'FrontendController@sdetails');
    Route::get('/profile/personal-information', 'FrontendController@myProfile');
    Route::get('/profile/personal-information/edit', 'FrontendController@myProfileEdit');
    Route::get('/profile/guardian-information', 'FrontendController@guardian');
    Route::get('/profile/guardian-information/edit', 'FrontendController@guardianEdit');
    Route::get('/profile/education-information', 'FrontendController@education');
    Route::get('/profile/education-information/edit', 'FrontendController@educationEdit');
    Route::get('/account', 'FrontendController@account');
    Route::get('/account/password', 'FrontendController@accountpass');
    Route::post('/profile/personal-information/fetch', 'FrontendController@fetch')->name('profile.fetch');
    // Route::post('/scholarship/details/eefap-gv/fetch', 'FrontendController@gvfetch')->name('eefapgv.fetch');
    
    Route::post('/profile/personal-information', 'FrontendController@storedPersonal');
    Route::post('/profile/guardian-information', 'FrontendController@storedGuardian');
    Route::post('/profile/education-information', 'FrontendController@storedEducation');
    Route::post('/account', 'FrontendController@accountEdit');
    Route::post('/account/change-password', 'FrontendController@changePassword');
    Route::post('/account/upload-profile', 'FrontendController@uploadprofile');



    Route::get('/scholarship/details/eefap-gv', 'FrontendController@viewEefapgv');
    Route::post('/scholarship/details/eefap-gv', 'FrontendController@storedEefapgv');
    Route::get('/scholarship/details/eefap', 'FrontendController@viewEefap');
    Route::post('/scholarship/details/eefap', 'FrontendController@storedEefap');
    Route::get('/scholarship/details/pcl', 'FrontendController@viewPcl');
    Route::post('/scholarship/details/pcl/fetch', 'FrontendController@pclfetch')->name('pcl2.fetch');
    Route::post('/scholarship/details/pcl', 'FrontendController@storedPcl');


    Route::get('/scholarship/details/renew/eefap-gv', 'FrontendController@viewEefapgv_edit');
    Route::post('/scholarship/details/renew/eefap-gv', 'FrontendController@storedEefapgv_edit');
    Route::get('/scholarship/details/renew/eefap', 'FrontendController@viewEefap_edit');
    Route::post('/scholarship/details/renew/eefap', 'FrontendController@storedEefap_edit');
    Route::get('/scholarship/details/renew/pcl', 'FrontendController@viewPcl_edit');
    //Route::post('/scholarship/details/pcl/fetch', 'FrontendController@pclfetch')->name('pcl2.fetch');
    Route::post('/scholarship/details/renew/pcl', 'FrontendController@storedPcl_edit');
    
    Route::get('/scholarship/upload/eefapgv', 'FrontendController@uploadgv');
    Route::post('/scholarship/upload/eefapgv', 'FrontendController@storeduploadgv');
    Route::get('/scholarship/upload/eefap', 'FrontendController@uploadeefap');
    Route::post('/scholarship/upload/eefap', 'FrontendController@storeduploadeefap');
    Route::post('/scholarship/delete', 'FrontendController@eefapdel');

    Route::get('/announcement/{id}', 'FrontendController@news');
    Route::post('/contact', 'FrontendController@contactus');
    Route::get('/send/sample', 'FrontendController@send');
    Route::get('/scholarship/form/{id}', 'FrontendController@printaf');

    Route::get('/scholarship/getdata', 'FrontendController@getdata')->name('logs.getdata');
    Route::get('/scholarship/check/{id}', 'FrontendController@spes');
    Route::get('/scholarship/invalid', 'FrontendController@spes2');
});

Route::prefix('/admin/tracking')->group(function(){
    Route::get('/', 'TrackingController@viewTrack');
    Route::get('/getdata', 'TrackingController@getdata')->name('track.getdata');
    Route::post('/postdata', 'TrackingController@postdata')->name('track.postdata');
    Route::get('/fetchdata', 'TrackingController@fetchdata')->name('track.fetchdata');
});


Route::prefix('/admin/grades')->group(function()
{
    Route::get('/', 'GradesController@index');
    Route::get('/getdata', 'GradesController@getdata')->name('grades.getdata');
    Route::get('/fetchdata', 'GradesController@fetchdata')->name('grades.fetchdata');
    Route::post('/postdata', 'GradesController@postdata')->name('grades.postdata');
});

Route::prefix('/admin/archive/grades')->group(function()
{
    Route::get('/', 'GradesArchiveController@index');
    Route::get('/getdata', 'GradesArchiveController@getdata')->name('argrades.getdata');
    Route::get('/fetchdata', 'GradesArchiveController@fetchdata')->name('argrades.fetchdata');
    Route::post('/postdata', 'GradesArchiveController@postdata')->name('argrades.postdata');
    Route::get('/removedata', 'GradesArchiveController@removedata')->name('argrades.removedata'); 
});


Route::prefix('/admin/consolidation')->group(function()
{
    Route::get('/', 'ConsolidateController@index');
    Route::get('/getdata', 'ConsolidateController@getdata')->name('consolo.getdata');
    Route::post('/postdata', 'ConsolidateController@postdata')->name('consolo.postdata');
    Route::get('/fetchdata', 'ConsolidateController@fetchdata')->name('consolo.fetchdata');
});

Route::prefix('/admin/awarding')->group(function()
{
    Route::get('/', 'AwardingController@index');
    Route::get('/getdata', 'AwardingController@getdata')->name('award.getdata');
    Route::get('/fetchdata', 'AwardingController@fetchdata')->name('award.fetchdata');
    Route::post('/postdata', 'AwardingController@postdata')->name('award.postdata');
});


Route::get('/reports', function () {

    Fpdf::AddPage();
    Fpdf::SetFont('Courier', 'B', 18);
    Fpdf::Cell(50, 25, 'Hello World!');
    Fpdf::Output();
    exit;

});
Route::prefix('admin/submission')->group(function()
{
    Route::get('/', 'SubController@show');
    Route::get('/getdata', 'SubController@getdata')->name('sub.getdata');
    Route::get('/details/{id}', 'SubController@details');
    Route::get('/details/uploads/{upload}', 'SubController@uploadreq');
    Route::post('/details/uploads', 'SubController@approvedreq');
    Route::get('/details/uploads/pdf/{upload}', 'SubController@uploadpdf');
});

Route::prefix('/scholarship')->group(function(){

    
    Route::get('/eefap2', 'ScholarshipFrontController@shoW');
    Route::post('/eefap/fetch', 'ScholarshipFrontController@fetch')->name('eefap.fetch');
    
    Route::post('/pcl/fetch', 'ScholarshipFrontController@pfetch')->name('pcl4.fetch');
    Route::get('/eefap-gv/{id}', 'ScholarshipFrontController@gvShow');
    Route::post('/eefap', 'ScholarshipFrontController@eefapStore');
    Route::post('/eefap-gv', 'ScholarshipFrontController@eefapgvStore');
    Route::post('/pcl', 'ScholarshipFrontController@pclStore');
// });

    Route::get('/gad', 'ScholarshipFrontController@gadShow');
    Route::get('/graduate-private', 'ScholarshipFrontController@gradprivate');
    Route::get('/graduate-public', 'ScholarshipFrontController@gradpublic');
    Route::get('/ncw', 'ScholarshipFrontController@ncw');
    Route::get('/vg-oldnew', 'ScholarshipFrontController@oldnew');


    Route::get('/honor-rank', 'ScholarshipFrontController@honors');
    Route::get('/vg-dhvtsu', 'ScholarshipFrontController@dhvtsu');

    Route::get('/pcl', 'ScholarshipFrontController@pclShow');
});



Route::prefix('admin/renew')->group(function()
{
    Route::get('/', 'RenewController@show');
    Route::get('/getdata', 'RenewController@getdata')->name('renew.getdata');
    Route::get('/eefap/{id}', 'RenewController@vieweefap');
    Route::post('/eefap', 'RenewController@editeefap');
    Route::get('/eefapgv/{id}', 'RenewController@vieweefapgv');
    Route::post('/eefapgv', 'RenewController@editeefapgv');
    Route::get('/pcl/{id}', 'RenewController@viewpcl');
    Route::post('/pcl', 'RenewController@editpcl');
    Route::get('/send/{data}', 'RenewController@showsend');
    Route::post('/fetch', 'RenewController@pclfetch')->name('pcl5.fetch');
   // Route::get('/getdata2', 'ApplyController@getdata')->name('apply.e');
    // Route::get('/getdata3', 'ApplyController@scholardata')->name('apply.scholardata');
    // Route::get('/scholarship-category', 'ApplyController@showCat');
    // Route::get('/send', 'ApplyController@showsend');
});

Route::prefix('admin/recheck')->group(function(){
    Route::get('/', 'RecheckController@index');
    Route::get('/fetchdata', 'RecheckController@researchData')->name('research.fetchdata');
    Route::post('/', 'RecheckController@approved')->name('recheck.postdata');
});

Route::prefix('admin/audit-log')->group(function(){
    Route::get('/', 'AuditController@index');
    Route::get('/getdata', 'AuditController@getdata')->name('audit.getdata');
});

Route::get('/mailable', function () {

    $name ="TUKMOL";
    return new App\Mail\RegSuccess($name);
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

Route::get('/verify', 'VerifyController@getVerify')->name('getVerify');
Route::post('/verify', 'VerifyController@postVerify')->name('verify');


Route::resource('admin/applicant', 'ApplicantMainController');
Route::resource('admin/application', 'ApplicationMainController');
Route::resource('admin/announcement', 'AnnounceMainController');
Route::resource('admin/faqs', 'FaqsMainController');
Route::resource('admin/scholarship', 'ScholarshipMainController');
Route::resource('admin/employee', 'UsersMainController');
Route::resource('admin/reg', 'RegisterMainController');
Route::resource('admin/apply', 'ApplyController');
Route::resource('admin/archive/faqs', 'FaqArchiveController');
Route::resource('admin/archive/announcement', 'AnnounceArchiveController');
Route::resource('admin/archive/applicant', 'ApplicantArchiveController');

Route::get('create', 'DisplayDataController@create');
Route::get('getdata', 'DisplayDataController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/logout', 'Auth\LoginController@user_logout')->name('user.logout');

Route::prefix('/admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/profile', 'UsersMainController@profile');
    Route::get('/profile/edit', 'UsersMainController@editprofile');
    Route::get('/profile/password', 'UsersMainController@editpass');
    Route::post('/profile/edit', 'UsersMainController@editstored');
    Route::post('/profile', 'UsersMainController@uploadProfile');
    Route::post('/profile/password', 'UsersMainController@storedpass');
});


