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


                /////////////// doctor
                
                
                
        });
        Route::prefix('doctor')->namespace('Doctor')->group(function(){
                Route::post('login', 'DoctorController@login');
                Route::put('update-profile', 'DoctorController@updateProfile');
                Route::get('show-enter-patients', 'DoctorPatientController@showEnterPatient');
                Route::get('show-patients-visits/{patientId}', 'DoctorPatientController@showPatientVisits');
                Route::get('show-visit-detials/{visitId}', 'DoctorPatientController@showVisitDetials');
                Route::get('show-operations', 'DoctorPatientController@showOperations');
                Route::post('initial-exam/{patientId}', 'DoctorPatientController@initialExam');
                Route::post('set-operation-teeth/{patientId}', 'DoctorPatientController@setOperationTeeth');
        });
});


/**
 * 
 * 
 *  $patient = Patient::where('id' , $id );
        if(request('phone') != null){
        $patient = $patient->orWhere('phone' , 'LIKE', '%' . request('phone') . '%' );
        }
        $patient = $patient->first();
        // return $patient;
        if(isset($patient)){
            return $this->APIResponse($patient, null, 200);
        }
        return $this->APIResponse(null, "not found", 200);

 */