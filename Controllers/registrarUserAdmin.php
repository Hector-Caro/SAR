<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../Views/Administrador/css/alerts.css">
</head>
<body>
<?php

require_once ('../Models/conexion.php');
require_once ('../Models/consultas.php');


$identificacion = $_POST['identificacion'];
$tipo_doc = $_POST['tipo_doc'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$clave = $_POST['identificacion'];
$rol = $_POST ['rol'];
$estado = $_POST ['estado'];

if ( strlen($identificacion)>0 && strlen($tipo_doc)>0 && strlen($nombres)>0 &&
    strlen($apellidos)>0 && strlen($email)>0 && strlen($telefono)>0 
    && strlen($clave)>0 && strlen($rol)>0 && strlen($estado)>0) {
        
        // CREAMOS EL OBJETO A PARTIR DE LA CLASE PARA ENVIAR LOS ARGUMENTOS A LA FUNCIÓN EN EL MODELO (ARCHIVO CONSULTAS)
        $claveMd = md5($clave);

        // CREAMOS UNA VARIABLE PARA DEFINIR LA RUTA DONDE QUEDARAALOJADA LA IMAGEN
        $foto = "../Uploads/Usuarios/".$_FILES['foto']['name'];
        // MOVEMOS EL ARCHIVO A LA CARPETA UPLOAD Y LA CARPETA USUARIOS
        $mover = move_uploaded_file($_FILES['foto']['tmp_name'], $foto);


        $objConsultas = new Consultas();
        $result = $objConsultas->insertarUserAdmin($identificacion, $tipo_doc, $nombres, $apellidos, $email, $telefono, $claveMd, $rol, $estado, $foto);


    }else{
         ?>
         <script>
             Swal.fire({
                 icon: 'question',
                 title: 'Oops...',
                 text: 'Por favor completar los campos vacíos.',
                 confirmButtonText: '<a href="../Views/Administrador/registrarUsuario.php" style="text-decoration: none; color:white;">Aceptar</a>',
             })
         </script>
     <?php
    
    
        }
?>
</body>
</html>

