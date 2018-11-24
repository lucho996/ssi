@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personal</title>
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
                    <h4>Lista de Cotizaciones</h4>
                </div>
      
                <div class="panel-body">
                
                        <table class="table" id="example">
                                <thead>
                                    <tr>
                                        
                      
                                        <th>Cod Sap</th>
                                        <th>Descripción</th>
                                     
                                        
                                      <th>Unidad</th>
                                      <th>Cantidad</th>
                                     
                                      
                           
                                      
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
                                          <td>{{ $producto->DESCRIPCION }}</td>
                                        
                                          <td>{{ $producto->UNIDAD }}</td>
                                          <td>{{ $producto->CANTIDAD }}</td>
                                           
            
                                          
                                          
                                          <td>{{ $producto->ESTADO }}</td>
                                            
                                            <td>
                                                  {!! Form::open(['route' =>['producto.destroy', $producto->ID_PRODUCTO],
                                                  'method'=>'DELETE', 'onsubmit' => 'return confirm("¿Estas Seguro si desea ELIMINAR?")'])!!}
                                                <input type="hidden" name="idcoti" value=" ">
                                               @can('producto.show')
                                                <a href="/producto/show/{{ $producto->ID_PRODUCTO }}"><img src="/images/png/ver.png" alt="" style="width:20px;"></a>
                                                @endcan
                                               
                                                @can('producto.edit')
                                                <a href="/producto/edit/{{ $producto->ID_PRODUCTO }}"><img src="/images/png/editar.png" alt="" style="width:20px;"></a>   
                                                @endcan
                                                @if($producto->ESTADO != "COTIZADO")
                                                @can('convenio.cotizarconvenio2')
                                                <a href="/convenio/cotizarconvenio2/{{ $producto->ID_PRODUCTO }}"><img src="/images/png/cotizar.png" alt="" style="width:20px;"></a>   
                                                @endcan
                                                @endif
                                                @can('producto.destroy_pro')
                                                <button>
                                                 <img src="/images/png/borrar.png" style="width:20px;" alt="">
                                               </button>
                                               @endcan
                                               
                                               {!!Form::close()!!}
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                </div>
            </div>
        <form  action="{{ action('ProductoController@store_pro')}}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}

                            <input type="hidden" name="id_convenio" value="{{$producto->ID_CONVENIO}}">     
                
                    <br><div class="panel panel-success" style="width:100%;"> 
                            <div class="panel-heading">
                            <h4>Agregar Nuevo Producto</h4>
                                </div>
                            <div class="panel-body">
                                        
                            <div class="form-group">
                                    <table class="table">
                                            <thead>
                                                    <th>Cod Sap</th>
                                                    <th>Descripción</th>
                                                    <th>Unidad</th>
                                                    <th>Cantidad</th>
                                                    
                                                  
                                                    <th>Plano</th>
                                                 
                                                    
                                                
                                                
                                                    
                                                    <!--<input type="button" value="Agregar" class="addRow"/>-->
                                                
                                            </thead>
                                            <tbody>
                                                <tr>
                                                        <td><input type="text" name="codsap" style="width: 70px;" class="form-control codsap" onkeypress="return validaNumericos(event)" maxlength="11"required></td>
                                                        <td><input type="text" name="descripcion"  class="form-control descripcion" maxlength="50"  required>
                                                        </td>
                                                        <td><input type="text" name="unidad" style="width: 50px;" class="form-control unidad" onkeypress="return validar(event)" maxlength="30" required></td>
                                                        <td><input type="text" name="cantidad" class="form-control cantidad"  onkeypress="return validaNumericos(event)" maxlength="11" required></td>
                                                    
                                                        
                                                        
                                                        
                                                        
                                                    
                                                    <td>	
                                                        <input type="file"  name="plano" id="plano" style="width: 140px;" accept="application/pdf"  class="plano">		
                                                    </td>
                                                    
                                                 
                                                </tr>
                                            </tbody>
                                            
                                        </table>
                                                </div>
                                            
                                        
                                    
                                                <p>
                                                        <input type="submit" value="Guardar" class="btn btn-success">
                                                    </p>
        
                                    </div>
                                
                        
                        
                            
             
    
                </div>
            </form>
            </div>	
        </div>
    </div>
    
</body>
<script type="text/javascript" src="{{ URL::asset('js/solo_num.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/solo_letras.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/live.js') }}"></script>


<script type="text/javascript">
$('tbody').delegate('.cantidad,.precio_unitario','keyup', function(){
var tr =$(this).parent().parent();
var cantidad = tr.find('.cantidad').val();
var precio_unitario = tr.find('.precio_unitario').val();
var suma = (cantidad * precio_unitario);
tr.find('.total').val(suma);
total();
});
function total(){
	var total = 0;
	$('.total').each(function(i,e){
		var suma = $(this).val()-0;
		total += suma;
	})
	$('.total').html(total);
};
$('.addRow').on('click',function() {
	addRow();
});
</script>
</html>