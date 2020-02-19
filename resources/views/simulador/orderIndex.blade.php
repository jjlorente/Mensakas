@extends('layouts.appjs')
@section('content')
   <div style="width: 100%; margin: 0 auto;">
   		<h3 style="text-align: center;">Order:</h3>
   		<form action="{{ route('simulatorestadoorder') }}" method="POST">
    	@csrf		
   		<table  class="table" style="width: 80%; margin: 0 auto; border: solid black 5px;">
   			<thead>
   				<tr>
   					<th colspan="3">Business: {{$business->name}}</th>
   				</tr>
   				<tr>
   					<th colspan="3">Order Nº: {{$order->order_id}}</th>
   				</tr>
                <tr>
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
	                            {{ $arrayProducts[$i]->name }} (${{ number_format($arrayProducts[$i]->price, 2) }})
	                    	</td>
	                    	<td>
	                            {{ $quantities[$i] }}
	                    	</td>
	                    	<td>
	                            {{ number_format($arrayProducts[$i]->price, 2)*$quantities[$i] }}
	                    	</td>
	                    </tr>
	                    <?php  
	                    	$prodSum = number_format($arrayProducts[$i]->price, 2)*$quantities[$i];
	                    	$sumTotal = $sumTotal + $prodSum;
	                    ?>
	                    
                	@endfor
            </tbody>
     	
   		</table>
   		<div style="width: 80%; margin-top: 5px; text-align: right;">
   			<h4 style="position: relative; margin: 0 auto;">
   				Total Price: 
   				     <?php  	
            		echo $sumTotal;
            	?>$
        </h4>
        
   		</div>
   		<input type="hidden" name="order_id" value="{{$order->order_id}}">
      <div style="text-align: center;">
         <input style="text-align: center; align-items: center;" class="btn btn-primary" type="submit" value="Pagar" >
      </div>
     
   	</form>
   </div>

@endsection