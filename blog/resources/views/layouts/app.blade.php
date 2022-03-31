<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="Shortcut Icon" href="{{ asset('img/2019icon-57x57.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backstage.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand text-light font-weight-bold" href="{{ url('/home') }}">
                    戀戀臺北城官網後台管理系統
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link text-light font-weight-bold " href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <!-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-light font-weight-bold" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif -->
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-light font-weight-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                               
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    登出
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        @auth
        <div class="d-flex">
            @include('layouts.sidebar')
            <main class="p-4 w-100" style="height:calc(100vh - 55px);max-height:calc(100vh - 55px);overflow: auto;">
                @yield('content')
            </main>
        </div>
        @else
        <main class="py-4" style="height:calc(100vh - 55px);max-height:calc(100vh - 55px);">
            @yield('content')
        </main>
        @endauth


    </div>

    @section('javascript')
    <script src="{{ URL::asset('js/jquery-1.11.2.min.js') }}"></script>
    <script>
        <?php
        include app_path() . '/Functions/color.php';
        $color = new Color();
        ?>
        $(document).ready(function() {
            $('.footer-color').css('color', '<?php echo $color->footer(); ?>');
            $('.footer-color').hover(function() {
                    $(this).css('color', '<?php echo $color->footerHover(); ?>');
                },
                function() {
                    $(this).css('color', '<?php echo $color->footer(); ?>');

                });
            $('.submenu-color').css('color', '<?php echo $color->navbar(); ?>');
            $('.submenu-color').hover(function() {
                    $(this).css('color', '<?php echo $color->navbarHover(); ?>');
                },
                function() {
                    $(this).css('color', '<?php echo $color->navbar(); ?>');

                });

            $('.a-color').css('color', '<?php echo $color->a(); ?>');
            $('.a-color').hover(function() {
                    $(this).css('color', '<?php echo $color->aHover(); ?>');
                },
                function() {
                    $(this).css('color', '<?php echo $color->a(); ?>');

                });
        });
    </script>

    @show
</body>

</html>