@extends('layouts.app')

@section('title', 'Products')

@section('title_page')
    <h1>Products</h1>
@endsection

@section('content')
<div>
    <table>
        <thead>
            <tr>
                <th>Product name</th>
                <th>Product price</th>
                <th>Product description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <th>{{ $product->name }}</th>
                <th>{{ $product->price }}</th>
                <th>{{ $product->description }}</th>
                <th>
                    <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                
                    
                    <button type="submit">Order</button>
                    </form>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                            <a href="{{ route('products.show', $product->id) }}">Show</a>
                            <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                            <button type="submit"><i></i> Delete</button>
                    </form>
                </th>
            </tr>

            @empty
                <tr>
                    <th colspan="4"><h3>No products</h3></th>
                </tr>
        @endforelse
        </tbody>
    </table>
    <a class="create btn" href="{{ route('products.create') }}">Create product</a>
    <a class="myOrders btn" href="{{ route('orders.index') }}">My Orders</a>
</div>
@endsection