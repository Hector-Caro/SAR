<?php

  // Usuarios
    function cargarUsuarios(){

          $objConsultas = new Consultas();
          $result = $objConsultas->mostrarUsersAdmin();

          if (!isset($result)) {
              echo '<h5 style="padding: 20px;">NO HAY USUARIOS REGISTRADOS ;)</h5>';
          }
          else {
              foreach ($result as  $f) {
                  echo '
                      <tr>
                          <td>
                            <img src="../'.$f['foto'].'" alt="user-avatar" class="d-block rounded fotoUser" height="100" width="100" id="uploadedAvatar">
                          </td>
                          <td>'. $f['nombres'] .'</td>
                          <td>'. $f['apellidos'] .'</td>
                          <td>'. $f['rol'] .'</td>
                          <td><span class="badge bg-label-dark">'. $f['estado'] .'</span></td>

                          <td>
                            <div class="dropdown">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="modificarUsuario.php?id='.$f['identificacion'].'"
                                  ><i class="bx bx-edit-alt me-1"></i> Editar</a
                                >
                                <a class="dropdown-item" href="../../Controllers/eliminarUserAdmin.php?id='.$f['identificacion'].'"
                                  ><i class="bx bx-trash me-1"></i> Eliminar</a
                                >
                              </div>
                            </div>
                          </td>
                      </tr>
                  ';
              }
          }
    }

    function cargarUsuarioEditar(){

      // ATERRIZAMOS LA PK ENVIADA DESDE LA TABLA
      $id_user = $_GET['id'];


      // ENVIAMOS LA PK A UNA FUNCION DE LA CLASE CONSULTAS
      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarUserAdmin($id_user);
      // PINTAMOS LA INFORMACION CONSULTADA EN EL ARTEFACTO(FORM)

      foreach ($result as  $f) {
        echo '
          <form action="../../Controllers/actualizarUserAdmin.php" method="POST" enctype="multipart/form-data">  
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label">Identificación</label>
                    <input
                    class="form-control"
                    type="number"
                    value="'.$f['identificacion'].'"
                    readonly
                    name="identificacion"
                    placeholder="123456789"
                    autofocus />
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Tipo de Documento</label>
                    <select name="tipo_doc" class="select2 form-select">
                        <option value="'.$f['tipo_doc'].'">'.$f['tipo_doc'].'</option>
                        <option value="CC">CC</option>
                        <option value="CE">CE</option>
                        <option value="Pasaporte">Pasaporte</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Nombres</label>
                    <input
                    class="form-control"
                    type="text"
                    name="nombres"
                    value="'.$f['nombres'].'"
                    placeholder="Hector Estiven" />
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Apellidos</label>
                    <input
                    type="text"
                    class="form-control"
                    name="apellidos"
                    value="'.$f['apellidos'].'"
                    placeholder="Caro Moreras" />
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Correo</label>
                    <div class="input-group input-group-merge">
                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="'.$f['email'].'"
                        placeholder="example@example.com" />
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Teléfono</label>
                    <input type="number" 
                    class="form-control" 
                    name="telefono" 
                    value="'.$f['telefono'].'"
                    placeholder="323 233 2333" />
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Rol</label>
                    <select name="rol" class="select2 form-select">
                        <option value="'.$f['rol'].'">'.$f['rol'].'</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Empleado">Empleado</option>
                        <option value="Cliente">Cliente</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Estado</label>
                    <select name="estado" class="select2 form-select">
                        <option value="'.$f['estado'].'">'.$f['estado'].'</option>
                        <option value="Activo">Activo</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Bloqueado">Bloqueado</option>
                    </select>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Actualizar Datos</button>
                    <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                </div>
            <div>
          </form>
        ';
      }
    }

    function cargarUsuariosReportes(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarUsersAdmin();
      
      if (!isset($result)) {
          echo '<h2>NO HAY USUARIOS REGISTRADOS ;)</h2>';
      }
      else {
          foreach ($result as  $f) {
              echo '
              <tr>
                  <td>'. $f['identificacion'] .'</td>
                  <td>'. $f['nombres'] .'</td>
                  <td>'. $f['apellidos'] .'</td>
                  <td>'. $f['email'] .'</td>
                  <td>'. $f['telefono'] .'</td>
                  <td>'. $f['rol'] .'</td>
                  <td>'. $f['estado'] .'</td>
                  
              </tr>
              ';
          }
      }
    }
  
  // Productos
    function cargarProductos(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarProductos();
      
      if (!isset($result)) {
          echo '<h5 style="padding: 20px;">NO HAY PRODUCTOS REGISTRADOS ;)</h5>';
      }
      else {
          foreach ($result as  $f) {
              echo '
                <tr>
                <td>
                  <img src="../'.$f['foto'].'" alt="Foto User" style="widht: 100px; height: 100px; border-radius: 5%">
                </td>
                <td>'. $f['nombre_pro'] .'</td>
                <td>'. $f['categoria_pro'] .'</td>
                <td>$ '. $f['precio_pro'] .'</td>
                <td><p style:"white-space: initial;">'. $f['descripcion_pro'] .'</p></td>
                  <td><span class="badge bg-label-dark">'. $f['estado_pro'] .'</span></td>

                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="modificarProducto.php?id='.$f['id_pro'].'">
                        <i class="bx bx-edit-alt me-1"></i> Editar</a>
                        <a class="dropdown-item" href="../../Controllers/eliminarProducto.php?id='.$f['id_pro'].'"
                          ><i class="bx bx-trash me-1"></i> Eliminar</a
                        >
                      </div>
                    </div>
                  </td>
                </tr>
              ';
          }
      }
    }

    function cargarProductoEditar(){
      if (isset($_GET['id'])) {
          $objConsultas = new Consultas();
          $id_producto = $_GET['id'];
          $result = $objConsultas->mostrarProducto($id_producto);

          foreach ($result as $f) {
              echo'
              <form action="../../Controllers/actualizarProducto.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label class="form-label">Nombre</label>
                    <input class="form-control" value="'.$f['nombre_pro'].'" type="text" name="nombre" placeholder="Hamburguesa"
                      autofocus />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label class="form-label">Categoria</label>
                    <select name="categoria" class="select2 form-select">
                      <option value="'.$f['categoria_pro'].'">'.$f['categoria_pro'].'</option>
                      <option value="Postres">Postres</option>
                      <option value="Platos">Platos</option>
                      <option value="Bebidas">Bebidas</option>
                    </select>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label class="form-label">Precio</label>
                    <input class="form-control" value="'.$f['precio_pro'].'" type="double" name="precio" placeholder="$20.000" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label class="form-label">Descripción</label>
                    <input type="text" value="'.$f['descripcion_pro'].'" class="form-control" name="descripcion" placeholder="Una Hamburguesa deliciosa" />
                  </div>
                  <div class="mb-3 col-md-12">
                    <label class="form-label">Estado</label>
                    <select name="estado" class="select2 form-select">
                      <option value="'.$f['estado_pro'].'">'.$f['estado_pro'].'</option>
                      <option value="En pedido">En pedido</option>
                      <option value="Agotado">Agotado</option>
                      <option value="Existente">Existente</option>
                    </select>
                  </div> 
                  <div class="form-group col-md-6">
                    <label>&nbsp;</label>
                    <input type="hidden" value="'.$f['id_pro'].'" class="form-control" placeholder="Ej: 20.000" name="id_producto">
                  </div> 
                  <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Actualizar Producto</button>
                    <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                  </div>
                <div>
              </form>
              ';
          }
      }
    }

    function cargarProductosReportes(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarProductos();
      
      if (!isset($result)) {
          echo '<h2>NO HAY USUARIOS REGISTRADOS ;)</h2>';
      }
      else {
          foreach ($result as  $f) {
              echo '
              <tr>
                  <td>'. $f['nombre_pro'] .'</td>
                  <td>'. $f['categoria_pro'] .'</td>
                  <td>$ '. $f['precio_pro'] .'</td>
                  <td>'. $f['estado_pro'] .'</td>
              </tr>
              ';
          }
      }
    }

  // Empleados

    function cargarEmpleados(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarEmpleados();
      
      if (!isset($result)) {
          echo '<h5 style="padding: 20px;">NO HAY EMPLEADOS REGISTRADOS ;)</h5>';
      }
      else {
          foreach ($result as  $f) {
              echo '
              <tr>
                  <td>
                    <img src="../'.$f['foto'].'" alt="Foto User" style="widht: 100px; height: 100px; border-radius: 5%">
                  </td>
                  <td>'. $f['nombres'] .'</td>
                  <td>'. $f['apellidos'] .'</td>
                  <td>'. $f['email'] .'</td>
                  <td>'. $f['telefono'] .'</td>
                  <td><span class="badge bg-label-dark">'. $f['contrato'] .'</span></td>
                  <td>

                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="modificarEmpleado.php?id='.$f['identificacion'].'">
                        <i class="bx bx-edit-alt me-1"></i> Editar</a>
                        <a class="dropdown-item" href="../../Controllers/eliminarEmpleado.php?id='.$f['identificacion'].'"
                          ><i class="bx bx-trash me-1"></i> Eliminar</a
                        >
                      </div>
                    </div>
                  </td>
              ';
          }
      }
    }

    function cargarEmpleadoEditar(){

      // ATERRIZAMOS LA PK ENVIADA DESDE LA TABLA
      $idEmple = $_GET['id'];


      // ENVIAMOS LA PK A UNA FUNCION DE LA CLASE CONSULTAS
      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarEmpleado($idEmple);
      // PINTAMOS LA INFORMACION CONSULTADA EN EL ARTEFACTO(FORM)

      foreach ($result as  $f) {
        echo '
          <form action="../../Controllers/actualizarEmpleadoAdmin.php" method="POST" enctype="multipart/form-data">  
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label">Identificación</label>
                    <input
                    class="form-control"
                    type="number"
                    value="'.$f['identificacion'].'"
                    readonly
                    name="identificacion"
                    placeholder="123456789"
                    autofocus />
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Tipo de Documento</label>
                    <select name="tipo_doc" class="select2 form-select">
                        <option value="'.$f['tipo_doc'].'">'.$f['tipo_doc'].'</option>
                        <option value="CC">CC</option>
                        <option value="CE">CE</option>
                        <option value="Pasaporte">Pasaporte</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Nombres</label>
                    <input
                    class="form-control"
                    type="text"
                    name="nombres"
                    value="'.$f['nombres'].'"
                    placeholder="Hector Estiven" />
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Apellidos</label>
                    <input
                    type="text"
                    class="form-control"
                    name="apellidos"
                    value="'.$f['apellidos'].'"
                    placeholder="Caro Moreras" />
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Correo</label>
                    <div class="input-group input-group-merge">
                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="'.$f['email'].'"
                        placeholder="example@example.com" />
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Teléfono</label>
                    <input type="number" 
                    class="form-control" 
                    name="telefono" 
                    value="'.$f['telefono'].'"
                    placeholder="323 233 2333" />
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Tipo de Contrato</label>
                    <select name="contrato" class="select2 form-select">
                        <option value="'.$f['contrato'].'">'.$f['contrato'].'</option>
                        <option value="Fijo">Fijo</option>
                        <option value="Indefinido">Indefinido</option>
                        <option value="Obra Labor">Obra Labor</option>
                    </select>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Actualizar Datos</button>
                    <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                </div>
            <div>
          </form>
        ';
      }
    }

    function cargarEmpleadosReportes(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarEmpleados();
      
      if (!isset($result)) {
          echo '<h2>NO HAY EMPLEADOS REGISTRADOS ;)</h2>';
      }
      else {
          foreach ($result as  $f) {
              echo '
              <tr>
                  <td>'. $f['identificacion'] .'</td>
                  <td>'. $f['nombres'] .'</td>
                  <td>'. $f['apellidos'] .'</td>
                  <td>'. $f['email'] .'</td>
                  <td>'. $f['telefono'] .'</td>
                  <td>'. $f['contrato'] .'</td>
                  
              </tr>
              ';
          }
      }
    }

  // Menú

    function cargarMenufront(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarPlatosMenufront();
      
      if (!isset($result)) {
          echo '<h5 style="padding: 20px;">NO HAY PLATOS EN EL MENÚ REGISTRADOS ;)</h5>';
      }
      else {
          foreach ($result as  $f) {

            


              echo '
              <section class="col-md-4 modal2">
              <div class="imng">
                <img src="' . $f['foto'] . '" alt="">
                <h2>' . $f['nombre'] . '</h2>
                <span>' . $f['precio'] . '</span>
              </div>
              <div class="botones">
                <button class="show-modal1" onclick="showModal()"><img src="Views/Usuario/img/ojo.png" alt="" class="botonver"></button>
                <button class="show-modal"><img src="Views/Usuario/img/carrito-de-compras.png" alt="" class="botonver"></button>
                <div class="modal-box" id="modalBox">
                  <h2>Completed</h2>
                  <h3>You have successfully downloaded all the source code files.</h3>
                  <div class="buttons">
                    <button class="close-btn" id="closeModal" onclick="closeModal()">Cerrar</button>
                  </div>
                </div>
              </div>
            </section> ';
          }
      }
    }

    function cargarMenufront2(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarPlatosMenufront();
      
      if (!isset($result)) {
          echo '<h5 style="padding: 20px;">NO HAY PLATOS EN EL MENÚ REGISTRADOS ;)</h5>';
      }
      else {
          foreach ($result as  $f) {

            $valor = $f['foto'];

            $longitud = strlen($valor);
            $caracteres= $longitud -3;

            $subcadena = substr($valor, 3, $caracteres);


              echo '
              <section class="col-md-4 modal2">
              <div class="imng">
                <img src="' . $subcadena . '" alt="">
                <h2>' . $f['nombre'] . '</h2>
                <span>' . $f['precio'] . '</span>
              </div>
              <div class="botones">
                <button class="show-modal1" onclick="showModal()"><img src="Views/Usuario/img/ojo.png" alt="" class="botonver"></button>
                <button class="show-modal"><img src="Views/Usuario/img/carrito-de-compras.png" alt="" class="botonver"></button>
                <div class="modal-box" id="modalBox">
                  <h2>Completed</h2>
                  <h3>You have successfully downloaded all the source code files.</h3>
                  <div class="buttons">
                    <button class="close-btn" id="closeModal" onclick="closeModal()">Cerrar</button>
                  </div>
                </div>
              </div>
            </section> ';
          }
      }
    }

    function cargarMenu(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarPlatosMenu();
      
      if (!isset($result)) {
          echo '<h5 style="padding: 20px;">NO HAY PLATOS EN EL MENÚ REGISTRADOS ;)</h5>';
      }
      else {
          foreach ($result as  $f) {
              echo '
              <tr>
                  <td>
                    <img src="../'.$f['foto'].'" alt="Foto User" style="widht: 100px; height: 100px; border-radius: 5%">
                  </td>
                  <td>'. $f['nombre'] .'</td>
                  <td><p>'. $f['ingredientes'] .'</p></td>
                  <td><p>'. $f['descripcion'] .'</p></td>
                  <td><p>'. $f['estado'] .'</p></td>
                  <td><p>'. $f['precio'] .'</p></td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="modificarPlatoMenu.php?id='.$f['id_menu'].'">
                          <i class="bx bx-edit-alt me-1"></i> Editar
                        </a>
                        <a class="dropdown-item" href="../../Controllers/eliminarPlatoMenu.php?id='.$f['id_menu'].'">
                          <i class="bx bx-trash me-1"></i> Eliminar
                        </a>
                      </div>
                    </div>
                  </td>
              </tr>
              ';
          }
      }
    }

    function cargarPlatoMenuEditar(){
      if (isset($_GET['id'])) {
          $objConsultas = new Consultas();
          $idMenu = $_GET['id'];
          $result = $objConsultas->mostrarMenu($idMenu);

          foreach ($result as $f) {
              echo'
                  <form action="../../Controllers/actualizarMenu.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Nombre</label>
                        <input class="form-control" value="'.$f['nombre'].'" type="text" name="nombre" placeholder="Hamburguesa">
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Ingredientes</label>
                        <input class="form-control" value="'.$f['ingredientes'].'" type="text" name="ingredientes" placeholder="Carne, Lechuga...">
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Descripción</label>
                        <input class="form-control" value="'.$f['descripcion'].'" type="text" name="descripcion" placeholder="Hamburguesa">
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Estado</label>
                        <input class="form-control" value="'.$f['estado'].'" type="text" name="estado" placeholder="Activo-Agotado">
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Precio</label>
                        <input class="form-control" value="'.$f['precio'].'" type="text" name="precio" placeholder="$10.000">
                      </div>
                      <div class="form-group col-md-6">
                        <label>&nbsp;</label>
                        <input type="hidden" value="'.$f['id_menu'].'" class="form-control" placeholder="Ej: 20.000" name="id_menu" readonly>
                      </div>
                      <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Actualizar Producto</button>
                        <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                      </div>
                    <div>
                  </form>
              ';
          }
      }
    }

    function cargarMenuReportes(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarPlatosMenu();
      
      if (!isset($result)) {
          echo '<h2>NO HAY USUARIOS REGISTRADOS ;)</h2>';
      }
      else {
          foreach ($result as  $f) {
              echo '
              <tr>
                  <td>'. $f['nombre'] .'</td>
                  <td><p>'. $f['ingredientes'] .'</p></td>
                  <td><p> '. $f['descripcion'] .'</p></td>
                  <td><p>'. $f['estado'] .'</p></td>
                  <td><p> '. $f['precio'] .'</p></td>
              </tr>
              ';
          }
      }
    }

    function pesonalizarPlatoMenu(){
      if (isset($_GET['id'])) {
          $objConsultas = new Consultas();
          $idMenu = $_GET['id'];
          $result = $objConsultas->mostrarMenu($idMenu);

          foreach ($result as $f) {
              echo'
                <div class="row todo">
                  <div class="col-md-5 fotoMenu">
                      <div class="infoPlato">
                          <img src="../'.$f['foto'].'" alt="" class="img-fluid">
                          <p class="nombreP">'.$f['nombre'].'</p>
                          <p class="ingredientesP">'.$f['ingredientes'].'</p>
                          <p class="precioP">'.$f['precio'].'</p>
                      </div>
                  </div>
                  <div class="col-md-7 perso">
                      <div class="textPerso">
                          <form action="">
                              <textarea name="personalizacion" id="" cols="90" rows="17" 
                                placeholder="Ingresa si deseas agregar o quitar algo del producto escogido..."></textarea>
                              <button type="submit" class="botonPer"><a>Confirmar</a></button>
                              <button class="botonPer"><a href="homeUser.php#menu">Cancelar</a></button>
                          </form>
                      </div>
                  </div>
                </div>
              ';
          }
      }
    }
  
  // Sedes

    function cargarSedes(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarSedes();
      
      if (!isset($result)) {
          echo '<h5 style="padding: 20px;">NO HAY SEDES REGISTRADAS ;(</h5>';
      }
      else {
          foreach ($result as  $f) {
              echo '
              <tr>
                  <td>
                    <img src="../'.$f['foto'].'" alt="Foto User" style="widht: 100px; height: 100px; border-radius: 5%">
                  </td>
                  <td>'. $f['identificacion'] .' / '. $f['tipo_doc'] .'</td>
                  <td>'. $f['nombres'] .' '. $f['apellidos'] .'</td>
                  <td><p>'. $f['email'] .'</p></td>
                  <td>'. $f['telefono_sede'] .'</td>
                  <td><p>'. $f['direccion_sede'] .'</p></td>
                  <td>'. $f['estado_sede'] .'</td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="modificarSede.php?id='.$f['id_sede'].'">
                          <i class="bx bx-edit-alt me-1"></i> Editar
                        </a>
                        <a class="dropdown-item" href="../../Controllers/eliminarSede.php?id='.$f['id_sede'].'">
                          <i class="bx bx-trash me-1"></i> Eliminar
                        </a>
                      </div>
                    </div>
                  </td>
              </tr>
              ';
          }
      }
    }

    function cargarSedeEditar(){
      if (isset($_GET['id'])) {
          $objConsultas = new Consultas();
          $id_sede = $_GET['id'];
          $result = $objConsultas->mostrarSede($id_sede);

          foreach ($result as $f) {
              echo'
                  <form action="../../Controllers/actualizarSede.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Identificación Administrador de la Sede</label>
                        <input class="form-control" value="'.$f['identificacion'].'" type="number" name="identificacion" placeholder="123456789">
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Tipo de Documento</label>
                        <select name="tipo_doc" class="select2 form-select">
                          <option value="'.$f['tipo_doc'].'">'.$f['tipo_doc'].'</option>
                          <option value="CC">CC</option>
                          <option value="CE">CE</option>
                          <option value="Pasaporte">Pasaporte</option>
                        </select>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Nombres</label>
                        <input class="form-control" value="'.$f['nombres'].'" type="text" name="nombres" placeholder="Hector Estiven">
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Apellidos</label>
                        <input type="text" class="form-control" value="'.$f['apellidos'].'" name="apellidos" placeholder="Caro Moreras">
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Correo</label>
                        <div class="input-group input-group-merge">
                          <input type="email" value="'.$f['email'].'" name="email" class="form-control" placeholder="example@example.com">
                        </div>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Teléfono de la Sede</label>
                        <input type="number" value="'.$f['telefono_sede'].'" class="form-control" name="telefono" placeholder="323 233 2333">
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Dirección de la Sede</label>
                        <input type="text" value="'.$f['direccion_sede'].'" class="form-control" name="direccion" placeholder="Carrea 18b #73a">
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Estado</label>
                        <select name="estado" class="select2 form-select">
                          <option value="'.$f['estado_sede'].'">'.$f['estado_sede'].'</option>
                          <option value="Activa">Activa</option>
                          <option value="Cerrada">Cerrada</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label>&nbsp;</label>
                        <input type="hidden" value="'.$f['id_sede'].'" class="form-control" placeholder="Ej: 20.000" name="id_sede" readonly>
                      </div>
                      <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Actualizar Datos</button>
                        <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                      </div>
                      <div>
                  </form>
              ';
          }
        }
    }

    function cargarSedesReportes(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarSedes();
      
      if (!isset($result)) {
          echo '<h5 style="padding: 20px;">NO HAY SEDES REGISTRADAS ;)</h5>';
      }
      else {
          foreach ($result as  $f) {
              echo '
              <tr>
                  <td>'. $f['identificacion'] .' / '. $f['tipo_doc'] .'</td>
                  <td>'. $f['nombres'] .' '. $f['apellidos'] .'</td>
                  <td>'. $f['email'] .'</td>
                  <td>'. $f['telefono_sede'] .'</td>
                  <td>'. $f['direccion_sede'] .'</td>
                  <td>'. $f['estado_sede'] .'</td>
              </tr>
              ';
          }
      }
    }

  // Inventario

    function cargarInventario(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarInventario();

      if (!isset($result)) {
          echo '<h2>NO HAY ENTRADAS EN EL INVENTARIO</h2>';
      }
      else {
          foreach ($result as  $f) {
              echo '
              <tr>
                <td>
                  <img src="../'.$f['foto'].'" alt="Foto User" style="widht: 100px; height: 100px; border-radius: 5%">
                </td>
                <td>'. $f['nombre'] .'</td>
                <td>'. $f['tipo'] .'</td>
                <td>'. $f['cantidad'] .'</td>
                <td><p>'. $f['descripcion'] .'</p></td>
                <td>'. $f['precio'] .'</td>
                <td>'. $f['fecha'] .'</td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="modificarEntradaInv.php?id='.$f['id_inventario'].'">
                        <i class="bx bx-edit-alt me-1"></i> Editar
                      </a>
                      <a class="dropdown-item" href="../../Controllers/eliminarEntradaInv.php?id='.$f['id_inventario'].'">
                        <i class="bx bx-trash me-1"></i> Eliminar
                      </a>
                    </div>
                  </div>
                </td>
              </tr>
              ';
          }
      }
    }

    function cargarEntradaInventarioEditar(){

      // ATERRIZAMOS LA PK ENVIADA DESDE LA TABLA
      $id_inventario = $_GET['id'];


      // ENVIAMOS LA PK A UNA FUNCION DE LA CLASE CONSULTAS
      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarEntradasInventario($id_inventario);
      // PINTAMOS LA INFORMACION CONSULTADA EN EL ARTEFACTO(FORM)

      foreach ($result as  $f) {
          echo '
            <form action="../../Controllers/actualizarEntradaInventario.php" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="mb-3 col-md-6">
                        <label class="form-label">Nombre</label>
                        <input class="form-control" type="text" value="'.$f['nombre'].'" name="nombre" placeholder="Huevos, Carne, etc...">
                </div>
                <div class="mb-3 col-md-6">
                  <label class="form-label">Tipo</label>
                    <select name="tipo" class="select2 form-select">
                      <option value="'.$f['tipo'].'">'.$f['tipo'].'</option>
                      <option value="fruta">Fruta</option>
                      <option value="verduras">Verduras</option>
                      <option value="carne">Carne</option>
                      <option value="aceite">Aceite</option>
                      <option value="Leche">Leche</option>
                      <option value="papa">Papa</option>
                      <option value="huevo">Huevo</option>
                      <option value="queso">Queso</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                  <label class="form-label">Cantidad</label>
                  <input type="text" class="form-control" value="'.$f['cantidad'].'" name="cantidad" placeholder="Ej: (0-100)">
                </div>
                <div class="mb-3 col-md-6">
                  <label class="form-label">Descripción</label>
                  <input type="text" class="form-control" value="'.$f['descripcion'].'" name="descripcion" placeholder="Una Hamburguesa deliciosa">
                </div>
                <div class="mb-3 col-md-6">
                  <label class="form-label">Precio</label>
                  <input type="text" class="form-control" value="'.$f['precio'].'" name="precio" placeholder="Ej: ($10.000)">
                </div>
                <div class="form-group col-md-6">
                  <label>&nbsp;</label>
                  <input type="hidden" value="'.$f['id_inventario'].'" class="form-control" placeholder="Ej: 20.000" name="id_inv" readonly>
                </div>
                <div class="mt-2">
                  <button type="submit" class="btn btn-primary me-2">Registrar Producto</button>
                  <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                </div>
                <div>
            </form>
          '; 
      }
    }

    function reportesInventario(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarInventario();
      
      if (!isset($result)) {
          echo '<h2>NO HAY USUARIOS REGISTRADOS ;)</h2>';
      }
      else {
          foreach ($result as  $f) {
              echo '
              <tr>
                  <td>'. $f['nombre'] .'</td>
                  <td>'. $f['tipo'] .'</td>
                  <td>'. $f['cantidad'] .'</td>
                  <td><p>'. $f['descripcion'] .'</p></td>
                  <td>$ '. $f['precio'] .'</td>
                  <td>'. $f['fecha'] .'</td>                  
              </tr>
              ';
          }
      }
    }

  // Proveedores

    function cargarProveedores(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarProveedores();
      
      if (!isset($result)) {
          echo '<h5 style="padding: 20px;">NO HAY PROVEEDORES REGISTRADOS ;(</h5>';
      }
      else {
          foreach ($result as  $f) {
              echo '
              <tr>
                  <td>
                    <img src="../'.$f['foto'].'" alt="Foto User" style="widht: 100px; height: 100px; border-radius: 5%">
                  </td>
                  <td>'. $f['identificacion'] .'</td>
                  <td>'. $f['nombres'] .'</td>
                  <td>'. $f['telefono'] .'</td>
                  <td><p>'. $f['direccion'] .'</p></td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="modificarProveedor.php?id='.$f['identificacion'].'">
                          <i class="bx bx-edit-alt me-1"></i> Editar
                        </a>
                        <a class="dropdown-item" href="../../Controllers/eliminarProveedor.php?id='.$f['identificacion'].'">
                          <i class="bx bx-trash me-1"></i> Eliminar
                        </a>
                        <a class="dropdown-item" href="realizarPedido.php?id='.$f['identificacion'].'">
                          <i class="bx bx-cart-add me-1"></i> Realizar Pedido
                        </a>
                      </div>
                    </div>
                  </td>
              </tr>
              ';
          }
      }
    }

    function cargarProveedorEditar(){

      // ATERRIZAMOS LA PK ENVIADA DESDE LA TABLA
      $id_Proveedor = $_GET['id'];


      // ENVIAMOS LA PK A UNA FUNCION DE LA CLASE CONSULTAS
      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarProveedor($id_Proveedor);
      // PINTAMOS LA INFORMACION CONSULTADA EN EL ARTEFACTO(FORM)

      foreach ($result as  $f) {
          echo '
          <form action="../../Controllers/actualizarProveedor.php" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="mb-3 col-md-6">
                <label class="form-label">Identificación</label>
                <input class="form-control" type="text" name="identificacion" value="'.$f['identificacion'].'" placeholder="1234567890" readonly>
              </div>
              <div class="mb-3 col-md-6">
                <label class="form-label">Nombres</label>
                <input type="text" class="form-control" name="nombres" value="'.$f['nombres'].'" placeholder="Jose Caro">
              </div>
              <div class="mb-3 col-md-6">
                <label class="form-label">Telefono</label>
                <input type="text" class="form-control" name="telefono" value="'.$f['telefono'].'" placeholder="333 223 4567">
              </div>
              <div class="mb-3 col-md-6">
                <label class="form-label">Dirección Empresa</label>
                <input type="text" class="form-control" name="direccion" value="'.$f['direccion'].'" placeholder="Cll 54 SUR # 25 - 39">
              </div>
              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Actualizar Datos</button>
                <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
              </div>
            <div>
          </form>
          '; 
      }
    }

    function cargarProveedoresReportes(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarProveedores();
      
      if (!isset($result)) {
          echo '<h5 style="padding: 20px;">NO HAY PROVEEDORES REGISTRADOS ;)</h5>';
      }
      else {
          foreach ($result as  $f) {
              echo '
              <tr>
                  <td>'. $f['identificacion'] .'</td>
                  <td>'. $f['nombres'] .'</td>
                  <td>'. $f['telefono'] .'</td>
                  <td>'. $f['direccion'] .'</td>                 
              </tr>
              ';
          }
      }
    }

  // Perfil

    function perfil(){
      // Variable de sesión del login
      // session_start();
      $id = $_SESSION['id'];

      $objConsultas = new Consultas();
      $result = $objConsultas->verPerfil($id);

      foreach ($result as $f) {
          echo '
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar ">
                    <img src="../'.$f['foto'].'" alt class="w-px-40 h-auto foto1">
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar">
                            <img src="../'.$f['foto'].'" alt class="w-px-40 h-auto rounded-circle">
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-medium d-block">'.$f['nombres'].' '.$f['apellidos'].'</span>
                          <small class="text-muted">'.$f['rol'].'</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="perfil.php?=id'.$f['identificacion'].'">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">Editar Perfil</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="../../Controllers/cerrarSesion.php">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Cerrar Sesión</span>
                    </a>
                  </li>
                </ul>
              </li>
          ';
      }
    }

    function perfilEditar(){
      $id = $_SESSION['id'];

      $objConsultas = new Consultas();
      $result = $objConsultas->verPerfil($id);

      foreach ($result as $f) {
          echo '
          <div class="col-md-3">
            <div class="card h-100">
              <img class="card-img-top" src="../'.$f['foto'].'" alt="Card image cap" />
              <div class="card-body">
                <h2 class="card-title text-center">'.$f['nombres'].' '.$f['apellidos'].'</h2>
                <p class="card-text text-center">
                  '.$f['rol'].'
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-4 content2">
            <div class="content">
              <input type="radio" name="slider" checked id="home" class="igual">
              <input type="radio" name="slider" id="blog" class="igual">
              <input type="radio" name="slider" id="help" class="igual">
              <input type="radio" name="slider" id="code" class="igual">
              <input type="radio" name="slider" id="about" class="igual">
              <div class="list">
                  <label for="home" class="home">
                  
                  <span class="title">Perfil</span>
              </label>
              <label for="blog" class="blog">
                  <span class="icon"></span>
                  <span class="title">Foto</span>
              </label>
              <label for="help" class="help">
                  <span class="icon"></span>
                  <span class="title">Clave</span>
              </label>
              <div class="slider"></div>
              </div>
              <div class="text-content">
                  <div class="home text">
                      <form action="../../Controllers/modificarCuentaAdmin.php" method="POST" enctype="multipart/form-data">
                          <div class="row">
                              <div class="mb-3 col-md-6">
                                  <label class="form-label">Identificación</label>
                                  <input type="text" value="'.$f['identificacion'].'" class="form-control" name="identificacion" readonly>
                              </div>
                              <div class="mb-3 col-md-6">
                                  <label class="form-label">Tipo de Documento</label>
                                  <select name="tipo_doc" class="select2 form-select">
                                      <option value="'.$f['tipo_doc'].'">'.$f['tipo_doc'].'</option>
                                      <option value="CC">CC</option>
                                      <option value="CE">CE</option>
                                      <option value="Pasaporte">Pasaporte</option>
                                  </select>
                              </div>
                              <div class="mb-3 col-md-6">
                                  <label class="form-label">Nombres</label>
                                  <input class="form-control" value="'.$f['nombres'].'" type="text" name="nombres">
                              </div>
                              <div class="mb-3 col-md-6">
                                  <label class="form-label">Apellidos</label>
                                  <input type="text" class="form-control" value="'.$f['apellidos'].'" name="apellidos">
                              </div>
                              <div class="mb-3 col-md-6">
                                  <label class="form-label">Correo</label>
                                    <input type="email" name="email" value="'.$f['email'].'" class="form-control">
                              </div>
                              <div class="mb-3 col-md-6">
                                  <label class="form-label">Teléfono</label>
                                  <input type="number" class="form-control" value="'.$f['telefono'].'" name="telefono">
                              </div>
                              <div class="mt-2">
                                  <button type="submit" class="btn btn-primary me-2">Actualizar Datos</button>
                                  <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                              </div>
                          </div>
                      </form>
                  </div>
                  <div class="blog text">
                      <form action="../../Controllers/modificarFotoAdmin.php" method="POST" enctype="multipart/form-data">
                          <div class="row">
                              <div class="mb-3 col-md-12">
                                  <label class="form-label">Identificación</label>
                                  <input type="text" class="form-control" value="'.$f['identificacion'].'" name="identificacion" readonly>
                              </div>
                              <div class="mb-3 col-md-12">
                                  <label class="form-label">Nueva Foto de Usuario </label>
                                  <input class="form-control" type="file" name="foto" accept=".jpeg, .jpg, .png, .gif">
                              </div>
                              <div class="mt-2">
                                  <button type="submit" class="btn btn-primary me-2">Cambiar Foto</button>
                                  <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                              </div>
                          </div>
                      </form>
                  </div>
                  <div class="help text">
                      <form action="../../Controllers/modificarClaveAdmin.php" method="POST" enctype="multipart/form-data">
                          <div class="row">
                              <div class="mb-3 col-md-12">
                                  <label class="form-label">Identificación</label>
                                  <input type="text" value="'.$f['identificacion'].'" class="form-control" name="identificacion" readonly>
                              </div>
                              <div class=" mb-3 form-password-toggle">
                                  <label class="form-label" for="basic-default-password32">Nueva Clave</label>
                                  <div class="input-group input-group-merge">
                                    <input
                                        type="password"
                                        name="clave"
                                        class="form-control"
                                        id="basic-default-password32"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="basic-default-password">
                                    <span class="input-group-text cursor-pointer" id="basic-default-password">
                                      <i class="bx bx-hide"></i>
                                    </span>
                                  </div>
                              </div>
                              <div class="form-password-toggle">
                                  <label class="form-label" for="basic-default-password32">Confirmar nueva Clave</label>
                                  <div class="input-group input-group-merge">
                                  <input
                                      type="password"
                                      name="clave2"
                                      class="form-control"
                                      id="basic-default-password32"
                                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                      aria-describedby="basic-default-password" />
                                  <span class="input-group-text cursor-pointer" id="basic-default-password"
                                      ><i class="bx bx-hide"></i
                                  ></span>
                                  </div>
                              </div>
                              <div class="mt-4">
                                  <button type="submit" class="btn btn-primary me-2">Cambiar Clave</button>
                                  <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
            </div>
          </div>
          ';
      }
    }

  // Home Admin

  // Reportes

    function cargarUsuariosExcel(){


      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarUsersAdmin();

      if (!isset($result)) {
          echo '<h2> NO HAY USUARIOS REGISTRADOS </h2>';

      } else {
          foreach ($result as $f) {
              echo '
              <tr>
                  <td>' . $f['identificacion'] . '</td>
                  <td>' . $f['nombres'] . '</td>
                  <td>' . $f['apellidos'] . ' </td>
                  <td>' . $f['email'] . ' </td>
                  <td>' . $f['telefono'] . ' </td>
                  <td>' . $f['rol'] . ' </td>
                  <td>' . $f['estado'] . ' </td>
              </tr>     
              ';
          }
      }
    }

    function cargarProductosExcel(){


      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarProductos();

      if (!isset($result)) {
          echo '<h2> NO HAY USUARIOS REGISTRADOS </h2>';

      } else {
          foreach ($result as $f) {
              echo '
              <tr>
                  <td>' . $f['nombre_pro'] . '</td>
                  <td>' . $f['categoria_pro'] . '</td>
                  <td>' . $f['precio_pro'] . ' </td>
                  <td>' . $f['estado'] . ' </td>
              </tr>     
              ';
          }
      }
    }
    
    function cargarEmpleadosExcel(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarEmpleados();
      
      if (!isset($result)) {
          echo '<h2>NO HAY EMPLEADOS REGISTRADOS ;)</h2>';
      }
      else {
          foreach ($result as  $f) {
              echo '
              <tr>
                  <td>'. $f['identificacion'] .'</td>
                  <td>'. $f['nombres'] .'</td>
                  <td>'. $f['apellidos'] .'</td>
                  <td>'. $f['email'] .'</td>
                  <td>'. $f['telefono'] .'</td>
                  <td>'. $f['contrato'] .'</td>
                  
              </tr>
              ';
          }
      }
    }

    function cargarMenuExcel(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarPlatosMenu();
      
      if (!isset($result)) {
          echo '<h2>NO HAY USUARIOS REGISTRADOS ;)</h2>';
      }
      else {
          foreach ($result as  $f) {
              echo '
              <tr>
                  <td>'. $f['nombre'] .'</td>
                  <td><p>'. $f['ingredientes'] .'</p></td>
                  <td><p> '. $f['descripcion'] .'</p></td>
                  <td><p>'. $f['estado'] .'</p></td>
                  <td><p> '. $f['precio'] .'</p></td>
              </tr>
              ';
          }
      }
    }

    function cargarSedesExcel(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarSedes();
      
      if (!isset($result)) {
          echo '<h5 style="padding: 20px;">NO HAY SEDES REGISTRADAS ;)</h5>';
      }
      else {
          foreach ($result as  $f) {
              echo '
              <tr>
                  <td>'. $f['identificacion'] .' / '. $f['tipo_doc'] .'</td>
                  <td>'. $f['nombres'] .' '. $f['apellidos'] .'</td>
                  <td>'. $f['email'] .'</td>
                  <td>'. $f['telefono_sede'] .'</td>
                  <td>'. $f['direccion_sede'] .'</td>
                  <td>'. $f['estado_sede'] .'</td>
              </tr>
              ';
          }
      }
    }

    function cargarInventarioExcel(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarInventario();
      
      if (!isset($result)) {
          echo '<h2>NO HAY USUARIOS REGISTRADOS ;)</h2>';
      }
      else {
          foreach ($result as  $f) {
              echo '
              <tr>
                  <td>'. $f['nombre'] .'</td>
                  <td>'. $f['tipo'] .'</td>
                  <td>'. $f['cantidad'] .'</td>
                  <td><p>'. $f['descripcion'] .'</p></td>
                  <td>$ '. $f['precio'] .'</td>
                  <td>'. $f['fecha'] .'</td>                  
              </tr>
              ';
          }
      }
    }

    function cargarProveedoresExcel(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarProveedores();
      
      if (!isset($result)) {
          echo '<h2>NO HAY PROVEEDORES REGISTRADOS ;)</h2>';
      }
      else {
          foreach ($result as  $f) {
              echo '
              <tr>
                  <td>'. $f['identificacion'] .'</td>
                  <td>'. $f['nombres'] .'</td>
                  <td>'. $f['telefono'] .'</td>
                  <td><p>'. $f['direccion'] .'</p></td>               
              </tr>
              ';
          }
      }
    }

    function cargarUsuariosPDF(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarUsersAdmin();

      if (!isset($result)) {
          echo '<h2> NO HAY USUARIOS REGISTRADAS </h2>';

      } else {
          foreach ($result as $f) {
              echo '
              <tr>
                  <th style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'.$f['identificacion'].'</th>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'.$f['nombres'].'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'.$f['apellidos'].'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'.$f['email'].'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'.$f['telefono'].'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'.$f['rol'].'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'.$f['estado'].'</td>
              </tr>     
              ';
          }
      }
    }

    function cargarProductosPDF(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarProductos();

      if (!isset($result)) {
          echo '<h2> NO HAY USUARIOS REGISTRADAS </h2>';

      } else {
          foreach ($result as $f) {
              echo '
              <tr>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'.$f['nombre_pro'].'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'.$f['categoria_pro'].'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">$ '.$f['precio_pro'].'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'.$f['estado_pro'].'</td>
              </tr>     
              ';
          }
      }
    }

    function cargarEmpleadosPDF(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarEmpleados();

      if (!isset($result)) {
          echo '<h2> NO HAY USUARIOS REGISTRADAS </h2>';

      } else {
          foreach ($result as $f) {
              echo '
              <tr>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'.$f['identificacion'].'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'.$f['nombres'].'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'.$f['apellidos'].'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'.$f['email'].'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'.$f['telefono'].'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'.$f['contrato'].'</td>
              </tr>     
              ';
          }
      }
    }

    function cargarMenuPDF(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarPlatosMenu();

      if (!isset($result)) {
          echo '<h2> NO HAY USUARIOS REGISTRADAS </h2>';

      } else {
          foreach ($result as $f) {
              echo '
              <tr>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'.$f['nombre'].'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'.$f['ingredientes'].'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'.$f['descripcion'].'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'.$f['estado'].'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'.$f['precio'].'</td>
              </tr>     
              ';
          }
      }
    }

    function cargarSedesPDF(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarSedes();

      if (!isset($result)) {
          echo '<h2> NO HAY USUARIOS REGISTRADAS </h2>';

      } else {
          foreach ($result as $f) {
              echo '
              <tr>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'. $f['identificacion'] .' / '. $f['tipo_doc'] .'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'. $f['nombres'] .' '. $f['apellidos'] .'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'. $f['email'] .'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'. $f['telefono_sede'] .'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'. $f['direccion_sede'] .'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'. $f['estado_sede'] .'</td>
              </tr>     
              ';
          }
      }
    }

    function cargarInventarioPDF(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarInventario();

      if (!isset($result)) {
          echo '<h2> NO HAY USUARIOS REGISTRADAS </h2>';

      } else {
          foreach ($result as $f) {
              echo '
              <tr>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'. $f['nombre'] .'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'. $f['tipo'] .'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'. $f['cantidad'] .'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;"><p>'. $f['descripcion'] .'</p></td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">$'. $f['precio'] .'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'. $f['fecha'] .'</td>
              </tr>     
              ';
          }
      }
    }

    function cargarProveedoresPDF(){

      $objConsultas = new Consultas();
      $result = $objConsultas->mostrarProveedores();

      if (!isset($result)) {
          echo '<h2> NO HAY PROVEEDORES REGISTRADAS </h2>';

      } else {
          foreach ($result as $f) {
              echo '
              <tr>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'. $f['identificacion'] .'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'. $f['nombres'] .'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;">'. $f['telefono'] .'</td>
                  <td style="background: #fcfdfd; padding: 8px; border-bottom: 1px solid #dee2e6; font-family: Poppins, sans-serif; text-align: left;"><p>'. $f['direccion'] .'</p></td>
              </tr>     
              ';
          }
      }
    }

  // Info Admin Home

    function mostrarConteoUsuarios(){
      $objConsultas = new Consultas();
      $result = $objConsultas->contarUsuarios();

      if ($result !== false) {
          echo '
            <h3 class="card-title mb-2">'.$result.'</h3>
            <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +1</small>
          ';
      } else {
          echo '<h2>NO HAY USUARIOS REGISTRADOS</h2>';
      }
    }

    function mostrarConteoEmpleados(){
      $objConsultas = new Consultas();
      $result = $objConsultas->contarEmpleados();

      if ($result !== false) {
          echo '
            <h3 class="card-title mb-2">'.$result.'</h3>
            <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +1</small>
          ';
      } else {
          echo '<h2>NO HAY USUARIOS REGISTRADOS</h2>';
      }
    }

    function mostrarConteoSedes(){
      $objConsultas = new Consultas();
      $result = $objConsultas->contarSedes();

      if ($result !== false) {
          echo '
            <h3 class="card-title mb-2">'.$result.'</h3>
          ';
      } else {
          echo '<h2>NO HAY USUARIOS REGISTRADOS</h2>';
      }
    }


?>