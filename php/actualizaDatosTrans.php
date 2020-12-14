<?php 
require_once "conexion.php";
$conexion=conexion();
$i=$_POST['idConsecutivo'];
$c=$_POST['concepto'];
$m=$_POST['monto'];
$sql="UPDATE Transacciones set
Concepto_t='$c',
Monto_t='$m'
where Consecutivo_t='$i'";
echo $result=mysqli_query($conexion,$sql);

?>