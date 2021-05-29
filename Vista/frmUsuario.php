<?php
    
    session_start();
    
    if( isset($_SESSION['usuario'])==false || $_SESSION['usuario'] == null || $_SESSION['usuario'] == '')
     {
         header("Location:../Login/frmLogin.php");
     }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Tickets</title>
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="../assets/img/logo%20sotran%20circulo%20system.png" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/select2.css">
	<link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/modales.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css"/>    
	<link rel="stylesheet" type="text/css" href="../DataTables/Responsive-2.2.2/css/responsive.dataTables.min.css"/>
	<link rel="stylesheet" type="text/css" href="../Gritter/css/jquery.gritter.css">
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
                        <figcaption class="text-center text-titles">  (   <?php echo $_SESSION['Tipo_usuario'] ?>   ) </figcaption>
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
					<a href="#!" class="btn-search">
						<i class="zmdi zmdi-search"></i>
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
			  <h1 class="text-titles"><i class="zmdi zmdi-account-circle"></i> Mantenimiento de Usuarios <small>   </small></h1>
			</div>
		</div>
<?php
		switch($_SESSION['Tipo_usuario'])
        {
            case 'Administrador':
            {
?>
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-xs-12">
                            <ul class="nav nav-tabs" id="barranav" style="margin-bottom: 15px; display: none;" >
                                <li class="active"><a href="javascript:OpcionesModulos('usuarioMantControlador.php','1');">Usuarios</a></li>
                                <li ><a href="javascript:OpcionesModulos('usuarioMantControlador.php','2');">Clientes </a></li>
                                <li ><a href="javascript:OpcionesModulos('usuarioMantControlador.php','3');">Personal Tecnico </a></li>
                                <li ><a href="javascript:OpcionesModulos('usuarioMantControlador.php','4');">Administrador </a></li>
                            </ul>

                            <div id="myTabContent" class="tab-content">

                                <div class="panel-heading">
                                        <center>
                                            <img src="../assets/img/loading.gif" id="imgloading" width="150" height="*" style="display: none">
                                        </center>
                                </div>
                                <div class="tab-pane fade active in" >
                                    <div id="ContenidoModulo" class="table-responsive">
                                        <div class="col-xs-12 col-md-10 col-md-offset-1">
                                            <fieldset > 
                                            <h1 class="text-center" style="background: #D9EDF7;border-radius: 15px; color: #0A2940;">Tipos de usuarios <br>
                                            <i class="zmdi zmdi-accounts"></i></h1>
                                            </fieldset>

                                            <div class="content-all">
                                                <div class="content-img">
                                                   <a href="javascript:OpcionesModulos('usuarioMantControlador.php','1');">
                                                        <img src="../assets/img/usuariostodos.jpg">
                                                        <div class="content-txt">
                                                            <h2><i class="zmdi zmdi-wrench"></i> Todos los Usuarios</h2>
                                                        </div>
                                                        <div class="content-1"></div>
                                                        <div class="content-2"></div>
                                                        <div class="content-3"></div>
                                                        <div class="content-4"></div>
                                                    </a>
                                                </div>
                                                <div class="content-img">
                                                   <a href="javascript:OpcionesModulos('usuarioMantControlador.php','2');">
                                                        <img src="../assets/img/empresario.jpg">
                                                        <div class="content-txt">
                                                            <h2><i class="zmdi zmdi-wrench"></i> Clientes</h2>
                                                        </div>
                                                        <div class="content-1"></div>
                                                        <div class="content-2"></div>
                                                        <div class="content-3"></div>
                                                        <div class="content-4"></div>
                                                    </a>
                                                </div>
                                                <div class="content-img">
                                                    <a href="javascript:OpcionesModulos('usuarioMantControlador.php','3');">
                                                        <img src="../assets/img/personaltecnino.jpg">
                                                        <div class="content-txt">
                                                            <h2><i class="zmdi zmdi-wrench"></i> Personal Tecnico</h2>
                                                        </div>
                                                        <div class="content-1"></div>
                                                        <div class="content-2"></div>
                                                        <div class="content-3"></div>
                                                        <div class="content-4"></div>
                                                    </a>
                                                </div>
                                                <div class="content-img">
                                                    <a href="javascript:OpcionesModulos('usuarioMantControlador.php','4');">
                                                        <img src="../assets/img/secretaria.jpg">
                                                        <div class="content-txt">
                                                            <h2><i class="zmdi zmdi-wrench"></i> Administrador</h2>
                                                        </div>
                                                        <div class="content-1"></div>
                                                        <div class="content-2"></div>
                                                        <div class="content-3"></div>
                                                        <div class="content-4"></div>
                                                    </a>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
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
	
	<script src="../Gritter/js/jquery.gritter.js" type="text/javascript"></script>
	
	<script>
		
	</script>
   

   
    <script type="text/javascript">
        $(document).ready(function()
        {
            $.material.init();
            CargarMenu();
            
            
         
        });
    </script> 
    


   
</body>
</html>