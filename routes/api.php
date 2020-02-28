<?php

use Illuminate\Http\Request;
use App\Business;
use App\Product;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/business', function () {
    $business = Business::all();
    return $business->toJson();
});

Route::get('/product/{id}', function($id) {
    $product = Product::where('fk_business_id' , $id)->get();
    return $product->toJson();
});

Route::get('/product', function () {
    $product = Product::all();
    return $product->toJson();
});
