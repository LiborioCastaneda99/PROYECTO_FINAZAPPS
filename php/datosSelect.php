<?php
require_once "conexion.php";
$conexion=conexion();

$tipo=$_POST['tipo'];


if ($tipo=='Ingreso') {
	$sql="SELECT `Nit_Tercero`, `Nombre`, `Direccion`, `Telefono`, `Correo`, `Tipo_Cli_Prov`, `Observaciones` FROM Terceros WHERE Tipo_Cli_Prov='Cliente'";

	$result=mysqli_query($conexion,$sql);

	$cadena="
	<select id='buscar_nit' name='buscar_nit' class='form form-control'>
	<option value='0'>Seleccione</option>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.$ver[0].' -> '.$ver[1].'</option>';
	}

	echo  $cadena."</select>";
}elseif ($tipo=='Egreso') {

	$sql="SELECT `Nit_Tercero`, `Nombre`, `Direccion`, `Telefono`, `Correo`, `Tipo_Cli_Prov`, `Observaciones` FROM Terceros WHERE Tipo_Cli_Prov='Proveedor'";

	$result=mysqli_query($conexion,$sql);

	$cadena="
	<select id='buscar_nit' name='buscar_nit' class='form form-control'>
	<option value='0'>Seleccione</option>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.$ver[0].' -> '.$ver[1].'</option>';
	}

	echo  $cadena."</select>";
}



?>