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

  <title>registrar Usuario - SAR</title>

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
          <h4 class="py-3 mb-4"><span class="text-muted fw-light">Usuarios /</span> Registrar</h4>

          <h5>Registrar Usuarios</h5>
          <p class="mb-4">
            Por favor completa los campos para registrar un nuevo usuario.
          </p>
          <div class="row">
            <div class="col-md-12">
              <div class="card mb-4">

                <hr class="my-0" />
                <div class="card-body">
                  <form action="../../Controllers/registrarUserAdmin.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Identificación</label>
                        <input class="form-control" type="number" name="identificacion" placeholder="123456789"
                          autofocus />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Tipo de Documento</label>
                        <select name="tipo_doc" class="select2 form-select">
                          <option value="CC">Seleccione una opción</option>
                          <option value="CC">CC</option>
                          <option value="CE">CE</option>
                          <option value="Pasaporte">Pasaporte</option>
                        </select>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Nombres</label>
                        <input class="form-control" type="text" name="nombres" placeholder="Hector Estiven" />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" placeholder="Caro Moreras" />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Correo</label>
                        <div class="input-group input-group-merge">
                          <input type="email" name="email" class="form-control" placeholder="example@example.com" />
                        </div>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Teléfono</label>
                        <input type="number" class="form-control" name="telefono" placeholder="323 233 2333" />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Rol</label>
                        <select name="rol" class="select2 form-select">
                          <option value="CC">Seleccione una Opción</option>
                          <option value="Administrador">Administrador</option>
                          <option value="Empleado">Empleado</option>
                          <option value="Cliente">Cliente</option>
                        </select>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Estado</label>
                        <select name="estado" class="select2 form-select">
                          <option value="CC">Seleccione una Opción</option>
                          <option value="Activo">Activo</option>
                          <option value="Pendiente">Pendiente</option>
                          <option value="Bloqueado">Bloqueado</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Foto del Usuario</label>
                        <input class="form-control" type="file" name="foto" accept=".jpeg, .jpg, .png, .gif">
                      </div>
                      <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Registrar Usuario</button>
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