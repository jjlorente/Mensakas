@extends('layouts.app')
@section('content')


<div class="container py-5">
	<h1>¿Deseas eliminar el registro de  {{ $business->name }}? </h1>

<form method="post" action="{{ route('business.destroy', $business->business_id )}}">
	@method('DELETE')
	@csrf
	<button type="submit" class="redondo btn btn-danger">
		<i class="fas fa-trash-alt"></i> Eliminar
	</button>
	<a class="redondo btn btn-secondary" href="{{ route('business.index') }}">
		 Cancelar
	</a>
</form>	

</div>

@endsection