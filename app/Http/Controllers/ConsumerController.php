<?php

namespace App\Http\Controllers;
use DB;
use App\Consumer;
use Illuminate\Http\Request;
class ConsumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $consumers=Consumer::orderBy('first_name','ASC')->paginate(10);
        return view('consumer.index',compact('consumers')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('consumer.create');
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
        $this->validate($request,[ 'first_name'=>'required', 'last_name'=>'required', 'phone'=>'required', 'mail'=>'required', 'address'=>'required', 'target'=>'required', 'city'=>'required']);
        //'first_name','last_name','phone','mail', 'address','target','city'
        Consumer::create($request->all());
        return redirect()->route('consumer.index')->with('success','Registro creado satisfactoriamente');
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
        $consumers=Consumer::find($id);
        return  view('consumer.show',compact('consumers'));
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
        $consumer=Consumer::find($id);
        return view('consumer.edit',compact('consumer'));
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
        $this->validate($request,[ 'first_name'=>'required', 'last_name'=>'required', 'phone'=>'required', 'mail'=>'required', 'address'=>'required', 'target'=>'required', 'city'=>'required']);
        
        Consumer::find($id)->update($request->all());
        $consumer = DB::table('consumers')->where('consumer_id', $id)->first();
        return redirect()->route('consumer.index')->with('notice', 'El consumer '.  $consumer->first_name." ". $consumer->last_name.' ha sido actualizado correctamente.');
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
        
        $consumer = DB::table('consumers')->where('consumer_id', $id)->first();
        Consumer::find($id)->delete();
        return redirect()->route('consumer.index')->with('notice', 'El consumer '.  $consumer->first_name." ". $consumer->last_name.' ha sido eliminado correctamente.');
    }

    public function confirm($id)
    {
        $consumer = Consumer::findOrFail($id);
        return view('consumer.confirm', compact('consumer'));
    }
}
