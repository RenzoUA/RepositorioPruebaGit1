<?php
    session_start();
    
    if( isset($_SESSION['usuario'])==false || $_SESSION['usuario'] == null || $_SESSION['usuario'] == '')
     {
         header("Location:../Vista/frmLogin.php");
     }

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Clientes</title>
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
                <!--<img class="logo" src="../assets/icons/hhw ico.png" alt="user-picture">-->
                REAL LEGENDS<i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
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
                    <!--
                    <li>
                        <a href="#!">
                            <i class="zmdi zmdi-settings"></i>
                        </a>
                    </li>-->
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
			  <h1 class="text-titles"><i class="zmdi zmdi-ticket-star"></i> Clientes <small>   </small></h1>
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
                                <li class="active"><a href="javascript:OpcionesModulos('ticketControlador.php','1');">Todos </a></li>
                                <li><a href="javascript:OpcionesModulos('ticketControlador.php','2');">Sin Asignar</a></li>
                                <li><a href="javascript:OpcionesModulos('ticketControlador.php','3');">Asignados </a></li>
                                <li><a href="javascript:OpcionesModulos('ticketControlador.php','4');">Rechazados </a></li>
                                <li><a href="javascript:OpcionesModulos('ticketControlador.php','5');">Aceptados </a></li>
                                <li><a href="javascript:OpcionesModulos('ticketControlador.php','6');">En Proceso </a></li>
                                <li><a href="javascript:OpcionesModulos('ticketControlador.php','7');">Finalizados </a></li>
                                <li style="float: right;" ><a href="javascript:OpcionesModulos('ticketControlador.php','8');"><i class="zmdi zmdi-wrench"></i> Ajustes </a></li>
                            </ul>

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
    </form>
    
    
                        
                      
                      
                      
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
                      
                      
            
                
                    

<!--Form Modals-->
    <div id="form-bp1" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
      <div class="modal-dialog custom-width">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
            <h3 class="modal-title">Form Modal</h3>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Email address</label>
              <input type="email" placeholder="username@example.com" class="form-control">
            </div>
            <div class="form-group">
              <label>Your name</label>
              <input type="text" placeholder="John Doe" class="form-control">
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label>Your birth date</label>
              </div>
            </div>
            <div class="row no-margin-y">
              <div class="form-group col-xs-3">
                <input type="text" placeholder="DD" class="form-control">
              </div>
              <div class="form-group col-xs-3">
                <input type="text" placeholder="MM" class="form-control">
              </div>
              <div class="form-group col-xs-3">
                <input type="text" placeholder="YYYY" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <div class="be-checkbox">
                  <input id="check2" type="checkbox">
                  <label for="check2">Send me notifications about new products and services.</label>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-default md-close">Cancel</button>
            <button type="button" data-dismiss="modal" class="btn btn-primary md-close">Proceed</button>
          </div>
        </div>
      </div>
    </div>
    
    <div id="todosModales">
     <!-- Nifty Modal-->
                  <div id="form-success" class="md-container colored-header colored-header-success custom-width md-effect-9">
                    <div class="md-content">
                      <div class="md-header">
                        <button type="button" aria-hidden="true" class="close md-close">x</button>
                        <h3>Nueva Sede</h3>
                      </div>
                      <div class="md-body form">
                        <div class="form-group">
                          <label>Nombre de la Sede</label>
                          <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Departamento</label>
                          <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Distrito</label>
                          <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Direccion</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button"  class="btn btn-default md-close">Cancelar</button>
                        <button type="button"  class="btn btn-success md-close">Registrar</button>
                      </div>
                    </div>
                  </div>
                  <div class="md-overlay"></div>
                    
    </div>  
    
    
    
	<!--====== Scripts -->
	<script src="../js/jquery-3.1.1.min.js"></script>
	<script src="../js/sweetalert2.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/material.min.js"></script>
	<script src="../js/ripples.min.js"></script>
	<script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="../js/main.js"></script>
	<script src="../Funciones/javascript.js"></script>
	<script type="text/javascript" src="../DataTables/datatables.min.js"></script>
	<script type="text/javascript" src="../DataTables/Responsive-2.2.2/js/dataTables.responsive.min.js"></script>
	
	<script type="text/javascript" src="../DataTables/pdfmake-0.1.36/pdfmake.min.js">  </script>
	<script type="text/javascript" src="../DataTables/pdfmake-0.1.36/vfs_fonts.js">  </script>
	
	<script src="../Gritter/js/jquery.gritter.js" type="text/javascript"></script>
	<script src="../Niftymodals/jquery.niftymodals.js" type="text/javascript"></script>
	
   
   
    <script>
        $(document).ready( function () {
            $.material.init();
            CargarMenu();
            OpcionesModulos('clienteControlador.php','1');
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
    
    
    
</body>
</html>