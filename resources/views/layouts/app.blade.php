@extends('layouts.master')

@section('body')
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-danger shadow">
            <div class="container">
                <a class="navbar-brand d-none d-sm-block d-md-none" href="{{ url('/') }}">{{ config('app.name', 'GonnaSolve') }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <a class="navbar-brand d-sm-none d-md-block" href="{{ url('/') }}">
                        {{ config('app.name', 'GonnaSolve') }}
                    </a>
                    <ul class="navbar-nav mr-auto">
                        @auth
                            <li class="nav-item {{ (request()->is('home')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }} <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item {{ (request()->is('answer/show_all')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('answer.show_all') }}">{{ __('Answers') }}</a>
                            </li>
                        @endauth
                    </ul>
                    <div class="d-md-flex">
                        @auth
                            <form id="formSearch" class="form-inline mt-2 mt-md-0" action="{{ route('search') }}" method="GET">
                                <input id="inputSearch" name="search" class="form-control form-control-sm input-rounded mr-sm-3 border-0 shadow" type="text" placeholder="Search" aria-label="Search">
                            </form>
                        @endauth
                        <div class="navbar-nav ml-md-3">
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
                                        <a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a>
                                        
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
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div id="modal">
            <div id="pageModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="pageModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content border-0" id="pageModalContent">
                        <div class="modal-header bg-danger text-light border-0">
                            <h5 class="modal-title">@yield('modal-title')</h5>
                            <button type="button" class="close bg-danger" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="text-light">&times;</span>
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
@endsection

@section('script')
    @yield('scripts')
    $('input#inputSearch').keypress((event) => {
        if(event.which == 13) {
            $('form#formSearch').submit();
            return false;
        }
    })
@endsection
