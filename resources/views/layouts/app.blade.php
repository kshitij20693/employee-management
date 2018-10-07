<!DOCTYPE html>
<!-- han abhi try karo to ek bar 
bootstrap.min.js:6 Uncaught Error: Bootstrap's JavaScript requires jQuery
    at bootstrap.min.js:6
(anonymous) @ bootstrap.min.js:6
bootstrap-datepicker.js:13 Uncaught ReferenceError: jQuery is not defined
    at bootstrap-datepicker.js:13
    at bootstrap-datepicker.js:15
(anonymous) @ bootstrap-datepicker.js:13
(anonymous) @ bootstrap-datepicker.js:15
create:141 Uncaught TypeError: $(...).datepicker is not a function
    at HTMLDocument.<anonymous> (create:141)
same issue
abhi kar ke dekho ek change kiya mene ok
browser dekhna ho to kya karu?
teamviewr ?
mujhe download karna padega
baki koi option ho to bolo me kar deta
skype ? me karta team viewer

create:155 Uncaught TypeError: $(...).datepicker is not a function
    at HTMLDocument.<anonymous> (create:155)
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Employee') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet">  
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                                 <a href="{{ route('employee.index') }}" class="nav-link">{{ __('Employee List') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('employee.create') }}" class="nav-link">{{ __('Add Employee') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('department.create') }}" class="nav-link">{{ __('Add Department') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('department.index') }}" class="nav-link">{{ __('All Department') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('employee/statistics') }}" class="nav-link">{{ __('All Statistics') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
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
    </div>
    
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">  
        document.addEventListener('DOMContentLoaded', function() {
            $('#datepicker').datepicker({  
                format: 'yyyy-mm-dd'  
             });  
        });
    </script> 
</body>
</html>
