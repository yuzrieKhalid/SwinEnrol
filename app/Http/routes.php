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

Route::get('/', 'StudentAdminController@index');
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
