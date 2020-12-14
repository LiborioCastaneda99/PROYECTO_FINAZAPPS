<?php 
if ($fp=='Crédito' && $t=='Ingreso') {
$sql_credito="INSERT into Cuentas_Creditos (Consecutivo_t_cc, Saldo_cc, Tipo_cc, Estado_cc)
values ('$c','$m','Por Cobrar','Activa')";
echo $result_credito=mysqli_query($conexion,$sql_credito);


}elseif ($fp=='Crédito' && $t=='Egreso') {
$sql_credito="INSERT into Cuentas_Creditos (Consecutivo_t_cc, Saldo_cc, Tipo_cc, Estado_cc)
values ('$c','$m','Por Pagar','Activa')";
echo $result_credito=mysqli_query($conexion,$sql_credito);
}