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
    $rol = $_POST ['rol'];
    $estado = $_POST ['estado'];

    // Verificamos que las claves coincidan

        // VALIDAMOS QUE LOS CAMPOS ESTEN COMPLETAMENTE DILIGENCIADOS

        if ( strlen($identificacion)>0 && strlen($tipo_doc)>0 && strlen($nombres)>0 &&
        strlen($apellidos)>0 && strlen($email)>0 && strlen($telefono)>0 && strlen($rol)>0 && strlen($estado)>0) {
            

            $objConsultas = new Consultas();
            $result = $objConsultas->actualizarUserAdmin($identificacion, $tipo_doc, $nombres, $apellidos, $email, $telefono, $rol, $estado);


        }else{
            echo '
            <script>
                alert("Por favor completar los campos vacíos.")
            </script>';
    
            echo "
            <script>
                location.href='../Views/Administrador/modificarUsuario.php'
            </script>";
        }

?>