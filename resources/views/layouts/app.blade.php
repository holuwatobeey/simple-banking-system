<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!---->
    <link href="{{{ asset('img/bank-512.png') }}}" rel="shortcut icon">

    <title>{{ config('app.name', 'YingBanking') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Styles -->
        <style>
            .carousel-caption {
            position: absolute;
            top:30%;
            }
        </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">

                <img style = "float:left;" class = "img img-responsive" width = "6%" alt="logo" src="{{ asset('img/bank-512.png') }}"/>
                <a class="navbar-brand" style="padding-top:2%;" href="{{ url('/') }}">
                    {{ config('app.name', 'YingBanking') }}
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
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('transfer') }}">{{ __('Transfer') }}</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('pay') }}">{{ __('Bill Pay') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('loans') }}">{{ __('Apply For Loan') }}</a>
                            </li>
                            <li class="nav-item">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->firstname }}
                            </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <main class="py-4">
            @yield('content')
        </main>
        {{-- <footer style="margin-top:-25px;" class="navbar navbar-expand-md navbar-light navbar-laravel">
                <p class="mr-auto">© Copyright 2018 Ying Banking</p>
                <p  class="ml-auto"><a href="#">Terms and conditions &nbsp;</a>|<a href="#">&nbsp; Policy</a></p>
        </footer>     --}}
    </div>
    
</body>
</html>
