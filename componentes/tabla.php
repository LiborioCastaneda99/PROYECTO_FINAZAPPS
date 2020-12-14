
<?php 
session_start();
require_once "../php/conexion.php";
$conexion=conexion();

?>
<div class="row">
	<h2 class="text-center">Control de datos Clientes</h2>
	<caption>
		<button type="button" class="btn btn-success w-100" data-toggle="modal" data-target="#modalNuevo">
			<i class="fas fa-address-card"></i> 
			Agregar Clientes
		</button>
	</caption>
	<div class="table-responsive">
		<table class="table table-hover mt-2 py-2 w-100">
			<thead class="bg-dark text-light" style="border-radius: 5px;">
				<tr>
					<th scope="col">Nit. del Cliente</th>
					<th scope="col">Nombres</th>
					<th scope="col">Dirección de domicilio</th>
					<th scope="col">Correo electrónico</th>
					<th scope="col">Teléfono</th>
					<th scope="col">Observaciones</th>
					<th scope="col">Editar</th>
					<th scope="col">Eliminar</th>
				</tr>
			</thead>
			<?php 

			if(isset($_SESSION['consulta'])){
				if($_SESSION['consulta'] > 0){
					$idp=$_SESSION['consulta'];
					$sql="SELECT  id, Nit_Terc, Nombre_Terc, Apellido_Terc, Dir_Terc, Correo_Terc, Tel_Terc, Observ_Terc 
					from TERCEROS_CLIE_PROV where id='$idp'";
				}else{
					$sql="SELECT  id, Nit_Terc, Nombre_Terc, Apellido_Terc, Dir_Terc, Correo_Terc, Tel_Terc, Observ_Terc 
					from TERCEROS_CLIE_PROV";
				}
			}else{
				$sql="SELECT  id, Nit_Terc, Nombre_Terc, Apellido_Terc, Dir_Terc, Correo_Terc, Tel_Terc, Observ_Terc 
				from TERCEROS_CLIE_PROV";
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
				$ver[6]."||".
				$ver[7];
				?>

				<tr>
					<td><?php echo $ver[1] ?></td>
					<td><?php echo $ver[2]. " ". $ver[3] ?></td>
					<td><?php echo $ver[4] ?></td>
					<td><?php echo $ver[5] ?></td>
					<td><?php echo $ver[6] ?></td>
					<td><?php echo $ver[7] ?></td>
					<td>
						<button class="btn btn-warning glyphicon glyphicon-edit" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">

						</button>
					</td>
					<td>
						<button class="btn btn-danger glyphicon glyphicon-trash" 
						onclick="preguntarSiNo('<?php echo $ver[0] ?>')">
						
					</button>
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
</div>
</div>
