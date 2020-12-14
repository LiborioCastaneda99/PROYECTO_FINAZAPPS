<?php 


$sql="UPDATE Cuentas_Creditos SET Estado_cc = 'Pagada'
where Consecutivo_t_cc=$tu";
echo $result=mysqli_query($conexion,$sql);

?>