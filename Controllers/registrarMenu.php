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
require_once("../Models/conexion.php");
require_once("../Models/consultas.php");

// Aterrizamos en variables los datos ingresados por el usuario
// los cuales viajan a travé del metodo POST y name de los campos

$nombre = $_POST['nombre'];
$ingredientes = $_POST['ingredientes'];
$descripcion = $_POST['descripcion'];
$estado = $_POST['estado'];
$precio = $_POST['precio'];

// Verificamos que las claves coincidan

// VALIDAMOS QUE LOS CAMPOS ESTEN COMPLETAMENTE DILIGENCIADOS

if (strlen($nombre) > 0 && strlen($ingredientes) > 0 && strlen($descripcion) > 0 && strlen($estado) > 0 && strlen($precio) > 0) {


    // CREAMOS UNA VARIABLE PARA DEFINIR LA RUTA DONDE QUEDARAALOJADA LA IMAGEN
    $foto = "../Uploads/Productos/" . $_FILES['foto']['name'];
    // MOVEMOS EL ARCHIVO A LA CARPETA UPLOAD Y LA CARPETA USUARIOS
    $mover = move_uploaded_file($_FILES['foto']['tmp_name'], $foto);

    $objConsultas = new Consultas();
    $result = $objConsultas->registrarMenu($nombre, $ingredientes, $descripcion, $estado, $precio, $foto);


} else {
    ?>
    <script>
        Swal.fire({
            icon: 'question',
            title: 'Oops...',
            text: 'Por favor completar los campos vacíos.',
            confirmButtonText: '<a href="../Views/Administrador/registrarMenu.php" style="text-decoration: none; color:white;">Aceptar</a>',
        })
    </script>
<?php

}

?>
</body>
</html>


