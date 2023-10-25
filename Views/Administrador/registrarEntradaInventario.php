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
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

  <title>Registrar Entrada - SAR</title>

  <meta name="description" content="">

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="img/sar.png">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="../sneat/assets/vendor/fonts/boxicons.css">

  <!-- Core CSS -->
  <link rel="stylesheet" href="../sneat/assets/vendor/css/core.css" class="template-customizer-core-css">
  <link rel="stylesheet" href="../sneat/assets/vendor/css/theme-default.css" class="template-customizer-theme-css">
  <link rel="stylesheet" href="../sneat/assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
  <link rel="stylesheet" href="../sneat/assets/vendor/libs/apex-charts/apex-charts.css">

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

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
          <?php
            include("menu-incru2.php");
          ?>
        <!-- / Navbar -->

        <div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="py-3 mb-4"><span class="text-muted fw-light">Inventario /</span> Registrar</h4>

          <h5>Registrar Entrada al Inventario</h5>
          <p class="mb-4">
            Por favor completa los campos para registrar una nueva entrada en el Inventario.
          </p>
          <div class="row">
            <div class="col-md-12">
              <div class="card mb-4">

                <div class="card-body">
                  <form action="../../Controllers/registrarEntradaInventario.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Nombre</label>
                        <input class="form-control" type="text" name="nombre" placeholder="Huevos, Carne, etc...">
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Tipo</label>
                        <select name="tipo" class="select2 form-select">
                            <option value="CC">Seleccione una opción</option>
                            <option value="fruta">Fruta</option>
                            <option value="verduras">Verduras</option>
                            <option value="carne">Carne</option>
                            <option value="aceite">Aceite</option>
                            <option value="Leche">Leche</option>
                            <option value="papa">Papa</option>
                            <option value="huevo">Huevo</option>
                            <option value="queso">Queso</option>
                        </select>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Cantidad</label>
                        <input type="text" class="form-control" name="cantidad" placeholder="Ej: (0-100)">
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" placeholder="Una Hamburguesa deliciosa">
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Precio</label>
                        <input type="text" class="form-control" name="precio" placeholder="Ej: ($10.000)">
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Foto del Producto</label>
                        <input class="form-control" type="file" name="foto" accept=".jpeg, .jpg, .png, .gif">
                      </div>
                      <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Registrar Entrada</button>
                        <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                      </div>
                    <div>
                  </form>
                </div>
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