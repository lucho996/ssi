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
<div style="width: 1100px;
margin: 0px auto;
background: #cccccc;
padding: 35px;">
</div>
<body >
	<div style="width: 1100px; margin:20px auto;">
		<div style="width: 200px; float:left;  position:relative;">
		@include('intranet.menu')
		</div>
	<div style="width: 850px; float: right; position:relative;">  
	<nav class="navbar navbar-default" role="navigation">
  		<div class="container-fluid">
    		<div id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav">
        			<li><a href="/personal">Todos</a></li>
        			<li class="active"><a href="/personal/create">Nuevo</a></li>
        		</ul>
        	</div>
        </div>
    </nav>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Nuevo personal</h4>
  		</div>

  		<div class="panel-body">
		  <form  action="{{ action('PersonalController@store')}}" method="post">
				{{ csrf_field() }}
				<p>
					<input type="text" name="rut" placeholder="Rut" class="form-control" onkeypress='return validaNumericos(event)' maxlength="9" minlength="9" required>
                </p>
                <p>
                    <input type="text" name="nombre" placeholder="Nombre" maxlength="30" class="form-control" onkeypress='return validar(event)' required>
                </p>
			    <p>
					<input type="text" name="apellido" placeholder="Apellido" maxlength="30" class="form-control" onkeypress='return validar(event)' required>
                </p>	
                <p>
                    <input type="text" name="telefono" placeholder="Telefono" maxlength="9" minlength="9" class="form-control" onkeypress='return validaNumericos(event)'>
                </p>
                <p>
                    <input type="text" name="correo" placeholder="Correo" class="form-control">
                </p>
                <p>
                    <input type="text" name="hh" placeholder="Hora Hombre" class="form-control" onkeypress='return validaNumericos(event)' required>
                </p>
                <p>
                    <input type="text" name="fecha_nac" class="form-control" placeholder="Fecha de nacimiento" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" required>
                </p>
                <p>
                    <input type="text" name="direccion" placeholder="Dirección" class="form-control" required>
                </p>
                <p>
                    <select name="tipo" class="form-control" >

                                <option>Taller</option>
                                
                                <option>Abastible</option>
                                
                                <option>Petroquim</option>
                                
                    </select>
                </p>
                <p>
					<input type="submit" value="Guardar" class="btn btn-success">
				</p>
			</form>
		</div>
	</div>

	@if(Session::has('message'))
		<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
	</div>
	</div>
</body>
<script type="text/javascript" src="{{ URL::asset('js/solo_num.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/solo_letras.js') }}"></script>
</html>