@extends('layouts.app')
@section('title', 'Welcome Page')
@section('content')
    <section>
        <div class="mb-4" style="height: 50vh; overflow: hidden;">
            <img src="{{ asset('images/banner.jpg') }}" class="w-100 h-100 object-fit-cover rounded" alt="Banner Image">
        </div>

        <div class="container">
            <h1 class="h4 ">Browse by Category</h1>

            <div class="d-flex align-items-center justify-content-between flex-nowrap overflow-auto p-2 bg-white border rounded">
                <a href="{{ route('products.index') }}" class=" flex-shrink-0 me-2 text-decoration-none text-dark">
                        <x-card>
                            <x-slot:header>
                                <img src="{{ asset('images/all-products.jpg') }}" class="card-img-top img-fluid "
                                    alt="All products" style="width: 100%; height: 150px; object-fit: cover;">
                            </x-slot>
                                <h4 class="text-center">All Products</h4>
                        </x-card>
                    </a>
                @foreach ($categories as $category)
                    <a href="{{ route('category.show', $category->slug) }}" class=" flex-shrink-0 me-2 text-decoration-none text-dark">
                        <x-card>
                            <x-slot:header>
                                <img src="{{ asset('images/all-products.jpg') }}" class="card-img-top img-fluid"
                                    alt="{{ $category->name }}" style="width: 100%; height: 150px; object-fit: cover;">
                            </x-slot>
                            <h4 class="text-center ">{{ $category->name }}</h4>


                                {{-- <img src="{{ asset('images/categories/' . $category->image) }}" alt="{{ $category->name }}" class="img-fluid" style="width: 100px; height: 100px; object-fit: cover;"> --}}


                        </x-card>
                    </a>
                @endforeach
            </div>
        </div>
        <hr>

    </section>
@endsection
