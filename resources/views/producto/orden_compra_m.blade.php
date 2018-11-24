@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Producto</title>
    <style>

		.badge {
			float: right;
		}
	</style>
</head>

<body >
	<div style="width: 1100px; margin:0px auto;">
		<div style="width: 200px; float:left;  position:relative;">
		@include('intranet.menu')
		</div>
    <div style="width: 850px; float: right; position:relative;"> 

        
          <div class="panel panel-success" style="margin-top:20px;">
                <div class="panel-heading">
                    <h4>Lista de Productos</h4>
                </div>
     
                <div class="panel-body">
                <form  action="{{ action('ProductoController@store_ocm')}}" method="post" enctype="multipart/form-data">
                 {{ csrf_field() }}
                  <table class="table" id="example">
                  <input type="hidden" name="id_producto" value="{{$ID_PRODUCTO}}">
                  <input type="hidden" name="rut" value="{{$RUT}}">
                      <thead>
                          <tr>
                            <th>Descripción</th>
                           
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Total</th>
                          
                            <th>Estado</th>
                          </tr>
                      </thead>
                      <tbody>
                         @foreach ($material as $material)
                              <tr>
                              <td>{{$material->DESCRIPCION}}</td>
                              <td>{{$material->CANTIDAD}}</td>
                              <td>${{$material->PRECIO_UNITARIO}}</td>
                              <td>${{$material->TOTAL}}</td>
                              <td>{{$material->ESTADO}}</td>
                              </tr>
                              @endforeach
                            
                      </tbody>
                  </table>
                 
                 
                  
                  <br>
                  @if($materiall == "ESPERA-OC")
 
                  <input type="text" style="width:300px ;" name="forma_pago" placeholder="Forma de Pago" required maxlength="50" class="form-control">
                  <br>
                  <input type="submit" value="Generar Orden de Compra" class="btn btn-success">
                                      
                  @endif

                </form>
                </div>
            </div>


           

    </div>
	</div>
    
</body>
</html>