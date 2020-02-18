<?php

namespace App\Http\Controllers;
use DB;
use App\Business_category;
use Illuminate\Http\Request;

class BusinessCategoryController extends Controller
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
            $businessCategory = Business_category::buscarpor($tipo, $buscar)->orderBy('name','ASC')->get();
        }else{
            $businessCategory = Business_category::orderBy('name','ASC')->paginate(5);
        }

        return view('businessCategory.index',compact('businessCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $businessCategory = Business_category::all();
        return view('businessCategory.create',compact('businessCategory'));
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
        /*
            $rules = [
                'name' => 'alpha',
            ];
        $this->validate($request, $rules);
        */
        $this->validate($request,[ 'name'=>'required']);

        Business_category::create($request->all());
        return redirect()->route('businessCategory.index')->with('notice','Record created successfully');
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
        $businessCategory=Business_category::find($id);
        return  view('businessCategory.show',compact('businessCategory'));
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
        $businessCategory=Business_category::find($id);
        return view('businessCategory.edit',compact('businessCategory'));
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
        /*
            $rules = [
                'name' => 'alpha',
            ];
        $this->validate($request, $rules);
        */
        $this->validate($request,['name'=>'required']);

        Business_category::find($id)->update($request->all());
        $businessCategory = DB::table('business_categories')->where('business_category_id', $id)->first();
        return redirect()->route('businessCategory.index')->with('notice', 'The business Category '.  $businessCategory->name.' has been updated successfully.');
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
        $businessCategory = DB::table('business_categories')->where('business_category_id', $id)->first();
        Business_category::find($id)->delete();
        return redirect()->route('businessCategory.index')->with('notice', 'The business Category'.  $businessCategory->name.' has been successfully deleted.');
    }

    public function confirm($id)
    {
        $businessCategory = Business_category::findOrFail($id);
        return view('businessCategory.confirm', compact('businessCategory'));
    }
}
