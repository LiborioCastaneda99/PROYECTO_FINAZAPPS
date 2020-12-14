<?php
include "php/validarSesion.php";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>CONTROL DE PAGOS DE CUENTAS | FINAZAPPS</title>

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
  <script src="js/funcionesPagos.js"></script>
  <script src="librerias/bootstrap/js/bootstrap.js"></script>
  <script src="librerias/alertifyjs/alertify.js"></script>

  <style>
  .my-custom-scrollbar {
    position: relative;
    height: 350px;
    overflow: auto;
  }

  .table-wrapper-scroll-y {
  display: block;
  }
  </style>
</head>

<body>

<?php  if(!empty($user) && ($user['Nivel_usr']=='1') OR ($user['Nivel_usr']=='2')): ?>
  <div class="wrapper">
    <!-- Menú de gestión  -->
    <?php include 'php/menu-gestion.php'; ?>

    <!-- Page Content  -->
    <div id="content">
     <!-- navbar  -->
     <?php include 'php/navbar.php'; ?>

     <div class="container text-center">
      <h1>Pagos</h1>
      <div class="form-group">
        <form>
          <select name="SelecionarTipoTercero" id="SelecionarTipoTercero" class="form-control">
            <option value="0" selected disabled hidden>Seleciona el tercero</option>
            <option value="Cliente">Cliente</option>
            <option value="Proveedor">Proveedor</option>
          </select>
        </form>
      </div>
      <div class="table-responsive">
        <div id="tableLista"></div>
      </div>


  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="AgregarPago" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form class="form">
                <div class="form-group row">
                    <div class="col-sm mb-3">
                        <input type="number" name="" id="consecutivoU" placeholder="id" class="form-control" disabled="">
                        <input type="hidden" name="" id="transaccionU" placeholder="id" class="form-control" disabled="">
                        <input type="hidden" name="" id="saldoU" placeholder="id" class="form-control" disabled="">
                    </div>
                    <div class="col-sm">
                        <input type="number" name="" id="valorAbono" placeholder="Valor a descontar debe ser menor o total" class="form-control" min="0">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm mb-3">
                        <input type="text" name="" id="concepto" class="form-control" placeholder="Concepto">
                    </div>
                    <div class="col-sm">
                        <input type="text" name="" id="responsable" class="form-control" placeholder="Responsable">
                    </div>
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" data-dismiss="modal" id="guardarnuevo" class="btn btn-warning">Confirmar</button>
      </div>
    </div> 
  </div>
</div>



<div class="overlay"></div>


<?php else: ?>
  <?php echo "<script>window.location='login.php';</script>"; ?>
<?php endif; ?>

<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<script type="text/javascript">
$('#SelecionarTipoTercero').change(function(){
  $('#btnNewPago').removeAttr('disabled');
});

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


<!--Listas -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#SelecionarTipoTercero').val(0);
    recargarLista();

    $('#SelecionarTipoTercero').change(function(){
      recargarLista();
    });
  })
</script>
<script type="text/javascript">
  function recargarLista(){
    $.ajax({
      type:"POST",
      url:"php/datosSelectPagos.php",
      data:"tipoTercero=" + $('#SelecionarTipoTercero').val(),
      success:function(r){
        $('#tableLista').html(r);
      }
    });
  }
</script>


<script type="text/javascript">
  $(document).ready(function(){
    $('#table').load('control-pagos-cuentas.php');
    //$('#buscador').load('componentes/buscadorClie.php');
  });
</script>

<!--Enviar datos al php!-->
<script type="text/javascript">
  $(document).ready(function(){
    $('#guardarnuevo').click(function(){
      consecutivoU=$('#consecutivoU').val();
      valorAbono=$('#valorAbono').val();    
      concepto=$('#concepto').val();
      responsable=$('#responsable').val();
      transaccionU=$('#transaccionU').val();
      saldoU=$('#saldoU').val();
      agregardatos(consecutivoU,valorAbono,concepto, responsable,transaccionU,saldoU);
    });

    $('#actualizadatos').click(function(){
      actualizaDatos();
    });

  });
</script>


