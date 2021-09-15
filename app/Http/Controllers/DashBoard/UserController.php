<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests\User\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Image , Auth;

class UserController extends BackEndController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
        $this->routeNameEdit='admins' ;
    }

    public function store(UserRequest $request){
    //    return $request->all();
       
        $requestArray = $request->all();
        if(isset($requestArray['password']) )
        $requestArray['password'] =  Hash::make($requestArray['password']);
        if(isset($requestArray['image']) )
        {
            $fileName = $this->uploadImage($request );
            $requestArray['image'] =  $fileName;
        }
        $routeName = $this->getRouteName();
        $requestArray['user_id'] = Auth::user()->id;
        $this->model->create($requestArray);
        session()->flash('action', 'add successfully');
       
      
 
        return redirect()->route($routeName.'.index');
    }

    public function update($id , UserRequest $request){

        
       
        $row = $this->model->FindOrFail($id);
        $requestArray = $request->all();
        if(isset($requestArray['password']) && $requestArray['password'] != ""){
            $requestArray['password'] =  Hash::make($requestArray['password']);
        }else{
            unset($requestArray['password']);
        }
        if(isset($requestArray['image']) )
        {
            $fileName = $this->uploadImage($request );
            $requestArray['image'] =  $fileName;
        }
        
        $requestArray['user_id'] = Auth::user()->id;
        $row->update($requestArray);

        session()->flash('action', 'updated successfully');
        return redirect()->route($this->getClassNameFromModel().'.index');
    }

    public function filter($rows)
    {
       
        if( request('search') != null )
        $rows = $rows->where('user_name' , 'LIKE', '%' . request('search') . '%' )
                     ->orWhere('name' , 'LIKE', '%' . request('search') . '%' )
                     ->orWhere('email' , 'LIKE', '%' . request('search') . '%')
                     ->orWhere('phone' , 'LIKE', '%' . request('search') . '%');
        return $rows; 
    }
   
}
