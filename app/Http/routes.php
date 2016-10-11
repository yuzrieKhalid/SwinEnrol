<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group([
    'middleware' => 'web',
], function () {
    Route::auth();

    Route::get('/', 'HomeController@index');
});

// Student Admin
Route::group([
    'prefix' => 'admin',
    'middleware' => 'web',
], function() {
    Route::get('/', 'Admin\HomeController@index');
    Route::post('managestudents/upload/file', 'Admin\ManageStudentController@fileUpload')->name('admin.managestudents.fileUpload');
    Route::resource('managestudents', 'Admin\ManageStudentController');
    Route::get('managestudents/downloadExcel', 'ManageStudentController@downloadExcel');
    Route::resource('setenrolmentdates', 'Admin\SetEnrolmentDateController');
    Route::resource('resolveissue', 'Admin\ResolveIssueController');
    Route::get('resolveenrolmentissues/{studentID}/issue/{issueID}', [
         'as' => 'admin.resolveissue.approve',
         'uses' => 'Admin\ResolveIssueController@update'
       ]);
     Route::put('resolveenrolmentissues/{studentID}/issue/{issueID}', [
         'as' => 'admin.resolveissue.approve',
         'uses' => 'Admin\ResolveIssueController@update'
       ]);
     Route::delete('resolveenrolmentissues/{studentID}/issue/{issueID}', [
         'as' => 'admin.resolveissue.disapprove',
         'uses' => 'Admin\ResolveIssueController@destroy'
       ]);
     Route::resource('approvedissues', 'Admin\ApprovedIssuesController');
    //  Route::resource('enrolmentstatus', 'Admin\EnrolmentStatusStudent');
    //  Route::get('enrolmentstatus/index2', [
    //      'as' => 'admin.enrolmentstatus.create',
    //      'uses' => 'Admin\EnrolmentStatusStudent@create'
    //    ]);
    Route::resource('enrolmentstatus', 'Admin\EnrolmentStatusStudent');
});

// Route::resource('manageunits', 'Coordinator\ManageUnitController');
// Coordinator Views
Route::group([
    'prefix' => 'coordinator',
    'middleware' => 'web',
], function() {
    Route::get('/', 'Coordinator\HomeController@index');
    Route::post('managestudyplanner/create', 'Coordinator\ManagePlannerController@create');
    Route::resource('managestudyplanner', 'Coordinator\ManagePlannerController');
    Route::resource('manageunitlisting', 'Coordinator\ManageListingController');
    Route::resource('manageunits', 'Coordinator\ManageUnitController');
    Route::resource('resolveenrolmentissues', 'Coordinator\ResolveIssueController');
});

// Student
Route::group([
    'prefix' => 'student',
    'middleware' => ['web', 'auth'],
], function() {
    Route::resource('/', 'Student\HomeController');
    Route::get('enrolmenthistory', 'Student\EnrolmentHistoryController@index');
    Route::get('enrolmenthistory/downloadExcel/{type}', 'Student\EnrolmentHistoryController@downloadExcel');
    Route::get('viewstudyplanner', 'Student\ViewPlannerController@index');
    Route::post('viewstudyplanner', 'Student\ViewPlannerController@index');
    Route::get('viewunitlistings', 'Student\ViewListingController@index');
    Route::resource('enrolmentissues', 'Student\EnrolmentIssuesController');
    Route::resource('internalcoursetransfer', 'Student\CourseTransferController');
    Route::resource('manageunits', 'Student\ManageUnitController');
    Route::post('manageunits', 'Student\ManageUnitController@index2');
});

Route::group([
    'prefix' => 'super',
    'middleware' => 'web',
], function() {
    Route::get('/', 'Super\HomeController@index');
    Route::get('managestudentadmin', 'Super\ManageStudentAdmin@index');
    Route::get('managecoordinator', 'Super\ManageCoordinator@index');
    Route::get('managestudent', 'Super\ManageStudent@index');
    Route::resource('config', 'Super\ConfigController');
    Route::resource('managestudentadmin', 'Super\ManageStudentAdmin');
    Route::resource('managecoordinator', 'Super\ManageCoordinator');
    Route::resource('managestudent', 'Super\ManageStudent');
    Route::resource('managecourse', 'Super\ManagCourseController');
    Route::resource('manageunittype', 'Super\ManageUnitType');
});

Route::get('/phase', 'PhaseController@phaseTrigger');
Route::get('/unit', 'PhaseController@unitApprove');

/*
Route::group([
    'middleware' => 'web'
], function () {
    Route::auth();

    Route::get('/', 'HomeController@index');
});

Route::group([
    'middleware' => ['web', 'auth'],
], function(){
    // Student Administrator Views
    Route::get('/admin', 'StudentAdminController@index');
    Route::get('/admin/managestudents', 'StudentAdminController@view_managestudents');
    Route::get('/admin/setenrolmentdates', 'StudentAdminController@view_setenrolmentdates');

    // Coordinator Views
    Route::get('/coordinator', 'CoordinatorController@index');
    Route::get('/coordinator/managestudyplanner', 'CoordinatorController@view_managestudyplanner');
    Route::get('/coordinator/manageunitlisting', 'CoordinatorController@view_manageunitlisting');
    Route::get('/coordinator/manageunits', 'CoordinatorController@view_manageunits');
    Route::get('/coordinator/resolveenrolmentissues', 'CoordinatorController@view_resolveenrolmentissues');

    // Student
    Route::get('/student', 'StudentController@index');
    Route::get('/student/contactcoordinator', 'StudentController@view_contactcoordinator');
    Route::get('/student/internalcoursetransfer', 'StudentController@view_internalcoursetransfer');
    Route::get('/student/manageunits', 'StudentController@view_manageunits');
    Route::get('/student/viewstudyplanner', 'StudentController@view_viewstudyplanner');
    Route::get('/student/viewunitlistings', 'StudentController@view_viewunitlistings');


});
*/
