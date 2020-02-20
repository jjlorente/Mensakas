<?php

namespace App\Http\Controllers;
use DB;
use App\Pack;
use App\Business;
use Illuminate\Http\Request;

class PackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      $buscar = $request->get('buscarpor');
      $tipo = $request->get('tipo');

      if ($tipo && $buscar) {
          $packs = Pack::buscarpor($tipo, $buscar)->orderBy('fk_business_id','ASC')->get();
      }else{
          $packs = Pack::orderBy('fk_business_id','ASC')->paginate(5);
      }
      return view('pack.index',compact('packs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $business = Business::all();
        return view('pack.create',compact('business'));
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
            'price' => 'numeric',
            'status' => 'boolean',
        ];

        $this->validate($request, $rules);
        $this->validate($request,[ 'name'=>'required', 'description'=>'required', 'status'=>'required', 'price'=>'required','fk_business_id'=>'required']);
        //'first_name','last_name','phone','mail', 'address','target','city'
        Pack::create($request->all());
        return redirect()->route('pack.index')->with('success','Record created successfully');
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
        $pack=Pack::find($id);
        return  view('pack.show',compact('pack'));
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
        $pack=Pack::find($id);
        return view('pack.edit',compact('pack'));
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
            'price' => 'numeric',
            'status' => 'boolean',
        ];
        $this->validate($request,$rules);
        $this->validate($request,[ 'name'=>'required','price'=>'required','description'=>'required' , 'status'=>'required']);

        Pack::find($id)->update($request->all());
        $pack = DB::table('packs')->where('pack_id', $id)->first();
        return redirect()->route('pack.index')->with('notice', 'The pack '. $pack->pack_id .' has been updated successfully.');
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
        $pack = DB::table('packs')->where('pack_id', $id)->first();
        Pack::find($id)->delete();
        return redirect()->route('pack.index')->with('notice', 'El pack '.  $pack->pack_id.' ha sido eliminado correctamente.');
    }

    public function confirm($id)
    {
        $pack = Pack::findOrFail($id);
        return view('pack.confirm', compact('pack'));
    }
}
