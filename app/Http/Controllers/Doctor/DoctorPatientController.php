<?php

namespace App\Http\Controllers\Doctor;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Doctor,Nurse,Visit,Patient,Teeth,Operation,TeethOperation};
use Auth , File;
class DoctorPatientController extends Controller
{
    use APIResponseTrait;
    public function showEnterPatient()
    {
        if(!isset(Auth::guard('doctor-api')->user()->id))
        {
         return $this->APIResponse(null, "you have to login", 400);
        }
        $data['currentVisit'] = Visit::with('patient')->where('status' , 'مع الطبيب')->where('doctor_id' , Auth::guard('doctor-api')->user()->id)->get('patient_id')->first();
        $data['lastVisit'] =$visit = Visit::where('status','انتهت الزياره')->where('doctor_id' , Auth::guard('doctor-api')->user()->id)->orderBy('id','DESC')->first();
        return $this->APIResponse($data, null, 200);
    }
    public function showPatientVisits($patientId)
    {
        if(!isset(Auth::guard('doctor-api')->user()->id))
        {
         return $this->APIResponse(null, "you have to login", 400);
        }
        $visit = Visit::with('patient')->where('doctor_id' , Auth::guard('doctor-api')->user()->id)->orderBy('id','DESC')->first();
        return $this->APIResponse($visit, null, 200);
    }
    public function showVisitDetials($visitId)
    {
        if(!isset(Auth::guard('doctor-api')->user()->id))
        {
         return $this->APIResponse(null, "you have to login", 400);
        }

        $visit = Visit::with('patient')->find($visitId);
        if(isset($visit)){
            return $this->APIResponse($visit, null, 200);
        }
        else
        {
            return $this->APIResponse(null, "this visit not found", 500);
        }
    }

    public function initialExam(Request $request , $patientId)
    {
        // return $request;
        for ($i=0; $i < count($request['teeths']) ; $i++) { 
            Teeth::create([
               
                'name' => $request['teeths'][$i],
                'initial_status'=>$request['status'][$i],
                'patient_id' => $patientId,
            ]);
        }
            
        return $this->APIResponse(null, null, 200);
        
    }
    public function showOperations()
    {
        // if(!isset(Auth::guard('doctor-api')->user()->id))
        // {
        //  return $this->APIResponse(null, "you have to login", 400);
        // }
        $operations = Operation::with('operations')
        // ->where('doctor_id' , Auth::guard('doctor-api')->user()->id)
        ->where('operation_id' , null)
        ->get();
        return $this->APIResponse($operations, null, 200);
    }
    public function setOperationTeeth(Request $request ,$patientId)
    {
        $teeth_id = Teeth::where(['patient_id' => $patientId  , 'name' => $request->teeth_name ])->pluck('id')->first();

        TeethOperation::create([
            // 'name'=>$request->teeth_name ,
            // 'number'=>$request->teeth_number ,
            'operation'=>$request->operation ,
            'cost' =>$request->cost ,
            'patient_id'=>$patientId,
            'visit_id'=> $request->visit_id,
            'teeth_id'=>$teeth_id
        ]);
        return $this->APIResponse(null, null, 200);
    }
}
