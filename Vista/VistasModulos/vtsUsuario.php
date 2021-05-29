<?php
    session_start();
    $op=$_GET['op'];
    $Tipo_usu=$_SESSION['Tipo_usuario'];
    switch($Tipo_usu)
    {    

        case 'Administrador':
        {
               
            switch($op)
            {
                case 1:
                {
                    $listaUsuarios=$_SESSION['listaUsuarios'];
                    
?>
                    <table class="table table-hover text-center display responsive nowrap tablaList" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Codigo de Usuario</th>
                                <th class="text-center">Usuario</th>
                                <th class="text-center">Clave</th>
                                <th class="text-center">Estado del Usuario</th>
                                <th class="text-center">Tipo Usuario</th>
                                <th class="text-center">Nombre</th>  
                                <th class="text-center">DNI/RUC</th>
                                <th class="text-center">Correo</th> 
                                <th class="text-center">Telefono</th>    
                                <th class="text-center">Telefono 2</th>  
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($listaUsuarios as  $mostrar)
                                {  
                                    $codigo_usu=$mostrar['codigo_usu'];
                                    $nombre_usu=$mostrar['nombre_usu'];
                                    $clave_usu=$mostrar['clave_usu'];
                                    $nombre_estadoUsu=$mostrar['nombre_estadoUsu'];
                                    $nombre2_usu=$mostrar['nombre2_usu'];
                                    $nombre3_usu=$mostrar['nombre3_usu'];
                                    $dni_ruc_usu=$mostrar['dni_ruc_usu'];
                                    $correo_usu=$mostrar['correo_usu'];
                                    $telefono_usu=$mostrar['telefono_usu'];
                                    $telefono2_usu=$mostrar['telefono2_usu'];
                                    $tipo_usu=$mostrar['tipo_usu'];
                        ?> 
                            <tr>
                                <td>
                                    <div style="margin: auto; border-radius: 50%; width: 80px;height: 80px; overflow: hidden;border: #234158 solid;">
                                        <img src="../assets/users/<?php echo $codigo_usu; ?>.jpg" style="width: 100%; height: 100%;">
                                    </div>
                                </td>
                                <td><?php echo $nombre_usu; ?></td>
                                <td><?php echo $clave_usu; ?></td>
                                <td><?php echo $nombre_estadoUsu; ?></td>
                                <td><?php echo $tipo_usu; ?></td>
                                <td><?php echo $nombre2_usu.' '.$nombre3_usu; ?></td>
                                <td><?php echo $dni_ruc_usu; ?></td>
                                <td><?php echo $correo_usu; ?></td>
                                <td><?php echo $telefono_usu; ?></td>
                                <td><?php echo $telefono2_usu; ?></td>
                            </tr>
                            <?php   }  ?>
                        </tbody>
                    </table>
                    <script>
                        
                        
                        table = $('.tablaList').DataTable( {
                                    dom: 'Blfrtip'  ,
                                    buttons: [
                                        'copy',
                                        'excel',
                                        'csv',
                                        'pdf',
                                        'print'
                                    ]
                                } );
                        
                        
                        
                       
                        
                    </script>
<?php
              
                    break;    
                }
                case 2:
                {
?>
                    <div class="col-xs-12 col-md-10 col-md-offset-1">
                        <fieldset > 
                        <h1 class="text-center" style="background: #D9EDF7;border-radius: 15px; color: #0A2940;">Tipos de Clientes 
                        <i class="zmdi zmdi-accounts"></i></h1>
                        </fieldset>
                        <div class="content-all">
                            <div class="content-img">
                               <a href="javascript:OpcionesModulos('usuarioMantControlador.php','5');">
                                    <img src="../assets/img/interno.jpg">
                                    <div class="content-txt">
                                        <h2><i class="zmdi zmdi-wrench"></i> Cliente Interno</h2>
                                    </div>
                                    <div class="content-1"></div>
                                    <div class="content-2"></div>
                                    <div class="content-3"></div>
                                    <div class="content-4"></div>
                                </a>
                            </div>
                            <div class="content-img">
                               <a href="javascript:OpcionesModulos('usuarioMantControlador.php','6');">
                                    <img src="../assets/img/externo.jpg">
                                    <div class="content-txt">
                                        <h2><i class="zmdi zmdi-wrench"></i> Clientes Externo</h2>
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
<?php
                    break;    
                }
                case 3:
                {
?>
                    <div class="col-xs-12 col-md-10 col-md-offset-1">
                        <fieldset > 
                        <h1 class="text-center" style="background: #D9EDF7;border-radius: 15px; color: #0A2940;">Tipos de Personal Tecnicos 
                        <i class="zmdi zmdi-accounts"></i></h1>
                        </fieldset>
                        <div class="content-all">
                            <div class="content-img">
                               <a href="javascript:OpcionesModulos('usuarioMantControlador.php','7');">
                                    <img src="../assets/img/tecnico.jpg">
                                    <div class="content-txt">
                                        <h2><i class="zmdi zmdi-wrench"></i> Tecnico</h2>
                                    </div>
                                    <div class="content-1"></div>
                                    <div class="content-2"></div>
                                    <div class="content-3"></div>
                                    <div class="content-4"></div>
                                </a>
                            </div>
                            <div class="content-img">
                               <a href="javascript:OpcionesModulos('usuarioMantControlador.php','8');">
                                    <img src="../assets/img/analista.jpg">
                                    <div class="content-txt">
                                        <h2><i class="zmdi zmdi-wrench"></i> Analista</h2>
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
<?php
                    break;    
                }
                case 4:
                {
                    if(!isset($_GET['op2']))
                    {
                        $listaAdministradores=$_SESSION['listaAdministradores'];

?>
                        <a class="btn btn-raised btn-secondary" href="javascript:SubOpcionesModulos('usuarioMantControlador.php','<?= $op ?>','1') "><i class="zmdi zmdi-account-add"></i> Registrar</a>
                        <table class="table table-hover text-center display responsive nowrap tablaList" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Foto de Perfil</th>
                                    <th class="text-center">Nombres y Apellidos</th>
                                    <th class="text-center">Correo</th>
                                    <th class="text-center">Telefono</th>
                                    <th class="text-center">Telefono 2</th>
                                    <th class="text-center">DNI</th>  
                                    <th class="text-center">Sueldo</th>
                                    <th class="text-center">Estado del Administrador</th> 
                                    <th class="text-center">Usuario</th>    
                                    <th class="text-center">Clave</th> 
                                    <th class="text-center">Estado del Usuario</th>    
                                    <th class="text-center">Opciones</th>    
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($listaAdministradores as  $mostrar)
                                    { 
                                        $codigo_adm=$mostrar['codigo_adm'];
                                        $nombre_adm=$mostrar['nombre_adm'];
                                        $apellido_adm=$mostrar['apellido_adm'];
                                        $correo_adm=$mostrar['correo_adm'];
                                        $telefono_adm=$mostrar['telefono_adm'];
                                        $telefono2_adm=$mostrar['telefono2_adm'];
                                        $dni_adm=$mostrar['dni_adm'];
                                        $sueldo_adm=$mostrar['sueldo_adm'];
                                        $nombre_estadoAdm=$mostrar['nombre_estadoAdm'];
                                        $codigo_usu=$mostrar['codigo_usu'];
                                        $nombre_usu=$mostrar['nombre_usu'];
                                        $clave_usu=$mostrar['clave_usu'];
                                        $codigo_estadoUsu=$mostrar['codigo_estadoUsu'];
                                        $nombre_estadoUsu=$mostrar['nombre_estadoUsu'];
                            ?> 
                                <tr>
                                    <td>
                                        <div style="margin: auto; border-radius: 50%; width: 80px;height: 80px; overflow: hidden;border: #234158 solid;">
                                            <img src="../assets/users/<?php echo $codigo_usu; ?>.jpg" style="width: 100%; height: 100%;">
                                        </div>
                                    </td>
                                    <td><?php echo $nombre_adm.' '.$apellido_adm; ?></td>
                                    <td><?php echo $correo_adm; ?></td>
                                    <td><?php echo $telefono_adm; ?></td>
                                    <td><?php echo $telefono2_adm; ?></td>
                                    <td><?php echo $dni_adm; ?></td>
                                    <td><?php echo $sueldo_adm; ?></td>
                                    <td><?php echo $nombre_estadoAdm; ?></td>
                                    <td><?php echo $nombre_usu; ?></td>
                                    <td><?php echo $clave_usu; ?></td>
                                    <td><?php echo $nombre_estadoUsu; ?></td>
                                    <td> 
                                        <a class="btn btn-info btn-raised btn-sm"  href="javascript:SubOpcionesModulos('usuarioMantControlador.php','<?= $op ?>','2','<?= $codigo_adm ?>') " ><i class="zmdi zmdi-edit"></i> Modificar</a> 
                                        <a class="btn btn-danger btn-raised btn-sm" href="javascript:EliminarAdministrador(<?= $codigo_adm ?>, <?= $codigo_usu ?>)"><i class="zmdi zmdi-delete"></i> Eliminar</a>
                                <?php   if($codigo_estadoUsu==1) 
                                        {       ?>
                                        <a class="btn btn-warning btn-raised btn-sm" href="javascript:HabilitarDeshabilitarUsuario(<?= $codigo_usu ?>, <?= $codigo_estadoUsu ?>)"><i class="zmdi zmdi-delete"></i> Inhabilitar</a>
                                <?php   }
                                        else if($codigo_estadoUsu==2)
                                        {       ?>   
                                        <a class="btn btn-success btn-raised btn-sm" href="javascript:HabilitarDeshabilitarUsuario(<?= $codigo_usu ?>, <?= $codigo_estadoUsu ?>)"><i class="zmdi zmdi-delete"></i> Habilitar</a>
                                <?php   }?>
                                    </td>
                                </tr>
                            <?php   }  ?>
                            </tbody>
                        </table>
                        <script>


                            table = $('.tablaList').DataTable( {
                                        dom: 'Blfrtip'  ,
                                        buttons: [
                                            'copy',
                                            'excel',
                                            'csv',
                                            'pdf',
                                            'print'
                                        ]
                                    } );


                            function HabilitarDeshabilitarUsuario(codigo_usu, codigo_estadoUsu)
                            {
                                var cabecera = {
                                    "codigo_usu":codigo_usu,
                                    "codigo_estadoUsu":codigo_estadoUsu
                                };
                                var data = JSON.stringify(cabecera);
                                __ajax('../Controlador/UsuarioMantControlador.php?op=<?= $op ?>&op2=4','POST','JSON',{'data':data})
                                .done(function(info){
                                    if(info.codigo_estadoUsu==1){ 
                                        if(info.STATUS==true){  
                                            var titulo = "Usuario Deshabilitado";
                                            var texto = "El usuario del Administrador ha sido Deshabilitado con exito.";
                                            var clase = "color success";
                                            MostrarNotificacion(titulo,texto,clase);
                                            OpcionesModulos('usuarioMantControlador.php','4');
                                        }else{
                                            var titulo = "El usuario no fue Deshabilitado";
                                            var texto = "El usuario del Administrador no ha podido ser Deshabilitado";
                                            var clase = "color danger";
                                            MostrarNotificacion(titulo,texto,clase);
                                        }
                                    }
                                    else if(info.codigo_estadoUsu==2){ 
                                        if(info.STATUS==true){  
                                            var titulo = "Usuario Habilitado";
                                            var texto = "El usuario del Administrador ha sido habilitado con exito.";
                                            var clase = "color success";
                                            MostrarNotificacion(titulo,texto,clase);
                                            OpcionesModulos('usuarioMantControlador.php','4');
                                        }else{
                                            var titulo = "El usuario no fue habilitado";
                                            var texto = "El usuario del Administrador no ha podido ser habilitado";
                                            var clase = "color danger";
                                            MostrarNotificacion(titulo,texto,clase);
                                        }
                                    }
                                });
                            }

                            function EliminarAdministrador( codigo_adm, codigo_usu)
                            {
                                var cabecera = {
                                    "codigo_adm":codigo_adm,
                                    "codigo_usu":codigo_usu
                                };
                                var data = JSON.stringify(cabecera);
                                __ajax('../Controlador/UsuarioMantControlador.php?op=<?= $op ?>&op2=3','POST','JSON',{'data':data})
                                .done(function(info){
                                    if(info.STATUS==true){  
                                        var titulo = "Eliminacion Completa";
                                        var texto = "El Administrador ha sido eliminado con exito.";
                                        var clase = "color success";
                                        MostrarNotificacion(titulo,texto,clase);
                                        OpcionesModulos('usuarioMantControlador.php','4');
                                    }else{
                                        var titulo = "Error de eliminacion";
                                        var texto = "No se pudo eliminar al Administrador, este usuario ya ha realizado procesos";
                                        var clase = "color danger";
                                        MostrarNotificacion(titulo,texto,clase);
                                    }
                                });
                            }
                        
                                    


                        </script>
<?php
                    }
                    else
                    {
                        $op2=$_GET['op2'];
                        switch ($op2)
                        {
                            case 1:
                            {
                                
                                $listaEstadosAdministrador=$_SESSION['listaEstadosAdministrador']; 
                                ?>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="center-block" style="width: 100%; background: #e8eef5; padding: 30px; border-radius: 30px; border: #c2cedc solid; box-shadow: 5px 10px 20px 0px #919294; min-width: 280px;">
                                            <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                                                <center><h4>Información del Administrador </h4></center>
                                                <br>
                                                
                                                <div class="col-sm-4">
                                                   <center>
                                                        <div id="contenedorFoto">
                                                            <img style="width: 100%; border: black solid;" src="../assets/users/admin.jpg">
                                                        </div>
                                                        <label  for="flFoto_usu"> <i class="zmdi zmdi-upload"></i> Subir Foto</label>
                                                        <div id="info"></div>
                                                        <input type="file" name="flFoto_usu" id="flFoto_usu" class="file-input" onchange='ponerDatosFoto()' >
                                                    </center>
                                                    
                                                    <div style="background: #cce0f7;    padding: 10px;    border-radius: 10px;">
                                                        <p style="padding:2%;">Datos de Usuario<p>
                                                        <div class="form-group label-floating">
                                                          <label class="control-label" id="lblNombre_usu">Usuario de Administrador</label>
                                                          <input class="form-control" id="txtNombre_usu" type="text"  maxlength="40"   style="text-transform:uppercase;"  onkeypress="return validaSinEspacio(event)" onkeyup="ValidarNombreUsuario()" required>
                                                        </div>	
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Contraseña del Administrador</label>
                                                          <input class="form-control" id="txtClave_usu" type="text" maxlength="40" required>
                                                        </div>	
                                                        <div class="form-group">
                                                            <label class="control-label">Estado de Usuario</label>
                                                            <div class="switch-button switch-button">
                                                                <input type="checkbox" id="chkCodigo_estadoUsu"><span>
                                                                <label for="chkCodigo_estadoUsu"></label></span>
                                                            </div>
                                                        </div>
                                                    </div>	
                                                </div>
                                                
                                                <div class="col-sm-offset-4">
                                                   
                                                    <div style="background: #cce0f7;    padding: 10px;    border-radius: 10px;">
                                                        <p style="padding:2%;">Datos Personales<p>
                                                        <br>
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Nombre del Administrador</label>
                                                          <input class="form-control" id="txtNombre_adm" type="text"  maxlength="40" onkeypress="return validaLetras(event)" required>
                                                        </div>	
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Apellido del Administrador</label>
                                                          <input class="form-control" id="txtApellido_adm" type="text" maxlength="40" onkeypress="return validaLetras(event)" required>
                                                        </div>	
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Correo del Administrador</label>
                                                          <input class="form-control" id="txtCorreo_adm" type="email" maxlength="40" required>
                                                        </div>		
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Telefono del Administrador</label>
                                                          <input class="form-control" id="txtTelefono_adm" type="text" onkeypress='return validaNumericos(event)' maxlength="9" required>
                                                        </div>		
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Telefono Secundario del Administrador</label>
                                                          <input class="form-control" id="txtTelefono2_adm" type="text" onkeypress='return validaNumericos(event)' maxlength="9" required>
                                                        </div>	
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">DNI del Administrador</label>
                                                          <input class="form-control" id="txtDni_adm" type="text" onkeypress='return validaNumericos(event)' maxlength="8" required>
                                                        </div>
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Sueldo del Administrador</label>
                                                          <input class="form-control" id="txtSueldo_adm" type="text" onkeypress='return validaNumericos(event)' maxlength="8" required>
                                                        </div>	
                                                        <div class="form-group">
                                                            <label class="control-label">Estado del Administrador</label>
                                                            <select class="form-control" id="sltCodigo_estadoAdm">
                                                              <?php foreach ($listaEstadosAdministrador as  $mostrar)
                                                                     {  
                                                                        $codigo_estadoAdm=$mostrar['codigo_estadoAdm'];
                                                                        $nombre_estadoAdm=$mostrar['nombre_estadoAdm'];
                                                                ?> 
                                                              <option value="<?php echo $codigo_estadoAdm; ?>"> <?php   echo $nombre_estadoAdm; ?></option>
                                                              <?php   }  ?>
                                                            </select>
                                                        </div>	
                                                    </div>	
                                                </div>
                                                					    
                                                <p class="text-center">
                                                    <a style="width: 90%;" class="btn btn-info btn-raised" href="javascript:RegistrarAdministrador();"><i class="zmdi zmdi-floppy"></i> Registrar Administrador</a>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                <script>
                                    function ponerDatosFoto()
                                    {
                                        input=document.getElementById('flFoto_usu');

                                        if (input.files && input.files[0]) 
                                        {
                                            var pdrs = input.files[0].name;
                                            document.getElementById('info').innerHTML = pdrs;

                                            var reader = new FileReader();
                                            reader.readAsDataURL(input.files[0]);
                                            reader.onload = function (e){
                                                 //document.getElementById("contenedorFoto").innerHTML = ['<img src="'+e.target.result+'" width="450" height="300"/>'].join('');
                                                 $('#contenedorFoto').empty();
                                                 $('#contenedorFoto').append('<img src="'+e.target.result+'" style="width: 100%; max-width: 300px; border: black solid;">');
                                            }
                                        }
                                    }
                                    
                                    var  txtNombre_adm= document.getElementById('txtNombre_adm');
                                    var  txtApellido_adm= document.getElementById('txtApellido_adm');
                                    
                                    txtNombre_adm.addEventListener("keyup", generandoNombreUsuario);
                                    txtApellido_adm.addEventListener("keyup", generandoNombreUsuario);
                                    
                                    function generandoNombreUsuario()
                                    {  
                                        var txtNombre_adm = $("#txtNombre_adm").val();
                                        var txtApellido_adm = $("#txtApellido_adm").val();
                                        
                                        var x = txtApellido_adm.indexOf(" ");
                                        if(x>0)
                                        {
                                            var txtApellido_adm = txtApellido_adm.substr(0,x);
                                        }
                                        
                                        
                                        var nombredeusuario =txtNombre_adm.replace(/ /g, "").substr(0,1)+txtApellido_adm.replace(/ /g, "").replace(/\s+/g, "");
                                                              
                                        var cabecera = {
                                            "txtNombre_usu":nombredeusuario
                                        };
                                        var data = JSON.stringify(cabecera);

                                        __ajax('../Controlador/usuarioMantControlador.php?op=9','POST','JSON',{'data':data})
                                        .done(function(info){
                                            if(info.STATUS==true)
                                            {                 
                                                var nombredeusuario =txtNombre_adm.replace(/ /g, "").substr(0,2)+txtApellido_adm.replace(/ /g, "").replace(/\s+/g, "");
                                                
                                                var cabecera = {
                                                    "txtNombre_usu":nombredeusuario
                                                };
                                                var data = JSON.stringify(cabecera);
                                                    __ajax('../Controlador/usuarioMantControlador.php?op=9','POST','JSON',{'data':data})
                                                    .done(function(info){
                                                        if(info.STATUS==true)
                                                        {
                                                            var txtApellido_adm2 = $("#txtApellido_adm").val();
                                                            var nombredeusuario =txtNombre_adm.replace(/ /g, "").substr(0,2)+txtApellido_adm2.replace(/ /g, "").replace(/\s+/g, "")+'123';
                                                            document.getElementById("lblNombre_usu").style.color = "red";
                                                        }
                                                        else
                                                        {
                                                            var nombredeusuario =txtNombre_adm.replace(/ /g, "").substr(0,2)+txtApellido_adm.replace(/ /g, "").replace(/\s+/g, "");
                                                            document.getElementById("lblNombre_usu").style.color = "#425a6cd6";
                                                        }
                                                       document.getElementById('txtNombre_usu').value= nombredeusuario;
                                                    });
                                            }
                                            else
                                            {
                                                var nombredeusuario =txtNombre_adm.replace(/ /g, "").substr(0,1)+txtApellido_adm.replace(/ /g, "").replace(/\s+/g, "");
                                                document.getElementById("lblNombre_usu").style.color = "#425a6cd6";
                                                document.getElementById('txtNombre_usu').value= nombredeusuario;
                                            }
                                            
                                        
                                           // document.getElementById('txtNombre_usu').value= nombredeusuario;
                                            
                                        });
                                        
                                    }
                                    
                                    
                                    
                                    function RegistrarAdministrador()
                                    {
                                        if(ValidarCamposAdministrador())
                                        {
                                            var data = JSON.stringify(ObtenerDatosAdministrador());
                                            __ajax('../Controlador/UsuarioMantControlador.php?op=<?php echo $op; ?>&op2=5','POST','JSON',{'data':data})
                                            .done(function(info){
                                                if(info.STATUS==true){  
                                                    var codigo_usu = info.codigo_usu;
                                                    subirFoto(codigo_usu);
                                                    var titulo = "Registro Completo";
                                                    var texto = "El Administrador se registro con exito.";
                                                    var clase = "color success";
                                                    MostrarNotificacion(titulo,texto,clase);
                                                    OpcionesModulos('usuarioMantControlador.php','4');
                                                }else{
                                                    var titulo = "Error de registro";
                                                    var texto = "No se pudo registrar Administrador";
                                                    var clase = "color danger";
                                                    MostrarNotificacion(titulo,texto,clase);
                                                }
                                            });

                                        }
                                    }
                        
                                    
                                    function  ValidarNombreUsuario()
                                    {
                                        var txtNombre_usu = $("#txtNombre_usu").val().toUpperCase();
                                        var cabecera = {
                                            "txtNombre_usu":txtNombre_usu
                                        };
                                        var data = JSON.stringify(cabecera);
                                        __ajax('../Controlador/usuarioMantControlador.php?op=9','POST','JSON',{'data':data})
                                        .done(function(info){
                                            if(info.STATUS==true)
                                            {
                                                var titulo = "Problemas con el Nombre de Usuario";
                                                var texto = "Al parecer este Usuario ya existe";
                                                var clase = "color warning";
                                                MostrarNotificacion(titulo,texto,clase);
                                            }
                                           
                                        });
                                        
                                    }
                        
                                    function  ValidarCamposAdministrador() 
                                    {

                                        //var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
                                        var regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

                                        var txtNombre_usu = $("#txtNombre_usu").val();
                                        var txtClave_usu = $("#txtClave_usu").val();
                                        var txtNombre_adm = $("#txtNombre_adm").val();
                                        var txtApellido_adm = $("#txtApellido_adm").val();
                                        var txtCorreo_adm = $("#txtCorreo_adm").val();
                                        var txtTelefono_adm = $("#txtTelefono_adm").val();
                                        var txtTelefono2_adm = $("#txtTelefono2_adm").val();
                                        var txtDni_adm = $("#txtDni_adm").val();
                                        var txtSueldo_adm = $("#txtSueldo_adm").val();
                                        var flFoto_usu = $("#flFoto_usu").val();
                                        if (txtNombre_usu == null ||  txtNombre_usu.trim() == '' || txtNombre_usu.length == 0 || 
                                            txtClave_usu == null || txtClave_usu.trim() == '' || txtClave_usu.length == 0 || 
                                            txtNombre_adm == null || txtNombre_adm.trim() == '' || txtNombre_adm.length == 0 || 
                                            txtApellido_adm == null || txtApellido_adm.trim() == '' || txtApellido_adm.length == 0 || 
                                            txtCorreo_adm == null || txtCorreo_adm.trim() == '' || txtCorreo_adm.length == 0 || 
                                            txtTelefono_adm == null || txtTelefono_adm.trim() == '' || txtTelefono_adm.length == 0 || 
                                            txtDni_adm == null || txtDni_adm.trim() == '' || txtDni_adm.length == 0 || 
                                            txtSueldo_adm == null || txtSueldo_adm.trim() == '' || txtSueldo_adm.length == 0 ) 
                                        {
                                            // Si no se cumple la condicion...
                                            var titulo = "Error de Validación";
                                            var texto = "Es necesario rellenar todos lo campos solicitados";
                                            var clase = "color warning";
                                            MostrarNotificacion(titulo,texto,clase);
                                            return false;
                                        }
                                        else if(!regex.test(txtCorreo_adm))
                                        {
                                            var titulo = "Error de sintaxis en el correo";
                                            var texto = "Por favor su correo '"+txtCorreo_adm+"' debe de incluir: <br> Almenos un caracter de cada lado, una '@' y su dominio [.com, .pe, .org, .net, etc] ";
                                            var clase = "color warning";
                                            MostrarNotificacion(titulo,texto,clase);
                                            return false;
                                        }
                                        else if(txtTelefono_adm.length < 9 || (txtTelefono2_adm.length < 9 && txtTelefono2_adm.length !=0))
                                        {
                                            var titulo = "Error en el numero de telefono";
                                            var texto = "Por favor el numero de telefono debe ocupar 9 digitos";
                                            var clase = "color warning";
                                            MostrarNotificacion(titulo,texto,clase);
                                            return false;
                                        }
                                        else if(txtDni_adm.length < 8 )
                                        {
                                            var titulo = "Error en el DNI";
                                            var texto = "Por favor el numero de DNI debe ocupar 8 digitos";
                                            var clase = "color warning";
                                            MostrarNotificacion(titulo,texto,clase);
                                            return false;
                                        }
                                        else if(flFoto_usu == null || flFoto_usu.trim() == '' || flFoto_usu.length == 0 || !/(.jpg)$/i.exec(flFoto_usu))
                                        {
                                            var titulo = "Error en la imagen";
                                            var texto = "Por favor el colocar la imagen o foto del usuario en formato .jpg";
                                            var clase = "color warning";
                                            MostrarNotificacion(titulo,texto,clase);
                                            return false;
                                        }
                                        return true;
                                    }
                        
                                    
                                    function ObtenerDatosAdministrador()
                                    {
                                        
                                        var txtNombre_usu = $("#txtNombre_usu").val().toUpperCase();
                                        var txtClave_usu = $("#txtClave_usu").val();
                                        var chkCodigo_estadoUsu = $("#chkCodigo_estadoUsu").prop('checked');
                                        var txtNombre_adm = $("#txtNombre_adm").val();
                                        var txtApellido_adm = $("#txtApellido_adm").val();
                                        var txtCorreo_adm = $("#txtCorreo_adm").val();
                                        var txtTelefono_adm = $("#txtTelefono_adm").val();
                                        var txtTelefono2_adm = $("#txtTelefono2_adm").val();
                                        var txtDni_adm = $("#txtDni_adm").val();
                                        var txtSueldo_adm = $("#txtSueldo_adm").val();
                                        var sltCodigo_estadoAdm = $("#sltCodigo_estadoAdm").val();

                                        var cabecera = {
                                            "txtNombre_usu":txtNombre_usu,
                                            "txtClave_usu":txtClave_usu,
                                            "chkCodigo_estadoUsu":chkCodigo_estadoUsu,
                                            "txtNombre_adm":txtNombre_adm,
                                            "txtApellido_adm":txtApellido_adm,
                                            "txtCorreo_adm":txtCorreo_adm,
                                            "txtTelefono_adm":txtTelefono_adm,
                                            "txtTelefono2_adm":txtTelefono2_adm,
                                            "txtDni_adm":txtDni_adm,
                                            "txtSueldo_adm":txtSueldo_adm,
                                            "sltCodigo_estadoAdm":sltCodigo_estadoAdm
                                        };
                                        return cabecera;
                                    }
                                    
                                    function subirFoto(id)
                                    {
                                        var formData = new FormData($("#uploadimage")[0]);
                                        formData.append("id", id);
                                        __ajaxImg('../Controlador/UsuarioMantControlador.php?op=10','POST',formData)
                                        .done(function(info){
                                            if(info.STATUS==true){  ;
                                                var titulo = "Imagen guardada";
                                                var texto = "La imagen se cargo con exito.";
                                                var clase = "color success";
                                                MostrarNotificacion(titulo,texto,clase);
                                            }else{
                                                var titulo = "Imagen guardada";
                                                var texto = "La imagen se cargo con exito.";
                                                var clase = "color success";
                                                MostrarNotificacion(titulo,texto,clase);
                                            }
                                        });
                                    }
                                </script>
                                <?php
                                break;
                            }
                            case 2:
                            {
                                $listaEstadosAdministrador=$_SESSION['listaEstadosAdministrador']; 
                                $listaAdministrador=$_SESSION['listaAdministrador']; 
                                ?>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="center-block" style="width: 100%; background: #e8eef5; padding: 30px; border-radius: 30px; border: #c2cedc solid; box-shadow: 5px 10px 20px 0px #919294; min-width: 280px;">
                                    <?php foreach ($listaAdministrador as  $mostrar)
                                         {  
                                            $codigo_adm=$mostrar['codigo_adm'];
                                            $nombre_adm=$mostrar['nombre_adm'];
                                            $apellido_adm=$mostrar['apellido_adm'];
                                            $correo_adm=$mostrar['correo_adm'];
                                            $telefono_adm=$mostrar['telefono_adm'];
                                            $telefono2_adm=$mostrar['telefono2_adm'];
                                            $dni_adm=$mostrar['dni_adm'];
                                            $sueldo_adm=$mostrar['sueldo_adm'];
                                            $codigo_estadoAdm=$mostrar['codigo_estadoAdm'];
                                            $nombre_estadoAdm=$mostrar['nombre_estadoAdm'];
                                            $codigo_usu=$mostrar['codigo_usu'];
                                            $nombre_usu=$mostrar['nombre_usu'];
                                            $clave_usu=$mostrar['clave_usu'];
                                            $codigo_estadoUsu=$mostrar['codigo_estadoUsu'];
                                            $nombre_estadoUsu=$mostrar['nombre_estadoUsu'];
                                    ?>     
                                            <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                                                <center><h4>Información del Administrador </h4></center>
                                                <br>
                                                <div class="col-sm-4">
                                                  <input type="hidden" value="<?= $codigo_adm ?>" id="hdnCodigo_adm">
                                                  <input type="hidden" value="<?= $codigo_usu ?>" id="hdnCodigo_usu">
                                                   <center>
                                                        <div id="contenedorFoto">
                                                            <img style="width: 100%; border: black solid;" src="../assets/users/<?= $codigo_usu ?>.jpg">
                                                        </div>
                                                        <label  for="flFoto_usu"> <i class="zmdi zmdi-upload"></i> Subir Foto</label>
                                                        <div id="info"></div>
                                                        <input type="file" name="flFoto_usu" id="flFoto_usu" class="file-input" onchange='ponerDatosFoto()' >
                                                    </center>
                                                    
                                                    <div style="background: #cce0f7;    padding: 10px;    border-radius: 10px;">
                                                        <p style="padding:2%;">Datos de Usuario<p>
                                                        <div class="form-group label-floating">
                                                          <label class="control-label" id="lblNombre_usu">Usuario de Administrador</label>
                                                          <input class="form-control" id="txtNombre_usu" type="text"  maxlength="40"   style="text-transform:uppercase;"  onkeypress="return validaSinEspacio(event)" onkeyup="ValidarNombreUsuario()" value="<?= $nombre_usu ?>" required>
                                                        </div>	
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Contraseña del Administrador</label>
                                                          <input class="form-control" id="txtClave_usu" type="text" maxlength="40"  value="<?= $clave_usu ?>" required>
                                                        </div>	
                                                <?php if($codigo_estadoUsu==1)
                                                        { ?>
                                                        <div class="form-group">
                                                            <label class="control-label">Estado de Usuario</label>
                                                            <div class="switch-button switch-button">
                                                                <input type="checkbox" checked id="chkCodigo_estadoUsu" ><span>
                                                                <label for="chkCodigo_estadoUsu"></label></span>
                                                            </div>
                                                        </div>
                                                <?php } else if($codigo_estadoUsu==2)
                                                        { ?>
                                                        <div class="form-group">
                                                            <label class="control-label">Estado de Usuario</label>
                                                            <div class="switch-button switch-button">
                                                                <input type="checkbox" id="chkCodigo_estadoUsu" ><span>
                                                                <label for="chkCodigo_estadoUsu"></label></span>
                                                            </div>
                                                        </div>
                                                <?php } ?>
                                                    </div>	
                                                </div>
                                                
                                                <div class="col-sm-offset-4">
                                                   
                                                    <div style="background: #cce0f7;    padding: 10px;    border-radius: 10px;">
                                                        <p style="padding:2%;">Datos Personales<p>
                                                        <br>
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Nombre del Administrador</label>
                                                          <input class="form-control" id="txtNombre_adm" type="text"  maxlength="40" onkeypress="return validaLetras(event)" value="<?= $nombre_adm ?>" required>
                                                        </div>	
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Apellido del Administrador</label>
                                                          <input class="form-control" id="txtApellido_adm" type="text" maxlength="40" onkeypress="return validaLetras(event)" value="<?= $apellido_adm ?>" required>
                                                        </div>	
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Correo del Administrador</label>
                                                          <input class="form-control" id="txtCorreo_adm" type="email" maxlength="40" value="<?= $correo_adm ?>" required>
                                                        </div>		
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Telefono del Administrador</label>
                                                          <input class="form-control" id="txtTelefono_adm" type="text" onkeypress='return validaNumericos(event)' maxlength="9" value="<?= $telefono_adm ?>" required>
                                                        </div>		
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Telefono Secundario del Administrador</label>
                                                          <input class="form-control" id="txtTelefono2_adm" type="text" onkeypress='return validaNumericos(event)' maxlength="9" value="<?= $telefono2_adm ?>"
                                                           required>
                                                        </div>	
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">DNI del Administrador</label>
                                                          <input class="form-control" id="txtDni_adm" type="text" onkeypress='return validaNumericos(event)' maxlength="8" value="<?= $dni_adm ?>" required>
                                                        </div>
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Sueldo del Administrador</label>
                                                          <input class="form-control" id="txtSueldo_adm" type="text" onkeypress='return validaNumericos(event)' maxlength="8" value="<?= $sueldo_adm ?>" required>
                                                        </div>	
                                                        <div class="form-group">
                                                            <label class="control-label">Estado del Administrador</label>
                                                            <select class="form-control" id="sltCodigo_estadoAdm">
                                                              <?php foreach ($listaEstadosAdministrador as  $mostrar)
                                                                     {  
                                                                        $codigo_estadoAdm2=$mostrar['codigo_estadoAdm'];
                                                                        $nombre_estadoAdm2=$mostrar['nombre_estadoAdm'];
                                                                        if($codigo_estadoAdm==$codigo_estadoAdm2)
                                                                        {
                                                                ?>
                                                                <option selected value="<?php echo $codigo_estadoAdm2; ?>"> <?php   echo $nombre_estadoAdm2; ?></option>
                                                                <?php                    
                                                                        }
                                                                        else
                                                                        {
                                                                ?> 
                                                              <option value="<?php echo $codigo_estadoAdm2; ?>"> <?php   echo $nombre_estadoAdm2; ?></option>
                                                              <?php     }
                                                                    }  ?>
                                                            </select>
                                                        </div>	
                                                    </div>	
                                                </div>
                                                					    
                                                <p class="text-center">
                                                    <a style="width: 90%;" class="btn btn-info btn-raised" href="javascript:ModificarAdministrador();"><i class="zmdi zmdi-floppy"></i> Guardar Administrador</a>
                                                </p>
                                            </form>
                                    <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <script>
                                    function ponerDatosFoto()
                                    {
                                        input=document.getElementById('flFoto_usu');

                                        if (input.files && input.files[0]) 
                                        {
                                            var pdrs = input.files[0].name;
                                            document.getElementById('info').innerHTML = pdrs;

                                            var reader = new FileReader();
                                            reader.readAsDataURL(input.files[0]);
                                            reader.onload = function (e){
                                                 //document.getElementById("contenedorFoto").innerHTML = ['<img src="'+e.target.result+'" width="450" height="300"/>'].join('');
                                                 $('#contenedorFoto').empty();
                                                 $('#contenedorFoto').append('<img src="'+e.target.result+'" style="width: 100%; max-width: 300px; border: black solid;">');
                                            }
                                        }
                                    }
                                    
                                    var  txtNombre_adm= document.getElementById('txtNombre_adm');
                                    var  txtApellido_adm= document.getElementById('txtApellido_adm');
                                    
                                    txtNombre_adm.addEventListener("keyup", generandoNombreUsuario);
                                    txtApellido_adm.addEventListener("keyup", generandoNombreUsuario);
                                    
                                    function generandoNombreUsuario()
                                    {  
                                        var txtNombre_adm = $("#txtNombre_adm").val();
                                        var txtApellido_adm = $("#txtApellido_adm").val();
                                        
                                        var x = txtApellido_adm.indexOf(" ");
                                        if(x>0)
                                        {
                                            var txtApellido_adm = txtApellido_adm.substr(0,x);
                                        }
                                        
                                        
                                        var nombredeusuario =txtNombre_adm.replace(/ /g, "").substr(0,1)+txtApellido_adm.replace(/ /g, "").replace(/\s+/g, "");
                                                              
                                        var cabecera = {
                                            "txtNombre_usu":nombredeusuario
                                        };
                                        var data = JSON.stringify(cabecera);

                                        __ajax('../Controlador/usuarioMantControlador.php?op=9','POST','JSON',{'data':data})
                                        .done(function(info){
                                            if(info.STATUS==true)
                                            {                 
                                                var nombredeusuario =txtNombre_adm.replace(/ /g, "").substr(0,2)+txtApellido_adm.replace(/ /g, "").replace(/\s+/g, "");
                                                
                                                var cabecera = {
                                                    "txtNombre_usu":nombredeusuario
                                                };
                                                var data = JSON.stringify(cabecera);
                                                    __ajax('../Controlador/usuarioMantControlador.php?op=9','POST','JSON',{'data':data})
                                                    .done(function(info){
                                                        if(info.STATUS==true)
                                                        {
                                                            var txtApellido_adm2 = $("#txtApellido_adm").val();
                                                            var nombredeusuario =txtNombre_adm.replace(/ /g, "").substr(0,2)+txtApellido_adm2.replace(/ /g, "").replace(/\s+/g, "")+'123';
                                                            document.getElementById("lblNombre_usu").style.color = "red";
                                                        }
                                                        else
                                                        {
                                                            var nombredeusuario =txtNombre_adm.replace(/ /g, "").substr(0,2)+txtApellido_adm.replace(/ /g, "").replace(/\s+/g, "");
                                                            document.getElementById("lblNombre_usu").style.color = "#425a6cd6";
                                                        }
                                                       document.getElementById('txtNombre_usu').value= nombredeusuario;
                                                    });
                                            }
                                            else
                                            {
                                                var nombredeusuario =txtNombre_adm.replace(/ /g, "").substr(0,1)+txtApellido_adm.replace(/ /g, "").replace(/\s+/g, "");
                                                document.getElementById("lblNombre_usu").style.color = "#425a6cd6";
                                                document.getElementById('txtNombre_usu').value= nombredeusuario;
                                            }
                                            
                                        
                                           // document.getElementById('txtNombre_usu').value= nombredeusuario;
                                            
                                        });
                                        
                                    }
                                    
                                    function ModificarAdministrador()
                                    {
                                        if(ValidarCamposAdministrador())
                                        {
                                            var data = JSON.stringify(ObtenerDatosAdministrador());
                                            __ajax('../Controlador/UsuarioMantControlador.php?op=<?php echo $op; ?>&op2=6','POST','JSON',{'data':data})
                                            .done(function(info){
                                                if(info.STATUS==true){  
                                                    //var codigo_usu = info.codigo_usu;
                                                    //subirFoto(codigo_usu);
                                                    var titulo = "Guardado Completo";
                                                    var texto = "El Administrador se guardo con exito.";
                                                    var clase = "color success";
                                                    MostrarNotificacion(titulo,texto,clase);
                                                    OpcionesModulos('usuarioMantControlador.php','4');
                                                }else{
                                                    var titulo = "Error de guardado";
                                                    var texto = "No se pudo guardo Administrador";
                                                    var clase = "color danger";
                                                    MostrarNotificacion(titulo,texto,clase);
                                                }
                                            });

                                        }
                                    }
                        
                                    
                                    function  ValidarNombreUsuario()
                                    {
                                        var txtNombre_usu = $("#txtNombre_usu").val().toUpperCase();
                                        var cabecera = {
                                            "txtNombre_usu":txtNombre_usu
                                        };
                                        var data = JSON.stringify(cabecera);
                                        __ajax('../Controlador/usuarioMantControlador.php?op=9','POST','JSON',{'data':data})
                                        .done(function(info){
                                            if(info.STATUS==true)
                                            {
                                                var titulo = "Problemas con el Nombre de Usuario";
                                                var texto = "Al parecer este Usuario ya existe";
                                                var clase = "color warning";
                                                MostrarNotificacion(titulo,texto,clase);
                                            }
                                           
                                        });
                                        
                                    }
                        
                                    function  ValidarCamposAdministrador() 
                                    {

                                        //var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
                                        var regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

                                        var txtNombre_usu = $("#txtNombre_usu").val();
                                        var txtClave_usu = $("#txtClave_usu").val();
                                        var txtNombre_adm = $("#txtNombre_adm").val();
                                        var txtApellido_adm = $("#txtApellido_adm").val();
                                        var txtCorreo_adm = $("#txtCorreo_adm").val();
                                        var txtTelefono_adm = $("#txtTelefono_adm").val();
                                        var txtTelefono2_adm = $("#txtTelefono2_adm").val();
                                        var txtDni_adm = $("#txtDni_adm").val();
                                        var txtSueldo_adm = $("#txtSueldo_adm").val();
                                        var flFoto_usu = $("#flFoto_usu").val();
                                        if (txtNombre_usu == null ||  txtNombre_usu.trim() == '' || txtNombre_usu.length == 0 || 
                                            txtClave_usu == null || txtClave_usu.trim() == '' || txtClave_usu.length == 0 || 
                                            txtNombre_adm == null || txtNombre_adm.trim() == '' || txtNombre_adm.length == 0 || 
                                            txtApellido_adm == null || txtApellido_adm.trim() == '' || txtApellido_adm.length == 0 || 
                                            txtCorreo_adm == null || txtCorreo_adm.trim() == '' || txtCorreo_adm.length == 0 || 
                                            txtTelefono_adm == null || txtTelefono_adm.trim() == '' || txtTelefono_adm.length == 0 || 
                                            txtDni_adm == null || txtDni_adm.trim() == '' || txtDni_adm.length == 0 || 
                                            txtSueldo_adm == null || txtSueldo_adm.trim() == '' || txtSueldo_adm.length == 0 ) 
                                        {
                                            // Si no se cumple la condicion...
                                            var titulo = "Error de Validación";
                                            var texto = "Es necesario rellenar todos lo campos solicitados";
                                            var clase = "color warning";
                                            MostrarNotificacion(titulo,texto,clase);
                                            return false;
                                        }
                                        else if(!regex.test(txtCorreo_adm))
                                        {
                                            var titulo = "Error de sintaxis en el correo";
                                            var texto = "Por favor su correo '"+txtCorreo_adm+"' debe de incluir: <br> Almenos un caracter de cada lado, una '@' y su dominio [.com, .pe, .org, .net, etc] ";
                                            var clase = "color warning";
                                            MostrarNotificacion(titulo,texto,clase);
                                            return false;
                                        }
                                        else if(txtTelefono_adm.length < 9 || (txtTelefono2_adm.length < 9 && txtTelefono2_adm.length !=0))
                                        {
                                            var titulo = "Error en el numero de telefono";
                                            var texto = "Por favor el numero de telefono debe ocupar 9 digitos";
                                            var clase = "color warning";
                                            MostrarNotificacion(titulo,texto,clase);
                                            return false;
                                        }
                                        else if(txtDni_adm.length < 8 )
                                        {
                                            var titulo = "Error en el DNI";
                                            var texto = "Por favor el numero de DNI debe ocupar 8 digitos";
                                            var clase = "color warning";
                                            MostrarNotificacion(titulo,texto,clase);
                                            return false;
                                        }/*
                                        else if((flFoto_usu != null || flFoto_usu.trim() != '' || flFoto_usu.length != 0) and !/(.jpg)$/i.exec(flFoto_usu))
                                        {
                                            var titulo = "Error en la imagen";
                                            var texto = "Por favor el colocar la imagen o foto del usuario en formato .jpg";
                                            var clase = "color warning";
                                            MostrarNotificacion(titulo,texto,clase);
                                            return false;
                                        }*/
                                        return true;
                                    }
                        
                                    
                                    function ObtenerDatosAdministrador()
                                    {
                                        var hdnCodigo_adm = $("#hdnCodigo_adm").val();
                                        var hdnCodigo_usu = $("#hdnCodigo_usu").val();
                                        var txtNombre_usu = $("#txtNombre_usu").val().toUpperCase();
                                        var txtClave_usu = $("#txtClave_usu").val();
                                        var chkCodigo_estadoUsu = $("#chkCodigo_estadoUsu").prop('checked');
                                        var txtNombre_adm = $("#txtNombre_adm").val();
                                        var txtApellido_adm = $("#txtApellido_adm").val();
                                        var txtCorreo_adm = $("#txtCorreo_adm").val();
                                        var txtTelefono_adm = $("#txtTelefono_adm").val();
                                        var txtTelefono2_adm = $("#txtTelefono2_adm").val();
                                        var txtDni_adm = $("#txtDni_adm").val();
                                        var txtSueldo_adm = $("#txtSueldo_adm").val();
                                        var sltCodigo_estadoAdm = $("#sltCodigo_estadoAdm").val();

                                        var cabecera = {
                                            "hdnCodigo_adm":hdnCodigo_adm,
                                            "hdnCodigo_usu":hdnCodigo_usu,
                                            "txtNombre_usu":txtNombre_usu,
                                            "txtClave_usu":txtClave_usu,
                                            "chkCodigo_estadoUsu":chkCodigo_estadoUsu,
                                            "txtNombre_adm":txtNombre_adm,
                                            "txtApellido_adm":txtApellido_adm,
                                            "txtCorreo_adm":txtCorreo_adm,
                                            "txtTelefono_adm":txtTelefono_adm,
                                            "txtTelefono2_adm":txtTelefono2_adm,
                                            "txtDni_adm":txtDni_adm,
                                            "txtSueldo_adm":txtSueldo_adm,
                                            "sltCodigo_estadoAdm":sltCodigo_estadoAdm
                                        };
                                        return cabecera;
                                    }
                                    
                                    function subirFoto(id)
                                    {
                                        var formData = new FormData($("#uploadimage")[0]);
                                        formData.append("id", id);
                                        __ajaxImg('../Controlador/UsuarioMantControlador.php?op=10','POST',formData)
                                        .done(function(info){
                                            if(info.STATUS==true){  ;
                                                var titulo = "Imagen guardada";
                                                var texto = "La imagen se cargo con exito.";
                                                var clase = "color success";
                                                MostrarNotificacion(titulo,texto,clase);
                                            }else{
                                                var titulo = "Imagen guardada";
                                                var texto = "La imagen se cargo con exito.";
                                                var clase = "color success";
                                                MostrarNotificacion(titulo,texto,clase);
                                            }
                                        });
                                    }
                                </script>
                                <?php
                                break;
                            }
                            case 3:
                            {
                                ?>
                                <?php
                                break;
                            }   
                        }
                    }
                    break;    
                }
                case 5:
                {
                    $listaClientesInternos=$_SESSION['listaClientesInternos'];
                    
?>
                    <a class="btn btn-raised btn-secondary" href="javascript:SubOpcionesModulos('usuarioMantControlador.php','<?= $op ?>','1') "><i class="zmdi zmdi-account-add"></i> Registrar</a>
                    <table class="table table-hover text-center display responsive nowrap tablaList" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Foto de Perfil</th>
                                <th class="text-center">Empresa</th>
                                <th class="text-center">Correo</th>
                                <th class="text-center">Telefono</th>
                                <th class="text-center">Telefono 2</th>
                                <th class="text-center">RUC</th>
                                <th class="text-center">Usuario</th>    
                                <th class="text-center">Clave</th> 
                                <th class="text-center">Estado del Usuario</th>    
                                <th class="text-center">Opciones</th>    
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($listaClientesInternos as  $mostrar)
                                {  
                                    $empresa_cli=$mostrar['empresa_cli'];
                                    $correo_cli=$mostrar['correo_cli'];
                                    $telefono_cli=$mostrar['telefono_cli'];
                                    $telefono2_cli=$mostrar['telefono2_cli'];
                                    $ruc_cli=$mostrar['ruc_cli'];
                                    $codigo_usu=$mostrar['codigo_usu'];
                                    $nombre_usu=$mostrar['nombre_usu'];
                                    $clave_usu=$mostrar['clave_usu'];
                                    $nombre_estadoUsu=$mostrar['nombre_estadoUsu'];
                        ?> 
                            <tr>
                                <td>
                                    <div style="margin: auto; border-radius: 50%; width: 80px;height: 80px; overflow: hidden;border: #234158 solid;">
                                        <img src="../assets/users/<?php echo $codigo_usu; ?>.jpg" style="width: 100%; height: 100%;">
                                    </div>
                                </td>
                                <td><?php echo $empresa_cli; ?></td>
                                <td><?php echo $correo_cli; ?></td>
                                <td><?php echo $telefono_cli; ?></td>
                                <td><?php echo $telefono2_cli; ?></td>
                                <td><?php echo $ruc_cli; ?></td>
                                <td><?php echo $nombre_usu; ?></td>
                                <td><?php echo $clave_usu; ?></td>
                                <td><?php echo $nombre_estadoUsu; ?></td>
                                <td> <a class="btn btn-success btn-raised btn-sm"><i class="zmdi zmdi-edit"></i> Modificar</a> <a class="btn btn-danger btn-raised btn-sm"><i class="zmdi zmdi-delete"></i> Eliminar</a></td>
                            </tr>
                            <?php   }  ?>
                        </tbody>
                    </table>
                    <script>
                        
                        
                        table = $('.tablaList').DataTable( {
                                    dom: 'Blfrtip'  ,
                                    buttons: [
                                        'copy',
                                        'excel',
                                        'csv',
                                        'pdf',
                                        'print'
                                    ]
                                } );
                        
                        
                        
                       
                        
                    </script>
<?php
                    break;    
                }
                case 6:
                {
                    $listaClientesExternos=$_SESSION['listaClientesExternos'];
                    
?>
                    <a class="btn btn-raised btn-secondary" href="javascript:SubOpcionesModulos('usuarioMantControlador.php','<?= $op ?>','1') "><i class="zmdi zmdi-account-add"></i> Registrar</a>
                    <table class="table table-hover text-center display responsive nowrap tablaList" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Foto de Perfil</th>
                                <th class="text-center">Empresa</th>
                                <th class="text-center">Correo</th>
                                <th class="text-center">Telefono</th>
                                <th class="text-center">Telefono 2</th>
                                <th class="text-center">RUC</th>
                                <th class="text-center">Usuario</th>    
                                <th class="text-center">Clave</th> 
                                <th class="text-center">Estado del Usuario</th>    
                                <th class="text-center">Opciones</th>    
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($listaClientesExternos as  $mostrar)
                                {  
                                    $empresa_cli=$mostrar['empresa_cli'];
                                    $correo_cli=$mostrar['correo_cli'];
                                    $telefono_cli=$mostrar['telefono_cli'];
                                    $telefono2_cli=$mostrar['telefono2_cli'];
                                    $ruc_cli=$mostrar['ruc_cli'];
                                    $codigo_usu=$mostrar['codigo_usu'];
                                    $nombre_usu=$mostrar['nombre_usu'];
                                    $clave_usu=$mostrar['clave_usu'];
                                    $nombre_estadoUsu=$mostrar['nombre_estadoUsu'];
                        ?> 
                            <tr>
                                <td>
                                    <div style="margin: auto; border-radius: 50%; width: 80px;height: 80px; overflow: hidden;border: #234158 solid;">
                                        <img src="../assets/users/<?php echo $codigo_usu; ?>.jpg" style="width: 100%; height: 100%;">
                                    </div>
                                </td>
                                <td><?php echo $empresa_cli; ?></td>
                                <td><?php echo $correo_cli; ?></td>
                                <td><?php echo $telefono_cli; ?></td>
                                <td><?php echo $telefono2_cli; ?></td>
                                <td><?php echo $ruc_cli; ?></td>
                                <td><?php echo $nombre_usu; ?></td>
                                <td><?php echo $clave_usu; ?></td>
                                <td><?php echo $nombre_estadoUsu; ?></td>
                                <td> <a class="btn btn-success btn-raised btn-sm"><i class="zmdi zmdi-edit"></i> Modificar</a> <a class="btn btn-danger btn-raised btn-sm"><i class="zmdi zmdi-delete"></i> Eliminar</a></td>
                            </tr>
                            <?php   }  ?>
                        </tbody>
                    </table>
                    <script>
                        
                        
                        table = $('.tablaList').DataTable( {
                                    dom: 'Blfrtip'  ,
                                    buttons: [
                                        'copy',
                                        'excel',
                                        'csv',
                                        'pdf',
                                        'print'
                                    ]
                                } );
                        
                        
                        
                       
                        
                    </script>
<?php
                    break;
                }
                case 7:
                {
                    if(!isset($_GET['op2']))
                    {
                        $listaTecnicos=$_SESSION['listaTecnicos'];
                    
?>
                        <a class="btn btn-raised btn-secondary" href="javascript:SubOpcionesModulos('usuarioMantControlador.php','<?= $op ?>','1') "><i class="zmdi zmdi-account-add"></i> Registrar</a>
                        <table class="table table-hover text-center display responsive nowrap tablaList" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Foto de Perfil</th>
                                    <th class="text-center">Nombres y Apellidos</th>
                                    <th class="text-center">Correo</th>
                                    <th class="text-center">Telefono</th>
                                    <th class="text-center">Telefono 2</th>
                                    <th class="text-center">DNI</th>  
                                    <th class="text-center">Sueldo</th>
                                    <th class="text-center">Estado del Analista</th> 
                                    <th class="text-center">Usuario</th>    
                                    <th class="text-center">Clave</th> 
                                    <th class="text-center">Estado del Usuario</th>    
                                    <th class="text-center">Opciones</th>    
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($listaTecnicos as  $mostrar)
                                    { 
                                        $nombre_tec=$mostrar['nombre_tec'];
                                        $apellido_tec=$mostrar['apellido_tec'];
                                        $correo_tec=$mostrar['correo_tec'];
                                        $telefono_tec=$mostrar['telefono_tec'];
                                        $telefono2_tec=$mostrar['telefono2_tec'];
                                        $dni_tec=$mostrar['dni_tec'];
                                        $sueldo_tec=$mostrar['sueldo_tec'];
                                        $nombre_estadoTec=$mostrar['nombre_estadoTec'];
                                        $codigo_usu=$mostrar['codigo_usu'];
                                        $nombre_usu=$mostrar['nombre_usu'];
                                        $clave_usu=$mostrar['clave_usu'];
                                        $nombre_estadoUsu=$mostrar['nombre_estadoUsu'];
                            ?> 
                                <tr>
                                    <td>
                                        <div style="margin: auto; border-radius: 50%; width: 80px;height: 80px; overflow: hidden;border: #234158 solid;">
                                            <img src="../assets/users/<?php echo $codigo_usu; ?>.jpg" style="width: 100%; height: 100%;">
                                        </div>
                                    </td>
                                    <td><?php echo $nombre_tec.' '.$apellido_tec; ?></td>
                                    <td><?php echo $correo_tec; ?></td>
                                    <td><?php echo $telefono_tec; ?></td>
                                    <td><?php echo $telefono2_tec; ?></td>
                                    <td><?php echo $dni_tec; ?></td>
                                    <td><?php echo $sueldo_tec; ?></td>
                                    <td><?php echo $nombre_estadoTec; ?></td>
                                    <td><?php echo $nombre_usu; ?></td>
                                    <td><?php echo $clave_usu; ?></td>
                                    <td><?php echo $nombre_estadoUsu; ?></td>
                                    <td> <a class="btn btn-success btn-raised btn-sm"><i class="zmdi zmdi-edit"></i> Modificar</a> <a class="btn btn-danger btn-raised btn-sm"><i class="zmdi zmdi-delete"></i> Eliminar</a></td>
                                </tr>
                                <?php   }  ?>
                            </tbody>
                        </table>
                        <script>


                            table = $('.tablaList').DataTable( {
                                        dom: 'Blfrtip'  ,
                                        buttons: [
                                            'copy',
                                            'excel',
                                            'csv',
                                            'pdf',
                                            'print'
                                        ]
                                    } );





                        </script>
<?php
                    }
                    else
                    {
                        $op2=$_GET['op2'];
                        switch ($op2)
                        {
                            case 1:
                            {
                                ?>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="center-block" style="width: 100%; background: #e8eef5; padding: 30px; border-radius: 30px; border: #c2cedc solid; box-shadow: 5px 10px 20px 0px #919294; min-width: 280px;">
                                            <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                                                <center><h4>Información del Tecnico </h4></center>
                                                <br>
                                                
                                                <div class="col-sm-4">
                                                   <center>
                                                        <div id="contenedorFoto">
                                                            <img style="width: 100%; border: black solid;" src="../assets/users/admin.jpg">
                                                        </div>
                                                        <label  for="flFoto_usu"> <i class="zmdi zmdi-upload"></i> Subir Foto</label>
                                                        <div id="info"></div>
                                                        <input type="file" name="flFoto_usu" id="flFoto_usu" class="file-input" onchange='ponerDatosFoto()' >
                                                    </center>
                                                    
                                                    <div style="background: #cce0f7;    padding: 10px;    border-radius: 10px;">
                                                        <p style="padding:2%;">Datos de Usuario<p>
                                                        <div class="form-group label-floating">
                                                          <label class="control-label" id="lblNombre_usu">Usuario de Tecnico</label>
                                                          <input class="form-control" id="txtNombre_usu" type="text"  maxlength="40"   style="text-transform:uppercase;"  onkeypress="return validaSinEspacio(event)" onkeyup="ValidarNombreUsuario()" required>
                                                        </div>	
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Contraseña del Tecnico</label>
                                                          <input class="form-control" id="txtClave_usu" type="text" maxlength="40" required>
                                                        </div>	
                                                        <div class="form-group">
                                                            <label class="control-label">Estado de Usuario</label>
                                                            <div class="switch-button switch-button">
                                                                <input type="checkbox" id="chkCodigo_estadoUsu" checked><span>
                                                                <label for="chkCodigo_estadoUsu"></label></span>
                                                            </div>
                                                        </div>
                                                    </div>	
                                                </div>
                                                
                                                <div class="col-sm-offset-4">
                                                   
                                                    <div style="background: #cce0f7;    padding: 10px;    border-radius: 10px;">
                                                        <p style="padding:2%;">Datos Personales<p>
                                                        <br>
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Nombre del Tecnico</label>
                                                          <input class="form-control" id="txtNombre_tec" type="text"  maxlength="40" onkeypress="return validaLetras(event)" required>
                                                        </div>	
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Apellido del Tecnico</label>
                                                          <input class="form-control" id="txtApellido_tec" type="text" maxlength="40" onkeypress="return validaLetras(event)" required>
                                                        </div>	
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Correo del Tecnico</label>
                                                          <input class="form-control" id="txtCorreo_tec" type="email" maxlength="40" required>
                                                        </div>		
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Telefono del Tecnico</label>
                                                          <input class="form-control" id="txtTelefono_tec" type="text" onkeypress='return validaNumericos(event)' maxlength="9" required>
                                                        </div>		
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Telefono Secundario del Tecnico</label>
                                                          <input class="form-control" id="txtTelefono2_tec" type="text" onkeypress='return validaNumericos(event)' maxlength="9" required>
                                                        </div>	
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">DNI del Tecnico</label>
                                                          <input class="form-control" id="txtDni_tec" type="text" onkeypress='return validaNumericos(event)' maxlength="8" required>
                                                        </div>
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Sueldo del Tecnico</label>
                                                          <input class="form-control" id="txtSueldo_tec" type="text" onkeypress='return validaNumericos(event)' maxlength="8" required>
                                                        </div>	
                                                    </div>	
                                                </div>
                                                					    
                                                <p class="text-center">
                                                    <a style="width: 90%;" class="btn btn-info btn-raised" href="javascript:RegistrarTecnico();"><i class="zmdi zmdi-floppy"></i> Registrar Tecnico</a>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                    <script>
                                    function ponerDatosFoto()
                                    {
                                        input=document.getElementById('flFoto_usu');

                                        if (input.files && input.files[0]) 
                                        {
                                            var pdrs = input.files[0].name;
                                            document.getElementById('info').innerHTML = pdrs;

                                            var reader = new FileReader();
                                            reader.readAsDataURL(input.files[0]);
                                            reader.onload = function (e){
                                                 //document.getElementById("contenedorFoto").innerHTML = ['<img src="'+e.target.result+'" width="450" height="300"/>'].join('');
                                                 $('#contenedorFoto').empty();
                                                 $('#contenedorFoto').append('<img src="'+e.target.result+'" style="width: 100%; max-width: 300px; border: black solid;">');
                                            }
                                        }
                                    }
                                    
                                    var  txtNombre_tec= document.getElementById('txtNombre_tec');
                                    var  txtApellido_tec= document.getElementById('txtApellido_tec');
                                    
                                    txtNombre_tec.addEventListener("keyup", generandoNombreUsuario);
                                    txtApellido_tec.addEventListener("keyup", generandoNombreUsuario);
                                    
                                    function generandoNombreUsuario()
                                    {  
                                        var txtNombre_tec = $("#txtNombre_tec").val();
                                        var txtApellido_tec = $("#txtApellido_tec").val();
                                        
                                        var x = txtApellido_tec.indexOf(" ");
                                        if(x>0)
                                        {
                                            var txtApellido_tec = txtApellido_tec.substr(0,x);
                                        }
                                        
                                        
                                        var nombredeusuario =txtNombre_tec.replace(/ /g, "").substr(0,1)+txtApellido_tec.replace(/ /g, "").replace(/\s+/g, "");
                                                              
                                        var cabecera = {
                                            "txtNombre_usu":nombredeusuario
                                        };
                                        var data = JSON.stringify(cabecera);

                                        __ajax('../Controlador/usuarioMantControlador.php?op=9','POST','JSON',{'data':data})
                                        .done(function(info){
                                            if(info.STATUS==true)
                                            {                 
                                                var nombredeusuario =txtNombre_tec.replace(/ /g, "").substr(0,2)+txtApellido_tec.replace(/ /g, "").replace(/\s+/g, "");
                                                
                                                var cabecera = {
                                                    "txtNombre_usu":nombredeusuario
                                                };
                                                var data = JSON.stringify(cabecera);
                                                    __ajax('../Controlador/usuarioMantControlador.php?op=9','POST','JSON',{'data':data})
                                                    .done(function(info){
                                                        if(info.STATUS==true)
                                                        {
                                                            var txtApellido_tec2 = $("#txtApellido_tec").val();
                                                            var nombredeusuario =txtNombre_tec.replace(/ /g, "").substr(0,2)+txtApellido_tec2.replace(/ /g, "").replace(/\s+/g, "")+'123';
                                                            document.getElementById("lblNombre_usu").style.color = "red";
                                                        }
                                                        else
                                                        {
                                                            var nombredeusuario =txtNombre_tec.replace(/ /g, "").substr(0,2)+txtApellido_tec.replace(/ /g, "").replace(/\s+/g, "");
                                                            document.getElementById("lblNombre_usu").style.color = "#425a6cd6";
                                                        }
                                                       document.getElementById('txtNombre_usu').value= nombredeusuario;
                                                    });
                                            }
                                            else
                                            {
                                                var nombredeusuario =txtNombre_tec.replace(/ /g, "").substr(0,1)+txtApellido_tec.replace(/ /g, "").replace(/\s+/g, "");
                                                document.getElementById("lblNombre_usu").style.color = "#425a6cd6";
                                                document.getElementById('txtNombre_usu').value= nombredeusuario;
                                            }
                                            
                                        
                                           // document.getElementById('txtNombre_usu').value= nombredeusuario;
                                            
                                        });
                                        
                                    }
                                    
                                    
                                    
                                    function RegistrarTecnico()
                                    {
                                        if(ValidarCamposTecnico())
                                        {
                                            var data = JSON.stringify(ObtenerDatostecinistrador());
                                            __ajax('../Controlador/UsuarioMantControlador.php?op=<?php echo $op; ?>&op2=5','POST','JSON',{'data':data})
                                            .done(function(info){
                                                if(info.STATUS==true){  
                                                    var codigo_usu = info.codigo_usu;
                                                    subirFoto(codigo_usu);
                                                    var titulo = "Registro Completo";
                                                    var texto = "El tecinistrador se registro con exito.";
                                                    var clase = "color success";
                                                    MostrarNotificacion(titulo,texto,clase);
                                                    OpcionesModulos('usuarioMantControlador.php','4');
                                                }else{
                                                    var titulo = "Error de registro";
                                                    var texto = "No se pudo registrar tecinistrador";
                                                    var clase = "color danger";
                                                    MostrarNotificacion(titulo,texto,clase);
                                                }
                                            });

                                        }
                                    }
                        
                                    
                                    function  ValidarNombreUsuario()
                                    {
                                        var txtNombre_usu = $("#txtNombre_usu").val().toUpperCase();
                                        var cabecera = {
                                            "txtNombre_usu":txtNombre_usu
                                        };
                                        var data = JSON.stringify(cabecera);
                                        __ajax('../Controlador/usuarioMantControlador.php?op=9','POST','JSON',{'data':data})
                                        .done(function(info){
                                            if(info.STATUS==true)
                                            {
                                                var titulo = "Problemas con el Nombre de Usuario";
                                                var texto = "Al parecer este Usuario ya existe";
                                                var clase = "color warning";
                                                MostrarNotificacion(titulo,texto,clase);
                                            }
                                           
                                        });
                                        
                                    }
                        
                                    function  ValidarCamposTecnico() 
                                    {

                                        //var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
                                        var regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

                                        var txtNombre_usu = $("#txtNombre_usu").val();
                                        var txtClave_usu = $("#txtClave_usu").val();
                                        var txtNombre_tec = $("#txtNombre_tec").val();
                                        var txtApellido_tec = $("#txtApellido_tec").val();
                                        var txtCorreo_tec = $("#txtCorreo_tec").val();
                                        var txtTelefono_tec = $("#txtTelefono_tec").val();
                                        var txtTelefono2_tec = $("#txtTelefono2_tec").val();
                                        var txtDni_tec = $("#txtDni_tec").val();
                                        var txtSueldo_tec = $("#txtSueldo_tec").val();
                                        var flFoto_usu = $("#flFoto_usu").val();
                                        if (txtNombre_usu == null ||  txtNombre_usu.trim() == '' || txtNombre_usu.length == 0 || 
                                            txtClave_usu == null || txtClave_usu.trim() == '' || txtClave_usu.length == 0 || 
                                            txtNombre_tec == null || txtNombre_tec.trim() == '' || txtNombre_tec.length == 0 || 
                                            txtApellido_tec == null || txtApellido_tec.trim() == '' || txtApellido_tec.length == 0 || 
                                            txtCorreo_tec == null || txtCorreo_tec.trim() == '' || txtCorreo_tec.length == 0 || 
                                            txtTelefono_tec == null || txtTelefono_tec.trim() == '' || txtTelefono_tec.length == 0 || 
                                            txtDni_tec == null || txtDni_tec.trim() == '' || txtDni_tec.length == 0 || 
                                            txtSueldo_tec == null || txtSueldo_tec.trim() == '' || txtSueldo_tec.length == 0 ) 
                                        {
                                            // Si no se cumple la condicion...
                                            var titulo = "Error de Validación";
                                            var texto = "Es necesario rellenar todos lo campos solicitados";
                                            var clase = "color warning";
                                            MostrarNotificacion(titulo,texto,clase);
                                            return false;
                                        }
                                        else if(!regex.test(txtCorreo_tec))
                                        {
                                            var titulo = "Error de sintaxis en el correo";
                                            var texto = "Por favor su correo '"+txtCorreo_tec+"' debe de incluir: <br> Almenos un caracter de cada lado, una '@' y su dominio [.com, .pe, .org, .net, etc] ";
                                            var clase = "color warning";
                                            MostrarNotificacion(titulo,texto,clase);
                                            return false;
                                        }
                                        else if(txtTelefono_tec.length < 9 || (txtTelefono2_tec.length < 9 && txtTelefono2_tec.length !=0))
                                        {
                                            var titulo = "Error en el numero de telefono";
                                            var texto = "Por favor el numero de telefono debe ocupar 9 digitos";
                                            var clase = "color warning";
                                            MostrarNotificacion(titulo,texto,clase);
                                            return false;
                                        }
                                        else if(txtDni_tec.length < 8 )
                                        {
                                            var titulo = "Error en el DNI";
                                            var texto = "Por favor el numero de DNI debe ocupar 8 digitos";
                                            var clase = "color warning";
                                            MostrarNotificacion(titulo,texto,clase);
                                            return false;
                                        }
                                        else if(flFoto_usu == null || flFoto_usu.trim() == '' || flFoto_usu.length == 0 || !/(.jpg)$/i.exec(flFoto_usu))
                                        {
                                            var titulo = "Error en la imagen";
                                            var texto = "Por favor el colocar la imagen o foto del usuario en formato .jpg";
                                            var clase = "color warning";
                                            MostrarNotificacion(titulo,texto,clase);
                                            return false;
                                        }
                                        return true;
                                    }
                        
                                    
                                    function ObtenerDatosTecnico()
                                    {
                                        
                                        var txtNombre_usu = $("#txtNombre_usu").val().toUpperCase();
                                        var txtClave_usu = $("#txtClave_usu").val();
                                        var chkCodigo_estadoUsu = $("#chkCodigo_estadoUsu").prop('checked');
                                        var txtNombre_tec = $("#txtNombre_tec").val();
                                        var txtApellido_tec = $("#txtApellido_tec").val();
                                        var txtCorreo_tec = $("#txtCorreo_tec").val();
                                        var txtTelefono_tec = $("#txtTelefono_tec").val();
                                        var txtTelefono2_tec = $("#txtTelefono2_tec").val();
                                        var txtDni_tec = $("#txtDni_tec").val();
                                        var txtSueldo_tec = $("#txtSueldo_tec").val();

                                        var cabecera = {
                                            "txtNombre_usu":txtNombre_usu,
                                            "txtClave_usu":txtClave_usu,
                                            "chkCodigo_estadoUsu":chkCodigo_estadoUsu,
                                            "txtNombre_tec":txtNombre_tec,
                                            "txtApellido_tec":txtApellido_tec,
                                            "txtCorreo_tec":txtCorreo_tec,
                                            "txtTelefono_tec":txtTelefono_tec,
                                            "txtTelefono2_tec":txtTelefono2_tec,
                                            "txtDni_tec":txtDni_tec,
                                            "txtSueldo_tec":txtSueldo_tec
                                        };
                                        return cabecera;
                                    }
                                    
                                    function subirFoto(id)
                                    {
                                        var formData = new FormData($("#uploadimage")[0]);
                                        formData.append("id", id);
                                        __ajaxImg('../Controlador/UsuarioMantControlador.php?op=10','POST',formData)
                                        .done(function(info){
                                            if(info.STATUS==true){  ;
                                                var titulo = "Imagen guardada";
                                                var texto = "La imagen se cargo con exito.";
                                                var clase = "color success";
                                                MostrarNotificacion(titulo,texto,clase);
                                            }else{
                                                var titulo = "Imagen guardada";
                                                var texto = "La imagen se cargo con exito.";
                                                var clase = "color success";
                                                MostrarNotificacion(titulo,texto,clase);
                                            }
                                        });
                                    }
                                </script>
                                <?php
                                break;
                            }
                            case 2:
                            {
                                $listaEstadosAdministrador=$_SESSION['listaEstadosAdministrador']; 
                                $listaAdministrador=$_SESSION['listaAdministrador']; 
                                ?>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="center-block" style="width: 100%; background: #e8eef5; padding: 30px; border-radius: 30px; border: #c2cedc solid; box-shadow: 5px 10px 20px 0px #919294; min-width: 280px;">
                                    <?php foreach ($listaAdministrador as  $mostrar)
                                         {  
                                            $codigo_adm=$mostrar['codigo_adm'];
                                            $nombre_adm=$mostrar['nombre_adm'];
                                            $apellido_adm=$mostrar['apellido_adm'];
                                            $correo_adm=$mostrar['correo_adm'];
                                            $telefono_adm=$mostrar['telefono_adm'];
                                            $telefono2_adm=$mostrar['telefono2_adm'];
                                            $dni_adm=$mostrar['dni_adm'];
                                            $sueldo_adm=$mostrar['sueldo_adm'];
                                            $codigo_estadoAdm=$mostrar['codigo_estadoAdm'];
                                            $nombre_estadoAdm=$mostrar['nombre_estadoAdm'];
                                            $codigo_usu=$mostrar['codigo_usu'];
                                            $nombre_usu=$mostrar['nombre_usu'];
                                            $clave_usu=$mostrar['clave_usu'];
                                            $codigo_estadoUsu=$mostrar['codigo_estadoUsu'];
                                            $nombre_estadoUsu=$mostrar['nombre_estadoUsu'];
                                    ?>     
                                            <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                                                <center><h4>Información del Administrador </h4></center>
                                                <br>
                                                <div class="col-sm-4">
                                                  <input type="hidden" value="<?= $codigo_adm ?>" id="hdnCodigo_adm">
                                                  <input type="hidden" value="<?= $codigo_usu ?>" id="hdnCodigo_usu">
                                                   <center>
                                                        <div id="contenedorFoto">
                                                            <img style="width: 100%; border: black solid;" src="../assets/users/<?= $codigo_usu ?>.jpg">
                                                        </div>
                                                        <label  for="flFoto_usu"> <i class="zmdi zmdi-upload"></i> Subir Foto</label>
                                                        <div id="info"></div>
                                                        <input type="file" name="flFoto_usu" id="flFoto_usu" class="file-input" onchange='ponerDatosFoto()' >
                                                    </center>
                                                    
                                                    <div style="background: #cce0f7;    padding: 10px;    border-radius: 10px;">
                                                        <p style="padding:2%;">Datos de Usuario<p>
                                                        <div class="form-group label-floating">
                                                          <label class="control-label" id="lblNombre_usu">Usuario de Administrador</label>
                                                          <input class="form-control" id="txtNombre_usu" type="text"  maxlength="40"   style="text-transform:uppercase;"  onkeypress="return validaSinEspacio(event)" onkeyup="ValidarNombreUsuario()" value="<?= $nombre_usu ?>" required>
                                                        </div>	
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Contraseña del Administrador</label>
                                                          <input class="form-control" id="txtClave_usu" type="text" maxlength="40"  value="<?= $clave_usu ?>" required>
                                                        </div>	
                                                <?php if($codigo_estadoUsu==1)
                                                        { ?>
                                                        <div class="form-group">
                                                            <label class="control-label">Estado de Usuario</label>
                                                            <div class="switch-button switch-button">
                                                                <input type="checkbox" checked id="chkCodigo_estadoUsu" ><span>
                                                                <label for="chkCodigo_estadoUsu"></label></span>
                                                            </div>
                                                        </div>
                                                <?php } else if($codigo_estadoUsu==2)
                                                        { ?>
                                                        <div class="form-group">
                                                            <label class="control-label">Estado de Usuario</label>
                                                            <div class="switch-button switch-button">
                                                                <input type="checkbox" id="chkCodigo_estadoUsu" ><span>
                                                                <label for="chkCodigo_estadoUsu"></label></span>
                                                            </div>
                                                        </div>
                                                <?php } ?>
                                                    </div>	
                                                </div>
                                                
                                                <div class="col-sm-offset-4">
                                                   
                                                    <div style="background: #cce0f7;    padding: 10px;    border-radius: 10px;">
                                                        <p style="padding:2%;">Datos Personales<p>
                                                        <br>
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Nombre del Administrador</label>
                                                          <input class="form-control" id="txtNombre_adm" type="text"  maxlength="40" onkeypress="return validaLetras(event)" value="<?= $nombre_adm ?>" required>
                                                        </div>	
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Apellido del Administrador</label>
                                                          <input class="form-control" id="txtApellido_adm" type="text" maxlength="40" onkeypress="return validaLetras(event)" value="<?= $apellido_adm ?>" required>
                                                        </div>	
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Correo del Administrador</label>
                                                          <input class="form-control" id="txtCorreo_adm" type="email" maxlength="40" value="<?= $correo_adm ?>" required>
                                                        </div>		
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Telefono del Administrador</label>
                                                          <input class="form-control" id="txtTelefono_adm" type="text" onkeypress='return validaNumericos(event)' maxlength="9" value="<?= $telefono_adm ?>" required>
                                                        </div>		
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Telefono Secundario del Administrador</label>
                                                          <input class="form-control" id="txtTelefono2_adm" type="text" onkeypress='return validaNumericos(event)' maxlength="9" value="<?= $telefono2_adm ?>"
                                                           required>
                                                        </div>	
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">DNI del Administrador</label>
                                                          <input class="form-control" id="txtDni_adm" type="text" onkeypress='return validaNumericos(event)' maxlength="8" value="<?= $dni_adm ?>" required>
                                                        </div>
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Sueldo del Administrador</label>
                                                          <input class="form-control" id="txtSueldo_adm" type="text" onkeypress='return validaNumericos(event)' maxlength="8" value="<?= $sueldo_adm ?>" required>
                                                        </div>	
                                                        <div class="form-group">
                                                            <label class="control-label">Estado del Administrador</label>
                                                            <select class="form-control" id="sltCodigo_estadoAdm">
                                                              <?php foreach ($listaEstadosAdministrador as  $mostrar)
                                                                     {  
                                                                        $codigo_estadoAdm2=$mostrar['codigo_estadoAdm'];
                                                                        $nombre_estadoAdm2=$mostrar['nombre_estadoAdm'];
                                                                        if($codigo_estadoAdm==$codigo_estadoAdm2)
                                                                        {
                                                                ?>
                                                                <option selected value="<?php echo $codigo_estadoAdm2; ?>"> <?php   echo $nombre_estadoAdm2; ?></option>
                                                                <?php                    
                                                                        }
                                                                        else
                                                                        {
                                                                ?> 
                                                              <option value="<?php echo $codigo_estadoAdm2; ?>"> <?php   echo $nombre_estadoAdm2; ?></option>
                                                              <?php     }
                                                                    }  ?>
                                                            </select>
                                                        </div>	
                                                    </div>	
                                                </div>
                                                					    
                                                <p class="text-center">
                                                    <a style="width: 90%;" class="btn btn-info btn-raised" href="javascript:ModificarAdministrador();"><i class="zmdi zmdi-floppy"></i> Guardar Administrador</a>
                                                </p>
                                            </form>
                                    <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <script>
                                    function ponerDatosFoto()
                                    {
                                        input=document.getElementById('flFoto_usu');

                                        if (input.files && input.files[0]) 
                                        {
                                            var pdrs = input.files[0].name;
                                            document.getElementById('info').innerHTML = pdrs;

                                            var reader = new FileReader();
                                            reader.readAsDataURL(input.files[0]);
                                            reader.onload = function (e){
                                                 //document.getElementById("contenedorFoto").innerHTML = ['<img src="'+e.target.result+'" width="450" height="300"/>'].join('');
                                                 $('#contenedorFoto').empty();
                                                 $('#contenedorFoto').append('<img src="'+e.target.result+'" style="width: 100%; max-width: 300px; border: black solid;">');
                                            }
                                        }
                                    }
                                    
                                    var  txtNombre_adm= document.getElementById('txtNombre_adm');
                                    var  txtApellido_adm= document.getElementById('txtApellido_adm');
                                    
                                    txtNombre_adm.addEventListener("keyup", generandoNombreUsuario);
                                    txtApellido_adm.addEventListener("keyup", generandoNombreUsuario);
                                    
                                    function generandoNombreUsuario()
                                    {  
                                        var txtNombre_adm = $("#txtNombre_adm").val();
                                        var txtApellido_adm = $("#txtApellido_adm").val();
                                        
                                        var x = txtApellido_adm.indexOf(" ");
                                        if(x>0)
                                        {
                                            var txtApellido_adm = txtApellido_adm.substr(0,x);
                                        }
                                        
                                        
                                        var nombredeusuario =txtNombre_adm.replace(/ /g, "").substr(0,1)+txtApellido_adm.replace(/ /g, "").replace(/\s+/g, "");
                                                              
                                        var cabecera = {
                                            "txtNombre_usu":nombredeusuario
                                        };
                                        var data = JSON.stringify(cabecera);

                                        __ajax('../Controlador/usuarioMantControlador.php?op=9','POST','JSON',{'data':data})
                                        .done(function(info){
                                            if(info.STATUS==true)
                                            {                 
                                                var nombredeusuario =txtNombre_adm.replace(/ /g, "").substr(0,2)+txtApellido_adm.replace(/ /g, "").replace(/\s+/g, "");
                                                
                                                var cabecera = {
                                                    "txtNombre_usu":nombredeusuario
                                                };
                                                var data = JSON.stringify(cabecera);
                                                    __ajax('../Controlador/usuarioMantControlador.php?op=9','POST','JSON',{'data':data})
                                                    .done(function(info){
                                                        if(info.STATUS==true)
                                                        {
                                                            var txtApellido_adm2 = $("#txtApellido_adm").val();
                                                            var nombredeusuario =txtNombre_adm.replace(/ /g, "").substr(0,2)+txtApellido_adm2.replace(/ /g, "").replace(/\s+/g, "")+'123';
                                                            document.getElementById("lblNombre_usu").style.color = "red";
                                                        }
                                                        else
                                                        {
                                                            var nombredeusuario =txtNombre_adm.replace(/ /g, "").substr(0,2)+txtApellido_adm.replace(/ /g, "").replace(/\s+/g, "");
                                                            document.getElementById("lblNombre_usu").style.color = "#425a6cd6";
                                                        }
                                                       document.getElementById('txtNombre_usu').value= nombredeusuario;
                                                    });
                                            }
                                            else
                                            {
                                                var nombredeusuario =txtNombre_adm.replace(/ /g, "").substr(0,1)+txtApellido_adm.replace(/ /g, "").replace(/\s+/g, "");
                                                document.getElementById("lblNombre_usu").style.color = "#425a6cd6";
                                                document.getElementById('txtNombre_usu').value= nombredeusuario;
                                            }
                                            
                                        
                                           // document.getElementById('txtNombre_usu').value= nombredeusuario;
                                            
                                        });
                                        
                                    }
                                    
                                    function ModificarAdministrador()
                                    {
                                        if(ValidarCamposAdministrador())
                                        {
                                            var data = JSON.stringify(ObtenerDatosAdministrador());
                                            __ajax('../Controlador/UsuarioMantControlador.php?op=<?php echo $op; ?>&op2=6','POST','JSON',{'data':data})
                                            .done(function(info){
                                                if(info.STATUS==true){  
                                                    //var codigo_usu = info.codigo_usu;
                                                    //subirFoto(codigo_usu);
                                                    var titulo = "Guardado Completo";
                                                    var texto = "El Administrador se guardo con exito.";
                                                    var clase = "color success";
                                                    MostrarNotificacion(titulo,texto,clase);
                                                    OpcionesModulos('usuarioMantControlador.php','4');
                                                }else{
                                                    var titulo = "Error de guardado";
                                                    var texto = "No se pudo guardo Administrador";
                                                    var clase = "color danger";
                                                    MostrarNotificacion(titulo,texto,clase);
                                                }
                                            });

                                        }
                                    }
                        
                                    
                                    function  ValidarNombreUsuario()
                                    {
                                        var txtNombre_usu = $("#txtNombre_usu").val().toUpperCase();
                                        var cabecera = {
                                            "txtNombre_usu":txtNombre_usu
                                        };
                                        var data = JSON.stringify(cabecera);
                                        __ajax('../Controlador/usuarioMantControlador.php?op=9','POST','JSON',{'data':data})
                                        .done(function(info){
                                            if(info.STATUS==true)
                                            {
                                                var titulo = "Problemas con el Nombre de Usuario";
                                                var texto = "Al parecer este Usuario ya existe";
                                                var clase = "color warning";
                                                MostrarNotificacion(titulo,texto,clase);
                                            }
                                           
                                        });
                                        
                                    }
                        
                                    function  ValidarCamposAdministrador() 
                                    {

                                        //var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
                                        var regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

                                        var txtNombre_usu = $("#txtNombre_usu").val();
                                        var txtClave_usu = $("#txtClave_usu").val();
                                        var txtNombre_adm = $("#txtNombre_adm").val();
                                        var txtApellido_adm = $("#txtApellido_adm").val();
                                        var txtCorreo_adm = $("#txtCorreo_adm").val();
                                        var txtTelefono_adm = $("#txtTelefono_adm").val();
                                        var txtTelefono2_adm = $("#txtTelefono2_adm").val();
                                        var txtDni_adm = $("#txtDni_adm").val();
                                        var txtSueldo_adm = $("#txtSueldo_adm").val();
                                        var flFoto_usu = $("#flFoto_usu").val();
                                        if (txtNombre_usu == null ||  txtNombre_usu.trim() == '' || txtNombre_usu.length == 0 || 
                                            txtClave_usu == null || txtClave_usu.trim() == '' || txtClave_usu.length == 0 || 
                                            txtNombre_adm == null || txtNombre_adm.trim() == '' || txtNombre_adm.length == 0 || 
                                            txtApellido_adm == null || txtApellido_adm.trim() == '' || txtApellido_adm.length == 0 || 
                                            txtCorreo_adm == null || txtCorreo_adm.trim() == '' || txtCorreo_adm.length == 0 || 
                                            txtTelefono_adm == null || txtTelefono_adm.trim() == '' || txtTelefono_adm.length == 0 || 
                                            txtDni_adm == null || txtDni_adm.trim() == '' || txtDni_adm.length == 0 || 
                                            txtSueldo_adm == null || txtSueldo_adm.trim() == '' || txtSueldo_adm.length == 0 ) 
                                        {
                                            // Si no se cumple la condicion...
                                            var titulo = "Error de Validación";
                                            var texto = "Es necesario rellenar todos lo campos solicitados";
                                            var clase = "color warning";
                                            MostrarNotificacion(titulo,texto,clase);
                                            return false;
                                        }
                                        else if(!regex.test(txtCorreo_adm))
                                        {
                                            var titulo = "Error de sintaxis en el correo";
                                            var texto = "Por favor su correo '"+txtCorreo_adm+"' debe de incluir: <br> Almenos un caracter de cada lado, una '@' y su dominio [.com, .pe, .org, .net, etc] ";
                                            var clase = "color warning";
                                            MostrarNotificacion(titulo,texto,clase);
                                            return false;
                                        }
                                        else if(txtTelefono_adm.length < 9 || (txtTelefono2_adm.length < 9 && txtTelefono2_adm.length !=0))
                                        {
                                            var titulo = "Error en el numero de telefono";
                                            var texto = "Por favor el numero de telefono debe ocupar 9 digitos";
                                            var clase = "color warning";
                                            MostrarNotificacion(titulo,texto,clase);
                                            return false;
                                        }
                                        else if(txtDni_adm.length < 8 )
                                        {
                                            var titulo = "Error en el DNI";
                                            var texto = "Por favor el numero de DNI debe ocupar 8 digitos";
                                            var clase = "color warning";
                                            MostrarNotificacion(titulo,texto,clase);
                                            return false;
                                        }/*
                                        else if((flFoto_usu != null || flFoto_usu.trim() != '' || flFoto_usu.length != 0) and !/(.jpg)$/i.exec(flFoto_usu))
                                        {
                                            var titulo = "Error en la imagen";
                                            var texto = "Por favor el colocar la imagen o foto del usuario en formato .jpg";
                                            var clase = "color warning";
                                            MostrarNotificacion(titulo,texto,clase);
                                            return false;
                                        }*/
                                        return true;
                                    }
                        
                                    
                                    function ObtenerDatosAdministrador()
                                    {
                                        var hdnCodigo_adm = $("#hdnCodigo_adm").val();
                                        var hdnCodigo_usu = $("#hdnCodigo_usu").val();
                                        var txtNombre_usu = $("#txtNombre_usu").val().toUpperCase();
                                        var txtClave_usu = $("#txtClave_usu").val();
                                        var chkCodigo_estadoUsu = $("#chkCodigo_estadoUsu").prop('checked');
                                        var txtNombre_adm = $("#txtNombre_adm").val();
                                        var txtApellido_adm = $("#txtApellido_adm").val();
                                        var txtCorreo_adm = $("#txtCorreo_adm").val();
                                        var txtTelefono_adm = $("#txtTelefono_adm").val();
                                        var txtTelefono2_adm = $("#txtTelefono2_adm").val();
                                        var txtDni_adm = $("#txtDni_adm").val();
                                        var txtSueldo_adm = $("#txtSueldo_adm").val();
                                        var sltCodigo_estadoAdm = $("#sltCodigo_estadoAdm").val();

                                        var cabecera = {
                                            "hdnCodigo_adm":hdnCodigo_adm,
                                            "hdnCodigo_usu":hdnCodigo_usu,
                                            "txtNombre_usu":txtNombre_usu,
                                            "txtClave_usu":txtClave_usu,
                                            "chkCodigo_estadoUsu":chkCodigo_estadoUsu,
                                            "txtNombre_adm":txtNombre_adm,
                                            "txtApellido_adm":txtApellido_adm,
                                            "txtCorreo_adm":txtCorreo_adm,
                                            "txtTelefono_adm":txtTelefono_adm,
                                            "txtTelefono2_adm":txtTelefono2_adm,
                                            "txtDni_adm":txtDni_adm,
                                            "txtSueldo_adm":txtSueldo_adm,
                                            "sltCodigo_estadoAdm":sltCodigo_estadoAdm
                                        };
                                        return cabecera;
                                    }
                                    
                                    function subirFoto(id)
                                    {
                                        var formData = new FormData($("#uploadimage")[0]);
                                        formData.append("id", id);
                                        __ajaxImg('../Controlador/UsuarioMantControlador.php?op=10','POST',formData)
                                        .done(function(info){
                                            if(info.STATUS==true){  ;
                                                var titulo = "Imagen guardada";
                                                var texto = "La imagen se cargo con exito.";
                                                var clase = "color success";
                                                MostrarNotificacion(titulo,texto,clase);
                                            }else{
                                                var titulo = "Imagen guardada";
                                                var texto = "La imagen se cargo con exito.";
                                                var clase = "color success";
                                                MostrarNotificacion(titulo,texto,clase);
                                            }
                                        });
                                    }
                                </script>
                                <?php
                                break;
                            } 
                        }
                    }
                    break;  
                }
                case 8:
                {
                    $listaAnalistas=$_SESSION['listaAnalistas'];
                    
?>
                    <a class="btn btn-raised btn-secondary" href="javascript:SubOpcionesModulos('usuarioMantControlador.php','<?= $op ?>','1') "><i class="zmdi zmdi-account-add"></i> Registrar</a>
                    <table class="table table-hover text-center display responsive nowrap tablaList" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Foto de Perfil</th>
                                <th class="text-center">Nombres y Apellidos</th>
                                <th class="text-center">Correo</th>
                                <th class="text-center">Telefono</th>
                                <th class="text-center">Telefono 2</th>
                                <th class="text-center">DNI</th>  
                                <th class="text-center">Sueldo</th>
                                <th class="text-center">Estado del Analista</th> 
                                <th class="text-center">Usuario</th>    
                                <th class="text-center">Clave</th> 
                                <th class="text-center">Estado del Usuario</th>    
                                <th class="text-center">Opciones</th>    
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($listaAnalistas as  $mostrar)
                                { 
                                    $nombre_tec=$mostrar['nombre_tec'];
                                    $apellido_tec=$mostrar['apellido_tec'];
                                    $correo_tec=$mostrar['correo_tec'];
                                    $telefono_tec=$mostrar['telefono_tec'];
                                    $telefono2_tec=$mostrar['telefono2_tec'];
                                    $dni_tec=$mostrar['dni_tec'];
                                    $sueldo_tec=$mostrar['sueldo_tec'];
                                    $nombre_estadoTec=$mostrar['nombre_estadoTec'];
                                    $codigo_usu=$mostrar['codigo_usu'];
                                    $nombre_usu=$mostrar['nombre_usu'];
                                    $clave_usu=$mostrar['clave_usu'];
                                    $nombre_estadoUsu=$mostrar['nombre_estadoUsu'];
                        ?> 
                            <tr>
                                <td>
                                    <div style="margin: auto; border-radius: 50%; width: 80px;height: 80px; overflow: hidden;border: #234158 solid;">
                                        <img src="../assets/users/<?php echo $codigo_usu; ?>.jpg" style="width: 100%; height: 100%;">
                                    </div>
                                </td>
                                <td><?php echo $nombre_tec.' '.$apellido_tec; ?></td>
                                <td><?php echo $correo_tec; ?></td>
                                <td><?php echo $telefono_tec; ?></td>
                                <td><?php echo $telefono2_tec; ?></td>
                                <td><?php echo $dni_tec; ?></td>
                                <td><?php echo $sueldo_tec; ?></td>
                                <td><?php echo $nombre_estadoTec; ?></td>
                                <td><?php echo $nombre_usu; ?></td>
                                <td><?php echo $clave_usu; ?></td>
                                <td><?php echo $nombre_estadoUsu; ?></td>
                                <td> <a class="btn btn-success btn-raised btn-sm"><i class="zmdi zmdi-edit"></i> Modificar</a> <a class="btn btn-danger btn-raised btn-sm"><i class="zmdi zmdi-delete"></i> Eliminar</a></td>
                            </tr>
                            <?php   }  ?>
                        </tbody>
                    </table>
                    <script>
                        
                        
                        table = $('.tablaList').DataTable( {
                                    dom: 'Blfrtip'  ,
                                    buttons: [
                                        'copy',
                                        'excel',
                                        'csv',
                                        'pdf',
                                        'print'
                                    ]
                                } );
                        
                        
                        
                       
                        
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
        
            $("#barranav").css("display", "block");
        </script>
    <?php
?>