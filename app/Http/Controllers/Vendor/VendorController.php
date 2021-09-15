<?php

namespace App\Http\Controllers\Vendor;
use App\Http\Controllers\APIResponseTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\{Vendor,Category,Order,ProductCategory , ShippingCard};
use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Vendor\VendorRequest;
use Auth , File;
class VendorController extends Controller
{
    use APIResponseTrait;
    public function register(VendorRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails())
        {
            return $this->APIResponse(null , $request->validator->messages() ,  400);
        }
        $requestArray = $request->validated();
        $requestArray['password'] = bcrypt( $request->password);
        $requestArray['status'] = 'pending';

        $this->uploadImages($request , $requestArray);

        $vendor = Vendor::create($requestArray);
        $success['token'] = $vendor->createToken('token')->accessToken;
        return $this->APIResponse($success, null, 200);
    }
    public function login()
    {
        $validator = Validator::make(request()->all(), [
            'user_name' => 'required|string',
            'password' => 'required|string',
        ]);
            ;
        if ($validator->fails()) {
            return $this->APIResponse(null , $validator->messages() ,  422);
        }

        $vendor = Vendor::where($this->checkField(), request('user_name'))->first();

        if ($vendor) {
            if (Hash::check(request('password'), $vendor->password)) {

                $success['token'] = $vendor->createToken('token')->accessToken;
                return $this->APIResponse($success, null, 200);
            } else {
                return $this->APIResponse(null, "Password mismatch", 422);
            }
        } else {
            return $this->APIResponse(null, "User name does not exist", 422);
        }

    }
    public function checkField()
    {
        $field = 'phone';

        if (is_numeric( request('user_name'))) {
            $field = 'phone';
        }
        elseif (filter_var( request('user_name'), FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        }
        else
        {
            $field = 'user_name';
        }
        return $field ;
    }
    public function showProfile()
    {
        $vendor = Vendor::find(Auth::guard('vendor-api')->user()->id);
        $monthEaarning = 0 ;
        $orders = Order::where('vendor_id', Auth::guard('vendor-api')->user()->id)
                         ->where('status' , 'done');

        $ordersTotal = $orders->get();
        $monthOrders = Order::select('orders.*')
        ->join('carts', 'carts.id', '=', 'orders.cart_id')
        ->where('orders.vendor_id', Auth::guard('vendor-api')->user()->id)
        ->where('orders.status' , 'done')
        ->whereYear('carts.date' , date('Y'))
        ->whereMonth('carts.date' , date('m'))
        ->get();

        // return $monthOrders;
        $vendor['total'] =  count($ordersTotal);
        $vendor['totalEarning'] = $ordersTotal->sum('vendor_benefit');

        $vendor['monthOrders'] =  count($monthOrders);
        $vendor['monthEarning'] = $monthOrders->sum('vendor_benefit');
        $vendor['appFree'] =  $vendor->app_gain;
        $vendor['appFreeRatio'] =  $vendor->discount_ratio;
        return $this->APIResponse($vendor, null, 200);
    }

    public function updateProfile(VendorRequest $request)
    {

        if (isset($request->validator) && $request->validator->fails())
        {
            return $this->APIResponse(null , $request->validator->messages() ,  422);
        }
        $vendor = Vendor::find(Auth::guard('vendor-api')->user()->id);
        $requestArray = $request->validated();

        $this->uploadImages($request , $requestArray);
        //    return "test";
        if(isset($request->password))
        $requestArray['password'] = bcrypt($request->password);
        $vendor->update($requestArray);
        return $this->APIResponse($vendor, null, 200);
    }
    // public function updateImage(Request $request)
    // {

    //     $vendor = Vendor::find(Auth::guard('vendor-api')->user()->id);
    //     $this->uploadImages(request() , $requestArray);
    //     $vendor->update($requestArray);
    //     return  $vendor->getChanges();
    //     return $this->APIResponse(null, null, 200);
    // }
    public function uploadImages($request ,& $requestArray)
    {
        set_time_limit(8000000);
        //$name = rand().time()
        /**
         * $path = public_path()."/uploads/vendors/".date("Y-m-d");
        if(!File::isDirectory($path))
        {
            // return "test1";
            File::makeDirectory($path, 0777, true, true);
        }
        copy (  public_path().'/avatar.png',  $path.'/avatar2.png' );

         */
        $request->logo_image != null ? $requestArray['store_logo'] = uploadFile($request->logo_image , 'vendors') :  null;   ///// upload File helper function
        $request->background_image != null ?  $requestArray['store_background_image'] =  uploadFile($request->background_image , 'vendors') : null;
        $request->company_registration_photo != null ?   $requestArray['company_registration_image'] = uploadFile($request->company_registration_photo , 'vendors') : null;
        $request->national_id_front_photo != null ?  $requestArray['national_id_front_image'] =  uploadFile($request->national_id_front_photo , 'vendors') : null;
        $request->national_id_back_image != null ?  $requestArray['national_id_back_image'] =  uploadFile($request->national_id_back_image , 'vendors') : null;

    }
    public function logout (Request $request) {

        $token = $request->user()->token();
        $token->revoke();

        $response = 'You have been succesfully logged out!';
        return response($response, 200);

    }
    public function rechargeBalance(Request $request)
    {
        $balance = ShippingCard::where('number' , $request->number)->first();
        //    return $request->number;
         if($balance){
             if($balance->is_used == true)
             {
                 return $this->APIResponse(null, "this card is used", 400);
             }
             $balance->update([
                 'is_used'=>true,
                 'user_table'=>'vendors',
                 'user_name'=>Auth::guard('vendor-api')->user()->name,
                 'user_email'=>Auth::guard('vendor-api')->user()->email,
                 'date'=>date('Y-m-d'),
                 'benefactor_id'=>Auth::guard('vendor-api')->user()->id
             ]);
             return $this->APIResponse(null, null, 200);
         }
         else{
             return $this->APIResponse(null, "this card not found", 400);
         }
    }
}
