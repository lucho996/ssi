<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
   
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <title>Contactos</title>
</head>
<body>
    @include('menu')
    <div  style="width: 100%; max-width:1000px; margin: 70px auto">
            <div id="after_submit" ></div>
            <form id="contact_form" action="#" method="POST" enctype="multipart/form-data">
              
              
              
              
              
                <div style="width:500px; float:left; ">
                	<div class="panel panel-success">
                            <div class="panel-heading">
                                <h4>Contactanos</h4>
                            </div>
                <div class="panel-body">
               
                <label class="required" for="name">Nombre:</label><br />
                <input id="name"  name="nombre" class="form-control" type="text" value="" size="30" /><br />
                <span id="name_validation" class="error_message"></span>
            
           
                <label class="required" for="email">Email:</label><br />
                <input id="email"  name="email" class="form-control" type="text" value="" size="30" /><br />
                <span id="email_validation" class="error_message"></span>
          
            
                <label class="required" for="message">Mensaje:</label><br />
                <textarea id="message"  class="form-control" name="mensaje" rows="7" cols="30"></textarea><br />
                <span id="message_validation" class="error_message"></span>
            
                <input id="submit_button" type="submit" class="btn btn-success" value="Enviar Email" />
            </div>   
        </div>
              </div>
            </form>
       <div class="panel panel-default" style="width:350px; float:right;">
           <div class="panel-heading">
           </div>
       <p> <strong>Dirección:</strong> Calle Bellavista N° 1424 Concepción, Región del Bio Bio.  </p> 
            
            <p><strong>Telefono:</strong> 41-2950458 </p> 
            
          <p> <strong> Contacto:</strong>  Octavio Ramires</p>
          

      
       </div>
            
          
    </div>
    <div id="googleMap" style="width:1000px;height:400px; margin: 0px auto; margin-top:600px;"></div>
    <script>
    function myMap() {
        var mapProp= {
        zoom:18,
        center: new google.maps.LatLng(-36.8041307,-73.0521895)
        ,mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
        new google.maps.Marker({
                position: map.getCenter()
                , map: map
                , title: 'Pulsa aquí'
                , icon: 'http://gingerheadmoscowmule.com/wp-content/uploads/2017/05/markerimage.png'
                , cursor: 'default'
                , draggable: false
            });
        }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWJtORFuyD1EjuTYZjl5vfS1RyzpwBgrU&callback=myMap"></script>
</body>


</html>