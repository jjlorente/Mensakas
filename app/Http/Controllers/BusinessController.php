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
        $business=Business::orderBy('name','ASC')->paginate(5);
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
        
            $rules = [
                'phone' => 'numeric',
                'zip_code'=> 'numeric',
                'status' => 'boolean',
                'mail' => 'regex:/^.+@.+$/i',
                'lat' => 'numeric',
                'lon' => 'numeric',
            ];
 
        $this->validate($request, $rules);
        $this->validate($request,[ 'name'=>'required', 'phone'=>'required', 'mail'=>'required', 'adress'=>'required', 'zip_code'=>'required', 'status'=>'required', 'lat'=>'required','lon'=>'required']);
        
        Business::create($request->all());
        return redirect()->route('business.index')->with('notice','Record created successfully');
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
         $rules = [
                'phone' => 'numeric|digits_between:1,9',
                'zip_code'=> 'numeric|digits_between:1,5',
                'status' => 'boolean',
                'mail' => 'regex:/^.+@.+$/i',
                'lat' => 'numeric',
                'lon' => 'numeric',
            ];
 
        $this->validate($request, $rules);
        $this->validate($request,['name'=>'required', 'phone'=>'required', 'mail'=>'required', 'adress'=>'required', 'zip_code'=>'required', 'status'=>'required', 'lat'=>'required','lon'=>'required']);
        
        Business::find($id)->update($request->all());
        $business = DB::table('business')->where('business_id', $id)->first();
        return redirect()->route('business.index')->with('notice', 'The business '.  $business->name.' has been updated successfully.');
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
        return redirect()->route('business.index')->with('notice', 'The business '.  $business->name.' has been successfully deleted.');
    }

    public function confirm($id)
    {
        $business = Business::findOrFail($id);
        return view('business.confirm', compact('business'));
    }
}
