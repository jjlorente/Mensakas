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
				<h3>Edit consumer</h3>
			</div>
									
					
			<form method="POST" action="{{ route('consumer.update',$consumer->consumer_id) }}"  role="form" style="width: 50%;align-content: center;margin: 0 auto;">
				{{ csrf_field() }}
				<input name="_method" type="hidden" value="PATCH">
				
				
					<div class="form-group" style="display: flex; flex-direction: row; justify-content: space-between;">
						<h6 style="width: 10%; margin-top: 10px;">First Name: </h6>
						<input type="text" name="first_name" id="first_name" class="form-control input-sm" value="{{$consumer->first_name}}" >
					</div>
				
					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Last Name: </h6>
						<input type="text" name="last_name" id="last_name" class="form-control input-sm" value="{{$consumer->last_name}}">
					</div>
			
					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Phone: </h6>
						<input type="text" name="phone" id="phone" class="form-control input-sm" value="{{$consumer->phone}}">
					</div>
				
					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Email: </h6>
						<input type="text" name="mail" id="mail" class="form-control input-sm" value="{{$consumer->mail}}">
					</div>
				
				
					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Target: </h6>
						<input type="text" name="target" id="target" class="form-control input-sm" value="{{$consumer->target}}">
					</div>
				
				
					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">City: </h6>
						<input type="text" name="city" id="city" class="form-control input-sm" value="{{$consumer->city}}">
					</div>
				
				
					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Address: </h6>
						<input type="text" name="address" id="address" class="form-control input-sm" value="{{$consumer->address}}">
					</div>
					
				
				<div class="row">

					<div class="col-xs-12 col-sm-12 col-md-12">
						<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
						<a href="{{ route('consumer.index') }}" class="btn btn-info btn-block" >Atrás</a>
					</div>	

				</div>
			</form>
	</section>
	@endsection