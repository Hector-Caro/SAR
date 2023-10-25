<?php

require_once("../Models/conexion.php");
require_once("../Models/generarReciboModel.php");

$identificacion = $_POST['identificacion'];
$email = $_POST['correo'];

$objClave = new GenerarRecibo();
$result = $objClave->enviarRecibo($identificacion);

// Agrega la verificación y salida de depuración aquí
?>
