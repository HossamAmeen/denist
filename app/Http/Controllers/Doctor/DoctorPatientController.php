<?php

namespace App\Http\Controllers\Doctor;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Doctor,Nurse,Visit,Patient,Teeth,Operation,TeethOperation};
use Auth , File ,DB;
class DoctorPatientController extends Controller
{
    use APIResponseTrait;
    public function showEnterPatient()   /// not work 
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
    
    public function nurses()
    {

        if(!isset(Auth::guard('doctor-api')->user()->id))
        {
         return $this->APIResponse(null, "you have to login", 400);
        }
        $nurses = Nurse::where('doctor_id' ,Auth::guard('doctor-api')->user()->id )->get();
        return $this->APIResponse($nurses, null, 200);
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
            $visits = $visits->whereIn('patient_id' , $patients );
        }
        if(request('nurse_id') != null){
            $visits = $visits->where('nurse_id' , request('nurse_id') );
        }
        $visits = $visits->with(['patient','nurse','doctor'])->orderBy('id' , 'DESC')->get();
        return $this->APIResponse($visits, null, 200);
    }

    public function showPatient($patientId)
    {
        if(!isset(Auth::guard('doctor-api')->user()->id))
        {
         return $this->APIResponse(null, "you have to login", 400);
        }

        if(request('phone') != null){
            
            $patient = Patient::with(['visits.operations','teeths'])->where('phone' , 'LIKE', '%' . request('phone') . '%' )->first();
        }
        else{
            $patient = Patient::with(['visits.operations','teeths'])->find($patientId);
        }
        $patient['lastVisit'] = Visit::where('status','انتهت الزياره')
                                ->where('doctor_id' , Auth::guard('doctor-api')->user()->id)
                                ->where('patient_id' , $patient->id)
                                ->orderBy('id','DESC')->first();
        if(isset($patient)){
            return $this->APIResponse($patient, null, 200);
        }
        return $this->APIResponse(null, "not found", 200);
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
    
    public function showPatientVisits($patientId)
    {
        if(!isset(Auth::guard('doctor-api')->user()->id))
        {
         return $this->APIResponse(null, "you have to login", 400);
        }
        /**
         * ->get(['projects.id', DB::raw('sum(variations.value) as value')])
   ->sum('value');
         */
        $visit = Visit::with(['operations'=>function($query )use ($patientId){
                         $query->where('patient_id',$patientId) ;
                        }])
                        ->withCount(['operations as totalCost'=>function($query){
                            $query->where('patient_id',1)->select(DB::raw('sum(cost)'));   
                        }])  
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

    public function showOperations()
    {
        if(!isset(Auth::guard('doctor-api')->user()->id))
        {
         return $this->APIResponse(null, "you have to login", 400);
        }
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
        if(!isset(Auth::guard('doctor-api')->user()->id))
        {
         return $this->APIResponse(null, "you have to login", 400);
        }
        $operation = TeethOperation::create([
            'operation'=>$request->operation ,
            'cost' =>$request->cost ,
            'doctor_id'=>Auth::guard('doctor-api')->user()->id,
            'patient_id'=>$request->patient_id,
            'visit_id'=> $request->visit_id,
            'teeth_id'=>$teethId
        ]);
        $teeth = Teeth::where('id' , $teethId)->first();
        $teeth = $teeth->update([
            'status'=>$request->operation,
        ]);    
        $data['operation_id'] = $operation->id;
        return $this->APIResponse($data, null, 200);
    }
    public function updateOperationTeeth(Request $request , $operationId)
    {
        $operation = TeethOperation::find($operationId);
        if(isset($operation)){
            $operation->update([
                'cost'=>($request->cost - ($request->discount != null ? $request->discount : 0  
            ) ) ]);  
        }
        return $this->APIResponse(null, null, 200);
    }
    public function deleteOperationTeeth($operationTeethId)
    {
        $operation = TeethOperation::find($operationTeethId);
        if(isset($operation)){
            $lastoperation = TeethOperation::where('teeth_id',$operation->teeth_id)
                                            ->orderBy('id','DESC')
                                            ->first();
            $teeth = Teeth::where('id' , $operation->teeth_id)->first();
             $teeth = $teeth->update([
            'status'=>$lastoperation->operation,
             ]);
            $operation->delete();  
        }
        return $this->APIResponse(null, null, 200);
    }
}
