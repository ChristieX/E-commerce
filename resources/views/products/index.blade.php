@extends('layouts.app')
@section('title', 'Product List')

@section('content')
<a href={{ route('products.create') }} class="btn btn-primary">Add new product</a>
<div class="container">
    <table class="table table-bordered table-striped">
        <thead >
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Descripton</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Category</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr onclick="window.location.href='{{ route('products.show', $product->id) }}'" style="cursor: pointer;">
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>${{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->category_id }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

