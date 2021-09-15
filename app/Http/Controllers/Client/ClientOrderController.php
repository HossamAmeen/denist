<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Cart , Vendor,Order,OrderItem,Product,ProductChoice,OrderChoice};
use Auth;
class ClientOrderController extends Controller
{
    use APIResponseTrait;
    public function showOrders($id = null)
    {

        if(request('id') != null){
            $orders = Order::with(['itemsSent.product','address'])
            ->select('id'  ,'date','time','total_discount','discount_ratio','delivery_cost', 'price' ,'status' ,'client_id','client_address_id','vendor_id')
            ->find(request('id') );

            return $this->APIResponse($orders, null, 200);
        }
        else
        {
            $orders = Order::with(['itemsSent.product','address'])
                            ->where('client_id' ,  Auth::guard('client-api')->user()->id)
                            ->where('status', '!=', 'pending from client')
                            ->where('status', '!=', 'done')
                            ->get(['id'  ,'date','time','total_discount','discount_ratio','delivery_cost', 'price' ,'status' ,'client_id','client_address_id','vendor_id']);
            $doneOrders = Order::with(['itemsSent.product','address'])
                            ->where('client_id' ,  Auth::guard('client-api')->user()->id)
                            ->where('status', '=', 'done')
                            ->orderBy('id' , 'DESC')
                            ->take(20)
                            ->get(['id'  ,'date','time','total_discount','discount_ratio','delivery_cost', 'price' ,'status' ,'client_id','client_address_id','vendor_id']);

        foreach($doneOrders as $doneOrder){
            $orders[] = $doneOrder ;
        }
            return $this->APIResponse($orders, null, 200);
        }

    }

    public function updateOrder($id , Request $request)
    {
        $orderItem = OrderItem::where(['id'=>$id] )->first();

        if(! isset($orderItem))
        {
            return $this->APIResponse(null, "this order item not found", 400);
        }

        if($orderItem->client_id != Auth::guard('client-api')->user()->id)
           return $this->APIResponse(null, "this order not for this client", 400);


        if($request->quantity){
            $product = Product::find($orderItem->product_id);
            if(!isset( $product)){
                return $this->APIResponse(null, "this product not found", 400);
            }

            $orderItem->over_quantity =$request->quantity > $product->quantity  ? $request->quantity - abs($product->quantity) : 0 ;
            $orderItem->quantity = $request->quantity;
            $orderItem->discount =   $orderItem->quantity * ($orderItem->discount_ratio / 100 ) * $product->price;
            
        }

        if(request('rating')){
            $orderItem->rating = ( $orderItem->rating + request('rating') ) / 2 ;
        }
        if(request('status')){
            $orderItem->status = request('status')  ;
        }
        $orderItem->save();
        return $this->APIResponse(null, null, 200);
    }

    public function showCart()  ///// not work
    {
        $orders = Order::with(['items.choices' ,'items.product' ])->where('client_id' , Auth::guard('client-api')->user()->id)
                    ->where(['status'=>'pending from client'])
                    ->get(['id'  ,'date','total_discount','discount_ratio','delivery_cost', 'price' ,'status' ,'client_id']);
        $data['orders'] =  $orders;
        $data['totalCost'] =  $orders->sum('price');

        // return $cart ;
        if($orders){
            // $order['totalCost'] = $order->sum('price');
            return $this->APIResponse($data, null, 200);
        }

        else
        return $this->APIResponse(null, null, 200);
    }

    public function checkoutCart() //// not work
    {
        // $cart = Cart::where(['client_id' =>  Auth::guard('client-api')->user()->id , 'is_done'=> false ])->first();
        $orders = Order::where(['client_id' =>  Auth::guard('client-api')->user()->id ,'status' =>'pending from client' ] );

        if($orders){
            if(request('address_id') != null && request('address_id') != 'null'){
                $addressId  =request('address_id') ;
            }else{
                if( Auth::guard('client-api')->user()->favouriteAddress == null ) // ?? Auth::guard('client-api')->user()->addresses->id ;
                {
                    return $this->APIResponse(null, "please choose address", 400);
                }
                else
                {
                    $addressId  =  Auth::guard('client-api')->user()->favouriteAddress->id ;
                    // $addressId  = Auth::guard('client-api')->user()->favouriteAddress->id;
                }
                $orders->update([
                    'status'            => 'sending from client',
                    'client_address_id' => $addressId,
                    'date'              => date('Y-m-d'),
                ]);

                OrderItem::whereIn('order_id' , $orders->get('id')->toArray())->update([
                    'status'            => 'sending from client',
                ]);
                return $this->APIResponse(null, null, 200);
            }
        }
        else{
            return $this->APIResponse(null, "this cart not found", 400);
        }

    }


