<?php

namespace App\Http\Controllers\DashBoard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use Auth;
class QuestionController extends BackEndController
{
    public function __construct(Question $model)
    {
        parent::__construct($model);
    }
    public function store(Request $request){
            $requestArray = $request->all();
            $requestArray['user_id'] = Auth::user()->id;
            $this->model->create($requestArray);
            session()->flash('action', 'add successfully');     
            return redirect()->route($this->getClassNameFromModel().'.index');
    }

    public function update($id , Request $request){

        $row = $this->model->FindOrFail($id);
        $requestArray = $request->all(); 
        $requestArray['user_id'] = Auth::user()->id;
        $row->update($requestArray);
        $row->save();
        session()->flash('action', 'updated successfully');
        return redirect()->route($this->getClassNameFromModel().'.index');
    }
}
