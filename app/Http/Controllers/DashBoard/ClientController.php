<?php

namespace App\Http\Controllers\DashBoard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Client,WishList,Cart};
class ClientController extends BackEndController
{
    public function __construct(Client $model)
    {
        parent::__construct($model);
    }
    public function changeStatus($status , $clientID , $blockReason)
    {
        
        $client = Client::find($clientID);
        $client->status = $status ; 
        if($status == "blocked"){
          $client->block_reason = $blockReason ; 
        }
        else
        {
            $client->block_reason = "not found";
        }
        $client->save();
        return json_encode(['status'=>'secuss']);
    }
    public function changeStatusToVIP($is_vip , $clientID )
    {
        $client = Client::find($clientID);
        $client->is_vip = $is_vip ; 
        $client->save();
        return json_encode(['status'=>'secuss']);
    }
    
    public function showWishlist($clientId)
    {
        
        $rows = WishList::where('client_id' , $clientId)->paginate(15);
        $folderName = $this->getClassNameFromModel();
        $pageTitle = "Show wishlist";
        $routeName = "Show wishlist";
        return view('back-end.' . $folderName . '.show-wishlist', compact(
            'rows',
            'routeName',
            'pageTitle',
            'folderName',
        ));
    }
    public function deleteWishListItem($wishListItemId)
    {
        $wishListItem= WishList::find($wishListItemId);
        if(isset($wishListItem)){
            $wishListItem->delete();
        }
        session()->flash('action', 'deleted successfully');
        return redirect()->back();
    }
    public function deleteCartItem($cartItemId)
    {
        $cartItem= Cart::find($cartItemId);
        if(isset($cartItem)){
            $cartItem->delete();
        }
        session()->flash('action', 'deleted successfully');
        return redirect()->back();
    }
    public function showCarts($clientId)
    {
        $rows = Cart::where('client_id' , $clientId)->paginate(15);
        $folderName = $this->getClassNameFromModel();
        $pageTitle = "Show carts";
        $routeName = "Show carts";
        return view('back-end.' . $folderName . '.show-carts', compact(
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
                   
                     ->orWhere('email' , 'LIKE', '%' . request('search') . '%')
                     ->orWhere('phone' , 'LIKE', '%' . request('search') . '%');
        return $rows; 
    }
}
