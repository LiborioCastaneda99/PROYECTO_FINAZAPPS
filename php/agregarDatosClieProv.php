<?php 

require_once "conexion.php";
$conexion=conexion();
$i=$_POST['documento'];
$n=$_POST['nombre'];
$a=$_POST['apellido'];
$n_a=$n." ".$a;
$d=$_POST['direccion'];
$e=$_POST['email'];
$t=$_POST['telefono'];
$cp=$_POST['tipo_clie_prov'];
$o=$_POST['observacion'];

$sql="INSERT into Terceros ( `Nit_Tercero`, `Nombre`, `Direccion`, `Telefono`, `Correo`, `Tipo_Cli_Prov`, `Observaciones`)
values ('$i','$n_a','$d','$t','$e','$cp','$o')";
echo $result=mysqli_query($conexion,$sql);

?>