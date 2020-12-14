<?php 


$sql="UPDATE Cuentas_Creditos SET Saldo_cc = '$restante'
where Consecutivo_t_cc=$tu";
echo $result=mysqli_query($conexion,$sql);

?>