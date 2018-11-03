
<!DOCTYPE html>
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
                    <li><a href="/personal">Personal</a></li>
                    <li><a href="/clientes">Clientes</a></li>
                    <li><a href="/inventario">Inventario</a></li>
                    <li><a href="/proveedor">Proveedor</a></li>
                    <li><a href="#">Cotizacion</a>
                    <ul>
                        <li><a href="/cotizacion">Solicitud Cotizaciòn</a></li>
                        <li><a href="/equipos_internos">Equipos</a></li>
                        
                    </ul>
                    </li>
                </ul>
            </div>
            <script type="text/javascript" src="{{ URL::asset('https://code.jquery.com/jquery-3.3.1.min.js') }}"></script>
            <script src="js/datatable.js"></script>
<script src="js/funcioontable.js"></script>
            <script type="text/javascript" src="{{ URL::asset('js/jquery2.js') }}"></script>
</body>
</html>