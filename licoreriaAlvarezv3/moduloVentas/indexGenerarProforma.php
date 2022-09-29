<?php

		if(isset($_POST['btnGenerarProforma']))
		{
			//echo ("ok");
			include_once("controllerGenerarProforma.php");
			$objcontrollerGenerarProforma = new controllerGenerarProforma;
			$resultado = $objcontrollerGenerarProforma->obtenerProductos();
			include_once("formGenerarProforma.php");
			$objformGenerarProforma = new formGenerarProforma;
			$objformGenerarProforma->formGenerarProformaShow($resultado);
			//echo ($resultado);
		}
		else
		{
	
			include_once("../shared/formMensajeSistema.php");
			$objNuevoMensaje = new formMensajeSistema;
			$objNuevoMensaje->formMensajeSistemaShow("ACCESO DENEGADO","<a href='../index.php'>Ir al inicio</a>");	
		
		}
	

?>
