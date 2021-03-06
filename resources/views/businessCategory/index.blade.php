@extends('layouts.app')
@section('content')

<div style="display: flex;flex-direction: column; ">
  <div  style="width: 80%; text-align: center; margin-left: auto; margin-right: auto; font-family: Vegur, 'PT Sans', Verdana; ">
    @if(Session::has('notice'))
      <p class="alert alert-success"> <strong> {{ Session::get('notice') }} </strong> </p>
    @endif
    </div>

    <div class="enlacesCategories">
        <a href="{{ route('businessCategory.index') }}" class="enlaces active">  Business Category  </a>
        <a href="{{ route('productCategory.index') }}" class="enlaces"> Product Category </a>
    </div>

    <div class="table-title" style="display: flex; flex-direction: row; justify-content: space-between;">
      <h1 style="margin-left: 30px;"><b>Manage Business Category</b></h1>
      <div style="display: flex; flex-direction: row;">
        <div style="margin-right: 50px;">
          <form class="form-inline">
            <select name="tipo" class="form-control"  style="margin-right: 5px;">
              <option value="name">Name</option>
            </select>
            <input name="buscarpor" type="search" class="form-control"  style="margin-right: 5px;">
            <button class=" btn btn-primary" type="submit">Search</button>
          </form>
        </div>
        <div>
          <a href="{{route('home')}}" type="button" class="btn btn-primary"> Return Admin Panel</a>
          <a type="submit" href="{{ route('businessCategory.create') }}"  class="btn btn-success" style="margin-right: 27px; width: 300px;">Add New Business</a>
        </div>
      </div>
    </div>
    <table class="table table-bordered table-hover" style="width: 100%; text-align: center;">
     <thead style="background-color:#5c2583; color: white; align-items: center; ">
       <th style="border-radius: 10px; width:40%;">Name Category</th>
       <th style="border-radius: 10px; width:40%;">Name Business</th>
       <th COLSPAN="2" style="border-radius: 10px; width:20%;">Actions</th>
     </thead>
     <tbody>
          @if($businessCategory->count())
          @foreach($businessCategory as $businesCategory)

          <tr>
            <td>{{$businesCategory->name}}</td>
            <td>{{$businesCategory->business->name}}</td>
            <td><a href="{{action('BusinessCategoryController@edit', $businesCategory->business_category_id)}}" class="btn btn-primary">Edit</a></td>
            <td><a href="{{ route('businessCategory.confirm', $businesCategory->business_category_id ) }}" class="btn btn-danger btncolorblanco"> Delete </a></td>
           </tr>
          @endforeach
          @else
            <tr>
              <td colspan="8">No hay registros disponibles!</td>
            </tr>
          @endif
        </tbody>

   </table>
   <div>
      @if($businessCategory instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{ $businessCategory->links() }}
      @endif
   </div>


  </div>
</div>
@endsection
