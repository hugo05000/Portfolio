<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="@yield('meta_description', 'Portfolio de Hugo Marceau, responsable applicatif du SI Retraite à la CPRPF, basé à Aix-en-Provence et mobile sur la région de Marseille.')">
        <title>@yield('title')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>
    <body>

        <header>
            @include('layout.navbar')

            @yield('header')
        </header>

        <div class="container pt-3">
            @yield('contenu')
        </div>

        <footer>
            @include('layout.footer')
        </footer>
    </body>
</html>
