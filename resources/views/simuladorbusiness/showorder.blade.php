@extends('layouts.app')
@section('content')
	@foreach($orders as $order)
		{{$order}}
	@endforeach
@endsection
</body>
</html>