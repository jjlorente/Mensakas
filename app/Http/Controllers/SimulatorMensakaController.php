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
        $mensaka = Mensaka::get();
        return view( 'simulatorMensaka.index', compact('orders','consumers','business','mensaka') );
    }

    public function pedido(Request $request){
        $id_mensaka = $request->get('mensakaID');

        $orders = Order::orderBy('fk_consumers_id','ASC')->get();
        $consumers = Consumer::get();
        $business = Business::get();
        $mensakas = Mensaka::where('mensaka_id', $id_mensaka)->get();
        return view( 'simulatorMensaka.pedidoMensaka', compact('orders','consumers','business','mensakas') );

    }

    public function accept(Request $request){
        $id = $request->get('order_id');

        $order = DB::table('orders')->where('order_id', $id)->update(["status" => 2]);
        $orders = Order::where('order_id', $id)->get();
        $consumers = Consumer::get();
        $business = Business::get();
        $mensaka = Mensaka::get();
        return view( 'simulatorMensaka.acceptOrder', compact('orders','consumers','business','mensaka') );

    }

    public function delivered(Request $request){
        $id = $request->get('order_id');

        $order = DB::table('orders')->where('order_id', $id)->update(["status" => 3]);
        $orders = Order::where('order_id', $id)->get();
        $consumers = Consumer::get();
        $business = Business::get();
        $mensaka = Mensaka::get();
        return view( 'simulatorMensaka.delivered', compact('orders','consumers','business','mensaka') );

    }







}
