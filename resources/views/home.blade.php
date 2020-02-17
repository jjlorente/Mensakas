@extends('layouts.app')

@section('content')

<body class="body_home">
    <div class="opciones_admin_panel" >

        <div class="item_panel opcion_conusmer">
            <a href="consumer" title="">
                <h1>CONSUMERS</h1>
            </a>
        </div>

        <div class="item_panel opcion_mensaka">
            <a href="mensaka" title="">
                <h1>MENSAKAS</h1>
            </a>
        </div>

        <div class="item_panel opcion_business">
            <a href="business" title="">
                <h1>BUSINESS</h1>
            </a>
        </div>

        <div class="item_panel opcion_order">
            <a href="order" title="">
                <h1>ORDERS</h1>
            </a>
        </div>

        <div class="item_panel opcion_menu">
            <a href="pack" title="">
                <h1>PACKS</h1>
            </a>
        </div>

        <div class="item_panel opcion_menu">
            <a href="product" title="">
                <h1>PRODUCTS</h1>
            </a>
        </div>

    </div>
</body>


@endsection
