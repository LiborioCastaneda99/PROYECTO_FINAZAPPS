<?php

include "php/validarSesion.php";

require_once "php/conexion.php";
$conexion=conexion();


$sql_totalIngresos="SELECT DAY(fecha_t) as Fecha, Sum(monto_t) as Total_ingresos
FROM Transacciones
WHERE tipo_ing_egr_t ='Ingreso' and MONTHNAME(fecha_t) LIKE 'November'
GROUP BY fecha_t";
$result_libroFiscalIngresos=mysqli_query($conexion,$sql_totalIngresos);


$sql_totalEgresos="SELECT DAY(fecha_t) as Fecha, Sum(monto_t) as Total_ingresos
FROM Transacciones
WHERE tipo_ing_egr_t ='Egreso' and MONTHNAME(fecha_t) LIKE 'November'
GROUP BY fecha_t";
$result_libroFiscalEgresos=mysqli_query($conexion,$sql_totalEgresos);


?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Libro fiscal | Finazapp</title>

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
</head>

<body>

  <div class="wrapper">
    <!-- Menú de gestión  -->
    <?php include 'php/menu-gestion.php'; ?>

    <!-- Page Content  -->
    <div id="content">
     <!-- navbar  -->
     <?php include 'php/navbar.php'; ?>

     <div class="container text-center">

       <div class="container text-center">
         <div class="container">
           <h4>Libro Fiscal De Saldo</h4>
           <div class="form-group row bg-dark pt-2" style="border-radius:5px;">
             <div class="col-sm ">
               <p class="text-white">Saldo Del Mes Anterior</p>
             </div>
             <div class="col-sm">
              <div class="input-group pb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span>
                </div>
                <input type="text" class="form-control rounded-right text-center" disabled placeholder="123123">
              </div>
            </div>

          </div>
          <h5>Registro Actuales</h5>
          <div class="row bg-dark p-1" style="border-radius:5px;">
            <div class="input-group m-1 mt-1">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <input type="text" class="form-control rounded-right text-center" disabled placeholder="123123">
            </div>

            <div class="input-group m-1 mt-1">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <input type="text" class="form-control rounded-right text-center" disabled placeholder="123123">
            </div>

            <div class="input-group m-1 mt-1">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <input type="text" class="form-control rounded-right text-center" disabled placeholder="123123">
            </div>

          </div>
        </div>
        <div class="table-responsive mt-2 fluid">
         <h5>Registro</h5>
         <table class="table table-hover">
           <thead class="bg-dark text-white text-center">
             <tr>
               <th>No.</th>
               <th>Total De Ingreso</th>
               <th>Total De Egreso</th>
               <th>Total De Saldo</th>
             </tr>
           </thead>
           <tbody class="text-center text-dark bg-ligth">
              <?php 
              while($ver=mysqli_fetch_row($result_libroFiscalIngresos)){
                ?>
                <tr class="small">
                  <td><?php echo $ver[0] ?></td>
                  <td><?php echo $ver[1] ?></td>

                <?php 
              }

              ?>



            </tbody>
          </table>  
        </div>
      </div>
    </div>
  </div>

</div>
</div>
</div>



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
