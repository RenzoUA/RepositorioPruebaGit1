<?php 
    session_start();
    switch($_SESSION['Area_personal'])
    {    
        case 'Ventas':
        {
?>            
                
            <li>
                <a href="frmPrincipal.php">
                    <i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Principal
                </a>
            </li>
            <li>
                <a href="frmClientes.php" >
                    <i class="zmdi zmdi-assignment-account"></i> Clientes
                </a>
            </li>
            <li>
                <a href="frmContratos.php" >
                    <i class="zmdi zmdi-assignment-o"></i> Contratos 
                </a>
            </li>
            <li>
                <a href="frmServicios.php" >
                    <i class="zmdi zmdi zmdi-case zmdi-hc-fw"></i> Servicios
                </a>
            </li>
            <!--<li>
                <a href="frmSolicitudes.php" >
                    <i class="zmdi zmdi-comment-more"></i> Solicitudes
                </a>
            </li>-->
                               
<?php       
            break;
        }    
        case 'TI':
        {
?>            
                
            <li>
                <a href="frmPrincipal.php">
                    <i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Principal
                </a>
            </li>
            <li>
                <a href="frmUsuario.php" >
                    <i class="zmdi zmdi-assignment-account"></i> Usuario
                </a>
            </li>
            <li>
                <a href="frmPrueba.php" >
                    <i class="zmdi zmdi-assignment-o"></i> Pruebas
                </a>
            </li>
                               
<?php       
            break;
        }    
        
    }   
?>
