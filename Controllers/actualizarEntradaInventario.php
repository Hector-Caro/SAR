<?php

    // Enlazamos las dependencias necesario
    require_once ("../Models/conexion.php");
    require_once ("../Models/consultas.php");

    // Aterrizamos en variables los datos ingresados por el usuario
    // los cuales viajan a travé del metodo POST y name de los campos
   
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $cantidad = $_POST['cantidad'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $id_inventario = $_POST ['id_inv'];
    

    // Verificamos que las claves coincidan

        // VALIDAMOS QUE LOS CAMPOS ESTEN COMPLETAMENTE DILIGENCIADOS

        if ( strlen($nombre)>0 && strlen($tipo)>0 && strlen($cantidad)>0 &&
        strlen($descripcion)>0 && strlen($precio)>0 && strlen($id_inventario)>0) {
            

            $objConsultas = new Consultas();
            $result = $objConsultas->actualizarEntradaInventario($nombre, $tipo, $cantidad, $descripcion, $precio, $id_inventario);


        }else{
            echo '<script>
                alert("Por favor completar los campos vacíos.")
            </script>';
    
             echo "<script>
            location.href='../Views/Administrador/modificarEntradaInv.php?id=1'
             </script>";
        }

?>