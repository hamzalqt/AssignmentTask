<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    @include('Pages.extras.style')
</head>
<body  class="horizontal-layout horizontal-menu content-left-sidebar navbar-floating footer-static" data-open="hover" data-menu="horizontal-menu" data-col="content-left-sidebar">
    {{-- <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button>Logout</button>
    </form> --}}
@include('headers.navbar')




</body>
</html>
@include('Pages.extras.js')
