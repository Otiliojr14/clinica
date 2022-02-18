<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <title>@yield('title') - Clínica DAMR</title>
</head>
<body>
    <header class="header">
        <h4 class="header__title">Clínica DAMR</h4>
        <section class="option">
            <div class="option__header-box">
                <h5 class="option__header">Usuario: Nombre Apellido Apellido</h5>
            </div>            
            <div class="option__list">
                <a class="option__item" href="/">Cerrar sesión</a>
            </div>
        </section>
    </header>
    @yield('content')

    <script src="{{ asset('assets/js/sweetalert2.all.min.js')}}"></script>
    <script src="{{ asset('assets/js/selectors.js')}}"></script>

    @yield('footer')
</body>
</html>