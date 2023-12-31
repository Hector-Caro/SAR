<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAR-Administrador</title>
    <link rel="shortcut icon" href="../Views/client-site/assets/img/carrito.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../Views/Administrador/css/alerts.css">
    
</head>
<body>
<?php

class Consultas
{

    // Módulos

    // -Usuarios

    public function insertarUserAdmin($identificacion, $tipo_doc, $nombres, $apellidos, $email, $telefono, $claveMd, $rol, $estado, $foto)
    {

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT * FROM  users WHERE email=:email OR identificacion=:identificacion";
        $result = $conexion->prepare($consultar);
        $result->bindParam(":email", $email);
        $result->bindParam(":identificacion", $identificacion);
        $result->execute();

        // COVERTIR LA VARIABLE RESULT EN UN ARREGLO (CLAVE, ROL Y ESTADO)

        $f = $result->fetch();

        if ($f) {
            // VALIDAMOS LA CONTRASEÑA

            ?>
            <script>
                Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'El usuario ya esta registrado.',
      confirmButtonText: '<a href="../Views/client-site/login.html" style="text-decoration: none; color:white;">Aceptar</a>',
    })
            </script>
            <?php
        } else {

            $insertar = "INSERT INTO users(identificacion, tipo_doc, nombres, apellidos, email, telefono, clave, rol, estado, foto) VALUES (:identificacion, :tipo_doc, :nombres, :apellidos, :email, :telefono, :claveMd, :rol, :estado, :foto)";

            $result = $conexion->prepare($insertar);

            $result->bindParam(":identificacion", $identificacion);
            $result->bindParam(":tipo_doc", $tipo_doc);
            $result->bindParam(":nombres", $nombres);
            $result->bindParam(":apellidos", $apellidos);
            $result->bindParam(":email", $email);
            $result->bindParam(":telefono", $telefono);
            $result->bindParam(":claveMd", $claveMd);
            $result->bindParam(":rol", $rol);
            $result->bindParam(":estado", $estado);
            $result->bindParam(":foto", $foto);
            $result->execute();

            ?>
            <script>
                Swal.fire({
      icon: 'success',
      title: 'Usuario registrado exitosamente',
      text: '',
      confirmButtonText: '<a href="../Views/Administrador/verUsuarios.php" style="text-decoration: none; color:white;">Aceptar</a>',
    })
            </script>
            <?php
        }

    }

    public function insertarUserEx($identificacion, $tipo_doc, $nombres, $apellidos, $email, $telefono, $claveMd, $rol, $estado)
    {

        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();


        // SELECT DE USUARIO REGISTRAADO EN EL SISTEMA
        // EL OBJETIVO DE ESTE SELECT ES VERIFICAR SI EL USUARIO YA ESTA REGISTRADO

        $consultar = "SELECT * FROM  users WHERE email=:email OR identificacion=:identificacion";
        $result = $conexion->prepare($consultar);
        $result->bindParam(":email", $email);
        $result->bindParam(":identificacion", $identificacion);
        $result->execute();

        // COVERTIR LA VARIABLE RESULT EN UN ARREGLO (CLAVE, ROL Y ESTADO)

        $f = $result->fetch();

        if ($f) {
            // VALIDAMOS LA CONTRASEÑA

            ?>
            <script>
                Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'El usuario ya esta registrado.',
      confirmButtonText: '<a href="../Views/client-site/login.html" style="text-decoration: none; color:white;">Aceptar</a>',
    })
            </script>
            <?php
        } else {




            // CREAMOS LA VARIABLE QUE CONTENDRÁ LA CONSULTA A EJECUTAR
            $insertar = "INSERT INTO users(identificacion, tipo_doc, nombres, apellidos, email, telefono, clave, rol, estado) VALUES (:identificacion, :tipo_doc, :nombres, :apellidos, :email, :telefono, :claveMd, :rol, :estado)";

            // PREPARAMOS TODO LO NECESARIO PARA EJECUTAR LA FUNCIÓN ANTERIOR
            $result = $conexion->prepare($insertar);

            //  CONVERTIMOS LOS ARGUMENTOS EN PARAMETROS

            $result->bindParam(":identificacion", $identificacion);
            $result->bindParam(":tipo_doc", $tipo_doc);
            $result->bindParam(":nombres", $nombres);
            $result->bindParam(":apellidos", $apellidos);
            $result->bindParam(":email", $email);
            $result->bindParam(":telefono", $telefono);
            $result->bindParam(":claveMd", $claveMd);
            $result->bindParam(":rol", $rol);
            $result->bindParam(":estado", $estado);
            $result->execute();
            // EJECUTAMOS EL INSERT INTO

            ?>
        <script>
            Swal.fire({
  icon: 'success',
  title: 'Usuario registrado.',
  text: '',
  confirmButtonText: '<a href="../Views/client-site/login.html" style="text-decoration: none; color:white;">Aceptar</a>',
})
        </script>
        <?php
        }
    }

    public function mostrarUsersAdmin()
    {
        $f = null;

        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT * FROM users ORDER BY nombres ASC";

        $result = $conexion->prepare($consultar);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }
        return $f;
    }

    public function eliminarUserAdmin($id)
    {

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $eliminar = "DELETE FROM users WHERE identificacion=:id";
        $result = $conexion->prepare($eliminar);

        $result->bindParam(":id", $id);

        $result->execute();
        

        ?>
            <script>
                
                Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})
            </script>
            <?php

    }

    public function mostrarUserAdmin($id_user)
    {

        $f = null;

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $buscar = "SELECT * FROM users WHERE identificacion =:id_user";
        $result = $conexion->prepare($buscar);

        $result->bindParam(':id_user', $id_user);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }
        return $f;
    }

    public function actualizarUserAdmin($identificacion, $tipo_doc, $nombres, $apellidos, $email, $telefono, $rol, $estado)
    {
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = "UPDATE users SET tipo_doc=:tipo_doc, nombres=:nombres, apellidos=:apellidos, email=:email, telefono=:telefono, rol=:rol, estado=:estado 
                        WHERE identificacion=:identificacion";

        $result = $conexion->prepare($actualizar);


        $result->bindParam(":identificacion", $identificacion);
        $result->bindParam(":tipo_doc", $tipo_doc);
        $result->bindParam(":nombres", $nombres);
        $result->bindParam(":apellidos", $apellidos);
        $result->bindParam(":email", $email);
        $result->bindParam(":telefono", $telefono);
        $result->bindParam(":rol", $rol);
        $result->bindParam(":estado", $estado);

        $result->execute();

        ?>
        <script>
            Swal.fire({
  icon: 'success',
  title: 'Información actualizada.',
  text: '',
  confirmButtonText: '<a href="../Views/Administrador/verUsuarios.php" style="text-decoration: none; color:white;">Aceptar</a>',
})
        </script>
        <?php
    }

    // Usuarios
    /*  funciones de usuario (Cliente) */

    public function actualizarClaveUser($identificacion, $claveMd)
    {
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = "UPDATE users SET clave =:claveMd
                    WHERE identificacion=:identificacion";

        $result = $conexion->prepare($actualizar);


        $result->bindParam("identificacion", $identificacion);
        $result->bindParam("claveMd", $claveMd);

        $result->execute();


        ?>
        <script>
            Swal.fire({
  icon: 'success',
  title: 'Infomación de usuario actualizada.',
  text: '',
  confirmButtonText: '<a href="../Views/Usuario/perfilUserNew.php?id='$identificacion'" style="text-decoration: none; color:white;">Aceptar</a>',
})
        </script>
        <?php

    }
    public function actualizarFotoUser($id, $foto)
    {
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = "UPDATE users SET foto =:foto
                        WHERE identificacion=:id";

        $result = $conexion->prepare($actualizar);


        $result->bindParam("id", $id);
        $result->bindParam("foto", $foto);

        $result->execute();

        ?>
        <script>
            Swal.fire({
  icon: 'success',
  title: 'Infomación de usuario actualizada .',
  text: '',
  confirmButtonText: '<a href="../Views/Usuario/perfilUserNew.php?id='$id'" style="text-decoration: none; color:white;">Aceptar</a>',
})
        </script>
        <?php
    }
    public function modificarCuentaUser($identificacion, $tipo_doc, $nombres, $apellidos, $email, $telefono)
    {
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = "UPDATE users SET tipo_doc=:tipo_doc, nombres=:nombres, apellidos=:apellidos, email=:email, telefono=:telefono
                        WHERE identificacion=:identificacion";

        $result = $conexion->prepare($actualizar);


        $result->bindParam(":identificacion", $identificacion);
        $result->bindParam(":tipo_doc", $tipo_doc);
        $result->bindParam(":nombres", $nombres);
        $result->bindParam(":apellidos", $apellidos);
        $result->bindParam(":email", $email);
        $result->bindParam(":telefono", $telefono);

        $result->execute();

        ?>
        <script>
            Swal.fire({
  icon: 'success',
  title: 'Infomación actualizada.',
  text: '',
  confirmButtonText: '<a href="../Views/Usuario/perfilUserNew.php?id='$identificacion'" style="text-decoration: none; color:white;">Aceptar</a>',
})
        </script>
        <?php
    }

    // Usuarios

    // -Productos

    public function insertarProducto($nombre, $categoria, $precio, $descripcion, $estado, $foto)
    {

        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();


        // SELECT DE USUARIO REGISTRAADO EN EL SISTEMA
        // EL OBJETIVO DE ESTE SELECT ES VERIFICAR SI EL USUARIO YA ESTA REGISTRADO

        $consultar = "SELECT * FROM  productos WHERE id_pro=:id_pro OR nombre_pro=:nombre_pro";
        $result = $conexion->prepare($consultar);
        $result->bindParam(":id_pro", $id_pro);
        $result->bindParam(":nombre_pro", $nombre_pro);
        $result->execute();

        // COVERTIR LA VARIABLE RESULT EN UN ARREGLO (CLAVE, ROL Y ESTADO)

        $f = $result->fetch();

        if ($f) {
            // VALIDAMOS LA CONTRASEÑA

            ?>
            <script>
               Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'El producto ya está registrado!',
  confirmButtonText: '<a href="../Views/Administrador/registrarProducto.php'" style="text-decoration: none; color:white;">Aceptar</a>',
    })
            </script>
            <?php
        } else {

            // CREAMOS LA VARIABLE QUE CONTENDRÁ LA CONSULTA A EJECUTAR
            $insertar = "INSERT INTO productos(nombre_pro, categoria_pro , precio_pro, descripcion_pro, estado_pro, foto) VALUES (:nombre_pro, :categoria_pro, :precio_pro, :descripcion_pro, :estado_pro, :foto)";

            // PREPARAMOS TODO LO NECESARIO PARA EJECUTAR LA FUNCIÓN ANTERIOR
            $result = $conexion->prepare($insertar);

            //  CONVERTIMOS LOS ARGUMENTOS EN PARAMETROS

            $result->bindParam(":nombre_pro", $nombre);
            $result->bindParam(":categoria_pro", $categoria);
            $result->bindParam(":precio_pro", $precio);
            $result->bindParam(":descripcion_pro", $descripcion);
            $result->bindParam(":estado_pro", $estado);
            $result->bindParam(":foto", $foto);



            $result->execute();

            // EJECUTAMOS EL INSERT INTO

            ?>
        <script>
            Swal.fire({
  icon: 'success',
  title: 'Registrado exitosamente.',
  text: '',
  confirmButtonText: '<a href="../Views/Administrador/verProductos.php" style="text-decoration: none; color:white;">Aceptar</a>',
})
        </script>
        <?php
           
        }
    }

    public function mostrarProductos()
    {
        $f = null;

        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT * FROM productos ORDER BY nombre_pro ASC";

        $result = $conexion->prepare($consultar);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }
        return $f;
    }

    public function eliminarProducto($id)
    {
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $eliminar = "DELETE FROM productos WHERE id_pro =:id";
        $result = $conexion->prepare($eliminar);

        $result->bindParam(":id", $id);

        $result->execute();

        ?>
            <script>
                
                Swal.fire({
  icon: 'success',
  title: 'Eliminado exitosamente.',
  text: '',
  confirmButtonText: '<a href="../Views/Administrador/verProductos.php" style="text-decoration: none; color:white;">Aceptar</a>',
})

            </script>
            <?php

    }

    public function mostrarProducto($id_pro)
    {
        $f = null;

        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT * FROM productos WHERE id_pro = :id_pro";

        $result = $conexion->prepare($consultar);

        $result->bindParam(':id_pro', $id_pro);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }
        return $f;
    }

    public function modificarProducto($nombre, $categoria, $precio, $descripcion, $estado, $id_pro)
    {

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = "UPDATE productos SET nombre_pro=:nombre_pro, categoria_pro=:categoria_pro, precio_pro=:precio_pro, 
                        descripcion_pro=:descripcion_pro, estado_pro=:estado_pro  
                        
                        WHERE id_pro=:id_pro";

        $result = $conexion->prepare($actualizar);

        $result->bindParam("id_pro", $id_pro);
        $result->bindParam("nombre_pro", $nombre);
        $result->bindParam("categoria_pro", $categoria);
        $result->bindParam("precio_pro", $precio);
        $result->bindParam("descripcion_pro", $descripcion);
        $result->bindParam("estado_pro", $estado);


        $result->execute();

        ?>
            <script>
                
                Swal.fire({
  icon: 'success',
  title: 'Infomación del producto actualizada.',
  text: '',
  confirmButtonText: '<a href="../Views/Administrador/verProductos.php" style="text-decoration: none; color:white;">Aceptar</a>',
})

            </script>
            <?php
    }

    // Productos

    // -Empleados

    public function registrarEmpleado($identificacion, $tipo_doc, $nombres, $apellidos, $email, $telefono, $claveMd, $rol, $contrato, $foto)
    {

        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();


        // SELECT DE USUARIO REGISTRAADO EN EL SISTEMA
        // EL OBJETIVO DE ESTE SELECT ES VERIFICAR SI EL USUARIO YA ESTA REGISTRADO

        $consultar = "SELECT * FROM  empleados WHERE identificacion=:identificacion";
        $result = $conexion->prepare($consultar);
        $result->bindParam(":identificacion", $identificacion);
        $result->execute();

        // COVERTIR LA VARIABLE RESULT EN UN ARREGLO (CLAVE, ROL Y ESTADO)

        $f = $result->fetch();

        if ($f) {
            // VALIDAMOS LA CONTRASEÑA

            ?>
            <script>
                
                Swal.fire({
  icon: 'error',
  title: 'Opss.',
  text: 'El Empleado ya está registrado',
  confirmButtonText: '<a href="../Views/Administrador/verEmpleados.php" style="text-decoration: none; color:white;">Aceptar</a>',
})

            </script>
            <?php

            
        } else {




            // CREAMOS LA VARIABLE QUE CONTENDRÁ LA CONSULTA A EJECUTAR
            $insertar = "INSERT INTO empleados(identificacion, tipo_doc, nombres, apellidos, email, telefono, clave, rol, contrato, foto) 
                        VALUES (:identificacion, :tipo_doc, :nombres, :apellidos, :email, :telefono, :claveMd, :rol, :contrato , :foto)";

            // PREPARAMOS TODO LO NECESARIO PARA EJECUTAR LA FUNCIÓN ANTERIOR
            $result = $conexion->prepare($insertar);

            //  CONVERTIMOS LOS ARGUMENTOS EN PARAMETROS

            $result->bindParam(":identificacion", $identificacion);
            $result->bindParam(":tipo_doc", $tipo_doc);
            $result->bindParam(":nombres", $nombres);
            $result->bindParam(":apellidos", $apellidos);
            $result->bindParam(":email", $email);
            $result->bindParam(":telefono", $telefono);
            $result->bindParam(":claveMd", $claveMd);
            $result->bindParam(":rol", $rol);
            $result->bindParam(":contrato", $contrato);
            $result->bindParam(":foto", $foto);



            $result->execute();

            // EJECUTAMOS EL INSERT INTO

            ?>
            <script>
                
                Swal.fire({
  icon: 'success',
  title: 'Registrado exitosamente.',
  text: '',
  confirmButtonText: '<a href="../Views/Administrador/verEmpleados.php" style="text-decoration: none; color:white;">Aceptar</a>',
})

            </script>
            <?php
        }
    }

    public function mostrarEmpleados()
    {
        $f = null;

        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT * FROM empleados ORDER BY nombres ASC";

        $result = $conexion->prepare($consultar);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }
        return $f;
    }

    public function eliminarEmpleado($identificacion)
    {

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $eliminar = "DELETE FROM empleados WHERE identificacion=:identificacion";
        $result = $conexion->prepare($eliminar);

        $result->bindParam(":identificacion", $identificacion);

        $result->execute();

        ?>
        <script>
            
            Swal.fire({
icon: 'success',
title: 'Usuario eliminado exitosamente.',
text: '',
confirmButtonText: '<a href="../Views/Administrador/verEmpleados.php" style="text-decoration: none; color:white;">Aceptar</a>',
})

        </script>
        <?php


    }

    public function actualizarEmpleado($identificacion, $tipo_doc, $nombres, $apellidos, $email, $telefono, $contrato)
    {
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = "UPDATE empleados SET identificacion=:identificacion, nombres=:nombres, apellidos=:apellidos, email=:email, telefono=:telefono, contrato=:contrato  WHERE identificacion=:identificacion";

        $result = $conexion->prepare($actualizar);


        $result->bindParam(":identificacion", $identificacion);
        $result->bindParam(":tipo_doc", $tipo_doc);
        $result->bindParam(":nombres", $nombres);
        $result->bindParam(":apellidos", $apellidos);
        $result->bindParam(":email", $email);
        $result->bindParam(":telefono", $telefono);
        $result->bindParam(":contrato", $contrato);


        $result->execute();

        ?>
        <script>
            
            Swal.fire({
icon: 'success',
title: 'Infomación del Empleado actualizada.',
text: '',
confirmButtonText: '<a href="../Views/Administrador/verEmpleados.php" style="text-decoration: none; color:white;">Aceptar</a>',
})

        </script>
        <?php

    }

    public function mostrarEmpleado($idEmple)
    {
        $f = null;

        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT * FROM empleados WHERE identificacion =:idEmple";
        $result = $conexion->prepare($consultar);

        $result->bindParam(':idEmple', $idEmple);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }
        return $f;
    }

    // Empleados

    // -Menú

    public function registrarMenu($nombre, $ingredientes, $descripcion, $estado, $precio, $foto)
    {

        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();


        // SELECT DE USUARIO REGISTRAADO EN EL SISTEMA
        // EL OBJETIVO DE ESTE SELECT ES VERIFICAR SI EL USUARIO YA ESTA REGISTRADO

        $consultar = "SELECT * FROM  menu WHERE nombre=:nombre";
        $result = $conexion->prepare($consultar);
        $result->bindParam(":nombre", $nombre);

        $result->execute();

        // COVERTIR LA VARIABLE RESULT EN UN ARREGLO (CLAVE, ROL Y ESTADO)

        $f = $result->fetch();

        if ($f) {
            // VALIDAMOS LA CONTRASEÑA

            ?>
        <script>
            
            Swal.fire({
icon: 'error',
title: 'El producto ya está registrado.',
text: '',
confirmButtonText: '<a href="../Views/Administrador/verMenu.php" style="text-decoration: none; color:white;">Aceptar</a>',
})

        </script>
        <?php

        } else {




            // CREAMOS LA VARIABLE QUE CONTENDRÁ LA CONSULTA A EJECUTAR
            $insertar = "INSERT INTO menu(nombre, ingredientes, descripcion,estado,precio, foto) VALUES (:nombre, :ingredientes, :descripcion,:estado,:precio, :foto)";

            // PREPARAMOS TODO LO NECESARIO PARA EJECUTAR LA FUNCIÓN ANTERIOR
            $result = $conexion->prepare($insertar);

            //  CONVERTIMOS LOS ARGUMENTOS EN PARAMETROS

            $result->bindParam(":nombre", $nombre);
            $result->bindParam(":ingredientes", $ingredientes);
            $result->bindParam(":descripcion", $descripcion);
            $result->bindParam(":estado", $estado);
            $result->bindParam(":precio", $precio);
            $result->bindParam(":foto", $foto);



            $result->execute();

            // EJECUTAMOS EL INSERT INTO

            ?>
            <script>
                
                Swal.fire({
    icon: 'success',
    title: 'Registrado exitosamente.',
    text: '',
    confirmButtonText: '<a href="../Views/Administrador/verMenu.php" style="text-decoration: none; color:white;">Aceptar</a>',
    })
    
            </script>
            <?php

        }
    }

    public function mostrarPlatosMenu()
    {
        $f = null;

        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT * FROM menu";

        $result = $conexion->prepare($consultar);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }
        return $f;
    }

    public function eliminarPlato($id)
    {

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $eliminar = "DELETE FROM menu WHERE id_menu =:id";
        $result = $conexion->prepare($eliminar);

        $result->bindParam(":id", $id);

        $result->execute();


        ?>
            <script>
                
                Swal.fire({
    icon: 'success',
    title: 'Plato eliminado exitosamente .',
    text: '',
    confirmButtonText: '<a href="../Views/Administrador/verMenu.php" style="text-decoration: none; color:white;">Aceptar</a>',
    })
    
            </script>
            <?php


    }

    public function mostrarMenu($idMenu)
    {
        $f = null;

        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT * FROM menu WHERE id_menu =:idMenu";

        $result = $conexion->prepare($consultar);

        $result->bindParam(':idMenu', $idMenu);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }
        return $f;
    }

    public function modificarMenu($nombre, $ingredientes, $descripcion, $estado, $precio, $id_menu )
    {

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = "UPDATE menu SET nombre=:nombre, ingredientes=:ingredientes, 
                        descripcion=:descripcion, estado=:estado, precio=:precio WHERE id_menu =:id_menu ";

        $result = $conexion->prepare($actualizar);

        $result->bindParam("id_menu ", $id_menu );
        $result->bindParam("nombre", $nombre);
        $result->bindParam("ingredientes", $ingredientes);
        $result->bindParam("descripcion", $descripcion);
        $result->bindParam("estado", $estado);
        $result->bindParam("precio", $precio);



        $result->execute();

        
        ?>
            <script>
                
                Swal.fire({
    icon: 'success',
    title: 'Infomación del producto actualizada .',
    text: '',
    confirmButtonText: '<a href="../Views/Administrador/verMenu.php" style="text-decoration: none; color:white;">Aceptar</a>',
    })
    
            </script>
            <?php

    }

    public function mostrarPlatosMenufront()
    {
        $f = null;

        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT * FROM menu";

        $result = $conexion->prepare($consultar);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }
        return $f;
    }

    // Menú

    // -Sedes

    public function registrarSede($identificacion, $tipo_doc, $nombres, $apellidos, $email, $telefono_sede, $direccion_sede, $estado_sede, $foto_sede)
    {


        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();


        // SELECT DE USUARIO REGISTRAADO EN EL SISTEMA
        // EL OBJETIVO DE ESTE SELECT ES VERIFICAR SI EL USUARIO YA ESTA REGISTRADO

        $consultar = "SELECT * FROM  sedes WHERE id_sede=:id_sede";
        $result = $conexion->prepare($consultar);
        $result->bindParam(":id_sede", $id_sede);
        $result->execute();

        // COVERTIR LA VARIABLE RESULT EN UN ARREGLO (CLAVE, ROL Y ESTADO)

        $f = $result->fetch();

        if ($f) {
            // VALIDAMOS LA CONTRASEÑA
            ?>
            <script>
                
                Swal.fire({
    icon: 'error',
    title: 'Opss.',
    text: 'La sede ya está registrada',
    confirmButtonText: '<a href="../Views/Administrador/verSedes.php" style="text-decoration: none; color:white;">Aceptar</a>',
    })
    
            </script>
            <?php

        } else {


            // CREAMOS LA VARIABLE QUE CONTENDRÁ LA CONSULTA A EJECUTAR
            $insertar = "INSERT INTO sedes(identificacion, tipo_doc, nombres, apellidos, email, telefono_sede, direccion_sede, estado_sede, foto) VALUES 
                    (:identificacion, :tipo_doc, :nombres, :apellidos, :email, :telefono_sede, :direccion_sede, :estado_sede, :foto)";


            // PREPARAMOS TODO LO NECESARIO PARA EJECUTAR LA FUNCIÓN ANTERIOR
            $result = $conexion->prepare($insertar);

            //  CONVERTIMOS LOS ARGUMENTOS EN PARAMETROS

            $result->bindParam(":identificacion", $identificacion);
            $result->bindParam(":tipo_doc", $tipo_doc);
            $result->bindParam(":nombres", $nombres);
            $result->bindParam(":apellidos", $apellidos);
            $result->bindParam(":email", $email);
            $result->bindParam(":telefono_sede", $telefono_sede);
            $result->bindParam(":direccion_sede", $direccion_sede);
            $result->bindParam(":estado_sede", $estado_sede);
            $result->bindParam(":foto", $foto_sede);

            $result->execute();

            // EJECUTAMOS EL INSERT INTO

            ?>
            <script>
                
                Swal.fire({
    icon: 'success',
    title: 'Registrado exitosamente.',
    text: '',
    confirmButtonText: '<a href="../Views/Administrador/verSedes.php" style="text-decoration: none; color:white;">Aceptar</a>',
    })
    
            </script>
            <?php
        }
    }

    public function mostrarSedes()
    {
        $f = null;

        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT * FROM sedes";

        $result = $conexion->prepare($consultar);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }
        return $f;
    }

    public function eliminarSede($id_sede)
    {
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $eliminar = "DELETE FROM sedes WHERE id_sede =:id_sede";
        $result = $conexion->prepare($eliminar);

        $result->bindParam(":id_sede", $id_sede);

        $result->execute();


        ?>
        <script>
            
            Swal.fire({
icon: 'success',
title: 'La sede fue eliminada correctamente.',
text: '',
confirmButtonText: '<a href="../Views/Administrador/verSedes.php" style="text-decoration: none; color:white;">Aceptar</a>',
})

        </script>
        <?php
     
    }

    public function mostrarSede($id_sede)
    {
        $f = null;

        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT * FROM sedes WHERE id_sede = :id_sede";

        $result = $conexion->prepare($consultar);

        $result->bindParam(':id_sede', $id_sede);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }
        return $f;
    }

    public function modificarSede($identificacion, $tipo_doc, $nombres, $apellidos, $email, $telefono_sede, $direccion_sede, $estado_sede, $id_sede)
    {

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = "UPDATE sedes SET identificacion=:identificacion, tipo_doc=:tipo_doc, nombres=:nombres, 
                        apellidos=:apellidos, email=:email, telefono_sede=:telefono_sede, direccion_sede=:direccion_sede, estado_sede=:estado_sede    
                        
                        WHERE id_sede=:id_sede";

        $result = $conexion->prepare($actualizar);

        $result->bindParam("id_sede", $id_sede);
        $result->bindParam("identificacion", $identificacion);
        $result->bindParam("tipo_doc", $tipo_doc);
        $result->bindParam("nombres", $nombres);
        $result->bindParam("apellidos", $apellidos);
        $result->bindParam("email", $email);
        $result->bindParam("telefono_sede", $telefono_sede);
        $result->bindParam("direccion_sede", $direccion_sede);
        $result->bindParam("estado_sede", $estado_sede);



        $result->execute();

        ?>
        <script>
            
            Swal.fire({
icon: 'success',
title: 'Infomación de la sede actualizada.',
text: '',
confirmButtonText: '<a href="../Views/Administrador/verSedes.php" style="text-decoration: none; color:white;">Aceptar</a>',
})

        </script>
        <?php

    }

    // Sedes

    // -Inventario

    public function registrarEntradaInventario($nombre, $tipo, $cantidad, $descripcion, $precio, $foto)
    {

        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();


        // SELECT DE USUARIO REGISTRAADO EN EL SISTEMA
        // EL OBJETIVO DE ESTE SELECT ES VERIFICAR SI EL USUARIO YA ESTA REGISTRADO

        $consultar = "SELECT * FROM  inventario WHERE id_inventario =:id_inventario";
        $result = $conexion->prepare($consultar);
        $result->bindParam(":id_inventario", $id_inventario);

        $result->execute();

        // COVERTIR LA VARIABLE RESULT EN UN ARREGLO (CLAVE, ROL Y ESTADO)

        $f = $result->fetch();

        if ($f) {
            // VALIDAMOS LA CONTRASEÑA

            ?>
        <script>
            
            Swal.fire({
icon: 'error',
title: 'Opss..',
text: 'Ya existe en el inventario.',
confirmButtonText: '<a href="../Views/Administrador/verInventario.php" style="text-decoration: none; color:white;">Aceptar</a>',
})

        </script>
        <?php

        } else {




            // CREAMOS LA VARIABLE QUE CONTENDRÁ LA CONSULTA A EJECUTAR
            $insertar = "INSERT INTO inventario (nombre, tipo, cantidad, descripcion, precio, foto) VALUES (:nombre, :tipo, :cantidad, :descripcion, :precio, :foto)";


            // PREPARAMOS TODO LO NECESARIO PARA EJECUTAR LA FUNCIÓN ANTERIOR
            $result = $conexion->prepare($insertar);

            //  CONVERTIMOS LOS ARGUMENTOS EN PARAMETROS

            $result->bindParam(":nombre", $nombre);
            $result->bindParam(":tipo", $tipo);
            $result->bindParam(":cantidad", $cantidad);
            $result->bindParam(":descripcion", $descripcion);
            $result->bindParam(":precio", $precio);
            $result->bindParam(":foto", $foto);


            $result->execute();

            // EJECUTAMOS EL INSERT INTO

            ?>
        <script>
            
            Swal.fire({
icon: 'success',
title: 'Registrado exitosamente.',
text: '',
confirmButtonText: '<a href="../Views/Administrador/verInventario.php" style="text-decoration: none; color:white;">Aceptar</a>',
})

        </script>
        <?php
        }
    }

    public function mostrarInventario()
    {
        $f = null;

        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT * FROM inventario";

        $result = $conexion->prepare($consultar);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }
        return $f;
    }

    public function eliminarEntradaInventario($id_inventario)
    {

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $eliminar = "DELETE FROM inventario WHERE id_inventario =:id_inventario";
        $result = $conexion->prepare($eliminar);

        $result->bindParam(":id_inventario", $id_inventario);

        $result->execute();

        ?>
        <script>
            
            Swal.fire({
icon: 'success',
title: 'El registro de entrada del inventario fue eliminado correctamente.',
text: '',
confirmButtonText: '<a href="../Views/Administrador/verInventario.php" style="text-decoration: none; color:white;">Aceptar</a>',
})

        </script>
        <?php


    }

    public function mostrarEntradasInventario($id_inventario)
    {
        $f = null;

        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT * FROM inventario WHERE id_inventario = :id_inventario";

        $result = $conexion->prepare($consultar);

        $result->bindParam(':id_inventario', $id_inventario);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }
        return $f;
    }

    public function actualizarEntradaInventario($nombre, $tipo, $cantidad, $descripcion, $precio, $id_inventario)
    {
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = "UPDATE inventario SET nombre=:nombre, tipo=:tipo, cantidad=:cantidad, descripcion=:descripcion, precio=:precio 
                        WHERE id_inventario=:id_inventario";

        $result = $conexion->prepare($actualizar);
        $result->bindParam(":id_inventario", $id_inventario);
        $result->bindParam(":nombre", $nombre);
        $result->bindParam(":tipo", $tipo);
        $result->bindParam(":cantidad", $cantidad);
        $result->bindParam(":descripcion", $descripcion);
        $result->bindParam(":precio", $precio);


        $result->execute();

        ?>
        <script>
            
            Swal.fire({
icon: 'success',
title: 'La Información de la entrada en el inventario ha sido actualizada.',
text: '',
confirmButtonText: '<a href="../Views/Administrador/verInventario.php" style="text-decoration: none; color:white;">Aceptar</a>',
})

        </script>
        <?php
    }

    // Inventario

    // Proveedores
    public function registrarProveedor($identificacion, $nombres, $telefono, $direccion, $foto)
    {

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT * FROM  users WHERE identificacion=:identificacion";
        $result = $conexion->prepare($consultar);
        $result->bindParam(":identificacion", $identificacion);
        $result->execute();

        // COVERTIR LA VARIABLE RESULT EN UN ARREGLO (CLAVE, ROL Y ESTADO)

        $f = $result->fetch();

        if ($f) {
            // VALIDAMOS LA CONTRASEÑA

            ?>
        <script>
            
            Swal.fire({
icon: 'error',
title: 'Opps..',
text: 'El usuario ya está registrado.',
confirmButtonText: '<a href="../Views/Administrador/registrarProveedor.php" style="text-decoration: none; color:white;">Aceptar</a>',
})

        </script>
        <?php

        } else {

            $insertar = "INSERT INTO proveedores(identificacion, nombres, telefono, direccion, foto) VALUES (:identificacion, :nombres, :telefono, :direccion, :foto)";

            $result = $conexion->prepare($insertar);

            $result->bindParam(":identificacion", $identificacion);
            $result->bindParam(":nombres", $nombres);
            $result->bindParam(":telefono", $telefono);
            $result->bindParam(":direccion", $direccion);
            $result->bindParam(":foto", $foto);
            $result->execute();

            ?>
        <script>
            
            Swal.fire({
icon: 'success',
title: 'Registrado exitosamente.',
text: '',
confirmButtonText: '<a href="../Views/Administrador/verProveedores.php" style="text-decoration: none; color:white;">Aceptar</a>',
})

        </script>
        <?php

        }

    }

    public function mostrarProveedores()
    {
        $f = null;

        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT * FROM proveedores";

        $result = $conexion->prepare($consultar);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }
        return $f;
    }

    public function mostrarProveedor($id_Proveedor)
    {
        $f = null;

        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT * FROM proveedores";

        $result = $conexion->prepare($consultar);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }
        return $f;
    }

    public function actualizarProveedor($identificacion, $nombres, $telefono, $direccion)
    {
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = "UPDATE proveedores SET nombres=:nombres, telefono=:telefono, direccion=:direccion
                        WHERE identificacion=:identificacion";

        $result = $conexion->prepare($actualizar);
        $result->bindParam(":identificacion", $identificacion);
        $result->bindParam(":nombres", $nombres);
        $result->bindParam(":telefono", $telefono);
        $result->bindParam(":direccion", $direccion);

        $result->execute();

        ?>
        <script>
            
            Swal.fire({
icon: 'success',
title: 'La Información del Proveedor ha sido actualizada.',
text: '',
confirmButtonText: '<a href="../Views/Administrador/verProveedores.php" style="text-decoration: none; color:white;">Aceptar</a>',
})

        </script>
        <?php

    }

    public function eliminarProveedor($id)
    {
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $eliminar = "DELETE FROM proveedores WHERE identificacion =:identificacion";
        $result = $conexion->prepare($eliminar);

        $result->bindParam(":identificacion", $id);

        $result->execute();

        ?>
        <script>
            
            Swal.fire({
icon: 'success',
title: 'El Proveedor fue eliminado correctamente.',
text: '',
confirmButtonText: '<a href="../Views/Administrador/verProveedores.php" style="text-decoration: none; color:white;">Aceptar</a>',
})

        </script>
        <?php
        
    }
    // Proveedores

    // -Perfil

    public function verPerfil($id)
    {

        $f = null;

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $buscar = "SELECT * FROM users WHERE identificacion =:id";
        $result = $conexion->prepare($buscar);

        $result->bindParam(':id', $id);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }
        return $f;
    }

    public function modificarCuentaAdmin($identificacion, $tipo_doc, $nombres, $apellidos, $email, $telefono)
    {
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = "UPDATE users SET tipo_doc=:tipo_doc, nombres=:nombres, apellidos=:apellidos, email=:email, telefono=:telefono
                        WHERE identificacion=:identificacion";

        $result = $conexion->prepare($actualizar);


        $result->bindParam(":identificacion", $identificacion);
        $result->bindParam(":tipo_doc", $tipo_doc);
        $result->bindParam(":nombres", $nombres);
        $result->bindParam(":apellidos", $apellidos);
        $result->bindParam(":email", $email);
        $result->bindParam(":telefono", $telefono);

        $result->execute();

        ?>
        <script>
            
            Swal.fire({
icon: 'success',
title: 'Infomación actualizada.',
text: '',
confirmButtonText: '<a href="../Views/Administrador/perfil.php?id=$identificacion" style="text-decoration: none; color:white;">Aceptar</a>',
})

        </script>
        <?php

    }

    public function actualizarFotoAdmin($id, $foto)
    {
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = "UPDATE users SET foto =:foto
                        WHERE identificacion=:id";

        $result = $conexion->prepare($actualizar);


        $result->bindParam("id", $id);
        $result->bindParam("foto", $foto);

        $result->execute();

        
        ?>
        <script>
            
            Swal.fire({
icon: 'success',
title: 'Infomación actualizada.',
text: '',
confirmButtonText: '<a href="../Views/Administrador/perfil.php?id=$id" style="text-decoration: none; color:white;">Aceptar</a>',
})

        </script>
        <?php

    }

    public function actualizarClaveAdmin($identificacion, $claveMd)
    {
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = "UPDATE users SET clave =:claveMd
                        WHERE identificacion=:identificacion";

        $result = $conexion->prepare($actualizar);


        $result->bindParam("identificacion", $identificacion);
        $result->bindParam("claveMd", $claveMd);

        $result->execute();

        ?>
        <script>
            
            Swal.fire({
icon: 'success',
title: 'Infomación actualizada.',
text: '',
confirmButtonText: '<a href="../Views/Administrador/perfil.php?id=$identificacion" style="text-decoration: none; color:white;">Aceptar</a>',
})

        </script>
        <?php

    }

    public function actualizarClaveEmpleado($identificacion, $claveMd)
    {
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = "UPDATE users SET clave =:claveMd
                        WHERE identificacion=:identificacion";

        $result = $conexion->prepare($actualizar);


        $result->bindParam("identificacion", $identificacion);
        $result->bindParam("claveMd", $claveMd);

        $result->execute();

        ?>
        <script>
            
            Swal.fire({
icon: 'success',
title: 'Infomación actualizada.',
text: '',
confirmButtonText: '<a href="../Views/Empleado/datosCuentaEmpleado.php" style="text-decoration: none; color:white;">Aceptar</a>',
})

        </script>
        <?php

    }

    // Perfil

    // -Home Admin

    public function contarUsuarios()
    {
        // Crear una conexión a la base de datos
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        // Consulta SQL para contar usuarios
        $consulta = "SELECT COUNT(*) FROM users";

        // Ejecutar la consulta
        $result = $conexion->prepare($consulta);
        $result->execute();

        // Obtener el resultado
        $count = $result->fetchColumn();

        // Cerrar la conexión

        return $count;
    }

    public function contarEmpleados()
    {
        // Crear una conexión a la base de datos
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        // Consulta SQL para contar usuarios
        $consulta = "SELECT COUNT(*) FROM empleados";

        // Ejecutar la consulta
        $result = $conexion->prepare($consulta);
        $result->execute();

        // Obtener el resultado
        $count = $result->fetchColumn();

        return $count;
    }

    public function contarSedes()
    {
        // Crear una conexión a la base de datos
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        // Consulta SQL para contar usuarios
        $consulta = "SELECT COUNT(*) FROM sedes";

        // Ejecutar la consulta
        $result = $conexion->prepare($consulta);
        $result->execute();

        // Obtener el resultado
        $count = $result->fetchColumn();

        return $count;
    }

    // Home Admin

    // Módulos
}


