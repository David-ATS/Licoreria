<?php
	//$btnIngresar = $_POST["btnIngresar"];	
	function validarCampos($login,$password)
	{
		if(strlen($login) < 6 or strlen($password) < 6)
		{
			return(0);
		}
		else
		{
			return(1);
		}
	}
	if(isset($_POST["btnIngresar"]))
	{
		//echo "chevere";
		$usuario = strtolower(trim($_POST["usuario"]));
		$contrasenia = trim($_POST["contrasenia"]);
		$resultado = validarCampos($usuario,$contrasenia);
		if($resultado==0)
		{
			include_once("../shared/formMensajeSistema.php");
			$objNuevoMensaje = new formMensajeSistema;
			$objNuevoMensaje->formMensajeSistemaShow("DATOS INCORRECTOS","<a href='../index.php'>Ir al inicio</a>");	
		}
		else
		{
			
			include_once("controllerLogin.php");
			$objControllerLogin = new controllerLogin;
			$resultado = $objControllerLogin->verificarUsuario($usuario,$contrasenia);
			
			if($resultado==0)
			{
			
				include_once("../shared/formMensajeSistema.php");
				$objNuevoMensaje = new formMensajeSistema;
				$objNuevoMensaje->formMensajeSistemaShow("ACCESO DENEGADO<br>El usuario se encuentra inhabilitado o no existe",
														 "<a href='../index.php'>Ir al inicio</a>");	
			}
			else
			{
				include_once("../model/EntityDetalleDeUsuario.php");
				$objDetalleUsuario = new EntityDetalleDeUsuario;
				$listadoPrivilegios = $objDetalleUsuario->obtenerPrivilegios($usuario);
				
				include_once("formMenuPrincipal.php");
				session_start();
				$_SESSION['login'] =  $usuario;
				$objformMenuPrincipal = new formMenuPrincipal;
				$objformMenuPrincipal->formMenuPrincipalShow($listadoPrivilegios);
					
				
				
				
				
			}
		}
	}
	else if(isset($_POST['btnvolvermenu']))
	{
				
				include_once("../model/EntityDetalleDeUsuario.php");
				session_start();
				$usuario = $_SESSION['login'];
				$objDetalleUsuario = new EntityDetalleDeUsuario;
				$listadoPrivilegios = $objDetalleUsuario->obtenerPrivilegios($usuario);
				
				include_once("formMenuPrincipal.php");
				
				$objformMenuPrincipal = new formMenuPrincipal;
				$objformMenuPrincipal->formMenuPrincipalShow($listadoPrivilegios);
	}
	else
	{
	
		include_once("../shared/formMensajeSistema.php");
		$objNuevoMensaje = new formMensajeSistema;
		$objNuevoMensaje->formMensajeSistemaShow("ACCESO DENEGADO","<a href='../index.php'>Ir al inicio</a>");	
		
	}
	

?>
