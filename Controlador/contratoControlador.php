<?php
    require_once '../Modelo/Dao/contratoDao.php';
    require_once '../Modelo/Bean/contratoBean.php';
    require_once '../Modelo/Bean/clienteBean.php';
    require_once '../Modelo/Dao/clienteDao.php';
    require_once '../Modelo/Bean/servicioBean.php';
    require_once '../Modelo/Dao/servicioDao.php';

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
                    
                    $ctod = new contratoDao();
                    $listaContratos= $ctod->ContratosTodos();

                    unset($_SESSION['listaContratos']);
                    $_SESSION['listaContratos']=$listaContratos;

                    $pagina="../Vista/VistasModulos/vtsContratos.php?op=".$op;
                    
                    break;
                }
                case 2: 
                { 
                    if(!isset($_GET['op2']))
                    {
                        
                        $clienteDao = new clienteDao();
                        $listaCliente= $clienteDao->ClientesTodos();

                        unset($_SESSION['listaCliente']);
                        $_SESSION['listaCliente']=$listaCliente;

                        //cargar datos de tipos de contratos
                        $contratoDao = new contratoDao();
                        $listaTiposContrato= $contratoDao->TiposContrato();

                        unset($_SESSION['listaTiposContrato']);
                        $_SESSION['listaTiposContrato']=$listaTiposContrato;

                        //cargar datos de servicios
                        $servicioDao = new servicioDao();
                        $listaServicios= $servicioDao->ServiciosTodos();

                        unset($_SESSION['listaServicios']);
                        $_SESSION['listaServicios']=$listaServicios;


                        $pagina="../Vista/VistasModulos/vtsContratos.php?op=".$op;
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
                                
                                
                                $sltCodigoCli=$data['sltCodigoCli'];
                                $txtCostoCto=$data['txtCostoCto'];
                                $sltCodigoTipoCto=$data['sltCodigoTipoCto'];
                                $sltCodigoServ=$data['sltCodigoServ'];
                                
                                
                                date_default_timezone_set("America/Lima");
                                $finicio_cto = date("Y-m-d H:m:s");
                                
                                $contratoDao = new contratoDao();
                                $estado = $contratoDao->RegistrarContrato($finicio_cto,$txtCostoCto,$sltCodigoCli,$sltCodigoTipoCto,$sltCodigoServ);
                                
                                
                                $respons = array('STATUS' => $estado);
                                echo json_encode($respons);

                                exit();
                                break;
                            }
                            case 2:
                            {
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