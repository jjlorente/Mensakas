<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Business;
use App\Order;
class SimulatorBusinessController extends Controller
{
	public function index(Request $request)
    {
    	$business = Business::orderBy('business_id','ASC')->get();
        return view('simuladorbusiness.index',compact('business'));
    }

    public function showOrders(Request $request)
    {
    	$businessID = $request->input('business');
    
        $business = Business::where('business_id','=',$businessID)->get();
        error_log($business);
    	$orders0 = Order::where('fk_business_id','=',$businessID)->where('status','=',0)->get();
        $orders1 = Order::where('fk_business_id','=',$businessID)->where('status','=',1)->get();
        return view('simuladorbusiness.showorder',compact('orders0','orders1','business'));
    }
    public function edit(Request $request){
        $orderID = $request->input('order_id');
        $order=Order::find($orderID);
        return view('simuladorbusiness.editorderbusiness',compact('order'));
    }

    public function update(Request $request)
    {
        $this->validate($request,[ 'description'=>'required' , 'status'=>'required']);
        $orderID = $request->input('id');
        Order::find($orderID)->update($request->all());
        $order = DB::table('orders')->where('order_id', $orderID)->first();

        $businessID = $request->input('business_id');
        $business = Business::where('business_id','=',$businessID)->get();
        $orders0 = Order::where('fk_business_id','=',$businessID)->where('status','=',0)->get();
        $orders1 = Order::where('fk_business_id','=',$businessID)->where('status','=',1)->get();
        
        return view('simuladorbusiness.showorder',compact('orders0','orders1','business'))->with('notice', 'The order '. $order->order_id .' has been updated successfully.');
    }
}
