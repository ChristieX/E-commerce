
@extends('layouts.app') 

@section('content')

    <div class="row h-100 d-flex flex-column justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="card shadow-lg rounded-3">
                <div class="card-header text-center bg-dark text-white">
                    <h4>Admin Login</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input id="username" type="text"
                                   class="form-control @error('username') is-invalid @enderror"
                                   name="username" value="{{ old('username') }}" required autofocus>

                            @error('username')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" required>

                            @error('password')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <span class="mb-3 d-block">
                            <a href="">Forgot Password?</a>
                        </span>
                        <x-alert type="error" message="{{ session('error') }}" />
                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

