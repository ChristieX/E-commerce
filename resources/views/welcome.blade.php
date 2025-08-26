@extends('layouts.app')
@section('title', 'Welcome Page')
@section('content')
<div class="container">
    <h1>Welcome to My App</h1>
    <a href="{{ route('products.index') }}">index</a>
</div>
@endsection
