<?php

namespace App\Http\Controllers;
use DB;
use App\Product;
use App\Business;
use Illuminate\Http\Request;

class ProductController extends Controller
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
            $products = Product::buscarpor($tipo, $buscar)->orderBy('fk_business_id','ASC')->get();
        }else{
            $products = Product::orderBy('fk_business_id','ASC')->paginate(5);
        } 
        return view('product.index',compact('products')); 
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
        return view('product.create',compact('business'));
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
            'name' => 'alpha',
            'price' => 'numeric',
            'status' => 'boolean',
        ];

        $this->validate($request, $rules);
        $this->validate($request,[ 'name'=>'required', 'description'=>'required', 'status'=>'required', 'price'=>'required','fk_business_id'=>'required']);
        //'first_name','last_name','phone','mail', 'address','target','city'
        Product::create($request->all());
        return redirect()->route('product.index')->with('success','Record created successfully');
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
        $product=Product::find($id);
        return  view('product.show',compact('product'));
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
        $product=Product::find($id);
        return view('product.edit',compact('product'));
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

        Product::find($id)->update($request->all());
        $product = DB::table('products')->where('product_id', $id)->first();
        return redirect()->route('product.index')->with('notice', 'The product '. $product->product_id .' has been updated successfully.');
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
        $product = DB::table('products')->where('product_id', $id)->first();
        Product::find($id)->delete();
        return redirect()->route('product.index')->with('notice', 'El product '.  $product->product_id.' ha sido eliminado correctamente.');
    }

    public function confirm($id)
    {
        $product = Product::findOrFail($id);
        return view('product.confirm', compact('product'));
    }
}
