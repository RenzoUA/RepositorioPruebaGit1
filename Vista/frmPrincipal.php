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
    <title>Principal</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../assets/img/logo%20sotran%20circulo%20system.png">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <form name="form">
    <input type="hidden" name="op">
    
    <!-- SideBar -->
    <section class="full-box cover dashboard-sideBar">
	<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
        <div class="full-box dashboard-sideBar-ct">
            <!--SideBar Title -->
            <div class="full-box text-center text-titles dashboard-sideBar-title">               
                <!--<img class="logo" src="../assets/icons/hhw ico.png" alt="user-picture">-->
                SOTRANS SYSTEM<i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
            </div>
            <!-- SideBar User info -->
            <div class="full-box dashboard-sideBar-UserInfo">
                <div class="camaraButton">    <a href="frmPrueba.php">  <img src="../assets/icons/camara.png">  </a>  </div>
		            <figure class="full-box">    
                        <img class="usuarioFoto" src="../assets/users/<?php echo $_SESSION['id_usuario'] ?>.jpg" alt="UserIcon">
                        
                        <!--<img class="usuarioFoto" src="../assets/img/logo%20sotran%20circulo%20system.png" alt="UserIcon">-->
                        
                        <figcaption class="text-center text-titles-super">     <?php echo $_SESSION['usuario'] ?>    </figcaption>
                        <figcaption class="text-center text-titles">  (   <?php echo $_SESSION['Area_personal'] ?>   ) </figcaption>
		            </figure>
		        <ul class="full-box list-unstyled text-center">
                    <!--<li>
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
        <ul class="list-unstyled full-box dashboard-sideBar-Menu" >
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
                <li class="pull-left" style="width: 200px;">
                    <font style="font-family: 'Montserrat-Bold'; text-transform: uppercase;">  Area de <?php echo $_SESSION['Area_personal'] ?> </font>      
                </li>
                <li>
                    <a href="#!" class="btn-Notifications-area">
                        <i class="zmdi zmdi-notifications-none"></i>
                        <span class="badge">7</span>
                    </a>
                </li>
                <li>
                    <a href="#!" class="btn-modal-help"><i class="zmdi zmdi-help-outline"></i></a>
                </li>  
            </ul>
        </nav>
        
           
        
        
	<!-- Content page -->
	    <div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles">Principal <small>  Información</small></h1>
			</div>
		</div>	
