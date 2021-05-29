<?php
    
    session_start();
    
    if( isset($_SESSION['usuario'])==false || $_SESSION['usuario'] == null || $_SESSION['usuario'] == '')
     {
         header("Location:../Vista/frmLogin.php");
     }

    
    if(isset($_GET['mensaje']))
    {
        if($_GET['mensaje']==true)
        { $codigo=$_SESSION['codigo']; } 
    }
    

    if(isset($_POST['subir']))
    {
        $nombre = $_FILES['archivo']['name'];
        $tipo = $_FILES['archivo']['type'];
        $tamaño = $_FILES['archivo']['size'];
        $ruta = $_FILES['archivo']['tmp_name'];
        $destino = "archivo/".$nombre;
        if ($nombre != "") 
        {
            if(copy($ruta, $destino)){
                echo "Exito";
            }    
            else{
                echo "Error";
            }
        }

    }

    
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Contratos</title>
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="../assets/img/logo%20sotran%20circulo%20system.png" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/modales.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css"/>    
	<link rel="stylesheet" type="text/css" href="../DataTables/Responsive-2.2.2/css/responsive.dataTables.min.css"/>  
	<link rel="stylesheet" type="text/css" href="../Gritter/css/jquery.gritter.css">  
	<link rel="stylesheet" type="text/css" href="../Niftymodals/jquery.niftymodals.css">   
   
</head>
<body>
    <form name="form">
    <input type="hidden" name="op">
    <input type="hidden" name="codigo">
	
    <!-- SideBar -->
    <section class="full-box cover dashboard-sideBar">
	<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
        <div class="full-box dashboard-sideBar-ct">
            <!--SideBar Title -->
            <div class="full-box text-center text-titles dashboard-sideBar-title">               
               
                SOTRANS SYSTEM<i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
            </div>
            <!-- SideBar User info -->
            <div class="full-box dashboard-sideBar-UserInfo">
                <div class="camaraButton">    <a href="frmPrueba.php">  <img src="../assets/icons/camara.png">  </a>  </div>
		            <figure class="full-box">    
                        <img class="usuarioFoto" src="../assets/users/<?php echo $_SESSION['id_usuario'] ?>.jpg" alt="UserIcon">

                        <figcaption class="text-center text-titles">     <?php echo $_SESSION['usuario'] ?>    </figcaption>
                        <figcaption class="text-center text-titles">  (   <?php echo $_SESSION['Area_personal'] ?>   ) </figcaption>
		            </figure>
		        <ul class="full-box list-unstyled text-center">
                    <li>
                        <a href="#!">
                            <i class="zmdi zmdi-settings"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#!" class="btn-exit-system">
                            <i class="zmdi zmdi-power"></i>
                        </a>
                    </li>
		        </ul>
            </div>
            <!-- SideBar Menu -->
            <ul class="list-unstyled full-box dashboard-sideBar-Menu">
            </ul> 
	</div>
    </section>

	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
		<nav class="full-box dashboard-Navbar">
			<ul class="full-box list-unstyled text-right">
				<li class="pull-left">
					<a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
				</li>
				<li>
					<a href="#!" class="btn-Notifications-area">
						<i class="zmdi zmdi-notifications-none"></i>
						<span class="badge">7</span>
					</a>
				</li>
				<li>
					<a href="#!" class="btn-modal-help">
						<i class="zmdi zmdi-help-outline"></i>
					</a>
				</li>
			</ul>
		</nav>
		<!-- Content page -->
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-file-text"></i> Contratos  <small>   </small></h1>
			</div>
		</div>
