<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ejemplo Blade</title>

       
    </head>
    <body>
        
        @include('pruebavista.header')

        @yield('content')

        @include('pruebavista.footer')
    </body>
</html>
