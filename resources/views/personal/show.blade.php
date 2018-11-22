@include('layouts.app')
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
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
				  <h4>Datos de Sr/a {{$personal->NOMBREP}} {{$personal->APELLIDOP}}</h4>
				  </div>
		
				  <div class="panel-body">
						<tr><div class="panel panel-default">
								<div class="panel-heading">
									<h5>Datos Personales</h5>
								</div></tr>
						<table class="table table-bordered" id="tablapersonal">
						<tr>
							<td style="text-align:right;"><strong>Rut:</strong> </td>
							<td>{{$personal->RUTP}}</td>
							<td style="text-align:right;"><strong>Ciudad:</strong> </td>
							<td>{{$personal->CIUDAD}}</td>
						</tr>
							<td style="text-align:right;"><strong>Nombre:</strong> </td>
							<td>{{$personal->NOMBREP}}</td>
							<td style="text-align:right;"><strong>Dirección:</strong> </td>
							<td>{{$personal->DIRECCION}}</td>
						</tr>
						<tr>
							<td style="text-align:right;"><strong>Apellido:</strong> </td>
							<td>{{$personal->APELLIDOP}}</td>
							<td style="text-align:right;"><strong>Estado Civil:</strong> </td>
							<td>{{$personal->ESTADO_CIVIL}}</td>
						</tr>
						<tr>
							<td style="text-align:right;"><strong>Fecha de Nacimiento:</strong> </td>
							<td>{{$personal->FECHANACIMIENTO}}</td>
							<td style="text-align:right;"><strong>Titulo:</strong> </td>
							<td>{{$personal->TITULO}}</td>
						</tr>
						<tr>
							<td style="text-align:right;"><strong>Telefono:</strong> </td>
							<td>{{$personal->TELEFONOP}}</td>
							<td style="text-align:right;"><strong>Persona Emergencia:</strong> </td>
							<td>{{$personal->NOMBRE_CONYUGE}}</td>
						</tr>
						<tr>
							<td style="text-align:right;"><strong>Correo:</strong> </td>
							<td>{{$personal->CORREOP}}</td>
							<td style="text-align:right;"><strong>Telefono Emergencia:</strong> </td>
							<td>{{$personal->TELEFONO_CONYUGE}}</td>
						</tr>
						
					
		
					</table>
		
					
				</div>
				<div class="panel panel-default">
						<div class="panel-heading">
							<h5>Carga Familiar</h5>
						</div>
		
		
					
					
		
				<table class="table table-bordered " id="tabla_cargos_familiar">
					<thead >
			
							<th style="text-align:center;">Rut</th>
							<th style="text-align:center;">Nombre</th>
							<th style="text-align:center;">Fecha Nacimiento</th>
				
						
					</thead>
					
					
					<tbody>
					
						@foreach ($carga as $item)
						<tr style="text-align:center;">
						<td>{{$item->RUT}}</td>
						<td>{{$item->NOMBRE}}</td>
						<td>{{$item->FECHA_NACIMIENTO}}</td>
						</tr>
						@endforeach
					
					</tbody>
		
		
					</table>
				</div>
					
							<div class="panel panel-default">
									<div class="panel-heading">
										<h5>Cargos</h5>
									</div>
		
		
								
								
															
										
					<table class="table table-bordered" id="tablacargo">
							
							<thead >
			
									<th style="text-align:center;">Cargo</th>
									<th style="text-align:center;">Descripción</th>
									<th style="text-align:center;">Fecha Cargo</th>
						
								
							</thead>
							
							
							<tbody>
							
								@foreach ($cargo as $item2)
								<tr style="text-align:center;">
							
								<td>{{$item2->CARGO}}</td>
								<td>{{$item2->DESCRIPCION}}</td>
								<td>{{$item2->FECHA_CARGO}}</td>
								</tr>
								@endforeach
							
							</tbody>
				
				
							</table>
							</div>

				
					<div class="panel panel-default">
						<div class="panel-heading">
							<h5>Datos del Contrato</h5>
						</div>
		
					<table class="table table-bordered">
		
					<tr>
						<td style="text-align:right;"><strong>Lugar de trabajo:</strong> </td>
						<td>{{$personal->LUGAR_TRABAJO}}</td>
						<td style="text-align:right;"><strong>Gratificación:</strong> </td>
						<td>{{$personal->GRATIFICACION}}</td>
					</tr>
					<tr>
						<td style="text-align:right;"><strong>AFP:</strong> </td>
						<td>{{$personal->AFP}}</td>
						<td style="text-align:right;"><strong>Movilización:</strong> </td>
						<td>{{$personal->MOVILIZACION}}</td>
					</tr>
					<tr>
						<td style="text-align:right;"><strong>Previsión:</strong> </td>
						<td>{{$personal->PREVISION}}</td>
						<td style="text-align:right;"><strong>Colación:</strong> </td>
						<td>{{$personal->COLACION}}</td>
					</tr>
					<tr>
						<td style="text-align:right;"><strong>Sueldo Base:</strong> </td>
						<td>{{$personal->SUELDO_BASE}}</td>
						<td style="text-align:right;"><strong>Inicio Contrato:</strong> </td>
						<td>{{$personal->FECHA_INICIO_CONTRATO}}</td>
					</tr>
					<tr>
						<td style="text-align:right;"><strong>Talla de ropa:</strong> </td>
						<td>{{$personal->TALLA_ROPA}}</td>
						<td style="text-align:right;"><strong>Termino Contrato:</strong> </td>
						<td>{{$personal->FECHA_INICIO_CONTRATO}}</td>
					</tr>
					<tr>
						<td style="text-align:right;"><strong>Numero de Zapatos:</strong> </td>
						<td>{{$personal->NZAPATO}}</td>

					</tr>						
						
							</table>
			</div>
			<a href="/personal" class="btn btn-default">Volver</a>
			</div>
		</body>
</html>