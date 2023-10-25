<?php
// Enlazamos las dependencias necesario
require_once("Models/conexion.php");
require_once("Models/consultas.php");
require_once("Controllers/mostrarInfoAdmin.php");

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
  <link href="Views/client-site/assets/img/sar.png" rel="icon">
  <link href="Views/client-site/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="Views/client-site/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="Views/client-site/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="Views/client-site/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="Views/client-site/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="Views/client-site/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="Views/client-site/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="Views/client-site/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="Views/client-site/assets/css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="Views/Usuario/css/style.css">

  <!-- =======================================================
  * Template Name: Restaurantly
  * Updated: Jun 15 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.php"><img src="Views/client-site/assets/img/sar.png"
            alt="logo"></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Inicio</a></li>
          <li><a class="nav-link scrollto" href="#about">Sobre nosotros</a></li>
          <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
          <li><a class="nav-link scrollto" href="#specials">Platos especiales</a></li>
          <li><a class="nav-link scrollto" href="#events">Sedes</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Galeria</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contacto</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="Views/client-site/login.html" class="book-a-table-btn scrollto d-none d-lg-flex">Iniciar sesión</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Bienvenido a <span>Salchipaperia DC</span></h1>
          <h2>Las mejores salchipapas de Bogotà</h2>

          <div class="btns">
            <a href="#menu" class="btn-book animated fadeInUp scrollto">Ver menu</a>
          </div>
        </div>


      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="Views/client-site/assets/img/hambu.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3 class="sobre">Sobre Nosotros</h3> <br>
            <p class="fst-italic">
              Bienvenido a Salchipapería DC, el lugar donde encontrarás la comida rápida más deliciosas de Bogotá. Somos
              una empresa apasionada con mas de 10 años de experiencia para a brindarle a nuestros clientes una aventura
              culinaria única y sabrosa. <br>
              Nuestro objetivo es ofrecerte un platillo clásico y amado por todos, las salchipapas, pero con nuestro
              toque especial. Utilizamos ingredientes frescos y de alta calidad para asegurar que cada porción sea una
              explosión de sabores y texturas. Nuestra dedicación a la excelencia culinaria nos ha convertido en un
              referente en la ciudad cuando se trata de disfrutar de una deliciosa comida rápida.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->


    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2></h2>
          <p>Menú</p>
        </div>
        <div class="container">
          <div class="row">

            <?php
            cargarMenufront2();
            ?>

          </div>
        </div>


      </div>

    </section>

    <!-- ======= Specials Section ======= -->
    <section id="specials" class="specials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Especiales</h2>
          <p>Los platos más pedidos</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Chesse burguer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Papi costeña</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Perro bechamel</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">alitas de pollo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Papicrispy</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Chesse burguer</h3>
                    <p class="fst-italic">Cada bocado de la "Cheese Burger" es una explosión de sabores, una mezcla
                      perfecta de lo salado, lo jugoso y lo delicioso.
                      Es una experiencia que te llevará directamente al cielo gastronómico.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="Views/client-site/assets/img/hambu1.png " alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Papi costeña</h3>
                    <p class="fst-italic">"Papi Costeña" es mucho más que una salchipapa; es una experiencia culinaria
                      que te transportará a las costas tropicales con cada bocado.
                      Una deliciosa combinación de sabores que rinde homenaje a la rica cultura gastronómica de la
                      costa.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="Views/client-site/assets/img/salchi1.png" alt="" class="img-fluid"
                      style="position: relative;top: -150px;">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Perro Bechamel</h3>
                    <p class="fst-italic">El "Perro Bechamel" es mucho más que un simple hot dog; es una experiencia
                      gastronómica que te sorprenderá desde el primer bocado.
                      Una deliciosa fusión de ingredientes que combina la tradición de un hot dog con la elegancia de la
                      bechamel. </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="Views/client-site/assets/img/perro.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Alitas de pollo</h3>
                    <p class="fst-italic">Las "Alitas de Pollo" son el aperitivo favorito de todos, famosas por su sabor
                      tentador, textura crujiente y delicioso toque picante.
                      Son perfectas para compartir con amigos y familiares mientras disfrutan de momentos inolvidables.
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="Views/client-site/assets/img/alitas.png" alt="" class="img-fluid"
                      style="position: relative; top: -120px;">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Papicrispy</h3>
                    <p class="fst-italic">Las "Papicryspy" son la combinación perfecta entre papas fritas y chips,
                      logrando un bocadillo inigualable que te hará volver por más.
                      Son la opción ideal para disfrutar en solitario, compartir con amigos o como acompañamiento en
                      cualquier comida.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="Views/client-site/assets/img/salchi2.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- End Specials Section -->

    <!-- ======= Events Section ======= -->
    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <p>Conoce todas nuestras sedes</p>
        </div>

        <div class="events-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="Views/client-site/assets/img/modelia.jpg" class="img-fluid" alt="salchipaperia modelia">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Salchipapería DC - Sede Modelia</h3>
                  <div class="price">
                    <p><span>Visítanos</span></p>
                  </div>
                  <p class="fst-italic">
                    Ubicada en el corazón de Modelia, nuestra sede principal es el lugar perfecto para disfrutar de
                    nuestras deliciosas salchipapas. Con un ambiente acogedor y familiar, te invitamos a que vengas con
                    amigos y familiares para disfrutar de una experiencia gastronómica única.
                  </p> <br>
                  <ul>
                    <li><i class="bi bi-check-circled"></i>Dirección: Calle 67 #8-29</li>
                    <li><i class="bi bi-check-circled"></i>Horario de atención: 10:00 AM - 11:00PM</li>
                  </ul> <br>
                  <a href="#book-a-table" class="book-a-table-btn scrolltod-lg-flex">Contáctanos</a>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="Views/client-site/assets/img/suba.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Salchipapería DC- Sede Suba</h3>
                  <div class="price">
                    <p><span>Visítanos</span></p>
                  </div>
                  <p class="fst-italic">
                    En el la zona más concurrida de Suba, nuestra sede te ofrece un espacio acogedor para disfrutar de
                    nuestras salchipapas con amigos y seres queridos. Nuestro ambiente amigable y atención excepcional
                    harán que te sientas como en casa. Te esperamos para satisfacer tus antojos más deliciosos.
                  </p> <br>
                  <ul>
                    <li><i class="bi bi-check-circled"></i>Dirección: Calle 19 #70-36</li>
                    <li><i class="bi bi-check-circled"></i>Horario de atención: 10:00 AM - 11:00PM</li>
                  </ul> <br>
                  <a href="#book-a-table" class="book-a-table-btn scrolltod-lg-flex">Contáctanos</a>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="Views/client-site/assets/img/Kenedy.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-7 pt-lg-0 content">
                  <h3>Salchipapería DC- Sede Kennedy</h3>
                  <div class="price">
                    <p><span>Visítanos</span></p>
                  </div>
                  <p class="fst-italic">
                    En el vibrante barrio de Kennedy, nuestra sede te espera con los sabores más irresistibles de las
                    salchipapas. Nuestro espacio moderno y cómodo es ideal para relajarte y deleitarte con nuestras
                    especialidades. ¡No dudes en visitarnos y descubre por qué somos el favorito de la comunidad local!
                  </p> <br>
                  <ul>
                    <li><i class="bi bi-check-circled"></i>Dirección: Cra 78B #38-C70</li>
                    <li><i class="bi bi-check-circled"></i>Horario de atención: 10:00 AM - 11:00PM</li>
                  </ul> <br>
                  <a href="#book-a-table" class="book-a-table-btn scrolltod-lg-flex">Contáctanos</a>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="Views/client-site/assets/img/Bosa.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Salchipapería DC- Sede Bosa</h3>
                  <div class="price">
                    <p><span>Visítanos</span></p>
                  </div>
                  <p class="fst-italic">
                    En el encantador barrio de Bosa, nuestra sede te brinda una experiencia culinaria inigualable. Con
                    un ambiente relajado y acogedor, te invitamos a probar nuestras salchipapas y descubrir por qué
                    somos el lugar preferido de los amantes de la comida rápida.
                  </p> <br>
                  <ul>
                    <li><i class="bi bi-check-circled"></i>Dirección: Calle 68 Sur #78J-74</li>
                    <li><i class="bi bi-check-circled"></i>Horario de atención: 10:00 AM - 11:00PM</li>
                  </ul> <br>
                  <a href="#book-a-table" class="book-a-table-btn scrolltod-lg-flex">Contáctanos</a>
                </div>
              </div>
            </div>

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Events Section -->




    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Galeria</h2>
          <p>Algunas fotos de Nuestro Restaurante</p>
        </div>
      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="Views/client-site/assets/img/suba.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="Views/client-site/assets/img/suba.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="Views/client-site/assets/img/kenedy.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="Views/client-site/assets/img/kenedy.jpg" alt="" class="img-fluid"
                  style="height: 350px; width: 100%;">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="Views/client-site/assets/img/modelia.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="Views/client-site/assets/img/modelia.jpg" alt="" class="img-fluid"
                  style="height: 350px; width: 100%;">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="Views/client-site/assets/img/suba.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="Views/client-site/assets/img/suba.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="Views/client-site/assets/img/galeria5.jpeg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="Views/client-site/assets/img/galeria5.jpeg" alt="" class="img-fluid"
                  style="height: 350px; width: 100%;">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="Views/client-site/assets/img/galeria6.png" class="gallery-lightbox" data-gall="gallery-item">
                <img src="Views/client-site/assets/img/galeria6.png" alt="" class="img-fluid"
                  style="height: 350px; width: 100%;">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="Views/client-site/assets/img/galeria7.jpeg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="Views/client-site/assets/img/galeria7.jpeg" alt="" class="img-fluid"
                  style="height: 350px; width: 100%;">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="Views/client-site/assets/img/galeria8.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="Views/client-site/assets/img/galeria8.jpg" alt="" class="img-fluid"
                  style="height: 350px; width: 100%;">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->



    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contacto</h2>
          <p>Contactanos</p>
        </div>
      </div>

      <div data-aos="fade-up">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15906.707459261324!2d-74.0594254!3d4.651597!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9b595fbfe621%3A0x347633699eef1147!2sLa%20Salchipaperia%20DC%20Chapinero!5e0!3m2!1ses!2sco!4v1692025970409!5m2!1ses!2sco"
          width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Ubicacion:</h4>
                <p>Cl. 67 #8-32, Localidad de Chapinero</p>
              </div>

              <div class="open-hours">
                <i class="bi bi-clock"></i>
                <h4>Hora de apertura:</h4>
                <p>
                  Lunes-Domingo:<br>
                  11:00 AM - 11:00 PM
                </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>salchipaperiaDC@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Telefono:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Tu Nombre" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Tu correo" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="8"
                  placeholder="Envia un mensaje que nos quieras compartir!" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Envia un mensaje que nos quieras compartir!</div>
              </div>
              <div class="text-center"><button type="submit">Enviar mensaje</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="Views/client-site/assets/vendor/aos/aos.js"></script>
  <script src="Views/client-site/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="Views/client-site/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="Views/client-site/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="Views/client-site/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="Views/client-site/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="Views/client-site/assets/js/main.js"></script>

  <script>

    // Obtén el elemento del modal una vez y guárdalo en una variable
    const modalBox = document.getElementById("modalBox");
    const overlay = document.getElementById("overlay1");


    function showModal() {
      // Usa la variable modalBox en lugar de buscar el elemento nuevamente
      modalBox.style.opacity = "1";
      overlay.style.opacity = "1";
    }

    function closeModal() {
      // Usa la variable modalBox en lugar de buscar el elemento nuevamente
      modalBox.style.opacity = "0";
      overlay.style.opacity = "0";
    }
  </script>

</body>

</html>