@extends('layouts.app')
@section('content')


<div class="container py-5">
	<h1>¿Do you want to delete the product {{ $consumer->first_name }} {{ $consumer->last_name }} record? </h1>

<form method="post" action="{{ route('consumer.destroy', $consumer->consumer_id )}}">
	@method('DELETE')
	@csrf
	<button type="submit" class="redondo btn btn-danger">
		<i class="fas fa-trash-alt"></i> Delete
	</button>
	<a class="redondo btn btn-secondary" href="{{ route('consumer.index') }}">
		 Cancel
	</a>
</form>	

</div>

@endsection