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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">{{ config('app.name', 'Clan CMS') }}</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                  </li>
                </ul>
                <ul class="navbar-nav mr-auto">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
                @else
                <li class="nav-item dropdown dropstart">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-dark" aria-labelledby="navbarDropdown">
                        @can('manage-users')
                            <a href="{{ route('dashboard') }}" class="dropdown-item">Admin - Dashboard</a>
                        @endcan
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
                </ul>
              </div>
            </div>
        </nav>
        <nav class="navbars navbar-expand d-flex flex-column align-item-start bg-dark" id="sidebar">
            <ul class="navbar-nav d-flex flex-column w-100">
                <li class="nav-item w-100">
                    <a href="#" class="navs-link text-light pl-4">Dashboard</a>
                </li>
                <li class="nav-item dropdown w-100">
                    <a href="#" class="navs-link text-light pl-4 dropdown-toggle" id="usersDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Users</a>
                    <ul class="dropdown-menu w-100 dropdown-menu-dark" aria-labelledby="usersDropdown">
                        <li><a href="{{ route('users.index') }}" class="dropdown-item text-light pl-4 p-2">User Liste</a></li>
                    </ul>
                </li>
                <li class="nav-item w-100">
                    <a href="#" class="navs-link text-light pl-4 dropdown-toggle" id="postsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Posts</a>
                    <ul class="dropdown-menu w-100 dropdown-menu-dark" aria-labelledby="postsDropdown">
                        <li><a href="{{ route('posts.index') }}" class="dropdown-item text-light pl-4 p-2">Beiträge</a></li>
                        <li><a href="{{ route('categories.index') }}" class="dropdown-item text-light pl-4 p-2">Kategorien</a></li>
                        <li><a href="{{ route('trashedposts') }}" class="dropdown-item text-light pl-4 p-2">Papierkorb</a></li>
                    </ul>
                </li>
                <li class="nav-item w-100">
                    <a href="#" class="navs-link text-light pl-4">Gästebuch</a>
                </li>
            </ul>
            </nav>
            <div class="container my-content">
            <button class="btn btn-info my-4" id="menu-btn">Sidebar</button>
                @include('partials.alerts')
                @yield('content')
            </div>
            <script>
                var menu_btn = document.querySelector('#menu-btn')
                var sidebar = document.querySelector('#sidebar')
                var my_content = document.querySelector('.my-content')

                menu_btn.addEventListener("click", () => {
                    sidebar.classList.toggle("active-nav")
                    my_content.classList.toggle("active-cont")
                })
            </script>
            <style>
                .navbars {
                    width: 250px;
                    height: 100vh;
                    position: fixed;
                    margin-left: 0px;
                    transition: all 0.4s;
                }

                .navs-link {
                    font-size: 1.25em;
                }
                .my-content {
                    margin-left: 250px;
                    transition: all 0.4s;
                }

                .active-nav {
                    margin-left: -300px;
                }

                .active-cont {
                    margin-left: 0px;
                }


            </style>
    </div>
</body>
</html>
