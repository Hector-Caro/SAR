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

$nombre = $_POST['nombre'];
$ingredientes = $_POST['ingredientes'];
$descripcion = $_POST['descripcion'];
$estado = $_POST['estado'];
$precio = $_POST['precio'];
$id_menu = $_POST['id_menu'];

// Verificamos que las claves coincidan

    // VALIDAMOS QUE LOS CAMPOS ESTEN COMPLETAMENTE DILIGENCIADOS

    if (strlen($nombre)>0 && strlen($ingredientes)>0 && strlen($descripcion)>0 && strlen($id_menu )>0 && strlen($estado)>0 && strlen($precio)>0)  {
        

        $objConsultas = new Consultas();
        $result = $objConsultas->modificarMenu($nombre, $ingredientes, $descripcion,$estado,$precio, $id_menu );


    }else{

        ?>
        <script>
            Swal.fire({
  icon: 'question',
  title: 'Oops...',
  text: 'Por favor completar los campos vacíos.',
  confirmButtonText: '<a href="../Views/Administrador/verMenu.php" style="text-decoration: none; color:white;">Aceptar</a>',
})
        </script>
        <?php

    }

?>
</body>
</html>

