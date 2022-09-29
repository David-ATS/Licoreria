<?php 
	include_once("formCambiarContrasenia.php");
	session_start();
	$login = $_SESSION['login'];
	$objformulario = new formCambiarContrasenia;
	$objformulario->formCambiarContraseniaShow($login);
?>
