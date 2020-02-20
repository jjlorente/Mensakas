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
				<h3>Edit pack</h3>
			</div>


			<form method="POST" action="{{ route('pack.update',$pack->pack_id) }}"  role="form" style="width: 50%;align-content: center;margin: 0 auto;">
				{{ csrf_field() }}
				<input name="_method" type="hidden" value="PATCH">


					<div class="form-group" style="display: flex; flex-direction: row; justify-content: space-between;">
						<h6 style="width: 10%; margin-top: 10px;">Name: </h6>
						<input type="text" name="name" id="name" class="form-control input-sm" value="{{$pack->name}}" >
					</div>

					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Price: </h6>
						<input type="text" name="price" id="price" class="form-control input-sm" value="{{$pack->price}}">
					</div>

					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Description: </h6>
						<input type="text" name="description" id="description" class="form-control input-sm" value="{{$pack->description}}">
					</div>

					<div class="form-group" style="display: flex; flex-direction: row;">
						<h6 style="width: 10%;margin-top: 10px;">Status: </h6>
						<input type="hidden" value="0" name="status">
         				<input type="checkbox" value="1" name="status" style="position: relative; margin-left: 0;" @if($pack->status) checked @endif>
					</div>

				<div class="row">

					<div class="col-xs-12 col-sm-12 col-md-12">
						<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
						<a href="{{ route('pack.index') }}" class="btn btn-info btn-block" >Atrás</a>
					</div>

				</div>
			</form>
	</section>
	@endsection
