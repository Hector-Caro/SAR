<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../Views/Administrador/css/alerts.css">
</head>
<body>
<?php

require_once ("../Models/conexion.php");
require_once ("../Models/consultas.php");

$identificacion = $_POST['identificacion'];
$clave = $_POST['clave'];
$clave2 = $_POST['clave2'];

if ($clave == $clave2) {

    $claveMd = md5($clave);

    $objConsultas = new Consultas();
    $result = $objConsultas->actualizarClaveAdmin($identificacion, $claveMd);

}else{

    ?>
    <script>
        Swal.fire({
icon: 'error',
title: 'Oops...',
text: 'Las claves no coinciden.',
confirmButtonText: '<a href="../Views/Administrador/perfil.php?id=$identificacion" style="text-decoration: none; color:white;">Aceptar</a>',
})
    </script>
    <?php



}


?>
</body>
</html>


