
<?php
include "php/validarSesion.php";


require_once "php/conexion.php";
$conexion=conexion();

include 'php/consultasTotalesPorDia.php';

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Comparativo Mensual De Sueldo  | FINAZAPPS</title>

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
  <style>
    .my-custom-scrollbar {
      position: relative;
      height: 200px;
      overflow: auto;
    }
    .table-wrapper-scroll-y {
      display: block;
    }
    #chart_wrap {
      position: relative;
      padding-bottom: 40%;
      height: 0;
      overflow:hidden;


    }

    #piechart {
      position: absolute;
      top: 0;
      width:80%;
      height:390px;

    }
    .chart {
      width: 80%;
      min-height: 450px;
    }

    .row {
      margin: 0 !important;
    }
  </style>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Estado', 'Valor'],  <?php
        echo "['Ingresos', ".$totalMesIngreso."],
        ['Egresos', ".$totalMesEgresos."],";
        ?>
        ]);

      var options = {
        width: '80%',
        height: '390px',
        backgroundColor :'transparent',
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }

    $(window).resize(function(){
      drawChart();
    });
  </script>

  <script src='https://www.google.com/jsapi'></script>
</head>

<body>

 <?php $id=$user['id']; if(!empty($user) && ($user['Nivel_usr']=='1') OR ($user['Nivel_usr']=='2')): ?>

 <div class="wrapper">
  <!-- Menú de gestión  -->
  <?php include 'php/menu-gestion.php'; ?>

  <!-- Page Content  -->
  <div id="content">
   <!-- navbar  -->
   <?php include 'php/navbar.php'; ?>

   <div class="container text-center">

    <h3>[Comparativo mensual de saldo]</h3>
    <form action="informe-estadistico-mensual-de-saldo.php" method="POST">
      <div class="row">
        <div class="col-md-4 text-center"  style="margin: 0px auto;">
          <label class="">Comparativo del mes de <?php
          $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
          $mes = substr($totalFecha, 5, -3);
          if ($mes <= 12) {
            echo $meses[$mes - 1];
          }
          else{
            echo "Solo existen 12 meses hay un error en el formato de tu fecha: ".$totalFecha;
          }
          ?></label>
          <select  class="form-control" name="txtMes" required="">    
            <option selected="true" value="<?php echo $FechaMes;?>"><?php
            $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
            $mes = substr($totalFecha, 5, -3);
            if ($mes <= 12) {
              echo $meses[$mes - 1];
            }
            else{
              echo "Solo existen 12 meses hay un error en el formato de tu fecha: ".$totalFecha;
            }
            ?></option>
            <option value="1">Enero</option>
            <option value="2">Febrero</option>
            <option value="3">Marzo</option>
            <option value="4">Abril</option>
            <option value="5">Mayo</option>
            <option value="6">Junio</option>
            <option value="7">Julio</option>
            <option value="8">Agosto</option>
            <option value="9">Septiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 text-center"  style="margin: 0px auto;">
         <input type="submit" class="w-100 btn btn-success" value="Realizar consulta" name="">
       </div>
     </div>
   </form>

   <div class="table-responsive  small mb-4">
    <table class="table table-hover table-bordered" style="width: 80%; margin: 0px auto;">
      <thead class="bg-dark p-2 text-white">
        <tr class="text-center">
          <th>Total Ingresos</th>
          <th>Total Egresos</th>
          <th>Saldo</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-center">$<?php echo $totalMesIngreso; ?></td>
          <td class="text-center">$<?php echo $totalMesEgresos; ?></td>
          <td class="text-center">$<?php echo ($totalMesIngreso-$totalMesEgresos); ?></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="clearfix"></div>
  <div class="col-md-12" style="left: 8.5%; ">
    <div id="piechart" class="chart" class="border border-primary"></div>
  </div>
</div>
</div>
</div>



<?php else: ?>
  <?php echo "<script>window.location='login.php';</script>"; ?>
<?php endif; ?>

<div class="overlay"></div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
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