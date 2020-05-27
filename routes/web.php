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
Route::group(['middleware'=>['auth']], function(){
	Route::get('/user-registration',[
		'uses'=>'UserRegistrationController@showRegistrationForm',
		'as'=>'user-registration'
	]);
	Route::post('/user-registration',[
		'uses'=>'UserRegistrationController@userSave',
		'as'=>'user-save'
	]);
	Route::get('/user-list',[
		'uses'=>'UserRegistrationController@userList',
		'as'=>'user-list'
	]);
	Route::get('/user-profile/{userId}',[
		'uses'=>'UserRegistrationController@userProfile',
		'as'=>'user-profile'
	]);
	Route::get('/change-user-info/{id}',[
		'uses'=>'UserRegistrationController@ChangeUserInfo',
		'as'=>'change-user-info'
	]);
	Route::post('/user-info-update',[
		'uses'=>'UserRegistrationController@UserInfoUpdate',
		'as'=>'user-info-update'
	]);
	Route::get('/change-user-avatar/{id}',[
		'uses'=>'UserRegistrationController@ChangeUserAvatar',
		'as'=>'change-user-avatar'
	]);
	Route::post('/update-user-photo',[
		'uses'=>'UserRegistrationController@updateUserPhoto',
		'as'=>'update-user-photo'
	]);
	Route::get('/change-user-password/{id}',[
		'uses'=>'UserRegistrationController@changeUserPassword',
		'as'=>'change-user-password'
	]);
	Route::post('/user-password-update',[
		'uses'=>'UserRegistrationController@userPasswordUpdate',
		'as'=>'user-password-update'
	]);

	// General Section
	Route::get('/add-header-footer',[
		'uses'=>'HomePageController@addHeaderFooterForm',
		'as'=>'add-header-footer'
	]);

	Route::post('/add-header-footer',[
		'uses'=>'HomePageController@HeaderAndFooterSave',
		'as'=>'header-and-footer-save'
	]);

	Route::get('/manage-header-footer/{id}',[
		'uses'=>'HomePageController@ManageHeaderFooter',
		'as'=>'manage-header-footer'
	]);
	Route::post('/header-and-footer-update',[
		'uses'=>'HomePageController@HeaderAndFooterUpdate',
		'as'=>'header-and-footer-update'
	]);

	// Slider Section
	Route::get('/add-slide',[
		'uses'=>'SliderController@addSlide',
		'as'=>'add-slide'
	]);
	Route::post('/add-slide',[
		'uses'=>'SliderController@uploadSlide',
		'as'=>'upload-slide'
	]);
	Route::get('/manage-slide',[
		'uses'=>'SliderController@manageSlide',
		'as'=>'manage-slide'
	]);
	Route::get('/slide-unpublished/{id}',[
		'uses'=>'SliderController@slideUnpublished',
		'as'=>'slide-unpublished'
	]);
	Route::get('/slide-published/{id}',[
		'uses'=>'SliderController@slidePublished',
		'as'=>'slide-published'
	]);
	Route::get('/photo-gallery',[
		'uses'=>'SliderController@photoGallery',
		'as'=>'photo-gallery'
	]);
	Route::get('/slide-edit/{id}',[
		'uses'=>'SliderController@slideEdit',
		'as'=>'slide-edit'
	]);
	Route::post('/update-slide',[
		'uses'=>'SliderController@updateSlide',
		'as'=>'update-slide'
	]);
	// School Management start
	Route::get('/school/add',[
		'uses'=>'SchoolManagementController@addSchoolForm',
		'as'=>'add-school'
	]);
	Route::post('/school/add',[
		'uses'=>'SchoolManagementController@schoolSave',
		'as'=>'school-save'
	]);
	Route::get('/school/list',[
		'uses'=>'SchoolManagementController@schoolList',
		'as'=>'school-list'
	]);
	//Class Management 
	Route::get('/add/class',[
		'uses'=>'ClassManagementController@addClassForm',
		'as'=>'add-class'
	]);
	Route::post('/add/class',[
		'uses'=>'ClassManagementController@saveClass',
		'as'=>'class-save'
	]);
	Route::get('/class/list',[
		'uses'=>'ClassManagementController@classList',
		'as'=>'class-list'
	]);
	// Batch Management
	Route::get('/add/batch',[
		'uses'=>'BatchManagementController@addBatch',
		'as'=>'add-batch'
	]);
	Route::post('/add/batch',[
		'uses'=>'BatchManagementController@saveBatch',
		'as'=>'save-batch'
	]);
	Route::get('batch/list',[
		'uses'=>'BatchManagementController@batchList',
		'as'=>'batch-list'
	]);
	Route::get('/batch/list-by-ajax',[
		'uses'=>'BatchManagementController@batchListByAjax',
		'as'=>'batch-list-by-ajax'
	]);
	Route::get('/class-wise-student-type',[
		'uses'=>'BatchManagementController@classWiseStudentType',
		'as'=>'class-wise-student-type'
	]);
	//Student Type Management 
	Route::get('/student-type',[
		'uses'=>'StudentTypeController@index',
		'as'=>'student-type'
	]);
	Route::get('/student-type-add',[
		'uses'=>'StudentTypeController@studentTypeAdd',
		'as'=>'student-type-add'
	]);
	Route::get('/student-type-list',[
		'uses'=>'StudentTypeController@studentTypeList',
		'as'=>'student-type-list'
	]);
	//Student Management
	Route::get('/student/registration-form',[
		'uses'=>'StudentController@studentRegistrationForm',
		'as'=>'student-registration-form'
	]);
	Route::get('/bring-student-type',[
		'uses'=>'StudentController@bringStudentType',
		'as'=>'bring-student-type'
	]);
	Route::get('/batch-roll-form',[
		'uses'=>'StudentController@batchRollForm',
		'as'=>'batch-roll-form'
	]);
	Route::post('/student/registration-form',[
		'uses'=>'StudentController@studentSave',
		'as'=>'student-save'
	]);
	Route::get('/student/all-running-student-list',[
		'uses'=>'StudentController@allRunningStudentList',
		'as'=>'all-running-student-list'
	]);
	Route::get('/student/class-selection-form',[
		'uses'=>'StudentController@classSelectionForm',
		'as'=>'class-selection-form'
	]);
	Route::get('/student/course-wise-student',[
		'uses'=>'StudentController@classAndTypeWiseStudent',
		'as'=>'course-wise-student'
	]);
	Route::get('/student/details/{id}',[
		'uses'=>'StudentController@studentDetails',
		'as'=>'student-details'
	]);


	Route::get('/student/batch-selection-form',[
		'uses'=>'StudentController@batchSelectionForm',
		'as'=>'batch-selection-form'
	]);
	Route::get('/student/course-wise-batch',[
		'uses'=>'StudentController@courseWiseBatch',
		'as'=>'course-wise-batch'
	]);
	Route::get('/student/batch-wise-student-list',[
		'uses'=>'StudentController@batchWiseStudentList',
		'as'=>'batch-wise-student-list'
	]);
	// Student Attendance
	Route::get('/attendance/add-attendance',[
		'uses'=>'StudentAttendanceController@addAttendance',
		'as'=>'add-attendance'
	]);
	Route::get('/attendance/batch-wise-student-list-for-attendance',[
		'uses'=>'StudentAttendanceController@batchWiseStudentListForAttendance',
		'as'=>'batch-wise-student-list-for-attendance'
	]);
	Route::post('/attendance/add-attendance',[
		'uses'=>'StudentAttendanceController@saveStudentAttendance',
		'as'=>'save-student-attendance'
	]);
	//Date Management
	Route::get('/date/add-year',[
		'uses'=>'DateManagementController@addYear',
		'as'=>'add-year'
	]);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
