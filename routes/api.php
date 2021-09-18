<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::prefix('admin')->namespace('DashBoard')->group(function(){

//     Route::post('/login', 'APIAuthController@login')->name('admin.login');
//     Route::middleware('checkLogin')->group(function () {
//         Route::post('/logout', 'APIAuthController@logout')->name('admin.logout');
//     });
//     Route::middleware('cors')->group(function () {
//         Route::resource('admins' , "AdminController");
//         Route::resource('teachers' , "TeacherController");
//         Route::resource('students' , "StudentController");
//         Route::resource('rooms' , "RoomController");
//         Route::resource('filesrooms' , "FileRoomController");
//         Route::post('upload-file', 'UploadFileController@uploadFile');
//     });


// });
Route::middleware('cors')->group(function () {

        Route::prefix('nurse')->namespace('Nurse')->group(function(){
                Route::post('login', 'NurseController@login');
                Route::get('profile', 'NurseController@showProfile');
                Route::put('update-profile', 'NurseController@updateProfile');
                Route::get('doctors', 'NurseController@showDoctors');
                Route::get('visits', 'NurseController@showVisits');
                Route::post('add-visit', 'NurseController@addVisit');
                Route::post('add-patient', 'NurseController@addPatient');
                Route::put('update-patient/{patient_id}', 'NurseController@updatePatient');
                Route::delete('delete-patient/{patient_id}', 'NurseController@deletePatient');
                Route::get('show-patients', 'NurseController@showPatients');
                Route::get('show-patient', 'NurseController@showPatient');
        });
        Route::post('doctor/login', 'Nurse\NurseController@doctorLogin');
});


