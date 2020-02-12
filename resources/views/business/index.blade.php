@extends('layouts.app')
@section('content')

<div style="display: flex;flex-direction: column; ">
  <div  style="width: 80%; text-align: center; margin-left: auto; margin-right: auto; font-family: Vegur, 'PT Sans', Verdana; ">
    @if(Session::has('notice'))
      <p class="alert alert-success"> <strong> {{ Session::get('notice') }} </strong> </p>
    @endif 
    </div>
    <table class="table table-bordered table-hover" style="width: 100%; text-align: center;">
      <div class="table-title" style="display: flex; flex-direction: row; justify-content: space-between; ">
        <h1 style="margin-left: 30px;"><b>Manage Business</b></h1>
        <p>
          <a href="{{route('home')}}" type="button" class="btn btn-primary"> Return Admin Panel</a>
          <a type="submit" href="{{ route('business.create') }}"  class="btn btn-success" style="margin-right: 27px; width: 300px;">Add New Business</a>
        </p>
      </div>
     <thead style="background-color:#5c2583; color: white; align-items: center; ">
       <th style="border-radius: 10px;">Name</th>
       <th style="border-radius: 10px;">Phone</th>
       <th style="border-radius: 10px;">Email</th>
       <th style="border-radius: 10px;">Address</th>
       <th style="border-radius: 10px;">ZipCode</th>
       <th style="border-radius: 10px;">Status</th>
       <th style="border-radius: 10px;">Lat</th>
       <th style="border-radius: 10px;">Lon</th>
       <th style="border-radius: 10px;">Edit</th>
       <th style="border-radius: 10px;">Delete</th>
     </thead>
     <tbody>
          @if($business->count())  
          @foreach($business as $busines)  
          <tr>
            <td >{{$busines->name}}</td>
            <td >{{$busines->phone}}</td>
            <td >{{$busines->mail}}</td>
            <td>{{$busines->adress}}</td>
            <td>{{$busines->zip_code}}</td>
              @if($busines->status==1)
                <td style="background-color: #ACECC3;"> Available</td>
              @else
                <td style="background-color: #ECACB2;">Not Available</td>
              @endif
            <td>{{$busines->lat}}</td>
            <td>{{$busines->lon}}</td>
            <td ><a href="{{action('BusinessController@edit', $busines->business_id)}}" class="btn btn-primary">Edit</a></td>
            <td >
              <a href="{{ route('business.confirm', $busines->business_id ) }}" class="btn btn-danger btncolorblanco">
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
      {{ $business->links() }}
   </div>
   
  </div>
</div>
@endsection