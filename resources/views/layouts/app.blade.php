<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Loggin</title>
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

        <nav class="navbar navbar-laravel" style="width:1100px; margin: 0px auto;">
            <div class="container">
                    <ul class="navbar-nav ml-auto">
                        @guest

                        @else
                       
                            <li>
                                    <label for="">
                                        {{Auth::user()->name}}
                                    </label> 
                                    <a style="text-decoration: none;" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{('Cerrar Sesion') }}
                                    </a>
                            </li>
                        @endguest
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                    </form>   
            </div>
        </nav>

        <body>
            @yield('content')
            @yield('contentt')
        </body>
 
</body>

</html>
