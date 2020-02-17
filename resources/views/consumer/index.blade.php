@extends('layouts.app')
@section('content')

<div style="display: flex;flex-direction: column; ">
  <div  style="width: 80%; text-align: center; margin-left: auto; margin-right: auto; font-family: Vegur, 'PT Sans', Verdana; ">
    @if(Session::has('notice'))
      <p class="alert alert-success"> <strong> {{ Session::get('notice') }} </strong> </p>
    @endif 
    </div>
    <div class="table-title" style="display: flex; flex-direction: row; justify-content: space-between;">
      <h1 style="margin-left: 30px;"><b>Manage Consumer</b></h1>
      <div style="display: flex; flex-direction: row;">
        <div style="margin-right: 50px;">
          <form class="form-inline">
            <select name="tipo" class="form-control"  style="margin-right: 5px;">
              <option value="first_name">First name</option>
              <option value="last_name">Last name</option>
              <option value="phone">Phone</option>
              <option value="address">Address</option>
              <option value="target">Credit Card</option>
              <option value="mail">Email</option>
              <option value="city">City</option>
            </select>
            <input name="buscarpor" type="search" class="form-control"  style="margin-right: 5px;">
            <button class=" btn btn-primary" type="submit">Search</button>
          </form>
        </div>
        <div>
          <a href="{{route('home')}}" type="button" class="btn btn-primary"> Return Admin Panel</a>
          <a type="submit" href="{{ route('consumer.create') }}"  class="btn btn-success" style="margin-right: 27px; width: 300px;">Add New Consumer</a>
        </div>
      </div>
    </div>
    <table class="table table-bordered table-hover" style="width: 100%; text-align: center;">
     <thead style="background-color:#5c2583; color: white; align-items: center; ">
       <th style="border-radius: 10px;">First name</th>
       <th style="border-radius: 10px;">Last name</th>
       <th style="border-radius: 10px;">Phone</th>
       <th style="border-radius: 10px;">Email</th>
       <th style="border-radius: 10px;">Address</th>
       <th style="border-radius: 10px;">Credit Card</th>
       <th style="border-radius: 10px;">City</th>
       <th COLSPAN="2" style="border-radius: 10px;">Actions</th>
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
      @if($consumers instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{ $consumers->links() }}
      @endif
   </div>
   
  </div>
</div>
@endsection