<?php
		switch($_SESSION['Area_personal'])
        {
            case 'Ventas':
            { 
?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <!--
                        <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                            <li class="active"><a href="javascript:OpcionesModulos('ticketControlador.php','1');">Todos </a></li>
                            <li ><a href="javascript:OpcionesModulos('ticketControlador.php','2');">Asignados</a></li>
                            <li ><a href="javascript:OpcionesModulos('ticketControlador.php','3');">Aceptados</a></li>
                            <li ><a href="javascript:OpcionesModulos('ticketControlador.php','4');">En proceso</a></li>
                            <li ><a href="javascript:OpcionesModulos('ticketControlador.php','5');">Finalizado</a></li>
                        </ul>
                       -->
                        
                        <div id="myTabContent" class="tab-content">

                            <div class="panel-heading">
                                <center>
                                    <img src="../assets/img/loading.gif" id="imgloading" width="150" height="*" style="display: none">
                                </center>
                            </div>
                            <div class="tab-pane fade active in" id="list">
                                <div id="ContenidoModulo" class="table-responsive">
                                
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        
<?php
            break;
        }   
            case 'Administrador':
            {
?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                                <li  class="active"><a href="javascript:OpcionesModulos('contratoControlador.php','1');">Todos </a></li>
                                <li><a href="javascript:OpcionesModulos('contratoControlador.php','2');">Vigentes </a></li>
                                <li><a href="javascript:OpcionesModulos('contratoControlador.php','3');">Finalizados </a></li>
                                <li><a href="javascript:OpcionesModulos('contratoControlador.php','4');">Por empresa </a></li>
                                <li><a href="javascript:OpcionesModulos('contratoControlador.php','5');">Registrar</a></li>
                                <li style="float: right;" ><a href="javascript:OpcionesModulos('contratoControlador.php','6');"><i class="zmdi zmdi-wrench"></i> Ajustes </a></li>
                            </ul>

                            <div id="myTabContent" class="tab-content">
                               
                                <div class="panel-heading">
                                        <center>
                                            <img src="../assets/img/loading.gif" id="imgloading" width="150" height="*" style="display: none">
                                        </center>
                                </div>
                        
                                <div class="tab-pane fade  active in" id="list">
                                    <div id="ContenidoModulo" class="table-responsive">

                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
		
<?php
            break;
        }    
    }
?>
	</section>

	<!-- Notifications area -->
	<section class="full-box Notifications-area">
		<div class="full-box Notifications-bg btn-Notifications-area"></div>
		<div class="full-box Notifications-body">
			<div class="Notifications-body-title text-titles text-center">
				Notifications <i class="zmdi zmdi-close btn-Notifications-area"></i>
			</div>
			<div class="list-group">
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-alert-triangle"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">17m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus.</p>
				    </div>
			  	</div>
			  	<div class="list-group-separator"></div>
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-alert-octagon"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">15m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus.</p>
				    </div>
			  	</div>
			  	<div class="list-group-separator"></div>
				<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-help"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">10m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Maecenas sed diam eget risus varius blandit.</p>
				    </div>
				</div>
			  	<div class="list-group-separator"></div>
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-info"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">8m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Maecenas sed diam eget risus varius blandit.</p>
				    </div>
			  	</div>
			</div>

		</div>
	</section>

	<!-- Dialog help -->
	<div class="modal fade" tabindex="-1" role="dialog" id="Dialog-Help">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    	<h4 class="modal-title">Help</h4>
			    </div>
			    <div class="modal-body">
			        <p>
			        	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt beatae esse velit ipsa sunt incidunt aut voluptas, nihil reiciendis maiores eaque hic vitae saepe voluptatibus. Ratione veritatis a unde autem!
			        </p>
			    </div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-primary btn-raised" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Ok</button>
		      	</div>
		    </div>
	  	</div>
	</div>
    
    
    
                        
                      
                      
                      
               <!-- modal ticket -->       
                      
                      <div class="modal fade" id="miventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 style="text-align: center;">¡ Ticket N° <?php echo $codigo; ?> creado exitosamente !</h3>
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
                      
    </form>                  
                      


    
    
    
	<!--====== Scripts -->
	<script src="../js/jquery-3.1.1.min.js"></script>
	<script src="../js/sweetalert2.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/material.min.js"></script>
	<script src="../js/ripples.min.js"></script>
	<script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/select2.js"></script>
	<script src="../Funciones/javascript.js"></script>
    <script type="text/javascript" src="../DataTables/datatables.min.js"></script>
	<script type="text/javascript" src="../DataTables/Responsive-2.2.2/js/dataTables.responsive.min.js"></script>
	
	<script type="text/javascript" src="../DataTables/pdfmake-0.1.36/pdfmake.min.js">  </script>
	<script type="text/javascript" src="../DataTables/pdfmake-0.1.36/vfs_fonts.js">  </script>
	

     
<script>
        $(document).ready( function () {
            $.material.init();
            CargarMenu();
            OpcionesModulos('contratoControlador.php','1');
        } );
