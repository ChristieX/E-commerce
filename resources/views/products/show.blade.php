@extends('layouts.app')
@section('title', "{{ $product->slug }}")

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <x-card>
                    <x-slot:header>
                        <h2>{{ $product->name }}</h2>
                        {{-- <img src="" alt=""> --}}
                        {{-- @if ($product->images->where('is_default', true)->first())
                            <img src="{{ asset('storage/' . $product->images->where('is_default', true)->first()->image_path) }}" alt="{{ $product->name }}" class="img-fluid mb-3" style="max-height: 400px; object-fit: cover;">
                        @else
                            <span>No image</span>
                        @endif --}}
                        @if ($product->images->count() > 0)
                            <div class="mt-3">
                                <div class="row g-2">
                                    @foreach ($product->images as $image)
                                        <div class="col-6 col-md-4 col-lg-3">
                                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Additional Image"
                                                class="img-fluid rounded shadow-sm"
                                                style="height: 250px; object-fit: cover; width: 100%;">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </x-slot:header>
                    <x-alert type="success" message="{{ session('success') }}"/>
                    <p><strong>Category:</strong> {{ $product->category->name }}</p>
                    <p><strong>Description:</strong> {{ $product->description }}</p>
                    <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                    <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
                    <p><strong>Slug:</strong> {{ $product->slug }}</p>
                    <x-slot:footer>
                        <a href="{{ route('products.index') }}" class="btn btn-primary">Back to Products</a>
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
                    </x-slot:footer>
                </x-card>
            </div>
        </div>
    </div>
@endsection