<?php    
        switch($_SESSION['Area_personal'])
        {    
            case 'Ventas':
            {
?>            
                <div class="full-box text-center" style="padding: 30px 10px;">
                    <article class="full-box tile">
                        <div class="full-box tile-title text-center text-titles text-uppercase">
                            CLIENTES
                        </div>
                        <div class="full-box tile-icon text-center">
                            <i class="zmdi zmdi-assignment-account"></i>
                        </div>
                        <div class="full-box tile-number text-titles">
                            <p class="full-box">7</p>
                            <small>Registrado</small>
                        </div>
                    </article>
                    <article class="full-box tile">
                        <div class="full-box tile-title text-center text-titles text-uppercase">
                            CONTRATOS
                        </div>
                        <div class="full-box tile-icon text-center">
                            <i class="zmdi zmdi-assignment-o"></i>
                        </div>
                        <div class="full-box tile-number text-titles">
                            <p class="full-box">10</p>
                            <small>Registrado</small>
                        </div>
                    </article>
                    <article class="full-box tile">
                        <div class="full-box tile-title text-center text-titles text-uppercase">
                            CONTRATOS ACTIVOS
                        </div>
                        <div class="full-box tile-icon text-center">
                            <i class="zmdi zmdi-assignment-alert"></i>
                        </div>
                        <div class="full-box tile-number text-titles">
                            <p class="full-box">70</p>
                            <small>Registrado</small>
                        </div>
                    </article>
                    <article class="full-box tile">
                        <div class="full-box tile-title text-center text-titles text-uppercase">
                            CONTRATOS FINALIZADOS
                        </div>
                        <div class="full-box tile-icon text-center">
                            <i class="zmdi zmdi-assignment-check"></i>
                        </div>
                        <div class="full-box tile-number text-titles">
                            <p class="full-box">70</p>
                            <small>Registrado</small>
                        </div>
                    </article>
                    <article class="full-box tile">
                        <div class="full-box tile-title text-center text-titles text-uppercase">
                            CONTRATOS CANCELADOS
                        </div>
                        <div class="full-box tile-icon text-center">
                            <i class="zmdi zmdi-assignment-returned"></i>
                        </div>
                        <div class="full-box tile-number text-titles">
                            <p class="full-box">10</p>
                            <small>Registrado</small>
                        </div>
                    </article>
                    <article class="full-box tile">
                        <div class="full-box tile-title text-center text-titles text-uppercase">
                            SOLICITUDES
                        </div>
                        <div class="full-box tile-icon text-center">
                            <i class="zmdi zmdi-comment-more"></i>
                        </div>
                        <div class="full-box tile-number text-titles">
                            <p class="full-box">10</p>
                            <small>Registrado</small>
                        </div>
                    </article>
                </div>
<?php
                break;
            }
            case 'TI':
            {
?>
                <div class="full-box text-center" style="padding: 30px 10px;">
                    <article class="full-box tile">
                        <div class="full-box tile-title text-center text-titles text-uppercase">
                            TICKETS SIN ASIGNAR
                        </div>
                        <div class="full-box tile-icon text-center">
                            <i class="zmdi zmdi-assignment-o"></i>
                        </div>
                        <div class="full-box tile-number text-titles">
                            <p class="full-box">7</p>
                            <small>Registrado</small>
                        </div>
                    </article>
                    <article class="full-box tile">
                        <div class="full-box tile-title text-center text-titles text-uppercase">
                            TICKETS ASIGNADOS
                        </div>
                        <div class="full-box tile-icon text-center">
                            <i class="zmdi zmdi-assignment-account"></i>
                        </div>
                        <div class="full-box tile-number text-titles">
                            <p class="full-box">10</p>
                            <small>Registrado</small>
                        </div>
                    </article>
                    <article class="full-box tile">
                        <div class="full-box tile-title text-center text-titles text-uppercase">
                            TICKETS RECHAZADOS
                        </div>
                        <div class="full-box tile-icon text-center">
                            <i class="zmdi zmdi-assignment-return"></i>
                        </div>
                        <div class="full-box tile-number text-titles">
                            <p class="full-box">70</p>
                            <small>Registrado</small>
                        </div>
                    </article>
                    <article class="full-box tile">
                        <div class="full-box tile-title text-center text-titles text-uppercase">
                            TICKETS ACEPTADOS
                        </div>
                        <div class="full-box tile-icon text-center">
                            <i class="zmdi zmdi-assignment-returned"></i>
                        </div>
                        <div class="full-box tile-number text-titles">
                            <p class="full-box">10</p>
                            <small>Registrado</small>
                        </div>
                    </article>
                    <article class="full-box tile">
                        <div class="full-box tile-title text-center text-titles text-uppercase">
                            TICKETS EN PROCESO
                        </div>
                        <div class="full-box tile-icon text-center">
                            <i class="zmdi zmdi-assignment-alert"></i>
                        </div>
                        <div class="full-box tile-number text-titles">
                            <p class="full-box">70</p>
                            <small>Registrado</small>
                        </div>
                    </article>
                    <article class="full-box tile">
                        <div class="full-box tile-title text-center text-titles text-uppercase">
                            TICKETS FINALIZADOS
                        </div>
                        <div class="full-box tile-icon text-center">
                            <i class="zmdi zmdi-assignment-check"></i>
                        </div>
                        <div class="full-box tile-number text-titles">
                            <p class="full-box">70</p>
                            <small>Registrado</small>
                        </div>
                    </article>
                    <article class="full-box tile">
                        <div class="full-box tile-title text-center text-titles text-uppercase">
                            CONSTANCIAS ACEPTADAS
                        </div>
                        <div class="full-box tile-icon text-center">
                            <i class="zmdi zmdi-layers"></i>
                        </div>
                        <div class="full-box tile-number text-titles">
                            <p class="full-box">10</p>
                            <small>Registrado</small>
                        </div>
                    </article>
                    <article class="full-box tile">
                        <div class="full-box tile-title text-center text-titles text-uppercase">
                            CONSTANCIAS RECHAZADAS
                        </div>
                        <div class="full-box tile-icon text-center">
                            <i class="zmdi zmdi-layers-off"></i>
                        </div>
                        <div class="full-box tile-number text-titles">
                            <p class="full-box">10</p>
                            <small>Registrado</small>
                        </div>
                    </article>
                </div>         
<?php    
                break;
            }   
        }
