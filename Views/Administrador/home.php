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

  <title>Inicio - SAR</title>

  <meta name="description" content="" />

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
  <link rel="stylesheet" href="css/spinner.css">
  <!-- Helpers -->
  <script src="../sneat/assets/vendor/js/helpers.js"></script>
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../sneat/assets/js/config.js"></script>
</head>

<body>
  <!-- Spinner -->
    <div id="wrapper">
      <span class="punto"></span>
    </div>
  <!-- / Spinner -->

  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->
      <?php
          include("menu-incru.php");
        ?>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <?php
          include("menu-incru2.php");
        ?>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
        <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
              <div class="col-lg-6 mb-4 order-0">
                <div class="card card2">
                  <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                      <div class="card-body">
                        <h2>Bienvenido <span id="auto-type"></span></h2>
                        <p class="">
                          El dashboard le proporciona el control total que 
                          necesita para gestionar su restaurante: 
                          <span class="fw-medium">visualice datos</span>, 
                          <span class="fw-medium">realice registros</span> y 
                          <span class="fw-medium">genere informes</span> 
                          de manera eficaz y sencilla.
                        </p>
                      </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left"></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-4 order-1">
                <div class="row">
                  <div class="col-lg-4 col-md-12 col-6 mb-4">
                    <div class="card card2">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                            <img src="img/users-alt.svg" alt="chart success"
                              class="rounded" />
                          </div>
                          <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                              <a class="dropdown-item" href="verUsuarios.php">Detalles</a>
                            </div>
                          </div>
                        </div>
                        <span class="fw-medium d-block">Usuarios</span>
                        <?php
                          mostrarConteoUsuarios();
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-12 col-6 mb-4">
                    <div class="card card2">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                            <img src="img/user-md.svg" alt="Credit Card"
                              class="rounded" />
                          </div>
                          <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                              <a class="dropdown-item" href="verEmpleados.php">Detalles</a>
                            </div>
                          </div>
                        </div>
                        <span class="fw-medium d-block">Empleados</span>
                        <?php
                          mostrarConteoEmpleados();
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 mb-4">
                    <div class="card card2">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                            <img src="img/map-pin-alt.svg" alt="Credit Card" class="rounded" />
                          </div>
                          <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                              <a class="dropdown-item" href="verSedes.php">Detalles</a>
                            </div>
                          </div>
                        </div>
                        <span class="fw-medium d-block">Sedes</span>
                        <?php
                          mostrarConteoSedes();
                        ?>
                        <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> Popularidad</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- / Content -->

          <!-- Footer --> 
          <footer class="content-footer footer bg-footer-theme">
            
          </footer>

          <div class="content-backdrop fade"></div>
        </div>
      </div>
    </div>

    <div class="layout-overlay layout-menu-toggle"></div>
  </div>  

  <!-- Core JS -->
    <script>
      window.onload = function(){
        $("#wrapper").fadeOut(1800);
      }
    </script>
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
  <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>

  <!-- Page JS -->
  <script src="../sneat/assets/js/dashboards-analytics.js"></script>

  <!-- Main -->
  <script src="js/Main.js"></script>
  <script src="js/typed.js"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

</body>
</html>