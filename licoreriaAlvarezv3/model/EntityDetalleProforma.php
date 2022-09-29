<?php
	include_once("conexion_singleton.php");
	class EntityDetalleProforma
	{
		public function insertardetalleproforma($serie,$lista)
		{
			
			$sql = "select idproforma from proformas where serie = '$serie'";
			conexion_singleton::getInstancia();
			$resultado = mysql_query($sql);
			$idproforma = mysql_result($resultado,0);
			for($i = 0;$i<sizeof($lista);$i++)
			{
				
				$idproducto = $lista[$i]['idproducto'];
				$cantidad = $lista[$i]['cantidad'];
				$monto = $lista[$i]['total'];
				
				$insert = "insert into detalleproforma (idproducto,cantidad,monto,idproforma) values($idproducto,$cantidad,$monto,$idproforma)";
				$respuesta = mysql_query($insert);
				
			}
			return $respuesta;
		}

		public function obtenerMonto($idproforma){

			$SQL = "select monto from detalleproforma where idproforma = $idproforma";
			conexion_singleton::getInstancia();
			$resultado = mysql_query($SQL);
			$filas = mysql_num_rows($resultado);
			$suma=0;
			for( $i=0;$i<$filas;$i++)
			{
				$linea[$i] = mysql_fetch_array($resultado);

				$suma += $linea[$i][0];
			}
			
			return($suma);
		}

		public function obtenerdetalleproforma($idproforma){

			$SQL = "SELECT DP.cantidad, DP.monto, P.descripcion, P.precio, P.codigo  
					FROM productos P, detalleproforma DP 
					WHERE DP.idproducto = P.idproducto and DP.idproforma = $idproforma";
			conexion_singleton::getInstancia();
			$resultado = mysql_query($SQL);
			$filas = mysql_num_rows($resultado);
			
			for( $i=0;$i<$filas;$i++)
			{
				$linea[$i] = mysql_fetch_array($resultado);

			}

			return $linea;
			
		}
	}
?>