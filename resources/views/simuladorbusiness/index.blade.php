@extends('layouts.app')
@section('content')

	@if(Session::has('success'))
		<div class="alert alert-info">
			{{Session::get('success')}}
		</div>
	@endif

	<div style="width: 100%; height: 100%; text-align: center;">
		<h3>Restaurantes:</h3><br>
		<h5>Selecciona un restaurante:</h5>
		<form method="GET" action="{{route('showorderbusiness')}}" role="form" style="width: 50%;align-content: center;margin: 0 auto;">
			<select name="business" class="form-control"  style="margin-right: 5px;">
			@foreach($business as $busines)
				<option value="{{$busines->business_id}}">{{$busines->name}} 
					@if (empty($busines->business_categories))
			      		- Categoria no especificada
			    	@else
			    		- {{$busines->business_categories->name}}
			   		@endif
		   		</option>
			@endforeach
			</select>
			<div class="row" style="margin-top: 10px;">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<input type="submit"  value="Siguiente" class="btn btn-success btn-block">
					<a href="" class="btn btn-info btn-block" >Atrás</a>
				</div>	
			</div>
		</form>
	</div>

@endsection
</body>
</html>