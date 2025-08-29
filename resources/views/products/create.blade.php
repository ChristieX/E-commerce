@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route('products.store') }}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name" name="name"  value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"  value="{{ old('description') }}" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price"  value="{{ old('price') }}" name="price" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity"  value="{{ old('quantity') }}" name="quantity" >
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" id="category_id" name="category_id" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <!-- Default Image -->
                <div class="mb-3">
                    <label for="default_image" class="form-label">Default Product Image</label>
                    <input type="file" class="form-control" id="default_image" name="default_image"
                     >
                    <span class="text-danger fw-bold">@error('default_image'){{$message}}@enderror</span>
                </div>
                
                <!-- Additional Images -->
                <div class="mb-3">
                    <label for="additional_images" class="form-label">Additional Product Images</label>
                    <input type="file" class="form-control" id="additional_images" name="additional_images[]"
                    multiple>
                    <small class="form-text text-muted">Optional: You can upload multiple extra images.</small>
                    <span class="text-danger fw-bold">@error('additional_images'){{$message}}@enderror</span>
                </div>
        <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
</div>

@endsection