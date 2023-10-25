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

require_once ('../Models/conexion.php');
require_once ('../Models/consultas.php');


$identificacion = $_POST['identificacion'];
$nombres = $_POST['nombres'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion']; 

if ( strlen($identificacion)>0 && strlen($nombres)>0 &&
    strlen($telefono)>0 && strlen($direccion)>0) {

        // CREAMOS UNA VARIABLE PARA DEFINIR LA RUTA DONDE QUEDARAALOJADA LA IMAGEN
        $foto = "../Uploads/Proveedores/".$_FILES['foto']['name'];
        // MOVEMOS EL ARCHIVO A LA CARPETA UPLOAD Y LA CARPETA USUARIOS
        $mover = move_uploaded_file($_FILES['foto']['tmp_name'], $foto);


        $objConsultas = new Consultas();
        $result = $objConsultas->registrarProveedor($identificacion, $nombres, $telefono, $direccion, $foto);


    }else{
         ?>
         <script>
             Swal.fire({
                 icon: 'question',
                 title: 'Oops...',
                 text: 'Por favor completar los campos vacíos.',
                 confirmButtonText: '<a href="../Views/Administrador/registrarProveedor.php" style="text-decoration: none; color:white;">Aceptar</a>',
             })
         </script>
     <?php
    }
?>
</body>
</html>

