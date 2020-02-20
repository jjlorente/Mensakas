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


			<form method="post" action="{{ route('updateorder') }}"  role="form" style="width: 50%;align-content: center;margin: 0 auto;">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{$order->order_id}}">
				<input type="hidden" name="business_id" value="{{$order->fk_business_id}}">
					<div class="form-group" style="display: flex; flex-direction: row;">
						<h6 style="width: 10%; margin-top: 10px;">Status: </h6>
						<div class="from-group">
							@if($order->status==2)
							  <input type="radio" name="status" value="0"> Pending petition <br>
							  <input type="radio" name="status" value="1" >Preparing order<br>
							  <input type="radio" name="status" value="2" checked>  On way <br>
							@elseif($order->status==1)
							  <input type="radio" name="status" value="0"> Pending petition <br>
							  <input type="radio" name="status" value="1" checked>Preparing order<br>
							  <input type="radio" name="status" value="2">  On way <br>
							@else
								<input type="radio" name="status" value="0" checked> Pending petition <br>
								<input type="radio" name="status" value="1">Preparing order<br>
								<input type="radio" name="status" value="2" > On way <br>
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
						<a href="{{ route('showorderbusiness') }}" class="btn btn-info btn-block" >Atrás</a>
					</div>

				</div>
			</form>
	</section>
	@endsection