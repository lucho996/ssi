<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Loggin</title>
        <style type="text/css">


nav{
  margin: 1em auto;
}

ul{
  margin: 0px;
  padding: 0px;
  list-style: none;
}

ul.dropdown{ 
  position: relative; 
 
}

ul.dropdown li{ 

  float: left;
  position: relative;
  
}

ul.dropdown a:hover{ 

}

ul.dropdown li a { 
  display: block; 
  padding: 5px 8px; 
 
  z-index: 2000; 
  text-align: center;
  text-decoration: none;

}

ul.dropdown li a:hover,
ul.dropdown li a.hover{ 
  position: relative;

}


ul.dropdown ul{ 
    display: none;
    position: absolute; 
    top: 0; 
    left: -30px;
    width: 180px; 
    z-index: 1000;
}

ul.dropdown ul li { 
  font-weight: normal; 
  border-bottom: 1px solid #ccc; 
}

ul.dropdown ul li a{ 
  display: block; 
  color: #34495e !important;
  background: #eee !important;
} 

ul.dropdown ul li a:hover{
  display: block; 
  background: #5cb85c !important;
  color: #fff !important;
  border-radius:10px 10px 10px 10px;
} 

.drop > a{
  position: relative;
}

.drop > a:after{
  content:"";
  position: absolute;
  right: 10px;
  top: 40%;
  border-left: 5px solid transparent;
  border-top: 5px solid #333;
  border-right: 5px solid transparent;
  z-index: 999;
}

.drop > a:hover:after{
  content:"";
   border-left: 5px solid transparent;
  border-top: 5px solid #fff;
  border-right: 5px solid transparent;
}

</style>
    </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
        <nav class="navbar navbar-laravel" style="width:100%; max-width:1100px; margin: 0px auto;">
           
            <div class="container">
            <img src="/images/png/logo.png" style="width:100%; max-width:100px ; float:left;" alt=""> 
                <div class="navbar-nav ml-auto" >

                <ul class="dropdown" style="margin-right:100%;">
                        @guest

                        @else
                           
                <li style="width:150px;"><a href="#" style="text-decoration:none; float:left; color:#000;"><label for="">{{Auth::user()->name}}</label></a><a href="#" style="float:right;"><img src="https://www.kervangida.com/assets/admin/dist/img/user-flat.png" style="width:30px;" alt=""></a>
                        <ul class="sub_menu">
                        <li>      
                            <a style="text-decoration: none;" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                              <strong><h5>{{('Cerrar Sesion') }}</h5></strong>  
                                </a>
                        </li>

                        </ul>
                        </li>
                   
                      




                            
                        @endguest
                    </ul>
                </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                    </form>   
            </div>
        </nav>

        <body>
            @yield('content')
            @yield('contentt')
        </body>
 
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
    var maxHeight = 400;

$(function(){

    $(".dropdown > li").hover(function() {
    
         var $container = $(this),
             $list = $container.find("ul"),
             $anchor = $container.find("a"),
             height = $list.height() * 1.1,       // make sure there is enough room at the bottom
             multiplier = height / maxHeight;     // needs to move faster if list is taller
        
        // need to save height here so it can revert on mouseout            
        $container.data("origHeight", $container.height());
        
        // so it can retain it's rollover color all the while the dropdown is open
        $anchor.addClass("hover");
        
        // make sure dropdown appears directly below parent list item    
        $list
            .show()
            .css({
                paddingTop: $container.data("origHeight")
            });
        
        // don't do any animation if list shorter than max
        if (multiplier > 1) {
            $container
                .css({
                    height: maxHeight,
                    overflow: "hidden"
                })
                .mousemove(function(e) {
                    var offset = $container.offset();
                    var relativeY = ((e.pageY - offset.top) * multiplier) - ($container.data("origHeight") * multiplier);
                    if (relativeY > $container.data("origHeight")) {
                        $list.css("top", -relativeY + $container.data("origHeight"));
                    };
                });
        }
        
    }, function() {
    
        var $el = $(this);
        
        // put things back to normal
        $el
            .height($(this).data("origHeight"))
            .find("ul")
            .css({ top: 0 })
            .hide()
            .end()
            .find("a")
            .removeClass("hover");
    
    });  
    
});



</script>
</html>
