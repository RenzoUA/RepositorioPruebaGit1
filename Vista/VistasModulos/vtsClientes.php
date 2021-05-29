<?php
    session_start();
    $op=$_GET['op'];
    $Area_personal=$_SESSION['Area_personal'];
    switch($Area_personal)
    {    
        case 'Ventas':
        {   
            switch($op)
            {
                case 1:
                {
                    $listaCliente=$_SESSION['listaCliente'];
?>
                    <a class="btn btn-raised btn-secondary" href="javascript:OpcionesModulos('clienteControlador.php','2') "><i class="zmdi zmdi-account-add"></i> Registrar</a>
                    <br>
                    <br>
                    <table class="table table-hover text-center display responsive nowrap tablaList tablaTickets">
                        <thead>
                            <tr>
                                <th class="text-center">N°</th>
                                <th class="text-center">Codigo</th>
                                <th class="text-center">Ruc</th>
                                <th class="text-center">Razon Social</th>
                                <th class="text-center">Nombre Comercial</th>
                                <th class="text-center">Tipo</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Condición</th>
                                <th class="text-center">Dirección</th>
                                <th class="text-center">Departamento</th>
                                <th class="text-center">Provincia</th>
                                <th class="text-center">Distrito</th>
                                <th class="text-center">Actividad Economica</th>
                                <th class="text-center">Persona</th>
                                <th class="text-center">Telefono</th>
                                <th class="text-center">CANT. CONTRATOS</th>
                                <th class="text-center">NIVEL DE CONFIANZA</th>
                                <th class="text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($listaCliente as  $mostrar)
                                {  
                                    $numero_cli=$mostrar['numero_cli'];
                                    $codigo_cli=$mostrar['codigo_cli'];
                                    $ruc_cli=$mostrar['ruc_cli'];
                                    $rsocial_cli=$mostrar['rsocial_cli'];
                                    $ncomercial_cli=$mostrar['ncomercial_cli'];
                                    $tipo_cli=$mostrar['tipo_cli'];
                                    $estado_cli=$mostrar['estado_cli'];
                                    $condicion_cli=$mostrar['condicion_cli'];
                                    $direccion_cli=$mostrar['direccion_cli'];
                                    $departamento_cli=$mostrar['departamento_cli'];
                                    $provincia_cli=$mostrar['provincia_cli'];
                                    $distrito_cli=$mostrar['distrito_cli'];
                                    $acteconomica_cli=$mostrar['acteconomica_cli'];
                                    $persona_cli=$mostrar['persona_cli'];
                                    $telefono_cli=$mostrar['telefono_cli'];
                                    $contratos_cli=$mostrar['contratos_cli'];
                                    $codigo_cofnz=$mostrar['codigo_cofnz'];
                                    $nombre_cofnz=$mostrar['nombre_cofnz'];
                        ?> 
                            <tr class="state_<?= $codigo_cofnz ?>">
                                <td><?php echo $numero_cli; ?></td>
                                <td><?php echo '# '.str_pad($codigo_cli, 5, "0", STR_PAD_LEFT); ?></td>
                                <td><?php echo $ruc_cli; ?></td>
                                <td><?php echo $rsocial_cli; ?></td>
                                <td><?php echo $ncomercial_cli; ?></td>
                                <td><?php echo $tipo_cli; ?></td>
                                <td><?php echo $estado_cli; ?></td>
                                <td><?php echo $condicion_cli; ?></td>
                                <td><?php echo $direccion_cli; ?></td>
                                <td><?php echo $departamento_cli; ?></td>
                                <td><?php echo $provincia_cli; ?></td>
                                <td><?php echo $distrito_cli; ?></td>
                                <td><?php echo $acteconomica_cli; ?></td>
                                <td><?php echo $persona_cli; ?></td>
                                <td><?php echo $telefono_cli; ?></td>
                                <td><?php echo $contratos_cli.' contrato(s)'; ?> </td>
                                <td><?php echo $nombre_cofnz; ?></td>
                                <td>
                                    <a class="btn btn-raised btn-success btn-sm" href="javascript:EditarCliente(<?= $codigo_mdlencst ?>);">Editar</a>
                                    <a class="btn btn-raised btn-danger btn-sm" href="javascript:EliminarTicket(<?= $codigo_mdlencst ?>);">Eliminar</a>
                                    
                                </td>
                            </tr>
                        <?php   }  ?>
                        </tbody>
                    </table>
                    <script>

                        table = $('.tablaList').DataTable({
                            "order": [[ 0, "desc" ]]
                        });
                        
                        
                        function  PublicarEncuesta(codigo_mdlencst) 
                        {
                            swal({
                                title: "¿Estas segur@?",
                                text: "La encuesta N°."+codigo_mdlencst+" se publicara!",
                                type: "warning",

                                showCancelButton: true,

                                confirmButtonText: 'Si',
                                cancelButtonText: 'No',
                                dangerMode: true,
                            })
                            .then(function () {
                                var cabecera = {
                                "codigo_mdlencst":codigo_mdlencst
                                };
                                var data = JSON.stringify(cabecera);
                                __ajax('../Controlador/encuestaControlador.php?op=4','POST','JSON',{'data':data})
                                .done(function(info){
                                    if(info.STATUS==true){       
                                        swal({
                                            title: "Encuesta Publicada!",
                                            type: "success",
                                        });
                                    OpcionesModulos('encuestaControlador.php','<?php echo $op; ?>');
                                    }else{
                                        swal("No se pudo publicar");
                                    }
                                });
                            });
                        }
                            
                        
                    </script>  
<?php
                    break;    
                }
                case 2:
                {
                    $listaConfianza=$_SESSION['listaConfianza'];
?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="center-block col-md-offset-1" style="width: 70%; background: #e8eef5; padding: 30px; border-radius: 30px; border: #c2cedc solid; box-shadow: 5px 10px 20px 0px #919294; max-width: 2000px; min-width: 280px;">
                                <form action="">
                                    <center><h4>Información del Cliente </h4></center>
                                    <br>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Ruc del cliente</label>
                                        <input class="form-control" type="text" id="txtRucCli" style="width:80% " onkeypress='return validaNumericos(event)' maxlength="11" required>
                                        <a class="btn btn-raised btn-secondary btn-sm md-trigger" style="position: absolute; right: 0px; top: 0; background-color: #888; color: #f5f5f5;" href="javascript:ConsultaRuc();">Consulta SUNAT</a>
                                        <img src="../assets/img/loading.gif" class="ajaxgif hide">
                                    </div>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Razon Social</label>
                                        <input class="form-control" type="text" id="txtRSocialCli"  required>
                                    </div>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Nombre comercial</label>
                                        <input class="form-control" type="text" id="txtNombreComCli"  required>
                                    </div>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Tipo de empresa</label>
                                        <input class="form-control" type="text" id="txtTipoCli"  required>
                                    </div>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Estado</label>
                                        <input class="form-control" type="text" id="txtEstadoCli" required>
                                    </div>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Condición</label>
                                        <input class="form-control" type="text" id="txtCondicionCli" required>
                                    </div>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Direccion</label>
                                        <input class="form-control" type="text" id="txtDireccionCli" required>
                                    </div>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Departamento</label>
                                        <input class="form-control" type="text" id="txtDepartamentoCli" required>
                                    </div>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Provincia</label>
                                        <input class="form-control" type="text" id="txtProvinciaCli" required>
                                    </div>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Distrito</label>
                                        <input class="form-control" type="text" id="txtDistritoCli" required>
                                    </div>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Actividad Economica</label>
                                        <input class="form-control" type="text" id="txtActEcoCli" required>
                                    </div>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Persona</label>
                                        <input class="form-control" type="text" id="txtPersonaCli" onkeypress="return validaLetras(event)" required>
                                    </div>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Telefono</label>
                                        <input class="form-control" type="text" id="txtTelefonoCli" onkeypress='return validaNumericos(event)' maxlength="9"  required>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label">Nivel de confianza</label>
                                        <select class="form-control" id="sltCodigoCofnz">
                                          <?php foreach ($listaConfianza as  $mostrar)
                                                 {  
                                                    $codigo_cofnz=$mostrar['codigo_cofnz'];
                                                    $nombre_cofnz=$mostrar['nombre_cofnz'];
                                            ?> 
                                          <option value="<?php echo $codigo_cofnz; ?>"> <?php   echo $nombre_cofnz; ?></option>
                                          <?php   }  ?>
                                        </select>
                                    </div>		    
                                    <p class="text-center">
                                        <a class="btn btn-info btn-raised" href="javascript:RegistrarCliente();"><i class="zmdi zmdi-floppy"></i> Registar Cliente</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- 28/11/2018 R.U.A descripcion: el nifty modals debe volver a llamarse su js devido a que tiene probelmas con ajax-->
	                <script src="../Niftymodals/jquery.niftymodals.js" type="text/javascript"></script>
                    <script>
                        
                        function  ConsultaRuc() 
                        {
                            $('.ajaxgif').removeClass('hide');
                            
                            var txtRucCli = document.getElementById('txtRucCli').value;
                            
                            var cabecera = {
                                "txtRucCli":txtRucCli
                            };
                            
                            var data = JSON.stringify(cabecera);
                            
                            __ajax('../Controlador/clienteControlador.php?op=<?php echo $op; ?>&op2=2','POST','JSON',{'data':data})
                            .done(function(info){
                                if(info.STATUS==true)
                                {
                                    var razonSocial = info.razonSocial;
                                    var nombreComercial = info.nombreComercial;
                                    var tipo = info.tipo;
                                    var estado = info.estado;
                                    var condicion = info.condicion;
                                    var direccion = info.direccion;
                                    var departamento = info.departamento;
                                    var provincia = info.provincia;
                                    var distrito = info.distrito;
                                    var actEconomicas = info.actEconomicas;
                                    document.getElementById('txtRSocialCli').value=razonSocial;
                                    document.getElementById('txtNombreComCli').value=nombreComercial;
                                    document.getElementById('txtTipoCli').value=tipo;
                                    document.getElementById('txtEstadoCli').value=estado;
                                    document.getElementById('txtCondicionCli').value=condicion;
                                    document.getElementById('txtDireccionCli').value=direccion;
                                    document.getElementById('txtDepartamentoCli').value=departamento;
                                    document.getElementById('txtProvinciaCli').value=provincia;
                                    document.getElementById('txtDistritoCli').value=distrito;
                                    document.getElementById('txtActEcoCli').value=actEconomicas;
                                }
                                else
                                {
                                    var titulo = "Error en consultar RUC";
                                        var texto = "No se pudo consultar RUC";
                                        var clase = "color danger";
                                        MostrarNotificacion(titulo,texto,clase);
                                }
                                $('.ajaxgif').addClass('hide');
                            });
                        }
                        
                        
                        function  RegistrarCliente() 
                        {
                            if(ValidarCamposCliente())
                            {
                                var data = JSON.stringify(ObtenerDatosCliente());
                                __ajax('../Controlador/clienteControlador.php?op=<?php echo $op; ?>&op2=1','POST','JSON',{'data':data})
                                .done(function(info){
                                    if(info.STATUS==true){                                
                                        var titulo = "Registro Completo";
                                        var texto = "El cliente se registro con éxito.";
                                        var clase = "color success";
                                        MostrarNotificacion(titulo,texto,clase);
                                        OpcionesModulos('clienteControlador.php','1');
                                    }else{
                                        var titulo = "Error de registro";
                                        var texto = "No se pudo registrar cliente";
                                        var clase = "color danger";
                                        MostrarNotificacion(titulo,texto,clase);
                                    }
                                });

                            }
                        }
                        
                        
                        function  ValidarCamposCliente() 
                        {
                            
                            var txtRucCli = $("#txtRucCli").val();
                            var txtRSocialCli = $("#txtRSocialCli").val();
                            var txtNombreComCli = $("#txtNombreComCli").val();
                            var txtTipoCli = $("#txtTipoCli").val();
                            var txtEstadoCli = $("#txtEstadoCli").val();
                            var txtCondicionCli = $("#txtCondicionCli").val();
                            var txtDireccionCli = $("#txtDireccionCli").val();
                            var txtDepartamentoCli = $("#txtDepartamentoCli").val();
                            var txtProvinciaCli = $("#txtProvinciaCli").val();
                            var txtDistritoCli = $("#txtDistritoCli").val();
                            var txtActEcoCli = $("#txtActEcoCli").val();
                            var txtPersonaCli = $("#txtPersonaCli").val();
                            var txtTelefonoCli = $("#txtTelefonoCli").val();
                            
                            if (txtRucCli == null ||  txtRucCli.trim() == '' || txtRucCli.length == 0 || 
                                txtRSocialCli == null || txtRSocialCli.trim() == '' || txtRSocialCli.length == 0 || 
                                txtNombreComCli == null || txtNombreComCli.trim() == '' || txtNombreComCli.length == 0 || 
                                txtTipoCli == null || txtTipoCli.trim() == '' || txtTipoCli.length == 0 || 
                                txtEstadoCli == null || txtEstadoCli.trim() == '' || txtEstadoCli.length == 0 || 
                                txtCondicionCli == null || txtCondicionCli.trim() == '' || txtCondicionCli.length == 0 || 
                                txtDireccionCli == null || txtDireccionCli.trim() == '' || txtDireccionCli.length == 0 || 
                                txtDepartamentoCli == null || txtDepartamentoCli.trim() == '' || txtDepartamentoCli.length == 0 ||
                                txtProvinciaCli == null || txtProvinciaCli.trim() == '' || txtProvinciaCli.length == 0 || 
                                txtDistritoCli == null || txtDistritoCli.trim() == '' || txtDistritoCli.length == 0 || 
                                txtActEcoCli == null || txtActEcoCli.trim() == '' || txtActEcoCli.length == 0 || 
                                txtPersonaCli == null || txtPersonaCli.trim() == '' || txtPersonaCli.length == 0 || 
                                txtTelefonoCli == null || txtTelefonoCli.trim() == '' || txtTelefonoCli.length == 0  ) 
                            {
                                // Si no se cumple la condicion...
                                var titulo = "Error de Validación";
                                var texto = "Es necesario rellenar todos lo campos solicitados";
                                var clase = "color warning";
                                MostrarNotificacion(titulo,texto,clase);
                                return false;
                            }
                            else if(txtTelefonoCli.length < 9)
                            {
                                var titulo = "Error en el numero de telefono";
                                var texto = "Por favor el numero de telefono debe ocupar 9 digitos";
                                var clase = "color warning";
                                MostrarNotificacion(titulo,texto,clase);
                                return false;
                            }
                            return true;
                        }
                        
                        
                        function ObtenerDatosCliente()
                        {
                            var txtRucCli = $("#txtRucCli").val();
                            var txtRSocialCli = $("#txtRSocialCli").val();
                            var txtNombreComCli = $("#txtNombreComCli").val();
                            var txtTipoCli = $("#txtTipoCli").val();
                            var txtEstadoCli = $("#txtEstadoCli").val();
                            var txtCondicionCli = $("#txtCondicionCli").val();
                            var txtDireccionCli = $("#txtDireccionCli").val();
                            var txtDepartamentoCli = $("#txtDepartamentoCli").val();
                            var txtProvinciaCli = $("#txtProvinciaCli").val();
                            var txtDistritoCli = $("#txtDistritoCli").val();
                            var txtActEcoCli = $("#txtActEcoCli").val();
                            var txtPersonaCli = $("#txtPersonaCli").val();
                            var txtTelefonoCli = $("#txtTelefonoCli").val();
                            var sltCodigoCofnz = $("#sltCodigoCofnz").val();

                            var cabecera = {
                                "txtRucCli":txtRucCli,
                                "txtRSocialCli":txtRSocialCli,
                                "txtNombreComCli":txtNombreComCli,
                                "txtTipoCli":txtTipoCli,
                                "txtEstadoCli":txtEstadoCli,
                                "txtCondicionCli":txtCondicionCli,
                                "txtDireccionCli":txtDireccionCli,
                                "txtDepartamentoCli":txtDepartamentoCli,
                                "txtProvinciaCli":txtProvinciaCli,
                                "txtDistritoCli":txtDistritoCli,
                                "txtActEcoCli":txtActEcoCli,
                                "txtPersonaCli":txtPersonaCli,
                                "txtTelefonoCli":txtTelefonoCli,
                                "sltCodigoCofnz":sltCodigoCofnz
                            };
                            return cabecera;
                        }
                    </script>
                    
   
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
                                <th class="text-center">Cliente</th>
                                <th class="text-center">Marca</th>
                                <th class="text-center">Serie</th>
                                <th class="text-center">Descripción</th>
                                <th class="text-center">Ubicación</th>
                                <th class="text-center">Tecnico</th>
                                <th class="text-center">Prioridad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listaTickets as  $mostrar)
                                {  
                                if($mostrar['estado_tic']=='Aceptado')
                                    {
                                    $CodTicket=$mostrar['codigo_tic'];
                                    $EmpresaCliente=$mostrar['empresa_cli'];
                                    $MarcaImpresora=$mostrar['marca_imp'];
                                    $ModeloImpresora=$mostrar['modelo_imp'];
                                    $ProblemaTicket=$mostrar['problema_tic'];
                                    $LugarTicket=$mostrar['lugar_tic'];
                                    $NombreContactoCliente=$mostrar['nom_contac_cli'];
                                    $ApellidoContactoCliente=$mostrar['ape_contac_cli']; 

                                        ?> 
                            <tr>
                                <td><?php echo $CodTicket; ?></td>
                                <td><?php echo $EmpresaCliente; ?></td>
                                <td><?php echo $MarcaImpresora; ?></td>
                                <td><?php echo $ModeloImpresora; ?></td>
                                <td><?php echo $ProblemaTicket; ?></td>
                                <td><?php echo $LugarTicket; ?></td>
                                <td><?php echo $NombreContactoCliente.' '.$ApellidoContactoCliente; ?></td>
                                <td>alta</td>
                                <td><a href="javascript:mantenimiento('ticketControlador.php',6,'<?php echo $CodTicket; ?>');" class="btn btn-success btn-raised btn-xs">Iniciar</a></td>

                            </tr>
                            <?php  }
                                }  ?>

                        </tbody>
                    </table>
<?php   
                    break;    
                }
                case 4:
                {
?>
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Cliente</th>
                                <th class="text-center">Marca</th>
                                <th class="text-center">Serie</th>
                                <th class="text-center">Descripción</th>
                                <th class="text-center">Ubicación</th>
                                <th class="text-center">Tecnico</th>
                                <th class="text-center">Prioridad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listaTickets as  $mostrar)
                                {  
                                if($mostrar['estado_tic']=='Iniciado')
                                    {
                                    $CodTicket=$mostrar['codigo_tic'];
                                    $EmpresaCliente=$mostrar['empresa_cli'];
                                    $MarcaImpresora=$mostrar['marca_imp'];
                                    $ModeloImpresora=$mostrar['modelo_imp'];
                                    $ProblemaTicket=$mostrar['problema_tic'];
                                    $LugarTicket=$mostrar['lugar_tic'];
                                    $NombreContactoCliente=$mostrar['nom_contac_cli'];
                                    $ApellidoContactoCliente=$mostrar['ape_contac_cli']; 

                                        ?> 
                            <tr>
                                <td><?php echo $CodTicket; ?></td>
                                <td><?php echo $EmpresaCliente; ?></td>
                                <td><?php echo $MarcaImpresora; ?></td>
                                <td><?php echo $ModeloImpresora; ?></td>
                                <td><?php echo $ProblemaTicket; ?></td>
                                <td><?php echo $LugarTicket; ?></td>
                                <td><?php echo $NombreContactoCliente.' '.$ApellidoContactoCliente; ?></td>
                                <td>alta</td>

                                <td><a href="javascript:mantenimiento('ticketControlador.php',7,'<?php echo $CodTicket; ?>')" class="btn btn-danger btn-raised btn-xs">Finalizar</a></td>
                            </tr>
                            <?php  } 
                              }  ?>

                        </tbody>
                    </table>
<?php   
                    break;    
                }
                case 5:
                {
?>
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Cliente</th>
                                <th class="text-center">Marca</th>
                                <th class="text-center">Serie</th>
                                <th class="text-center">Descripción</th>
                                <th class="text-center">Ubicación</th>
                                <th class="text-center">Tecnico</th>
                                <th class="text-center">Prioridad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listaTickets as  $mostrar)
                                {  
                                if($mostrar['estado_tic']=='Finalizado')
                                    {
                                    $CodTicket=$mostrar['codigo_tic'];
                                    $EmpresaCliente=$mostrar['empresa_cli'];
                                    $MarcaImpresora=$mostrar['marca_imp'];
                                    $ModeloImpresora=$mostrar['modelo_imp'];
                                    $ProblemaTicket=$mostrar['problema_tic'];
                                    $LugarTicket=$mostrar['lugar_tic'];
                                    $NombreContactoCliente=$mostrar['nom_contac_cli'];
                                    $ApellidoContactoCliente=$mostrar['ape_contac_cli']; 

                                        ?> 
                            <tr>
                                <td><?php echo $CodTicket; ?></td>
                                <td><?php echo $EmpresaCliente; ?></td>
                                <td><?php echo $MarcaImpresora; ?></td>
                                <td><?php echo $ModeloImpresora; ?></td>
                                <td><?php echo $ProblemaTicket; ?></td>
                                <td><?php echo $LugarTicket; ?></td>
                                <td><?php echo $NombreContactoCliente.' '.$ApellidoContactoCliente; ?></td>
                                <td>alta</td>
                                <td><a href="javascript:mantenimiento('ticketControlador.php',3,'<?php echo $CodTicket; ?>');" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh"></i></a></td>
                                <td><a href="#!" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></a></td>
                            </tr>
                            <?php  } 
                              }  ?>

                        </tbody>
                    </table>
<?php   
                    break;    
                }
            }
            break;
        }     
        case 'TI':
        {
            switch($op)
            {
                case 1:
                {
?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="center-block col-md-offset-1" style="width: 70%; background: #78838e; padding: 30px; border-radius: 30px; border: #84909e solid; box-shadow: 5px 10px 20px 0px #919294; max-width: 2000px; min-width: 280px;">
                                <form action="">
                                    <center><h3 style="    color: #ffffff;">REGISTRAR ENCUESTA</h3></center>
                                    <br>
                                    
                                    <div style="background: #cce0f7;    padding: 10px;    border-radius: 10px;">
                                        <br>
                                        <div class="form-group label-floating">
                                          <label class="control-label">1- Ingresa la Pregunta aqui:</label>
                                          <input class="form-control" id="txtPregunta1" type="text" disabled>
                                        </div>
                                        <div class="form-group label-floating">
                                            <center>
                                                <img style="width: 100%; max-width:400px;" src="../assets/icons/likerts.png">
                                            </center>
                                        </div>
                                    </div>
                                    <br>
                                    <div style="background: #cce0f7;    padding: 10px;    border-radius: 10px;">
                                        <br>
                                        <div class="form-group label-floating">
                                          <label class="control-label">2- Ingresa la Pregunta aqui:</label>
                                          <input class="form-control" id="txtPregunta2" type="text" disabled >
                                        </div>
                                        <div class="form-group label-floating">
                                            <center>
                                                <img style="width: 100%; max-width:400px;" src="../assets/icons/likerts.png">
                                            </center>
                                        </div>
                                    </div>
                                    <br>
                                    <div style="background: #cce0f7;    padding: 10px;    border-radius: 10px;">
                                        <br>
                                        <div class="form-group label-floating">
                                          <label class="control-label">3- Ingresa la Pregunta aqui:</label>
                                          <input class="form-control" id="txtPregunta3" type="text" disabled >
                                        </div>
                                        <div class="form-group label-floating">
                                            <center>
                                                <img style="width: 100%; max-width:400px;" src="../assets/icons/likerts.png">
                                            </center>
                                        </div>
                                    </div>
                                    <br>
                                    <div style="background: #cce0f7;    padding: 10px;    border-radius: 10px;">
                                        <br>
                                        <div class="form-group label-floating">
                                          <label class="control-label">4- Ingresa la Pregunta aqui:</label>
                                          <input class="form-control" id="txtPregunta4" type="text" disabled >
                                        </div>
                                        <div class="form-group label-floating">
                                            <center>
                                                <img style="width: 100%; max-width:400px;" src="../assets/icons/likerts.png">
                                            </center>
                                        </div>
                                    </div>
                                    <br>
                                    <div style="background: #cce0f7;    padding: 10px;    border-radius: 10px;">
                                        <br>
                                        <div class="form-group label-floating">
                                          <label class="control-label">5- Ingresa la Pregunta aqui:</label>
                                          <input class="form-control" id="txtPregunta5" type="text" disabled >
                                        </div>
                                        <div class="form-group label-floating">
                                            <center>
                                                <ul class="full-box">
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
                                                <img style="width: 100%; max-width:400px;" src="../assets/icons/likerts.png">
                                            </center>
                                        </div>
                                    </div>
                                    <br>					    
                                    <p class="text-center">
                                        <a class="btn btn-info btn-raised" href="javascript:RegistrarEncuesta();"><i class="zmdi zmdi-floppy"></i> Guardar Encuesta</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- 28/11/2018 R.U.A descripcion: el nifty modals debe volver a llamarse su js devido a que tiene probelmas con ajax-->
	                <script src="../Niftymodals/jquery.niftymodals.js" type="text/javascript"></script>
                    <script>
                        
                        function  RegistrarEncuesta() 
                        {
                            if(ValidarCamposEncuesta())
                            {
                                var data = JSON.stringify(ObtenerDatosEncuesta());
                                __ajax('../Controlador/encuestaControlador.php?op=<?php echo $op; ?>&op2=1','POST','JSON',{'data':data})
                                .done(function(info){
                                    if(info.STATUS==true){                                
                                        var titulo = "Registro Completo";
                                        var texto = "El ticket se genero con éxito.";
                                        var clase = "color success";
                                        MostrarNotificacion(titulo,texto,clase);
                                        OpcionesModulos('ticketControlador.php','1');
                                    }else{
                                        var titulo = "Error de Registro";
                                        var texto = "No se pudo generar ticket";
                                        var clase = "color danger";
                                        MostrarNotificacion(titulo,texto,clase);
                                    }
                                });

                            }
                        }
                        
                        function  ValidarCamposEncuesta() 
                        {
                            var estado=true;
                            var txtPregunta1 = $("#txtPregunta1").val();
                            var txtPregunta2 = $("#txtPregunta2").val();
                            var txtPregunta3 = $("#txtPregunta3").val();
                            var txtPregunta4 = $("#txtPregunta4").val();
                            var txtPregunta5 = $("#txtPregunta5").val();
                            if (txtPregunta1 == null ||  txtPregunta1.trim() == '' || txtPregunta1.length == 0 || 
                                txtPregunta2 == null ||  txtPregunta2.trim() == '' || txtPregunta2.length == 0 || 
                                txtPregunta3 == null ||  txtPregunta3.trim() == '' || txtPregunta3.length == 0 || 
                                txtPregunta4 == null ||  txtPregunta4.trim() == '' || txtPregunta4.length == 0 || 
                                txtPregunta5 == null ||  txtPregunta5.trim() == '' || txtPregunta5.length == 0 )
                            {
                                var titulo = "Error de validación";
                                var texto = "Por favor llenar todos los campos";
                                var clase = "color warning";
                                MostrarNotificacion(titulo,texto,clase);
                                
                                estado=false;
                            }
                            return estado;
                        }
                        
                        
                        function  ObtenerDatosEncuesta() 
                        {
                            var txtPregunta1 = $("#txtPregunta1").val();
                            var txtPregunta2 = $("#txtPregunta2").val();
                            var txtPregunta3 = $("#txtPregunta3").val();
                            var txtPregunta4 = $("#txtPregunta4").val();
                            var txtPregunta5 = $("#txtPregunta5").val();
                            
                            var cabecera = {
                                "txtPregunta1":txtPregunta1,
                                "txtPregunta2":txtPregunta2,
                                "txtPregunta3":txtPregunta3,
                                "txtPregunta4":txtPregunta4,
                                "txtPregunta5":txtPregunta5
                            };
                            return cabecera;
                        }
                    </script>
                    
   
<?php
                    break;    
                }
                case 2:
                {
                    $listaTickets=$_SESSION['listaTickets'];
?>
                    <table class="table table-hover text-center display responsive nowrap tablaList">
                        <thead>
                            <tr>
                                <th class="text-center">N° de Ticket</th>
                                <th class="text-center">Caso</th>
                                <th class="text-center">Equipo</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Contacto</th>
                                <th class="text-center">Correo del Contacto</th>
                                <th class="text-center">Telefono del Contacto</th>
                                <th class="text-center">Sede</th>
                                <th class="text-center">Ubicacion de la Sede</th>
                                <th class="text-center">Referencia de la Sede</th>
                                <th class="text-center">Ubicacion del Equipo</th>
                                <th class="text-center">Tecnico Asignado</th>
                                <th class="text-center">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($listaTickets as  $mostrar)
                                {  
                                    $codigo_tic=$mostrar['codigo_tic'];
                                    $caso_tic=$mostrar['caso_tic'];
                                    $equipo_tic=$mostrar['equipo_tic'];
                                    $tiempo_tic=$mostrar['tiempo_tic'];
                                    $contacto_tic=$mostrar['contacto_tic'];
                                    $correo_contacto_tic=$mostrar['correo_contacto_tic'];
                                    $telefono_contacto_tic=$mostrar['telefono_contacto_tic'];
                                    $nombre_sede=$mostrar['nombre_sede'];
                                    $ubicacion_sede=$mostrar['ubicacion_sede'];
                                    $referencia_tic=$mostrar['referencia_tic'];
                                    $ubicacion_tic=$mostrar['ubicacion_tic'];
                                    if($mostrar['tecnico_tic']==NULL)
                                    {   $tecnico_tic='Sin Asignar'; }
                                    else
                                    {   $tecnico_tic=$mostrar['tecnico_tic']; }
                                    $nombre_estadoTic=$mostrar['nombre_estadoTic'];
                        ?> 
                            <tr>
                                <td><?php echo '# '.str_pad($codigo_tic, 8, "0", STR_PAD_LEFT); ?></td>
                                <td><?php echo $caso_tic; ?></td>
                                <td><?php echo $equipo_tic; ?></td>
                                <td><?php echo $tiempo_tic; ?></td>
                                <td><?php echo $contacto_tic; ?></td>
                                <td><?php echo $correo_contacto_tic; ?></td>
                                <td><?php echo $telefono_contacto_tic; ?></td>
                                <td><?php echo $nombre_sede; ?></td>
                                <td><?php echo $ubicacion_sede; ?></td>
                                <td><?php echo $referencia_tic; ?></td>
                                <td><?php echo $ubicacion_tic; ?></td>
                                <td><?php echo $tecnico_tic; ?></td>
                                <td><?php echo $nombre_estadoTic; ?></td>
                            </tr>
                        <?php   }  ?>
                        </tbody>
                    </table>
                    <script>
                        
                        table = $('.tablaList').DataTable({
                            "order": [[ 0, "desc" ]]
                        });
                    </script>  
<?php  
                    break;    
                }
                case 3:
                {
                    $listaTickets=$_SESSION['listaTickets'];
?>
                    <div class="content-all" >
                        <?php foreach ($listaTickets as  $mostrar)
                            {  
                                $codigo_tic=$mostrar['codigo_tic'];
                                $caso_tic=$mostrar['caso_tic'];
                                $equipo_tic=$mostrar['equipo_tic'];
                                $tiempo_tic=$mostrar['tiempo_tic'];
                                $contacto_tic=$mostrar['contacto_tic'];
                                $correo_contacto_tic=$mostrar['correo_contacto_tic'];
                                $telefono_contacto_tic=$mostrar['telefono_contacto_tic'];
                                $nombre_sede=$mostrar['nombre_sede'];
                                $ubicacion_sede=$mostrar['ubicacion_sede'];
                                $referencia_tic=$mostrar['referencia_tic'];
                                $ubicacion_tic=$mostrar['ubicacion_tic'];
                                if($mostrar['tecnico_tic']==NULL)
                                {   $tecnico_tic='Sin Asignar'; }
                                else
                                {   $tecnico_tic=$mostrar['tecnico_tic']; }
                                $nombre_estadoTic=$mostrar['nombre_estadoTic'];
                        ?> 
                       
                        <div  class="ticket">
                            <div class="circ-ticket circ-tic_1" ></div>
                            <div class="circ-ticket circ-tic_2" ></div>
                            <div class="circ-ticket circ-tic_3" ></div>
                            <div class="circ-ticket circ-tic_4" ></div>
                            <div class="ticket_body">
                                <div class="ticket_head"> Ticker N°. <?= $codigo_tic ?> </div>
                                <div class="ticket_content">
                                    <table>
                                        <tr>
                                            <td><i class="zmdi zmdi-ticket-star zmdi-hc-5x pull-left"></i></td>
                                            <td><h4> N° #. <?= $codigo_tic ?> </h4></td>
                                            <td> Fecha: <?= $tiempo_tic ?> </td>
                                        </tr>        
                                        <tr>
                                            <td colspan="3"><p>Caso: <?= $caso_tic ?>    </p> </td>
                                        </tr>        
                                        <tr>
                                            <td colspan="3"><p> Equipo: <?= $equipo_tic ?></p> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><p>Personal de Contacto: <?= $contacto_tic ?>    &nbsp </p> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><p>Correo de Contacto: <?= $correo_contacto_tic ?>    &nbsp </p> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><p>Telefono de Contacto: <?= $telefono_contacto_tic ?>    &nbsp </p> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><p>Sede: <?= $nombre_sede ?>    &nbsp </p> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><p>Ubicación de la sede: <?= $ubicacion_sede ?>    &nbsp </p> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><p>Referencia de la sede: <?= $referencia_tic ?>    &nbsp </p> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><p>Ubicacion del equipo: <?= $ubicacion_tic ?>    &nbsp </p> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><p>Tecnico: <?= $tecnico_tic ?>    &nbsp </p> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Ubicacion: <?= $equipo_tic ?>  &nbsp </td><td> Departamento: xxxxxxxx</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Distrito: xxxxxxxxx  &nbsp </td><td> Sede: xxxxxxxxx</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Piso: xxxxxxxxx  &nbsp </td><td> Area: xxxxxxxxxx</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Usuarios: &nbsp xxxxxxx  &nbsp &nbsp - &nbsp &nbsp xxxxxxx &nbsp</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Constancias: xxxxxxxxxx &nbsp  xxxxxxxx</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php   }  ?>
                    </div>
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