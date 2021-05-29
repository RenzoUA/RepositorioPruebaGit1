<?php
	class equipoBean{
		private $codigo_equi;
        private $modelo_equi;
        private $serie_equi;
        private $codigo_marca;
        private $codigo_estadoEqui;
        private $codigo_tipoEqui;


		function getCodigo_equi(){
			return $this ->codigo_equi;
		}

		function setCodigo_equi($codigo_equi){
			$this ->codigo_equi = $codigo_equi;
		}

		function getModelo_equi(){
			return $this ->modelo_equi;
		}

		function setModelo_equi($modelo_equi){
			$this ->modelo_equi = $modelo_equi;
		}
        
		function getSerie_equi(){
			return $this ->serie_equi;
		}

		function setSerie_equi($serie_equi){
			$this ->serie_equi = $serie_equi;
		}
        
        function getCodigo_marca(){
			return $this ->codigo_marca;
		}

		function setCodigo_marca($codigo_marca){
			$this ->codigo_marca = $codigo_marca;
		}
        
		function getCodigo_estadoEqui(){
			return $this ->codigo_estadoEqui;
		}

		function setCodigo_estadoEqui($codigo_estadoEqui){
			$this ->codigo_estadoEqui = $codigo_estadoEqui;
		}

        function getCodigo_tipoEqui(){
			return $this ->codigo_tipoEqui;
		}

		function setCodigo_tipoEqui($codigo_tipoEqui){
			$this ->codigo_tipoEqui = $codigo_tipoEqui;
		}

        
        
        
        
        private $codigo_imp;
        private $contador_c_imp;
        private $contador_bn_imp;
        
        
        function getCodigo_imp(){
			return $this ->codigo_imp;
		}

		function setCodigo_imp($codigo_imp){
			$this ->codigo_imp = $codigo_imp;
		}
        
		function getContador_c_imp(){
			return $this ->contador_c_imp;
		}

		function setContador_c_imp($contador_c_imp){
			$this ->contador_c_imp = $contador_c_imp;
		}

        function getContador_bn_imp(){
			return $this ->contador_bn_imp;
		}

		function setContador_bn_imp($contador_bn_imp){
			$this ->contador_bn_imp = $contador_bn_imp;
		}
        
        
        private $codigo_pc;
        private $procesador_pc;
        private $memoria_pc;
        private $procesador_velo_pc;
        private $memoria_velo_pc;
        private $lectora_cd_pc;
        private $lectora_dvd_pc;
        private $lectora_bray_pc;
        private $codigo_pantalla;
        private $codigo_marca_pantalla;
        private $modelo_pantalla;
        private $serie_pantalla;
        private $codigo_teclado;
        private $codigo_marca_teclado;
        private $modelo_teclado;
        private $serie_teclado;
        private $codigo_mouse;
        private $codigo_marca_mouse;
        private $modelo_mouse;
        private $serie_mouse;
        private $codigo_tipoPc;
        
        
        
        function getCodigo_pc(){
			return $this ->codigo_pc;
		}

		function setCodigo_pc($codigo_pc){
			$this ->codigo_pc = $codigo_pc;
		}
        
		function getProcesador_pc(){
			return $this ->procesador_pc;
		}

		function setProcesador_pc($procesador_pc){
			$this ->procesador_pc = $procesador_pc;
		}

        function getMemoria_pc(){
			return $this ->memoria_pc;
		}

		function setMemoria_pc($memoria_pc){
			$this ->memoria_pc = $memoria_pc;
		}

        function getProcesador_velo_pc(){
			return $this ->procesador_velo_pc;
		}

		function setProcesador_velo_pc($procesador_velo_pc){
			$this ->procesador_velo_pc = $procesador_velo_pc;
		}

        function getMemoria_velo_pc(){
			return $this ->memoria_velo_pc;
		}

		function setMemoria_velo_pc($memoria_velo_pc){
			$this ->memoria_velo_pc = $memoria_velo_pc;
		}

        function getLectora_cd_pc(){
			return $this ->lectora_cd_pc;
		}

		function setLectora_cd_pc($lectora_cd_pc){
			$this ->lectora_cd_pc = $lectora_cd_pc;
		}

        function getLectora_dvd_pc(){
			return $this ->lectora_dvd_pc;
		}

		function setLectora_dvd_pc($lectora_dvd_pc){
			$this ->lectora_dvd_pc = $lectora_dvd_pc;
		}

        function getLectora_bray_pc(){
			return $this ->lectora_bray_pc;
		}

		function setLectora_bray_pc($lectora_bray_pc){
			$this ->lectora_bray_pc = $lectora_bray_pc;
		}

        function getCodigo_pantalla(){
			return $this ->codigo_pantalla;
		}

		function setCodigo_pantalla($codigo_pantalla){
			$this ->codigo_pantalla = $codigo_pantalla;
		}

        function getCodigo_marca_pantalla(){
			return $this ->codigo_marca_pantalla;
		}

		function setCodigo_marca_pantalla($codigo_marca_pantalla){
			$this ->codigo_marca_pantalla = $codigo_marca_pantalla;
		}

        function getModelo_pantalla(){
			return $this ->modelo_pantalla;
		}

		function setModelo_pantalla($modelo_pantalla){
			$this ->modelo_pantalla = $modelo_pantalla;
		}

        function getSerie_pantalla(){
			return $this ->serie_pantalla;
		}

		function setSerie_pantalla($serie_pantalla){
			$this ->serie_pantalla = $serie_pantalla;
		}
        
        
        function getCodigo_teclado(){
			return $this ->codigo_teclado;
		}

		function setCodigo_teclado($codigo_teclado){
			$this ->codigo_teclado = $codigo_teclado;
		}

        function getCodigo_marca_teclado(){
			return $this ->codigo_marca_teclado;
		}

		function setCodigo_marca_teclado($codigo_marca_teclado){
			$this ->codigo_marca_teclado = $codigo_marca_teclado;
		}

        function getModelo_teclado(){
			return $this ->modelo_teclado;
		}

		function setModelo_teclado($modelo_teclado){
			$this ->modelo_teclado = $modelo_teclado;
		}

        function getSerie_teclado(){
			return $this ->serie_teclado;
		}

		function setSerie_teclado($serie_teclado){
			$this ->serie_teclado = $serie_teclado;
		}

        
        function getCodigo_mouse(){
			return $this ->codigo_mouse;
		}

		function setCodigo_mouse($codigo_mouse){
			$this ->codigo_mouse = $codigo_mouse;
		}

        function getCodigo_marca_mouse(){
			return $this ->codigo_marca_mouse;
		}

		function setCodigo_marca_mouse($codigo_marca_mouse){
			$this ->codigo_marca_mouse = $codigo_marca_mouse;
		}

        function getModelo_mouse(){
			return $this ->modelo_mouse;
		}

		function setModelo_mouse($modelo_mouse){
			$this ->modelo_mouse = $modelo_mouse;
		}

        function getSerie_mouse(){
			return $this ->serie_mouse;
		}

		function setSerie_mouse($serie_mouse){
			$this ->serie_mouse = $serie_mouse;
		}
        
        
        function getCodigo_tipoPc(){
			return $this ->codigo_tipoPc;
		}

		function setCodigo_tipoPc($codigo_tipoPc){
			$this ->codigo_tipoPc = $codigo_tipoPc;
		}
        
	}	
?>