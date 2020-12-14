<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/style-bootstrap.css">
  <!--Css Custom-->
  <link rel="stylesheet" href="css/style.css">
  <title>REGISTRO | FINAZAPPS</title>

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
  <script src="js/funcionesUsr.js"></script>
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
    <div class="form-grop text-center">
      <img src="img/logo.png" alt="Finzapps" weight="100%" height="180px">
    </div>
    <form class="form text-white small">
      <h4 class="text-center">Registrate</h4>
      <div class="form-group">
        <label for="Identificacion" class="font-weight-bold">Identificacion</label>
        <input type="number" class="form-control" name="Identificacion" id="Identificacion" autocomplete="off" required placeholder="Identificacion">
      </div>
      <div class="form-group row">
        <div class="col">
          <label for="Nombre" class="font-weight-bold">Nombre</label>
          <input type="text" class="form-control" name="Nombre" id="Nombre" autocomplete="off" required placeholder="Nombre">
        </div>
        <div class="col">
          <label for="Apellido" class="font-weight-bold">Apellido</label>
          <input type="text" class="form-control" name="Apellido" id="Apellido" autocomplete="off" required placeholder="Apellido">
        </div>
      </div>
      <div class="form-group">
        <label for="email" class="font-weight-bold">Email</label>
        <input type="email" class="form-control" name="email" id="email" autocomplete="off" required placeholder="Email@example.com">
      </div>
      <div class="form-group row">
        <div class="col">
          <label for="pass" class="font-weight-bold">Contraseña</label>
          <input type="password" name="pass" id="pass" class="form-control" autocomplete="off" required placeholder="Password">
        </div>
        <div class="col">
          <label for="pass" class="font-weight-bold">Confirmar Contraseña</label>
          <input type="password" name="pass" id="pass" class="form-control" autocomplete="off" required placeholder="Password">
        </div>
      </div>
      <div class="form-group">
        <button type="button" class="btn w-100 btn-primary" data-dismiss="modal" id="guardarnuevo">
          Crear Cuenta
        </button>
      </div>
    </form>
    <div class="form-group text-white text-center">
      <p>Ya Tienes Una Cuenta ? <a href="login.php">Inicia Sesion</a></p>
    </div>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- jQuery Custom Scroller CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

</body>
</html>


<!--Enviar datos al php!-->
<script type="text/javascript">
  $(document).ready(function(){
    $('#guardarnuevo').click(function(){
      Identificacion=$('#Identificacion').val();
      Nombre=$('#Nombre').val();
      Apellido=$('#Apellido').val();    
      email=$('#email').val();
      pass=$('#pass').val();
      agregardatos(Identificacion,Nombre,Apellido,email,pass);
    });


  });
</script>
