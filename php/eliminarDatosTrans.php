
<?php 
	require_once "conexion.php";
	$conexion=conexion();
	$id=$_POST['id'];

	$sql="DELETE from Transacciones where Consecutivo_t='$id'";
	echo $result=mysqli_query($conexion,$sql);
 ?>