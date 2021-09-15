<?php

namespace App\Http\Controllers\DashBoard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use Auth;
class OfferController extends BackEndController
{
    public function __construct(Offer $model)
    {
        parent::__construct($model);
    }
    public function store(Request $request){
            $requestArray = $request->all();
            $requestArray['user_id'] = Auth::user()->id;
            if(isset($requestArray['image']) )
            {
                $fileName = uploadFile($request->image , 'offers' );
                $requestArray['image'] =  $fileName;
            }
            $this->model->create($requestArray);
            session()->flash('action', 'add successfully');     
            return redirect()->route($this->getClassNameFromModel().'.index');
    }
}
