@extends('layouts.app')
@section('content')
	<form action="{{ route('simulatorstoreproducts') }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-header">
            Products
        </div>

        <div class="card-body">
            <table class="table" id="products_table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="product0">
                        <td>
                            <select name="products[]" class="form-control">
                                @foreach ($products as $product)
                                    <option value="{{ $product->product_id }}" selected>
                                        {{ $product->name }} (${{ number_format($product->price, 2) }})
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="number" name="quantities[]" class="form-control" value="1" />
                        </td>
                    </tr>
                    <tr id="product1"></tr>
                    <tr id="product2"></tr>
                    <tr id="product3"></tr>
                    <tr id="product4"></tr>
                    <tr id="product5"></tr>
                    <tr id="product6"></tr>
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-12">
                    <button id="add_row" class="btn btn-default pull-left" style="background-color: cyan;">+ Add Product</button>
                    <button id='delete_row' class="pull-right btn btn-danger">- Delete Product</button>
                </div>
            </div>
        </div>
    </div>
    <div style=" text-align: center;">
        <input class="btn btn-danger" type="submit" value="Hacer pedido" >
    </div>
    <input type="hidden" name="fk_consumers_id" value="{{$consumer[0]->consumer_id}}">
    <input type="hidden" name="status" value="0">
</form>

@endsection