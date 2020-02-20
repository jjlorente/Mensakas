@extends('layouts.app')
@section('content')

<div style="display: flex;flex-direction: column; ">
  <div  style="width: 80%; text-align: center; margin-left: auto; margin-right: auto; font-family: Vegur, 'PT Sans', Verdana; ">
    @if(Session::has('notice'))
      <p class="alert alert-success"> <strong> {{ Session::get('notice') }} </strong> </p>
    @endif 
    </div>
    <div class="table-title" style="display: flex; flex-direction: row; justify-content: space-between;">
      <h1 style="margin-left: 30px;"><b>Manage Product</b></h1>
      <div style="display: flex; flex-direction: row;">
        <div style="margin-right: 50px;">
          <form class="form-inline">
            <select name="tipo" class="form-control"  style="margin-right: 5px;">
              <option value="fk_business_id">Business ID</option>
              <option value="name">Name</option>
              <option value="description">Description</option>
              <option value="price">Price</option>
              <option value="status">Stock</option>
            </select>
            <input name="buscarpor" type="search" class="form-control"  style="margin-right: 5px;">
            <button class=" btn btn-primary" type="submit">Search</button>
          </form>
        </div>
        <div>
          <a href="{{route('home')}}" type="button" class="btn btn-primary"> Return Admin Panel</a>
          <a type="submit" href="{{ route('product.create') }}"  class="btn btn-success" style="margin-right: 27px; width: 300px;">Add New Product</a>
        </div>
      </div>
    </div>
    <table class="table table-bordered table-hover" style="width: 100%; text-align: center;">
     <thead style="background-color:#5c2583; color: white; align-items: center; ">
        <th style="border-radius: 10px; width: 150px;">Business ID</th>
        <th style="border-radius: 10px; width: 200px;">Business Name</th>
        <th style="border-radius: 10px; width: 200px;">Product Name</th>
        <th style="border-radius: 10px;">Description</th>
        <th style="border-radius: 10px; width: 100px;">Price</th>
        <th style="border-radius: 10px; width: 100px;">Stock</th>
        <th COLSPAN="2" style="border-radius: 10px; width: 200px;">Actions</th>
     </thead>
     <tbody>
          @if($products->count())  
          @foreach($products as $product)  
          <tr>
            <td>{{$product->business->business_id}}</td>
            <td>{{$product->business->name}}</td>
            <td >{{$product->name}}</td>
            <td >{{$product->description}}</td>
            <td >{{$product->price}}</td>
            
              @if($product->status==1)
                <td style="background-color: #ACECC3;"> Available</td>
              @else
                <td style="background-color: #ECACB2;">Not Available</td>
              @endif
              
            </td>
            <td ><a href="{{action('ProductController@edit', $product->product_id)}}" class="btn btn-primary">Edit</a></td>
            <td >
              <a href="{{ route('product.confirm', $product->product_id ) }}" class="btn btn-danger btncolorblanco">
                 Delete 
              </a>
             </td>
           </tr>
          @endforeach 
          @else
            <tr>
              <td colspan="8">No hay registros!!!</td>
            </tr>
          @endif
        </tbody>

   </table>
   <div>
      @if($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{ $products->links() }}
      @endif
   </div>
   
  </div>
</div>
@endsection