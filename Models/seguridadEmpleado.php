<?php
session_start();

if (!isset($_SESSION['AUTENTICADO'])) {
    echo '<script>
              alert("POR FAVOR INICIE SESIÓN ;)");
              history.back();
          </script>';
    exit;
}

if ($_SESSION['rol'] != "Empleado") {
    echo '<script>
              alert("NO POSEE PERMISOS PARA ACCEDER A ESTA INTERFAZ ;(");
              history.back();
          </script>';
    exit;
}
?>
