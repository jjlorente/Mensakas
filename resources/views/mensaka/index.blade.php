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
        <h1 style="margin-left: 30px;"><b>Manage Mensakas</b></h1>
        <p>
          <a href="{{route('home')}}" type="button" class="btn btn-primary"> Return Admin Panel</a>
          <a type="submit" href="{{ route('mensaka.create') }}"  class="btn btn-success" style="margin-right: 30px; width: 300px;">Add New Mensaka</a>
        </p>
      </div>
     <thead style="background-color:#5c2583; color: white; align-items: center; ">
       <th style="border-radius: 10px;">First name</th>
       <th style="border-radius: 10px;">Last name</th>
       <th style="border-radius: 10px;">Phone</th>
       <th style="border-radius: 10px;">Status</th>
       <th style="border-radius: 10px;">Edit</th>
       <th style="border-radius: 10px;">Delete</th>
     </thead>
     <tbody>
          @if($mensakas->count())  
          @foreach($mensakas as $mensaka)  
          <tr>
            <td >{{$mensaka->first_name}}</td>
            <td >{{$mensaka->last_name}}</td>
            <td >{{$mensaka->phone}}</td>
            
              @if($mensaka->status==1)
                <td style="background-color: #ACECC3;"> Available</td>
              @else
                <td style="background-color: #ECACB2;">Not Available</td>
              @endif
              
            </td>
            <td ><a href="{{action('MensakaController@edit', $mensaka->mensaka_id)}}" class="btn btn-primary">Edit</a></td>
            <td >
              <a href="{{ route('mensaka.confirm', $mensaka->mensaka_id ) }}" class="btn btn-danger btncolorblanco">
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
      {{ $mensakas->links() }}
   </div>
   
  </div>
</div>
@endsection