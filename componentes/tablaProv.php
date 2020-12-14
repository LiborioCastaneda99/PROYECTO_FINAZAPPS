 <?php
 include "../php/validarSesion.php";

 if(!empty($user) && ($user['Nivel_usr']=='1')): ?>

 	<?php 
 require_once "../php/conexion.php";
 $conexion=conexion();

 ?>
 <div class="row">
 	<h2 class="text-center" style="margin: 0px auto;">Control de datos Proveedores</h2>
 	<!--<caption>
 		<button type="button" class="btn btn-success w-100" data-toggle="modal" data-target="#modalNuevo">
 			<i class="fas fa-address-card"></i> 
 			Agregar Proveedores
 		</button>
 	</caption>-->
 	<div class="table-responsive">
 		<table class="table table-hover mt-2 py-2 w-100">
 			<thead class="bg-dark text-light" style="border-radius: 5px;">
 				<tr>
 					<th scope="col">Nit</th>
 					<th scope="col">Nombres y Apellidos</th>
 					<th scope="col">Dirección</th>
 					<th scope="col">Correo electrónico</th>
 					<th scope="col">Teléfono</th>
 					<th scope="col">Observaciones</th>
 					<th scope="col">Editar</th>
 				</tr>
 			</thead>
 			<?php 

 			if(isset($_SESSION['consulta'])){
 				if($_SESSION['consulta'] > 0){
 					$idp=$_SESSION['consulta'];
 					$sql="SELECT  `Nit_Tercero`, `Nombre`, `Direccion`, `Telefono`, `Correo`, `Tipo_Cli_Prov`, `Observaciones` 
 					from Terceros where Nit_Tercero='$idp'";
 				}else{
 					$sql="SELECT  `Nit_Tercero`, `Nombre`, `Direccion`, `Telefono`, `Correo`, `Tipo_Cli_Prov`, `Observaciones` 
 					from Terceros where Tipo_Cli_Prov='Proveedor'";
 				}
 			}else{
 				$sql="SELECT  `Nit_Tercero`, `Nombre`, `Direccion`, `Telefono`, `Correo`, `Tipo_Cli_Prov`, `Observaciones` 
 				from Terceros where Tipo_Cli_Prov='Proveedor'";
 			}

 			$result=mysqli_query($conexion,$sql);
 			while($ver=mysqli_fetch_row($result)){ 

 				$datos=
 				$ver[0]."||".
 				$ver[1]."||".
 				$ver[2]."||".
 				$ver[3]."||".
 				$ver[4]."||".
 				$ver[5]."||".
 				$ver[6];
 				?>

 				<tr class="small">
 					<td><?php echo $ver[0] ?></td>
 					<td><?php echo $ver[1] ?></td>
 					<td><?php echo $ver[2] ?></td>
 					<td><?php echo $ver[4] ?></td>
 					<td><?php echo $ver[3] ?></td>
 					<td><?php echo $ver[6] ?></td>
 					<td>
 						<button class="btn btn-warning glyphicon glyphicon-edit" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">

 						</button>
 					</td>
 			</tr>
 			<?php 
 		}
 		?>
 	</table>
 </div>
</div>

<?php elseif(!empty($user) && ($user['Nivel_usr']=='2')): ?>

<?php 
require_once "../php/conexion.php";
$conexion=conexion();

?>

<div class="row">
	<h2 class="text-center" style="margin: 0px auto;">Control de datos Proveedores</h2>
	<caption>
		<button type="button" class="btn btn-success w-100" data-toggle="modal" data-target="#modalNuevo">
			<i class="fas fa-address-card"></i> 
			Agregar Proveedores
		</button>
	</caption>
	<div class="table-responsive">
		<table class="table table-hover mt-2 py-2 w-100">
			<thead class="bg-dark text-light" style="border-radius: 5px;">
				<tr>
					<th scope="col">Nit</th>
					<th scope="col">Nombres y Apellidos</th>
					<th scope="col">Dirección</th>
					<th scope="col">Correo electrónico</th>
					<th scope="col">Teléfono</th>
					<th scope="col">Observaciones</th>
				</tr>
			</thead>
			<?php 

			if(isset($_SESSION['consulta'])){
				if($_SESSION['consulta'] > 0){
					$idp=$_SESSION['consulta'];
					$sql="SELECT  `Nit_Tercero`, `Nombre`, `Direccion`, `Telefono`, `Correo`, `Tipo_Cli_Prov`, `Observaciones` 
					from Terceros where Nit_Tercero='$idp'";
				}else{
					$sql="SELECT  `Nit_Tercero`, `Nombre`, `Direccion`, `Telefono`, `Correo`, `Tipo_Cli_Prov`, `Observaciones` 
					from Terceros where Tipo_Cli_Prov='Proveedor'";
				}
			}else{
				$sql="SELECT  `Nit_Tercero`, `Nombre`, `Direccion`, `Telefono`, `Correo`, `Tipo_Cli_Prov`, `Observaciones` 
				from Terceros where Tipo_Cli_Prov='Proveedor'";
			}

			$result=mysqli_query($conexion,$sql);
			while($ver=mysqli_fetch_row($result)){ 

				$datos=
				$ver[0]."||".
				$ver[1]."||".
				$ver[2]."||".
				$ver[3]."||".
				$ver[4]."||".
				$ver[5]."||".
				$ver[6];
				?>

				<tr class="small">
					<td><?php echo $ver[0] ?></td>
					<td><?php echo $ver[1] ?></td>
					<td><?php echo $ver[2] ?></td>
					<td><?php echo $ver[4] ?></td>
					<td><?php echo $ver[3] ?></td>
					<td><?php echo $ver[6] ?></td>
			</tr>
			<?php 
		}
		?>
	</table>
</div>
</div>



<?php endif; ?>