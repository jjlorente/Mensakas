<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	Productos:
	@foreach($products as $product)
		{{$product->name}} -- 
		{{$product->price}}<br>
	@endforeach

	Consumer ID: {{$consumer[0]->consumer_id}}<br>
	Business ID: {{$business[0]->business_id}}
</body>
</html>