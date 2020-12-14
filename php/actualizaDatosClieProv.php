<?php 
	require_once "conexion.php";
	$conexion=conexion();
	$i=$_POST['documento'];
	$n=$_POST['nombre'];
	$d=$_POST['direccion'];
	$e=$_POST['email'];
	$t=$_POST['telefono'];
	$o=$_POST['observacion'];

	$sql="UPDATE Terceros set
								Nombre='$n',
								Direccion='$d',
								Correo='$e',
								Telefono='$t',
								Observaciones='$o'
				where Nit_Tercero='$i'";
	echo $result=mysqli_query($conexion,$sql);

 ?>