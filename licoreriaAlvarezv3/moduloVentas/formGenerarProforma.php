<?php
	include_once("../shared/formularioGeneral.php");
	class formGenerarProforma extends formularioGeneral
	{
		
		public function formGenerarProformaShow($productos)
		{
			$s_productos = $productos;
			$this->cabezaShow("GENERAR PROFORMA");
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
			<title>GENERAR PROFORMA</title>
			</head>
			<body>
			
				<div id="padre">
						<table name="tabla3" width="542">
							<tr>
								<td width="102"></td>
								<td width="153">Cliente:</td>
								<td width="185">Nombre del producto: </td>
								<td width="84">&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td><label>
								<input name="txtcliente" type="textP" id="txtcliente" />
								</label></td>
								<td><label>
								<input name="txtproducto" type="textP" id="txtproducto" />
								</label></td>
								<td><label>
								<button name ="Buscar" onclick="listarproductos()"><i class="material-icons">search</i></button>
								</label></td>
							</tr>
						</table>
			<div id="contenttablas">
			 
			<!-- este contenedor contendr� la tabla de productos -->
			<div id="contentproductos">
						<table name="tabla1" >
							<thead>
								<td width="87">ID</td>
								<td width="87">C&Oacute;DIGO</td>
								<td width="36">STOCK</td>
								<td width="177">DESCRIPCI&Oacute;N</td>
								<td width="39">PRECIO</td>
								<td width="55">CANTIDAD</td>
								<td width="52">AGREGAR</td>
							</thead>
			  <?php
			  $numfilas = sizeof($productos); 
			  for($i=0;$i<$numfilas;$i++)
			  {
			  ?>
			  	 <tr>
				 	<td id="idproducto<?php echo($i);?>"><?php echo($productos[$i]['idproducto']); ?></td>
				 	<td id="codigo<?php echo($i);?>"><?php echo($productos[$i]['codigo']); ?></td>
					<td id="stock<?php echo($i);?>"><?php echo($productos[$i]['stock']); ?></td>
					<td id="descripcion<?php echo($i);?>"><?php echo($productos[$i]['descripcion']); ?></td>
					<td id="precio<?php echo($i);?>"><?php echo($productos[$i]['precio']); ?></td>
					<td id="cantidadcelda"><input type="number"  min="1" id="cantidad<?php echo($i);?>"/></td>
					<td ><button name="Agregar" onclick="agregar(<?php echo($i); ?>)"><i class="material-icons">add_shopping_cart</i></button></td>
			 	 </tr>
			  <?php	 
			  }
			  ?>
			 
			
			</table>
			</div>
			<!-- ***************** -->
			
			<!-- este contenedor contendr� la tabla de productos en lista -->
			
			<div id="contentproductoslista">
					<table name="tabla1" width="444" border="1" cellpadding="5" align="right">
						<tbody id="tbodyproductoslista"></tbody>
					</table>
			</div>
			<!-- ***************** -->
			
			</div>
			<div class="ventanaVisPro" id="ventana">
		
			</div>
			<div id="botones1">
				<input type="submit" name="Submit" value="Visualizar Proforma" onclick="visualizarProforma()" />
			  	<form  method="post" action="../moduloSeguridad/getUsuario.php"> <input type="submit" name="btnvolvermenu" value="Volver" /></form>
			  
		    </div>
		</div>
				
			
			
			
			</body>
			<script
			  src="https://code.jquery.com/jquery-3.6.0.min.js"
			  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			  crossorigin="anonymous"></script>
			<script src="../scripts/html2pdf.bundle.min.js"></script>
			<script type="text/javascript" src="../scripts/emitirproformascript.js"></script>
			</html>
			<?php
			$this->piePaginaShow();
		}
		
		
	}
?>