<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Cart , WishList ,Vendor,Order , Product , ProductChoice};
use Auth;
class ClientProductController extends Controller
{
    use APIResponseTrait;

    public function addWishList($productId)
    {
        $wishlist = WishList::where(['client_id' =>Auth::guard('client-api')->user()->id,
                                     'product_id'=> $productId
                                     ])
                            ->first();
        if(isset($wishlist)){
            return $this->APIResponse(null, "this product is added", 400);
        }
        else{
            $wishlist = WishList::create([
                'client_id' =>Auth::guard('client-api')->user()->id,
                'product_id'=> $productId
            ]);
            return $this->APIResponse(null, null, 200);
        }


    }

    public function showWishList()
    {
        // return "tesT";
        $wishlist = Wishlist::with(['product' ,'product.vendorDiscount' ])->where('client_id' , Auth::guard('client-api')->user()->id)->get(['id','client_id' , 'product_id']);
        return $this->APIResponse($wishlist, null, 200);
    }

    public function deleteWishlist($productId)
    {
        $wishlist = WishList::where(['client_id' =>Auth::guard('client-api')->user()->id,
                                     'product_id'=> $productId
                                     ])
                            ->first();
         if(!isset($wishlist)){
            return $this->APIResponse(null, "this product is not found in wishlist", 400);
        }
        else{
            $wishlist->delete();
            return $this->APIResponse(null, null, 200);
        }
    }
    public function showProduct($id)
    {
        $product = Product::find($id);
        // return $product;

        if(isset($product)){
            $vendor = Vendor::find($product->vendor_id);
            $product['choices'] = json_encode(ProductChoice::where('product_id' , $id )->get() );
            $favouriteProduct = WishList::where('product_id' , $product->id)->where('client_id' , Auth::guard('client-api')->user()->id)->first();
            $product['is_favourite'] =  $favouriteProduct != null ?1:0;
            $choices = ProductChoice::where('product_id' , $id )->get()->groupBy('group_name');
            // $choicesArray[] = array();
            foreach($choices as $key=> $item){
               $data['name'] = $key ;
               $data['type'] = " ";
               $data['items'] = array();
               foreach($item as $choice)
               {
                   $tchoice['id']=$choice->id;
                   $tchoice['name']=$choice->name;
                   $tchoice['price']=$choice->price;
                   $tchoice['quantity']=$choice->quantity;
                   $data['type'] = $choice->type;
                   $data['items'][] = $tchoice;
               }
            //    $data['type'] = $choice->type;
               $choicesArray[] = $data ;
            }
            if( isset($choicesArray))
                $product['choices'] = $choicesArray ;
            else
                 $product['choices'] = array();

            // $discount =$product->discount_ratio !=0 ? $product->discount_ratio / 3 : (  $vendor->client_ratio ?? 0 * $product->price / 100 ) ;
            // $VIPdiscount =$product->discount_ratio !=0 ? $product->discount_ratio* 2 / 3  : (  $vendor->client_vip_ratio ?? 0 * $product->price / 100 ) ;
            // $discount = $product->discount_ratio !=0 ?  (( $product->price *  $product->discount_ratio /3)/100) :
            //             (  $vendor->client_ratio * $product->price / 100 ) ;
            // $VIPdiscount = $product->discount_ratio !=0 ? (( $product->price *  $product->discount_ratio * 2/3)/100 )  :
            //             (  $vendor->client_vip_ratio * $product->price / 100 ) ;
            // $product['client_price'] = $product->price - $discount ;
            // $product['client_vip_price'] = $product->price - $VIPdiscount;
                $product['delivery_cost'] =  $vendor->delivery;
                $discount = ($product->discount_ratio == 0 ?  $vendor->discount_ratio : $product->discount_ratio )  * $product->price * $vendor->client_ratio /10000;
                $VIPdiscount = ($product->discount_ratio == 0 ?  $vendor->discount_ratio : $product->discount_ratio ) * $product->price * $vendor->client_vip_ratio /10000;
                // return $VIPdiscount ;
                $product['client_price'] = $product->price - $discount ;
                $product['client_vip_price'] = $product->price - $VIPdiscount;
              
            return $this->APIResponse($product, null, 200);
        }
        else
        {
            return $this->APIResponse(null, "this product not found", 400);
        }
    }




    public function updateOrder($id)
    {
        // $order = Order::find($id);
        // $order->rate
        // $order->update([
        //     'rate' , request('rate')
        //     ]);
        // return $this->APIResponse($orders, null, 200);
    }
}
