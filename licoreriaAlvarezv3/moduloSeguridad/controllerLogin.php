<?php
	
	class controllerLogin
	{
		public function verificarUsuario($usuario,$password)
		{
			include_once("../model/strategicModels.php");
			$objstrategic = new strategicModels;
			$resultado=$objstrategic->darstrategic("EntityUsuario","select * from usuarios where login = '$usuario' and password = '$password' and estado = 1","identificarExistenciaUsuario");
			return ($resultado);
		}
	}

?>