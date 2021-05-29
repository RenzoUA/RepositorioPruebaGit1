<?php
    require_once '../Modelo/Bean/usuarioBean.php';
    require_once '../Modelo/Dao/usuarioDao.php';
    
    $op=$_POST['op'];

    switch($op){
            
        case 1:
        {
            
            $UsuarioMin = $_POST['txtUsuario'];
            $Usuario = strtoupper($UsuarioMin);
            $Clave = $_POST['txtClave'];
            
            $ub = new usuarioBean();    
            $ub->setNombre_usu($Usuario);
            $ub->setClave_usu($Clave);        
            
            $ud = new usuarioDao();
            
            $estado = $ud->validarUsuario($ub);    
            
            if($estado==true)
            {
                session_start();
                $_SESSION['usuario']=$Usuario;
                  

                $lista= $ud->DatosUsuarioPersonal($ub);

                while($mostrar=mysqli_fetch_array($lista))
                {
                    $_SESSION['id_usuario']=$mostrar['codigo_usu'];  
                    $_SESSION['id_personal']=$mostrar['codigo_per'];   
                    $_SESSION['Area_personal']=$mostrar['nombre_area'];
                }
                //echo "goooooo".$_SESSION['id_usuario'];
                $pagina="../Vista/frmPrincipal.php";

            }
            else 
            {
                $pagina="../Vista/frmLogin.php?mensaje=".$estado;
            }
            break; 
        }  
        
    case 2:{
        
            session_start();
            session_destroy();
            $pagina="../Vista/frmLogin.php";
            break;   
        }

    }
    
  header("Location:".$pagina);


?>
