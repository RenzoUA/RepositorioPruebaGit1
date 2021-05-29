<?php
require_once "../Util/Conexion.php";
if(isset($_GET['cod']))
{
// subir archivos
    if(isset($_POST['subir']))
    {
      $nombre = $_FILES['archivo']['name'];
      $tipo = $_FILES['archivo']['type'];
      $tamaño = $_FILES['archivo']['size'];
      $ruta = $_FILES['archivo']['tmp_name'];
      $destino = "archivo/" . $nombre;
      
      echo "<h1>   ".$nombre."|-----|".$tipo."|------|".$tamaño."|------|".$ruta."|------|".$destino."</h1>";


      foreach ($_FILES["archivo"] as $clave => $valor) {

        echo "Propiedad: $clave ---- Valor: $valor <br>";
      }

      if ( !empty($_FILES))
      {
        if(copy($ruta, $destino))
        {
          try{
            $Sentencia = "INSERT INTO `pdf` ( `titulo`, `tamaño`, `tipo`) VALUES ('rufusdocx', 686, 'officedocument')"; 

            $objc = new Conexion();
            $conexion = $objc->Conectar();
            $rs= mysqli_query($conexion, $Sentencia);

            echo "se guardo csm <br>";
            var_dump($rs);
            exit();
            if ($rs) {
              echo "se guardo en la bd :V";
            }
            else{
              echo "no se guardo en la bd :'v";
            }
          }catch(Exception $e){
            echo "no se guardo en la bd :''''''''''''v";
          }
        }
        else
        {
          echo "no se guardo csm <br>";
        }
      }
    }
        
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<title>SolicitarTickets</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="../css/estilo.css">
	<link rel="stylesheet" href="../css/main.css">   
	<link rel="stylesheet" href="../css/modales.css">   
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/select2.css">
	<link rel="stylesheet" type="text/css" href="../Gritter/css/jquery.gritter.css">
</head>
<body>
    <form method="post"  enctype="multipart/form-data">
    <input type="file" name="archivo">
    <input type="submit" value="subir" name="subir">
			<br>	  										    
			<select id="mibuscador">
										          <option>hp</option>
										          <option>mac</option>
                                                  <option>andorid</option>
                                                  <option>samsung</option>
                                                  <option>lg</option>
                                                  <option>brufat</option>
                                                  <option>tiket</option>
                                                  <option>premier</option>
                                                  <option>video</option>
                                                  <option>elemento</option>
                                                  <option>canal</option>
                                                  <option>rufino</option>
                                                  <option>produccion</option>
                                                  <option>usb</option>
                                                  <option>cartas</option>
                                                  <option>clash royal</option>
										        </select>
										   <br>         				
          	<button class="btn btn-info btn-raised btn-sm" data-toggle="modal" data-target="#miventana"	> Enviar</button>
		<div class="content-all">
        
        <div class="content-img">
            
            <img src="https://cdn.pixabay.com/photo/2017/04/16/19/26/meadow-2235625__340.jpg">
            
            <div class="content-txt">
                <h2>Magtimus</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi quos consectetur est eligendi, sapiente quaerat cupiditate velit, sit voluptatum repellendus perspiciatis mollitia minus totam!</p>                
            </div>
            
            <div class="content-1"></div>
            <div class="content-2"></div>
            <div class="content-3"></div>
            <div class="content-4"></div>
            
        </div>
        
        <div class="content-img">
            
            <img src="https://cdn.pixabay.com/photo/2017/04/16/19/25/soap-bubble-2235614__340.jpg">
            
            <div class="content-txt">
                <h2>Magtimus</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi quos consectetur est eligendi, sapiente quaerat cupiditate velit, sit voluptatum repellendus perspiciatis mollitia minus totam!</p>                
            </div>
            
            <div class="content-1"></div>
            <div class="content-2"></div>
            <div class="content-3"></div>
            <div class="content-4"></div>
            
        </div>
        
        <div class="content-img">
            
            <img src="https://cdn.pixabay.com/photo/2017/04/06/22/11/auto-2209439__340.png">
            
            <div class="content-txt">
                <h2>Magtimus</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi quos consectetur est eligendi, sapiente quaerat cupiditate velit, sit voluptatum repellendus perspiciatis mollitia minus totam!</p>                
            </div>
            
            <div class="content-1"></div>
            <div class="content-2"></div>
            <div class="content-3"></div>
            <div class="content-4"></div>
            
        </div>
        
    </div>								  
										    
			<div class="modal fade" id="miventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 style="text-align: center;">¡ Ticket N° 00000014 creado exitosamente !</h3>
                        </div>
                        <div class="modal-body">
                          <center>
                           <img src="../assets/img/ticket.png" width=30% >
                            <h4>Muy pronto solucionaremos su problema, gracias.</h4>
                          </center>  
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal"> Cerrar</button>
                        </div>
                    </div>
                </div>		        
			</div>
										           
    
   <a href="javascript:MostrarNotificacion('xxxx','xxxx','color danger');"> xdxdxdd</a>

    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/select2.js"></script>
     <script src="../Gritter/js/jquery.gritter.js" type="text/javascript"></script>
    <script>
    $(document).ready(function()
        {
            $("#miventana").modal("show");
        setTimeout(function() { $("#miventana").modal("hide"); }    ,   3000);
        
        });
    </script>
    
     <script type="text/javascript">
        $(document).ready(function()
        {
           $('#mibuscador').select2();
            
            var titulo = "Error de validación";
            var texto = "El producto del item  no seleccionado";
            var clase = "color danger";
            MostrarNotificacion(titulo,texto,clase);
        });
    </script> 

    <script type="text/javascript">
       function MostrarNotificacion(titulo,texto,clase){
         $.gritter.add({
             title: titulo,
             text: texto,
             class_name: clase
         });
     }
    </script>     

    <script type="text/javascript">
      function funcion(){
         $.ajax({
            type:'POST', //aqui puede ser igual get
            url: 'funciones/mifuncion.php',//aqui va tu direccion donde esta tu funcion php
            data: {id:1,otrovalor:'valor'},//aqui tus datos
            success:function(data){
                //lo que devuelve tu archivo mifuncion.php
           },
           error:function(data){
            //lo que devuelve si falla tu archivo mifuncion.php
           }
         });
      }
    </script>

    </form>
    
    
    
 <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASO3O8Q0Tp6xKBsB_7uTjvO_qR6q5srlU&callback=initMap">
  </script>


 <!-- Se determina y escribe la localizacion -->
            <div id='ubicacion'></div>
            
            <script type="text/javascript">
                if (navigator.geolocation) 
                {
                    navigator.geolocation.getCurrentPosition(mostrarUbicacion);
                } 
                else 
                {
                    alert("¡Error! Este navegador no soporta la Geolocalización.");
                }
                
                function mostrarUbicacion(position) 
                {
                    var times = position.timestamp;
                    var latitud = position.coords.latitude;
                    var longitud = position.coords.longitude;
                    var altitud = position.coords.altitude;	
                    var exactitud = position.coords.accuracy;	
                    var div = document.getElementById("ubicacion");
                    div.innerHTML = "Timestamp: " + times + "<br>Latitud: " + latitud + "<br>Longitud: " + longitud + "<br>Altura en metros: " + altitud + "<br>Exactitud: " + exactitud;
                }	
                function refrescarUbicacion() 
                {	
                    navigator.geolocation.watchPosition(mostrarUbicacion);
                }	
            </script>

           
           
           
           
            <!-- Se escribe un mapa con la localizacion anterior-->
            <div id="demo"></div>
            <div id="mapholder"></div>
            <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
            <button onclick="cargarmap()">Cargar mapa</button>
            <script type="text/javascript">
                var x=document.getElementById("demo");
                function cargarmap()
                {
                    navigator.geolocation.getCurrentPosition(showPosition,showError);
                    function showPosition(position)
                    {
                      lat=position.coords.latitude;
                      lon=position.coords.longitude;
                      latlon=new google.maps.LatLng(lat, lon)
                      mapholder=document.getElementById('mapholder')
                      mapholder.style.height='250px';
                      mapholder.style.width='500px';
                      var myOptions={
                          center:latlon,zoom:10,
                          mapTypeId:google.maps.MapTypeId.ROADMAP,
                          mapTypeControl:false,
                          navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
                      };
                      var map=new google.maps.Map(document.getElementById("mapholder"),myOptions);
                      var marker=new google.maps.Marker({position:latlon,map:map,title:"You are here!"});
                    }
                    function showError(error)
                    {
                        switch(error.code) 
                        {
                            case error.PERMISSION_DENIED:
                              x.innerHTML="Denegada la peticion de Geolocalización en el navegador."
                              break;
                            case error.POSITION_UNAVAILABLE:
                              x.innerHTML="La información de la localización no esta disponible."
                              break;
                            case error.TIMEOUT:
                              x.innerHTML="El tiempo de petición ha expirado."
                              break;
                            case error.UNKNOWN_ERROR:
                              x.innerHTML="Ha ocurrido un error desconocido."
                              break;
                        }
                    }
                }
            </script>
    
    

    
    
    <!- prueba de push -->
    <script src="../PushJS/push.min.js"></script>
    
    
    <script>
        window.onload = function(){
                Push.Permission.request();
        }
        document.addEventListener("DOMContentLoaded", function(){
            if(!Notification){
                alert("las notificaciones no mrd");
                return;
            }
            if(Notification.permission !== "granted"){
                Notification.requestPermission();
            }
        });
        
        function notificar(){
            if(Notification.permission !== "granted")
                {
                    Notification.requestPermission();
                }
            else if(Notification.permission == "granted")
            {
                var notification = new Notification("Titulo de mi  Notificaciion",
                {
                    icon: "../assets/users/MGONZALES.jpg", 
                    body:"Que chucha vez mrd"
                });
                notification.onclick= function(){
                    window.open("http://www.google.com.pe");
                }
            }
        }
        
        function demo() {
            Push.create("Hola pedazo de mrd c:",{
                body:"Que chucha vez mrd", 
                icon:"../assets/users/MGONZALES.jpg",
                timeout:4000,
                onClick: function(){
                    window.location="http://www.google.com.pe";
                    this.close();
                }
            });
        }
        
        function verify() {
            console.log(Push.Permission.has());
             console.log(Push.Permission.get());
        }
        
        
        $(document).ready(function() {
            $("#demo_button").click(demo);
            $("#verify_button").click(verify);
        });
    </script>
    
    
    <h1>holaaa</h1>
<a id="demo_button" href="#" class="button">View Demo</a>
<a id="verify_button" href="#" class="button">View verufy permsion</a>
    <button type="button" onclick="notificar()">enviar noti</button>
    
    
    
    
    
    
    
    <br><br>
    <input type="text" id="txtvariable" >
   <button type="button" onclick="generabean()">generar encasulamiento modelo bean</button> 
    <div style="width:100%" id="bean"></div>
    <script type="text/javascript">
        function  generabean() 
        {
            var txtvariable = document.getElementById('txtvariable').value;
            
            
            var txtvariableMayus = txtvariable[0].toUpperCase() + txtvariable.slice(1);
            
            var txtvariablebean= "private $"+txtvariable+";<br>";
            var txtgetbean = "<br>function get"+txtvariableMayus+"(){  <br> return $this ->"+txtvariable+"; <br> } <br>";
            var txtsetbean = "<br>function set"+txtvariableMayus+"($"+txtvariable+"){ <br> $this ->"+txtvariable+" = $"+txtvariable+";   <br> } <br>";
            
            
            document.getElementById("bean").innerHTML = txtvariablebean + txtgetbean + txtsetbean;
            <?php  
            
            
            
            
            ?>
        }
    </script>
    
    
    
</body>
</html>
<?php
}
    ?>