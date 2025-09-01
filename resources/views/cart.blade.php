@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Cart</h2>
    @if ($cartItems->isEmpty())
        <div class="alert alert-info" role="alert">
            Your cart is empty.
        </div>
    @else

        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Product</th>
                    <th width="200">Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        
                        <td>
                            <!-- Input Group for + - buttons with quantity -->
                            <form action="" method="POST" class="d-flex justify-content-center">
                                @csrf
                                @method('PATCH')

                                <div class="input-group" style="max-width: 130px;">
                                    <!-- Decrease button -->
                                    <button type="submit" name="action" value="decrease" class="btn btn-outline-secondary">-</button>
                                    
                                    <!-- Quantity (readonly so it only shows current value) -->
                                    <input type="text" class="form-control text-center" value="{{ $item->quantity }}" readonly>
                                    
                                    <!-- Increase button -->
                                    <button type="submit" name="action" value="increase" class="btn btn-outline-secondary">+</button>
                                </div>
                            </form>
                        </td>

                        <td>₹{{ $item->product->price }}</td>
                        <td>₹{{ $item->product->price * $item->quantity }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-end"><strong>Total:</strong></td>
                    <td><strong>₹{{ $cartItems->sum(fn($item) => $item->product->price * $item->quantity) }}</strong></td>
            </tbody>
        </table>
    @endif
</div>
@endsection
