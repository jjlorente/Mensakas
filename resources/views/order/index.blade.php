@extends('layouts.app')
@section('content')

<div style="display: flex;flex-direction: column; ">
  <div  style="width: 80%; text-align: center; margin-left: auto; margin-right: auto; font-family: Vegur, 'PT Sans', Verdana; ">
    @if(Session::has('notice'))
      <p class="alert alert-success"> <strong> {{ Session::get('notice') }} </strong> </p>
    @endif
    </div>
    <table class="table  table-bordered table-hover" style="width: 100%; text-align: center;">
      <div class="table-title" style="display: flex; flex-direction: row; justify-content: space-between; ">
        <h1 style="margin-left: 30px;"><b>Manage Order</b></h1>
        <p>
          <a href="{{route('home')}}" type="button" class="btn btn-primary"> Return Admin Panel</a>

        </p>
      </div>
     <thead style="background-color:#5c2583; color: white; align-items: center; ">
       <th style="border-radius: 10px;">Consumer</th>
       <th style="border-radius: 10px;">Status</th>
       <th style="border-radius: 10px;">Notice</th>
       <th style="border-radius: 10px;">Created</th>
       <th style="border-radius: 10px;">Updated</th>
       <th style="border-radius: 10px;">Edit</th>
     </thead>
     <tbody>
          @if($orders->count())
          @foreach($orders as $order)
          <tr>
            <td>{{ $order->fk_consumers_id }}</td>
            @if($order->status==1)
              <td style="background-color: #ACECC3; ">delivered</td>
            @else
              <td style="background-color: #ECACB2; ">undelivered</td>
            @endif
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
      {{ $orders->links() }}
   </div>

  </div>
</div>
@endsection
