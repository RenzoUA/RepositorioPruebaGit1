<?php
    require_once "../Util/Conexion.php";
    require_once "../Modelo/Bean/administradorBean.php";
    require_once "../Modelo/Bean/usuarioBean.php";
    

    class administradorDao{  
        
        
        public function registrarAdministrador(usuarioBean $ub, administradorBean $admb)
        {
            $lista=null;
            $estado=false;
            $codigo_usu=null;
                            
            try{
                $Sentencia ="INSERT INTO `usuario`(`codigo_usu`, `nombre_usu`, `clave_usu`, `codigo_estadoUsu`) 
                VALUES (
                NULL,
                '".$ub->getNombre_usu()."',
                '".$ub->getClave_usu()."',
                '".$ub->getCodido_estadoUsu()."');";
                    
                
                $objc = new Conexion();
                $conexion = $objc->Conectar();
                
                $rs= mysqli_query($conexion, $Sentencia);
                
                if($rs)
                {
                    $codigo_usu=mysqli_insert_id($conexion);
                    try{
                        $Sentencia ="INSERT INTO `administrador`(`codigo_adm`, `nombre_adm`, `apellido_adm`, `correo_adm`, `telefono_adm`, `telefono2_adm`, `dni_adm`, `sueldo_adm`, `codigo_usu`, `codigo_estadoAdm`) 
                        VALUES (
                        NULL,
                        '".$admb->getNombre_adm()."',
                        '".$admb->getApellido_adm()."',
                        '".$admb->getCorreo_adm()."',
                        '".$admb->getTelefono_adm()."',
                        '".$admb->getTelefono2_adm()."',
                        '".$admb->getDni_adm()."',
                        '".$admb->getSueldo_adm()."',
                        '".$codigo_usu."',
                        '".$admb->getCodigo_estadoAdm()."');";
                    

                        $objc = new Conexion();
                        $conexion = $objc->Conectar();

                        $rs= mysqli_query($conexion, $Sentencia);

                        if($rs)
                        {
                            $estado = true;
                        }
                        else
                        {
                            $estado = false;
                        }

                    }catch(Exception $e){
                        $estado = false;
                    }
                }
                else
                {
                    $estado = false;
                }

            }catch(Exception $e){
                $estado = false;
            }
            $lista = array(
                    "estado" => $estado,
                    "codigo_usu" => $codigo_usu
                    );
            return $lista ;
            
        }
        
        
        
        public function modificarAdministrador(usuarioBean $ub, administradorBean $admb)
        {
            $estado=false;
                            
            try{
                $Sentencia ="UPDATE `usuario` 
                SET `nombre_usu`='".$ub->getNombre_usu()."',
                `clave_usu`='".$ub->getClave_usu()."',
                `codigo_estadoUsu`='".$ub->getCodido_estadoUsu()."'
                WHERE `codigo_usu` = '".$ub->getCodigo_usu()."';";
                    
                
                $objc = new Conexion();
                $conexion = $objc->Conectar();
                
                $rs= mysqli_query($conexion, $Sentencia);
                
                if($rs)
                {
                    try{
                        $Sentencia ="UPDATE `administrador` 
                        SET `nombre_adm`='".$admb->getNombre_adm()."',
                        `apellido_adm`='".$admb->getApellido_adm()."',
                        `correo_adm`='".$admb->getCorreo_adm()."',
                        `telefono_adm`='".$admb->getTelefono_adm()."',
                        `telefono2_adm`='".$admb->getTelefono2_adm()."',
                        `dni_adm`='".$admb->getDni_adm()."',
                        `sueldo_adm`='".$admb->getSueldo_adm()."',
                        `codigo_estadoAdm`='".$admb->getCodigo_estadoAdm()."'
                        WHERE `codigo_adm`='".$admb->getCodigo_adm()."';";
                    

                        $objc = new Conexion();
                        $conexion = $objc->Conectar();

                        $rs= mysqli_query($conexion, $Sentencia);

                        if($rs)
                        {
                            $estado = true;
                        }
                        else
                        {
                            $estado = false;
                        }

                    }catch(Exception $e){
                        $estado = false;
                    }
                }
                else
                {
                    $estado = false;
                }

            }catch(Exception $e){
                $estado = false;
            }
            return $estado ;
            
        }
        
        
        public function eliminarAdministrador($codigo_adm, $codigo_usu)
        {
            try{
                $Sentencia ="DELETE FROM `administrador` WHERE `codigo_adm`='".$codigo_adm."';";
                    
                
                $objc = new Conexion();
                $conexion = $objc->Conectar();
                
                $rs= mysqli_query($conexion, $Sentencia);
                
                if($rs)
                {
                    try{
                        $Sentencia ="DELETE FROM `usuario` WHERE `codigo_usu`='".$codigo_usu."';";
                    

                        $objc = new Conexion();
                        $conexion = $objc->Conectar();

                        $rs= mysqli_query($conexion, $Sentencia);

                        if($rs)
                        {
                            $estado = true;
                        }
                        else
                        {
                            $estado = false;
                        }

                    }catch(Exception $e){
                        $estado = false;
                    }
                }
                else
                {
                    $estado = false;
                }

            }catch(Exception $e){
                $estado = false;
            }
            return $estado ;
        }
        
        
        public function DatosAdministrador($codigo_adm)
        {
            $lista=null;
                            
            try{
                
                $Sentencia="SELECT `administrador`.`codigo_adm`, `administrador`.`nombre_adm`, `administrador`.`apellido_adm`, `administrador`.`correo_adm`, `administrador`.`telefono_adm`, `administrador`.`telefono2_adm`, `administrador`.`dni_adm`, `administrador`.`sueldo_adm`, `estadoadministrador`.`codigo_estadoAdm`, `estadoadministrador`.`nombre_estadoAdm`, `usuario`.`codigo_usu`, `usuario`.`nombre_usu`, `usuario`.`clave_usu`,`estadousuario`.`codigo_estadoUsu`,`estadousuario`.`nombre_estadoUsu`
                FROM `administrador` 
                INNER JOIN `usuario`
                ON `administrador`.`codigo_usu` = `usuario`.`codigo_usu`
                INNER JOIN `estadousuario`
                ON `usuario`.`codigo_estadoUsu`=`estadousuario`.`codigo_estadoUsu`
                INNER JOIN `estadoadministrador`
                ON `administrador`.`codigo_estadoAdm`=`estadoadministrador`.`codigo_estadoAdm`
                WHERE  `administrador`.`codigo_adm` = '".$codigo_adm."';";
                
                $objc = new Conexion();
                $conexion = $objc->Conectar();
                
                $rs= mysqli_query($conexion, $Sentencia);
                
                $lista=  array(); 
 
                while($mostrar=mysqli_fetch_assoc($rs))
                    {
                        $lista[]=$mostrar;  
                    }
                mysqli_close();


            }catch(Exception $e){

            }
            return $lista;
            
        }
        
        
        
        public function Administradores()
        {
            $lista=null;
                            
            try{
                
                $Sentencia="SELECT `administrador`.`codigo_adm`, `administrador`.`nombre_adm`, `administrador`.`apellido_adm`, `administrador`.`correo_adm`, `administrador`.`telefono_adm`, `administrador`.`telefono2_adm`, `administrador`.`dni_adm`, `administrador`.`sueldo_adm`, `estadoadministrador`.`codigo_estadoAdm`, `estadoadministrador`.`nombre_estadoAdm`, `usuario`.`codigo_usu`, `usuario`.`nombre_usu`, `usuario`.`clave_usu`,`estadousuario`.`codigo_estadoUsu`,`estadousuario`.`nombre_estadoUsu`
                FROM `administrador` 
                INNER JOIN `usuario`
                ON `administrador`.`codigo_usu` = `usuario`.`codigo_usu`
                INNER JOIN `estadousuario`
                ON `usuario`.`codigo_estadoUsu`=`estadousuario`.`codigo_estadoUsu`
                INNER JOIN `estadoadministrador`
                ON `administrador`.`codigo_estadoAdm`=`estadoadministrador`.`codigo_estadoAdm`;";
                
                $objc = new Conexion();
                $conexion = $objc->Conectar();
                
                $rs= mysqli_query($conexion, $Sentencia);
                
                $lista=  array(); 
 
                while($mostrar=mysqli_fetch_assoc($rs))
                    {
                        $lista[]=$mostrar;  
                    }
                mysqli_close();


            }catch(Exception $e){

            }
            return $lista;
            
        }
        
        public function EstadosAdministrador()
        {
            $lista=null;
                            
            try{
                
                $Sentencia="SELECT `codigo_estadoAdm`, `nombre_estadoAdm` FROM `estadoadministrador`;";
                
                $objc = new Conexion();
                $conexion = $objc->Conectar();
                
                $rs= mysqli_query($conexion, $Sentencia);
                
                $lista=  array(); 
 
                while($mostrar=mysqli_fetch_assoc($rs))
                    {
                        $lista[]=$mostrar;  
                    }
                mysqli_close();


            }catch(Exception $e){

            }
            return $lista;
            
        }
        
    }
?>