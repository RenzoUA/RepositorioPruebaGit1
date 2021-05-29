<?php
    require_once "../Util/Conexion.php";
    require_once "../Modelo/Bean/servicioBean.php";
    

    class servicioDao
    {   
        
        public function RegistrarServicio($txtNombreServ)
        {
            $estado=false;
                            
            try{
                $Sentencia ="INSERT INTO `servicio`(`codigo_serv`, `nombre_serv`) 
                VALUES (
                NULL,
                '".$txtNombreServ."');";
                    
                
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
        
        
        
        public function ServiciosTodos()
        {
            $lista=null;
                            
            try{
                
                $Sentencia = "SELECT ROW_NUMBER() over(order by `codigo_serv` ASC) as `numero_serv`, `codigo_serv`, `nombre_serv`, (SELECT COUNT(*) FROM contrato INNER JOIN contratos_servicio ON contrato.codigo_cto = contratos_servicio.codigo_cto WHERE contratos_servicio.codigo_serv = servicio.codigo_serv) as contratos_serv 
                FROM `servicio`;"; 
                
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