</script>
    
   
   <?php 
    if(isset($_GET['mensaje']))
    {
        if($_GET['mensaje']==true)
        {
            ?>
            <script>
                $(document).ready(function()
                {
                    $("#miventana").modal("show");
                    setTimeout(function() { $("#miventana").modal("hide"); }    ,   3000);
                });
            </script>
            <?php 
        }
    }
    ?>
    

    
    
    
    









    <script>


    function agregar_linea() {
        $(document).ready(function () {
            var posicion = 0;
            $("#tabla_acumula_equipos > tbody > tr").each(function(){ posicion++;});
            var linea = '<tr>'+
                            '<td class="text-center">'+(posicion+1)+'</td>'+
                            '<td><select class="form-control select_producto_calculo"  style="width: 100%;"  ></select></td>'+
                            '<td>'+
                                '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >'+
                                    '<input type="text" class="form-control input-sm text-right numerodeci"  id="incantidadP'+(posicion+1)+'" name="incantidadP'+(posicion+1)+'" value="" placeholder="" autocomplete="off">'+
                                '</div>'+
                            '</td>'+
                            '<td>'+
                                '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >'+
                                    '<input type="text" class="form-control input-sm text-right numerodeci"  id="preciouniP'+(posicion+1)+'" name="preciouniP'+(posicion+1)+'" value="" placeholder="" autocomplete="off">'+
                                '</div>'+
                            '</td>'+
                            '<td>'+
                                '<div class="btn-group btn-space">'+
                                    '<button type="button"  class="btn btn-space md-trigger btn-default btn-social btn-negacion" onclick="eliminar_linea2('+(posicion+1)+')"><i class="icon mdi mdi-delete"></i>'+
                                    '</button>'+
                                '</div>'+
                            '</td>'+
                        '</tr>';
            $("#tabla_acumula_equipos > tbody").append(linea);
            
            
            
           
        })  
    }


</script>
   
    
     
<script>
    
function eliminar_linea(posicion) {
	count = 0;
	$('#tabla_acumula_equipos > tbody > tr').each(function(){
		count++;
	});
	if(posicion == count ){
		document.getElementById("tabla_acumula_equipos").deleteRow(posicion);
		//$("#form-modal-detalle"+posicion).remove();
	}
    /*
    else{
		var titulo = "Error de Eliminación";
		var texto = "No puede eliminar esta Linea";
		var clase = "color warning";
		MostrarNotificacion(titulo,texto,clase);
    }
    */
}   

function eliminar_linea2(posicion) {
    count = 0;
    $('#tabla_acumula_equipos > tbody > tr').each(function(){
        count++;
    });
    
    for (var i = count; i > 0; i--) 
    {
        document.getElementById("tabla_acumula_equipos").deleteRow(i);
    }
    
    for (var posicion = 0 ; posicion < count-1; posicion++) 
    {
        var linea = '<tr>'+
                        '<td class="text-center">'+(posicion+1)+'</td>'+
                        '<td><select class="form-control select_producto_calculo"  style="width: 100%;"  ></select></td>'+
                        '<td>'+
                            '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >'+
                                '<input type="text" class="form-control input-sm text-right numerodeci"  id="incantidadP'+(posicion+1)+'" name="incantidadP'+(posicion+1)+'" value="" placeholder="" autocomplete="off">'+
                            '</div>'+
                        '</td>'+
                        '<td>'+
                            '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >'+
                                '<input type="text" class="form-control input-sm text-right numerodeci"  id="preciouniP'+(posicion+1)+'" name="preciouniP'+(posicion+1)+'" value="" placeholder="" autocomplete="off">'+
                            '</div>'+
                        '</td>'+
                        '<td>'+
                            '<div class="btn-group btn-space">'+
                                '<button type="button"  class="btn btn-space md-trigger btn-default btn-social btn-negacion" onclick="eliminar_linea2('+(posicion+1)+')"><i class="icon mdi mdi-delete"></i>'+
                                '</button>'+
                            '</div>'+
                        '</td>'+
                    '</tr>';
        $("#tabla_acumula_equipos > tbody").append(linea);
    }
        
        //$("#form-modal-detalle"+posicion).remove();
    
    /*
    else{
        var titulo = "Error de Eliminación";
        var texto = "No puede eliminar esta Linea";
        var clase = "color warning";
        MostrarNotificacion(titulo,texto,clase);
    }
    */
} 
    
    
</script>
       
       
<script>
function __ajax(direccion,metodo,tipodata,datos){
  var ajax = $.ajax({
    url: direccion,
    type: metodo,
    dataType: tipodata,
    data: datos
  });
  return ajax;
}
</script>
    
    

