<?php
    require_once "../Util/Conexion.php";
    require_once "../Modelo/Bean/usuarioBean.php";
    

    class usuarioDao{   
        
        public function validarUsuario(usuarioBean $ub)
        {
            $estado = false;
            try{
                
                 $Sentencia = "SELECT * 
                                FROM `usuario` 
                                WHERE `nombre_usu`='".$ub->getNombre_usu()."' 
                                AND `clave_usu`='".$ub->getClave_usu()."' 
                                AND `codigo_estadoUsu`='1';";
                $objc = new Conexion();
                $conexion = $objc->Conectar();
                
                $rs= mysqli_query($conexion, $Sentencia);
                
                $filas= mysqli_num_rows($rs);
                if($filas>0)
                {
                    $estado = true;
                }
                else
                {   
                    $estado = false;
                     //echo 'funciono';
                }


            }catch(Exception $e){
                $estado = false;
            }
            return $estado;
        }
        
        
        
        public function DatosUsuarioPersonal(usuarioBean $ub)
        {
            $lista=null;
                            
            try{
                
                 $Sentencia = "SELECT personal.`codigo_usu`, `codigo_per`,`nombre_area` 
                                FROM `personal` 
                                INNER JOIN usuario 
                                ON personal.codigo_usu = usuario.codigo_usu 
                                INNER JOIN area 
                                ON personal.codigo_area = area.codigo_area 
                                WHERE `usuario`.`nombre_usu` = '".$ub->getNombre_usu()."' 
                                AND `usuario`.`clave_usu` = '".$ub->getClave_usu()."' 
                                AND `usuario`.`codigo_estadoUsu` = '1';"; 
                
                $objc = new Conexion();
                $conexion = $objc->Conectar();
                
                $rs= mysqli_query($conexion, $Sentencia);
                
                
 
                if($rs){
                    $lista=$rs;
                }


            }catch(Exception $e){

            }
            return $lista       ;
            
        }
        
        
        
        
        
        
        
        
        
        
        
        
        public function UsuariosTodos()
        {
            $lista=null;
                            
            try{
                
                 $Sentencia = "SELECT * FROM (
              SELECT `usuario`.`codigo_usu`,  `usuario`.`nombre_usu`, `usuario`.`clave_usu`,  `estadousuario`.`nombre_estadoUsu`,  `cliente`.`empresa_cli` AS `nombre2_usu` , null AS `nombre3_usu`, `cliente`.`ruc_cli` AS `dni_ruc_usu`, `cliente`.`correo_cli` AS `correo_usu`, `cliente`.`telefono_cli` AS `telefono_usu`, `cliente`.`telefono2_cli` AS `telefono2_usu`, 'Cliente' AS `tipo_usu`
FROM `usuario` 
INNER JOIN `cliente`
ON `usuario`.`codigo_usu`=`cliente`.`codigo_usu`
INNER JOIN `estadousuario`
ON `usuario`.`codigo_estadoUsu`=`estadousuario`.`codigo_estadoUsu`
    
                UNION ALL
        SELECT `usuario`.`codigo_usu`,  `usuario`.`nombre_usu`, `usuario`.`clave_usu`, `estadousuario`.`nombre_estadoUsu`, `administrador`.`nombre_adm`, `administrador`.`apellido_adm`, `administrador`.`dni_adm`, `administrador`.`correo_adm`, `administrador`.`telefono_adm`, `administrador`.`telefono2_adm`, 'Administrador'
FROM `usuario` 
INNER JOIN `administrador`
ON `usuario`.`codigo_usu`=`administrador`.`codigo_usu`
INNER JOIN `estadousuario`
ON `usuario`.`codigo_estadoUsu`=`estadousuario`.`codigo_estadoUsu`
                
                
                UNION ALL
                
                SELECT `usuario`.`codigo_usu`,  `usuario`.`nombre_usu`, `usuario`.`clave_usu`, `estadousuario`.`nombre_estadoUsu`, `tecnico`.`nombre_tec`, `tecnico`.`apellido_tec`, `tecnico`.`dni_tec`, `tecnico`.`correo_tec`, `tecnico`.`telefono_tec`, `tecnico`.`telefono2_tec`, `tipotecnico`.`nombre_tipoTec`
FROM `usuario` 
INNER JOIN `tecnico`
ON `usuario`.`codigo_usu`=`tecnico`.`codigo_usu`
INNER JOIN `estadousuario`
ON `usuario`.`codigo_estadoUsu`=`estadousuario`.`codigo_estadoUsu`
INNER JOIN `tipotecnico`
ON `tecnico`.`codigo_tipoTec`= `tipotecnico`.`codigo_tipoTec`
                
                
                )
                a ORDER BY `codigo_usu`;";
                
                $objc = new Conexion();
                $conexion = $objc->Conectar();
                
                $rs= mysqli_query($conexion, $Sentencia);
                
                $lista=  array(); 
 
                while($mostrar=mysqli_fetch_assoc($rs))
                    {
                        $lista[]=$mostrar;  
                    }
                


            }catch(Exception $e){

            }
            return $lista       ;
            
        }
        
        
        
        public function compararUsuarioNuevo($nombre_usu)
        {
            $estado = false;
                            
            try{
                
                
                $Sentencia = "SELECT * FROM `usuario` 
                WHERE `nombre_usu` = '".$nombre_usu."' ;"; 
                
                $objc = new Conexion();
                $conexion = $objc->Conectar();
                
                $rs= mysqli_query($conexion, $Sentencia);
                
 
                $filas= mysqli_num_rows($rs);
                if($filas>0)
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
            return $estado;
            
        }
        

        
        public function compararUsuarioExistente($nombre_usu, $nombre_usu_original)
        {
            $estado = false;
                            
            try{
                
                
                $Sentencia = "SELECT * FROM `usuario` 
                WHERE `nombre_usu` = '".$nombre_usu."' ;"; 
                
                $objc = new Conexion();
                $conexion = $objc->Conectar();
                
                $rs= mysqli_query($conexion, $Sentencia);
                
 
                $filas= mysqli_num_rows($rs);
                if($filas>0)
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
            return $estado;
            
        }
        

        
        
        public function habilitarDeshabilitarUsuario($codigo_usu, $codigo_estadoUsu)
        {
            try{
                $Sentencia ="UPDATE `usuario` 
                SET `codigo_estadoUsu`='".$codigo_estadoUsu."'
                WHERE  `codigo_usu`='".$codigo_usu."';";
                    
                
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
            return $estado ;
        }
        
        
        
        
        
        
    }  
?>


