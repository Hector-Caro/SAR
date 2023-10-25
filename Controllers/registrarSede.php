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
    $estado_sede = $_POST ['estado'];

    // Verificamos que las claves coincidan

        // VALIDAMOS QUE LOS CAMPOS ESTEN COMPLETAMENTE DILIGENCIADOS

        if ( strlen($identificacion_admin)>0 && strlen($tipo_doc)>0 && strlen($nombres)>0 &&
        strlen($apellidos)>0 && strlen($email)>0 && strlen($telefono_sede)>0 
        && strlen($direccion_sede)>0 && strlen($estado_sede)>0) {
            


            // CREAMOS UNA VARIABLE PARA DEFINIR LA RUTA DONDE QUEDARAALOJADA LA IMAGEN
            $foto_sede = "../Uploads/Sedes/".$_FILES['foto']['name'];
            // MOVEMOS EL ARCHIVO A LA CARPETA UPLOAD Y LA CARPETA USUARIOS
            $mover = move_uploaded_file($_FILES['foto']['tmp_name'], $foto_sede);

            $objConsultas = new Consultas();
            $result = $objConsultas->registrarSede($identificacion_admin, $tipo_doc, $nombres, $apellidos, $email, $telefono_sede, $direccion_sede, $estado_sede, $foto_sede);


        }else{
            echo '<script>
                alert("Por favor completar los campos vacíos.")
            </script>';
    
             echo "<script>
            location.href='../Views/Administrador/registrar-sedes.php'
             </script>";
        }

?>