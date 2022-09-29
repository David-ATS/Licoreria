<?php
	class formularioGeneral
	{
		protected function cabezaShow($titulo)
		{
			?>
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
					<title><?php echo ($titulo); ?></title>
					<!-- CSS -->
					<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
					<link rel="stylesheet" href="css/style.css">
					<!-- CSS -->
					<link rel="icon" href="../icon/logo.png">
				</head>
				
				<body>
					<td><img src="../banner.png" alt="" width="100%"></td>
					<table width="100%">
						<tr>
							<td>
								<h1 name="titulo"><?php echo ($titulo); ?></h1>
							</td>
						</tr>
					</table>
			<?php
		}
		protected function piePaginaShow(){
					?>
				</body>
				<footer>
					<div class="footer-content">
						<h3>LICORERIA ALVAREZ</h3>
						<p>5TO ANIVERSARIO</p>
					</div>
					<div class="footer-copy">
						<p>copyrigth &copy;2021 LICORERIA ALVAREZ</p>
					</div>
				</footer>
			</html>
		<?php
		}
	}
?>



