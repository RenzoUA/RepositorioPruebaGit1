<?php
    session_start();
    $op=$_GET['op'];
    $Area_personal = $_SESSION['Area_personal'];
    switch($Area_personal)
    {    
        case 'Ventas':
        {   
            switch($op)
            {
                case 1:
                {
                    $listaContratos=$_SESSION['listaContratos'];                  
?>
                    <a class="btn btn-raised btn-secondary" href="javascript:OpcionesModulos('contratoControlador.php','2') "><i class="zmdi zmdi-account-add"></i> Registrar</a>
                    <br>
                    <br>
                    <table class="table table-hover text-center display responsive nowrap tablaList" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Codigo</th>
                                <th class="text-center">Fecha de Inicio</th>
                                <th class="text-center">Fecha de Finzalización</th>
                                <th class="text-center">Fecha de Cancelación</th>
                                <th class="text-center">Costo</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Tipo</th>
                                <th class="text-center">Empresa</th>
                                <th class="text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($listaContratos as  $mostrar)
                                {  
                                    $numero_cto=$mostrar['numero_cto'];
                                    $codigo_cto=$mostrar['codigo_cto'];
                                    $finicio_cto=$mostrar['finicio_cto'];
                                    $ffinal_cto=$mostrar['ffinal_cto'];
                                    $fcancel_cto=$mostrar['fcancel_cto'];
                                    $costo_cto=$mostrar['costo_cto'];
                                    $codigo_estadoCto=$mostrar['codigo_estadoCto'];
                                    $nombre_estadoCto=$mostrar['nombre_estadoCto'];
                                    $codigo_tipoCto=$mostrar['codigo_tipoCto'];
                                    $nombre_tipoCto=$mostrar['nombre_tipoCto'];
                                    $codigo_cli=$mostrar['codigo_cli'];
                                    $rsocial_cli=$mostrar['rsocial_cli'];
                                        ?> 
                            <tr>
                                <td><?php echo $numero_cto; ?></td>
                                <td><?php echo '# '.str_pad($codigo_cli, 5, "0", STR_PAD_LEFT); ?></td>
                                <td><?php echo $finicio_cto; ?></td>
                                <td><?php echo $ffinal_cto; ?></td>
                                <td><?php echo $fcancel_cto; ?></td>
                                <td><?php echo $costo_cto; ?></td>
                                <td><?php echo $nombre_estadoCto; ?></td>
                                <td><?php echo $nombre_tipoCto; ?></td>
                                <td><?php echo $rsocial_cli; ?></td>
                                <td>
                                    <a class="btn btn-raised btn-success btn-sm" href="javascript:EditarContrato(<?= $codigo_cto ?>);">Editar</a>
                                    <a class="btn btn-raised btn-danger btn-sm" href="javascript:EliminarContrato(<?= $codigo_cto ?>);">Eliminar</a>
                                </td>
                            </tr>
                            <?php   }  ?>
                        </tbody>
                    </table>
                    <script>
                        
                        table = $('.tablaList').DataTable();
                    </script>   
<?php
                    break;    
                }
                case 2:
                {
                    $listaCliente=$_SESSION['listaCliente'];
                    $listaServicios=$_SESSION['listaServicios'];
                    $listaTiposContrato=$_SESSION['listaTiposContrato'];
?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="center-block col-md-offset-1" style="width: 70%; background: #e8eef5; padding: 30px; border-radius: 30px; border: #c2cedc solid; box-shadow: 5px 10px 20px 0px #919294; max-width: 2000px; min-width: 280px;">
                                <form action="">
                                    <center><h4>Información del Contrato </h4></center>
                                    <br>
                                    <div class="form-group">
                                      <label class="control-label">Cliente</label>
                                        <select class="form-control" id="sltCodigoCli">
                                          <?php foreach ($listaCliente as  $mostrar)
                                                 {  
                                                    $codigo_cli=$mostrar['codigo_cli'];
                                                    $ruc_cli=$mostrar['ruc_cli'];
                                                    $rsocial_cli=$mostrar['rsocial_cli'];
                                            ?> 
                                          <option value="<?php echo $codigo_cli; ?>"> <?php   echo $ruc_cli." ".$rsocial_cli; ?></option>
                                          <?php   }  ?>
                                        </select>
                                    </div>
                                    <div class="form-group" id="dynamic_field">
                                      <label class="control-label">Servicio</label>
                                        <select class="form-control" id="sltCodigoServ" style="width:100% ">
                                          <?php foreach ($listaServicios as  $mostrar)
                                                 {  
                                                    $codigo_serv=$mostrar['codigo_serv'];
                                                    $nombre_serv=$mostrar['nombre_serv'];
                                            ?> 
                                          <option value="<?php echo $codigo_serv; ?>"> <?php   echo $nombre_serv; ?></option>
                                          <?php   }  ?>
                                        </select>
                                       <!-- <a class="btn btn-raised btn-secondary btn-sm md-trigger" style="position: absolute; right: 0px; top: 0; background-color: #888; color: #f5f5f5;" href="javascript:AñadirServicio();">AÑADIR</a>-->
                                    </div>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Monto (Soles)</label>
                                        <input class="form-control" type="text" id="txtCostoCto" onkeypress='return validaNumericos(event)' maxlength="9" required>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label">Tipo de contrato</label>
                                        <select class="form-control" id="sltCodigoTipoCto">
                                          <?php foreach ($listaTiposContrato as  $mostrar)
                                                 {  
                                                    $codigo_tipoCto=$mostrar['codigo_tipoCto'];
                                                    $nombre_tipoCto=$mostrar['nombre_tipoCto'];
                                            ?> 
                                          <option value="<?php echo $codigo_tipoCto; ?>"> <?php   echo $nombre_tipoCto; ?></option>
                                          <?php   }  ?>
                                        </select>
                                    </div>		    
                                    <p class="text-center">
                                        <a class="btn btn-info btn-raised" href="javascript:RegistrarContrato();"><i class="zmdi zmdi-floppy"></i> Registar Contrato</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- 28/11/2018 R.U.A descripcion: el nifty modals debe volver a llamarse su js devido a que tiene probelmas con ajax-->
	                <script src="../Niftymodals/jquery.niftymodals.js" type="text/javascript"></script>
                    <script>
                        /*
                        var i=0;
                        function  AñadirServicio() 
                        {
                            $('#btnRemover'+i+'').addClass('hide');
                            
                            i++;
                            
                            
                            var valorsltCodigoServ = $("#sltCodigoServ").val();
                            var textosltCodigoServ = $("#sltCodigoServ").text();
                            
                            $('#btnRemover'+i+'').addClass('hide');
                            
                            
                            $('#dynamic_field').append('<div id="row'+i+'" class="form-group label-floating is-empty">  <input class="form-control" type="text" id="txtCodigoServ" style="width:70%;" value="'+textosltCodigoServ+'" required>  <a type="button" id="btnRemover'+i+'" class="btn btn-danger" style="position: absolute; top: 0px; right: 0px;" href="javascript:RemoverServicio('+i+');">X</button> </div>');
                            
                        }
                        function RemoverServicio(id)
                        {
                            $('#row'+id+'').remove();
                            i--;
                            $('#btnRemover'+i+'').removeClass('hide');
                            
                        }*/
                        
                        function  RegistrarContrato() 
                        {
                            if(ValidarCamposContrato())
                            {
                                var data = JSON.stringify(ObtenerDatosContrato());
                                __ajax('../Controlador/contratoControlador.php?op=<?php echo $op; ?>&op2=1','POST','JSON',{'data':data})
                                .done(function(info){
                                    if(info.STATUS==true){                                
                                        var titulo = "Registro Completo";
                                        var texto = "El contrato se registro con éxito.";
                                        var clase = "color success";
                                        MostrarNotificacion(titulo,texto,clase);
                                        OpcionesModulos('clienteControlador.php','1');
                                    }else{
                                        var titulo = "Error de registro";
                                        var texto = "No se pudo registrar contrato";
                                        var clase = "color danger";
                                        MostrarNotificacion(titulo,texto,clase);
                                    }
                                });

                            }
                        }
                        
                        
                        function  ValidarCamposContrato() 
                        {
                            
                            var txtCostoCto = $("#txtCostoCto").val();
                            
                            if (txtCostoCto == null ||  txtCostoCto.trim() == '' || txtCostoCto.length == 0  ) 
                            {
                                // Si no se cumple la condicion...
                                var titulo = "Error de Validación";
                                var texto = "Es necesario rellenar todos lo campos solicitados";
                                var clase = "color warning";
                                MostrarNotificacion(titulo,texto,clase);
                                return false;
                            }
                            return true;
                        }
                        
                        
                        function ObtenerDatosContrato()
                        {
                            var sltCodigoCli = $("#sltCodigoCli").val();
                            var txtCostoCto = $("#txtCostoCto").val();
                            var sltCodigoTipoCto = $("#sltCodigoTipoCto").val();
                            
                            /*for(var j=1; j<=i; j++)
                            {
                                var txtCodigoServ[j]=$("#txtCodigoServ"+j).val();
                            }*/

                            var sltCodigoServ=$("#sltCodigoServ").val();
                            
                            var cabecera = {
                                "sltCodigoCli":sltCodigoCli,
                                "txtCostoCto":txtCostoCto,
                                "sltCodigoTipoCto":sltCodigoTipoCto,
                                "sltCodigoServ":sltCodigoServ
                            };
                            return cabecera;
                        }
                    </script>
                    
   
<?php
                    break;    
                }
                case 3:
                {

                    $listaContratosFinalizados=$_SESSION['listaContratosFinalizados'];  
?>
                    <div class="content-all" >
                       <?php foreach ($listaContratosFinalizados as  $mostrar)
                                {  
                                    $codigo_cto=$mostrar['codigo_cto'];
                                    $tiemporesp_cto=$mostrar['tiemporesp_cto'];
                                    $nmantenimiento_cto=$mostrar['nmantenimiento_cto'];
                                    $finicio_cto=$mostrar['finicio_cto'];
                                    $ffinal_cto=$mostrar['ffinal_cto'];
                                    $pdf_cto=$mostrar['pdf_cto'];
                                    $codigo_pdf=$mostrar['codigo_pdf'];
                                    $nombre_pdf=$mostrar['nombre_pdf']; 
                        ?> 
                        <div class="contrato"  style=" width: 500px; max-height: 500px; border-radius: 8px; background: #0a2940; margin: auto; margin-top: 30px; color: white; border: 5px solid #0a2940; ">
                            <div  style="padding: 20px; background: #30404c; border-radius: 8px 8px 0px 0px ;border-bottom: 1px solid #183951;"> 
                                <h4><?php echo "Contrato N° ".$codigo_cto; ?></h4>
                            </div>
                            <div  style="padding: 20px; ">
                               <table>
                                    <tr>
                                        <td rowspan="3"><i class="zmdi zmdi-file zmdi-hc-5x pull-left"></i></td>
                                        <td colspan="2"><h4><?php echo "Contrato N° ".$codigo_cto; ?></h4></td>
                                    </tr>
                                    <tr>
                                        <td><p>Tiempo de respuesta: <?php echo $tiemporesp_cto; ?> &nbsp</p></td>
                                        <td><p>Numero de mantenimientos: <?php echo $nmantenimiento_cto; ?></p></td>
                                    </tr>
                                    <tr>
                                        <td><p>Fecha de Inicio: <?php echo $finicio_cto; ?>&nbsp</p> </td>
                                        <td><p>Fecha de Finalizado: <?php echo $ffinal_cto; ?> </p></td>
                                    </tr>
                                    <tr>
                                    <?php if($pdf_cto=1)
                                        {   
                                            ?>
                                            <td colspan="3">
                                            <center>
                                                <p>PDF: 
                                                <a href="frmArchivo.php?id_Contrato_PDF=<?php echo $codigo_pdf; ?>" target="_blank">
                                                        <i class="zmdi zmdi-collection-pdf"></i> <?php echo $nombre_pdf.'.pdf'; ?>
                                                </a>&nbsp
                                                </p>
                                            </center>
                                            </td>
                                            <?php
                                        }
                                    ?>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><center><h4>Equipos</h4></center></td>
                                    </tr> 
                                    <tr>
                                        <td>#</td>
                                        <td>Equipo </td>
                                        <td>Garantia </td>
                                    </tr>
                                    <?php foreach ($listaEquipos as  $mostrar)
                                            {  
                                                $codigo_equi=$mostrar['codigo_equi'];
                                                $codigo_tipoEqui=$mostrar['codigo_tipoEqui'];
                                                $nombre_tipoEqui=$mostrar['nombre_tipoEqui'];
                                                $nombre_tipoPc=$mostrar['nombre_tipoPc'];
                                                $nombre_marca=$mostrar['nombre_marca'];
                                                $modelo_equi=$mostrar['modelo_equi'];
                                                $serie_equi=$mostrar['serie_equi'];
                                                $nombre_grta=$mostrar['nombre_grta'];
                                                $nombre_sede=$mostrar['nombre_sede'];
                                                $codigo_cto2=$mostrar['codigo_cto'];
                                            if($codigo_cto==$codigo_cto2)
                                            {
                                        
                                    ?>
                                    <tr>
                                        <td>
                                           <?php echo $codigo_equi.'. '; ?>
                                        </td>
                                        <td>
                                           <?php if($codigo_tipoEqui==1) { ?>
                                            <p><?php echo $nombre_tipoEqui.' '.$nombre_marca.' '.$modelo_equi.' '.$serie_equi; ?> &nbsp</p>
                                            <?php } 
                                            if($codigo_tipoEqui==2) {?>
                                            <p><?php echo $nombre_tipoEqui.' '.$nombre_tipoPc.' '.$nombre_marca.' '.$modelo_equi.' '.$serie_equi; ?> &nbsp</p>   
                                            <?php } ?>
                                        </td>
                                        <td><p><?php echo $nombre_grta; ?> </p></td>
                                    </tr>
                                    
                                    <?php   }
                                        } ?>
                                </table>
                            </div>
                        </div>
                        <?php
                            }
                        ?>


                    </div>
<?php
                    break;    
                }
                case 4:
                {
?>
                    <div class="content-all" >

                        <div class="contrato"  style=" width: 500px; max-height: 500px; border-radius: 8px; background: #0a2940; margin: auto; margin-top: 30px; color: white; border: 5px solid #0a2940; ">
                            <div  style="padding: 20px; background: #30404c; border-radius: 8px 8px 0px 0px ;border-bottom: 1px solid #183951;">Epson   l395  54821</div>
                            <div  style="padding: 10px; ">
                                        <i class="zmdi zmdi-block"></i>
                                <h4>Epson   l395  54821</h4>
                                <p>Marca: xxxxxxxx    &nbsp &nbsp &nbsp &nbsp &nbsp Modelo: xxxxxxx </p>
                                <p>Serie: xxxxxxxx    &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp Tipo de garantia: xxxxxxxx</p>
                                <p>Ubicacion: xxxxxxxxxxxxxxxxx  &nbsp &nbsp &nbsp Departamento: xxxxxxxxx</p>
                                <p>Distrito: xxxxxxxxx  &nbsp &nbsp &nbsp &nbsp &nbsp Sede: xxxxxxxxxx</p>
                                <p>Piso: xxxxxxxxx  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Area: xxxxxxxxxxx</p>
                                <p>Usuarios: &nbsp xxxxxxx  &nbsp &nbsp - &nbsp &nbsp xxxxxxx &nbsp</p>
                                <p>Operativo/Inoperativo: xxxxxxxxxx &nbsp &nbsp &nbsp &nbsp  Contometro: xxxxxxxxx</p>
                                <p>Distrito: xxxxxxxxx  &nbsp &nbsp &nbsp &nbsp &nbsp Sede: xxxxxxxxxx</p>
                                <p>Piso: xxxxxxxxx  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Area: xxxxxxxxxxx</p>
                            </div>
                        </div>



                    </div>
<?php
                    break;    
                }
            }
            break;
        }    

        case 'Administrador':
        {
            switch($op)
            {
                case 1:
                {
?>
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Marca</th>
                                <th class="text-center">Modelo</th>
                                <th class="text-center">Problema</th>
                                <th class="text-center">Ubicación</th>
                                <th class="text-center">Tecnico</th>
                                <th class="text-center">Prioridad</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($listaTickets as  $mostrar)
                                {  
                                    $CodTicket=$mostrar['codigo_tic'];
                                    $MarcaImpresora=$mostrar['marca_imp'];
                                    $ModeloImpresora=$mostrar['modelo_imp'];
                                    $ProblemaTicket=$mostrar['problema_tic'];
                                    $LugarTicket=$mostrar['lugar_tic'];
                                    if($mostrar['codigo_tec']==NULL)
                                    {   $CodTecnico='Sin Asignar'; }
                                    else
                                    {   $CodTecnico=$mostrar['codigo_tec']; }

                                        ?> 
                            <tr>
                                <td><?php echo $CodTicket; ?></td>
                                <td><?php echo $MarcaImpresora; ?></td>
                                <td><?php echo $ModeloImpresora; ?></td>
                                <td><?php echo $ProblemaTicket; ?></td>
                                <td><?php echo $LugarTicket; ?></td>
                                <td><?php echo $CodTecnico; ?></td>
                                <td>alta</td>
                            </tr>
                            <?php   }  ?>
                        </tbody>
                    </table>
<?php
                    break;    
                }
                case 2:
                {
?>
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Marca</th>
                                <th class="text-center">Modelo</th>
                                <th class="text-center">Problema</th>
                                <th class="text-center">Ubicación</th>
                                <th class="text-center">Tecnico</th>
                                <th class="text-center">Prioridad</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($listaTickets as  $mostrar)
                                {  
                                    $CodTicket=$mostrar['codigo_tic'];
                                    $MarcaImpresora=$mostrar['marca_imp'];
                                    $ModeloImpresora=$mostrar['modelo_imp'];
                                    $ProblemaTicket=$mostrar['problema_tic'];
                                    $LugarTicket=$mostrar['lugar_tic'];
                                    if($mostrar['codigo_tec']==NULL)
                                    {   $CodTecnico='Sin Asignar'; }
                                    else
                                    {   $CodTecnico=$mostrar['codigo_tec']; }

                                        ?> 
                            <tr>
                                <td><?php echo $CodTicket; ?></td>
                                <td><?php echo $MarcaImpresora; ?></td>
                                <td><?php echo $ModeloImpresora; ?></td>
                                <td><?php echo $ProblemaTicket; ?></td>
                                <td><?php echo $LugarTicket; ?></td>
                                <td><?php echo $CodTecnico; ?></td>
                                <td>alta</td>
                            </tr>
                            <?php   }  ?>
                        </tbody>
                    </table>
<?php
                    break;    
                }
                case 3:
                {
?>
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Marca</th>
                                <th class="text-center">Modelo</th>
                                <th class="text-center">Problema</th>
                                <th class="text-center">Ubicación</th>
                                <th class="text-center">Tecnico</th>
                                <th class="text-center">Prioridad</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($listaTickets as  $mostrar)
                                {  
                                    $CodTicket=$mostrar['codigo_tic'];
                                    $MarcaImpresora=$mostrar['marca_imp'];
                                    $ModeloImpresora=$mostrar['modelo_imp'];
                                    $ProblemaTicket=$mostrar['problema_tic'];
                                    $LugarTicket=$mostrar['lugar_tic'];
                                    if($mostrar['codigo_tec']==NULL)
                                    {   $CodTecnico='Sin Asignar'; }
                                    else
                                    {   $CodTecnico=$mostrar['codigo_tec']; }

                                        ?> 
                            <tr>
                                <td><?php echo $CodTicket; ?></td>
                                <td><?php echo $MarcaImpresora; ?></td>
                                <td><?php echo $ModeloImpresora; ?></td>
                                <td><?php echo $ProblemaTicket; ?></td>
                                <td><?php echo $LugarTicket; ?></td>
                                <td><?php echo $CodTecnico; ?></td>
                                <td>alta</td>
                            </tr>
                            <?php   }  ?>
                        </tbody>
                    </table>
<?php
                    break;    
                }
                case 4:
                {
?>
                    
<?php
                    break;    
                }
                case 5:
                {
?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-md-offset-1">
                                <form>
                                    <fieldset><h4>Información del Ticket </h4></fieldset>
                                    <div class="form-group">
                                        <label class="control-label">Empresa</label>
                                        <br>
                                        <select class="form-control">

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
                                    </div>

                                    <div class="form-group label-floating " >
                                      <label class="control-label">Tiempo de respuesta (horas)</label>
                                      <input class="form-control" style="width: 225px" type="number" id="txtTiempoRespuesta" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"          maxlength="3" min="1" max="999" onkeypress='return validaNumericos(event)'   required>
                                    </div>


                                    <div class="form-group">
                                        <input type="file">
                                        <div class="btn btn-success btn-raised " width="200" ><i class="zmdi zmdi-file-plus"></i>   Subir Formato PDF del contrato
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label">Equipos</label>
                                        <br>
                                        <select class="form-control" id="txtCodigo_imp" onchange="detalles()">
                                            <option value="0">pc</option>
                                            <option value="1">laptop</option>
                                        </select>
                                    </div>          


                                    <!--detalles del equipo-->	



                                    <div class="panel panel-default" id="detallesEquipos"><!--
                                        <div class="panel-heading" style="background-color: #C1EEE7">Informacion del Equipo</div>

                                        <div class="panel-body">Marca: HP <br> Modelo: Laserjet Ent MFP M527dn <br> Serie: MXBCJ6D1GC </div>

                                        <div class="panel-heading" style="background-color: #C1EEE7">Detalles sobre el Equipo</div>

                                        <div class="panel-body">
                                           Lugar del Equipo
                                           <div class="form-group label-floating">
                                                    <label class="control-label">Departamento</label>
                                                    <input class="form-control" id="txtLugar_tic" name="txtLugar_tic" type="text" required>
                                            </div>
                                            <div class="form-group label-floating">
                                                    <label class="control-label">Direccion</label>
                                                    <input class="form-control" id="txtLugar_tic" name="txtLugar_tic" type="text" required>
                                            </div>

                                            <div class="form-group label-floating">
                                                    <label class="control-label">Piso</label>
                                                    <input class="form-control" id="txtLugar_tic" name="txtLugar_tic" type="text" required>
                                            </div>

                                            <div class="form-group label-floating">
                                                    <label class="control-label">Area</label>
                                                    <input class="form-control" id="txtLugar_tic" name="txtLugar_tic" type="text" required>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">Tipo de garantia</label>
                                                <br>
                                                <select class="form-control">
                                                    <option>CAREPACK HHW</option>
                                                    <option>GARANTIA EXTENDIDA HHW</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="panel-footer clearfix">
                                            <div class="pull-right">
                                                <a class="btn btn-success btn-sm" href="javascript:agregar_linea();">Agregar</a>
                                                <a href="javascript:detalles();" class="btn btn-default">Cerrar</a>
                                            </div>
                                        </div>-->
                                    </div>
                                    <br>
                                    <br>




                                    <table class="table table-bordered" id="tabla_acumula_equipos" >
                                      <thead style="background-color: #C1EEE7">
                                          <tr>
                                            <th>Equipo</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Serie</th>
                                            <th>tipo Garantia</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                            <td>
                                                Impresora
                                            </td>
                                            <td>
                                                HP
                                            </td>
                                            <td>
                                                Laserjet Ent MFP M527dn
                                            </td>
                                            <td>
                                                MXBCJ6D1GC
                                            </td>
                                            <td>
                                                CAREPACK HHW
                                            </td>
                                        </tr>
                                       </tbody>
                                    </table>		

                                    <br>
                                    <br>
                                    Vigencia del contrato	


                                    <table border="0" width="100%">
                                        <tr>
                                            <td>
                                                <label class="control-label"  style="width: 140px; float: left;" >Fecha de Inicio</label>
                                            </td>
                                            <td>
                                                <label class="control-label" style="width: 140px; float: right; " >Fecha de Finalizado</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="form-control " style="width: 140px; float: left; " type="date"  required>
                                            </td>
                                            <td>
                                                <input class="form-control" style="width: 140px; float: right; " type="date" required>
                                            </td>
                                        </tr>
                                    </table>

                                    <br>
                                    <br>
                                    <p class="text-center">
                                        <a  class="btn btn-info btn-raised btn-sm" name="subir" ><i class="zmdi zmdi-floppy"></i> Registrar Contrato</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
<?php
                    break;    
                }
                case 6:
                {
?>
                    <table class="table table-hover text-center display responsive nowrap tablaList" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Marca</th>
                                <th class="text-center">Modelo</th>
                                <th class="text-center">Serie</th>    
                                <th class="text-center">Nivel de trabajo</th>    
                                <th class="text-center">Usuarios</th>
                                <th class="text-center">Operativo/Inoperativo</th>
                                <th class="text-center">Contometro</th>
                                <th class="text-center">Modificar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($listaTickets as  $mostrar)
                                {  
                                    $CodTicket=$mostrar['codigo_tic'];
                                    $MarcaImpresora=$mostrar['marca_imp'];
                                    $ModeloImpresora=$mostrar['modelo_imp'];
                                    $ProblemaTicket=$mostrar['problema_tic'];
                                    $LugarTicket=$mostrar['lugar_tic'];
                                    if($mostrar['codigo_tec']==NULL)
                                    {   $CodTecnico='Sin Asignar'; }
                                    else
                                    {   $CodTecnico=$mostrar['codigo_tec']; }

                                        ?> 
                            <tr>
                                <td><?php echo $CodTicket; ?></td>
                                <td><?php echo $MarcaImpresora; ?></td>
                                <td><?php echo $ModeloImpresora; ?></td>
                                <td><?php echo $ProblemaTicket; ?></td>
                                <td><?php echo $LugarTicket; ?></td>
                                <td><?php echo $CodTecnico; ?></td>
                                <td>alta</td>
                                <td>alta</td>
                                <td><button type="button" class="btn btn-info"><i style="color: white;" class="zmdi zmdi-wrench"></i></button></td>
                            </tr>
                            <?php   }  ?>
                        </tbody>
                    </table>
<?php
                    break;    
                }
            }
            break;
        }   
    }   

    ?>
        <script>
            $("#imgloading").css("display", "none");
        </script>
    <?php
?>