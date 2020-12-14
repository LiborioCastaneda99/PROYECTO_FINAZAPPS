<?php 

require_once "conexion.php";
$conexion=conexion();


$cu=$_POST['consecutivoU'];
$va=$_POST['valorAbono'];
$c=$_POST['concepto'];
$r=$_POST['responsable'];
$tu=$_POST['transaccionU'];
$s=$_POST['saldoU'];
$f=date('y-m-d');

$restante=$s-$va;

$sql="INSERT into Pagos_pcc (`Fecha_pcc`, `Concepto_pcc`, `Monto_pcc`, `Responsable_pcc`, `Cuenta_credito_pcc`)
values ('$f','$c','$va','$r','$tu')";
echo $result=mysqli_query($conexion,$sql);

include 'actualizaDatosMontoCredito.php';

if ($restante=='0') {
include 'actualizaDatosEstadoCreditos.php';
}

?>