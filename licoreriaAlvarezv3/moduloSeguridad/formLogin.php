<?php

  
	class formLogin
	{
		public function formLoginShow()
		{
			?>
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
        <head>
          <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
          <title>Login</title>
            <!-- CSS -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
            <link rel="stylesheet" href="css/login.css">
            <!-- CSS -->
        </head>
			
		<body>
		<div class="login-box">
			<form class="form-box animated fadeInUp" name="Login" method="POST" action="./moduloSeguridad/getUsuario.php">
			<img class="avatar" src="icon/logo.png" alt="Logo de Licoreria">
			<h1 class="form-title">Login</h1>
				<input name="usuario" type="text" id="usuario" size="20" placeholder="Ingresa tu Usuario"/>
				<input name="contrasenia" type="password" id="contrasenia" size="20" placeholder="Ingresa tu Password" /></td>
				<button name="btnIngresar" type="submit" id="btnIngresar">INGRESAR</button>

			</form>
			</div>
		</body>


        <marquee behavior="" direction="" >LICORERIA ALVAREZ 2021</marquee>
			</html>
			<?php
		}
	}
  
?>