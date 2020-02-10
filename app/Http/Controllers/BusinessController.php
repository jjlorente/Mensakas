<?php

namespace App\Http\Controllers;
use DB;
use App\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $business=Business::orderBy('name','ASC')->paginate(10);
        return view('business.index',compact('business')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('business.create');
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
        $this->validate($request,[ 'name'=>'required', 'phone'=>'required', 'mail'=>'required', 'adress'=>'required', 'zip_code'=>'required', 'status'=>'required', 'lat'=>'required','lon'=>'required']);
        Business::create($request->all());
        return redirect()->route('business.index')->with('success','Registro creado satisfactoriamente');
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
        $business=Business::find($id);
        return  view('business.show',compact('business'));
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
        $business=Business::find($id);
        return view('business.edit',compact('business'));
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
        $this->validate($request,['name'=>'required', 'phone'=>'required', 'mail'=>'required', 'adress'=>'required', 'zip_code'=>'required', 'status'=>'required', 'lat'=>'required','lon'=>'required']);
        
        Business::find($id)->update($request->all());
        $business = DB::table('business')->where('business_id', $id)->first();
        return redirect()->route('business.index')->with('notice', 'El business '.  $business->name.' ha sido actualizado correctamente.');
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
        $business = DB::table('business')->where('business_id', $id)->first();
        Business::find($id)->delete();
        return redirect()->route('business.index')->with('notice', 'El business '.  $business->name.' ha sido eliminado correctamente.');
    }

    public function confirm($id)
    {
        $business = Business::findOrFail($id);
        return view('business.confirm', compact('business'));
    }
}
