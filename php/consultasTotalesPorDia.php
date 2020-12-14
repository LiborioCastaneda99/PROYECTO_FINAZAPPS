<?php

//[Total de Ingresos en un Rango de fechas]
$FechaDia=$_POST['FechaDia'];

$sql_totalRangoFechaIngreso="SELECT SUM(Monto_t) AS Total_Ingresos_Dia
FROM Transacciones
WHERE Tipo_Ing_Egr_t = 'Ingreso' AND fecha_t = '$FechaDia';
";
$result_5=mysqli_query($conexion,$sql_totalRangoFechaIngreso);
while($ver_Total_Ingresos_Dia=mysqli_fetch_row($result_5)){
	$valorTotal_Ingresos_Dia=$ver_Total_Ingresos_Dia[0];
}

//Consulta para mostrar la informacion [Total de Ingresos en un Rango de fechas]
$sql_mostrar_informacion_total_rangos="SELECT Transacciones.Consecutivo_t, Terceros.Nombre, Transacciones.Concepto_t, Transacciones.Monto_t, Transacciones.Tipo_Ing_Egr_t FROM Transacciones, Terceros WHERE Tipo_Ing_Egr_t = 'Ingreso' AND Fecha_t = '$FechaDia' and Transacciones.Nit_tercero_t=Terceros.Nit_Tercero";
$result_6=mysqli_query($conexion,$sql_mostrar_informacion_total_rangos);


$sql_totalRangoFechaEgresos="SELECT SUM(Monto_t) AS Total_Ingresos_Dia
FROM Transacciones
WHERE Tipo_Ing_Egr_t = 'Egreso' AND Fecha_t = '$FechaDia';
";
$result_7=mysqli_query($conexion,$sql_totalRangoFechaEgresos);
while($ver_Total_Egresos_Dia=mysqli_fetch_row($result_7)){
	$valorTotal_Egresos_Dia=$ver_Total_Egresos_Dia[0];
}

//Consulta para mostrar la informacion [Total de Ingresos en un Rango de fechas]
$sql_mostrar_informacion_total_egresos="SELECT Transacciones.Consecutivo_t, Terceros.Nombre, Transacciones.Concepto_t, Transacciones.Monto_t, Transacciones.Tipo_Ing_Egr_t FROM Transacciones, Terceros WHERE Tipo_Ing_Egr_t = 'Egreso' AND Fecha_t = '$FechaDia' and Transacciones.Nit_tercero_t=Terceros.Nit_Tercero";
$result_8=mysqli_query($conexion,$sql_mostrar_informacion_total_egresos);



//[Total de Ingresos dia]
$FechaMes=$_POST['txtMes'];

$sql_totalMes="SELECT Fecha_t, SUM(Monto_t) AS Total_Ingresos_Dia FROM Transacciones WHERE MONTH(Fecha_t) = $FechaMes AND YEAR(Fecha_t) = 2020 AND `Tipo_Ing_Egr_t` = 'Ingreso'";
$result_mesIngreso=mysqli_query($conexion,$sql_totalMes);
while($ver_totalMesIngreso=mysqli_fetch_row($result_mesIngreso)){
	$totalFecha=$ver_totalMesIngreso[0];
	$totalMesIngreso=$ver_totalMesIngreso[1];
}

$sql_totalMesEgresos="SELECT SUM(Monto_t) AS Total_Egresos_Dia FROM Transacciones WHERE MONTH(Fecha_t) = $FechaMes AND YEAR(Fecha_t) = 2020 AND `Tipo_Ing_Egr_t` = 'Egreso'";
$result_mesEgresos=mysqli_query($conexion,$sql_totalMesEgresos);
while($ver_totalMesEgresos=mysqli_fetch_row($result_mesEgresos)){
	$totalMesEgresos=$ver_totalMesEgresos[0];
}