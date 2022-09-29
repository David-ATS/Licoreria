<?php
	include_once("conexion_singleton.php");
	class EntityUsuariox 
	{
		
		public function identificarExistenciaUsuario($usuario,$password)
		{
			
			$SQL = "select * from usuarios where login = '$usuario' and password = '$password' and estado = 1";
			conexion_singleton::getInstancia();
			$resultado = mysql_query($SQL);
			
			$filas = mysql_num_rows($resultado);
			
			if($filas == 1){
				return(1);
			}
			else
			{
				return(0);
			}
				
		}
		
		public function obtenerContrasenia($login)
		{
			
			$SQL = "select password from usuarios where login = '$login'";
			conexion_singleton::getInstancia();
			$resultado = mysql_query($SQL);
			
			$password = mysql_result($resultado,0);
			return $password;
		}
		
		public function actualizarContrasenia($login,$npassword)
		{
			
			$SQL = "update usuarios set password='$npassword' where login='$login'";
			conexion_singleton::getInstancia();
			mysql_query($SQL);
			
		}
		
		
	}
?>