?>
		<div class="container-fluid">
			<div class="page-header">
			      <h1 class="text-titles">Principal <small>Historias Recientes</small></h1>
			</div>
			<section id="cd-timeline" class="cd-container">
                <div class="cd-timeline-block">
                    <div class="cd-timeline-img">
                        <img src="../assets/users/<?php echo $_SESSION['id_usuario'] ?>.jpg" alt="user-picture">
                    </div>
                    <div class="cd-timeline-content">
                        <h4 class="text-center text-titles">1 - Nombre (Administrador)</h4>
                        <p class="text-center">
                            <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Start: <em>7:00 AM</em> &nbsp;&nbsp;&nbsp; 
                            <i class="zmdi zmdi-time zmdi-hc-fw"></i> End: <em>7:17 AM</em>
                        </p>
                        <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 07/07/2016</span>
                    </div>
                </div>  
                <div class="cd-timeline-block">
                    <div class="cd-timeline-img">
                        <img src="../assets/img/logo%20sotran%20circulo%20system.png" alt="user-picture">
                    </div>
                    <div class="cd-timeline-content">
                        <h4 class="text-center text-titles">2 - Nombre (Cliente)</h4>
                        <p class="text-center">
                            <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Start: <em>7:00 AM</em> &nbsp;&nbsp;&nbsp; 
                            <i class="zmdi zmdi-time zmdi-hc-fw"></i> End: <em>7:17 AM</em>
                        </p>
                        <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 07/07/2016</span>
                    </div>
                </div>
                <div class="cd-timeline-block">
                    <div class="cd-timeline-img">
                        <img src="../assets/users/<?php echo $_SESSION['id_usuario'] ?>.jpg" alt="user-picture">
                    </div>
                    <div class="cd-timeline-content">
                        <h4 class="text-center text-titles">3 - Nombre (Tecnico)</h4>
                        <p class="text-center">
                            <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Start: <em>7:00 AM</em> &nbsp;&nbsp;&nbsp; 
                            <i class="zmdi zmdi-time zmdi-hc-fw"></i> End: <em>7:17 AM</em>
                        </p>
                        <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 07/07/2016</span>
                    </div>
                </div>
                <div class="cd-timeline-block">
                    <div class="cd-timeline-img">
                        <img src="../assets/img/logo%20sotran%20circulo%20system.png" alt="user-picture">
                    </div>
                    <div class="cd-timeline-content">
                        <h4 class="text-center text-titles">4 - Name (Cliente)</h4>
                        <p class="text-center">
                            <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Start: <em>7:00 AM</em> &nbsp;&nbsp;&nbsp; 
                            <i class="zmdi zmdi-time zmdi-hc-fw"></i> End: <em>7:17 AM</em>
                        </p>
                        <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 07/07/2016</span>
                    </div>
                </div>   
            </section>


		</div>
        

	</section>

    <!-- Notifications area -->
    <section class="full-box Notifications-area">
	<div class="full-box Notifications-bg btn-Notifications-area"></div>
	<div class="full-box Notifications-body">
            <div class="Notifications-body-title text-titles text-center">
		Notificaciones
                <i class="zmdi zmdi-close btn-Notifications-area"></i>
            </div>
            <div class="list-group">
		<div class="list-group-item">
                    <div class="row-action-primary">
			<i class="zmdi zmdi-alert-triangle"></i>
                    </div>
                    <div class="row-content">
			<div class="least-content">17m</div>
                        <h4 class="list-group-item-heading">Mensaje</h4>
                        <p class="list-group-item-text">..............................</p>
                    </div>
                </div>
                <div class="list-group-separator"></div>
                <div class="list-group-item">
                    <div class="row-action-primary">
			<i class="zmdi zmdi-alert-octagon"></i>
                    </div>
                    <div class="row-content">
                        <div class="least-content">15m</div>
			<h4 class="list-group-item-heading">Mensaje</h4>
			<p class="list-group-item-text">..............................</p>
                    </div>
		</div>
		<div class="list-group-separator"></div>
                <div class="list-group-item">
                    <div class="row-action-primary">
			<i class="zmdi zmdi-help"></i>
                    </div>
                    <div class="row-content">
                        <div class="least-content">10m</div>
                        <h4 class="list-group-item-heading">Mensaje</h4>
                        <p class="list-group-item-text">..............................</p>
                    </div>
		</div>
		<div class="list-group-separator"></div>
		<div class="list-group-item">
                    <div class="row-action-primary">
			<i class="zmdi zmdi-info"></i>
                    </div>
                    <div class="row-content">
                        <div class="least-content">8m</div>
                        <h4 class="list-group-item-heading">Mensaje</h4>
			<p class="list-group-item-text">..............................</p>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Ayuda</h4>
		</div>
		<div class="modal-body">
                    <p>Para solicitar ayuda con el sistema o servicio comuniquese con el area administrativa o el area de TI.</p>
                    <p>Atte: Sotrans</p>
                    
                    <p>Telefono de Area Adminstrativa: *******</p>
                    <p>Telefono de Area de TI: 947984765</p>
		</div>
		<div class="modal-footer">
		    <button type="button" class="btn btn-primary btn-raised" data-dismiss="modal">
                        <i class="zmdi zmdi-thumb-up"></i>
                        Ok
                    </button>
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
    <script src="../Funciones/javascript.js"></script> 
    
    
   
    <script>
	$.material.init();
    </script>
    
    <script type="text/javascript">
        $(document).ready( function () 
        {
            CargarMenu();
        });
    </script>
    
    <!- prueba de push -->
    <script src="../js/push.min.js"></script>
    
    
    <?php
        $tap='<script>
        Push.create("Notificacion",{
            body:"Notificacion de prueba", 
            icon:"../assets/users/2.jpg",
            timeout:4000,
            onClick: function(){
                window.location="http://www.google.com.pe";
                this.close();
            }
        });
    </script>';
    
    echo $tap;
    ?>
    
</body>
</html>