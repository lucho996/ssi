@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <title>IVA</title>
    <style>

		.badge {
			float: right;
		}
	</style>
</head>

<body>
        <div style="width: 1100px; margin:0px auto;">
                <div style="width: 200px; float:left; position:relative;">
                @include('intranet.menu')
                </div>    
                <div style="width: 850px; float: right; position:relative;">


          <div class="panel panel-success" style="margin-top:20px;">
                <div class="panel-heading">
                    <h4>Lista de Iva</h4>
                </div>
      
                <div class="panel-body">
                  <table class="table " id="example">
                      <thead>
                          <tr>
                              <th>IVA</th>
                              <th>Fecha</th>
                              <th>Estado</th>
                           
                          </tr>
                      </thead>
                      <tbody>
                            @foreach ($iva as $iva)
                              <tr>
                                 
                              <td>{{$iva->IVA}}</td>
                                  <td>{{$iva->FECHA}}</td>
                                  <td>{{$iva->ESTADO}}</td>
                              

      
                                 
                              </tr>
                              @endforeach
                      </tbody>
                  </table>
                </div>
            </div>

                

                <div class="panel panel-success" style="margin-top:20px;">
                        <div class="panel-heading">
                            <h4>Ingresar Nuevo Iva</h4>
                        </div>
              
                        <div class="panel-body">
                            <form  action="{{ action('IvaController@store')}}" method="post">
                                  {{ csrf_field() }}
                              <p>
                                  <input type="text" name="iva" placeholder="IVA" maxlength="2"  class="form-control" onkeypress='return validaNumericos(event)' required>
                              </p>
                              <p>
                                  <input type="submit" value="Guardar" class="btn btn-success">
                              </p>
                          </form>
                      </div>
                  </div>
                </div>
        </div>
</body>
</html>