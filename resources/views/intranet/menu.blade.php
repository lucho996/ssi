<!DOCTYPE html>
<html>
<head>
	<title>menu</title>



<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<style type="text/css">


  nav.sidebar, .main{
    -webkit-transition: margin 200ms ease-out;
      -moz-transition: margin 200ms ease-out;
      -o-transition: margin 200ms ease-out;
      transition: margin 200ms ease-out;
  }

  .main{
    
    padding: 10px 10px 0 10px;
  }

 
   




  nav.sidebar .navbar-nav .open .dropdown-menu>li>a:hover, nav.sidebar .navbar-nav .open .dropdown-menu>li>a:focus {
    color: #CCC;
    background-color: transparent;
  }

  nav:hover .forAnimate{
    opacity: 1;
  }
  section{
    padding-left: 15px;
  }
</style>
</head>


<body>
<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
    </div>
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav" style="display: inline; ">
        <li ><a href="/intranet/index">Home</a></li>
        
        @can('iva')
        <li><a href="/iva">IVA </a></li>
        @endcan        
        @can('user')
        <li>
            <a href="#" data-toggle="dropdown">Gestion Usuarios <span class="caret"></span></a>
            <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="/users">Usuarios</a></li>
            <li><a href="/roles">Roles</a></li>
            </ul>
        </li>
        @endcan
        @can('personal')
        <li><a href="/personal">Personal  </a></li>
        @endcan
        @can('clientes')
        <li><a href="/clientes">Clientes   </a></li>
        @endcan
        @can('inventario')
        <li><a href="/inventario">Inventario</a></li>
        @endcan

        @can('proveedor')
        <li><a href="/proveedor">Proveedor </a></li>
        @endcan
        @can('cotizacion')
        <li>
        <a href="#" data-toggle="dropdown">Cotización<span class="caret"></span> </a>
        <ul class="dropdown-menu forAnimate" role="menu">
        <li><a href="/cotizacion">Solicitud Cotizacion</a></li>
        </ul>
        </li>
        @endcan
        @can('convenio')
        <li>
        <a href="#" data-toggle="dropdown">Convenios  <span class="caret"></span></a>
        <ul class="dropdown-menu forAnimate" role="menu">
        <li><a href="/convenio">Registrar Convenios</a></li>
        </ul>
        </li>
        @endcan
    
    </ul>
    </div>
  </div>
</nav>
</body>
<script type="text/javascript" src="{{ URL::asset('https://code.jquery.com/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript"src="{{ URL::asset('js/datatable.js')}}"></script>
<script type="text/javascript"src="{{ URL::asset('js/funcioontable.js')}}"></script>


<script type="text/javascript" src="{{ URL::asset('js/bootstrapjs.js') }}"></script>

</html>







<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/estilos2.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    
    <title></title>
</head>

<body style="background:#EEECEC;">
    
        <div class="contenedor_menu">
        
                <a href="#" class="btn_menu">Menu</a>
                <ul class="menu">
                    <li><a href="/intranet/index">Inicio</a></li>
                    @can('iva')
                    <li><a href="/iva">IVA</a></li>
                    @endcan
                    <li><a href="#">Gestion Usuarios</a>
                    <ul>
                    @can('users')
                    <li><a href="/users">Usuarios</a></li>
                    @endcan
                    @can('roles')
                    <li><a href="/roles">Roles</a></li>
                    @endcan
                    </ul>
                    </li>
                    @can('personal')
                    <li><a href="/personal">Personal</a></li>
                    @endcan
                    @can('clientes')
                    <li><a href="/clientes">Clientes</a></li>
                    @endcan
                    @can('inventario')
                    <li><a href="/inventario">Inventario</a></li>
                    @endcan

                    @can('proveedor')
                    <li><a href="/proveedor">Proveedor</a></li>
                    @endcan
                    @can('cotizacion')
                    <li><a href="#">Cotizacion</a>
                    <ul>
                        <li><a href="/cotizacion">Solicitud Cotizaciòn</a></li>
                    </ul>
                    </li>
                    @endcan
                    @can('cotizacion')
                    <li><a href="#">Convenio</a>
                    <ul>
                        
                        <li><a href="/convenio">Ingresar Convenio </a></li>
                    </ul>
                    </li>
                    @endcan
                </ul>
            </div>
            <script type="text/javascript" src="{{ URL::asset('https://code.jquery.com/jquery-3.3.1.min.js') }}"></script>
            <script type="text/javascript"src="{{ URL::asset('js/datatable.js')}}"></script>
            <script type="text/javascript"src="{{ URL::asset('js/funcioontable.js')}}"></script>
            <script type="text/javascript" src="{{ URL::asset('js/jquery2.js') }}"></script>
</body>
</html>-->