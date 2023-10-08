<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blade névtelen komponensek bemutatása Tailwind CSS keretrendszerrel kiegészítve</title>
    {{-- @vite('resources/sass/main.scss', 'resources/css/app.css') --}}
    @vite('resources/sass/main.scss', 'resources/css/app.css')
</head>
<body class="is-preload">
    {{-- {{ $slot }} --}}

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        @include('includes._header')

        <!-- Menu -->
        @include('includes._menu')

        <!-- Main -->
        <div id="main">
            @yield('main')
        </div>

        <!-- Sidebar -->
        @include('includes._sidebar')

    </div>

    <!-- Scripts -->
    @include('includes._scripts')

</body>
</html>
