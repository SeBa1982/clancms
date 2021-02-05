<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Clan CMS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('partials.navigation')
        <main>
            <div class="container">
                <div class="row mt-2">
                    <div class="col-md-8">
                        @yield('content')
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-dark mb-3">
                            <div class="card-header">Kategorien</div>
                            <div class="card-body">
                              <p class="card-text">Hier sollen später die verlinkte Kategorien angzeigt werden</p>
                            </div>
                          </div>
                          <div class="card text-white bg-dark mb-3">
                            <div class="card-header">Schlagwörter</div>
                            <div class="card-body">
                              <p class="card-text">Verlinkte Schlagwörter</p>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
