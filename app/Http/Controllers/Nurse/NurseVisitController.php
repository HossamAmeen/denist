<?php

namespace App\Http\Controllers\Nurse;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Doctor,Nurse,Visit,Patient};
use Auth , File;
class NurseVisitController extends Controller
{
    use APIResponseTrait;
   
    public function index()
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
        $visits = $visits->with(['patient','nurse','doctor','operations'])->orderBy('id' , 'DESC')->get();
        foreach($visits as $visit){
            $visit['total_cost'] =  $visit->operations->sum('cost');
        }

        return $this->APIResponse($visits, null, 200);
    }

    public function store(Request $request)
    {
        $requestArray = $request->all();
        $requestArray['nurse_id'] = Auth::guard('nurse-api')->user()->id ?? 1  ;
         Visit::create($requestArray);
        return $this->APIResponse(null, null, 200);
    }

    public function update($id , Request $request)
    {
        
        $visit = Visit::find($id);
       
        if(! isset($visit)){
            
            return $this->APIResponse(null, "this visit not found", 500);
            
        }
        // return $visit;
        $visit->update($request->all());
        // return $visit;
        return $this->APIResponse(null, null, 200);
    }

    public function show($id)
    {
        $visit = Visit::find($id);
        if(isset($visit)){
            return $this->APIResponse($visit, null, 200);
        }
        else
        {
            return $this->APIResponse(null, "this visit not found", 500);
        }
    }

    public function destroy($id)
    {
        $visit = Visit::find($id);
        if(isset($visit)){
            $visit->delete();
            return $this->APIResponse(null, null, 200);
        }
        else
        {
            return $this->APIResponse(null, "this visit not found", 500);
        }
    }
    public function showDoctors()
    {
        $doctors = Doctor::get(['id','name']);
        return $this->APIResponse($doctors, null, 200);
    }


}
