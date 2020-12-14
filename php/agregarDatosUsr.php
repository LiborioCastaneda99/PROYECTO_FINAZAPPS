
<?php 

require_once "conexion.php";
$conexion=conexion();
$i=$_POST['Identificacion'];
$n=$_POST['Nombre'];
$a=$_POST['Apellido'];
$n_a=$n." ".$a;
$e=$_POST['email'];
$p= password_hash($_POST['pass'], PASSWORD_BCRYPT);

$sql="INSERT into Usuarios ( `Loggin_usr`, `Clave_usr`, `Identificacion_usr`, `Nombre_usr`, `Nivel_usr`)
values ('$e','$p','$i','$n_a','2')";
echo $result=mysqli_query($conexion,$sql);

?>