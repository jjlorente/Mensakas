@extends('layouts.app')
@section('content')

<div style="display: flex;flex-direction: column; ">
  <div  style="width: 80%; text-align: center; margin-left: auto; margin-right: auto; font-family: Vegur, 'PT Sans', Verdana; ">
    @if(Session::has('notice'))
      <p class="alert alert-success"> <strong> {{ Session::get('notice') }} </strong> </p>
    @endif
    </div>
      <div class="table-title" style="display: flex; flex-direction: row; justify-content: space-between;">
        <h1 style="margin-left: 30px;"><b>Manage Order</b></h1>
        <div style="display: flex; flex-direction: row;">
          <div style="margin-right: 50px;">
            <form class="form-inline">
              <select name="tipo" class="form-control"  style="margin-right: 5px;">
                <option value="order_id">OrderID</option>
                <option value="fk_consumers_id">ConsumerID</option>
                <option value="fk_business_id">BusinessID</option>
                <option value="status">Status</option>
              </select>
              <input name="buscarpor" type="search" class="form-control"  style="margin-right: 5px;">
              <button class=" btn btn-primary" type="submit">Search</button>
            </form>
          </div>
          <div>
            <a href="{{route('home')}}" type="button" class="btn btn-primary" style="margin-right: 10px;"> Return Admin Panel</a>
          </div>
        </div>
      </div>
    <table class="table table-bordered table-hover" style="width: 100%; text-align: center;">

     <thead style="background-color:#5c2583; color: white; align-items: center; ">
       <th style="border-radius: 10px;">Consumer</th>
       <th style="border-radius: 10px;">OrderID</th>
       <th style="border-radius: 10px;">BusinessID</th>
       <th style="border-radius: 10px;">Status</th>
       <th style="border-radius: 10px;">Products</th>
       <th style="border-radius: 10px;">Notice</th>
       <th style="border-radius: 10px;">Created</th>
       <th style="border-radius: 10px;">Updated</th>
       <th style="border-radius: 10px;">Edit</th>
     </thead>
     <tbody>
          @if($orders->count())
          @foreach($orders as $order)
          @php $price = 0 @endphp
          <tr>
            <td>{{ $order->fk_consumers_id }}</td>
            <td>{{ $order->order_id }}</td>
            <td>{{ $order->fk_business_id }}</td>
            @if($order->status==2)
              <td style="background-color: #ACECC3; ">Delivered</td>
            @elseif($order->status==1)
              <td style="background-color: #ACECC3; ">On way</td>
            @else
              <td style="background-color: #ECACB2; ">Undelivered</td>
            @endif
            <td>
              @foreach ( $order->order_has_product as $tabla_producto )
                  {{ $tabla_producto->product->name }}<br>
              @endforeach
            </td>
            <td>{{ $order->description }}</td>
            <td>{{ $order->created_at }}</td>
            <td>{{ $order->updated_at }}</td>
            <td ><a href="{{action('OrderController@edit', $order->order_id)}}" class="btn btn-primary">Edit</a></td>
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
      @if($orders instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{ $orders->links() }}
      @endif
   </div>

  </div>
</div>
@endsection
