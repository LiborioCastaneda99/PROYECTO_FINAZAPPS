
<?php 
	require_once "conexion.php";
	$conexion=conexion();
	$id=$_POST['id'];

	$sql="DELETE from Terceros where Nit_Tercero='$id'";
	echo $result=mysqli_query($conexion,$sql);
 ?>