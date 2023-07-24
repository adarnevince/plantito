<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;


Route::get('/home', function () {
    return view('home');
});

// ---- LOG-IN / USER ---- //

Route::get('/login', [UserController::class, 'pageLogin']);
Route::post('/profile', [UserController::class, 'login']);

Route::get('/profile', [UserController::class, 'pageProfile']);
Route::get('/profile', [UserController::class, 'showProfile']);

Route::get('/contact-us', [UserController::class, 'contactUs']);


// ---- USER ORDERS ---- //
Route::get('/orders', [ShopController::class, 'showOrder']);
Route::get('/orderId={id}', [ShopController::class, 'OrderShow']);
Route::get("/completed-orders", [ShopController::class, 'CompletedOrders']);
Route::put('/order-received={id}', [ShopController::class, 'receiveOrder']);
Route::put('/order-cancelled={id}', [ShopController::class, 'cancelOrder']);


// ---- REGISTER ---- //
Route::post('/login', [UserController::class, 'register']);


// ---- SHOP ---- //
Route::get('/shop', [ShopController::class, 'showShop']);
Route::post('/shop', [ShopController::class, 'addOrder']);
Route::post('/shop-checkout', [ShopController::class, 'placeOrder']);


// ---- ADMIN ---- //
Route::get('/admin', function() {
    return view('admin');
});
Route::get('/admin-UserOrders', [ShopController::class, 'showOngoingOrders']);
Route::get('/admin-CompletedOrders', [ShopController::class, 'showCompletedOrders']);
Route::get('/admin-UserOrdersId={id}', [ShopController::class, 'showOrderInfo']);
Route::put('/admin-AcceptUserOrdersId={id}', [ShopController::class, 'acceptOrder']);
Route::put('/admin-CancelUserOrdersId={id}', [ShopController::class, 'AdminCancelOrder']);
Route::put('/admin-UpdateUserOrdersId={id}', [ShopController::class, 'updateOrder']);
Route::get('/admin-viewUserId={id}', [UserController::class, 'viewUser']);

Route::resource('/admin-products', ProductController::class);
Route::put('/admin-RestockProductId={id}', [ProductController::class, 'restock']);
Route::get('/admin-newproduct', [ProductController::class, 'create']);


// ---- LOGOUT ---- //
Route::get('/logout', [UserController::class, 'logout']);

