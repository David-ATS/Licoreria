<?php

		if(isset($_POST['btnGenerarBoleta']))
		{
			//echo ("ok");
			include_once("controllerGenerarBoleta.php");
			$objcontroller = new controllerGenerarBoleta;
			$proformas = $objcontroller->obtenerProformas();

			$monto = $objcontroller->obtenerMonto($proformas);

            include_once("formGenerarBoleta.php");
            $objformBoletas = new formGenerarBoleta;
            $objformBoletas->formGenerarBoletaShow($monto,$proformas);
		}
		else
		{
	
			include_once("../shared/formMensajeSistema.php");
			$objNuevoMensaje = new formMensajeSistema;
			$objNuevoMensaje->formMensajeSistemaShow("ACCESO DENEGADO","<a href='../index.php'>Ir al inicio</a>");	
		
		}
	

?>
