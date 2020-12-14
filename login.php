<?php
include "php/validarSesion.php";

if (isset($_SESSION['user_id'])) {
  header('Location: micuenta.php');
}

if (!empty($_POST['txtCorreo']) && !empty($_POST['password'])) {
  $records = $conn->prepare('SELECT `id`, `Loggin_usr`, `Clave_usr`, `Identificacion_usr`, `Nombre_usr`, `Nivel_usr` FROM Usuarios WHERE Loggin_usr = :txtCorreo');
  $records->bindParam(':txtCorreo', $_POST['txtCorreo']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $message = '';

  if (count($results) > 0 && password_verify($_POST['password'], $results['Clave_usr'])) {
    $_SESSION['user_id'] = $results['id'];
    header("Location: micuenta.php");
} else {
 echo "<script>alert('Lo sentimos, su correo o contraseña son erroneos, por favor verifique nuevamente su información y accede al aplicativo.');window.location='login.php';</script>";    
}
}


require_once "php/conexion.php";
$conexion=conexion();


$sql_totalAdministrador="SELECT COUNT(Nivel_usr) FROM `Usuarios` WHERE Nivel_usr='1'";
$result_totalAdministrador=mysqli_query($conexion,$sql_totalAdministrador);

?>

<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>INICIAR SESIÓN | FINAZAPPS</title>

    <link rel="icon" type="image/png" href="img/logo-icon.png">
    <!--Fuentes de letra de google-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">

    <script src="librerias/jquery-3.2.1.min.js"></script>
    <script src="js/funcionesTrans.js"></script>
    <script src="librerias/bootstrap/js/bootstrap.js"></script>
    <script src="librerias/alertifyjs/alertify.js"></script>
    <style type="text/css">
      .form-control , .form-control:focus{
        outline:none !important;
        outline-width: 1 !important;
        box-shadow: none;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;

        background:rgb(6, 33, 80);

        border:none;
        border-top: 0px;
        border-left: 0px;
        border-right: 0px;
        border-bottom: 2px solid #fff;
        color:white;
    }

    .form-control::placeholder{
        color:white;
    }
</style>
</head>
<body style="background:rgb(6, 33, 80);">
    <div class="container">
        <div class="form-grop text-center mb-4 mt-4">
            <img src="img/logo.png" alt="Finzapps" weight="100%">
        </div>
        <form class="form text-white" action="login.php" method="POST">
            <div class="form-group mb-4">
                <label for="email" class="font-weight-bold">Email</label>
                <input type="email" class="form-control" name="txtCorreo" id="email" autocomplete="off" required placeholder="Email@example.com">
            </div>
            <div class="form-group mb-4">
                <label for="pass" class="font-weight-bold">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" autocomplete="off" required placeholder="Password">
            </div>
            <div class="form-group">
                <input type="submit" value="Iniciar Sesion" class="btn w-100 btn-primary">
            </div>
        </form>
        <?php 
        while($ver=mysqli_fetch_row($result_totalAdministrador)){
            ?>
            <?php if ($ver[0]>=1): ?>
                <div class="form-group text-center text-white">
                    <p>¿Aún No Tienes Cuenta? <a href="registro.php">Registrate</a></p>
                </div>
            <?php endif ?>
            <?php 
        }
        ?>
    </div>


    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

</body>
</html>