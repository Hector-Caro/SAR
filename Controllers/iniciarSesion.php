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

$email = $_POST['email'];
$clave = md5($_POST['clave']);

if (strlen($email)>0 && strlen($clave)>0) {
    
    $objValidar = new ValidarSesion();
    $result = $objValidar->iniciarSesion($email, $clave);

    if (!$result){
        echo ("Es falso");
    }


}else{

    
    ?>
    <script>
        Swal.fire({
icon: 'error',
title: 'Oops...',
text: 'Las claves no coinciden.',
confirmButtonText: '<a href="../Views/login.html" style="text-decoration: none; color:white;">Aceptar</a>',
})
    </script>
    <?php

}
?>
</body>
</html>



