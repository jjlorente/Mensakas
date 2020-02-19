<?php

namespace App\Http\Controllers;
use DB;
use App\Consumer;
use App\Business;
use App\Product;
use App\Order_has_product;
use App\Order;
use App\Mensaka;
use App\Order_message;
use Illuminate\Http\Request;

class SimulatorMensakaController extends Controller {
    //
    public function index(Request $request) {
        $orders = Order::orderBy('fk_consumers_id','ASC');
        $consumers = Consumer::get();
        $bussines = Business::get();
        $mensaka = Mensaka::get();
        return view( 'simulatorMensaka.index', compact('orders','consumers','business','mensaka') );
    }

    public function edit(Request $request){
        $id = $request->get('order_id');

        $order = DB::table('orders')->where('order_id', $id)->update(["status" => 1]);
        $orders = Order::orderBy('fk_consumers_id','ASC')->get();
        $consumers = Consumer::get();
        $bussines = Business::get();
        $mensaka = Mensaka::get();
        return view( 'simulatorMensaka.index', compact('orders','consumers','business','mensaka') );

    }







}
