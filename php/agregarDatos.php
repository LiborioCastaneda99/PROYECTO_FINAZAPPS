<?php 

	require_once "conexion.php";
	$conexion=conexion();
	$i=$_POST['documento'];
	$n=$_POST['nombre'];
	$a=$_POST['apellido'];
	$d=$_POST['direccion'];
	$e=$_POST['email'];
	$t=$_POST['telefono'];
	$o=$_POST['observacion'];

	$sql="INSERT into TERCEROS_CLIE_PROV ( Nit_Terc, Nombre_Terc, Apellido_Terc, Dir_Terc, Correo_Terc, Tel_Terc, Observ_Terc)
								values ('$i','$n','$a','$d','$e','$t','$o')";
	echo $result=mysqli_query($conexion,$sql);

 ?>