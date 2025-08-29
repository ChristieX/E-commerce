@extends('layouts.app')

@section('content')

    <div class="row h-100 d-flex flex-column justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="card shadow-lg rounded-3">
                <div class="card-header text-center bg-dark text-white">
                    <h4>Forgot Password</h4>
                    <span>Please enter your email address to receive a password reset link</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autofocus>

                            @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success small">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark">
                                Send Reset Link
                            </button>
                        </div>
                        <span class="d-block text-center mt-3">
                            <span>Back to</span>
                            <a href="{{ route('admin.login') }}">Login</a>
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

