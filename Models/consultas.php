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

            echo '<script>
                            alert("El usuario ya está registrado ;)")
                        </script>';

            echo "<script>
                            location.href='../Views/Administrador/registrarUsuario.php'
                        </script>";
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

            echo '<script>
                        alert("Registrado exitosamente..")
                        </script>';

            echo "<script>
                            location.href='../Views/Administrador/verUsuarios.php'
                        </script>";
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

            echo '<script>
                            alert("El usuario ya está registrado ;)")
                        </script>';

            echo "<script>
                            location.href='../Views/client-site/login.html'
                        </script>";
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

            echo '<script>
                    alert("Registrado exitosamente..")
                    </script>';

            echo "<script>
                        location.href='../Views/client-site/login.html'
                    </script>";
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

        echo '
                    <script>
                        alert("Usuario eliminado exitosamente ;)")
                    </script>';

        echo "<script>
                        location.href='../Views/Administrador/verUsuarios.php'
                    </script>";

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

        echo '<script>
                            alert("Infomación de usuario actualizada ;)")
                        </script>';

        echo "<script>
                            location.href='../Views/Administrador/verUsuarios.php'
                        </script>";
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

        echo '<script>
                        alert("Infomación de usuario actualizada ;)")
                    </script>';

        echo "<script>
                        location.href='../Views/Usuario/perfilUserNew.php?id=$identificacion'
                    </script>";
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

        echo '<script>
                            alert("Infomación de usuario actualizada ;)")
                        </script>';

        echo "<script>
                            location.href='../Views/Usuario/perfilUserNew.php?id=$id'
                        </script>";
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

        echo '<script>
                            alert("Infomación actualizada ;)")
                        </script>';

        echo "<script>
                            location.href='../Views/Usuario/perfilUserNew.php?id=$identificacion'
                        </script>";
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

            echo '<script>
                            alert("El producto ya está registrado ;)")
                        </script>';

            echo "<script>
                            location.href='../Views/Administrador/registrarProducto.php'
                        </script>";
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
            echo '<script>
                            alert("Registrado exitosamente..")
                            </script>';

            echo "<script>
                                location.href='../Views/Administrador/verProductos.php'
                            </script>";
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

        echo '
                    <script>
                        alert("Usuario Producto fue eliminado correctamente ;)")
                    </script>';

        echo "
                    <script>
                        location.href='../Views/Administrador/verProductos.php'
                    </script>";
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

        echo '<script>
                            alert("Infomación del producto actualizada ;)")
                        </script>';

        echo "<script>
                            location.href='../Views/Administrador/verProductos.php'
                        </script>";
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

            echo '<script>
                            alert("El Empleado ya está registrado ;)")
                        </script>';

            echo "<script>
                            location.href='../Views/Administrador/verEmpleados.php'
                        </script>";
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
            echo '<script>
                        alert("Registrado exitosamente.")
                        </script>';

            echo "<script>
                            location.href='../Views/Administrador/verEmpleados.php'
                        </script>";
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

        echo '<script>
                            alert("Usuario eliminado exitosamente ;)")
                        </script>';

        echo "<script>
                            location.href='../Views/Administrador/verEmpleados.php'
                        </script>";

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

        echo '<script>
                            alert("Infomación del Empleado actualizada ;)")
                        </script>';

        echo "<script>
                            location.href='../Views/Administrador/verEmpleados.php'
                        </script>";
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

            echo '<script>
                            alert("El producto ya está registrado ;)")
                        </script>';

            echo "<script>
                            location.href='../Views/Administrador/verMenu.php'
                        </script>";
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
            echo '<script>
                        alert("Registrado exitosamente..")
                        </script>';

            echo "<script>
                            location.href='../Views/Administrador/verMenu.php'
                        </script>";
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

        $eliminar = "DELETE FROM menu WHERE id_menu=:id";
        $result = $conexion->prepare($eliminar);

        $result->bindParam(":id", $id);

        $result->execute();

        echo '<script>
                            alert("Plato eliminado exitosamente ;)")
                        </script>';

        echo "<script>
                            location.href='../Views/Administrador/verMenu.php'
                        </script>";

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

    public function modificarMenu($nombre, $ingredientes, $descripcion, $estado, $precio, $id)
    {

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = "UPDATE menu SET nombre=:nombre, ingredientes=:ingredientes, 
                        descripcion=:descripcion, estado=:estado, precio=:precio WHERE id=:id";

        $result = $conexion->prepare($actualizar);

        $result->bindParam("id", $id);
        $result->bindParam("nombre", $nombre);
        $result->bindParam("ingredientes", $ingredientes);
        $result->bindParam("descripcion", $descripcion);
        $result->bindParam("estado", $estado);
        $result->bindParam("precio", $precio);



        $result->execute();

        echo '
                        <script>
                            alert("Infomación del producto actualizada ;)")
                        </script>';

        echo "
                        <script>
                            location.href='../Views/Administrador/verMenu.php'
                        </script>";
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

    public function registrarSede($identificacion_admin, $tipo_doc, $nombres, $apellidos, $email, $telefono_sede, $direccion_sede, $estado_sede, $foto_sede)
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

            echo '<script>
                            alert("La sede ya está registrada ;)"
                        </script>';

            echo "<script>
                            location.href='../Views/Administrador/verSedes.php'
                        </script>";
        } else {


            // CREAMOS LA VARIABLE QUE CONTENDRÁ LA CONSULTA A EJECUTAR
            $insertar = "INSERT INTO sedes(identificacion_admin, tipo_doc, nombres, apellidos, email, telefono_sede, direccion_sede, estado_sede, foto) VALUES 
                    (:identificacion_admin, :tipo_doc, :nombres, :apellidos, :email, :telefono_sede, :direccion_sede, :estado_sede, :foto)";


            // PREPARAMOS TODO LO NECESARIO PARA EJECUTAR LA FUNCIÓN ANTERIOR
            $result = $conexion->prepare($insertar);

            //  CONVERTIMOS LOS ARGUMENTOS EN PARAMETROS

            $result->bindParam(":identificacion_admin", $identificacion_admin);
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
            echo '<script>
                        alert("Registrado exitosamente..")
                        </script>';

            echo "<script>
                            location.href='../Views/Administrador/verSedes.php'
                        </script>";
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

        echo '
                    <script>
                        alert("La sede fue eliminada correctamente ;)")
                    </script>';

        echo "
                    <script>
                        location.href='../Views/Administrador/verSedes.php'
                    </script>";
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

    public function modificarSede($identificacion_admin, $tipo_doc, $nombres, $apellidos, $email, $telefono_sede, $direccion_sede, $estado_sede, $id_sede)
    {

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = "UPDATE sedes SET identificacion_admin=:identificacion_admin, tipo_doc=:tipo_doc, nombres=:nombres, 
                        apellidos=:apellidos, email=:email, telefono_sede=:telefono_sede, direccion_sede=:direccion_sede, estado_sede=:estado_sede    
                        
                        WHERE id_sede=:id_sede";

        $result = $conexion->prepare($actualizar);

        $result->bindParam("id_sede", $id_sede);
        $result->bindParam("identificacion_admin", $identificacion_admin);
        $result->bindParam("tipo_doc", $tipo_doc);
        $result->bindParam("nombres", $nombres);
        $result->bindParam("apellidos", $apellidos);
        $result->bindParam("email", $email);
        $result->bindParam("telefono_sede", $telefono_sede);
        $result->bindParam("direccion_sede", $direccion_sede);
        $result->bindParam("estado_sede", $estado_sede);



        $result->execute();

        echo '<script>
                            alert("Infomación de la sede actualizada ;)")
                        </script>';

        echo "<script>
                            location.href='../Views/Administrador/verSedes.php'
                        </script>";
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

            echo '<script>
                            alert(" N/A ")
                        </script>';

            echo "<script>
                            location.href='../Views/Administrador/verInventario.php'
                        </script>";
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
            echo '<script>
                    alert("Registrado exitosamente..")
                        </script>';

            echo "<script>
                        location.href='../Views/Administrador/verInventario.php'
                    </script>";
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

        echo '
                     <script>
                        alert("El registro de entrada del inventario fue eliminado correctamente  ;)")
                    </script>';

        echo "
                     <script>
                        location.href='../Views/Administrador/verInventario.php'
                    </script>";

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

        echo '<script>
                            alert("La Información de la entrada en el inventario ha sido actualizada ;)")
                        </script>';

        echo "<script>
                            location.href='../Views/Administrador/verInventario.php'
                        </script>";
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

            echo '<script>
                            alert("El usuario ya está registrado ;)")
                        </script>';

            echo "<script>
                            location.href='../Views/Administrador/registrarProveedor.php'
                        </script>";
        } else {

            $insertar = "INSERT INTO proveedores(identificacion, nombres, telefono, direccion, foto) VALUES (:identificacion, :nombres, :telefono, :direccion, :foto)";

            $result = $conexion->prepare($insertar);

            $result->bindParam(":identificacion", $identificacion);
            $result->bindParam(":nombres", $nombres);
            $result->bindParam(":telefono", $telefono);
            $result->bindParam(":direccion", $direccion);
            $result->bindParam(":foto", $foto);
            $result->execute();

            echo '<script>
                        alert("Registrado exitosamente..")
                        </script>';

            echo "<script>
                            location.href='../Views/Administrador/verProveedores.php'
                        </script>";
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

        echo '<script>
                            alert("La Información del Proveedor ha sido actualizada ;)")
                        </script>';

        echo "<script>
                            location.href='../Views/Administrador/verProveedores.php'
                        </script>";
    }

    public function eliminarProveedor($id)
    {
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $eliminar = "DELETE FROM proveedores WHERE identificacion =:identificacion";
        $result = $conexion->prepare($eliminar);

        $result->bindParam(":identificacion", $id);

        $result->execute();

        echo '
                     <script>
                        alert("El Proveedor fue eliminado correctamente  ;)")
                    </script>';

        echo "
                     <script>
                        location.href='../Views/Administrador/verProveedores.php'
                    </script>";
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

        echo '<script>
                            alert("Infomación actualizada ;)")
                        </script>';

        echo "<script>
                            location.href='../Views/Administrador/perfil.php?id=$identificacion'
                        </script>";
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

        echo '<script>
                            alert("Infomación de usuario actualizada ;)")
                        </script>';

        echo "<script>
                            location.href='../Views/Administrador/perfil.php?id=$id'
                        </script>";
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

        echo '<script>
                            alert("Infomación de usuario actualizada ;)")
                        </script>';

        echo "<script>
                            location.href='../Views/Administrador/perfil.php?id=$identificacion'
                        </script>";
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

        echo '<script>
                            alert("Infomación de usuario actualizada ;)")
                        </script>';

        echo "<script>
                            location.href='../Views/Empleado/datosCuentaEmple.php'
                        </script>";
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
                    echo '<script>
                        alert("Contactese con el Admin.")
                    </script>';

                    echo "<script>
                        location.href='../Views/client-site/login.html'
                    </script>";
                }

            } else {
                echo '<script>
                    alert("El usuario no existe.")
                </script>';

                echo "<script>
                    location.href='../Views/client-site/login.html'
                </script>";
            }
        } else {
            echo '<script>
                    alert("La clave no es correcta")
                </script>';

            echo "<script>
                    location.href='../Views/client-site/login.html'
                </script>";
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