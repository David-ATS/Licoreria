<?php
	
	if(isset($_POST['btnCambiarContrasenia']))
	{
		include_once("../moduloSeguridad/facadeFormSeguridad.php");
		session_start();
		$login = $_SESSION['login'];
		$objfacade = new facadeFormSeguridad("seguridad","formCambiarContrasenia","CAMBIAR CONTRASEÑA");
		$objfacade->crearFormCambiarContrasenia($login);
	}
	else
	{
		include_once("../moduloSeguridad/facadeFormSeguridad.php");
		$objfacade = new facadeFormSeguridad("shared","formMensajeSistema","MENSAJE DEL SISTEMA");
		$objfacade ->crearFormMensajeSistema("ACCESO DENEGADO","<a href='../index.php'>Ir al inicio</a>");
	}
	
?>