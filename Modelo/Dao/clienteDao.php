<?php


    require_once "../Util/Conexion.php";
    require_once "../Modelo/Bean/clienteBean.php";
    

    class clienteDao{   

        
        public function RegistrarCliente(clienteBean $clienteBean)
        {
            $estado=false;
                            
            try{
                $Sentencia ="INSERT INTO `cliente`(`codigo_cli`, `ruc_cli`, `rsocial_cli`, `ncomercial_cli`, `tipo_cli`, `estado_cli`, `condicion_cli`, `direccion_cli`, `departamento_cli`, `provincia_cli`, `distrito_cli`, `acteconomica_cli`, `persona_cli`, `telefono_cli`, `codigo_cofnz`) 
                VALUES (
                NULL,
                '".$clienteBean->getRuc_cli()."',
                '".$clienteBean->getRsocial_cli()."',
                '".$clienteBean->getNcomercial_cli()."',
                '".$clienteBean->getTipo_cli()."',
                '".$clienteBean->getEstado_cli()."',
                '".$clienteBean->getCondicion_cli()."',
                '".$clienteBean->getDireccion_cli()."',
                '".$clienteBean->getDepartamento_cli()."',
                '".$clienteBean->getProvincia_cli()."',
                '".$clienteBean->getDistrito_cli()."',
                '".$clienteBean->getActeconomica_cli()."',
                '".$clienteBean->getPersona_cli()."',
                '".$clienteBean->getTelefono_cli()."',
                '".$clienteBean->getCodigo_cofnz()."');";
                    
                
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
        
        
        public function parecido($parametro)
        {
            $ret = array();
            $query = "SELECT * FROM `impresora` WHERE `marca_imp` LIKE '%$parametro%' OR `modelo_imp` LIKE '%$parametro%' LIMIT 5 ";

            $objc = new Conexion();
            $conexion = $objc->Conectar();

            $rs= mysqli_query($conexion, $query);
            
 
                while($mostrar=mysqli_fetch_assoc($rs))
                    {
                        $ret[]=$mostrar;  
                    }
       //         mysqli_close();

           //$ret = $this->con->exe_data($query);
            return $ret;
        }
        
        
        
        public function ClientesTodos()
        {
            $lista=null;
                            
            try{
                
                $Sentencia = "SELECT ROW_NUMBER() over(order by `codigo_cli` ASC) as `numero_cli`, `codigo_cli`, `ruc_cli`, `rsocial_cli`, `ncomercial_cli`, `tipo_cli`, `estado_cli`, `condicion_cli`, `direccion_cli`, `departamento_cli`, `provincia_cli`, `distrito_cli`, `acteconomica_cli`, `persona_cli`, `telefono_cli`, (SELECT COUNT(*) FROM contrato WHERE contrato.codigo_cli = cliente.codigo_cli) AS contratos_cli , confianza.codigo_cofnz, confianza.nombre_cofnz
                FROM `cliente` 
                INNER JOIN confianza 
                ON cliente.codigo_cofnz = confianza.codigo_cofnz;"; 
                
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
        
        
        
        
        
        
        public function ClientesExternos()
        {
            $lista=null;
                            
            try{
                
                $Sentencia="SELECT * FROM (
                            SELECT `cliente`.`codigo_cli`, `cliente`.`empresa_cli`, `cliente`.`correo_cli`, `cliente`.`telefono_cli`, `cliente`.`telefono2_cli`, `cliente`.`ruc_cli`, `usuario`.`codigo_usu`, `usuario`.`nombre_usu`, `usuario`.`clave_usu`, `estadousuario`.`nombre_estadoUsu`
                            FROM `cliente` 
                            INNER JOIN `usuario`
                            ON `cliente`.`codigo_usu` = `usuario`.`codigo_usu`
                            INNER JOIN `estadousuario`
                            ON `usuario`.`codigo_estadoUsu`=`estadousuario`.`codigo_estadoUsu`
                            WHERE `cliente`.`codigo_tipoCli` = '2'
                            UNION ALL
                            SELECT `cliente`.`codigo_cli`, `cliente`.`empresa_cli`, `cliente`.`correo_cli`, `cliente`.`telefono_cli`, `cliente`.`telefono2_cli`, `cliente`.`ruc_cli`, NULL, NULL, NULL, NULL
                            FROM `cliente` 
                            WHERE `cliente`.`codigo_tipoCli` = '2'

                            )
                            a ORDER BY `codigo_cli`;";
                
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
            return $lista       ;
            
        }
        
        
        
        public function Confianza()
        {
            $lista=null;
                            
            try{
                
                $Sentencia = "SELECT `codigo_cofnz`, `nombre_cofnz` FROM `confianza`;"; 
                
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
            return $lista;
            
        }
        
        
        
        
    }  
?>


