<?php

namespace App\Http\Controllers\DashBoard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Configration,Complaint};
use Auth ;
use Carbon\Carbon;

class ConfigrationController extends BackEndController
{
    public function __construct(Configration $model)
    {
        parent::__construct($model);
    }
    public function index()
    {
        // return date('m');
        $configrationSite = Configration::find(1);
        $vendors = \App\Models\Vendor::query();
        $clients = \App\Models\Client::query();
        $orders  =\App\Models\OrderItem::query();
        $products  =\App\Models\Product::query();
        $top_product = \App\Models\OrderItem::select('product_id')
                ->selectRaw('count(product_id) as qty')
                ->groupBy('product_id')
                ->orderBy('qty', 'DESC')
                ->limit(1)
                ->get();
        $top_client = \App\Models\OrderItem::select('client_id')
                ->selectRaw('count(client_id) as qty')
                ->groupBy('client_id')
                ->orderBy('qty', 'DESC')
                ->limit(1)
                ->get();
        $top_product =\App\Models\Product::find($top_product[0]->product_id);
        $top_client =\App\Models\Client::find($top_client[0]->client_id);
        $configrationSite['vendors'] =$vendors->count() ;
        // $configrationSite['accepted_vendors'] =$vendors->where('status' , 'accept')->count() ;
        // $configrationSite['blocked_vendors'] =$vendors->where('status' , 'blocked')->count() ;
        // return  $configrationSite['blocked_vendors'] ;
        $configrationSite['current_month_vendors'] =$vendors->whereMonth('created_at' , date('m'))->count() ;
        $configrationSite['current_week_vendors'] =$vendors->where('created_at', '>', Carbon::now()->startOfWeek())
                                                            ->where('created_at', '<', Carbon::now()->endOfWeek())->count() ;
       
        $configrationSite['clients'] = $clients->count();
        $configrationSite['today_clients'] = $clients->wheredate('created_at' , date('Y-m-d'))->count();
        $configrationSite['week_clients'] = $clients->where('created_at', '>', Carbon::now()->startOfWeek())
                                                    ->where('created_at', '<', Carbon::now()->endOfWeek())->count() ;
        $configrationSite['month_clients'] = $clients->whereMonth('created_at' , date('m'))->count();
        $configrationSite['enterd_today_clients'] = $clients->wheredate('entered_date' , date('Y-m-d'))->count();
        
        $configrationSite['orders'] = $orders->count();
        $configrationSite['today_orders'] =  $orders->wheredate('created_at' , date('Y-m-d'))->count();
        $configrationSite['week_orders'] =  $orders->where('created_at', '>', Carbon::now()->startOfWeek())
                                                    ->where('created_at', '<', Carbon::now()->endOfWeek())->count();
        $configrationSite['month_orders'] =  $orders->whereMonth('created_at' , date('m'))->count() ;
        $configrationSite['products'] = $products->count();
        $configrationSite['products_upload_this_month'] =$products->whereMonth('created_at' , date('m'))->count() ;
       
       
        
        if(isset($top_product))
            $configrationSite['top_product'] = $top_product->name. '('. ( $top_product->vendor->store_name ??  " " ).')';
        else
            $configrationSite['top_product'] = "";

        if(isset($top_client))
            $configrationSite['top_client'] = $top_client->full_name;
        else
            $configrationSite['top_client'] = "";
            // $top_product = \App\Models\Order::pluck('product_id')->toArray();
            // $occurrences = array_count_values($top_product);
            // // arsort($occurrences);
            // $items = array_slice($occurrences, 0, 3);
            // return $occurrences;
        // return $ordered[0]->product->name ;
        return view('back-end.dashboard' , compact('configrationSite'));
    }
    public function update(Request $request , $id)
    {
        $configration = Configration::find(1);
        $request['user_id'] = Auth::user()->id;
        $configration->update($request->all());
        // return $configration;
        session()->flash('action', 'updated successfully');
        return redirect()->back();

    }
    public function showComlpaints()
    {
        $rows = Complaint::paginate(15);
        $folderName ='complaints';
        $pageTitle = "Show complaints from clients";
        $routeName = "complaints";
        return view('back-end.complaints', compact(
            'rows',
            'routeName',
            'pageTitle',
            'folderName',
        ));
    }
    public function deleteComlpaint($complaintId)
    {
        $row = Complaint::find($complaintId);
        if($row){
            $row->delete();
            session()->flash('action', 'deleted successfully');
        }
        return redirect()->back();
    }
}
