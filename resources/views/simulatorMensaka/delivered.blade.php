@extends('layouts.app')
@section('content')


			@if (count($errors) > 0)
			<div class="alert alert-danger" style="text-align: center; justify-content: center;">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<p>{{ $error }}</p>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif

			<div style="width: 50%;align-content: center;margin: 0 auto;">
				<h3 style="text-align: center;">Mensaka</h3>
			</div>

      <div style="width: 50%;align-content: center;margin: 0 auto; text-align:center; margin-top: 300px; ">
          <h1 style="font-size:35px;">EL PEDIDO HA SIDO ENTREGADO</h1>
      </div>

      <form method="GET" action="{{ route('simulatorMensakaPedido') }}" role="form" style="width: 20%;align-content: center;margin: 0 auto;">
        <input type="submit" name="" value="VOLVER"  class="btn btn-success btn-block" style="margin-top:20px;">
      </form>




	</section>
	@endsection
