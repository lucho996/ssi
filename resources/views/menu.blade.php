
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="{{ URL::asset('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css') }}">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<style>
html {
  min-height: 100%;
  position: relative;
}
body {
  margin: 0;
  margin-bottom: 40px;
  background:#8ba987 url('http://www.rfegimnasia.org/images/backgrounds/fondo-archivo.jpg') no-repeat center center;
background-size:100% 100%;
}
footer {
  background-color: black;
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 40px;
  color: white;
  
}</style>
</head>

<header>
        <div style="width:100%; max-width:1100px;  margin: 0px auto 0px;">

            <div class="menu_bar">
                <a href="#" class="bt_menu">Menú</a>
            
            </div>
          
            <nav>
                
                <ul class="mover">
                <li><img src="images/png/logo.png" class="logo" style="width:150px;  opacity:0.8; " alt=""></li>  
                  <div style="float:right;">
                       
                    <li><a href="/" >Inicio</a></li>
                    <li><a href="/nosotros">Nosotros</a></li>
                    <li><a href="/contacto">Contacto</a></li>
                    <li><a href="/login">Intranet</a></li>
                </div>
                </ul>
            </nav>
        </div>
           <!-- <div style="width:500px; height:80px; opacity: 0.7; float:right;">
                                <div style="margin-top: 30px; color:#5B9600;">
                                    <div style="width:200px; float:left;">
                                    <img src="images/png/fono.png"  style="width:40px; float: left;" alt="">
                                    <div style="margin-top: 20px;">
                                    <h4><em>041-2950458</em></h3>
                                    </div>
                                    </div>  
                                    <div style="width:300px; float: right;">
                                        <img src="images/png/ubicacion.png"  style="width:40px; float: left;" alt="">
                                    <div style="margin-top: 20px;">
                                    <h4><em>Bellavista #1427 Concepción</em></h3>
                                    </div>  
                                </div> 
                                </div>
                            </div>-->
        </header>
<body>

    @yield('contenido')

</body>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/menu.js"></script>
<br>
<footer>
 
    <div style="width: 100%; height:150px; margin:0px auto;  background:#c3c3c3;">
        
        <div style="wifth:100%; max-width: 1150px; margin:0 auto; color:#000;">
            <div style="width: 100%; max-width: 400px; float:left;">

            <div style="width: 100%; max-width: 150px; float:left;">
                <img src="images/png/logo.png" class="logo" style="width:200px;  margin-top:20px; " alt="">
            </div>
            <div style="width: 100%;  float:right; margin-top:40px; border-right: 4px solid #3c3c3c; opacity:0.6; ">
                <p style=" width: 100%;font-size:14px; font-family:'PT Sans Narrow', sans-serif;"><strong>1460 Bellavista</strong> </p>
                <font face="Source Sans Pro" style="width: 100%;">Concepción, Región del Bío Bío</font>
                <font face="Source Sans Pro" style="width: 100%;">(56-41) 2751155</font>
            </div>
            </div>
            <div style="width:100%; max-width:250px;  float:left;">
                <a href="http://www.petroquim.cl/"> <img src="https://www.latmeco.com/wp-content/uploads/2014/01/petroquim.jpg" style="width:250px; margin-top:30px; margin-left:20px;" alt=""></a>
            </div>
            <div style="width:100%; max-width:250px; float:left;">
                    <a href="http://www.capacero.cl/"><img src=" http://www.capacero.cl/cap_acero/site/artic/20171107/imag/foto_0000000120171107150744.png" style="width:150px; margin-top:30px; margin-left:50px;" alt=""></a>
                
            </div>
            <div style="width: 100%; max-width:250px; float:right;">
                <a href="http://www.abastible.cl/"><img src="http://www.abastible.cl/wp-content/themes/abastible/images/logo-abastible.png" style="width:250px; margin-top:30px; margin-left:0px;" alt=""></a>
            </div>   
        </div>
    </div>
</footer>
</html>
