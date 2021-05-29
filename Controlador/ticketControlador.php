<?php
    require_once '../Modelo/Bean/ticketBean.php';
    require_once '../Modelo/Dao/ticketDao.php';

    require_once '../Modelo/Bean/equipoBean.php';
    require_once '../Modelo/Dao/equipoDao.php';

    require_once '../Modelo/Bean/sedeBean.php';
    require_once '../Modelo/Dao/sedeDao.php';

    require_once '../Modelo/Bean/tecnicoBean.php';
    require_once '../Modelo/Dao/tecnicoDao.php';

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
    $Tipo_usu = $_SESSION['Tipo_usuario'];




    switch($Tipo_usu)
    {
        case 'Cliente':
        {
            $Codigo_cli = $_SESSION['id_cliente'];
            switch ($op)
            {
                case 1: 
                { 
                    if(!isset($_GET['op2']))
                    {
                        //cargar datos de ticket
                        $td = new ticketDao();
                        $listaTickets= $td->TicketsCliente($Codigo_cli);

                        unset($_SESSION['listaTickets']);
                        $_SESSION['listaTickets']=$listaTickets;

                        $pagina="../Vista/VistasModulos/vtsTickets.php?op=".$op;
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
            break;
        }
        case 'Tecnico':
        {
            $Codigo_tec = $_SESSION['id_tecnico'];
            switch ($op)
            {
                case 1: 
                { 
                    //cargar datos de tickets
                    $td = new ticketDao();
                    $listaTickets= $td->TicketsTecnico($Codigo_tec);

                    unset($_SESSION['listaTickets']);
                    $_SESSION['listaTickets']=$listaTickets;

                    $pagina="../Vista/VistasModulos/vtsTickets.php?op=".$op;
                    break;
                }
                case 2: 
                { 
                     
                    break;
                }
                case 3: 
                { 
                     
                     break;
                }
                case 4: 
                { 

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
            $pagina="../Vista/VistasModulos/vtsTickets.php?op=".$op;
            break;
        }
        case 'Administrador':
        {
            $Codigo_adm = $_SESSION['id_administrador'];
            switch ($op)
            {
                case 1: 
                { 
                    //cargar datos de tickets
                    $td = new ticketDao();
                    $listaTickets= $td->Tickets();

                    unset($_SESSION['listaTickets']);
                    $_SESSION['listaTickets']=$listaTickets;

                    $pagina="../Vista/VistasModulos/vtsTickets.php?op=".$op;
                    
                    break;
                }
                case 2: 
                { 
                     
                    break;
                }
                case 3: 
                { 
                     
                     break;
                }
                case 4: 
                { 

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
                case 8: 
                { 
                    
                    break;
                }
                case 9: 
                { 
                    
                    break;
                }
                case 10: 
                { 
                    if(!isset($_GET['op2']))
                    {
                        $Codigo_tic=$_GET['cod'];
                        //cargar datos de tecnicos
                        $tecd = new tecnicoDao();
                        $listaTecnicos= $tecd->TecnicosActivos();
                        unset($_SESSION['listaTecnicos']);
                        $_SESSION['listaTecnicos']=$listaTecnicos;


                        $ticd = new ticketDao();
                        $listaTickets= $ticd->DatosTicket($Codigo_tic);

                        unset($_SESSION['listaTickets']);
                        $_SESSION['listaTickets']=$listaTickets;   

                        $pagina="../Vista/VistasModulos/vtsTickets.php?op=".$op;
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
                                
                                $data =(array)json_decode($_POST['data']);
                                $sltCodigo_tec = $data['sltCodigo_tec'];
                                $Codigo_tic = $data['codigo_tic'];
                                
                                $ticb = new ticketBean();
                                
                                $ticb->setCodigo_tic($Codigo_tic);
                                $ticb->setCodigo_tec($sltCodigo_tec);
                                $ticb->setCodigo_adm($Codigo_adm);
                                $ticb->setTiempo_tic($Tiempo_tic);
                                
                                
                                $ticd = new ticketDao();
                                $listaTickets= $ticd->TablaTicket($Codigo_tic);
                                
                                foreach ($listaTickets as  $mostrar)
                                 {  
                                    $caso_tic=$mostrar['caso_tic'];
                                    $nombre_contacto_tic=$mostrar['nombre_contacto_tic'];
                                    $cargo_contacto_tic=$mostrar['cargo_contacto_tic'];
                                    $correo_contacto_tic=$mostrar['correo_contacto_tic'];
                                    $telefono_contacto_tic=$mostrar['telefono_contacto_tic'];
                                    $departamento_tic=$mostrar['departamento_tic'];
                                    $distrito_tic=$mostrar['distrito_tic'];
                                    $direccion_tic=$mostrar['direccion_tic'];
                                    $ubicacion_tic=$mostrar['ubicacion_tic'];
                                    $referencia_tic=$mostrar['referencia_tic'];
                                    $equi_ext_tic=$mostrar['equi_ext_tic'];
                                    $codigo_cli=$mostrar['codigo_cli'];
                                    $codigo_equi=$mostrar['codigo_equi'];
                                    $codigo_estadoTic=$mostrar['codigo_estadoTic'];
                                    $codigo_sede=$mostrar['codigo_sede'];
                                    $codigo_tipoCli=$mostrar['codigo_tipoCli'];
                                    $codigo_contacto=$mostrar['codigo_contacto'];
                                
                                    $ticb->setCaso_tic($caso_tic);
                                    $ticb->setNombre_contacto_tic($nombre_contacto_tic);
                                    $ticb->setCargo_contacto_tic($cargo_contacto_tic);
                                    $ticb->setCorreo_contacto_tic($correo_contacto_tic);
                                    $ticb->setTelefono_contacto_tic($telefono_contacto_tic);
                                    $ticb->setDepartamento_tic($departamento_tic);
                                    $ticb->setDistrito_tic($distrito_tic);
                                    $ticb->setDireccion_tic($direccion_tic);
                                    $ticb->setUbicacion_tic($ubicacion_tic);
                                    $ticb->setReferencia_tic($referencia_tic);
                                    $ticb->setEqui_ext_tic($equi_ext_tic);
                                    $ticb->setCodigo_cli($codigo_cli);
                                    $ticb->setCodigo_equi($codigo_equi);
                                    $ticb->setCodigo_estadoTic($codigo_estadoTic);
                                    $ticb->setCodigo_sede($codigo_sede);
                                    $ticb->setCodigo_tipoCli($codigo_tipoCli);
                                    $ticb->setCodigo_contacto($codigo_contacto);
                                    
                                } 
                                
                                $estado=$ticd->AsignarTecnico($ticb);
                                
                                $respons = array('STATUS' => $estado);
                                echo json_encode($respons);
                                
                                exit();
                                break;
                            }
                            case 2:
                            {
                                $data =(array)json_decode($_POST['data']);
                                $sltCodigo_tec = $data['sltCodigo_tec'];
                                //cargar datos de contactos
                                $tecd = new tecnicoDao();
                                $listaTecnicos= $tecd->DatosTecnico($sltCodigo_tec);
                                
                                foreach ($listaTecnicos as  $mostrar)
                                {  
                                    $nombre_tipoTec=$mostrar['nombre_tipoTec'];
                                    $nombre_tec=$mostrar['nombre_tec'];
                                    $apellido_tec=$mostrar['apellido_tec'];
                                    $nombre_usu=$mostrar['nombre_usu'];
                                    $correo_tec=$mostrar['correo_tec'];
                                    $nombre_estadoUsu=$mostrar['nombre_estadoUsu'];
                                    $telefono_tec=$mostrar['telefono_tec'];
                                    $telefono2_tec=$mostrar['telefono2_tec'];
                                    $dni_tec=$mostrar['dni_tec'];
                                    $sueldo_tec=$mostrar['sueldo_tec'];
                                    $nombre_estadoTec=$mostrar['nombre_estadoTec'];
                                    $codigo_estadoTec=$mostrar['codigo_estadoTec'];
                                    
                                    $respons = array(
                                        'nombre_tipoTec' => $nombre_tipoTec , 
                                        'nombre_tec' => $nombre_tec ,  
                                        'apellido_tec' => $apellido_tec ,  
                                        'nombre_usu' => $nombre_usu ,
                                        'correo_tec' => $correo_tec ,
                                        'nombre_estadoUsu' => $nombre_estadoUsu ,
                                        'telefono_tec' => $telefono_tec , 
                                        'telefono2_tec' => $telefono2_tec , 
                                        'dni_tec' => $dni_tec , 
                                        'sueldo_tec' => $sueldo_tec ,   
                                        'nombre_estadoTec' => $nombre_estadoTec ,
                                        'codigo_estadoTec' => $codigo_estadoTec  );
                                    echo json_encode($respons);
                                }  
                                exit();
                                break;
                            }
                        }
                    }
                    break;
                }
                case 11: 
                { 
                    break;
                }
                case 12: 
                { 
                    date_default_timezone_set("America/Lima");
                    $Tiempo_tic = date("Y-m-d H:m:s");

                    $data =(array)json_decode($_POST['data']);
                    $Codigo_tic = $data['codigo_tic'];
                    
                    $ticb = new ticketBean();
                                
                    $ticb->setCodigo_tic($Codigo_tic);
                    $ticb->setTiempo_tic($Tiempo_tic);

                    $ticd = new ticketDao();
                    $listaTickets= $ticd->TablaTicket($Codigo_tic);

                    foreach ($listaTickets as  $mostrar)
                     {  
                        $caso_tic=$mostrar['caso_tic'];
                        $nombre_contacto_tic=$mostrar['nombre_contacto_tic'];
                        $cargo_contacto_tic=$mostrar['cargo_contacto_tic'];
                        $correo_contacto_tic=$mostrar['correo_contacto_tic'];
                        $telefono_contacto_tic=$mostrar['telefono_contacto_tic'];
                        $departamento_tic=$mostrar['departamento_tic'];
                        $distrito_tic=$mostrar['distrito_tic'];
                        $direccion_tic=$mostrar['direccion_tic'];
                        $ubicacion_tic=$mostrar['ubicacion_tic'];
                        $referencia_tic=$mostrar['referencia_tic'];
                        $equi_ext_tic=$mostrar['equi_ext_tic'];
                        $codigo_cli=$mostrar['codigo_cli'];
                        
                        $codigo_adm=$mostrar['codigo_adm'];
                        $codigo_tec=$mostrar['codigo_tec'];
                        
                        $codigo_equi=$mostrar['codigo_equi'];
                        $codigo_estadoTic=$mostrar['codigo_estadoTic'];
                        $codigo_sede=$mostrar['codigo_sede'];
                        $codigo_tipoCli=$mostrar['codigo_tipoCli'];
                        $codigo_contacto=$mostrar['codigo_contacto'];

                        $ticb->setCaso_tic($caso_tic);
                        $ticb->setNombre_contacto_tic($nombre_contacto_tic);
                        $ticb->setCargo_contacto_tic($cargo_contacto_tic);
                        $ticb->setCorreo_contacto_tic($correo_contacto_tic);
                        $ticb->setTelefono_contacto_tic($telefono_contacto_tic);
                        $ticb->setDepartamento_tic($departamento_tic);
                        $ticb->setDistrito_tic($distrito_tic);
                        $ticb->setDireccion_tic($direccion_tic);
                        $ticb->setUbicacion_tic($ubicacion_tic);
                        $ticb->setReferencia_tic($referencia_tic);
                        $ticb->setEqui_ext_tic($equi_ext_tic);
                        $ticb->setCodigo_cli($codigo_cli);
                        $ticb->setCodigo_adm($codigo_adm);
                        $ticb->setCodigo_tec($codigo_tec);
                        $ticb->setCodigo_equi($codigo_equi);
                        $ticb->setCodigo_estadoTic($codigo_estadoTic);
                        $ticb->setCodigo_sede($codigo_sede);
                        $ticb->setCodigo_tipoCli($codigo_tipoCli);
                        $ticb->setCodigo_contacto($codigo_contacto);

                    } 

                    $estado=$ticd->PausarTicket($ticb);

                    $respons = array('STATUS' => $estado);
                    echo json_encode($respons);

                    exit();
                    
                    break;
                }
                case 13: 
                { 
                    date_default_timezone_set("America/Lima");
                    $Tiempo_tic = date("Y-m-d H:m:s");

                    $data =(array)json_decode($_POST['data']);
                    $Codigo_tic = $data['codigo_tic'];
                    
                    $ticb = new ticketBean();
                                
                    $ticb->setCodigo_tic($Codigo_tic);
                    $ticb->setTiempo_tic($Tiempo_tic);

                    $ticd = new ticketDao();
                    $listaTickets= $ticd->TablaTicket($Codigo_tic);

                    foreach ($listaTickets as  $mostrar)
                     {  
                        $caso_tic=$mostrar['caso_tic'];
                        $nombre_contacto_tic=$mostrar['nombre_contacto_tic'];
                        $cargo_contacto_tic=$mostrar['cargo_contacto_tic'];
                        $correo_contacto_tic=$mostrar['correo_contacto_tic'];
                        $telefono_contacto_tic=$mostrar['telefono_contacto_tic'];
                        $departamento_tic=$mostrar['departamento_tic'];
                        $distrito_tic=$mostrar['distrito_tic'];
                        $direccion_tic=$mostrar['direccion_tic'];
                        $ubicacion_tic=$mostrar['ubicacion_tic'];
                        $referencia_tic=$mostrar['referencia_tic'];
                        $equi_ext_tic=$mostrar['equi_ext_tic'];
                        $codigo_cli=$mostrar['codigo_cli'];
                        $codigo_adm=$mostrar['codigo_adm'];
                        $codigo_tec=$mostrar['codigo_tec'];
                        $codigo_equi=$mostrar['codigo_equi'];
                        $codigo_estadoTic=$mostrar['codigo_estadoTic'];
                        $codigo_sede=$mostrar['codigo_sede'];
                        $codigo_tipoCli=$mostrar['codigo_tipoCli'];
                        $codigo_contacto=$mostrar['codigo_contacto'];

                        $ticb->setCaso_tic($caso_tic);
                        $ticb->setNombre_contacto_tic($nombre_contacto_tic);
                        $ticb->setCargo_contacto_tic($cargo_contacto_tic);
                        $ticb->setCorreo_contacto_tic($correo_contacto_tic);
                        $ticb->setTelefono_contacto_tic($telefono_contacto_tic);
                        $ticb->setDepartamento_tic($departamento_tic);
                        $ticb->setDistrito_tic($distrito_tic);
                        $ticb->setDireccion_tic($direccion_tic);
                        $ticb->setUbicacion_tic($ubicacion_tic);
                        $ticb->setReferencia_tic($referencia_tic);
                        $ticb->setEqui_ext_tic($equi_ext_tic);
                        $ticb->setCodigo_cli($codigo_cli);
                        $ticb->setCodigo_adm($codigo_adm);
                        $ticb->setCodigo_tec($codigo_tec);
                        $ticb->setCodigo_equi($codigo_equi);
                        $ticb->setCodigo_estadoTic($codigo_estadoTic);
                        $ticb->setCodigo_sede($codigo_sede);
                        $ticb->setCodigo_tipoCli($codigo_tipoCli);
                        $ticb->setCodigo_contacto($codigo_contacto);

                    } 

                    $estado=$ticd->ReiniciarTicket($ticb);

                    $respons = array('STATUS' => $estado);
                    echo json_encode($respons);

                    exit();
                    break;
                }
                case 14: 
                { 
                    
                    date_default_timezone_set("America/Lima");
                    $Tiempo_tic = date("Y-m-d H:m:s");

                    $data =(array)json_decode($_POST['data']);
                    $Codigo_tic = $data['codigo_tic'];
                    
                    $ticb = new ticketBean();
                                
                    $ticb->setCodigo_tic($Codigo_tic);
                    $ticb->setTiempo_tic($Tiempo_tic);

                    $ticd = new ticketDao();
                    $listaTickets= $ticd->TablaTicket($Codigo_tic);

                    foreach ($listaTickets as  $mostrar)
                     {  
                        $caso_tic=$mostrar['caso_tic'];
                        $nombre_contacto_tic=$mostrar['nombre_contacto_tic'];
                        $cargo_contacto_tic=$mostrar['cargo_contacto_tic'];
                        $correo_contacto_tic=$mostrar['correo_contacto_tic'];
                        $telefono_contacto_tic=$mostrar['telefono_contacto_tic'];
                        $departamento_tic=$mostrar['departamento_tic'];
                        $distrito_tic=$mostrar['distrito_tic'];
                        $direccion_tic=$mostrar['direccion_tic'];
                        $ubicacion_tic=$mostrar['ubicacion_tic'];
                        $referencia_tic=$mostrar['referencia_tic'];
                        $equi_ext_tic=$mostrar['equi_ext_tic'];
                        $codigo_cli=$mostrar['codigo_cli'];
                        
                        $codigo_adm=$mostrar['codigo_adm'];
                        $codigo_tec=$mostrar['codigo_tec'];
                        
                        $codigo_equi=$mostrar['codigo_equi'];
                        $codigo_estadoTic=$mostrar['codigo_estadoTic'];
                        $codigo_sede=$mostrar['codigo_sede'];
                        $codigo_tipoCli=$mostrar['codigo_tipoCli'];
                        $codigo_contacto=$mostrar['codigo_contacto'];

                        $ticb->setCaso_tic($caso_tic);
                        $ticb->setNombre_contacto_tic($nombre_contacto_tic);
                        $ticb->setCargo_contacto_tic($cargo_contacto_tic);
                        $ticb->setCorreo_contacto_tic($correo_contacto_tic);
                        $ticb->setTelefono_contacto_tic($telefono_contacto_tic);
                        $ticb->setDepartamento_tic($departamento_tic);
                        $ticb->setDistrito_tic($distrito_tic);
                        $ticb->setDireccion_tic($direccion_tic);
                        $ticb->setUbicacion_tic($ubicacion_tic);
                        $ticb->setReferencia_tic($referencia_tic);
                        $ticb->setEqui_ext_tic($equi_ext_tic);
                        $ticb->setCodigo_cli($codigo_cli);
                        $ticb->setCodigo_adm($codigo_adm);
                        $ticb->setCodigo_tec($codigo_tec);
                        $ticb->setCodigo_equi($codigo_equi);
                        $ticb->setCodigo_estadoTic($codigo_estadoTic);
                        $ticb->setCodigo_sede($codigo_sede);
                        $ticb->setCodigo_tipoCli($codigo_tipoCli);
                        $ticb->setCodigo_contacto($codigo_contacto);

                    } 

                    $estado=$ticd->CancelarTicket($ticb);

                    $respons = array('STATUS' => $estado);
                    echo json_encode($respons);

                    exit();
                    break;
                }
                
            }
            break;
        }
            
    }
    header("Location:".$pagina);


    ?>