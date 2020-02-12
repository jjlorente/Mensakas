<?php

namespace App\Http\Controllers;
use DB;
use App\Mensaka;
use Illuminate\Http\Request;

class MensakaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mensakas=Mensaka::orderBy('first_name','ASC')->paginate(5);
        return view('mensaka.index',compact('mensakas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('mensaka.create');
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
            'status' => 'boolean',
        ];
 
        $this->validate($request, $rules);
        $this->validate($request,[ 'first_name'=>'required', 'last_name'=>'required', 'phone'=>'required', 'status'=>'required']);
        //'first_name','last_name','phone','mail', 'address','target','city'
        Mensaka::create($request->all());
        return redirect()->route('mensaka.index')->with('notice','Record created successfully');
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
        $mensakas=Mensaka::find($id);
        return  view('mensaka.show',compact('mensakas'));
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
        $mensaka=Mensaka::find($id);
        return view('mensaka.edit',compact('mensaka'));
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
            'first_name' => 'alpha',
            'last_name' => 'alpha',
            'phone' => 'numeric|digits_between:1,9',
            'status' => 'boolean',
        ];
 
        $this->validate($request, $rules);
        $this->validate($request,[ 'first_name'=>'required', 'last_name'=>'required', 'phone'=>'required', 'status'=>'required']);
        
        Mensaka::find($id)->update($request->all());
        $mensaka = DB::table('mensakas')->where('mensaka_id', $id)->first();
        return redirect()->route('mensaka.index')->with('notice', 'The mensaka '.  $mensaka->first_name." ". $mensaka->last_name.' has been updated successfully.');
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
        $mensaka = DB::table('mensakas')->where('mensaka_id', $id)->first();
        Mensaka::find($id)->delete();
        return redirect()->route('mensaka.index')->with('notice', 'The mensaka '.  $mensaka->first_name." ". $mensaka->last_name.' has been successfully deleted.');
    }
    public function confirm($id)
    {
        $mensaka = Mensaka::findOrFail($id);
        return view('mensaka.confirm', compact('mensaka'));
    }
}
