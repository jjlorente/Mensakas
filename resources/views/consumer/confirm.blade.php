@extends('layouts.app')
@section('content')


<div class="container py-5">
	<h1>¿Deseas eliminar el registro de {{ $consumer->first_name }} {{ $consumer->last_name }}? </h1>

<form method="post" action="{{ route('consumer.destroy', $consumer->consumer_id )}}">
	@method('DELETE')
	@csrf
	<button type="submit" class="redondo btn btn-danger">
		<i class="fas fa-trash-alt"></i> Eliminar
	</button>
	<a class="redondo btn btn-secondary" href="{{ route('consumer.index') }}">
		 Cancelar
	</a>
</form>	

</div>

@endsection