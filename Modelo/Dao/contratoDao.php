<?php


    require_once "../Util/Conexion.php";
    

    class contratoDao
    {   
        public function RegistrarContrato($finicio_cto,$costo_cto,$codigo_cli,$codigo_tipoCto,$codigo_serv)
        {
            $estado=false;
                            
            try{
                $Sentencia ="INSERT INTO `contrato`(`codigo_cto`, `finicio_cto`, `ffinal_cto`, `fcancel_cto`, `costo_cto`, `codigo_cli`, `codigo_estadoCto`, `codigo_tipoCto`) 
                VALUES (
                NULL,
                '".$finicio_cto."',
                NULL,
                NULL,
                '".$costo_cto."',
                '".$codigo_cli."',
                '1',
                '".$codigo_tipoCto."');";
                    
                
                $objc = new Conexion();
                $conexion = $objc->Conectar();
                
                $rs= mysqli_query($conexion, $Sentencia);
                
                if($rs)
                {
                    $codigo=mysqli_insert_id($conexion);
                    
                    try{
                        $Sentencia ="INSERT INTO `contratos_servicio`(`codigo_cto`, `codigo_serv`) 
                                    VALUES (
                                    '".$codigo."',
                                    '".$codigo_serv."');";


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
        
        
        
        
        
        
        
        public function ContratosTodos()
        {
            $lista=null;
                            
            try{
                
                $Sentencia = "SELECT ROW_NUMBER() over(order by `codigo_cto` ASC) as `numero_cto`, `codigo_cto`, IFNULL(`finicio_cto`, 'Sin definir') AS `finicio_cto`, IFNULL(`ffinal_cto`, 'Sin definir') AS `ffinal_cto`, IFNULL(`fcancel_cto`, 'Sin definir') AS `fcancel_cto`, `costo_cto`, estadocontratos.`codigo_estadoCto`, estadocontratos.nombre_estadoCto, tipocontratos.`codigo_tipoCto`, tipocontratos.nombre_tipoCto,  cliente.codigo_cli, cliente.rsocial_cli
                FROM `contrato` 
                INNER JOIN estadocontratos 
                ON contrato.codigo_estadoCto = estadocontratos.codigo_estadoCto 
                INNER JOIN tipocontratos 
                ON contrato.codigo_tipoCto = tipocontratos.codigo_tipoCto
                INNER JOIN cliente
                ON contrato.codigo_cli = cliente.codigo_cli;"; 
                
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
        
        
        
        
        public function TiposContrato()
        {
            $lista=null;
                            
            try{
                
                $Sentencia = "SELECT `codigo_tipoCto`, `nombre_tipoCto` FROM `tipocontratos`;"; 
                
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
        
        
        
        
        
        
    }  
?>


