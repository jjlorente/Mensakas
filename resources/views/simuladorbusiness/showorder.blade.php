@extends('layouts.app')
@section('content')
<h1 style="align-items: center;text-align: center;"><b>Business {{$business[0]->name}}</b></h1>
<div style="display: flex;">
	<div style="width: 50%; height: 100%; text-align: center; margin-right: 10px;">

		<h2><b>Pending petition</b></h2>
	  <table class="table  table-hover" style="width: 100%; text-align: center;">

      <thead style="background-color:#5c2583; color: white; align-items: center; ">
        <th style="border-radius: 10px;">OrderID</th>
        <th style="border-radius: 10px;">Status</th>
        <th style="border-radius: 10px;">Products</th>
        <th style="border-radius: 10px;">Notice</th>
        <th style="border-radius: 10px;">Created</th>
        <th style="border-radius: 10px;">Edit</th>
      </thead>
      <tbody>
        @if($orders0->count())
        @foreach($orders0 as $order)
        @php $price = 0 @endphp
        <tr>
          <td>{{ $order->order_id }}</td>
            @if($order->status==3)
          <td style="background-color: #ACECC3; ">Delivered</td>
            @elseif($order->status==2)
          <td style="background-color: #ACECC3; ">On way</td>
            @elseif($order->status==1)
          <td style="background-color: #ACECC3; ">Preparing order</td>
            @else
          <td style="background-color: #ECACB2; ">Pending petition</td>
            @endif
          <td>
            @foreach ( $order->order_has_product as $tabla_producto )
                {{ $tabla_producto->product->name }}<br>
           @endforeach
          </td>
          <td>{{ $order->description }}</td>
          <td>{{ $order->created_at }}</td>
          <td >
            <form method="get" action="{{route('editorderbusiness')}}">
              <input type="hidden" name="order_id" value="{{$order->order_id}}">
              <button class="btn btn-info btn-block" type="submit">Preparing</button>
            </form>
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
		</div>
		<div style="width: 50%; height: 100%; text-align: center; align-items: center; margin-left: 10px;">
			<h2><b>Preparing order</b></h2>
	    <table class="table  table-hover" style="width: 100%; text-align: center; ">

     <thead style="background-color:#5c2583; color: white; align-items: center; ">
       <th style="border-radius: 10px;">OrderID</th>
       <th style="border-radius: 10px;">Status</th>
       <th style="border-radius: 10px;">Products</th>
       <th style="border-radius: 10px;">Notice</th>
       <th style="border-radius: 10px;">Created</th>
       <th style="border-radius: 10px;">Edit</th>
     </thead>
     <tbody>
          @if($orders1->count())
          @foreach($orders1 as $order)
          @php $price = 0 @endphp
          <tr>
            <td>{{ $order->order_id }}</td>
            @if($order->status==3)
              <td style="background-color: #ACECC3; ">Delivered</td>
            @elseif($order->status==2)
              <td style="background-color: #ACECC3; ">OnWay</td>
            @elseif($order->status==1)
              <td style="background-color: #ACECC3; ">Preparing order</td>
            @else
              <td style="background-color: #ECACB2; ">Pending petition</td>
            @endif
            <td>
              @foreach ( $order->order_has_product as $tabla_producto )
                  {{ $tabla_producto->product->name }}<br>
              @endforeach
            </td>
            <td>{{ $order->description }}</td>
            <td>{{ $order->created_at }}</td>
            <td >
            	<form method="get" action="{{route('editorderbusiness')}}">
            		<input type="hidden" name="order_id" value="{{$order->order_id}}">
            		<button class="btn btn-info btn-block" type="submit">OnWay</button>
            	</form>
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
		</div>
	</div>

@endsection
</body>
</html>