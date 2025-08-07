<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Minha Aplicação</title>
    </head>
<body>

    @include('layouts.partials.header')

    <main>
        @yield('content')
    </main>

    @include('layouts.partials.footer')

    </body>
</html>