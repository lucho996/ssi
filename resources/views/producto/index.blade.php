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
	<div style="width:100%; max-width: 1100px; margin:0px auto;">
		@include('intranet.menu')
		
    <div style="width:100%; max-width: 1100px; float: right; position:relative;"> 

        
          <div class="panel panel-success" style="margin-top:20px;">
                <div class="panel-heading">
                    <h4>Lista de Productos</h4>
                </div>
     
                <div class="panel-body">
                    	<div class="table-responsive">	
                  <table class="table" id="example">
                      <thead>
                          <tr>
                              
            
                              <th>Cod Sap</th>
 
                           
                              
                            <th>Unidad</th>
                            <th>Cantidad</th>
                            <th>Descripción</th>
                            <th>Tipo</th>
                 
                            <th>Fecha de entrega</th>
                            <th>Estado</th>
                            <th>Acciones</th>

                          </tr>
                      </thead>
                      <tbody>
                          @foreach($producto as $producto)
                              <tr>
                                 @if($producto->CODIGO_SAP != null)
                                <td>{{ $producto->CODIGO_SAP }}</td>
                                @else 
                                <td><EM>Sin Codigo</EM></td>
                                @endif
                                <td>{{ $producto->UNIDAD }}</td>
                                <td>{{ $producto->CANTIDAD }}</td>
                                <td>{{ $producto->DESCRIPCION }}</td>
                                <td>{{ $producto->TIPO_PRODUCTO }}</td>
  
                                
                                <td>{{ $producto->FECHA_DE_ENTREGA_PRODUCTO }}</td>
                                <td>{{ $producto->ESTADO }}</td>
                                  
                                  <td>
                                        {!! Form::open(['route' =>['producto.destroy', $producto->ID_PRODUCTO],
                                        'method'=>'DELETE', 'onsubmit' => 'return confirm("¿Estas Seguro si desea ELIMINAR?")'])!!}
                                      <input type="hidden" name="idcoti" value=" {{$coti->ID_COTIZACION}}">
                                     @can('producto.show')
                                      <a href="/producto/show/{{ $producto->ID_PRODUCTO }}"><img src="/images/png/ver.png" alt="" style="width:20px;"></a>
                                      @endcan
                                     
                                      @can('producto.edit')
                                      <a href="/producto/edit/{{ $producto->ID_PRODUCTO }}"><img src="/images/png/editar.png" alt="" style="width:20px;"></a>   
                                      @endcan
                                      @if($producto->ESTADO != "COTIZADO")
                                      @can('producto.create')
                                      <a href="/producto/create/{{ $producto->ID_PRODUCTO }}"><img src="/images/png/cotizar.png" alt="" style="width:20px;"></a>   
                                      @endcan
                                      @endif
                                      @can('producto.destroy_pro')
                                      <button>
                                       <img src="/images/png/borrar.png" style="width:20px;" alt="">
                                     </button>
                                     @endcan
                                     @can('producto.destroy_pro')
                                     <a href="/producto/ot_seg/{{$producto->ID_PRODUCTO}}"><img src="/images/png/ot.png" style="width:20px;" alt=""></a>
                                     @endcan
                                     <a href="/producto/PDFinterna/{{ $producto->ID_PRODUCTO }}"><img src="/images/png/pdf.png" style="width:20px;" alt=""></a>
                                     
                                     {!!Form::close()!!}
                                      
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
                    	</div>
                </div>
            </div>


            <form  action="{{ action('ProductoController@store_pro_coti')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
       
                        <input type="hidden" name="ID_COTI" value="{{$producto->ID_COTIZACION}}">     
                       
                           <br><div class="panel panel-success" style="width:100%;"> 
                                   <div class="panel-heading">
                                   <h4>Agregar Nuevo Producto</h4>
                                       </div>
                                   <div class="panel-body">
                                               
                                   <div class="form-group">
                                        <div class="table-responsive">	
                                       <table class="table">
                                                               <thead>
                                                                    <th>Cod Sap</th>
                                                                    <th>Unidad</th>
                                                                    <th>Cantidad</th>
                                                                    <th>Descripción</th>
                                                                    <th>Tipo</th>
                                                                    <th>Plano</th>
                                                                    <th>Fecha Entrega</th>
                                                                       <!--<input type="button" value="Agregar" class="addRow"/>-->
                                                                   
                                                               </thead>
                                                               <tbody>
                                                                   <tr>
                                                                        <td><input type="text" name="codsap" style="width: 70px;" class="form-control codsap" onkeypress="return validaNumericos(event)" maxlength="11"></td>
                                                                        <td><input type="text" name="unidad" style="width: 50px;" class="form-control unidad" onkeypress="return validar(event)" maxlength="30" required></td>
                                                                        <td><input type="text" name="cantidad" class="form-control cantidad"  onkeypress="return validaNumericos(event)" maxlength="11" required></td>
                                                                        <td><input type="text" name="descripcion"  class="form-control descripcion" maxlength="50"  required>
                                                                        </td>
                                                                        <td><select name="tipo" style="width:100px ;height:35px; "class="form-control tipo">
                                                                                <option>Normal</option>
                                                                                <option>Emergencia</option>	
                                                                        </select></td>
                                                                        <td><input type="file"  name="plano" id="plano" style="width: 140px;" accept="application/pdf"  class="plano">		
                                                                        </td>
                                                                        <td><input type="date"max="2099-01-01" name="fecha_entrega" style="width: 160px;"   class="form-control fecha_entrega" required></td>
                                                                   </tr>
               
                                                               </tbody>
        
                                                           </table>
                                        </div>
                                                       </div>
                                                   
                                               
                                           
                                                       <p>
                                                               <input type="submit" value="Guardar" class="btn btn-success">
                                                           </p>
               
                                           </div>
                                       
                               
                               
                                   
                    
           
                       </div>
                   </form>

    </div>
	</div>
    
</body>
</html>