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
				<h3>Edit business</h3>
			</div>


			<form method="POST" action="{{ route('business.update',$business->business_id) }}"  role="form" style="width: 50%;align-content: center;margin: 0 auto;">
				{{ csrf_field() }}
				<input name="_method" type="hidden" value="PATCH">


					<div class="form-group" style="display: flex; flex-direction: row; justify-content: space-between;">
						<h6 style="width: 10%; margin-top: 10px;">Name: </h6>
						<input type="text" name="name" id="name" class="form-control input-sm" value="{{$business->name}}" >
					</div>

					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Phone: </h6>
						<input type="text" name="phone" id="phone" class="form-control input-sm" value="{{$business->phone}}">
					</div>

					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Email: </h6>
						<input type="text" name="mail" id="mail" class="form-control input-sm" value="{{$business->mail}}">
					</div>

					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Location: </h6>
						<input type="text" name="location" id="location" class="form-control input-sm" value="{{$business->location}}">
					</div>

					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Zip Code: </h6>
						<input type="text" name="zip_code" id="zip_code" class="form-control input-sm" value="{{$business->zip_code}}">
					</div>

					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Address: </h6>
						<input type="text" name="adress" id="adress" class="form-control input-sm" value="{{$business->adress}}">
					</div>

					<div class="form-group" style="display: flex; flex-direction: row; ">
						<h6 style="width: 10%;margin-top: 10px;">Active: </h6>
						<input type="hidden" value="0" name="status">
         				<input type="checkbox" value="1" name="status" style="position: relative; margin-left: 0;" @if($business->status) checked @endif>
					</div>


					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Lat: </h6>
						<input type="text" name="lat" id="lat" class="form-control input-sm" value="{{$business->lat}}">
					</div>


					<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
						<h6 style="width: 10%;margin-top: 10px;">Lon: </h6>
						<input type="text" name="lon" id="lon" class="form-control input-sm" value="{{$business->lon}}">
					</div>

					<h6 style="width: 10%;margin-top: 10px;">Timetable: </h6>
					@foreach( $business->business_timetables as $timetable )
							@if ($timetable->fk_business_id==$business->business_id)
								<div class="form-group" style="display: flex; flex-direction: row;justify-content: space-between; ">
									<input type="text" name="day" id="day" class="form-control input-sm" value="{{$timetable->day}}">
									<input type="text" name="open" id="open" class="form-control input-sm" value="{{$timetable->open}}">
									<input type="text" name="close" id="close" class="form-control input-sm" value="{{$timetable->close}}">
								</div>
							@endif
					@endforeach




				<div class="row">

					<div class="col-xs-12 col-sm-12 col-md-12">
						<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
						<a href="{{ route('business.index') }}" class="btn btn-info btn-block" >Atrás</a>
					</div>

				</div>
			</form>
	</section>
	@endsection
