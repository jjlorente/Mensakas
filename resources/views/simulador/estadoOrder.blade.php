@extends('layouts.appjs')
@section('content')

<div style="width: 80%; margin: 0 auto;">
	<h2 style="text-align: center;">Status Order Nº{{\App\Order::where(['order_id' => $order_id])->pluck('order_id')->first()}} </h2>
	<div style="display: flex; flex-direction: row; text-align: center; justify-content: space-between; width: 100%; border: solid black 5px;">
		@if(\App\Order::where(['order_id' => $order_id])->pluck('status')->first()==0)
			<div style="background-color: #00cc00; width: 25%; height: 45px;"><h2>Petición enviada</h2></div>
			<div style="background-color: #ccffcc; width: 25%; height: 45px;"><h2>Preparando pedido</h2></div>
			<div style="background-color: #ccffcc;  width: 25%; height:45px;"><h2>En camino</h2></div>
			<div style="background-color: #ccffcc;  width: 25%; height: 45px;"><h2>Entregado</h2></div>
		@elseif(\App\Order::where(['order_id' => $order_id])->pluck('status')->first()==1)
			<div style="background-color: #ccffcc; width: 25%; height: 45px;"><h2>Petición enviada</h2></div>
			<div style="background-color: #00cc00; width: 25%; height: 45px;"><h2>Preparando pedido</h2></div>
			<div style="background-color: #ccffcc; width: 25%; height: 45px;"><h2>En camino</h2></div>
			<div style="background-color: #ccffcc; width: 25%; height: 45px;"><h2>Entregado</h2></div>
		@elseif(\App\Order::where(['order_id' => $order_id])->pluck('status')->first()==2)
			<div style="background-color: #ccffcc; width: 25%; height: 45px;"><h2>Petición enviada</h2></div>
			<div style="background-color: #ccffcc; width: 25%; height: 45px;"><h2>Preparando pedido</h2></div>
			<div style="background-color: #00cc00; width: 25%; height: 45px;"><h2>En camino</h2></div>
			<div style="background-color: #ccffcc; width: 25%; height: 45px;"><h2>Entregado</h2></div>
		@else
			<div style="background-color: #ccffcc; width: 25%; height: 45px;"><h2>Petición enviada</h2></div>
			<div style="background-color: #ccffcc; width: 25%; height: 45px;"><h2>Preparando pedido</h2></div>
			<div style="background-color: #ccffcc; width: 25%; height: 45px;"><h2>En camino</h2></div>
			<div style="background-color: #00cc00; width: 25%; height: 45px;"><h2>Entregado</h2></div>
		@endif
	</div>
	<h2 style="margin-top: 10px;">Actualizaciones: {{\App\Order::where(['order_id' => $order_id])->pluck('description')->first()}} </h2>
</div>
@endsection