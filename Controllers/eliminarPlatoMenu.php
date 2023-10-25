<?php
    // Enlazamos las dependencias necesarias
    require_once("../Models/conexion.php");
    require_once("../Models/consultas.php");
    

    // ATERRIZAMOS LA VARIABLE QUE ENVIAMOS A TRAVES  DEL METODO GET DESDE EL BOTON DE LA TABLA
    $id = $_GET['id'];

    $objConsultas = new Consultas();
    $result = $objConsultas->eliminarPlato($id);
?>