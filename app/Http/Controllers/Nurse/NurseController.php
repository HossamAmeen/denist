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
        $visits = $visits->with(['patient','nurse','doctor'])->orderBy('id' , 'DESC')->get();
        return $this->APIResponse($visits, null, 200);
    }

    public function addVisit(Request $request)
    {
        $requestArray = $request->all();
        $requestArray['nurse_id'] = Auth::guard('nurse-api')->user()->id ?? 1  ;
         Visit::create($requestArray);
        return $this->APIResponse(null, null, 200);
    }
    public function showPatients()
    {
        $patients = Patient::query();
        
        if(request('phone') != null){
            
            $patients = Patient::where('phone' , 'LIKE', '%' . request('phone') . '%' );
            if(count($patients->get()->toArray()) == 0){
                return $this->APIResponse(null, "not found", 200);
            }
        }
        $patients = $patients->get();
        
        
        return $this->APIResponse($patients, null, 200);
    }
    public function showPatient()
    {
        $patient = Patient::where('id' , request('id') )->orWhere('phone' , request('phone'))->first();
        if(isset($patients)){
            return $this->APIResponse(null, "not found", 200);
        }
        return $this->APIResponse($patient, null, 200);
    }
    public function addPatient(Request $request)
    {
        $requestArray = $request->all();
        $requestArray['nurse_id'] = Auth::guard('nurse-api')->user()->id ?? 1  ;
      
        $patient =Patient::create($requestArray);
        $data['patient_id'] = $patient->id ;
        return $this->APIResponse($data, null, 200);
    }

    public function updatePatient($id , Request $request)
    {
        $patient = Patient::find($id);
        if(isset($patient)){
            $patient->update($request->all());
        }
        else
        {
            return $this->APIResponse(null, "this patient not found", 500);
        }
        return $this->APIResponse(null, null, 200);
    }

    public function deletePatient($id)
    {
        $patient = Patient::find($id);
        if(isset($patient)){
            $patient->delete();
        }
        else
        {
            return $this->APIResponse(null, "this patient not found", 500);
        }
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
