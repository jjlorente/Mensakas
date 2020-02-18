<?php

namespace App\Http\Controllers;
use DB;
use App\Consumer;
use App\Business;
use App\Product;
use App\Order;
use Illuminate\Http\Request;

class SimulatorController extends Controller
{
    //
     public function index(Request $request)
    {
        return view('simulador.index');
    }

    public function orderIndex()
    {
        error_log('ENtro en orderindex');
        return view('simulador.orderIndex');
    }

     public function storeProduct(Request $request)
    {
        $products = $request->get('products');
        $quantities = $request->get('quantities', []);
        $this->validate($request,[ 'status'=>'required', 'fk_consumers_id'=>'required']);
        $order = Order::create($request->all());
        
        
        for ($product=0; $product < count($products); $product++) {
            if ($products[$product] != '') {
                error_log($products[$product]);
                error_log($quantities[$product]);
                
            }
        }

        return redirect()->route('simulatororder');
    }

    public function product(Request $request){
        $businessID = $request->get('business');
        $consumerID = $request->get('consumer');
        $business = Business::where('business_id', $businessID)->get();
        $products = Product::where('fk_business_id', $businessID)->get();
        $consumer = Consumer::where('consumer_id', $consumerID)->get();
        return view('simulador.businessProduct',compact('products','consumer','business'));
    }

    public function businessLocation(){
        $consumer = session('consumer');
        $business = session('business');
        $location = session('location');
        return view('simulador.businessLocation',compact('consumer','business','location'));
    }
     public function store(Request $request)
    {
        $this->validate($request,[ 'first_name'=>'required', 'phone'=>'required', 'mail'=>'required', 'address'=>'required', 'city'=>'required','target' => 'required']);

        $location = $request->get('city');
        $business = Business::where('location', $location)->get();
        $consumer = Consumer::create($request->all());

        return redirect()->route('simulator2')->with('consumer', $consumer)->with('business', $business)->with('location' ,$location );
    }

}
