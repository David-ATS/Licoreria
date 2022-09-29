<?php
	
	include_once("conexion_singleton.php");
	class EntityProductos
	{
		public function obtenerProductos()
		{
			conexion_singleton::getInstancia();
			$SQL = "select * from productos";
			$resultado = mysql_query($SQL);
			
			$filas = mysql_num_rows($resultado);
			for( $i=0;$i<$filas;$i++)
			{
				$linea[$i] = mysql_fetch_array($resultado);
			}
			
			return($linea);
			
		}
		
		public function obtenerproductobuscado($descripcion)
		{
			conexion_singleton::getInstancia();
			$SQL = "select * from productos where descripcion like '%$descripcion%'";
			$resultado = mysql_query($SQL);
			
			$filas = mysql_num_rows($resultado);
			for( $i=0;$i<$filas;$i++)
			{
				$linea[$i] = mysql_fetch_array($resultado);
			}
			
			return($linea);
			
		}

		public function guardarproducto($cod,$stock,$precio,$descripcion)
		{
			
			conexion_singleton::getInstancia();
			$SQL = "insert into productos values(NULL,'$cod',$stock,$precio,'$descripcion')";
			$resultado = mysql_query($SQL);
			return $resultado;
				
		}
		 
		public function editarproducto($cod,$stock,$precio,$descripcion)
		{
			
			conexion_singleton::getInstancia();
			$SQL = "update productos set stock = $stock, descripcion = '$descripcion', precio=$precio where codigo='$cod'";
			$resultado = mysql_query($SQL);
			return $resultado;
				
		}

		public function actualizarstock($idproforma){

			conexion_singleton::getInstancia();
			$SQL="select DP.idproducto, P.stock, DP.cantidad from detalleproforma DP, productos P where DP.idproducto = P.idproducto and DP.idproforma = $idproforma";
			$resultado = mysql_query($SQL);

			$filas = mysql_num_rows($resultado);
			for( $i=0;$i<$filas;$i++)
			{
				$linea[$i] = mysql_fetch_array($resultado);
			}
			
			for($i=0;$i<$filas;$i++){

				$idproducto = $linea[$i]['idproducto'];
				$stock = $linea[$i]['stock'];
				$cantidad = $linea[$i]['cantidad'];

				$stock = $stock - $cantidad;

				$sql="update productos set stock=$stock where idproducto = $idproducto";

				$respuesta = mysql_query($sql);
			}
			
			return $respuesta;
		}
		
		 
	}

?>
