@extends('layouts.app')
@section('content')


  <body>
    <div style="width: 70%; height: 20%; text-align: center; position: absolute; top:40%; left:15%;">
        <form method="GET" action="{{ route('simulatorMensakaPedido') }}" role="form" style="width: 50%;align-content: center;margin: 0 auto;">
          <select  class="form-control" name="mensakaID" >
            @foreach ($mensaka as $mensakas)
              <option value="{{$mensakas->mensaka_id}}">{{$mensakas->first_name}} {{$mensakas->last_name}}</option>
            @endforeach
          </select>
          <input type="submit" name="" value="ENTRAR"  class="btn btn-success btn-block" style="margin-top:20px;">
        </form>
    </div>
  </body>
</html>
@endsection
