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
				<h3>Añadir pack</h3>
			</div>


			<form method="POST" action="{{ route('pack.store') }}"  role="form" style="width: 50%;align-content: center;margin: 0 auto;">
				{{ csrf_field() }}

					<div class="form-group" style="display: flex; flex-direction: row; justify-content: space-between;">
						<h6 style="width: 10%; margin-top: 10px;">Name: </h6>
						<input type="text" name="name" id="name" class="form-control input-sm" placeholder="Name">
					</div>

					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Status: </h6>
						<input type="text" name="status" id="status" class="form-control input-sm" placeholder="Status">
					</div>

					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Price: </h6>
						<input type="text" name="price" id="price" class="form-control input-sm" placeholder="Price">
					</div>

					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Description: </h6>
						<input type="text" name="description" id="description" class="form-control input-sm" placeholder="Description">
					</div>
					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Business: </h6>
						<select name="fk_business_id" class="form-control"  style="margin-right: 5px;">
							@foreach($business as $busines)
				         	<option value="{{$busines->business_id}}">{{$busines->name}}</option>
			        @endforeach
			      </select>
		      </div>
				<div class="row">

					<div class="col-xs-12 col-sm-12 col-md-12">
						<input type="submit"  value="Añadir" class="btn btn-success btn-block">
						<a href="{{ route('pack.index') }}" class="btn btn-info btn-block" >Atrás</a>
					</div>

				</div>
			</form>
	</section>
	@endsection
