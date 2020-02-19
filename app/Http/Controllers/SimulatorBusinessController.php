<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
use App\Order;
class SimulatorBusinessController extends Controller
{
	public function index(Request $request)
    {
    	$business = Business::orderBy('name','ASC')->get();
        return view('simuladorbusiness.index',compact('business'));
    }

    public function showOrders(Request $request)
    {
    	$businessID = $request->input('business');
    	error_log($businessID);
    	$orders = Order::where('fk_business_id','=',$businessID)->get();
        return view('simuladorbusiness.showorder',compact('orders'));
    }
}
