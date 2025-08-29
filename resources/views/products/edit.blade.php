@extends('layouts.app')
@section('title', 'Edit Product')
@section('content')
<div class="container">
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}"
                required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3  ">{{ old('description', $product->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price"
                value="{{ old('price', $product->price) }}" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity"
                value="{{ old('quantity', $product->quantity) }}">
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" id="category_id" name="category_id" required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <!-- More Images -->
        <div class="mb-3">
            <label for="additional_images" class="form-label">Additional Product Images</label>
            <input type="file" class="form-control" id="additional_images" name="additional_images[]" multiple>
            <small class="form-text text-muted">Optional: You can upload multiple extra images.</small>
            <span class="text-danger fw-bold">
                @error('additional_images')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <button type="submit" class="btn btn-primary my-2">Update Product</button>
    </form>
        {{-- display existing images with delete and default button for each --}}
        {{-- @foreach ($product->images as $image)
                            <div class="me-2 mb-2 position-relative">
                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="Product Image" class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                                {{--
                            </div> --}} {{-- @endforeach  --}}
        @if ($product->images->count() > 0)
            <div class="mt-3">
                <div class="row g-3">
                    @foreach ($product->images as $image)
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card h-100 shadow-sm">
                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="Additional Image"
                                    class="card-img-top" style="height: 200px; object-fit: cover;">

                                <div class="card-body p-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        @if (!$image->is_default)
                                            <form action="{{ route('product-images.setDefault', $image->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    Set Default
                                                </button>
                                            </form>
                                        @else
                                            <span class="badge bg-success">Default</span>
                                        @endif

                                        <form action="{{ route('product-images.destroy', $image->id) }}" method="POST" onsubmit="return confirm('Delete this image?');"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        
</div>
@endsection
