<?php

include "php/validarSesion.php";

require_once "php/conexion.php";
$conexion=conexion();

//Consulta para traer clase de transaccion
$sql_traer_clase_transaccion="SELECT `Cod_clase_t`, descrip_clase_t FROM Clases_Tran";
$result_2=mysqli_query($conexion,$sql_traer_clase_transaccion);

//Consulta para contar el codigo 
$sql_consecutivo="SELECT count(Consecutivo_t) As Consecutivo_t FROM Transacciones";
$result_consecutivo=mysqli_query($conexion,$sql_consecutivo);

while($ver_consecutivo=mysqli_fetch_row($result_consecutivo)):
 ?>
 <?php 
 $contar=1;
 $contar=$contar+$ver_consecutivo[0];
 ?>
<?php endwhile;
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>CONTROL DE DATOS TRANSACCIONES | FINAZAPPS</title>

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
  <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css"><!--CDN de iconos de fontawesome-->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <!--CDN SweetAlert2-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script src="librerias/jquery-3.2.1.min.js"></script>
  <script src="js/funcionesTrans.js"></script>
  <script src="librerias/bootstrap/js/bootstrap.js"></script>
  <script src="librerias/alertifyjs/alertify.js"></script>
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

   <div class="container text-center">
    <div id="buscador"></div>
    <div id="tabla"></div>
  </div>
</div>
</div>


<!-- Modal para edicion de datos-->
<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center">Actualizar Transaccion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form class="form">
          <div class="form-group text-left row">
            <div class="col">
              <label class="text-left">Concepto</label>
              <input type="text" id="conceptoT" class="form form-control">
              <input type="hidden" id="idConsecutivo" class="form form-control">
            </div>
          </div>
          <div class="form-group text-left row">
            <div class="col">
              <label class="text-left">Monto</label>
              <div class="input-group mt-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span>
                </div>
                <input type="number" class="form-control" placeholder="Monto" id="montoT" required>
              </div>
            </div>
          </div>
        </form>
        <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
         <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar</button>
       </div>
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

   <div class="container text-center">
    <div id="buscador"></div>
    <div id="tabla"></div>
  </div>
</div>
</div>


<!-- Modal De Agregar Transacciones-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" id="AgregarTransacciones" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-4">
      <h3 class="modal-title text-center">Agregar Transacciones</h3>
      <form>
        <div class="form-group text-left">
          <label for="text-left">Tipo</label>
          <select required class="form-control form" id="tipo_transaccion" name="tipo_transaccion">
            <option value="0" selected disabled hidden>Tipo De Transacciones</option>
            <option value="Ingreso">Ingreso</option>
            <option value="Egreso">Egreso</option>
          </select>
        </div>
        <div class="form-group text-left">
          <label>Nit</label>
          <div id="select2lista"></div>
        </div>
        <div class="form-group text-left row mt-2">
          <div class="col">
            <label class="text-left">Fecha</label>
            <input type="date" id="fecha" class="form form-control" required>
          </div>
          <div class="col">
            <div class="input-group pt-4 mt-2">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <input type="number" class="form-control" placeholder="Monto" id="monto" required>
            </div>
          </div>
        </div>
        <div class="form-group text-left row">
          <div class="col">
            <label for="text-left">Clase de transacción</label>
            <select id="clase_transaccion" required class="form-control form" disabled onchange="GetClaseTransaccion(this.options[this.selectedIndex].value)">
              <option value="" selected hidden disabled>Selecione La clase</option>
              <?php
              while($ver_clase_transacciones=mysqli_fetch_row($result_2)):
                ?>
                <option value="<?php echo $ver_clase_transacciones[0] ?>" id = "<?php echo $ver_clase_transacciones[0]?>">
                  <?php echo $ver_clase_transacciones[1]?>
                </option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="col">
            <label for="text-left">Forma de pago</label>
            <select required class="form-control" id="forma_pago" disabled onchange="GetFormaDePago(this.options[this.selectedIndex].value)">
              <option value="" selected disabled hidden>Forma de pago</option>
              <option value="Crédito" id="ForCrédito">Crédito</option>
              <option value="Efectivo" id="ForEfectivo">Efectivo</option>
            </select>
          </div>
        </div>
        <div class="form-group text-left">
          <label for="text-left">Concepto</label>
          <input type="text" id="concepto" required class="form form-control" placeholder="Concepto">
          <input type="hidden" id="consecutivo" required="" class="form form-control" disabled="true" value="<?php echo $contar;?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <input type="submit" class="btn btn-success" value="Agregar" data-dismiss="modal" id="guardarnuevo"></input>
        </div>
      </form>
    </div>
  </div>
</div>


<?php else: ?>
  <?php echo "<script>window.location='login.php';</script>"; ?>
<?php endif; ?>

<div class="overlay"></div>


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

