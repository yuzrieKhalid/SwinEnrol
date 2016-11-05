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
    'middleware' => ['web', 'auth'],
], function() {
    Route::get('/', 'Admin\HomeController@index');
    Route::post('managestudents/upload/file', 'Admin\ManageStudentController@fileUpload')->name('admin.managestudents.fileUpload');
    Route::resource('managestudents', 'Admin\ManageStudentController');
    Route::get('managestudents/downloadExcel/{type}', 'Admin\ManageStudentController@downloadExcel');
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
    Route::resource('enrolmentstatus', 'Admin\EnrolmentStatusStudent');
});

// Coordinator Views
Route::group([
    'prefix' => 'coordinator',
    'middleware' => ['web', 'auth'],
], function() {
    Route::get('/', [
        'as' => 'coordinator.home.index',
        'uses' => 'Coordinator\HomeController@index'
    ]);
    Route::post('/', [
        'as' => 'coordinator.home.store',
        'uses' => 'Coordinator\HomeController@store'
    ]);
    Route::put('/{unitCode}', [
        'as' => 'coordinator.home.update',
        'uses' => 'Coordinator\HomeController@update'
    ]);
    Route::delete('/{unitCode}', [
        'as' => 'coordinator.home.destroy',
        'uses' => 'Coordinator\HomeController@destroy'
    ]);

    Route::post('manageunits/create', 'Coordinator\ManageUnitController@create');
    Route::post('managestudyplanner/create', 'Coordinator\ManagePlannerController@create');
    Route::resource('managestudyplanner', 'Coordinator\ManagePlannerController');
    Route::resource('manageunitlisting', 'Coordinator\ManageListingController');
    Route::resource('manageunits', 'Coordinator\ManageUnitController');

    Route::get('resolveenrolmentissues/{studentID}/issue/{issueID}', [
        'as' => 'coordinator.resolveenrolmentissues.approve',
        'uses' => 'Coordinator\ResolveIssueController@update'
    ]);
    Route::put('resolveenrolmentissues/{studentID}/issue/{issueID}', [
        'as' => 'coordinator.resolveenrolmentissues.approve',
        'uses' => 'Coordinator\ResolveIssueController@update'
    ]);
    Route::delete('resolveenrolmentissues/{studentID}/issue/{issueID}', [
        'as' => 'coordinator.resolveenrolmentissues.disapprove',
        'uses' => 'Coordinator\ResolveIssueController@destroy'
    ]);
    Route::resource('resolveenrolmentissues', 'Coordinator\ResolveIssueController');

    Route::put('enrolmentamendment/{studentID}/unit/{unitCode}', [
        'as' => 'coordinator.enrolmentamendment.approve',
        'uses' => 'Coordinator\EnrolmentAmendmentController@update'
    ]);
    Route::delete('enrolmentamendment/{studentID}/unit/{unitCode}', [
        'as' => 'coordinator.enrolmentamendment.disapprove',
        'uses' => 'Coordinator\EnrolmentAmendmentController@destroy'
    ]);
    Route::resource('enrolmentamendment', 'Coordinator\EnrolmentAmendmentController');
    Route::resource('graduationrequirements', 'Coordinator\GraduationRequirementsController');
});

// Student
Route::group([
    'prefix' => 'student',
    'middleware' => ['web', 'auth'],
], function() {
    Route::resource('/', 'Student\HomeController');
    Route::get('enrolmenthistory', 'Student\EnrolmentHistoryController@index');
    Route::get('viewstudyplanner', 'Student\ViewPlannerController@index');
    Route::post('viewstudyplanner', 'Student\ViewPlannerController@index');
    Route::get('viewunitlistings', 'Student\ViewListingController@index');
    Route::resource('coursetransfer', 'Student\CourseTransferController');
    Route::resource('exemption', 'Student\ExemptionController');
    Route::resource('leaveofabsence', 'Student\LeaveOfAbsenceController');
    Route::resource('preclusion', 'Student\PreclusionController');
    Route::resource('manageunits', 'Student\ManageUnitController');
    Route::post('articulate', ['as' => 'student.articulate', 'uses' => 'Student\ManageUnitController@articulate']);
});

Route::group([
    'prefix' => 'super',
    'middleware' => ['web', 'auth'],
], function() {
    Route::get('/', 'Super\HomeController@index');
    Route::get('managestudentadmin', 'Super\ManageStudentAdmin@index');
    Route::get('managecoordinator', 'Super\ManageCoordinator@index');
    Route::get('managestudent',['as'=>'index','uses'=>'Super\ManageStudent@index']);
    Route::resource('config', 'Super\ConfigController');
    Route::resource('managestudentadmin', 'Super\ManageStudentAdmin');
    Route::resource('managecoordinator', 'Super\ManageCoordinator');
    Route::resource('managestudent', 'Super\ManageStudent');
    Route::resource('managecourse', 'Super\ManagCourseController');
    Route::resource('manageunittype', 'Super\ManageUnitType');
});

Route::group([
    'prefix' => 'adminofficer',
    'middleware' => ['web', 'auth'],
], function() {
    Route::get('/', 'AdminOfficer\HomeController@index');
    Route::post('manageunitinfo/{manageunitinfo}/edit', ['as' => 'adminofficer.manageunitinfo.edit', 'uses' => 'AdminOfficer\ManageUnitInfoController@edit']);
    Route::resource('manageunitinfo', 'AdminOfficer\ManageUnitInfoController');
});

Route::get('/phase', 'PhaseController@phaseTrigger');
Route::get('/unit', 'PhaseController@unitApprove');
Route::get('/unitCheck', 'PhaseController@unitCheck');
Route::get('/test', 'Test@test');
