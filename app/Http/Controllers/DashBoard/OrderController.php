<?php

namespace App\Http\Controllers\DashBoard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderItem;
class OrderController extends BackEndController
{
    public function __construct(OrderItem $model)
    {
        parent::__construct($model);
        $this->pageName = "orders item";
    
    }

    public function show($id)
    {
        // return request('type');
        if(request('type') == 'clients')
        $rows = OrderItem::where('client_id' , $id)->paginate(15);
        else
        $rows = OrderItem::where('vendor_id' , $id)->paginate(15);

        $routeName = $this->getClassNameFromModel();
        return view('back-end/orders.index' , compact('rows' ,'routeName' ));
    }

    public function filter($rows)
    {
        if( request('client_id') != 'null' && request('client_id') != null && request('client_id') != '')
        $rows = $rows->where('client_id' , '=' , request('client_id'));
        // if( request('vendor_id') != 'null')
        if( request('vendor_id') != 'null' && request('vendor_id') != null && request('vendor_id') != '')
        $rows = $rows->where('vendor_id' ,request('vendor_id'));
        // if( request('status') != 'null')
        if( request('status') != 'null' && request('status') != null && request('status') != '')
        $rows = $rows->where('status' ,request('status'));
        // if(request('date') != 'null' && request('date') != null && request('date') !='')
        if( request('date') != 'null' && request('date') != null && request('date') != '')
        $rows = $rows->whereDate('created_at', '=', request('date'));
        // if(request('is_vip') != 'null')
        if( request('is_vip') != 'null' && request('is_vip') != null && request('is_vip') != '')
        $rows = $rows->where('is_vip', '=', request('is_vip'));
        return $rows;
    }
}