<!--Mostrar Formulario para registro de Cuenta Credito-->
<script type="text/javascript">
  $("#tipo_transaccion").change(function () {
    const valor = document.getElementById('tipo_transaccion');
    if (valor.options[valor.selectedIndex].value == 'Ingreso') {
     /*Dependiendo de los elemento que se  tome se colocara la clase "d-none" para ocultar los elementos*/
     /*Se quita el atri disable al select de clase de transacción*/
     $("#clase_transaccion").removeAttr("disabled");
     /*se muestra los elemento dependiendo*/
     /*si es Ingreso se mostrar ventas y otros ingreso*/
     $('#1').addClass('d-none');
     $('#2').addClass('d-none');
     $('#3').removeClass('d-none');
     $('#4').removeClass('d-none');
   }else {
     /*en caso contrario se coloca la clase "d-no" a las otras opcciones*/
     /*es decir , si es egreso saldra compras y gasto*/
     $("#clase_transaccion").removeAttr("disabled");
     $('#1').removeClass('d-none');
     $('#2').removeClass('d-none');
     $('#3').addClass('d-none');
     $('#4').addClass('d-none');
   }
   /*si cambia se hace un "reset" para que no quede seleccionada con una opcion que le corresponda a un tipo de transaccion*/
   /*es decir si cambia si tiene tipo "ingreso" y seleciona ventas o otros ingreso y cambia el tipo a egreso el selectore se reiniciara para que no quede*/
   /*con el elemento que selecciono... si no se entiende pos ni modo pero funciona xddd*/
   $('#clase_transaccion').prop('selectedIndex',0);
   $('#forma_pago').prop('selectedIndex',0);
   $('#buscar_nit').prop('selectedIndex',0);
 });

  /*variables para usar en condicion y mostrar forma de pago*/
  const Valor = document.getElementById('forma_pago');
  const Valor2 = document.getElementById('clase_transaccion');

  /*Usando el evento chang en el select "clase de transaccion" controlo si la opcion "credito" sera visible o no en el selector de forma de pago*/
  $('#clase_transaccion').change(function(){
   $("#forma_pago").removeAttr("disabled");
   /*reinicio el selector "forma de pago"*/
    /* <option id="Clascompra" value="1">compra</option>
     <option id="ClaseGasto" value="2">Gasto</option>
     <option id="ClasVentas" value="3">Ventas</option>
     <option id="Clasotros" value="4 ingreso">otros ingreso</option>*/
     
   });

  $('#forma_pago').change(function(){
    if((Valor2.options[Valor2.selectedIndex].value == 1 || Valor2.options[Valor2.selectedIndex].value == 3 ) && Valor.options[Valor.selectedIndex].value == 'Crédito'){
      $( "#FormCuentaDredito" ).removeClass( "d-none" );
    } else{
      $( "#FormCuentaDredito" ).addClass( "d-none" );
    }
  });
</script>

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


<!--Listas -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#tipo_transaccion').val(0);
    recargarLista();

    $('#tipo_transaccion').change(function(){
      recargarLista();
    });
  })
</script>
<script type="text/javascript">
  function recargarLista(){
    $.ajax({
      type:"POST",
      url:"php/datosSelect.php",
      data:"tipo=" + $('#tipo_transaccion').val(),
      success:function(r){
        $('#select2lista').html(r);
      }
    });
  }
</script>


<!--Traer tabla de transacciones!-->
<script type="text/javascript">
  $(document).ready(function(){
    $('#tabla').load('componentes/tablaTransacciones.php');
    //$('#buscador').load('componentes/buscadorProv.php');
  });
</script>

<!--Enviar datos al php!-->
<script type="text/javascript">
  $(document).ready(function(){
    $('#guardarnuevo').click(function(){
      buscar_nit=$('#buscar_nit').val();
      fecha=$('#fecha').val();    
      concepto=$('#concepto').val();
      monto=$('#monto').val();
      tipo_transaccion=$('#tipo_transaccion').val();
      clase_transaccion=$('#clase_transaccion').val();
      forma_pago=$('#forma_pago').val();
      consecutivo=$('#consecutivo').val();
      agregardatos(buscar_nit,fecha,concepto,monto,tipo_transaccion,clase_transaccion,forma_pago,consecutivo);
    });

        /* var concepto = document.getElementById("concepto").value;
        var monto = document.getElementById("monto").value;
        var Consecutivo = document.getElementById("consecutivo").value;*/

        var guardarnuevo = document.getElementById('guardarnuevo');

        //uso un btn de ejemplo para usar la alerta , pero en tu codigo , donde hace el registro de las cuentas credito lo que 
        //deberas de hacer es que en tu if cuando se agregen los datos y tal usas esta alerta
        guardarnuevo.addEventListener('click',function(){
            //esta es la alerta , puedes usar las comillas especiales para que uses variables.
            if (forma_pago=='Crédito') {
             Swal.fire({
                //existe varios iconos , el info , warning , error ,
                icon: 'warning',
                title: 'Información de su cuenta a crédito',
                  confirmButtonText: 'Cerrar',
                //el texto a informar estaria aqui
                //colocas una partila bien priola y tal.
                text: `Se generó una cuenta crédito por concepto de `+concepto+`, por valor de $`+monto+`. El consecutivo de la cuenta es el No.`+consecutivo+`.`
              });
           }
         });

        $('#actualizadatos').click(function(){
          actualizaDatos();
        });

      });
    </script>


