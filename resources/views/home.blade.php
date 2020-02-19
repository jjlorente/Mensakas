@extends('layouts.app')

@section('content')

<body class="body_home">
    <div class="opciones_admin_panel" >

        <a href="consumer" class="item_panel">
            <img src="/images/consumer.png" alt="consumer">
            <span>CONSUMERS</span>
        </a>

        <a href="mensaka" class="item_panel">
            <img src="/images/mensaka.png" alt="mensaka">
            <span>MENSAKAS</span>
        </a>

        <a href="business" class="item_panel">
            <img src="/images/business.png" alt="business">
            <span>BUSINESS</span>
        </a>

        <a href="order" class="item_panel">
            <img src="/images/order.png" alt="order">
            <span>ORDERS</span>
        </a>

        <a href="pack" class="item_panel">
            <img src="/images/pack.png" alt="pack">
            <span>PACKS</span>
        </a>

        <a href="product" class="item_panel">
            <img src="/images/product.png" alt="product">
            <span>PRODUCTS</span>
        </a>

        <a href="businessCategory" class="item_panel">
            <img src="/images/category.png" alt="category">
            <span>CATEGORIES</span>
        </a>

    </div>
</body>


@endsection
