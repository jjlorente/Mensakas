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
				<h3>Edit Order</h3>
			</div>


			<form method="POST" action="{{ route('order.update',$order->order_id) }}"  role="form" style="width: 50%;align-content: center;margin: 0 auto;">
				{{ csrf_field() }}
				<input name="_method" type="hidden" value="PATCH">


					<div class="form-group" style="display: flex; flex-direction: row;">
						<h6 style="width: 10%; margin-top: 10px;">Status: </h6>
						<div class="from-group">
							@if($order->status==1)
							  <input type="radio" name="status" value="0"> undelivered <br>
							  <input type="radio" name="status" value="1" checked> delivered <br>
							@else
								<input type="radio" name="status" value="0" checked> undelivered <br>
								<input type="radio" name="status" value="1" > delivered <br>
							@endif
						</div>

					</div>

					<div class="form-group" style="display: flex; flex-direction: row; justify-content: space-between;">
						<h6 style="width: 10%; margin-top: 10px;">Notice:</h6>
						<input type="text" name="description" id="description" class="form-control input-sm" value="{{$order->description}}" >
					</div>


				<div class="row">

					<div class="col-xs-12 col-sm-12 col-md-12">
						<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
						<a href="{{ route('order.index') }}" class="btn btn-info btn-block" >Atrás</a>
					</div>

				</div>
			</form>
	</section>
	@endsection
