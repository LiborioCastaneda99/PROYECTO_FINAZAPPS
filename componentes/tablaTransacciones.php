 <?php
 include "../php/validarSesion.php";

require_once "../php/conexion.php";
$conexion=conexion();


 if(!empty($user) && ($user['Nivel_usr']=='1')): ?>

 	

<div class="row">
        <h2 class="text-center" style="margin: 0px auto;">Control de datos Transacciones</h2>
	<!--<caption>
		<button type="button" class="btn btn-success w-100" data-toggle="modal" data-target="#AgregarTransacciones">
			<i class="fas fa-address-card"></i> 
			Agregar Transacciones
		</button>
	</caption>-->
	<div class="table-responsive">
		<table class="table table-hover mt-2 py-2 w-100">
			<thead class="bg-dark text-light" style="border-radius: 5px;">
				    <tr>                            
				    	<th scope="col">Consecutivo</th>
                            <th scope="col">Nit</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Monto</th>
                            <th scope="col">Clase de transacción</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Forma de pago</th>
                            <th scope="col">Concepto</th>
                            <th scope="col">Editar</th>
                        </tr>
			</thead>
			<?php 

			if(isset($_SESSION['consulta'])){
				if($_SESSION['consulta'] > 0){
					$idp=$_SESSION['consulta'];
					$sql="SELECT Consecutivo_t, `Nit_tercero_t`, `Fecha_t`, `Concepto_t`, `Monto_t`, `Tipo_Ing_Egr_t`, Clase_t, Forma_Pago_t FROM Transacciones where Consecutivo_t='$idp'";
				}else{
					$sql="SELECT  Consecutivo_t, `Nit_tercero_t`, `Fecha_t`, `Concepto_t`, `Monto_t`, `Tipo_Ing_Egr_t`, Clases_Tran.descrip_clase_t, Forma_Pago_t FROM Transacciones, Clases_Tran Where Transacciones.Clase_t=Clases_Tran.Cod_clase_t order by Transacciones.Fecha_t";
				}
			}else{
				$sql="SELECT Consecutivo_t, `Nit_tercero_t`, `Fecha_t`, `Concepto_t`, `Monto_t`, `Tipo_Ing_Egr_t`, Clases_Tran.descrip_clase_t, Forma_Pago_t FROM Transacciones, Clases_Tran Where Transacciones.Clase_t=Clases_Tran.Cod_clase_t order by Transacciones.Fecha_t";
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
					<td><?php echo $ver[6] ?></td>
					<td><?php echo $ver[5] ?></td>
					<td><?php echo $ver[7] ?></td>
					<td><?php echo $ver[3] ?></td>
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


<div class="row">
        <h2 class="text-center" style="margin: 0px auto;">Control de datos Transacciones</h2>
	<caption>
		<button type="button" class="btn btn-success w-100" data-toggle="modal" data-target="#AgregarTransacciones">
			<i class="fas fa-address-card"></i> 
			Agregar Transacciones
		</button>
	</caption>
	<div class="table-responsive">
		<table class="table table-hover mt-2 py-2 w-100">
			<thead class="bg-dark text-light" style="border-radius: 5px;">
				    <tr>                            
				    	<th scope="col">Consecutivo</th>
                            <th scope="col">Nit</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Monto</th>
                            <th scope="col">Clase de transacción</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Forma de pago</th>
                            <th scope="col">Concepto</th>
                        </tr>
			</thead>
			<?php 

			if(isset($_SESSION['consulta'])){
				if($_SESSION['consulta'] > 0){
					$idp=$_SESSION['consulta'];
					$sql="SELECT Consecutivo_t, `Nit_tercero_t`, `Fecha_t`, `Concepto_t`, `Monto_t`, `Tipo_Ing_Egr_t`, Clase_t, Forma_Pago_t FROM Transacciones where Consecutivo_t='$idp'";
				}else{
					$sql="SELECT  Consecutivo_t, `Nit_tercero_t`, `Fecha_t`, `Concepto_t`, `Monto_t`, `Tipo_Ing_Egr_t`, Clases_Tran.descrip_clase_t, Forma_Pago_t FROM Transacciones, Clases_Tran Where Transacciones.Clase_t=Clases_Tran.Cod_clase_t order by Transacciones.Fecha_t";
				}
			}else{
				$sql="SELECT Consecutivo_t, `Nit_tercero_t`, `Fecha_t`, `Concepto_t`, `Monto_t`, `Tipo_Ing_Egr_t`, Clases_Tran.descrip_clase_t, Forma_Pago_t FROM Transacciones, Clases_Tran Where Transacciones.Clase_t=Clases_Tran.Cod_clase_t order by Transacciones.Fecha_t";
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
					<td><?php echo $ver[6] ?></td>
					<td><?php echo $ver[5] ?></td>
					<td><?php echo $ver[7] ?></td>
					<td><?php echo $ver[3] ?></td>
 								</tr>
			<?php 
		}
		?>
	</table>
</div>
</div>

<?php endif; ?>