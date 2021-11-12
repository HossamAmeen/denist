<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {
//     return redirect()->route('login');
//  });
Route::prefix('admin')->namespace('DashBoard')->group(function(){
    // Route::get('/' , 'AuthAdminController@login');
    // Route::middleware('auth')->group(function () {
    //     Route::get('home' , 'ConfigrationController@index');
    //     Route::put('update-website-configration/{id}' , 'ConfigrationController@update')->name('configration.update');
    //     Route::resource('admins' , "UserController");
    //     Route::resource('cities' , "CityController");
    //     Route::resource('vendors' , "VendorController");
    //     Route::get('product-categories/{VendorId}' , 'VendorController@showCategoriesOfProducts');
    //     Route::resource('clients' , "ClientController");
    //     Route::get('client-carts/{VendorId}' , 'ClientController@showCarts');
    //     Route::delete('delete-cart-item/{cartItemId}' , 'ClientController@deleteCartItem')->name('delete-cart-item');
    //     Route::get('client-wishlist/{VendorId}' , 'ClientController@showWishList');
    //     Route::delete('delete-wishlist/{wishListItemId}' , 'ClientController@deleteWishListItem')->name('wishlist.delete');
    //     Route::get('accept-client/{status}/{clientId}/{blockReason}' , 'ClientController@changeStatus');
    //     Route::get('change-client-status/{is_vip}/{clientId}' , 'ClientController@changeStatusToVIP');
    //     Route::resource('categories' , "CategoryController");
    //     Route::get('admin/categories-products/{VendorId}' , 'VendorController@showCategoriesOfProducts');
    //     Route::resource('products' , "ProductController");
    //     Route::resource('categoriesProducts', 'CategoriesProductsController');
    //     Route::resource('orders' , "OrderController");
    //     Route::resource('offers' , "OfferController");
    //     Route::resource('cities' , "CityController");
    //     Route::resource('shippingcards' , "ShippingCardController");
    //     Route::get('complaints' , "ConfigrationController@showComlpaints")->name('complaints.index');
    //     Route::delete('complaints/{complaintId}' , "ConfigrationController@deleteComlpaint")->name('complaints.destroy');
    //     Route::resource('questions' , "QuestionController");
    //     Route::post('logout' , 'AuthAdminController@logout');
    // });
});

Auth::routes();
Route::get('/conditions' ,  'HomeController@conditions');
// Route::get('/home', 'HomeController@index')->name('home');
