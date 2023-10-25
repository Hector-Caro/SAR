<!-- Dependences -->
<?php
    // Enlazamos las dependencias necesario
    require_once ("../../Models/conexion.php");
    require_once ("../../Models/consultas.php");
    require_once ("../../Models/seguridadUsuario.php"); 
    require_once ("../../Controllers/mostrarInfoUser.php");
    require_once ("../../Controllers/mostrarInfoAdmin.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SAR</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../client-site/assets/img/sar.png" rel="icon">
  <link href="../client-site/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../client-site/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../client-site/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../client-site/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../client-site/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../client-site/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../client-site/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../client-site/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../client-site/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Restaurantly
  * Updated: Jun 15 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <header id="header" class="fixed-top d-flex align-items-cente">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">
        <h1 class="logo me-auto me-lg-0"><a href="index.html"><img src="../client-site/assets/img/sar.png" alt="logo"></a></h1>
            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto" href="homeUser.php#hero">Inicio</a></li>
                    <li><a class="nav-link scrollto" href="homeUser.php#about">Sobre nosotros</a></li>
                    <li><a class="nav-link scrollto" href="homeUser.php#menu">Menu</a></li>
                    <li><a class="nav-link scrollto" href="homeUser.php#specials">Platos especiales</a></li>
                    <li><a class="nav-link scrollto" href="homeUser.php#events">Sedes</a></li>
                    <li><a class="nav-link scrollto" href="homeUser.php#gallery">Galeria</a></li>
                    <li><a class="nav-link scrollto" href="homeUser.php#contact">Contacto</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
                </nav>

                <a href="#" id="carrito"><img src="../client-site/assets/img/carrito.png" alt="" style="height: 50px; width: 50px;"><span>0</span></a>
                
                    <?php 
                        dropdownUser();
                    ?>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav> 
        </div>
    </header>

    <section class="specials personalizacion">
      <div class="container" data-aos="fade-up">
        <?php 
            pesonalizarPlatoMenu();
        ?>
      </div>
    </section><!-- End Specials Section -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../client-site/assets/vendor/aos/aos.js"></script>
  <script src="../client-site/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../client-site/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../client-site/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../client-site/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../client-site/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../client-site/assets/js/main.js"></script>

</body>

</html>
