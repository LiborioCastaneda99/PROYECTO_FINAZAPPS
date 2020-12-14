<?php
require_once "conexion.php";
$conexion=conexion();

$tipoTercero=$_POST['tipoTercero'];
?>

<?php if ($tipoTercero=='Cliente'): ?>
	<table class='table table-hover text-center' id='buscar_nit' name='buscar_nit'>
		<thead class='thead-dark'>
			<tr>
				<th>Consecutivo</th>
				<th>Transacción</th>
				<th>Saldo</th>
				<th>Estado</th>
				<th>Nit</th>
				<th>Nombres</th>
				<th>Acción</th>
			</tr>
		</thead>		
		<tbody>
			<?php	
			$sql="SELECT `Consecutivo_cc` AS 'Consecutivo',`Consecutivo_t_cc` AS 'Transacción',`Saldo_cc` AS 'Saldo',`Estado_cc` AS 'Estado', `Nit_Tercero`,`Nombre` FROM `Cuentas_Creditos`, `Transacciones`, `Terceros` WHERE LCASE(Tipo_cc) LIKE 'por cobrar' AND Estado_cc='Activa' AND Consecutivo_t_cc = Consecutivo_t AND `Nit_tercero_t` = `Nit_Tercero` AND Estado_cc='Activa'";

			$result=mysqli_query($conexion,$sql);
			while($ver=mysqli_fetch_row($result)){ 

				$datos=
				$ver[0]."||".
				$ver[1]."||".
				$ver[2]."||".
				$ver[3]."||".
				$ver[4]."||".
				$ver[5];
				?>

				<tr class="small">
					<td><?php echo $ver[0] ?></td>
					<td><?php echo $ver[1] ?></td>
					<td><?php echo $ver[2]?></td>
					<td><?php echo $ver[3] ?></td>
					<td><?php echo $ver[4] ?></td>					
					<td><?php echo $ver[5] ?></td>		
					<td>
						<button class="btn btn-warning glyphicon glyphicon-edit" onclick="agregaform('<?php echo $datos ?>')" data-toggle="modal" data-target="#AgregarPago"></button>
					</td>			
				</tr>
				<?php 
			}
			?>
		</table>

		<?php elseif ($tipoTercero=='Proveedor'): ?>

			<table class='table table-hover text-center' id='buscar_nit' name='buscar_nit'>
				<thead class='thead-dark'>
					<tr>
						<th>Consecutivo</th>
						<th>Transacción</th>
						<th>Saldo</th>
						<th>Estado</th>
						<th>Nit</th>
						<th>Nombres</th>
						<th>Acción</th>
					</tr>
				</thead>		
				<tbody>
					<?php	
					$sql="SELECT `Consecutivo_cc` AS 'Consecutivo',`Consecutivo_t_cc` AS 'Transacción',`Saldo_cc` AS 'Saldo',`Estado_cc` AS 'Estado', `Nit_Tercero`,`Nombre` FROM `Cuentas_Creditos`, `Transacciones`, `Terceros` WHERE LCASE(Tipo_cc) LIKE 'por pagar' AND Consecutivo_t_cc = Consecutivo_t AND `Nit_tercero_t` = `Nit_Tercero` AND Estado_cc='Activa'";

					$result=mysqli_query($conexion,$sql);
					while($ver=mysqli_fetch_row($result)){ 

						$datos=
						$ver[0]."||".
						$ver[1]."||".
						$ver[2]."||".
						$ver[3]."||".
						$ver[4]."||".
						$ver[5];
						?>

						<tr class="small">
							<td><?php echo $ver[0] ?></td>
							<td><?php echo $ver[1] ?></td>
							<td><?php echo $ver[2]?></td>
							<td><?php echo $ver[3] ?></td>
							<td><?php echo $ver[4] ?></td>					
							<td><?php echo $ver[5] ?></td>		
							<td>
								<button class="btn btn-warning glyphicon glyphicon-edit" onclick="agregaform('<?php echo $datos ?>')" data-toggle="modal" data-target="#AgregarPago"></button>
							</td>			
						</tr>
						<?php 
					}
					?>
				</table>
				<?php endif; ?>