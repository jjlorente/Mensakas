@extends('layouts.app')

@section('content')

<body class="body_home">
    <div class="opciones_admin_panel" >

        <div class="item_panel opcion_conusmer">
            <a href="consumer" title="">
                <h1>CONSUMER</h1>
            </a>
        </div>

        <div class="item_panel opcion_mensaka">
            <a href="" title="">
                <h1>MENSAKAS</h1>
            </a>
        </div>

        <div class="item_panel opcion_business">
            <a href="business" title="">
                <h1>BUSINESS</h1>
            </a>
        </div>

        <a href="{{route('home')}}" type="button" class="btn btn-primary"> Return Admin Panel</a>

    </div>
</body>


@endsection
