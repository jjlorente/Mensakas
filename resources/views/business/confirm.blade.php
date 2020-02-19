@extends('layouts.app')
@section('content')


<div class="container py-5">
	<h1>¿Do you want to delete the business {{ $business->name }} record? </h1>

<form method="post" action="{{ route('business.destroy', $business->business_id )}}">
	@method('DELETE')
	@csrf
	<button type="submit" class="redondo btn btn-danger">
		<i class="fas fa-trash-alt"></i> Delete
	</button>
	<a class="redondo btn btn-secondary" href="{{ route('business.index') }}">
		 Cancel
	</a>
</form>

</div>

@endsection
