<?php

namespace App\Http\Controllers\DashBoard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingCard;
use Auth;
class ShippingCardController extends BackEndController
{
    public function __construct(ShippingCard $model)
    {
        parent::__construct($model);
        $this->pageName = "shipping cards";
    
    }
    public function store(Request $request){
             set_time_limit(8000000);
            $requestArray['user_id'] = Auth::user()->id;
            $repetitions = $request->repetitions ?? 1 ; 
            if( $repetitions > 15){
                
                return redirect()->back()->withErrors([
                    'repetitions' => 'Please choose a number less than 15',
                    ])->withInput();
           
                // session()->flash('action', 'please ');     
            }
            for($i = 1 ; $i<= $repetitions ; $i++){
                $requestArray['number'] =  $this->generateRandomNumber(15);
                while( $this->checkNumber( $requestArray['number'] )  ) {
                    $requestArray['number'] =  $this->generateRandomNumber(15);
                }
                $this->model->create($requestArray);
            }
          
            session()->flash('action', 'add successfully');     
            return redirect()->route($this->getClassNameFromModel().'.index');
    }
    
    function generateRandomNumber($length)
    {
        $str = rand(0, 9); // first number (0 not allowed)
        for ($i = 1; $i < $length; $i++)
            $str .= rand(0, 9);

        return $str;
    }

    public function checkNumber($number)
    {
        $shippingCard = $this->model->where('number' , $number)->first();
        if($shippingCard){
            return true;
        }
        else
        return false;
    }
    public function filter($rows)
    {
        if( request('search') != null ){

            $rows = $rows->where('number' , 'LIKE', '%' . request('search') . '%' )
            ->orWhere('date' , 'LIKE', '%' . request('search') . '%' )
            ->orWhere('user_name' , 'LIKE', '%' . request('search') . '%' )
            ->orWhere('user_email' , 'LIKE', '%' . request('search') . '%' )
            ;
        }
       
        return $rows;
    }

}
