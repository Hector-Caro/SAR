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

    $identificacion_admin = $_POST['identificacion'];
    $tipo_doc = $_POST['tipo_doc'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono_sede = $_POST['telefono'];
    $direccion_sede = $_POST['direccion'];
    $estado_sede = $_POST['estado'];
    $id_sede = $_POST['id_sede'];

    // Verificamos que las claves coincidan

        // VALIDAMOS QUE LOS CAMPOS ESTEN COMPLETAMENTE DILIGENCIADOS

        if ( strlen($identificacion_admin)>0 && strlen($tipo_doc)>0 && strlen($nombres)>0 &&
        strlen($apellidos)>0 && strlen($email)>0 &&  strlen($telefono_sede)>0 &&  strlen($direccion_sede)>0 &&  strlen($estado_sede)>0 &&  strlen($id_sede)>0)  {
            

            $objConsultas = new Consultas();
            $result = $objConsultas->modificarSede($identificacion_admin, $tipo_doc, $nombres, $apellidos, $email, $telefono_sede, $direccion_sede, $estado_sede, $id_sede);


        }else{
            ?>
            <script>
                Swal.fire({
      icon: 'question',
      title: 'Oops...',
      text: 'Por favor completar los campos vacíos.',
      confirmButtonText: '<a href="../Views/Administrador/modificarSede.php" style="text-decoration: none; color:white;">Aceptar</a>',
    })
            </script>
            <?php
        }

?>
</body>
</html>


