<?php

    require_once ('../Models/conexion.php');
    require_once ('../Models/consultas.php');


    $identificacion = $_POST['identificacion'];
    $nombres = $_POST['nombres'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion']; 

    if ( strlen($identificacion)>0 && strlen($nombres)>0 &&
        strlen($telefono)>0 && strlen($direccion)>0) {

            $objConsultas = new Consultas();
            $result = $objConsultas->actualizarProveedor($identificacion, $nombres, $telefono, $direccion);


        }else{
            echo '<script>
                alert("Por favor completar los campos vacíos.")
            </script>';
    
             echo "<script>
                location.href='../Views/Administrador/modificarProveedor.php?id=1234567890'
             </script>";
        }
?>