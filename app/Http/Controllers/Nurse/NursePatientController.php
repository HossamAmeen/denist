<?php

namespace App\Http\Controllers\Nurse;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Doctor,Nurse,Visit,Patient,Teeth};
use Auth , File;
class NursePatientController extends Controller
{
    use APIResponseTrait;
    public function index()
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
    
    public function show($id)
    {

        if(request('phone') != null){
            
            $patient = Patient::with(['visits','teeths'])->where('phone' , 'LIKE', '%' . request('phone') . '%' )->first();
        }
        else{
            $patient = Patient::with(['visits','teeths'])->find($id);
        }
        $patient['lastVisit'] = Visit::where('status','انتهت الزياره')
                                // ->where('doctor_id' , Auth::guard('doctor-api')->user()->id)
                                ->where('patient_id' , $patient->id)
                                ->orderBy('id','DESC')->first();
        if(isset($patient)){
            return $this->APIResponse($patient, null, 200);
        }
        return $this->APIResponse(null, "not found", 200);
       
    }
    
    public function store(Request $request)
    {
        $requestArray = $request->all();
        $requestArray['nurse_id'] = Auth::guard('nurse-api')->user()->id ?? 1  ;
      
        $patient =Patient::create($requestArray);
        if($patient->age < 6)
        $teethLetterArray = range('a','t');
        elseif($patient->age > 12)
        {
            $teethLetterArray =array_merge(range(11,18) , range(21,28) , range(31,38) , range(41,48)); 
            // $teethLetterArray[] =range(21,28); 
            // $teethLetterArray[] =range(31,38); 
            // $teethLetterArray[] =range(41,48); 
            // range('','','','','','','','','','','','','','','','','','','','','','','','','',
            // '','','','','','','','','','','','','','','','','','','','','','','','','','','',);
        }
       
        for ($i=0; $i <count($teethLetterArray) ; $i++) { 
            Teeth::create(
                [
                    'name'=>$teethLetterArray[$i] ,
                    'initial_status'=>"good",
                    'status'=>"good" ,
                    'patient_id'=>$patient->id 
                ]
                );
        }
        $data['patient_id'] = $patient->id ;
        return $this->APIResponse($data, null, 200);
    }

    public function update($id , Request $request)
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

    public function destroy($id)
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
}
