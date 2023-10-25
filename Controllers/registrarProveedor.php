<?php

    require_once ('../Models/conexion.php');
    require_once ('../Models/consultas.php');


    $identificacion = $_POST['identificacion'];
    $nombres = $_POST['nombres'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion']; 

    if ( strlen($identificacion)>0 && strlen($nombres)>0 &&
        strlen($telefono)>0 && strlen($direccion)>0) {

            // CREAMOS UNA VARIABLE PARA DEFINIR LA RUTA DONDE QUEDARAALOJADA LA IMAGEN
            $foto = "../Uploads/Proveedores/".$_FILES['foto']['name'];
            // MOVEMOS EL ARCHIVO A LA CARPETA UPLOAD Y LA CARPETA USUARIOS
            $mover = move_uploaded_file($_FILES['foto']['tmp_name'], $foto);


            $objConsultas = new Consultas();
            $result = $objConsultas->registrarProveedor($identificacion, $nombres, $telefono, $direccion, $foto);


        }else{
            echo '<script>
                alert("Por favor completar los campos vacíos.")
            </script>';
    
             echo "<script>
            location.href='../Views/Administrador/registrarProveedor.php'
             </script>";
        }
?>