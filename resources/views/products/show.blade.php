@extends('layouts.app')
@section('title', "{{ $product->slug }}")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <x-card>
                    <x-slot:header>
                        <h2>{{ $product->name }}</h2>
                    </x-slot:header>
                    <p><strong>Category:</strong> {{ $product->category->name }}</p>
                    <p><strong>Description:</strong> {{ $product->description }}</p>
                    <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                    <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
                    <p><strong>Slug:</strong> {{ $product->slug }}</p>
                    <x-slot:footer>
                        <a href="{{ route('products.index') }}" class="btn btn-primary">Back to Products</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </x-slot:footer>
                </x-card>
            </div>
        </div>
    </div>
@endsection
