<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <form class="" action="{{ route('simulatorMensakaEdit') }}" method="get">

      <select class="" name="">
        @foreach ($mensaka as $mensakas)
          <option value="{{$mensakas->mensaka_id}}">{{$mensakas->last_name}}</option>
        @endforeach
      </select>
      <button type="submit" name="button">entra</button>

    </form>


  </body>
</html>
