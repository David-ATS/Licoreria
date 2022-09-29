<?php
	include_once("conecta.php");
	class EntityDetalleDeUsuario extends conecta
	{
		public function obtenerPrivilegios($usuario)
		{
			$this->conectaDB();
			$SQL = "select P.label,P.path,P.btn,P.image 
			        from usuarios U, privilegios P, usuarioprivilegios UP 
					where U.login = '$usuario' AND
					      P.id = UP.idprivilegio AND
						  U.login = UP.login";
			$resultado = mysql_query($SQL);
			$this -> cierraDB();
			$filas = mysql_num_rows($resultado);
			
			for( $i=0;$i<$filas;$i++)
			{
				$linea[$i] = mysql_fetch_array($resultado);
			}
			return($linea);
					
		}
		
		
	}
?>