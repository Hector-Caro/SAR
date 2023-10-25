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
    $id = $_POST['id'];

    // Verificamos que las claves coincidan

        // VALIDAMOS QUE LOS CAMPOS ESTEN COMPLETAMENTE DILIGENCIADOS

        if (strlen($nombre)>0 && strlen($ingredientes)>0 && strlen($descripcion)>0 && strlen($id)>0 && strlen($estado)>0 && strlen($precio)>0)  {
            

            $objConsultas = new Consultas();
            $result = $objConsultas->modificarMenu($nombre, $ingredientes, $descripcion,$estado,$precio, $id);


        }else{
            echo '<script>
                alert("Por favor completar los campos vacíos.")
            </script>';
    
            //  echo "<script>
            // location.href='../Views/Administrador/verMenu.php'
            //  </script>";
        }

?>