<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GonnaSolve') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/gonna-solve.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-danger">
            <a class="navbar-brand d-none d-sm-block d-md-none" href="{{ url('/') }}">{{ config('app.name', 'GonnaSolve') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-md-center" id="navbarCollapse">
                <a class="navbar-brand d-sm-none d-md-block" href="{{ url('/') }}">
                    {{ config('app.name', 'GonnaSolve') }}
                </a>
                <ul class="navbar-nav mr-4">
                    <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Answers</a>
                    </li>
                </ul>
                <form class="form-inline mt-2 mt-md-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </form>
                <div class="navbar-nav ml-md-3">
                    @if (Route::has('login'))
                        @guest
                            <li class="nav-item {{ (request()->is('login')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item {{ (request()->is('register')) ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @auth
                                        <a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a>
                                    @endauth
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
                    @endif
                </div>
            </div>
        </nav>
        <div id="modal">
            <div id="pageModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="pageModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content" id="pageModalContent">
                        <div class="modal-header">
                            <h5 class="modal-title">@yield('modal-title')</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="@yield('modal-action')" method="POST" class="form">
                            @csrf
                            <div class="modal-body">
                                @yield('modal-content')
                            </div>
                            <div class="modal-footer">
                                @yield('modal-footer')
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <main class="py-4 container">
            @yield('content')
        </main>
    </div>
</body>
</html>

<script>
    @yield('scripts')
</script>
