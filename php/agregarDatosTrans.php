<?php 
require_once "conexion.php";
$conexion=conexion();

$b=$_POST['buscar_nit'];
$f=$_POST['fecha'];
$cp=$_POST['concepto'];
$m=$_POST['monto'];
$t=$_POST['tipo_transaccion'];
$ct=$_POST['clase_transaccion'];
$fp=$_POST['forma_pago'];
$c=$_POST['consecutivo'];

$sql="INSERT into Transacciones (Nit_tercero_t, Fecha_t, Concepto_t, Monto_t, Tipo_Ing_Egr_t, Clase_t, Forma_Pago_t)
values ('$b','$f','$cp','$m','$t','$ct','$fp')";
echo $result=mysqli_query($conexion,$sql);


include 'agregarDatosCuentasCreditos.php';

?>