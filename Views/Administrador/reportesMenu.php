<?php
  // Enlazamos las dependencias necesario
  require_once ("../../Models/conexion.php");
  require_once ("../../Models/consultas.php");
  require_once ("../../Models/seguridadAdministrador.php"); 
  require_once ("../../Controllers/mostrarInfoAdmin.php");    
?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
  data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Reportes Menú - SAR</title>

  <meta name="description" content="">

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="img/sar.png">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

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
  <!-- Helpers -->
  <script src="../sneat/assets/vendor/js/helpers.js"></script>
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../sneat/assets/js/config.js"></script>
</head>

<body>

  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->
        <?php
          include("menu-incru.php");
        ?>
      <!-- / Menu -->

      <div class="layout-page">
        <!-- Navbar -->
          <?php
            include("menu-incru2.php");
          ?>
        <!-- / Navbar -->

        <div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="py-3 mb-4"><span class="text-muted fw-light">Menú /</span> Reportes</h4>
          <h5>Reportes del Menú</h5>
          <p class="mb-4">
            Aquí podras generar un reporte de los platos registrados en el menú.
          </p>

          <div class="col-12 contBotones">
            <div class="card mb-4">
              <div class="card-body">
                <div class="demo-inline-spacing botones">
                  <button type="button" class="btn btn-danger"><a href="../../Reportes/pdfMenu.php"
                    target="_blank">PDF</a></button>
                  <button type="button" class="btn btn-success"><a
                      href="../../Reportes/excelMenu.php">Excel</a></button>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="table-responsive text-nowrap">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Nombres</th>
                    <th>Ingredientes</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Precio</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    cargarMenuReportes();
                  ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->

  <script src="../sneat/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../sneat/assets/vendor/libs/popper/popper.js"></script>
  <script src="../sneat/assets/vendor/js/bootstrap.js"></script>
  <script src="../sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../sneat/assets/vendor/js/menu.js"></script>

  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="../sneat/assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="../sneat/assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="../sneat/assets/js/dashboards-analytics.js"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <!-- Main -->
  <script src="js/Main.js"></script>
</body>

</html>