<?php
	class controllerCambiarContrasenia
	{
		public function validarContrasenia($login,$apassword)
		{
			include_once("../model/strategicModels.php");
			$objstrategic = new strategicModels;
			$resultado = $objstrategic->darstrategic("EntityUsuario","select password from usuarios where login = '$login'","obtenerContrasenia");
			if($resultado==$apassword)
			{
				return (1);
			}
			else
			{
				return (0);
			}
			
		}
		
		public function modificarContrasenia($login,$npassword)
		{
			include_once("../model/strategicModels.php");
			$objstrategic = new strategicModels;
			$objstrategic->darstrategic("EntityUsuario","update usuarios set password = '$npassword' where login = '$login'","actualizarContrasenia");
		}
	}
?>