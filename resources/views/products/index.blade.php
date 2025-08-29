{{-- @extends('layouts.app')
@section('title', 'Product List')

@section('content')
    <div class="container mt-3">
        @can('create', App\Models\Product::class)
            <a href={{ route('products.create') }} class="btn btn-primary my-2">Add new product</a>
        @endcan
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Descripton</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Category</th>
                    @if (auth()->check() &&
                            $products->contains(fn($product) => auth()->user()->can('update', $product) || auth()->user()->can('delete', $product)))
                        <th>Actions</th>
                    @endif

                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr onclick="window.location.href='{{ route('products.show', $product->id) }}'"
                        style="cursor: pointer;">
                        <td>{{ $product->id }}</td>
                        <td>
                            @if ($product->images->where('is_default', true)->first())
                                <img src="{{ asset('storage/' . $product->images->where('is_default', true)->first()->image_path) }}"
                                    alt="{{ $product->name }}" style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->category_id }}</td>
                        @canany(['update', 'delete'], $product)
                            <td>
                                @can('update', $product)
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                @endcan
                                @can('delete', $product)
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @endcan
                            </td>
                        @endcanany
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection --}}

@extends('layouts.app')
@section('title', 'Products')

@section('content')
<div class="container mt-4">
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-3 mb-4">
                <x-card>
                    {{-- Header with product image --}}
                    @if ($product->images->where('is_default', true)->first())
                    <x-slot name="header">
                            <img src="{{ asset('storage/' . $product->images->where('is_default', true)->first()->image_path) }}"
                                alt="{{ $product->name }}" 
                                class="img-fluid rounded" 
                                style="height: 180px; object-fit: cover; width: 100%;">
                            </x-slot>
                            @endif
                    <h3 class="fw-bold mb-1">{{ $product->name }}</h3>

                    {{-- Body with details --}}
                    <p class="text-muted small mb-2">{{ $product->description }}</p>
                    <p class="mb-0"><strong>Price:</strong> ${{ $product->price }}</p>

                    <x-slot name="footer">
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary w-100">View</a>
                    </x-slot>
                </x-card>
            </div>
        @endforeach
    </div>
</div>
@endsection

