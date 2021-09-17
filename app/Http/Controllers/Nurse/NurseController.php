<?php

namespace App\Http\Controllers\Nurse;
use App\Http\Controllers\APIResponseTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Doctor,Nurse,Visit,Patient};
use Auth , File;
class NurseController extends Controller
{
    use APIResponseTrait;
     public function login()
    {
        $validator = Validator::make(request()->all(), [
            'user_name' => 'required|string',
            'password' => 'required|string',
        ]);
            ;
        if ($validator->fails()) {
            return $this->APIResponse(null , $validator->messages() ,  422);
        }

        $nurse = Nurse::where($this->checkField(), request('user_name'))->first();

        if ($nurse) {
            if (Hash::check(request('password'), $nurse->password)) {

                $success['token'] = $nurse->createToken('token')->accessToken;
                return $this->APIResponse($success, null, 200);
            } else {
                return $this->APIResponse(null, "Password mismatch", 422);
            }
        } else {
            return $this->APIResponse(null, "User name does not exist", 422);
        }

    }
    public function checkField()
    {
        // $field = 'phone';

        // if (is_numeric( request('user_name'))) {
        //     $field = 'phone';
        // }
        // elseif (filter_var( request('user_name'), FILTER_VALIDATE_EMAIL)) {
        //     $field = 'email';
        // }
        // else
        // {
        //     $field = 'user_name';
        // }
        $field = 'user_name';
        return $field ;
    }

    public function showProfile()
    {
        $nurse = Nurse::find(Auth::guard('nurse-api')->user()->id);
        
        return $this->APIResponse($nurse, null, 200);
    }

    public function updateProfile(Request $request)
    {

       
        $vendor = Nurse::find(Auth::guard('nurse-api')->user()->id);
        $requestArray = $request->all();

      
        if(isset($request->password))
         $requestArray['password'] = bcrypt($request->password);
        $vendor->update($requestArray);
        return $this->APIResponse($vendor, null, 200);
    }

    public function showDoctors()
    {
        $doctors = Doctor::get(['id','name']);
        return $this->APIResponse($doctors, null, 200);
    }
    public function showVisits()
    {
        $visits = Visit::query();
        if(request('doctor_id') != null){

            $visits = $visits->where('doctor_id' , request('doctor_id') );
        }
        if(request('date') != null){
          
            $visits = $visits->whereDate('date' , request('date') );
        }
        if(request('status') != null){
          
            $visits = $visits->where('status' , request('status') );
        }
        if(request('patient_id') != null){
          
            $visits = $visits->where('patient_id' , request('patient_id') );
        }
        if(request('phone') != null){
            
            $patients = Patient::where('phone' , 'LIKE', '%' . request('phone') . '%' )->pluck('id');
            // return $patients;
            $visits = $visits->whereIn('patient_id' , $patients );
        }
        if(request('nurse_id') != null){
          
            $visits = $visits->where('nurse_id' , request('nurse_id') );
        }
        $visits = $visits->with('patient')->get();
        return $this->APIResponse($visits, null, 200);
    }

    public function addVisit(Request $request)
    {
         Visit::create($request->all());
        return $this->APIResponse(null, null, 200);
    }
    public function showPatients()
    {
        $patients = Patient::query();
        
        if(request('phone') != null){
            
            $patients = Patient::where('phone' , 'LIKE', '%' . request('phone') . '%' );
          
        }
        $patients = $patients->get();
        return $this->APIResponse($patients, null, 200);
    }
    public function addPatient(Request $request)
    {
      
        $requestArray['nurse_id'] = 1 ;
        Patient::create($requestArray);
        return $this->APIResponse(null, null, 200);
    }

    public function doctorLogin(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'user_name' => 'required|string',
            'password' => 'required|string',
        ]);
            ;
        if ($validator->fails()) {
            return $this->APIResponse(null , $validator->messages() ,  422);
        }

        $nurse = Doctor::where($this->checkField(), request('user_name'))->first();

        if ($nurse) {
            if (Hash::check(request('password'), $nurse->password)) {

                $success['token'] = $nurse->createToken('token')->accessToken;
                return $this->APIResponse($success, null, 200);
            } else {
                return $this->APIResponse(null, "Password mismatch", 422);
            }
        } else {
            return $this->APIResponse(null, "User name does not exist", 422);
        }
    }
}
