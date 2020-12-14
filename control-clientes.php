<?php
include "php/validarSesion.php";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>CONTROL DE DATOS CLIENTES | FINAZAPPS</title>

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


  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">

  <script src="librerias/jquery-3.2.1.min.js"></script>
  <script src="js/funcionesClie.js"></script>
  <script src="librerias/bootstrap/js/bootstrap.js"></script>
  <script src="librerias/alertifyjs/alertify.js"></script>
  <script src="librerias/select2/js/select2.js"></script>
</head>

<body>
 <?php $id=$user['id']; if(!empty($user) && ($user['Nivel_usr']=='1')): ?>


 <div class="wrapper">
  <!-- Menú de gestión  -->
  <?php include 'php/menu-gestion.php'; ?>

  <!-- Page Content  -->
  <div id="content">
   <!-- navbar  -->
   <?php include 'php/navbar.php'; ?>

   <div class="container">
    <div id="buscador"></div>
    <div id="tabla"></div>
  </div>
</div>
</div>

<!-- Modal para registros nuevos -->
<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
   <div class="modal-content">
     <div class="modal-header">
      <h5 class="modal-title text-center">Agregar Clientes</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      </button>
    </div>
    <div class="modal-body">
      <form class="form p-2 mt-2">
        <div class="form-group text-left row">
          <div class="col">
            <label>Nit. del Cliente</label>
            <input type="number" id="documento" class="form form-control">
          </div>
        </div>
        <div class="form-group text-left row">
          <div class="col">
            <label class="text-left">Nombre(s)</label>
            <input type="text" id="nombre" class="form form-control">
          </div>
          <div class="col">
            <label class="text-left">Apellido(s)</label>
            <input type="text" id="apellido" class="form form-control">
          </div>
        </div>
        <div class="form-group text-left row">
          <div class="col">
            <label for="text-left">Dirección de domicilio</label>
            <input type="text" id="direccion" class="form form-control">
          </div>
          <div class="col">
            <label for="text-left">Teléfono</label>
            <input type="number" id="telefono" class="form form-control">
          </div>
        </div>
        <div class="form-group text-left">
          <label for="text-left">Correo electrónico</label>
          <input type="email" id="email" class="form form-control">
        </div>
        <div class="form-group text-left">
          <label for="text-left">Observaciones</label>
          <input type="text" id="observacion" class="form form-control">
          <input type="hidden" name="" id="tipo_clie_prov" value="Cliente" class="form form-control">
        </div>
      </form>
    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
     <button type="button" class="btn btn-success" data-dismiss="modal" id="guardarnuevo">
      Agregar
    </button>
  </div>
</div>
</div>
</div>

<!-- Modal para edicion de datos-->
<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center">Actualizar Clientes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

        </button>
      </div>
      <div class="modal-body">
        <form class="form p-2 mt-2">
          <div class="form-group text-left row">
            <div class="col">
              <label>Nit. del Cliente</label>
              <input type="number" id="documentou" class="form form-control">
            </div>
          </div>
          <div class="form-group text-left row">
            <div class="col">
              <label class="text-left">Nombre(s) y Apellido(s)</label>
              <input type="text" id="nombreu" class="form form-control">
            </div>
          </div>
          <div class="form-group text-left row">
            <div class="col">
              <label for="text-left">Dirección de domicilio</label>
              <input type="text" id="direccionu" class="form form-control">
            </div>
            <div class="col">
              <label for="text-left">Teléfono</label>
              <input type="number" id="telefonou" class="form form-control">
            </div>
          </div>
          <div class="form-group text-left">
            <label for="text-left">Correo electrónico</label>
            <input type="email" id="emailu" class="form form-control">
          </div>
          <div class="form-group text-left">
            <label for="text-left">Observaciones</label>
            <input type="text" id="observacionu" class="form form-control">
          </div>
        </form>
        <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
         <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar</button>
       </div>
     </div>
   </div>
 </div>

 <?php elseif(!empty($user) && ($user['Nivel_usr']=='2')): ?>

 <div class="wrapper">
  <!-- Menú de gestión  -->
  <?php include 'php/menu-gestion.php'; ?>

  <!-- Page Content  -->
  <div id="content">
   <!-- navbar  -->
   <?php include 'php/navbar.php'; ?>
   
   <div class="container">
    <div id="buscador"></div>
    <div id="tabla"></div>
  </div>
</div>
</div>


<!-- Modal para registros nuevos -->
<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
   <div class="modal-content">
     <div class="modal-header">
      <h5 class="modal-title text-center">Agregar Clientes</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      </button>
    </div>
    <div class="modal-body">
      <form class="form p-2 mt-2">
        <div class="form-group text-left row">
          <div class="col">
            <label>Nit. del Cliente</label>
            <input type="number" id="documento" class="form form-control">
          </div>
        </div>
        <div class="form-group text-left row">
          <div class="col">
            <label class="text-left">Nombre(s)</label>
            <input type="text" id="nombre" class="form form-control">
          </div>
          <div class="col">
            <label class="text-left">Apellido(s)</label>
            <input type="text" id="apellido" class="form form-control">
          </div>
        </div>
        <div class="form-group text-left row">
          <div class="col">
            <label for="text-left">Dirección de domicilio</label>
            <input type="text" id="direccion" class="form form-control">
          </div>
          <div class="col">
            <label for="text-left">Teléfono</label>
            <input type="number" id="telefono" class="form form-control">
          </div>
        </div>
        <div class="form-group text-left">
          <label for="text-left">Correo electrónico</label>
          <input type="email" id="email" class="form form-control">
        </div>
        <div class="form-group text-left">
          <label for="text-left">Observaciones</label>
          <input type="text" id="observacion" class="form form-control">
          <input type="hidden" name="" id="tipo_clie_prov" value="Cliente" class="form form-control">
        </div>
      </form>
    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
     <button type="button" class="btn btn-success" data-dismiss="modal" id="guardarnuevo">
      Agregar
    </button>
  </div>
</div>
</div>
</div>

<?php else: ?>
  <?php echo "<script>window.location='login.php';</script>"; ?>
<?php endif; ?>
<!-- jQuery CDN - Slim version (=without AJAX) -->


<!-- Bootstrap JS -->
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<script type="text/javascript">
  $(document).ready(function () {
    $("#sidebar").mCustomScrollbar({
      theme: "minimal"
    });

    $('#dismiss, .overlay').on('click', function () {
      $('#sidebar').removeClass('active');
      $('.overlay').removeClass('active');
    });

    $('#sidebarCollapse').on('click', function () {
      $('#sidebar').addClass('active');
      $('.overlay').addClass('active');
      $('.collapse.in').toggleClass('in');
      $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
  });
</script>
</body>

</html>

<script type="text/javascript">
  $(document).ready(function(){
    $('#tabla').load('componentes/tablaClie.php');
    //$('#buscador').load('componentes/buscadorClie.php');
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#guardarnuevo').click(function(){
      documento=$('#documento').val();
      nombre=$('#nombre').val();
      apellido=$('#apellido').val();
      direccion=$('#direccion').val();
      email=$('#email').val();
      telefono=$('#telefono').val();
      tipo_clie_prov=$('#tipo_clie_prov').val();
      observacion=$('#observacion').val();
      agregardatos(documento,nombre,apellido,direccion,email,telefono,tipo_clie_prov,observacion);
    });

    $('#actualizadatos').click(function(){
      actualizaDatos();
    });

  });
</script>