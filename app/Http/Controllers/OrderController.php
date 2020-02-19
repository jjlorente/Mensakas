<?php

namespace App\Http\Controllers;
use DB;
use App\Order;
use Illuminate\Http\Request;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $buscar = $request->get('buscarpor');
        $tipo = $request->get('tipo');
        if ($tipo && $buscar) {
            $orders = Order::buscarpor($tipo, $buscar)->orderBy('fk_consumers_id','ASC')->get();
        }else{
            $orders = Order::orderBy('fk_consumers_id','ASC')->paginate(5);
        } 
        return view('order.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $rules = [
            'first_name' => 'alpha',
            'last_name' => 'alpha',
            'phone' => 'numeric',
            'city' => 'alpha',
            'mail' => 'regex:/^.+@.+$/i',
        ];

        $this->validate($request, $rules);
        $this->validate($request,[ 'first_name'=>'required', 'last_name'=>'required', 'phone'=>'required', 'mail'=>'required', 'address'=>'required', 'target'=>'required', 'city'=>'required']);
        //'first_name','last_name','phone','mail', 'address','target','city'
        Order::create($request->all());
        return redirect()->route('order.index')->with('success','Record created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $order=Order::find($id);
        return  view('order.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $order=Order::find($id);
        return view('order.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[ 'description'=>'required' , 'status'=>'required']);

        Order::find($id)->update($request->all());
        $order = DB::table('orders')->where('order_id', $id)->first();
        return redirect()->route('order.index')->with('notice', 'The order '. $order->order_id .' has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $order = DB::table('orders')->where('order_id', $id)->first();
        Order::find($id)->delete();
        return redirect()->route('order.index')->with('notice', 'El order '.  $order->order_id.' ha sido eliminado correctamente.');
    }

    public function confirm($id)
    {
        $order = Order::findOrFail($id);
        return view('order.confirm', compact('order'));
    }
}
