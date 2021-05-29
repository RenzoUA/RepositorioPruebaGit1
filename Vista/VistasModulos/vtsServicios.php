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
                    $listaServicios=$_SESSION['listaServicios'];
?>
                    <a class="btn btn-raised btn-secondary" href="javascript:OpcionesModulos('servicioControlador.php','2') "><i class="zmdi zmdi-account-add"></i> Registrar</a>
                    <br>
                    <br>
                     <table class="table table-hover text-center display responsive nowrap tablaList" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Cantidad veces usado</th>
                                <th class="text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($listaServicios as  $mostrar)
                                {  
                                    $codigo_serv=$mostrar['codigo_serv'];
                                    $numero_serv=$mostrar['numero_serv'];
                                    $nombre_serv=$mostrar['nombre_serv'];
                                    $contratos_serv=$mostrar['contratos_serv'];

                        ?> 
                            <tr>
                                <td><?php echo $numero_serv; ?></td>
                                <td><?php echo $nombre_serv; ?></td>
                                <td><?php echo $contratos_serv; ?></td>
                                <td>
                                    <a class="btn btn-raised btn-success btn-sm" href="javascript:EditarCliente(<?= $codigo_serv ?>);">Editar</a>
                            <?php   if($contratos_serv==0)
                                    { ?>
                                    <a class="btn btn-raised btn-danger btn-sm" href="javascript:EliminarTicket(<?= $codigo_serv ?>);">Eliminar</a>
                            <?php   }  ?>
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
?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="center-block col-md-offset-1" style="width: 70%; background: #e8eef5; padding: 30px; border-radius: 30px; border: #c2cedc solid; box-shadow: 5px 10px 20px 0px #919294; max-width: 2000px; min-width: 280px;">
                                <form action="">
                                    <center><h4>Nuevo Servicio </h4></center>
                                    <br>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Nombre del servicio</label>
                                        <input class="form-control" type="text" id="txtNombreServ"  required>
                                    </div>	    
                                    <p class="text-center">
                                        <a class="btn btn-info btn-raised" href="javascript:RegistrarServicio();"><i class="zmdi zmdi-floppy"></i> Registar Servicio</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- 28/11/2018 R.U.A descripcion: el nifty modals debe volver a llamarse su js devido a que tiene probelmas con ajax-->
	                <script src="../Niftymodals/jquery.niftymodals.js" type="text/javascript"></script>
                    <script>
                        
                        function  RegistrarServicio() 
                        {
                            if(ValidarCamposServicio())
                            {
                                var data = JSON.stringify(ObtenerDatosServicio());
                                __ajax('../Controlador/servicioControlador.php?op=<?php echo $op; ?>&op2=1','POST','JSON',{'data':data})
                                .done(function(info){
                                    if(info.STATUS==true){                                
                                        var titulo = "Registro Completo";
                                        var texto = "El servicio se registro con éxito.";
                                        var clase = "color success";
                                        MostrarNotificacion(titulo,texto,clase);
                                        OpcionesModulos('servicioControlador.php','1');
                                    }else{
                                        var titulo = "Error de registro";
                                        var texto = "No se pudo registrar servicio";
                                        var clase = "color danger";
                                        MostrarNotificacion(titulo,texto,clase);
                                    }
                                });

                            }
                        }
                        
                        
                        function  ValidarCamposServicio() 
                        {
                            
                            var txtNombreServ = $("#txtNombreServ").val();
                            
                            if (txtNombreServ == null ||  txtNombreServ.trim() == '' || txtNombreServ.length == 0 ) 
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
                        
                        
                        function ObtenerDatosServicio()
                        {
                            var txtNombreServ = $("#txtNombreServ").val();
                            
                            var cabecera = {
                                "txtNombreServ":txtNombreServ
                            };
                            return cabecera;
                        }
                    </script>
                    
   
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