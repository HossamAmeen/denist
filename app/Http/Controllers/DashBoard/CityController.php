<?php

namespace App\Http\Controllers\DashBoard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use Auth;
class CityController extends BackEndController
{
    public function __construct(City $model)
    {
        parent::__construct($model);
    }
    public function store(Request $request){
        $requestArray = $request->all();
        $requestArray['user_id'] = Auth::user()->id;
        $this->model->create($requestArray);
        session()->flash('action', 'Add successfully');
        return redirect()->route($this->getClassNameFromModel().'.index');
    }
    public function filter($rows)
    {
        if( request('search') != null )
        $rows = $rows->where('name' , 'LIKE', '%' . request('search') . '%' );
        return $rows;
    }

    public function update(Request $request, $id)
    {
        $this->model::find($id)->update($request->all());
        session()->flash('action', 'Edit successfully');
        return redirect()->route($this->getClassNameFromModel().'.index');
    }
}
