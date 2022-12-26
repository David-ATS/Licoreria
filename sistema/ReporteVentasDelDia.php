<?php include_once "includes/header.php"; ?>

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Ventas Del Día</h1>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div>
				<ul class="nav navbar-nav"><a href="ExcelReporteVentasDelDia.php">
					<button style ="background-color:#3CB032;border-color:#3CB032; color:white; width:170px" type="button" class="btn btn-primary">
						<i class='fas fa-file-excel'></i>  Generar Excel
					</button>
				</a></ul>
			</div>

			<div class="table-responsive">
				<table align="center" style="width:auto" class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
						<tr style="height:auto">
							<th style="width:140px">N° Factura</th>
							<th style="width:250px">Fecha</th>
							<th style="width:300px">Vendedor</th>
							<th style="width:300px">Cliente</th>
							<th style="width:250px">Total</th>
							<th style="width:100px">Documento</th>
						</tr>
					</thead>
					<tbody>
						<?php
						require "../conexion.php";
						$query = mysqli_query($conexion, 
							"SELECT A.nofactura, A.fecha, A.codcliente, C.nombre as NameVendedor, B.nombre as NameCliente, A.totalfactura, A.estado
							FROM factura A
							INNER JOIN cliente B
							ON A.codcliente = B.idcliente
							INNER JOIN usuario C
							ON A.usuario = C.idusuario
                            WHERE A.fecha >= CURDATE()
							ORDER BY A.fecha DESC
						");

						$query2 = mysqli_query($conexion, 
							"SELECT SUM(D.totalfactura) AS Total 
							FROM factura D
							WHERE D.fecha >= CURDATE()
						");
						mysqli_close($conexion);
						$cli = mysqli_num_rows($query);

						if ($cli > 0) {
							while ($dato = mysqli_fetch_array($query)) {
							?>
								<tr style="height:auto">
									<td><?php echo $dato['nofactura']; ?></td>
									<td><?php echo $dato['fecha']; ?></td>
									<td><?php echo $dato['NameVendedor']; ?></td>
									<td><?php echo $dato['NameCliente']; ?></td>
									<td><?php echo $dato['totalfactura']; ?></td>
									<td>
										<button type="button" class="btn btn-primary view_factura" cl="<?php echo $dato['codcliente'];  ?>" f="<?php echo $dato['nofactura']; ?>"><i class='fas fa-file-pdf'></i></button>
									</td>
								</tr>
							<?php }


							while ($dato = mysqli_fetch_array($query2)) {
								?>
										<tr style="height:auto">
											<td></td>
											<td></td>
											<td></td>
											<td align="center" bgcolor="red"><font size ="5", color ="#ffffff">TOTAL (S/.)</font></td>
											<td align="center" bgcolor="red"><font size ="5", color ="#ffffff"><?php echo $dato['Total']; ?></font></td>
										</tr>
							<?php }

						} ?>
					</tbody>
				</table>
			</div>
	</div>
</div>

<?php include_once "includes/footer.php"; ?>