<script>

function grabarcomprobante(){
    if(validarcamposcomprobante()){
    var data = JSON.stringify(obtenercomprobante());
    //console.log(data);
    __ajax('./datos/da-venta-procesar.php','POST','JSON',{"data":data})
    .done(function(info){
       console.log(" info :"+info.STATUS+" ERROR"+info.ERROR);
       if(info.STATUS=='OK'){
        var titulo = "Ingreso Correcto";
        var texto = "Comprobante N°"+$("#txtserie").val()+"-"+$("#txtnumero").val()+" ingreado";
        var clase = "color success";
        MostrarNotificacion(titulo,texto,clase);
        var codigo_comprobante = info.ERROR.split("|");
        imprimircomprobante(codigo_comprobante[0]);
        PonercorreoCliente();
        $("#txtenv-documento").val($("#txtenv-documento").val() + codigo_comprobante[1]);
        $('#md-enviar-pdf').niftyModal("show");

       }else{
        var titulo = "Error de Ingreso";
        var texto = "Comprobante N°"+$("#txtserie").val()+"-"+$("#txtnumero").val()+" no ingreado"+" ERROR:"+info.ERROR;
        var clase = "color danger";
        PonerVentana('./datos/pane-venta-principal.php');
        MostrarNotificacion(titulo,texto,clase);
       }
    });
    }
    
}
    
</script>
     
    


<script type="text/javascript">
    function detalles(){
        var sel = document.getElementById('txtCodigo_imp').value;
        if(sel==0)
        {
            $("#detallesEquipos").empty();
        }
        else{
            
            $("#detallesEquipos").empty();

            var linea = '<div class="panel-heading" style="background-color: #C1EEE7">Informacion del Equipo</div>'+

                        '<div class="panel-body">Marca: HP <br> Modelo: Laserjet Ent MFP M527dn <br> Serie: MXBCJ6D1GC </div>'+

                        '<div class="panel-heading" style="background-color: #C1EEE7">Detalles sobre el Equipo</div>'+

                        '<div class="panel-body">'+
                           'Lugar del Equipo'+
                           '<div class="form-group label-floating">'+
                                    '<label class="control-label">Departamento</label>'+
                                    '<input class="form-control" id="txtLugar_tic" name="txtLugar_tic" type="text" required>'+
                            '</div>'+
                            '<div class="form-group label-floating">'+
                                    '<label class="control-label">Direccion</label>'+
                                    '<input class="form-control" id="txtLugar_tic" name="txtLugar_tic" type="text" required>'+
                            '</div>'+

                            '<div class="form-group label-floating">'+
                                    '<label class="control-label">Piso</label>'+
                                    '<input class="form-control" id="txtLugar_tic" name="txtLugar_tic" type="text" required>'+
                            '</div>'+

                            '<div class="form-group label-floating">'+
                                    '<label class="control-label">Area</label>'+
                                    '<input class="form-control" id="txtLugar_tic" name="txtLugar_tic" type="text" required>'+
                            '</div>'+

                            '<div class="form-group">'+
                                '<label class="control-label">Tipo de garantia</label>'+
                                '<br>'+
                                '<select class="form-control">'+
                                    '<option>CAREPACK HHW</option>'+
                                    '<option>GARANTIA EXTENDIDA HHW</option>'+
                                '</select>'+
                            '</div>'+
                        '</div>'+

                        '<div class="panel-footer clearfix">'+
                            '<div class="pull-right">'+
                                '<a class="btn btn-success btn-sm" href="javascript:agregar_linea();">Agregar</a>'+
                                '<a href="javascript:nodetalles();" class="btn btn-default">Cerrar</a>'+
                            '</div>'+
                        '</div>';
            $("#detallesEquipos").append(linea);
        }
    }




    function nodetalles()
    {
            $("#detallesEquipos").empty();
    }


</script>
   
</body>
</html>