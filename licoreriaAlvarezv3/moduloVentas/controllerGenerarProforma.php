<?php
	
	class controllerGenerarProforma 
	{
		public function obtenerProductos()
		{
			include_once("../model/EntityProductos.php");
			$objEntityProductos = new EntityProductos;
			$productos = $objEntityProductos->obtenerProductos();
			return ($productos);
		}
		
		public function obtenerproductobuscado($descripcion)
		{
			include_once("../model/EntityProductos.php");
			$objEntityProductos = new EntityProductos;
			$productos = $objEntityProductos->obtenerproductobuscado($descripcion);
			return ($productos);
		}
		
		public function insertarproforma($datos)
		{
			include_once("../model/EntityProforma.php");
			$objEntityProforma = new EntityProforma;
			$resultado = $objEntityProforma->insertarproforma($datos);
			return $resultado;
		}
		
		public function insertardetalleproforma($serie,$lista)
		{
			include_once("../model/EntityDetalleProforma.php");
			$objEntityDetalleProforma = new EntityDetalleProforma;
			$respuesta = $objEntityDetalleProforma->insertardetalleproforma($serie,$lista);
			return $respuesta;
		}
		
	} 

?>
