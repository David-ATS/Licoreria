<?php
	include_once("factoryFormSeguridad.php");
	include_once("../shared/factoryFormShared.php");
	class facadeFormSeguridad
	{
		private $cabeza;
		private $factoryForm;
		private $factoryFormShared;
		private $nForm;
		private $tipo;
		
		function facadeFormSeguridad($factory,$tipo,$titulo)
		{
			if($factory=='shared')
			{
				$this->factoryForm = new factoryFormShared();
				$this->cabeza = $this-> factoryForm->create("cabeza",$titulo);
				$this->nForm = $this-> factoryForm->create($tipo,$titulo);
			}
			else
			{
				$this->factoryFormShared = new factoryFormShared();
				$this->factoryForm = new factoryFormSeguridad();
				$this->cabeza = $this-> factoryFormShared->create("cabeza",$titulo);
				$this->nForm = $this-> factoryForm->create($tipo);
			}
		}
		
		public function crearFormMensajeSistema($mensaje,$enlace)
		{
			$this->cabeza;
			$this->nForm->formMensajeSistemaShow($mensaje,$enlace);
		}
		
		public function crearFormCambiarContrasenia($login)
		{
			$this->cabeza;
			$this->nForm->formCambiarContraseniaShow($login);
		}
		
	}
?>