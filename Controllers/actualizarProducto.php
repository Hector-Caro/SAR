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

    // Enlazamos las dependencias necesario
    require_once ("../Models/conexion.php");
    require_once ("../Models/consultas.php");

    // Aterrizamos en variables los datos ingresados por el usuario
    // los cuales viajan a travé del metodo POST y name de los campos

    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado'];
    $id_pro = $_POST['id_producto'];

    // Verificamos que las claves coincidan

        // VALIDAMOS QUE LOS CAMPOS ESTEN COMPLETAMENTE DILIGENCIADOS

        if ( strlen($nombre)>0 && strlen($categoria)>0 && strlen($precio)>0 &&
        strlen($descripcion)>0 && strlen($estado)>0 &&  strlen($id_pro)>0)  {
            

            $objConsultas = new Consultas();
            $result = $objConsultas->modificarProducto($nombre, $categoria, $precio, $descripcion, $estado, $id_pro);


        }else{

            ?>
        <script>
            Swal.fire({
  icon: 'question',
  title: 'Oops...',
  text: 'Por favor completar los campos vacíos.',
  confirmButtonText: '<a href="../Views/Administrador/modifcarProducto.php" style="text-decoration: none; color:white;">Aceptar</a>',
})
        </script>
        <?php

        }

?>