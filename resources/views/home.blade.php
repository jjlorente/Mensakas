@extends('layouts.app')

@section('content')

<body class="body_home">
    <div class="opciones_admin_panel" >


        <a href="consumer" title="">
          <div class="item_panel opcion_conusmer">
            <h1>CONSUMERS</h1>
          </div>
        </a>

        <a href="mensaka" title="">
          <div class="item_panel opcion_mensaka">
            <h1>MENSAKAS</h1>
          </div>
        </a>

        <a href="business" title="">
          <div class="item_panel opcion_business">
            <h1>BUSINESS</h1>
          </div>
        </a>

        <a href="order" title="">
          <div class="item_panel opcion_order">
            <h1>ORDERS</h1>
          </div>
        </a>

        <a href="pack" title="">
          <div class="item_panel opcion_menu">
            <h1>PACKS</h1>
          </div>
        </a>

        <a href="product" title="">
          <div class="item_panel opcion_menu">
             <h1>PRODUCTS</h1>
          </div>
        </a>

        <a href="businessCategory" title="">
          <div class="item_panel opcion_menu">
            <h1>CATEGORIES</h1>
          </div>
        </a>

    </div>
</body>


@endsection
