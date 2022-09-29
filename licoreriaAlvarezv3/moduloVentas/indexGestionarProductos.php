<?php

		if(isset($_POST['btnGestionarProductos']))
		{
			include_once("controllerGestionarProducto.php");
			$objcontrollerGestionarProducto = new controllerGestionarProducto;
			$productos = $objcontrollerGestionarProducto->obtenerProductos();
            include_once("formProductos.php");
            $objformProductos = new formProductos;
            $objformProductos->formGestionarProductoShow($productos);
		}
		else
		{
	
			include_once("../shared/formMensajeSistema.php");
			$objNuevoMensaje = new formMensajeSistema;
			$objNuevoMensaje->formMensajeSistemaShow("ACCESO DENEGADO","<a href='../index.php'>Ir al inicio</a>");	
		
		}
	

?>