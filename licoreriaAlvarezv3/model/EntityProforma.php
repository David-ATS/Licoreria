<?php
	include_once("conexion_singleton.php");
	class EntityProforma
	{
		public function insertarproforma($datos)
		{
			conexion_singleton::getInstancia();
			$serie = $datos[0]['serie'];
			$cliente = $datos[0]['cliente'];
			$fecha=$datos[0]['fecha'];
			$hora=$datos[0]['hora'];
			$sql = "insert into proformas (serie,cliente,fecha,hora,estado) values('$serie','$cliente','$fecha','$hora',0)";
			$resultado = mysql_query($sql);
			return $resultado;
		}

		public function obtenerProformas()
		{
			
			conexion_singleton::getInstancia();
			$SQL = "select idproforma,serie,cliente,estado,fecha,hora from proformas where estado=0";
			$resultado = mysql_query($SQL);
			$filas = mysql_num_rows($resultado);
			
			for( $i=0;$i<$filas;$i++)
			{
				$linea[$i] = mysql_fetch_array($resultado);
			}
			return($linea);
					
		}

		public function obtenerProformasBuscadas($datos)
		{
			
			conexion_singleton::getInstancia();
			if($datos[0]['tipo']=="Cliente"){

				$cliente = $datos[0]['dato'];
				
				$SQL = "SELECT * FROM proformas
					WHERE estado =0
					AND cliente LIKE '%$cliente%'";
			}
					
			else{

				$serie = $datos[0]['dato'];
				$SQL = "select idproforma,serie,cliente,estado,fecha,hora from proformas where estado=0 and serie= '$serie'";
			}
			$resultado = mysql_query($SQL);
			$filas = mysql_num_rows($resultado);
			
			for( $i=0;$i<$filas;$i++)
			{
				$linea[$i] = mysql_fetch_array($resultado);
			}
			return($linea);
					
		}

		public function actualizarproforma($idproforma){

			conexion_singleton::getInstancia();
			$SQL = "update proformas set estado = 1 where idproforma = $idproforma";
			$resultado = mysql_query($SQL);

			return $resultado;

		}
	}

?>