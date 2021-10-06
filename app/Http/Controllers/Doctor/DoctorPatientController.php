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
        $data['currentVisit'] = Visit::with('patient.teeths')->where('status' , 'مع الطبيب')
                                    ->where('doctor_id' , Auth::guard('doctor-api')->user()->id)
                                    ->get('patient_id')->first();
        $data['lastVisit'] =$visit = Visit::where('status','انتهت الزياره')->where('doctor_id' , Auth::guard('doctor-api')->user()->id)->orderBy('id','DESC')->first();
      
        return $this->APIResponse($data, null, 200);
    }
    public function showPatientVisits($patientId)
    {
        if(!isset(Auth::guard('doctor-api')->user()->id))
        {
         return $this->APIResponse(null, "you have to login", 400);
        }
        $visit = Visit::with('patient')
                    ->where('doctor_id' , Auth::guard('doctor-api')->user()->id)
                    ->where('patient_id' , $patientId)
                    ->orderBy('id','DESC')->get();
        return $this->APIResponse($visit, null, 200);
    }
    public function showVisitDetials($visitId)
    {
        if(!isset(Auth::guard('doctor-api')->user()->id))
        {
         return $this->APIResponse(null, "you have to login", 400);
        }

        $visit = Visit::with(['patient',"operations"])->find($visitId);
        $visit['totoal_cost'] = $visit->operations->sum('cost');
        if(isset($visit)){
            return $this->APIResponse($visit, null, 200);
        }
        else
        {
            return $this->APIResponse(null, "this visit not found", 500);
        }
    }

    public function initialExam(Request $request , $teethId)
    {

            $teeth = Teeth::find($teethId);
            $teeth = $teeth->update([
                'initial_status'=>$request['teeth_status'],
                'status'=>$request['teeth_status'],

            ]);            
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
    public function showOperationsOfTeeth($teethId)
    {
        $operations = TeethOperation::where('teeth_id' , $teethId)->get();
        return $this->APIResponse($operations, null, 200);
    }
    public function storeOperationTeeth(Request $request ,$teethId)
    {
        $operation = TeethOperation::create([
            'operation'=>$request->operation ,
            'cost' =>$request->cost ,
            'patient_id'=>$request->patient_id,
            'visit_id'=> $request->visit_id,
            'teeth_id'=>$teethId
        ]);
        $data['operation_id'] = $operation->id;
        return $this->APIResponse($data, null, 200);
    }
    public function updateOperationTeeth(Request $request , $operationId)
    {
        $operation = TeethOperation::find($operationId);
        if(isset($operation)){
            $operation->update(['cost'=>($request->cost - ($request->discount != null ? $request->discount : 0  
            ) ) ]);  
        }
        return $this->APIResponse(null, null, 200);
    }
}
