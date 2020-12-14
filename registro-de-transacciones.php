<?php
include "php/validarSesion.php";


require_once "php/conexion.php";
$conexion=conexion();

include 'php/consultasRegistroTransacciones.php';

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>TOTAL POR RANGOS DE FECHAS | FINAZAPPS</title>

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
            width:100%;
            height:400px;
        }
        .chart {
          width: 100%;
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
            echo "['Ingresos', ".$Total_Ingresos_Rango."],
            ['Egresos', ".$Total_Egresos_Rango."],";
            ?>
            ]);

        var options = {
          title: 'Informe estadistico financiero, totales de ingresos e ingresos a partir de un rango de fechas.',
          width: '100%',
          height: '400px'
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

        <h3>[Total de Ingresos en un Rango de fechas]</h3>
        <h4><?php if (is_null($FechaInicio)) {
        }else{
            echo $FechaInicio.' - '.$FechaFin;
        } ?></h4>
        <form action="registro-de-transacciones.php" method="POST">
            <div class="row pb-2 text-left">
                <div class="col-md-6">
                    <label for="">Fecha Inicio</label>
                    <input type="date" class="form-control" id="FechaInicio" name="FechaInicio">
                </div>
                <div class="col-md-6">
                    <label for="">Fecha Fin</label>
                    <input type="date" class="form-control" id="FechaFin" name="FechaFin">
                </div> 
                <div class="col-md-12">
                 <input type="submit" class="w-100 btn btn-success" value="Realizar consulta" name="">
             </div>
         </div>
     </form>
     <div class="table-responsive  small table-wrapper-scroll-y my-custom-scrollbar mb-4">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Consecutivo</th>
                    <th>Tercero</th>
                    <th>Concepto</th>
                    <th>Monto</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($ver_mostrar_informacion_rango=mysqli_fetch_row($result_6)):?>
                    <tr>
                        <td><?php echo $ver_mostrar_informacion_rango[0]?></td>
                        <td><?php echo $ver_mostrar_informacion_rango[1]?></td>
                        <td><?php echo $ver_mostrar_informacion_rango[2]?></td>
                        <td><?php echo '$'.$ver_mostrar_informacion_rango[3]?></td>
                        <td><?php echo $ver_mostrar_informacion_rango[4]?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <div class="container mb-4">
        <div class="row bg-dark p-2 text-white" style="border-radius: 5px;">
            <h5 class="col-sm">Total Generado</h5> 
            <input type="text" id="" name="" class="form-control col-sm text-center" readonly value="<?php if($valorTotalRangoFechaIngreso<='0'){
                echo '$0';
                }else {
                    echo '$'.$valorTotalRangoFechaIngreso;
                }?>">
            </div>
        </div>

        <hr>
        <h3>[Total de Egresos en un Rango de fechas]</h3>
        <div class="table-responsive  small table-wrapper-scroll-y my-custom-scrollbar mb-4">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Consecutivo</th>
                        <th>Tercero</th>
                        <th>Concepto</th>
                        <th>Monto</th>
                        <th>Tipo</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                   while($ver_mostrar_informacion_rangoEgreso=mysqli_fetch_row($result_8)):?>
                    <tr>
                        <td><?php echo $ver_mostrar_informacion_rangoEgreso[0]?></td>
                        <td><?php echo $ver_mostrar_informacion_rangoEgreso[1]?></td>
                        <td><?php echo $ver_mostrar_informacion_rangoEgreso[2]?></td>
                        <td><?php echo '$'.$ver_mostrar_informacion_rangoEgreso[3]?></td>
                        <td><?php echo $ver_mostrar_informacion_rangoEgreso[4]?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <div class="container mb-4">
        <div class="row bg-dark p-2 text-white" style="border-radius: 5px;">
            <h5 class="col-sm">Total Generado</h5>  
            <input type="text" id="" name="" class="form-control col-sm text-center" readonly value="<?php if($valorTotalRangoFechaEgreso<='0'){
                echo '$0';
                }else {
                    echo '$'.$valorTotalRangoFechaEgreso;
                }?>">
            </div>
        </div>

        <hr>
        <h3>[total de Ingresos, Egresos y saldo en un rango de fechas]</h3>
        <div class="table-responsive  small table-wrapper-scroll-y my-custom-scrollbar mb-4">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Consecutivo</th>
                        <th>Tercero</th>
                        <th>Concepto</th>
                        <th>Monto</th>
                        <th>Tipo</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                  while($ver_mostrar_informacion_rangoTodas=mysqli_fetch_row($result_11)):?>
                    <tr>
                        <td><?php echo $ver_mostrar_informacion_rangoTodas[0]?></td>
                        <td><?php echo $ver_mostrar_informacion_rangoTodas[1]?></td>
                        <td><?php echo $ver_mostrar_informacion_rangoTodas[2]?></td>
                        <td><?php echo '$'.$ver_mostrar_informacion_rangoTodas[3]?></td>
                        <td><?php echo $ver_mostrar_informacion_rangoTodas[4]?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <div class="container mb-4">
        <div class="row bg-dark p-2 text-white" style="border-radius: 5px;">
            <div class="col-md-4">
               <input type="text" id="" name="" class="form-control col-sm text-center" readonly value="<?php if($Total_Ingresos_Rango<='0'){
                echo '$0';
                }else {
                    echo '$'.$Total_Ingresos_Rango;
                }?>">
                <h5 class="col-sm">Total Ingreso</h5> 
            </div>   
            <div class="col-md-4">
               <input type="text" id="" name="" class="form-control col-sm text-center" readonly value="<?php if($Total_Egresos_Rango<='0'){
                echo '$0';
                }else {
                    echo '$'.$Total_Egresos_Rango;
                }?>">
                <h5 class="col-sm">Total Egreso</h5> 
            </div>
            <div class="col-md-4">
               <input type="text" id="" name="" class="form-control col-sm text-center" readonly value="<?php if($Saldo<='0'){
                echo '$'.$Saldo;
                }else {
                    echo '$'.$Saldo;
                }?>">
                <h5 class="col-sm">Saldo</h5> 
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12">
        <div id="piechart" class="chart"></div>
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