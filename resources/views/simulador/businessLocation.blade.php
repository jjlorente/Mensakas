<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	Restaurantes en {{$location}}:<br>
	@foreach($business as $busines)
		{{$busines->name}} -- {{$busines->business_categories->name}}<br>
			

	@endforeach
</body>
</html>