    public function addOrder(Request $request) ///// not work
    {
        $clientId = Auth::guard('client-api')->user()->id ;
        $product= Product::find($request->product_id);
        if(!isset($product)){
            return $this->APIResponse(null, "this product not found", 400);
        }

        // $cart = Cart::where(  'client_id' , '=' ,  $clientId )->where( 'is_done' , false)->first();
        // if(!isset($cart)){
        //     $cart = Cart::create(['client_id' =>  $clientId ,'total_cost'=>0 ]);
        // }


        $over_quantity = $request->quantity > $product->quantity  ? $request->quantity - $product->quantity : 0 ;

        $vendor = Vendor::select('id','discount_ratio','client_ratio','client_vip_ratio' , 'delivery')->find($product->vendor_id);
        $is_client_vip = Auth::guard('client-api')->user()->is_vip ;

        $order = Order::where(['client_id' =>  $clientId , 'vendor_id' => $vendor->id] )->where( 'status' , 'pending from client' )->first();
                ////
        if(!isset($order)){

            $order = Order::create([
                'price'=>  $vendor->delivery_cost ?? 0,
                'delivery_cost' => $vendor->delivery_cost ?? 0,
                'is_vip'=>$is_client_vip,
                'discount_ratio'=>$is_client_vip == true ? ($vendor->client_vip_ratio ?? 0) : ($vendor->client_ratio ?? 0) ,
                'vendor_id' =>$vendor->id,
                'client_id'=>  $clientId
            ]);
        }
        $orderItem = OrderItem::where(['product_id'=> $request->product_id , 'order_id' =>  $order->id , 'status'=>'pending from client' ])->first();
        // return $order ;
        if(isset($orderItem))
        {
            return $this->APIResponse(null, 'this order item is founded', 400);
        }

        $discount = ($product->discount_ratio * $product->price * $vendor->client_ratio )/10000;
        $VIPdiscount = ($product->discount_ratio * $product->price * $vendor->client_vip_ratio )/10000;
        
        

        $orderItem = OrderItem::create([
            'price'=> $is_client_vip == true ? $product->price - $VIPdiscount : $product->price -  $discount,
            'choice_price'=>0,
            'discount'=>$is_client_vip == true ? $VIPdiscount : $discount,
            'discount_ratio'=>$is_client_vip == true ? ($product->discount_ratio* $vendor->client_vip_ratio )/10000 :  ($product->discount_ratio * $vendor->client_ratio )/10000 ,
            'vendor_benefit'=>$request->quantity * ( $product->price -  $is_client_vip == true ? $VIPdiscount : $discount ) ,
            'is_vip'=>$is_client_vip,
            'quantity'=>$request->quantity ,
            'over_quantity'=> $over_quantity,
            'product_id'=>$request->product_id,
            'order_id' => $order->id

        ]);



        if($request->choices){
            $orderItem->choice_price = $this->addChoiceForOrder($request->choices , $orderItem->id);
            $orderItem->vendor_benefit += $orderItem->choice_price  ;
            $orderItem->save();
            $order->price  += $orderItem->choice_price ;
        }
        $order->price  +=  $orderItem->quantity * $orderItem->price;
        // $order->vendor_benefit  +=  $orderItem->quantity * $orderItem->vendor_benefit;
        $order->total_discount +=  $orderItem->discount ;
        $order->delivery_cost = $vendor->delivery ?? 0 ;
        $order->save();
        // $cart->total_cost += $order->quantity * $order->price + $choicesCost ;
        // $cart->save();

        return $this->APIResponse(null, null, 200);
    }


    public function deleteOrderItem($orderItemId) //// not work
    {
        $orderItem =  OrderItem::find($orderItemId);
       if(isset($orderItem)){

        //    if($orderItem->client_id != Auth::guard('client-api')->user()->id){
        //     return $this->APIResponse(null, "this order not for this client", 400);
        //    }
           $totalChoicesCost =  OrderChoice::where('order_item_id' , $orderItem->id)->sum('price');
           $order =  Order::find($orderItem->order_id);
           $order->price = $order->price - ( $totalChoicesCost + $orderItem->price * $orderItem->quantity);
           $order->save();
           $choicesCost =OrderChoice::where('order_item_id' , $orderItem->id)->get('id');
           OrderChoice::destroy($choicesCost->toArray());

           $orderItem->delete();
           if(count($order->items) == 0){
            $order->delete();
           }
           return $this->APIResponse(null, null, 200);
        }
        else{
            return $this->APIResponse(null, "this order item not found", 400);
           }
    }

