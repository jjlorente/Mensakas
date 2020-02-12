@extends('layouts.app')
@section('content')


<div class="container py-5">
	<h1>¿Deseas eliminar el registro de {{ $mensaka->first_name }} {{ $mensaka->last_name }}? </h1>

<form method="post" action="{{ route('mensaka.destroy', $mensaka->mensaka_id )}}">
	@method('DELETE')
	@csrf
	<button type="submit" class="redondo btn btn-danger">
		<i class="fas fa-trash-alt"></i> Eliminar
	</button>
	<a class="redondo btn btn-secondary" href="{{ route('mensaka.index') }}">
		 Cancelar
	</a>
</form>	

</div>

@endsection