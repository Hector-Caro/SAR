<?php
// Enlazamos las dependencias necesario
require_once("../../Models/conexion.php");
require_once("../../Models/consultas.php");
require_once("../../Models/seguridadUsuario.php");
require_once("../../Controllers/mostrarInfoUser.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Mi Cuenta </title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="img/sar.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="../sneat/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../sneat/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../sneat/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../sneat/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../sneat/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/spinner.css">
    <!-- Helpers -->
    <script src="../sneat/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../sneat/assets/js/config.js"></script>
  </head>

<body>

  <section style="background-color: #eee;">
    <div class="container py-5" style="max-width:1200px ">
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="./homeUser.php">Inicio</a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="./perfilUser.php">Mi Cuenta</a></li>
            </ol>
          </nav>
        </div>
      </div>

      <?php
      perfilUser();
      ?>

    </div>
    </div>


  </section>
  <?php
    include("menu-incru-user.php");
  ?>




  <!-- Common -->
  <script src="../dashboard/js/lib/jquery.min.js"></script>
  <script src="../dashboard/js/lib/jquery.nanoscroller.min.js"></script>
  <script src="../dashboard/js/lib/menubar/sidebar.js"></script>
  <script src="../dashboard/js/lib/preloader/pace.min.js"></script>
  <script src="../dashboard/js/lib/bootstrap.min.js"></script>
  <script src="../dashboard/js/scripts.js"></script>

  <!-- Calender -->
  <script src="../dashboard/js/lib/jquery-ui/jquery-ui.min.js"></script>
  <script src="../dashboard/js/lib/moment/moment.js"></script>
  <script src="../dashboard/js/lib/calendar/fullcalendar.min.js"></script>
  <script src="../dashboard/js/lib/calendar/fullcalendar-init.js"></script>

  <!--  Flot Chart -->
  <script src="../dashboard/js/lib/flot-chart/excanvas.min.js"></script>
  <script src="../dashboard/js/lib/flot-chart/jquery.flot.js"></script>
  <script src="../dashboard/js/lib/flot-chart/jquery.flot.pie.js"></script>
  <script src="../dashboard/js/lib/flot-chart/jquery.flot.time.js"></script>
  <script src="../dashboard/js/lib/flot-chart/jquery.flot.stack.js"></script>
  <script src="../dashboard/js/lib/flot-chart/jquery.flot.resize.js"></script>
  <script src="../dashboard/js/lib/flot-chart/jquery.flot.crosshair.js"></script>
  <script src="../dashboard/js/lib/flot-chart/curvedLines.js"></script>
  <script src="../dashboard/js/lib/flot-chart/flot-tooltip/jquery.flot.tooltip.min.js"></script>
  <script src="../dashboard/js/lib/flot-chart/flot-chart-init.js"></script>
  <!--  Chartist -->
  <script src="../dashboard/js/lib/chartist/chartist.min.js"></script>
  <script src="../dashboard/js/lib/chartist/chartist-plugin-tooltip.min.js"></script>
  <script src="../dashboard/js/lib/chartist/chartist-init.js"></script>

  <!--  Chartjs -->
  <script src="../dashboard/js/lib/chart-../dashboard/js/Chart.bundle.js"></script>
  <script src="../dashboard/js/lib/chart-../dashboard/js/chartjs-init.js"></script>

  <!--  Knob -->
  <script src="../dashboard/js/lib/knob/jquery.knob.min.js "></script>
  <script src="../dashboard/js/lib/knob/knob.init.js "></script>

  <!--  Morris -->
  <script src="../dashboard/js/lib/morris-chart/raphael-min.js"></script>
  <script src="../dashboard/js/lib/morris-chart/morris.js"></script>
  <script src="../dashboard/js/lib/morris-chart/morris-init.js"></script>

  <!--  Peity -->
  <script src="../dashboard/js/lib/peitychart/jquery.peity.min.js"></script>
  <script src="../dashboard/js/lib/peitychart/peitychart.init.js"></script>

  <!--  Sparkline -->
  <script src="../dashboard/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
  <script src="../dashboard/js/lib/sparklinechart/sparkline.init.js"></script>

  <!-- Select2 -->
  <script src="../dashboard/js/lib/select2/select2.full.min.js"></script>

  <!--  Validation -->
  <script src="../dashboard/js/lib/form-validation/jquery.validate.min.js"></script>
  <script src="../dashboard/js/lib/form-validation/jquery.validate-init.js"></script>

  <!--  Circle Progress -->
  <script src="../dashboard/js/lib/circle-progress/circle-progress.min.js"></script>
  <script src="../dashboard/js/lib/circle-progress/circle-progress-init.js"></script>
  <!--  Vector Map -->
  <script src="../dashboard/js/lib/vector-map/jquery.vmap.js"></script>
  <script src="../dashboard/js/lib/vector-map/jquery.vmap.min.js"></script>
  <script src="../dashboard/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
  <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.world.js"></script>
  <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.algeria.js"></script>
  <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.argentina.js"></script>
  <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.brazil.js"></script>
  <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.france.js"></script>
  <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.germany.js"></script>
  <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.greece.js"></script>
  <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.iran.js"></script>
  <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.iraq.js"></script>
  <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.russia.js"></script>
  <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.tunisia.js"></script>
  <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.europe.js"></script>
  <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.usa.js"></script>

  <!--  Simple Weather -->
  <script src="../dashboard/js/lib/weather/jquery.simpleWeather.min.js"></script>
  <script src="../dashboard/js/lib/weather/weather-init.js"></script>

  <!--  Owl Carousel -->
  <script src="../dashboard/js/lib/owl-carousel/owl.carousel.min.js"></script>
  <script src="../dashboard/js/lib/owl-carousel/owl.carousel-init.js"></script>

  <!--  Calender 2 -->
  <script src="../dashboard/js/lib/calendar-2/moment.latest.min.js"></script>
  <script src="../dashboard/js/lib/calendar-2/pignose.calendar.min.js"></script>
  <script src="../dashboard/js/lib/calendar-2/pignose.init.js"></script>


  <!-- Datatable -->
  <script src="../dashboard/js/lib/data-table/datatables.min.js"></script>
  <script src="../dashboard/js/lib/data-table/buttons.dataTables.min.js"></script>
  <script src="../dashboard/js/lib/data-table/dataTables.buttons.min.js"></script>
  <script src="../dashboard/js/lib/data-table/buttons.flash.min.js"></script>
  <script src="../dashboard/js/lib/data-table/jszip.min.js"></script>
  <script src="../dashboard/js/lib/data-table/pdfmake.min.js"></script>
  <script src="../dashboard/js/lib/data-table/vfs_fonts.js"></script>
  <script src="../dashboard/js/lib/data-table/buttons.html5.min.js"></script>
  <script src="../dashboard/js/lib/data-table/buttons.print.min.js"></script>
  <script src="../dashboard/js/lib/data-table/datatables-init.js"></script>

  <!-- JS Grid -->
  <script src="../dashboard/js/lib/jsgrid/db.js"></script>
  <script src="../dashboard/js/lib/jsgrid/jsgrid.core.js"></script>
  <script src="../dashboard/js/lib/jsgrid/jsgrid.load-indicator.js"></script>
  <script src="../dashboard/js/lib/jsgrid/jsgrid.load-strategies.js"></script>
  <script src="../dashboard/js/lib/jsgrid/jsgrid.sort-strategies.js"></script>
  <script src="../dashboard/js/lib/jsgrid/jsgrid.field.js"></script>
  <script src="../dashboard/js/lib/jsgrid/fields/jsgrid.field.text.js"></script>
  <script src="../dashboard/js/lib/jsgrid/fields/jsgrid.field.number.js"></script>
  <script src="../dashboard/js/lib/jsgrid/fields/jsgrid.field.select.js"></script>
  <script src="../dashboard/js/lib/jsgrid/fields/jsgrid.field.checkbox.js"></script>
  <script src="../dashboard/js/lib/jsgrid/fields/jsgrid.field.control.js"></script>
  <script src="../dashboard/js/lib/jsgrid/jsgrid-init.js"></script>

  <!--  Datamap -->
  <script src="../dashboard/js/lib/datamap/d3.min.js"></script>
  <script src="../dashboard/js/lib/datamap/topojson.js"></script>
  <script src="../dashboard/js/lib/datamap/datamaps.world.min.js"></script>
  <script src="../dashboard/js/lib/datamap/datamap-init.js"></script>

  <!--  Nestable -->
  <script src="../dashboard/js/lib/nestable/jquery.nestable.js"></script>
  <script src="../dashboard/js/lib/nestable/nestable.init.js"></script>

  <!--ION Range Slider JS-->
  <script src="../dashboard/js/lib/rangeSlider/ion.rangeSlider.min.js"></script>
  <script src="../dashboard/js/lib/rangeSlider/moment.js"></script>
  <script src="../dashboard/js/lib/rangeSlider/moment-with-locales.js"></script>
  <script src="../dashboard/js/lib/rangeSlider/rangeslider.init.js"></script>

  <!-- Bar Rating-->
  <script src="../dashboard/js/lib/barRating/jquery.barrating.js"></script>
  <script src="../dashboard/js/lib/barRating/barRating.init.js"></script>

  <!-- jRate -->
  <script src="../dashboard/js/lib/rating1/jRate.min.js"></script>
  <script src="../dashboard/js/lib/rating1/jRate.init.js"></script>

  <!-- Sweet Alert -->
  <script src="../dashboard/js/lib/sweetalert/sweetalert.min.js"></script>
  <script src="../dashboard/js/lib/sweetalert/sweetalert.init.js"></script>

  <!-- Toastr -->
  <script src="../dashboard/js/lib/toastr/toastr.min.js"></script>
  <script src="../dashboard/js/lib/toastr/toastr.init.js"></script>





























  <!--  Dashboard 1 -->
  <script src="js/dashboard1.js"></script>
  <script src="js/dashboard2.js"></script>

</body>

</html>