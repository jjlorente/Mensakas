<?php

namespace App\Http\Controllers;
use DB;
use App\Product_category;
use App\Product;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
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
            $productCategories = Product_category::buscarpor($tipo, $buscar)->orderBy('name','ASC')->get();
        }else{
            $productCategories = Product_category::orderBy('name','ASC')->paginate(5);
        }
        $product = Product::get();
        return view('productCategory.index',compact('productCategories','product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $productCategory = Product_category::all();
        return view('productCategory.create',compact('productCategory'));
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

        Product_category::create($request->all());
        return redirect()->route('productCategory.index')->with('notice','Record created successfully');
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
        $productCategories=Product_category::find($id);
        return  view('productCategory.show',compact('productCategories'));
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
        $productCategory=Product_category::find($id);
        return view('productCategory.edit',compact('productCategory'));
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

        Product_category::find($id)->update($request->all());
        $productCategory = DB::table('product_categories')->where('product_category_id', $id)->first();
        return redirect()->route('productCategory.index')->with('notice', 'The Product Category '.  $productCategory->name.' has been updated successfully.');
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
        $productCategory = DB::table('product_categories')->where('product_category_id', $id)->first();
        Product_category::find($id)->delete();
        return redirect()->route('productCategory.index')->with('notice', 'The Product Category'.  $productCategory->name.' has been successfully deleted.');
    }

    public function confirm($id)
    {
        $productCategory = Product_category::findOrFail($id);
        return view('productCategory.confirm', compact('productCategory'));
    }
}
