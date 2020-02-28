<?php

use Illuminate\Http\Request;
use DB;
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

Route::get('/getbusiness', function(Request $request) {
    return Business::all();
});

Route::get('/getbusiness/{id}', function(Request $request, $id) {
    return  Product::where('fk_business_id', $id)->get();
});
