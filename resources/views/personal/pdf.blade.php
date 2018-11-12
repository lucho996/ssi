<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <title>Document</title>
</head>
<body>
    <div style="width: 1100px; margin:0px auto;">
    <div class="panel panel-success" style="margin-top:20px;">
          <div class="panel-heading">
          <h4>Datos de Sr/a {{$personal->NOMBREP}} {{$personal->APELLIDOP}}</h4>
          </div>

          <div class="panel-body">
                <table class="table table-bordered">
                <tr>
                    <td><strong>Rut:</strong> </td>
                    <td>{{$personal->RUTP}}</td>
                    <td><strong>Ciudad:</strong> </td>
                    <td>{{$personal->CIUDAD}}</td>
                </tr>
                <tr>
                    <td><strong>Nombre:</strong> </td>
                    <td>{{$personal->NOMBREP}}</td>
                    <td><strong>Dirección:</strong> </td>
                    <td>{{$personal->DIRECCION}}</td>
                </tr>
                <tr>
                    <td><strong>Apellido:</strong> </td>
                    <td>{{$personal->APELLIDOP}}</td>
                    <td><strong>Estado Civil:</strong> </td>
                    <td>{{$personal->ESTADO_CIVIL}}</td>
                </tr>
                <tr>
                    <td><strong>Fecha de Nacimiento:</strong> </td>
                    <td>{{$personal->FECHANACIMIENTO}}</td>
                    <td><strong>Titulo:</strong> </td>
                    <td>{{$personal->TITULO}}</td>
                </tr>
                <tr>
                    <td><strong>Telefono:</strong> </td>
                    <td>{{$personal->TELEFONOP}}</td>
                    <td><strong>Nombre Cónyuge:</strong> </td>
                    <td>{{$personal->NOMBRE_CONYUGE}}</td>
                </tr>
                <tr>
                    <td><strong>Correo:</strong> </td>
                    <td>{{$personal->CORREOP}}</td>
                    <td><strong>Telefono Cónyuge:</strong> </td>
                    <td>{{$personal->TELEFONO_CONYUGE}}</td>
                </tr>
                


            <tr>
                <td><strong>Lugar de trabajo:</strong> </td>
                <td>{{$personal->LUGAR_TRABAJO}}</td>
                <td><strong>Gratificación:</strong> </td>
                <td>{{$personal->GRATIFICACION}}</td>
            </tr>
            <tr>
                <td><strong>AFP:</strong> </td>
                <td>{{$personal->AFP}}</td>
                <td><strong>Movilización:</strong> </td>
                <td>{{$personal->MOVILIZACION}}</td>
            </tr>
            <tr>
                <td><strong>Previsión:</strong> </td>
                <td>{{$personal->PREVISION}}</td>
                <td><strong>Colación:</strong> </td>
                <td>{{$personal->COLACION}}</td>
            </tr>
            <tr>
                <td><strong>Sueldo Base:</strong> </td>
                <td>{{$personal->SUELDO_BASE}}</td>
                <td><strong>Inicio Contrato:</strong> </td>
                <td>{{$personal->FECHA_INICIO_CONTRATO}}</td>
            </tr>
            <tr>
                <td><strong>Talla de ropa:</strong> </td>
                <td>{{$personal->TALLA_ROPA}}</td>
                <td><strong>Termino Contrato:</strong> </td>
                <td>{{$personal->FECHA_INICIO_CONTRATO}}</td>
            </tr>
            <tr>
                <td><strong>Numero de Zapatos:</strong> </td>
                <td>{{$personal->NZAPATO}}</td>

            </tr>						
                
                </table>
          </div>
    </div>
    </div>
    
</body>
</html>