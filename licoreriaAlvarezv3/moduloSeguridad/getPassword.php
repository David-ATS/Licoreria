<?php
	
	function validarCampos($apassword,$npassword,$cnpassword)
	{
		if(strlen($apassword)<6 or strlen($npassword)<6 or strlen($cnpassword)<6 or $cnpassword!=$npassword)
		{
			return (0);
		}
		else
		{
			return (1);
		}
	}
	
	if(isset($_POST['btncc']))
	{
		$apassword = $_POST['apassword'];
		$npassword = $_POST['npassword'];
		$cnpassword = $_POST['cnpassword'];
		$resultado =validarCampos($apassword,$npassword,$cnpassword);
		
		if($resultado == 1)
		{
			session_start();
			$login = $_SESSION['login'];
			include_once("controllerCambiarContrasenia.php");
			$objccc = new controllerCambiarContrasenia;
			$resultado = $objccc->validarContrasenia($login,$apassword);
			
			if($resultado == 1)
			{
				$objccc->modificarContrasenia($login,$npassword);
				include_once("../moduloSeguridad/facadeFormSeguridad.php");
				$objfacade = new facadeFormSeguridad("shared","formMensajeSistema","MENSAJE DEL SISTEMA");
				$objfacade ->crearFormMensajeSistema("CAMBIO DE CONTRASEÑA<br>realizado con éxito","<a href='../index.php'>Ir al inicio</a>");
			}
			else
			{
				include_once("../moduloSeguridad/facadeFormSeguridad.php");
				$objfacade = new facadeFormSeguridad("shared","formMensajeSistema","MENSAJE DEL SISTEMA");
				$objfacade ->crearFormMensajeSistema("CONTRASEÑA INCORRECTA<br>vuelva a intentar","<a href='../moduloSeguridad/indexformcc.php'>Volver a intentar</a>");
			}
			
		}
		else
		{
			include_once("../moduloSeguridad/facadeFormSeguridad.php");
			$objfacade = new facadeFormSeguridad("shared","formMensajeSistema","MENSAJE DEL SISTEMA");
			$objfacade ->crearFormMensajeSistema("DATOS INCORRECTOS<br>vuelva a intentar","<a href='../moduloSeguridad/indexformcc.php'>Volver a intentar</a>");
		}
	}
	else
	{
		include_once("../moduloSeguridad/facadeFormSeguridad.php");
		$objfacade = new facadeFormSeguridad("shared","formMensajeSistema","MENSAJE DEL SISTEMA");
		$objfacade ->crearFormMensajeSistema("ACCESO DENEGADO","<a href='../index.php'>Ir al inicio</a>");
	}
	
?>