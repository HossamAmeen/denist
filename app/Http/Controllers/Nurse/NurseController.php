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

    
   

   
}
