@extends('layouts.appjs')
@section('content')
   <div style="width: 100%; margin: 0 auto;">
   		<h3 style="text-align: center;">Order:</h3>
   		<form action="{{ route('simulatorestadoorder') }}" method="POST">
    	@csrf		
   		<table  class="table " style="width: 80%; margin: 0 auto; border: solid #5c2583 2px;">
   			<thead >
   				<tr>
   					<th colspan="3" class="table-primary">Business: {{$business->name}}</th>
   				</tr>
   				<tr>
   					<th colspan="3" class="table-primary">Order Nº: {{$order->order_id}}</th>
   				</tr>
            <tr class="table-secondary">
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
    		<?php  
    			$sumTotal = 0;
    		?>
    		
        	@for ($i= 0; $i < count($arrayProducts); $i++)
            <tr>
            	<td>
                    {{ $arrayProducts[$i]->name }} (${{ number_format($arrayProducts[$i]->price, 2) }} c/u)
            	</td>
            	<td>
                    {{ $quantities[$i] }}
            	</td>
            	<td>
                    {{ number_format($arrayProducts[$i]->price, 2)*$quantities[$i] }}$
            	</td>
            </tr>
    
            <?php  
            	$prodSum = number_format($arrayProducts[$i]->price, 2)*$quantities[$i];
            	$sumTotal = $sumTotal + $prodSum;
            ?>
              
        	@endfor
           <tr>
              <td colspan="2"></td>
              <td><h5>Total Price: <?php echo $sumTotal; ?>$</h5></td>
            </tr>
        </tbody>
     	
   		</table>

      <div style="width: 80%; margin: 0 auto; text-align: center; margin-top: 20px;">
     		<input type="hidden" name="order_id" value="{{$order->order_id}}">
        <div class="form-group" style="display: flex; flex-direction: row; ">
          <h6 style="width: 15%; margin-top: 10px;">Credit card: </h6>
          <input type="text" name="target" class="form-control input-sm" placeholder="Credit card" >
        </div>

        <div class="form-group" style="display: flex; flex-direction: row; ">
          <h6 style="width: 15%; margin-top: 10px;">Date of expiry: </h6>
          <input maxlength="5" type="text" name="token" id="token" class="form-control input-sm" placeholder="Fecha caducidad">
        </div>

        <div class="form-group" style="display: flex; flex-direction: row;">
          <h6 style="width: 15%; margin-top: 10px;">CVV: </h6>
          <input maxlength="4" type="text" name="digit" id="digit" class="form-control input-sm" placeholder="Control digit">
        </div>
     </div>
     <div style=" width: 100%; text-align: center;">
        <a href="#" type="button" class="btn btn-primary"> Return</a>
        <input class="btn btn-success" type="submit" value="Pagar" >
    </div>
   	</form>
   </div>

@endsection