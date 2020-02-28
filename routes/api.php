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


Route::get('/getbusiness', function(Request $request) {
	$business = Business::all();
    return response()->json([
    	"Status"=>"OK",
    	"Message"=>"OK",
    	"Business"=>$business
    ]);
});

Route::get('/getbusiness/{zip_code}', function(Request $request, $zip_code) {
	$businessFilter = Business::where('zip_code', $zip_code)->get();
    return response()->json([
    	"Status"=>"OK",
    	"Message"=>"OK",
    	"Business"=>$businessFilter
    ]);
});

Route::get('/getbusiness/products/{id}', function(Request $request, $id) {
	$businessProducts = Product::where('fk_business_id', $id)->get();
    return response()->json([
    	"Status"=>"OK",
    	"Message"=>"OK",
    	"Products"=>$businessProducts
    ]);
});
