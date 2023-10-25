<?php

    // Enlazamos las dependencias necesario
    require_once ("../Models/conexion.php");
    require_once ("../Models/consultas.php");

    // Aterrizamos en variables los datos ingresados por el usuario
    // los cuales viajan a travé del metodo POST y name de los campos

    
        // Aterrizamos en variables los datos ingresados por el usuario
        $nombre = $_POST['nombre'];
        $tipo = $_POST['tipo'];
        $cantidad = $_POST['cantidad'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        


    // Verificamos que las claves coincidan

        // VALIDAMOS QUE LOS CAMPOS ESTEN COMPLETAMENTE DILIGENCIADOS

        if (strlen($nombre)>0 && strlen($tipo)>0 && strlen($cantidad)>0 && strlen($descripcion)>0 && strlen($precio)>0) {
            
            // CREAMOS EL OBJETO A PARTIR DE LA CLASE PARA ENVIAR LOS ARGUMENTOS A LA FUNCIÓN EN EL MODELO (ARCHIVO CONSULTAS)
            

            // CREAMOS UNA VARIABLE PARA DEFINIR LA RUTA DONDE QUEDARAALOJADA LA IMAGEN
            $foto = "../Uploads/Inventario/".$_FILES['foto']['name']; 
            // MOVEMOS EL ARCHIVO A LA CARPETA UPLOAD Y LA CARPETA USUARIOS
            $mover = move_uploaded_file($_FILES['foto']['tmp_name'], $foto);

            $objConsultas = new Consultas();
            
            $result = $objConsultas->registrarEntradaInventario($nombre, $tipo, $cantidad, $descripcion, $precio, $foto);
            
            


        }else{
            echo '<script>
                alert("Por favor completar los campos vacíos.")
            </script>';
    
             echo "<script>
            location.href='../Views/Administrador/registrarEntradaInventario.php'
             </script>";
        }

?>