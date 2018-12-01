
@extends('menu')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/style.mod.css" />
    
    
</head>

<body >

        @section('contenido')
       
        <div id="wowslider-container1">
                <div class="ws_images"><ul>

                <li><img src="/images/slider/2.jpg" alt="2" title="2" id="wows1_1"/></li>

                </ul></div>
                <div class="ws_bullets"><div>
                <a href="#" title="2"><span><img src="tooltips/2.jpg" alt="2"/>2</span></a>
                </div></div>
              
                </div>





                <div style="width:100%; max-width:900px; margin: 80px auto;  display: flex; flex-flow: row nowrap; justify-content: space-between; position:relative;">
                        
                    
                    
                    
                    <div style="width:100%; max-width:250px;height:100%; max-height:300px; float:left; background:#8ba987 url(''); border-radius:35px 35px 35px 35px; opacity:0.9;">
                            <div>
                                    
                                    <center><p style="font-family: 'Amaranth';font-size: 25px; color:#fff; opacity:0.8;">Nosotros</p></center> 
                                    <div class="panel-body" >
                                        <p align="justify" style="color:#fff; font-family: serif;"><img src="/images/png/abrircomillas.png" style="width:20px;" alt="">

                                                                                Somo una PYME dedicada a la metalurgia, estamos radicados en la ciudad de Concepción, en la VIII region de Chile, principalmente
                                                                                trabajamos solo en la región... <img src="/images/png/cerrarcomillas.png" style="width:20px;" alt=""></p> 
                                 <center>  <a href="" style="color:#fff; text-align: center;"><img src="http://www.aptyer.org.ar/graficos/flechagris.png" style="width:50px ;" alt=""></a></center>   
                                
                                </div>   
                            </div>
                        </div>
                        
                        
                        
                    <div style="width:100%; max-width:250px;height:100%; max-height:300px; float:left; background:#8ba987 url(''); border-radius:35px 35px 35px 35px; opacity:0.9;">
                                <div >
                                        <center><p style="font-family: 'Amaranth';font-size: 25px; color:#fff; opacity:0.8;">Misión</p></center> 
                                    <div class="panel-body" >
                                        <p align="justify" style="width:100%; color:#fff; font-family: serif;"><img src="/images/png/abrircomillas.png" style="width:20px;" alt=""> Como empresa proveedora de Servicios de Ingeniería Mecánica y 
                                                                                    con experiencia en el mercado de la metalmecánica es proveer a 
                                                                                    nuestros clientes con la confección, reparación y/o modificación 
                                                                                    de diversas piezas industriales <img src="/images/png/cerrarcomillas.png" style="width:20px;" alt=""></p> 
                                 <center>  <a href="" style="color:#fff; text-align: center;"><img src="http://www.aptyer.org.ar/graficos/flechagris.png" style="width:50px ;" alt=""></a></center>   
                                
                                    </div>   
                                </div>
                        </div>

                        
                        
                        
                    <div style="width:100%; max-width:250px;height:100%; max-height:300px; float:left;  background:#8ba987 url(''); border-radius:35px 35px 35px 35px; opacity:0.9;">
                                <div>
                                    <center><p style="font-family: 'Amaranth';font-size: 25px; color:#fff; opacity:0.8;">Visión</p></center> 
                                    <div class="panel-body">
                                        <p align="justify" style="color:#fff; font-family: serif;"> <img src="/images/png/abrircomillas.png" style="width:20px;" alt=""> Proyectase en el mediano y largo plazo como una empresa integrada 
                                            al desarrollo en la industria metalmecánica regional contribuyendo 
                                            con la producción de piezas, partes y componentes que requiere la misma, en forma capacitada a costos competitivos y comprometidos <img src="/images/png/cerrarcomillas.png" style="width:20px;" alt=""></p> </p> 
                                      <center> <a href="" style="color:#fff; text-align: center;"><img src="http://www.aptyer.org.ar/graficos/flechagris.png" style="width:50px ;" alt=""></a></center> 
                                
                                    </div>   
                                </div>
                        </div>
                       
            </div>
            




            <div style="width:100%; max-width:900px; margin: 80px auto;background:#8ba987 url('/images/png/div.png'); border-radius:30px; display: flex; flex-flow: row nowrap; justify-content: space-between; position:relative;">
      
                <div style="width:100% max-width:500px;  ">
            <img src="/images/inicio/2.jpg" style="width:100% max-width:500px; border-radius:45px; height:300px; margin-left:20px;" alt="">         
                </div>

                <div style="width:360px; ">                        
                        <h1 style=" color:#fff; font-family: serif; margin-top:60px;">    
                    <img src="/images/png/abrircomillas.png" style="width:40px;" alt=""> 
                   Maquinas Profesionales y para todo tipo de perfiles.
                    <img src="/images/png/cerrarcomillas.png" style="width:40px;" alt="">
                  
                </h1>
                            
                
            </div>
            </div>
            
            
               
            <script type="text/javascript" src="js/wowslider.js"></script>
            <script type="text/javascript" src="js/script.js"></script>
                @endsection
                
</body>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

</html>