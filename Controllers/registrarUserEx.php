<?php

    // Enlazamos las dependencias necesario
    require_once ("../Models/conexion.php");
    require_once ("../Models/consultas.php");

    // Aterrizamos en variables los datos ingresados por el usuario
    // los cuales viajan a travé del metodo POST y name de los campos

    $identificacion = $_POST['identificacion'];
    $tipo_doc = $_POST["tipo_doc"];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $clave = $_POST['clave'];
    $clave2 = $_POST['clave2'];
    $rol = "Cliente";
    $estado = "Activo";

    // Verificamos que las claves coincidan

    if ($clave == $clave2) {
        // VALIDAMOS QUE LOS CAMPOS ESTEN COMPLETAMENTE DILIGENCIADOS

        if ( strlen($identificacion)>0 && strlen($tipo_doc)>0 && strlen($nombres)>0 &&
        strlen($apellidos)>0 && strlen($email)>0 && strlen($telefono)>0 &&
        strlen($clave)>0) {
            
            // ENCRIPTAMOS LA CLAVE
            $claveMd = md5($clave);
            
            // CREAMOS EL OBJETO A PARTIR DE LA CLASE PARA ENVIAR LOS ARGUMENTOS A LA FUNCIÓN EN EL MODELO (ARCHIVO CONSULTAS)

            $objConsultas = new Consultas();
            $result = $objConsultas->insertarUserEx($identificacion, $tipo_doc, $nombres, $apellidos, $email, $telefono, $claveMd, $rol, $estado);

        }


        else{
            echo '<script>
                alert("Por favor completar los campos vacíos.")
            </script>';
    
            echo "<script>
                location.href='../Views/client-site/login.html'
            </script>";
        }

    }else{
        echo '<script>
            alert("Las claves no coinciden.")
        </script>';

        echo "<script>
            location.href='../Views/client-site/login.html'
        </script>";
    }

?>