<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <title>Darir Movie App</title>
</head>
<!-- Header -->
@include('pages.partials.header')
<!-- End Header -->
<!-- Content -->

<body class="font-sans bg-gray-900 text-white">
    <!-- Navbar -->
    @include('pages.partials.navbar')
    <!-- End Navbar -->
    <!-- Content -->
        @yield('content')
    <!-- End Content -->
    <!-- Scripts -->
    @include('pages.partials.scripts')
    <!-- End Scripts -->
</body>
<!-- End Content -->
<!-- Footer -->
@include('pages.partials.footer')
<!-- End Footer -->

</html>
