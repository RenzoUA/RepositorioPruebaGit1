<?php
    require_once '../Modelo/Bean/clienteBean.php';
    require_once '../Modelo/Dao/clienteDao.php';

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
                    $clienteDao = new clienteDao();
                    $listaCliente= $clienteDao->ClientesTodos();

                    unset($_SESSION['listaCliente']);
                    $_SESSION['listaCliente']=$listaCliente;

                    $pagina="../Vista/VistasModulos/vtsClientes.php?op=".$op;
                    break;
                }
                case 2: 
                { 
                    if(!isset($_GET['op2']))
                    {
                        $clienteDao = new clienteDao();
                        $listaConfianza= $clienteDao->Confianza();
                        unset($_SESSION['listaConfianza']);
                        $_SESSION['listaConfianza']=$listaConfianza;
                        
                        $pagina="../Vista/VistasModulos/vtsClientes.php?op=".$op;
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

                                
                                $clienteBean = new clienteBean();
                                $clienteBean->setRuc_cli($data['txtRucCli']);
                                $clienteBean->setRsocial_cli($data['txtRSocialCli']);
                                $clienteBean->setNcomercial_cli($data['txtNombreComCli']);
                                $clienteBean->setTipo_cli($data['txtTipoCli']);
                                $clienteBean->setEstado_cli($data['txtEstadoCli']);
                                $clienteBean->setCondicion_cli($data['txtCondicionCli']);
                                $clienteBean->setDireccion_cli($data['txtDireccionCli']);
                                $clienteBean->setDepartamento_cli($data['txtDepartamentoCli']);
                                $clienteBean->setProvincia_cli($data['txtProvinciaCli']);
                                $clienteBean->setDistrito_cli($data['txtDistritoCli']);
                                $clienteBean->setActeconomica_cli($data['txtActEcoCli']);
                                $clienteBean->setPersona_cli($data['txtPersonaCli']);
                                $clienteBean->setTelefono_cli($data['txtTelefonoCli']);
                                $clienteBean->setCodigo_cofnz($data['sltCodigoCofnz']);
                                
                                
                                
                                
                                $clienteDao = new clienteDao();
                                $estado = $clienteDao->RegistrarCliente($clienteBean);

                                
                                $respons = array('STATUS' => $estado);
                                echo json_encode($respons);

                                exit();
                                
                                break;
                            }
                            case 2:
                            {
                                
                                $respons = array();
                                $data =(array)json_decode($_POST['data']);
                                
                                $txtRucCli = $data['txtRucCli'];
                                
                                $responsSunat = file_get_contents("https://dniruc.apisperu.com/api/v1/ruc/".$txtRucCli."?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InJlbnpvLjI4LjEwLjk4QGdtYWlsLmNvbSJ9.-k7w83iqRYvm5CVDbiz56jQT9CiuWALyUyzTiKFlniY");
                                
                                $info = (array)json_decode($responsSunat);
                                
                                if($info=='[]' || empty($info))
                                {
                                    $respons = array('STATUS' => false);
                                }
                                else
                                {
                                    $respons = array(
                                        'STATUS' => true,
                                        'ruc' => $info['ruc'], 
                                        'razonSocial' => $info['razonSocial'],
                                        'nombreComercial' => $info['nombreComercial'],
                                        'tipo' => $info['tipo'],
                                        'estado' => $info['estado'],
                                        'condicion' => $info['condicion'],
                                        'direccion' => $info['direccion'],
                                        'departamento' => $info['departamento'],
                                        'provincia' => $info['provincia'],
                                        'distrito' => $info['distrito'],
                                        'actEconomicas' => $info['actEconomicas']
                                    );
                                }
                                
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
                    
                    break;
                }
                case 4: 
                { 
                    $codigo_estbl = $_SESSION['id_establecimiento'];
                    
                    date_default_timezone_set("America/Lima");
                    $finicio_mdlencst = date("Y-m-d H:m:s");

                    $data =(array)json_decode($_POST['data']);
                    $codigo_mdlencst = $data['codigo_mdlencst'];
                    
                    $encuestaBean = new encuestaBean();
                    $encuestaBean->setFinicio_mdlencst($finicio_mdlencst);
                    $encuestaBean->setCodigo_mdlencst($codigo_mdlencst);
                    $encuestaBean->setCodigo_estbl($codigo_estbl);
                    
                    $encuestaDao = new encuestaDao();
                    
                    $estado = $encuestaDao->FinalizarEncuestasPublicadas($encuestaBean);
                    if($estado==true)
                    {
                        $estado = $encuestaDao->PublicarEncuesta($encuestaBean);
                    }
                    $respons = array('STATUS' => $estado);
                    echo json_encode($respons);

                    exit();
                    break;
                }
                case 5: 
                { 
                     
                    break;
                }
                case 6: 
                { 

                    break;
                }
                case 7: 
                { 
                    
                    break;
                }
            }
            //$pagina="../Vista/VistasModulos/vtsEncuestas.php?op=".$op;
            break;
        }
            
        case 'TI':
        {
            
            switch ($op)
            {
                case 1: 
                { 
                    if(!isset($_GET['op2']))
                    {
                        //cargar datos de ticket
                        //$td = new ticketDao();
                        //$listaTickets= $td->TicketsCliente($Codigo_cli);

                        //unset($_SESSION['listaTickets']);
                        //$_SESSION['listaTickets']=$listaTickets;

                        $pagina="../Vista/VistasModulos/vtsClientes.php?op=".$op;
                        break;
                    }
                    else
                    {
                        $op2=$_GET['op2'];
                        switch ($op2)
                        {
                            case 1:
                            {
                                date_default_timezone_set("America/Lima");
                                
                                $Tiempo_tic = date("Y-m-d H:m:s");
                                $Codigo_tipoCli = $_SESSION['id_tipoCliente'];
                                
                                $respons = array();

                                $data =(array)json_decode($_POST['data']);
                                
                                $txtProblemaTic = $data['txtProblemaTic'];
                                $sltCodigoEqui = $data['sltCodigoEqui'];
                                $sltCodigoSede = $data['sltCodigoSede'];
                                $txtDepartamentoTic = $data['txtDepartamentoTic'];
                                $txtDistritoTic = $data['txtDistritoTic'];
                                $txtDireccionTic = $data['txtDireccionTic'];
                                $txtUbicacionTic = $data['txtUbicacionTic'];
                                $txtReferenciaTic = $data['txtReferenciaTic'];
                                $sltCodigoContacto = $data['sltCodigoContacto'];
                                $txtNombreContacto_tic = $data['txtNombreContacto_tic'];
                                $txtApellidoContacto_tic = $data['txtApellidoContacto_tic'];
                                $txtCargoContacto_tic = $data['txtCargoContacto_tic'];
                                $txtCorreoContacto_tic = $data['txtCorreoContacto_tic'];
                                $txtTelefonoContacto_tic = $data['txtTelefonoContacto_tic'];
                                
                                
                                $ticb = new ticketBean();
                                $ticb->setCaso_tic($txtProblemaTic);
                                $ticb->setCodigo_equi($sltCodigoEqui);
                                $ticb->setCodigo_sede($sltCodigoSede);
                                $ticb->setDepartamento_tic($txtDepartamentoTic);
                                $ticb->setDistrito_tic($txtDistritoTic);
                                $ticb->setDireccion_tic($txtDireccionTic);
                                $ticb->setUbicacion_tic($txtUbicacionTic);
                                $ticb->setReferencia_tic($txtReferenciaTic);
                                $ticb->setCodigo_contacto($sltCodigoContacto);
                                $ticb->setNombre_contacto_tic($txtNombreContacto_tic);
                                $ticb->setApellido_contacto_tic($txtApellidoContacto_tic);
                                $ticb->setCargo_contacto_tic($txtCargoContacto_tic);
                                $ticb->setCorreo_contacto_tic($txtCorreoContacto_tic);
                                $ticb->setTelefono_contacto_tic($txtTelefonoContacto_tic);
                                
                                $ticb->setTiempo_tic($Tiempo_tic);
                                $ticb->setCodigo_cli($Codigo_cli);
                                $ticb->setCodigo_tipoCli($Codigo_tipoCli);
                                
                                $ticd = new ticketDao();
                                $estado=true;
                                if($sltCodigoContacto==0)
                                {
                                    $arrayContacto = $ticd->registrarContacto($ticb);
                                    
                                    $estado = $arrayContacto['estado'];
                                    if($estado==true)
                                    {
                                        $sltCodigoContacto = $arrayContacto['codigo'];
                                        $ticb->setCodigo_contacto($sltCodigoContacto);
                                    }
                                }
                                else
                                {
                                    $estadoComparacion = $ticd->compararContacto($ticb);
                                    if($estadoComparacion==false)
                                    {
                                        $estadoActualizacion = $ticd->actualizarContacto($ticb);
                                    }
                                }
                                
                                $estado = $ticd->crearTicket($ticb);
                                
                                $sd = new sedeDao();
                                $estadoComparacion = $sd->compararSedeEquipo($ticb);
                                if($estadoComparacion == false)
                                {
                                    $estadoActualizacion = $sd->actualizarSede($ticb);
                                    
                                    $estadoActualizacion2 = $sd->actualizarEquipo_Contrato($ticb);

                                }
                                
                                $respons = array('STATUS' => $estado);
                                echo json_encode($respons);
                                
                                exit();
                                break;
                            }
                            case 2:
                            {
                                $data =(array)json_decode($_POST['data']);
                                $sltCodigoEqui = $data['sltCodigoEqui'];
                                //cargar datos de sede
                                $sd = new sedeDao();
                                $listaSedes= $sd->SedeEquipo($sltCodigoEqui);
                                
                                foreach ($listaSedes as  $mostrar)
                                {  
                                    
                                    $codigo_sede=$mostrar['codigo_sede'];
                                    $nombre_sede=$mostrar['nombre_sede'];
                                    
                                    $respons = array('codigo_sede' => $codigo_sede,  'nombre_sede' => $nombre_sede );
                                    echo json_encode($respons);
                                }  
                                exit();
                                break;
                            }
                            case 3:
                            {
                                $data =(array)json_decode($_POST['data']);
                                $sltCodigoEqui = $data['sltCodigoEqui'];
                                $sltCodigoSede = $data['sltCodigoSede'];
                                //cargar datos de sede
                                $sd = new sedeDao();
                                $listaSedes= $sd->DatosSedeEquipo($sltCodigoEqui, $sltCodigoSede);
                                
                                foreach ($listaSedes as  $mostrar)
                                {  
                                    $nombre_sede=$mostrar['nombre_sede'];
                                    $departamento_sede=$mostrar['departamento_sede'];
                                    $distrito_sede=$mostrar['distrito_sede'];
                                    $direccion_sede=$mostrar['direccion_sede'];
                                    $ubicacion_equi=$mostrar['ubicacion_equi'];
                                    
                                    $respons = array(
                                        'nombre_sede' => $nombre_sede , 
                                        'departamento_sede' => $departamento_sede ,  
                                        'distrito_sede' => $distrito_sede ,  
                                        'direccion_sede' => $direccion_sede ,   
                                        'ubicacion_equi' => $ubicacion_equi  );
                                    echo json_encode($respons);
                                }  
                                exit();
                                break;
                            }
                            case 4:
                            {
                                $data =(array)json_decode($_POST['data']);
                                $sltCodigoContacto = $data['sltCodigoContacto'];
                                //cargar datos de contactos
                                $ticd = new ticketDao();
                                $listaContactos= $ticd->DatosContacto($sltCodigoContacto);
                                
                                foreach ($listaContactos as  $mostrar)
                                {  
                                    $nombre_contacto=$mostrar['nombre_contacto'];
                                    $apellido_contacto=$mostrar['apellido_contacto'];
                                    $cargo_contacto=$mostrar['cargo_contacto'];
                                    $correo_contacto=$mostrar['correo_contacto'];
                                    $telefono_contacto=$mostrar['telefono_contacto'];
                                    
                                    $respons = array(
                                        'nombre_contacto' => $nombre_contacto , 
                                        'apellido_contacto' => $apellido_contacto ,  
                                        'cargo_contacto' => $cargo_contacto ,  
                                        'correo_contacto' => $correo_contacto ,   
                                        'telefono_contacto' => $telefono_contacto  );
                                    echo json_encode($respons);
                                }  
                                exit();
                                break;
                            }
                        }
                        
                    }
                    break; 
                }
                case 2: 
                { 
                     //cargar datos de ticket
                    $td = new ticketDao();
                    $listaTickets= $td->TicketsCliente($Codigo_cli);

                    unset($_SESSION['listaTickets']);
                    $_SESSION['listaTickets']=$listaTickets;
                    
                    $pagina="../Vista/VistasModulos/vtsTickets.php?op=".$op;
                    break;
                }
                case 3: 
                { 
                    $td = new ticketDao();
                    $listaTickets= $td->TicketsEnProcesoCliente($Codigo_cli);
                    
                    unset($_SESSION['listaTickets']);
                    $_SESSION['listaTickets']=$listaTickets;   
                    
                    $pagina="../Vista/VistasModulos/vtsTickets.php?op=".$op;
                    break;
                }
                case 4: 
                { 

                    break;
                }
            }
            break;
        }
            
    }
    header("Location:".$pagina);


    ?>