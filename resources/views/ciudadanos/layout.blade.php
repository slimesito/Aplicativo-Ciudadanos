<!DOCTYPE html>
<html lang="en">
<head>

    <title>@yield('title') | {{ config('app.name') }}</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="{!! asset('assets/logo.png') !!}" rel="icon">

    <link rel="stylesheet" href="{!! asset('assets/css/edicion.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/registro.css') !!}">

    {{-- FONTSAWESOME --}}
    <link href="{!! asset('assets/fontawesome/css/fontawesome.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/fontawesome/css/brands.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/fontawesome/css/solid.css') !!}" rel="stylesheet">
    
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary" >
        <div class="logo">
            <a><img src="{!! asset('assets/membrete2.jpg') !!}" alt="membrete"></a>
        </div>  
    </nav>

    <section>    
        
        <div class="container-fluid page-body-wrapper" align="center">

            @include('layout.alerts.success-message')

            @include('layout.alerts.error-message')

            <br>

            @yield('content')

        </div>

    </section>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>