<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
        integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'My App')</title>
</head>

<body>
    <div class="container-fluid vh-100 ">
        {{-- navbar --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-light row">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    <div class="dropdown ms-lg-3">
                        <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#"
                            id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="bg-secondary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center"
                                style="width:36px;height:36px;">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <ul class="list-unstyled">
                                <li><b>{{ Auth::guard('admin')->user()->username ?? 'Admin' }}</b></li>
                                <li>{{ Auth::guard('admin')->user()->email ?? 'Admin' }}</li>
                            </ul>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="">Profile</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </nav>
        <div class="row h-100">
            <div class="col-md-2 ps-0 h-100 bg-light border-end">
                <ul class="list-group ms-2">
                    <li class="list-group-item my-1"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="list-group-item my-1"><a href="#">Categories</a></li>
                    <li class="list-group-item my-1"><a href="#">Products</a></li>
                    <li class="list-group-item my-1"><a href="#">Orders</a></li>
                    <li class="list-group-item my-1"><a href="#">Users</a></li>
                    <li class="list-group-item my-1"><a href="#">Settings</a></li>
                </ul>
            </div>
            <div class="col-md-10">
                @yield('content')
            </div>
        </div>

    </div>

</body>

</html>
