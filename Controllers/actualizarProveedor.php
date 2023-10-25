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
    
</body>
</html>

<?php

    require_once ('../Models/conexion.php');
    require_once ('../Models/consultas.php');


    $identificacion = $_POST['identificacion'];
    $nombres = $_POST['nombres'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion']; 

    if ( strlen($identificacion)>0 && strlen($nombres)>0 &&
        strlen($telefono)>0 && strlen($direccion)>0) {

            $objConsultas = new Consultas();
            $result = $objConsultas->actualizarProveedor($identificacion, $nombres, $telefono, $direccion);


        }else{

            ?>
            <script>
                Swal.fire({
      icon: 'question',
      title: 'Oops...',
      text: 'Por favor completar los campos vacíos.',
      confirmButtonText: '<a href="../Views/Administrador/modificarProveedor.php?id=1234567890" style="text-decoration: none; color:white;">Aceptar</a>',
    })
            </script>
            <?php
        }
?>