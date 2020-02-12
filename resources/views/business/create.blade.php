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
				<h3>Añadir business</h3>
			</div>
									
					
			<form method="POST" action="{{ route('business.store') }}"  role="form" style="width: 50%;align-content: center;margin: 0 auto;">
				{{ csrf_field() }}
					<div class="form-group" style="display: flex; flex-direction: row; justify-content: space-between;">
						<h6 style="width: 10%; margin-top: 10px;">Name: </h6>
						<input type="text" name="name" id="name" class="form-control input-sm" placeholder="Name">
					</div>
				
					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Phone: </h6>
						<input type="text" name="phone" id="phone" class="form-control input-sm" placeholder="Phone">
					</div>
			
					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Email: </h6>
						<input type="text" name="mail" id="mail" class="form-control input-sm" placeholder="Email">
					</div>
				
					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Zip Code: </h6>
						<input type="text" name="zip_code" id="zip_code" class="form-control input-sm" placeholder="Zip Code">
					</div>
				
					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Address: </h6>
						<input type="text" name="adress" id="adress" class="form-control input-sm" placeholder="Address">
					</div>

					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Status: </h6>
						<input type="text" name="status" id="status" class="form-control input-sm" placeholder="Status">
					</div>
				
				
					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Lat: </h6>
						<input type="text" name="lat" id="lat" class="form-control input-sm" placeholder="Lat">
					</div>
				
				
					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Lon: </h6>
						<input type="text" name="lon" id="lon" class="form-control input-sm" placeholder="Lon">
					</div>
					
				
				<div class="row">

					<div class="col-xs-12 col-sm-12 col-md-12">
						<input type="submit"  value="Añadir" class="btn btn-success btn-block">
						<a href="{{ route('business.index') }}" class="btn btn-info btn-block" >Atrás</a>
					</div>	

				</div>
			</form>
	</section>
	@endsection