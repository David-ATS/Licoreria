<?php

    class controllerGestionarProducto
    {

        public function obtenerProductos()
		{
			include_once("../model/EntityProductos.php");
			$objEntityProductos = new EntityProductos;
			$productos = $objEntityProductos->obtenerProductos();
			return ($productos);
		}

        public function guardarproducto($cod,$stock,$precio,$descripcion){
            include_once("../model/EntityProductos.php");
			$objEntityProductos = new EntityProductos;
			$resultado = $objEntityProductos->guardarproducto($cod,$stock,$precio,$descripcion);
			return ($resultado);
        }

        public function editarproducto($cod,$stock,$precio,$descripcion){
            include_once("../model/EntityProductos.php");
			$objEntityProductos = new EntityProductos;
			$resultado = $objEntityProductos->editarproducto($cod,$stock,$precio,$descripcion);
			return ($resultado);
        }


    }
   
?>