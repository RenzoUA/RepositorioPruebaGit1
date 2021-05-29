<?php
    class Conexion
    {
  	     private $conexion;
 	
         public function Conectar()
         {
             $conexion= mysqli_connect("localhost:3306", "root", "", "bdsotrans");
             mysqli_set_charset($conexion,'utf8');  
             return $conexion;
  	     }
    }




?>