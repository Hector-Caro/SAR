<?php
// Enlazamos las dependencias necesario
require_once("../../Models/conexion.php");
require_once("../../Models/consultas.php");
require_once("../../Models/seguridadUsuario.php");
require_once("../../Controllers/mostrarInfoUser.php");
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../Administrador/css/styles.css">
    <link rel="stylesheet" href="../Administrador/css/tabs.css">
    <!-- Helpers -->
    <script src="../sneat/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../sneat/assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="container-fluid cardP">
        <div class="row card-body contP ">
            <h4 class="py-3 mb-4"><a class="text-muted fw-light" href="homeUser.php">Inicio/</a> Perfil</h4>
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" href=""><i class="bx bxs-user-detail me-1"></i>
                            Datos Personales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i
                                class="bx bxs-bell-plus me-1"></i> Pedidos</a>
                    </li>
                </ul>
                <div class="container-fliud">
                    <h5 class="card-header titulo2">Datos Personales</h5>

                    <!-- Account -->
                    <div class="container datos">
                        <?php
                        perfilEditarUser();
                        ?>
                    </div>
                    <!-- /Account -->
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