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
				<h3 style="text-align: center;">Consumer</h3>
			</div>
									
					
			<form method="POST" action="simulatorlocation" role="form" style="width: 50%;align-content: center;margin: 0 auto;">
				{{ csrf_field() }}

					<div class="form-group" style="display: flex; flex-direction: row; justify-content: space-between;">
						<h6 style="width: 15%; margin-top: 10px; ">First Name: </h6>
						<input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First name">
					</div>

					<div class="form-group" style="display: flex; flex-direction: row; justify-content: space-between;">
						<h6 style="width: 15%; margin-top: 10px;">Last Name: </h6>
						<input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last name">
					</div>

					<div class="form-group" style="display: flex; flex-direction: row; justify-content: space-between;">
						<h6 style="width: 15%; margin-top: 10px;">Email: </h6>
						<input type="text" name="email" id="email" class="form-control input-sm" placeholder="Email">
					</div>

					<div class="form-group" style="display: flex; flex-direction: row; justify-content: space-between;">
						<h6 style="width: 15%; margin-top: 10px;">Phone: </h6>
						<input type="text" name="phone" id="phone" class="form-control input-sm" placeholder="Phone">
					</div>

					<div class="form-group" style="display: flex; flex-direction: row; justify-content: space-between;">
						<h6 style="width: 15%; margin-top: 10px;">Address: </h6>
						<input type="text" name="address" id="address" class="form-control input-sm" placeholder="Address">
					</div>

					<div class="form-group" style="display: flex; flex-direction: row; justify-content: space-between;">
						<h6 style="width: 15%; margin-top: 10px;">Location: </h6>
						<input type="text" name="location" id="location" class="form-control input-sm" placeholder="Location">
					</div>

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<input type="submit"  value="Siguiente" class="btn btn-success btn-block">
						<a href="{{ url('/') }}" class="btn btn-info btn-block" >Atrás</a>
					</div>	

				</div>
			</form>
	</section>
	@endsection