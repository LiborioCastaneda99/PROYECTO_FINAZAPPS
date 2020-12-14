<?php

//[Total de Ingresos en un Rango de fechas]
$FechaInicio=$_POST['FechaInicio'];
$FechaFin=$_POST['FechaFin'];

$sql_totalRangoFechaIngreso="SELECT SUM(Monto_t) AS Total_Ingresos_Rango
FROM Transacciones
WHERE Fecha_t BETWEEN '$FechaInicio' AND '$FechaFin' AND Tipo_Ing_Egr_t = 'Ingreso' ;
";
$result_5=mysqli_query($conexion,$sql_totalRangoFechaIngreso);
while($ver_totalRangoFechaIngreso=mysqli_fetch_row($result_5)){
	$valorTotalRangoFechaIngreso=$ver_totalRangoFechaIngreso[0];
}

//Consulta para mostrar la informacion [Total de Ingresos en un Rango de fechas]
$sql_mostrar_informacion_total_rangos="SELECT Transacciones.Consecutivo_t, Terceros.Nombre, Transacciones.Concepto_t, Transacciones.Monto_t, Transacciones.Tipo_Ing_Egr_t FROM Transacciones, Terceros WHERE Fecha_t BETWEEN '$FechaInicio' AND '$FechaFin' AND Tipo_Ing_Egr_t = 'Ingreso' and Transacciones.Nit_tercero_t=Terceros.Nit_Tercero";
$result_6=mysqli_query($conexion,$sql_mostrar_informacion_total_rangos);

//[Total de Egresos en un Rango de fechas]
$sql_totalRangoFechaEgreso="SELECT SUM(Monto_t) AS Total_Ingresos_Rango
FROM Transacciones
WHERE Fecha_t BETWEEN '$FechaInicio' AND '$FechaFin' AND Tipo_Ing_Egr_t = 'Egreso' ;
";
$result_7=mysqli_query($conexion,$sql_totalRangoFechaEgreso);
while($ver_totalRangoFechaEgreso=mysqli_fetch_row($result_7)){
	$valorTotalRangoFechaEgreso=$ver_totalRangoFechaEgreso[0];
}

//Consulta para mostrar la informacion [Total de Egreso en un Rango de fechas]
$sql_mostrar_informacion_total_egresos="SELECT Transacciones.Consecutivo_t, Terceros.Nombre, Transacciones.Concepto_t, Transacciones.Monto_t, Transacciones.Tipo_Ing_Egr_t FROM Transacciones, Terceros WHERE Fecha_t BETWEEN '$FechaInicio' AND '$FechaFin' AND Tipo_Ing_Egr_t = 'Egreso' and Transacciones.Nit_tercero_t=Terceros.Nit_Tercero";
$result_8=mysqli_query($conexion,$sql_mostrar_informacion_total_egresos);


//[total de Ingresos, Egresos y saldo en un rango de fechas; Por ejemplo del 01/11/2020 al 30/11/2020, o cualquier rango que el cliente especifique]Egresos en un Rango de fechas]
$sql_totalRangoFechaTodas="SELECT Total_Ingresos_Rango, Total_Egresos_Rango, (Total_Ingresos_Rango- Total_Egresos_Rango) AS Saldo
FROM (SELECT SUM(monto_t) AS Total_Ingresos_Rango FROM Transacciones
WHERE Fecha_t BETWEEN '$FechaInicio' AND '$FechaFin' AND Tipo_Ing_Egr_t = 'Ingreso') AS Ingre, (SELECT SUM(monto_t) AS Total_Egresos_Rango FROM Transacciones
WHERE Fecha_t BETWEEN '$FechaInicio' AND '$FechaFin' AND Tipo_Ing_Egr_t = 'Egreso') AS Egre;
";
$result_10=mysqli_query($conexion,$sql_totalRangoFechaTodas);
while($ver_totalRangoFechaTodas=mysqli_fetch_row($result_10)){
	$Total_Ingresos_Rango=$ver_totalRangoFechaTodas[0];
	$Total_Egresos_Rango=$ver_totalRangoFechaTodas[1];
	$Saldo=$ver_totalRangoFechaTodas[2];
}

//Consulta para mostrar la informacion {total de Ingresos, Egresos y saldo en un rango de fechas; Por ejemplo del 01/11/2020 al 30/11/2020, o cualquier rango que el cliente especifique]Egresos en un Rango de fechas]
$sql_totalRangoFechaTodasTotales="SELECT Transacciones.Consecutivo_t, Terceros.Nombre, Transacciones.Concepto_t, Transacciones.Monto_t, Transacciones.Tipo_Ing_Egr_t FROM Transacciones, Terceros WHERE Fecha_t BETWEEN '$FechaInicio' AND '$FechaFin' AND Tipo_Ing_Egr_t = 'Ingreso' and Transacciones.Nit_tercero_t=Terceros.Nit_Tercero 
UNION ALL 
SELECT Transacciones.Consecutivo_t, Terceros.Nombre, Transacciones.Concepto_t, Transacciones.Monto_t, Transacciones.Tipo_Ing_Egr_t FROM Transacciones, Terceros WHERE Fecha_t BETWEEN '$FechaInicio' AND '$FechaFin' AND Tipo_Ing_Egr_t = 'Egreso' and Transacciones.Nit_tercero_t=Terceros.Nit_Tercero;
";
$result_11=mysqli_query($conexion,$sql_totalRangoFechaTodasTotales);