class ValidarSesion
{

    public function iniciarSesion($email, $clave)
    {

        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT * FROM  users WHERE email=:email and clave =:clave";

        $result = $conexion->prepare($consultar);

        $result->bindParam(":email", $email);

        $result->bindParam(":clave", $clave);

        $result->execute();

        // COVERTIR LA VARIABLE RESULT EN UN ARREGLO (CLAVE, ROL Y ESTADO)

        $f = $result->fetch();

        if ($f) {
            // VALIDAMOS LA CONTRASEÑA

            if ($f['clave'] == $clave) {

                if ($f['estado'] == "Activo") {
                    // SE REALIZA EL INICIO DE SESION

                    session_start();
                    // CREAMOS VARIABLES DE SESION

                    $_SESSION['id'] = $f['identificacion'];
                    $_SESSION['email'] = $f['email'];
                    $_SESSION['rol'] = $f['rol'];
                    $_SESSION['AUTENTICADO'] = "SI";

                    // validamos el rol para redireccionar a la interfaz correcta

                    switch ($f['rol']) {
                        case 'Administrador':

                            echo "<script>
                                    location.href='../Views/Administrador/home.php'
                                </script>";
                            break;
                        case 'Cliente':

                            echo "<script>
                                    location.href='../Views/Usuario/homeUser.php'
                                </script>";
                            break;
                        case 'Empleado':
                            echo "<script>
                                    location.href='../Views/Empleado/index.php'
                                </script>";
                            break;
                    }



                } else {

                    ?>
            <script>
                Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Contactese con el Admin.',
      confirmButtonText: '<a href="../Views/client-site/login.html" style="text-decoration: none; color:white;">Aceptar</a>',
    })
            </script>
            <?php
                }

            } else {

                ?>
            <script>
                Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'El usuario no existe.',
      confirmButtonText: '<a href="../Views/client-site/login.html" style="text-decoration: none; color:white;">Aceptar</a>',
    })
            </script>
            <?php
        
            }
        } else {
            ?>
            <script>
                Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'La contraseña es incorrecta.',
      confirmButtonText: '<a href="../Views/client-site/login.html" style="text-decoration: none; color:white;">Aceptar</a>',
    })
            </script>
            <?php
        }
    }

    public function cerrarSesion()
    {
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        session_start();
        session_destroy();
        

        echo "
                <script>
                    location.href='../Views/client-site/login.html'
                </script>
            ";
    }

}
?>
</body>
</html>




