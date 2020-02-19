@extends('layouts.app')
@section('content')


			@if (count($errors) > 0)
			<div class="alert alert-danger" style="text-align: center; justify-content: center;">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<p>{{ $error }}</p>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif

			<div style="width: 50%;align-content: center;margin: 0 auto;">
				<h3 style="text-align: center;">Mesnaka</h3>
			</div>

      <table class="table table-bordered table-hover" style="width: 100%; text-align: center;">

       <thead style="background-color:#5c2583; color: white; align-items: center; ">
         <th style="border-radius: 10px;">OrderID</th>
         <th style="border-radius: 10px;">Status</th>
         <th style="border-radius: 10px;">Products</th>
         <th style="border-radius: 10px;">Business Name</th>
         <th style="border-radius: 10px;">Business Address</th>
         <th style="border-radius: 10px;">Consumer</th>
         <th style="border-radius: 10px;">Notice</th>
         <th style="border-radius: 10px;">Accept</th>
       </thead>
       <tbody>

         @if($orders->count())
            @foreach($orders as $order)
              @if( $order->status==0 )
                @php $price = 0 @endphp
                <tr>
                    <td>{{ $order->order_id }}</td>
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

                    <td>
                      @foreach ($business as $bussine)
                        @if ($bussine->business_id == $order->fk_business_id)
                          {{ $bussine->name }}
                        @endif
                      @endforeach
                    </td>

                    <td>
                      @foreach ($business as $bussine)
                        @if ($bussine->business_id == $order->fk_business_id)
                          {{ $bussine->address }}
                        @endif
                      @endforeach
                    </td>

                    <td>
                      @foreach ($consumers as $consumer)
                          @if ($consumer->consumer_id == $order->fk_consumers_id)
                              {{ $consumer->first_name }} {{ $consumer->last_name }}
                          @endif
                      @endforeach
                    </td>
                    <td>{{ $order->description }}</td>
                    <td>
                      <form class="" action="{{ route('simulatorMensakaAccept') }}" method="get">
                        <input type="hidden" name="order_id" value="{{$order->order_id}}">
                        <button class="btn btn-success btn-block" type="submit">ACCEPT</button>
                      </form>
                    </td>
                </tr>

            @endif
          @endforeach
        </tbody>



        @else
          <tr>
            <td colspan="8">No hay registros!!!</td>
          </tr>
        @endif
      </tbody>
     </table>





	</section>
	@endsection
