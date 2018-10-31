
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
                 
                    
                   