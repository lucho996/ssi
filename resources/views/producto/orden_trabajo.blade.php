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
	<div style="width:100%; max-width: 1100px; margin:0px auto;">
		@include('intranet.menu')
	
	<div style="width:100%; max-width: 1100px; float: right; position:relative;"> 

          <div class="panel panel-success" style="margin-top:20px;">
                <div class="panel-heading">
                    <h4>Lista de Cotizaciones</h4>
                </div>
      
                <div class="panel-body">
                        <div class="table-responsive">	
                  <table class="table" id="example">
                      <thead>
                          <tr>
                            <th>ID</th>
                            <th>Descripción</th>
                            <th>Plano</th>
                            <th>Precio Unitario</th>
                            <th>Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                          
                          
                              <tr>
                              
                                <td></td>
                                <td></td>
                              
     
                            </td>
                                <td></td>
                                <td></td>
                       
                                  
                                  <td>
             
                                      
                                    @can('producto.edit2')
                                    <a href="/producto/edit2/"><img src="/images/png/subir_pdf.png" alt="" style="width:30px;"></a>   
                                    @endcan
                                     @can('producto.destroy_pro')
                                     <button>
                                      <img src="/images/png/borrar.png" style="width:20px;" alt="">
                                    </button>
                                    @endcan
                                    @can('producto.orden_trabajo')
                                    <a href="/producto/orden_trabajo/"><img src="/images/png/ot.png" alt="" style="width:30px;"></a>   
                                    @endcan
                                    <input type="hidden" name="convenio" value="">
                                     
                                     
                                  </td>
                               
                              </tr>
                          
                      </tbody>
                  </table>
                </div>
                </div>
            </div>
        <form  action="{{ action('ProductoController@store_pro')}}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}

                       
                
                    <br><div class="panel panel-success" style="width:100%;"> 
                            <div class="panel-heading">
                            <h4>Agregar Nuevo Producto</h4>
                                </div>
                            <div class="panel-body">
                                        
                            <div class="form-group">
                                	<div class="table-responsive">	
                                <table class="table">
                                                        <thead>
                                                            
                                                                <th>Descripción</th>
                                                                <th>Plano</th>
                                                                <th>Precio Unitario</th>
                                                                <th>Cantidad</th>
                                                                <th>Total</th>
                                                                <!--<input type="button" value="Agregar" class="addRow"/>-->
                                                            
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><input type="text" name="descripcion"  placeholder="Descripción" class="form-control descripcion" maxlength="50"  required></td>
                                                                <td><input type="file" name="plano" accept="application/pdf" class="plano"></td>
                                                                <td><input type="text" name="precio_unitario"  placeholder="Precio unitario" class="form-control precio_unitario" maxlength="50"  required></td>
                                                                <td><input type="text" name="cantidad"  placeholder="Cantidad" class="form-control cantidad" maxlength="50"  required></td>
                                                                <td><input type="text" name="total"  placeholder="Total" class="form-control total" maxlength="50"  disabled  required></td>
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
    </div>
    
</body>
<script type="text/javascript" src="{{ URL::asset('js/solo_num.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/solo_letras.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/live.js') }}"></script>


</html>