    public function deleteOrder($orderId)  //// not work
    {
       $order =  Order::find($orderId);
       if(isset($order)){

           if($order->client_id != Auth::guard('client-api')->user()->id){
            return $this->APIResponse(null, "this order not for this client", 400);
           }
        //    $cart = Cart::find($order->cart_id);
        //    $choicesCost = $this->choicesCost($order->id);
        //    $choicesCost =  OrderChoice::where('order_id' , $order->id)->get('id');
        //    $totalChoicesCost =  OrderChoice::where('order_item_id' , $order->id)->sum('price');
        //    return $choicesCost ;

        //    $cart->total_cost -= $order->price * $order->quantity + $totalChoicesCost ;
            // OrderChoice::destroy($choicesCost->toArray());
        // return ;
        //    $choicesCost->delete();

             $order->delete();
        //    $cart->save();
        return $this->APIResponse(null, null, 200);
       }
       else{
        return $this->APIResponse(null, "this order not found", 400);
       }
    }

    public function addChoiceForOrder($choices , $orderItemId) /////not work
    {
       $choices = ProductChoice::whereIn('id' , $choices )->get();
       $totalCost = 0 ;
       foreach($choices as $choice){
            OrderChoice::create([
                'type'=>$choice->type,
                'name'=>$choice->name,
                'price'=>$choice->price,
                'quantity'=>$choice->quantity,
                'group_name'=>$choice->group_name,
                'order_item_id'=>$orderItemId
            ]);
            $totalCost +=$choice->price;
       }
       return $totalCost;
    //    for($i=0 ; $i<count($choices) ; $i++)
    }

    public function addChoiceForOrders($jsonReuest , $productId) ///////////////////// not work
    {
        $json = json_decode($jsonReuest , true) ;

        $choices = $json['Groups'] ;
        $totalCost = 0 ;
        $type;$groupName;
        if(is_array($choices))
        foreach($choices as $key=> $choiceItems){

            foreach($choiceItems as $itemKey =>$item)
            if(is_array($item))
            {
                foreach($item as $itemKeyt =>$itemt){
                    $totalCost += $itemt['price'] ;
                    OrderChoice::create([
                        'name' => $itemt['name'] ,
                        'price' => $itemt['price'] ,
                        'type' => $type,
                        'group_name'=>$groupName,
                        'order_id'=>$productId
                    ]);
                }
            }
            else
            {
                if($itemKey == "name")
                {

                    $groupName = $item ;
                }
                else
                {

                    $type= $item ;

                }
            }
        }
        return $totalCost ;
    }

    public function changeStatus($id)
    {
        $order = Order::find($id);
        if(isset($order)){
            $status =  request('status') ;
            $refuseReason =  request('refuse_reason') ;
            $order->update(['status' => $status , 'refuse_reason'=>$refuseReason]);

            $orderItems = OrderItem::where('order_id' ,  $order->id)->update(['status' => $status , 'refuse_reason'=>$refuseReason]);
            if($status == "done"){
                $vendor = Vendor::find($order->vendor_id);
                $vendor->app_gain += $order->vendor_benefit;
                $vendor->save();
            }
            elseif($status == "vendor accept returned product"){
                $vendor=Vendor::find($order->vendor_id);
                $vendor->app_gain -= $order->vendor_benefit;
                $vendor->save();
            }
            return $this->APIResponse(null, null, 200);
        }
        return $this->APIResponse(null, "this order not found", 400);
    }

     /**
         *
         * {

                "Groups" : [
                                {
                                    "name":"size",
                                    "type":1,
                                    "items" : [
                                        {
                                        "name":"small",
                                        "price":12
                                        },
                                        {
                                        "name":"med",
                                        "price":15
                                        },
                                        {
                                        "name":"large",
                                        "price":20
                                        }
                                    ]
                                },
                                {
                                    "name":"second choice ",
                                    "type":2,
                                     "items" : [
                                        {
                                        "name":"small",
                                        "price":12
                                        },
                                        {
                                        "name":"med",
                                        "price":15
                                        },
                                        {
                                        "name":"large",
                                        "price":20
                                        }
                                    ]
                                }
                        ]
            }

         */
}
