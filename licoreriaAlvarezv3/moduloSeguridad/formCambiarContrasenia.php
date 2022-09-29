<?php
	include_once("../shared/formularioGeneral.php");
	class formCambiarContrasenia extends formulariogeneral
	{
		public function formCambiarContraseniaShow($login)
		{
			$this->cabezaShow("CAMBIAR CONTRASE&Ntilde;A");
			?>
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
				<!-- CSS -->
				<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
				<link rel="stylesheet" href="../css/style.css">
				<!-- CSS -->

				<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
			</head>
			
			<body>
			<table align="center" width="200" border="0">
			<form  method="post" action="getPassword.php">
			 <tr>
				<td align="center"><h3  class="usuario"><label >Usuario: </label><?php echo $login; ?></h3></td>
			  </tr>
			  <tr>
				<td align="left"><input name="apassword" type="password" placeholder="Ingrese contrase&ntilde;a actual"/></td>
			  </tr>
			  <tr>
				<td align="left"><input  name="npassword" type="password" placeholder="Ingrese nueva contrase&ntilde;a"/></td>
			  </tr>
			  <tr>
				<td align="left"><input  name="cnpassword" type="password" placeholder="Confirme Contrase&ntilde;a"/>
				  <div>
				  	<input type="submit"  id="btncc" name="btncc" value="Cambiar contrase&ntilde;a" />
					</form> 
					<form  method="post" action="../moduloSeguridad/getUsuario.php"> <input type="submit" name="btnvolvermenu" value="Volver" /></form>
				</div></td>
			  </tr>
			  
			  
			</table>
			
			</div>
			</div>
			</body>
			</html>
			<?php
			$this->piePaginaShow();
			//echo ($login);
		}
	}
?>


