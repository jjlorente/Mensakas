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
				<h3>Edit mensaka</h3>
			</div>
									
					
			<form method="POST" action="{{ route('mensaka.update',$mensaka->mensaka_id) }}"  role="form" style="width: 50%;align-content: center;margin: 0 auto;">
				{{ csrf_field() }}
				<input name="_method" type="hidden" value="PATCH">
				
				
					<div class="form-group" style="display: flex; flex-direction: row; justify-content: space-between;">
						<h6 style="width: 10%; margin-top: 10px;">First Name: </h6>
						<input type="text" name="first_name" id="first_name" class="form-control input-sm" value="{{$mensaka->first_name}}" >
					</div>
				
					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Last Name: </h6>
						<input type="text" name="last_name" id="last_name" class="form-control input-sm" value="{{$mensaka->last_name}}">
					</div>
			
					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Phone: </h6>
						<input type="text" name="phone" id="phone" class="form-control input-sm" value="{{$mensaka->phone}}">
					</div>
				
					<div class="form-group" style="display: flex; flex-direction: row;">
						<h6 style="width: 10%;margin-top: 10px;">Active: </h6>
						<input type="hidden" value="0" name="status">
         				<input type="checkbox" value="1" name="status" style="position: relative; margin-left: 0;" @if($mensaka->status) checked @endif>
					</div>					
				
				<div class="row">

					<div class="col-xs-12 col-sm-12 col-md-12">
						<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
						<a href="{{ route('mensaka.index') }}" class="btn btn-info btn-block" >Atrás</a>
					</div>	

				</div>
			</form>
	</section>
	@endsection