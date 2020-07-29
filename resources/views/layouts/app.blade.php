<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="uk-background-primary uk-light">
        <nav class="uk-navbar-container uk-navbar-transparent">
            <div class="uk-container">
                <div class="uk-navbar" data-uk-navbar>
                    <div class="uk-navbar-left">
                        <a class="uk-navbar-item uk-logo" href="/">{{ config('app.name', 'Laravel') }}</a>

                    </div>

                </div>
            </div>
        </nav>
    </div>

    <main class="uk-container uk-margin-top">
        @yield('content')
    </main>


</div>
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
