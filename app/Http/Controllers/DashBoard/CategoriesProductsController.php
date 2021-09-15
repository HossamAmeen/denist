<?php

namespace App\Http\Controllers\DashBoard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Auth;
class CategoriesProductsController extends BackEndController
{
    public function __construct(ProductCategory $model)
    {
        parent::__construct($model);
        $this->routeNameEdit='categoriesProducts' ;
        $this->pageName = "categories of product";
    }
   
    public function filter($rows)
    {
        if( request('search') != null )
        $rows = $rows->where('name' , 'LIKE', '%' . request('search') . '%' );
        if( request('vendor_id') != 'null' && request('vendor_id') != null && request('vendor_id') != '')
        $rows = $rows->where('vendor_id' ,request('vendor_id'));
        return $rows;
    }

    public function update(Request $request, $id)
    {
        $this->model::find($id)->update($request->all());
        session()->flash('action', 'Edit successfully');
        return redirect()->back();
        return redirect()->route('categoriesProducts.index');
    }
}
