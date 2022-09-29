<?php
	include_once("conexion_singleton.php");
	class EntityUsuario 
	{
	
		public function identificarExistenciaUsuario($consulta)
		{
			
			//$SQL = "select * from usuarios where login = '$usuario' and password = '$password' and estado = 1";
			conexion_singleton::getInstancia();
			$resultado = mysql_query($consulta);
			
			$filas = mysql_num_rows($resultado);
			
			if($filas == 1){
				return(1);
			}
			else
			{
				return(0);
			}
				
		}
		
		public function obtenerContrasenia($consulta)
		{
			
			//$SQL = "select password from usuarios where login = '$login'";
			conexion_singleton::getInstancia();
			$resultado = mysql_query($consulta);
			include_once("myiterator.php");
			
			$array = mysql_fetch_array($resultado); 
			$it = new myiterator;
			$it->constructor($array);
			$it->rewind();
			$password=$it->current();
			return $password;
		}
		
		public function actualizarContrasenia($consulta)
		{
			
			//$SQL = "update usuarios set password='$npassword' where login='$login'";
			conexion_singleton::getInstancia();
			mysql_query($consulta);
			
		}
		
		
	}
?>