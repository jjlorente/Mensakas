@extends('layouts.app')

@section('content')

<body class="body_home">
    <div class="opciones_admin_panel" >

        <div class="item_panel opcion_user">
            <a href="{{route('homeuser')}}" title="">
                <h1>USERS</h1>
            </a>
        </div>

        <div class="item_panel opcion_order">
            <a href="#" title="">
                <h1>ORDERS</h1>
            </a>
        </div>

        <div class="item_panel opcion_menu">
            <a href="" title="">
                <h1>MENUS</h1>
            </a>
        </div>

    </div>
</body>


@endsection
