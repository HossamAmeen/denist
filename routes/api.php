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
                                /////////////// nurse with visits
                Route::get('doctors', 'NurseVisitController@showDoctors');
                Route::resource('visits' ,'NurseVisitController' );
                                /////////////// nurse with patients
                Route::resource('patients' ,'NursePatientController' );  
                Route::put('pay-visit/{visitID}', 'NurseVisitController@payVisit');   
                Route::put('pay-debet/{patientId}', 'NurseVisitController@paidDbet');  
        });
        Route::prefix('doctor')->namespace('Doctor')->group(function(){

                Route::post('login', 'DoctorController@login');
                Route::get('show-profile', 'DoctorController@showProfile');
                Route::put('update-profile', 'DoctorController@updateProfile');

                Route::get('visits', 'DoctorPatientController@showVisits');
                Route::get('show-patient/{patientId}', 'DoctorPatientController@showPatient');
                Route::get('nurses', 'DoctorPatientController@nurses');
                Route::get('show-patients-visits/{patientId}', 'DoctorPatientController@showPatientVisits');
               
                Route::get('show-visit-detials/{visitId}', 'DoctorPatientController@showVisitDetials');
                
                Route::put('initial-exam/{teethId}', 'DoctorPatientController@initialExam');
                Route::put('set-teeth-status/{patientId}', 'DoctorPatientController@setStatusofTeeth');

                Route::get('show-operations', 'DoctorPatientController@showOperations');
                Route::get('show-operations-history/{teethId}', 'DoctorPatientController@showOperationsOfTeeth');
                Route::post('set-operation-teeth/{teethId}', 'DoctorPatientController@storeOperationTeeth');
                Route::put('update-operation-teeth/{operationId}', 'DoctorPatientController@updateOperationTeeth');
                Route::delete('operation-teeth/{operationId}', 'DoctorPatientController@deleteOperationTeeth');
        });
});


