<?php

namespace App\Http\Controllers\DashBoard;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Vendor\UpdateVendorRequest;
use App\Models\{Vendor,Order,Product,ProductCategory};
use Auth;
class VendorController extends BackEndController
{
    public function __construct(Vendor $model)
    {
        parent::__construct($model);
    }
    public function update($id , UpdateVendorRequest $request){
        $row = $this->model->FindOrFail($id);
        $requestArray = $request->all();
        if(isset($requestArray['password']) && $requestArray['password'] != ""){
            $requestArray['password'] =  Hash::make($requestArray['password']);
        }else{
            unset($requestArray['password']);
        }
        $requestArray['user_id'] = Auth::user()->id;
        $row->update($requestArray);

        
        if($request->block_reason){
            $row->block_reason = $request->block_reason;

        }
        $row->save();
        session()->flash('action', 'updated successfully');
        return redirect()->route($this->getClassNameFromModel().'.index');
    }
    public function edit($id)
    {
        // return Auth::user()->role;
        $row = $this->model->FindOrFail($id);
        $moduleName = $this->getModelName();
        $pageTitle = "Edit " . $moduleName;
        $pageDes = "Here you can edit " .$moduleName;
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;
        $append = $this->appendEdited($id);
        //  return $row->images;

        return view('back-end.' . $folderName . '.edit', compact(
            'row',
            'pageTitle',
            'moduleName',
            'pageDes',
            'folderName',
            'routeName'
        ))->with($append);
    }

    public function appendEdited($vendorId)
    {
        $products = Product::where('vendor_id' , $vendorId)->get();
        $categories = ProductCategory::where('vendor_id' , $vendorId)->get();
        $orders= Order::where('vendor_id' , $vendorId)->where('status' , 'done') ;

        $data['products_count'] = $products ->count() ;
        $data['categories_count'] = $categories ->count() ;

        $data['orders_count'] =  $orders->get()->count();
        $data['total_gain'] = $orders->get()->sum('vendor_benefit') ;
        $data['monthly_benefit'] = $orders->whereMonth('updated_at' , date('m') )->get()->sum('vendor_benefit') ;
        return $data;
    }
    public function showCategoriesOfProducts($vendorId)
    {
        $rows = ProductCategory::where('vendor_id' , $vendorId)->paginate(15);
        $folderName = $this->getClassNameFromModel();
        $pageTitle = "Show categories of products";
        $routeName = "Show categories of products";
        return view('back-end.' . $folderName . '.show-product-categories', compact(
            'rows',
            'routeName',
            'pageTitle',
            'folderName',
        ));
    }
    public function filter($rows)
    {
        if( request('search') != null )
        $rows = $rows->where('first_name' , 'LIKE', '%' . request('search') . '%' )
                     ->orWhere('last_name' , 'LIKE', '%' . request('search') . '%' )
                     ->orWhere('store_name' , 'LIKE', '%' . request('search') . '%')
                     ->orWhere('email' , 'LIKE', '%' . request('search') . '%')
                     ->orWhere('phone' , 'LIKE', '%' . request('search') . '%');
        
        if( request('category_id') != null )
        $rows = $rows->where('category_id' , 'LIKE', '%' . request('category_id') . '%' );
        return $rows;
    }
    public function deleteRelatedItems($rowId)
    {
        $products = Product::where('vendor_id' , $rowId)->delete();
    }
}
