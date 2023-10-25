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
    $clave = $_POST['identificacion'];
    $rol = "Empleado";
    $contrato = $_POST['contrato'];


    // Verificamos que las claves coincidan

        // VALIDAMOS QUE LOS CAMPOS ESTEN COMPLETAMENTE DILIGENCIADOS

        if ( strlen($identificacion)>0 && strlen($tipo_doc)>0 && strlen($nombres)>0 && strlen($apellidos)>0 &&
        strlen($email)>0 && strlen($telefono)>0 && strlen($clave)>0 && strlen($contrato)>0) {
            
            // CREAMOS EL OBJETO A PARTIR DE LA CLASE PARA ENVIAR LOS ARGUMENTOS A LA FUNCIÓN EN EL MODELO (ARCHIVO CONSULTAS)
            $claveMd = md5($clave);

            // CREAMOS UNA VARIABLE PARA DEFINIR LA RUTA DONDE QUEDARAALOJADA LA IMAGEN
            $foto = "../Uploads/Empleados/".$_FILES['foto']['name'];
            // MOVEMOS EL ARCHIVO A LA CARPETA UPLOAD Y LA CARPETA USUARIOS
            $mover = move_uploaded_file($_FILES['foto']['tmp_name'], $foto);

            $objConsultas = new Consultas();
            $result = $objConsultas->registrarEmpleado($identificacion, $tipo_doc, $nombres, $apellidos, $email, $telefono, $claveMd, $rol, $contrato, $foto);


        }else{
            echo '<script>
                alert("Por favor completar los campos vacíos.")
            </script>';
    
            echo "<script>
                location.href='../Views/Administrador/registrarEmpleado.php'
            </script>";
        }

?>