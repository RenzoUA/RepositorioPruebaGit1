<?php
class usuarioBean
{
	private $codigo_usu;
	private $nombre_usu;
	private $clave_usu;
	private $codigo_estadoUsu;

	function getCodigo_usu(){
            return $this ->codigo_usu;
	}

	function setCodigo_usu($codigo_usu){
            $this ->codigo_usu = $codigo_usu;
	}
        
	function getNombre_usu(){
            return $this ->nombre_usu;
	}

	function setNombre_usu($nombre_usu){
            $this ->nombre_usu = $nombre_usu;
	}

	function getClave_usu(){
            return $this ->clave_usu;
	}

	function setClave_usu($clave_usu){
            $this ->clave_usu = $clave_usu;
	}
    
    function getCodido_estadoUsu(){
            return $this ->codigo_estadoUsu;
	}

	function setCodigo_estadoUsu($codigo_estadoUsu){
            $this ->codigo_estadoUsu = $codigo_estadoUsu;
	}

}
?>