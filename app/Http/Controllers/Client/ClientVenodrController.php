<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Client,Vendor,Category,Order,Product,ProductCategory , Offer , WishList};
use Auth;
class ClientVenodrController extends Controller
{
    use APIResponseTrait;
    public function showVendors()
    {
        $vendors = Vendor::orderBy('priority','ASC')->accepted();

        if(request('city_id')){
            $vendors = $vendors->where('city_id' , request('city_id'));

        }
        if(request('category_id')){
            $vendors = $vendors ->where('category_id' , request('category_id'));
        }
        $vendors = $vendors->skip((request('pageNumber') ?? 0 ) * 30 )->take(30)->get(['id','priority','first_name', 'last_name' ,'store_name','client_ratio', 'client_vip_ratio' ,'rating',
         'store_description', 'store_logo' , 'store_background_image' ]);

        return $this->APIResponse($vendors, null, 200);
    }

    public function showVendorsCategories($id)
    {
        $vendor = Vendor::select('first_name','last_name','client_ratio','client_vip_ratio','store_logo','rating','status','block_reason')->find($id);
        if(isset($vendor) )
        {
            if( $vendor->status == "pending"){
            
                    return $this->APIResponse(null, " This account has not been approved from admin", 401);
            }
            elseif($vendor->status == "blocked"){
                return $this->APIResponse(null, "this accout not accept from admin because :" 
                .$vendor->block_reason, 401);
            }
            
        }
        else{
            return $this->APIResponse(null, " This account not found", 401);
        }
     
        $categories = ProductCategory::with(['products'])->where('vendor_id' , $id)->where('is_hidden',0)->get();
        $data = array();
       
        foreach($categories as $item)
        {
            foreach($item->products as $product)
            {
               
                // $discount = $product->discount_ratio !=0 ?  (( $product->price *  $product->discount_ratio /3)/100) :
                //         (  $vendor->client_ratio * $product->price / 100 ) ;
                // $VIPdiscount = $product->discount_ratio !=0 ? (( $product->price *  $product->discount_ratio * 2/3)/100 )  :
                //         (  $vendor->client_vip_ratio * $product->price / 100 ) ;


                // $product['client_price'] = $product->price - $discount ;
                // $product['client_vip_price'] = $product->price - $VIPdiscount;
                $discount = ($product->discount_ratio * $product->price * $vendor->client_ratio )/10000;
                $VIPdiscount = ($product->discount_ratio * $product->price * $vendor->client_vip_ratio )/10000;
                $product['client_price'] = $product->price - $discount ;
                $product['client_vip_price'] = $product->price - $VIPdiscount;
                $favouriteProduct = WishList::where('product_id' , $product->id)->where('client_id' , Auth::guard('client-api')->user()->id)->first();
                $product['is_favourite'] =  $favouriteProduct != null ?1:0;
            }

        }
        return $this->APIResponse($categories, null, 200);
    }
    public function showProducts($id)
    {
        $products = Product::where('vendor_id' , $id)
                            ->where('quantity',0)
                    ->skip((request('pageNumber') ?? 0 ) * 30 )->take(30)
                    ->get(['id' , 'name','description','price','category_id','discount_ratio','image']);
        $data = array();
        $vendor = Vendor::select('first_name','last_name','client_ratio','client_vip_ratio','store_logo','rating')->find($id);
        if(isset($vendor) )
        {
            if( $vendor->status == "pending"){
            
                    return $this->APIResponse(null, " This account has not been approved from admin", 401);
            }
            elseif($vendor->status == "blocked"){
                return $this->APIResponse(null, "this accout not accept from admin because :" 
                .$vendor->block_reason, 401);
            }
            
        }
        else{
            return $this->APIResponse(null, " This account not found", 401);
        }
        foreach($products as $item)
        {
            $product = $item ;
            // $discount = $product->discount_ratio !=0 ? ($product->discount_ratio /3) * $product->price / 100  :
            //              ( ($vendor->client_ratio ?? 0 ) * $product->price / 100 ) ;
            // $VIPdiscount =$product->discount_ratio !=0 ? ($product->discount_ratio* 2 / 3 )  * $product->price / 100 :
            //              ( ( $vendor->client_vip_ratio ?? 0) * $product->price / 100 ) ;
            // $product['client_price'] = $product->price - $discount ;
            // $product['client_vip_price'] = $product->price - $VIPdiscount;
            $discount = ($product->discount_ratio * $product->price * $vendor->client_ratio )/10000;
                $VIPdiscount = ($product->discount_ratio * $product->price * $vendor->client_vip_ratio )/10000;
                $product['client_price'] = $product->price - $discount ;
                $product['client_vip_price'] = $product->price - $VIPdiscount;
            $favouriteProduct = WishList::where('product_id' , $product->id)->where('client_id' , Auth::guard('client-api')->user()->id)->first();
            $product['is_favourite'] =  $favouriteProduct != null ?1:0;
            $data[]=$product;

        }

        return $this->APIResponse($data, null, 200);
    }
    public function searchOfVendors()
    {
        // return request('name') ;
        if(request('vendorId'))
        {
            $vendor = Vendor::accepted()->find( request('vendorId'));
            if(!$vendor){
                return $this->APIResponse(null, "this vendor is blocked", 400);
            }
            $products = Product::where('vendor_id' , request('vendorId'))
                             ->where('quantity',0)
                             ->where('name' , 'LIKE', '%' . request('name') . '%' )
                             ->orWhere('description' , 'LIKE', '%' . request('name') . '%')
                             ->get(['id' , 'name','description','price','category_id','discount_ratio','image']);
            $data = array();
            foreach($products as $item)
            {
                $product = $item ;
                // $discount =$product->discount_ratio !=0 ? $product->discount_ratio *  3 : (  $vendor->client_ratio ?? 0 * $product->price / 100 ) ;
                // $VIPdiscount =$product->discount_ratio !=0 ? $product->discount_ratio* 2 / 3  : (  $vendor->client_vip_ratio ?? 0 * $product->price / 100 ) ;
                // $product['client_price'] = $product->price - $discount ;
                // $product['client_vip_price'] = $product->price - $VIPdiscount;
                $discount = ($product->discount_ratio * $product->price * $vendor->client_ratio )/10000;
                $VIPdiscount = ($product->discount_ratio * $product->price * $vendor->client_vip_ratio )/10000;
                $product['client_price'] = $product->price - $discount ;
                $product['client_vip_price'] = $product->price - $VIPdiscount;
                $favouriteProduct = WishList::where('product_id' , $product->id)->where('client_id' , Auth::guard('client-api')->user()->id)->first();
                $product['is_favourite'] =  $favouriteProduct != null ?1:0;
                $data[]=$product;

            }
        }
       else
       {
        $data = Vendor::accepted()->where('store_name' , 'LIKE', '%' . request('name') . '%' )
        // ->orWhere('last_name' , 'LIKE', '%' . request('name') . '%')
       ->get(['id','store_name' , 'store_description','client_ratio','client_vip_ratio','store_logo','store_background_image','rating']);
       }
        return $this->APIResponse($data, null, 200);
    }

    public function showOffers()
    {
        $offers = Offer::get('image');
        return $this->APIResponse($offers, null, 200);
    }

}
