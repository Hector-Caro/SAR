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

// Enlazamos las dependencias necesario
require_once ("../Models/conexion.php");
require_once ("../Models/consultas.php");

// Aterrizamos en variables los datos ingresados por el usuario
// los cuales viajan a travé del metodo POST y name de los campos

$identificacion = $_POST['identificacion'];
$tipo_doc = $_POST['tipo_doc'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

// Verificamos que las claves coincidan

    // VALIDAMOS QUE LOS CAMPOS ESTEN COMPLETAMENTE DILIGENCIADOS

    if ( strlen($identificacion)>0 && strlen($tipo_doc)>0 && strlen($nombres)>0 &&
    strlen($apellidos)>0 && strlen($email)>0 && strlen($telefono)>0) {
        

        $objConsultas = new Consultas();
        $result = $objConsultas->modificarCuentaUser($identificacion, $tipo_doc, $nombres, $apellidos, $email, $telefono);


    }else{
        ?>
        <script>
            Swal.fire({
    icon: 'question',
    title: 'Oops...',
    text: 'Por favor completar los campos vacíos.',
    confirmButtonText: '<a href="../Views/Usuario/perfilUser.php" style="text-decoration: none; color:white;">Aceptar</a>',
    })
        </script>
        <?php
    }
    
    

?>
</body>
</html>


