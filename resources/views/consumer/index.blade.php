@extends('layouts.app')
@section('content')

<div style="display: flex;flex-direction: column; ">
  <div  style="width: 80%; text-align: center; margin-left: auto; margin-right: auto; font-family: Vegur, 'PT Sans', Verdana; ">
    @if(Session::has('notice'))
      <p class="alert alert-success"> <strong> {{ Session::get('notice') }} </strong> </p>
    @endif 
    </div>
    <table class="table  table-bordered table-hover" style="width: 100%; text-align: center;">
      <div class="table-title" style="display: flex; flex-direction: row; justify-content: space-between; ">
        <h1 style="margin-left: 30px;"><b>Manage Consumers</b></h1>
        <p>
          <a href="{{route('home')}}" type="button" class="btn btn-primary"> Return Admin Panel</a>
          <a type="submit" href="{{ route('consumer.create') }}"  class="btn btn-success" style="margin-right: 30px; width: 300px;">Add New Consumer</a>
        </p>
      </div>
     <thead style="background-color:#5c2583; color: white; align-items: center; ">
       <th style="border-radius: 10px;">First name</th>
       <th style="border-radius: 10px;">Last name</th>
       <th style="border-radius: 10px;">Phone</th>
       <th style="border-radius: 10px;">Email</th>
       <th style="border-radius: 10px;">Address</th>
       <th style="border-radius: 10px;">Target</th>
       <th style="border-radius: 10px;">City</th>
       <th style="border-radius: 10px;">Edit</th>
       <th style="border-radius: 10px;">Delete</th>
     </thead>
     <tbody>
          @if($consumers->count())  
          @foreach($consumers as $consumer)  
          <tr>
            <td >{{$consumer->first_name}}</td>
            <td >{{$consumer->last_name}}</td>
            <td >{{$consumer->phone}}</td>
            <td >{{$consumer->mail}}</td>
            <td>{{$consumer->address}}</td>
            <td>{{$consumer->target}}</td>
            <td>{{$consumer->city}}</td>
            <td ><a href="{{action('ConsumerController@edit', $consumer->consumer_id)}}" class="btn btn-primary">Edit</a></td>
            <td >
              <a href="{{ route('consumer.confirm', $consumer->consumer_id ) }}" class="btn btn-danger btncolorblanco">
                 Delete 
              </a>
             </td>
           </tr>
          @endforeach 
          @else
            <tr>
              <td colspan="8">No hay registros!!!</td>
            </tr>
          @endif
        </tbody>

   </table>
   <div>
      {{ $consumers->links() }}
   </div>
   
  </div>
</div>
@endsection