<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'My App')</title>
</head>

<body class="vh-100">
  @if (!request()->is('account/login') && !request()->is('account/register'))
        @include('partials.navbar')
    @endif
    @yield('content')


</body>

</html>
