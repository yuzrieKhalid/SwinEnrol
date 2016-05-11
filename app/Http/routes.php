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
Route::get('/', 'Admin\HomeController@index');

// Student Admin
Route::group([
    'as' => 'admin::',
    'prefix' => 'admin',
], function() {
    Route::get('/', 'Admin\HomeController@index');
    Route::resource('managestudents', 'Admin\ManageStudentController');
    Route::resource('setenrolmentdates', 'Admin\SetEnrolmentDateController');
});

// Route::resource('manageunits', 'Coordinator\ManageUnitController');
// Coordinator Views
Route::group([
    'prefix' => 'coordinator',
    'middleware' => 'web',
], function() {
    Route::get('/', 'Coordinator\HomeController@index');
    Route::resource('managestudyplanner', 'Coordinator\ManagePlannerController');
    Route::resource('manageunitlisting', 'Coordinator\ManageListingController');
    Route::resource('manageunits', 'Coordinator\ManageUnitController');
    Route::resource('resolveenrolmentissues', 'Coordinator\ResolveIssueController');
});

// Student
Route::group([
    'as' => 'student::',
    'prefix' => 'student',
], function() {
    Route::get('/', 'Student\HomeController@index');
    Route::get('viewstudyplanner', 'Student\ViewPlannerController@index');
    Route::get('viewunitlistings', 'Student\ViewListingController@index');
    Route::resource('contactcoordinator', 'Student\ContactCoordinatorController');
    Route::resource('internalcoursetransfer', 'Student\CourseTransferController');
    Route::resource('manageunits', 'Student\ManageUnitController');
});

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
