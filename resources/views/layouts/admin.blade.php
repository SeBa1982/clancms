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
        <nav class="navbars navbar-expand d-flex flex-column align-item-start bg-dark" id="sidebar">
            <ul class="navbar-nav d-flex flex-column w-100">
                <li class="nav-item w-100">
                    <a href="{{ route('dashboard') }}" class="navs-link text-light pl-4">Dashboard</a>
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
