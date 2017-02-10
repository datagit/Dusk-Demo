<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li><a href="#" data-toggle="modal" data-target="#modal-support">Support Email</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

<!-- Modal -->
<div class="modal fade" id="modal-support" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-b-none">
                <form class="form-horizontal" role="form">
                    <!-- From -->
                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="support-from" type="text" class="form-control" value="{{ auth()->user()->email }}" placeholder="Your Email Address">
                        </div>
                    </div>

                    <!-- Subject -->
                    <div class="form-group" :class="{'has-error': supportForm.errors.has('subject')}">
                        <div class="col-md-12">
                            <input id="support-subject" type="text" class="form-control" placeholder="Subject">
                        </div>
                    </div>

                    <!-- Message -->
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea class="form-control" rows="7" placeholder="Message"></textarea>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal Actions -->
            <div class="modal-footer border-none">
                <button type="button" class="btn btn-primary">
                    <i class="fa fa-btn fa-paper-plane"></i>Send
                </button>
            </div>
        </div>
    </div>
</div>
    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
