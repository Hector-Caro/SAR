<?php

    require_once ("../Models/conexion.php");
    require_once ("../Models/consultas.php");

    $identificacion = $_POST['identificacion'];
    $clave = $_POST['clave'];
    $clave2 = $_POST['clave2'];

    if ($clave == $clave2) {

        $claveMd = md5($clave);

        $objConsultas = new Consultas();
        $result = $objConsultas->actualizarClaveUser($identificacion, $claveMd);

    }else{

        echo '<script>
            alert("Las claves no coinciden.")
        </script>';

        echo "<script>
            location.href='../Views/Usuario/perfilUser.php?id=$identificacion'
        </script>";

    }


?>