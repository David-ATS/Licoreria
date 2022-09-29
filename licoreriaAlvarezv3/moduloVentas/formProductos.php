<?php
	include_once("../shared/formularioGeneral.php");
	class formProductos extends formularioGeneral
	{
		
		public function formGestionarProductoShow($productos)
		{
			$s_productos = $productos;
			$this->cabezaShow("PRODUCTOS");
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
			<title>PRODUCTOS</title>
			</head>
			<body>
			<div id="contener">
			<div id="nuevoProducto" class="form-box animated fadeInUp">
				<table align="center">
					<tr>
						<td>Nombre del Producto</td>
					</tr>
					<tr>
					<td>
						<input name="NombreProducto" type="textP" id="NombreProducto" /></td>
					</tr>
					<tr>
						<td>Precio</td>
					</tr>
					<tr>
						<td><input  min="1" name="Precio" type="number" id="Precio"/></td>
					</tr>
					<tr>
						<td>Stock</td>
					</tr>
					<tr>
						<td><input  min="1" name="Stock" type="number" id="Stock"/></td>
					</tr>
					<tr>
						<td><button name="Limpiar" id="btnLimpiar" onclick="limpiar()"><i class="material-icons">cleaning_services</i></button>
						<?php $numfilas=sizeof($productos)+1?>
						<button name ="Guardar" onclick="guardarProducto(<?php echo($numfilas); ?>)"><i class="material-icons">save</i></button></td>
					</tr>
					<tr>

					</tr>
					<tr>
					<td><form  method="post" action="../moduloSeguridad/getUsuario.php"><input type="submit" name="btnvolvermenu" value="Volver" /></form></td>
					</tr>
				</table>
			</div>	
			<!-- este contenedor contendr� la tabla de productos -->
			<div id="contentproductos">
				<table name="tablaProducto"  border="1" cellpadding="5">
			  		<thead>
						<td width="87">C&Oacute;DIGO</td>
						<td width="36">STOCK</td>
						<td width="250">DESCRIPCI&Oacute;N</td>
						<td width="39">PRECIO</td>
						<td width="52">EDITAR</td>
			  		</thead>
			  		<?php
			  		$numfilas = sizeof($productos); 
			  		for($i=0;$i<$numfilas;$i++)
			  		{
			  		?>
					<tr>
				 		<td id="codigo<?php echo($i);?>"><?php echo($productos[$i]['codigo']); ?></td>
						<td id="stock<?php echo($i);?>"><?php echo($productos[$i]['stock']); ?></td>
						<td id="descripcion<?php echo($i);?>"><?php echo($productos[$i]['descripcion']); ?></td>
						<td id="precio<?php echo($i);?>"><?php echo($productos[$i]['precio']); ?></td>
						<td><button name="Editar" onclick="editar(<?php echo($i); ?>)"><i class="material-icons">edit</i></button></td>
						
			 	 	</tr>
			  		<?php	 
			  		}
			  		?>
				</table>  
			</div>
			<div id="Ventana">
			<h2>EDITAR PRODUCTOS</h2>
				<table>
					<tr><td id="codigoActualizar"><td></tr>
					<tr><td>Nombre del Producto</td></tr>
					<tr><td><textarea name="NombreProductoActualizar" id="NombreProductoActualizar"></textarea></td></tr>
					<tr>
						<td>Precio</td>
						<td>Stock</td>
					</tr>
					<tr>
						<td><input  min="1" name="PrecioActualizar" type="number" id="PrecioActualizar"/></td>
						<td><input name="StockActualizar" type="number" id="StockActualizar"/></td>
					</tr>
					<tr>
						<td><input name="btnActualizar" type="submit" onclick="actualizar()" value="Actualizar"/></td>
						<td><button onclick="Volver()">Volver</button>
					</tr>
				</table>
			</div>  
			</body>
			<script src="https://code.jquery.com/jquery-3.6.0.min.js"
			  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			  crossorigin="anonymous"></script>
			<script type="text/javascript" src="../scripts/GestionarProductoscript.js"></script>
			</html>
			
            <?php          
            //$this->piePaginaShow();
      	}
		  
    }
	
?>
