<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="{{ url('/') }}"><i class="fab fa-line"></i> {{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="navbarNavDropdown" class="navbar-collapse collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ url('/lang',app()->getLocale() ) }}" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (app()->getLocale() === 'pl')
                                <span class="flag-icon flag-icon-pl"></span>
                            @else
                                <span class="flag-icon flag-icon-gb"></span>
                            @endif
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <a class="dropdown-item" href="{{ url('/lang/pl') }}">PL</a>
                            <a class="dropdown-item" href="{{ url('/lang/en') }}">EN</a>
                        </div>
                    </li>
                </ul>
                
                @auth 
                <ul class="navbar-nav mr-auto">
                    @if (Auth::user()->is_admin)
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin','tickets') }}">{{ __('tickets.tickets') }}</a></li>
                    @else
                    <li class="nav-item"><a class="nav-link" href="{{ url('my_tickets') }}">{{ __('tickets.my_tickets') }}</a></li>
                    @endif
                </ul>
                @endauth
                
                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('users.login') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('users.create_account') }}</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user-circle"></i> {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="fas fa-power-off"></i> {{ __('users.logout') }}
                                </a>
                                <div class="dropdown-item">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
            
        </nav>        
        
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 my-4">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
