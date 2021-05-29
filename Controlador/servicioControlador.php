<?php
    require_once '../Modelo/Dao/servicioDao.php';
    require_once '../Modelo/Bean/servicioBean.php';

    if(isset($_POST['op']))
    {
        $op=$_POST['op'];
    }
    else if(isset($_GET['op']))
    {
        $op=$_GET['op'];
    }

    session_start();
    $Codigo_usu =  $_SESSION['id_usuario'];
    $Area_personal = $_SESSION['Area_personal'];
    $Codigo_per = $_SESSION['id_personal'];


    switch($Area_personal)
    {
        case 'Ventas':
        {
            switch ($op)
            {
                case 1: 
                {  
                    $servicioDao = new servicioDao();
                    $listaServicios= $servicioDao->ServiciosTodos();

                    unset($_SESSION['listaServicios']);
                    $_SESSION['listaServicios']=$listaServicios;

                    $pagina="../Vista/VistasModulos/vtsServicios.php?op=".$op;
                    
                    break;
                }
                case 2: 
                { 
                    
                    if(!isset($_GET['op2']))
                    {

                        $pagina="../Vista/VistasModulos/vtsServicios.php?op=".$op;
                    }
                    else
                    {
                        $op2=$_GET['op2'];
                        switch ($op2)
                        {
                            case 1:
                            {
                                $respons = array();
                                $data =(array)json_decode($_POST['data']);
                                
                                $txtNombreServ = $data['txtNombreServ'];
                                
                                $servicioDao = new servicioDao();
                                $estado= $servicioDao->RegistrarServicio($txtNombreServ);
                                
                                $respons = array('STATUS' => $estado);
                                echo json_encode($respons);

                                exit();
                                break;
                            }
                        }
                    }
                    break;
                }
                case 3: 
                { 
                    $ctod = new contratoDao();
                    $listaContratosFinalizados= $ctod->ContratosFinalizadosCliente($Codigo_cli);
                    
                    unset($_SESSION['listaContratosFinalizados']);
                    $_SESSION['listaContratosFinalizados']=$listaContratosFinalizados;
                    
                    //cargar datos de equipos
                    $ed = new equipoDao();
                    $listaEquipos= $ed->EquiposTodos();
                    
                    unset($_SESSION['listaEquipos']);
                    $_SESSION['listaEquipos']=$listaEquipos;
                    
                    $pagina="../Vista/VistasModulos/vtsContratos.php?op=".$op;
                    break;
                }
                case 4: 
                { 
                    //cargar datos de equipos
                    $ctod = new contratoDao();
                    $listaContratosCancelados= $ctod->ContratosCanceladosCliente($Codigo_cli);
                    
                    unset($_SESSION['listaContratosCancelados']);
                    $_SESSION['listaContratosCancelados']=$listaContratosCancelados;
                    
                    $pagina="../Vista/VistasModulos/vtsContratos.php?op=".$op;
                    break;
                }
            }
            break;
        }
            
    }
    header("Location:".$pagina);

    

?>