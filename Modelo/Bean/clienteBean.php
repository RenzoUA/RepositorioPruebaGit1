<?php
	class clienteBean{
		private $codigo_cli;
        private $ruc_cli;
        private $rsocial_cli;
        private $ncomercial_cli;
        private $tipo_cli;
        private $estado_cli;
        private $condicion_cli;
        private $direccion_cli;
        private $departamento_cli;
        private $provincia_cli;
        private $distrito_cli;
        private $acteconomica_cli;
        private $persona_cli;
        private $telefono_cli;
        private $codigo_cofnz;


		function getCodigo_cli(){
			return $this ->codigo_cli;
		}

		function setCodigo_cli($codigo_cli){
			$this ->codigo_cli = $codigo_cli;
		}


        function getRuc_cli(){
            return $this ->ruc_cli;
        }

        function setRuc_cli($ruc_cli){
            $this ->ruc_cli = $ruc_cli;
        }

       

        function getRsocial_cli(){
            return $this ->rsocial_cli;
        }

        function setRsocial_cli($rsocial_cli){
            $this ->rsocial_cli = $rsocial_cli;
        }

        
		function getNcomercial_cli(){
            return $this ->ncomercial_cli;
        }

        function setNcomercial_cli($ncomercial_cli){
            $this ->ncomercial_cli = $ncomercial_cli;
        }
        
		function getTipo_cli(){
            return $this ->tipo_cli;
        }

        function setTipo_cli($tipo_cli){
            $this ->tipo_cli = $tipo_cli;
        }
        
        

        function getEstado_cli(){
            return $this ->estado_cli;
        }

        function setEstado_cli($estado_cli){
            $this ->estado_cli = $estado_cli;
        }

        function getCondicion_cli(){
            return $this ->condicion_cli;
        }

        function setCondicion_cli($condicion_cli){
            $this ->condicion_cli = $condicion_cli;
        }



        function getDireccion_cli(){
            return $this ->direccion_cli;
        }

        function setDireccion_cli($direccion_cli){
            $this ->direccion_cli = $direccion_cli;
        }



        function getDepartamento_cli(){
            return $this ->departamento_cli;
        }

        function setDepartamento_cli($departamento_cli){
            $this ->departamento_cli = $departamento_cli;
        }



        function getProvincia_cli(){
            return $this ->provincia_cli;
        }

        function setProvincia_cli($provincia_cli){
            $this ->provincia_cli = $provincia_cli;
        }


        function getDistrito_cli(){
            return $this ->distrito_cli;
        }

        function setDistrito_cli($distrito_cli){
            $this ->distrito_cli = $distrito_cli;
        }


        function getActeconomica_cli(){
            return $this ->acteconomica_cli;
        }

        function setActeconomica_cli($acteconomica_cli){
            $this ->acteconomica_cli = $acteconomica_cli;
        }



        function getPersona_cli(){
            return $this ->persona_cli;
        }

        function setPersona_cli($persona_cli){
            $this ->persona_cli = $persona_cli;
        }



        function getTelefono_cli(){
            return $this ->telefono_cli;
        }

        function setTelefono_cli($telefono_cli){
            $this ->telefono_cli = $telefono_cli;
        }


        function getCodigo_cofnz(){
            return $this ->codigo_cofnz;
        }

        function setCodigo_cofnz($codigo_cofnz){
            $this ->codigo_cofnz = $codigo_cofnz;
        }
        
	}	
?>