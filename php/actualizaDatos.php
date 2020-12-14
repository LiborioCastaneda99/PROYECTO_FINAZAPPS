<?php 
	require_once "conexion.php";
	$conexion=conexion();
	$id=$_POST['id'];
	$i=$_POST['documento'];
	$n=$_POST['nombre'];
	$a=$_POST['apellido'];
	$d=$_POST['direccion'];
	$e=$_POST['email'];
	$t=$_POST['telefono'];
	$o=$_POST['observacion'];

	$sql="UPDATE TERCEROS_CLIE_PROV set Nit_Terc='$i',
								Nombre_Terc='$n',
								Apellido_Terc='$a',
								Dir_Terc='$d',
								Correo_Terc='$e',
								Tel_Terc='$t',
								Observ_Terc='$o'
				where id='$id'";
	echo $result=mysqli_query($conexion,$sql);

 ?>