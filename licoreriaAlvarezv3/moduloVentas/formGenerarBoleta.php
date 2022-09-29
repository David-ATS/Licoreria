<?php
	include_once("../shared/formularioGeneral.php");
	class formGenerarBoleta extends formularioGeneral
	{
		
		public function formGenerarBoletaShow($monto,$proformas)
		{
			$s_proformas = $proformas;
			$this->cabezaShow("GENERAR BOLETA");
			?>
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
				<!-- ICONOS -->
				<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
					<!-- CSS -->
					<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
					<link rel="stylesheet" href="../css/style.css">
					<!-- CSS -->
				<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
				<title>GENERAR BOLETA</title>
				<style>
					#Ventana{
						background:#FFFFFF;
						position:absolute;
						left:34%;
						top: 30%;
						display:none;
					}
				</style>
			</head>
				<body>
					<div align="center">
						<table >
					<tr>
						<td><input type="textP" id="dato"/></td>
						<td>
							<select id="seleccionar">
								<option>Seleccionar</option>
								<option>Cliente</option>
								<option>Serie</option>
							</select>
						</td>
						<td>
							<button name ="Buscar" onclick="buscar()"><i class="material-icons">search</i></button>
						</td>
					</tr>
				</table>		
				<!-- este contenedor contendr� la tabla de proformas -->
				<div id="contentproformas">
					<table name="tabla1">
						<thead>
							<td width="87">Serie</td>
							<td width="36">Nombre del Cliente</td>
							<td width="177">Estado</td>
							<td width="39">Monto</td>
							<td width="52">Accion</td>
						</thead>
						<?php
						$numfilas = sizeof($proformas); 
						for($i=0;$i<$numfilas;$i++)
						{
						?>
							<tr>
								<td id="serie<?php echo($proformas[$i]['idproforma']);?>"><?php echo($proformas[$i]['serie']); ?></td>
								<td id="cliente<?php echo($proformas[$i]['idproforma']);?>"><?php echo($proformas[$i]['cliente']); ?></td>
								<td id="estado<?php echo($proformas[$i]['idproforma']);?>"><?php if($proformas[$i]['estado'] ==0){
																		echo("Por atender");
								} ?></td>
								<td id="monto<?php echo($proformas[$i]['idproforma']);?>"><?php echo($monto->monto[$i]); ?></td>
								<td><button name="Agregar" onclick="seleccionar(<?php echo($proformas[$i]['idproforma']); ?>,'<?php echo($proformas[$i]['fecha']); ?>','<?php echo($proformas[$i]['hora']); ?>')"><i class="material-icons">add_task</i></button></td>
							</tr>
						
						<?php	 
						}
						?>
					</table>
					<form  method="post" action="../moduloSeguridad/getUsuario.php"> <input type="submit" name="btnvolvermenu" value="Volver" /></form>  
				</div>
				<div id="Ventana">
								
				</div> 
					</div> 
				</body>
			<script src="https://code.jquery.com/jquery-3.6.0.min.js"
			  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			  crossorigin="anonymous"></script>
			<script type="text/javascript" src="../scripts/generarboletascript.js"></script>
			<script src="../scripts/html2pdf.bundle.min.js"></script>
			</html>
			<?php
		}		
	}
?>