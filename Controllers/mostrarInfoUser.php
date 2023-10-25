<?php

function dropdownUser()
{
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];

        $objConsultas = new Consultas();
        $result = $objConsultas->verPerfil($id);

        if (!empty($result)) {
            $f = $result[0]; // Supongo que $result es un array de resultados, tomamos el primer elemento

            echo '
                <div class="ml-auto">
                    <div class="dropdown ">
                        <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            ';
            if ($f['foto']) {
                echo '
                     <img src="../' . $f['foto'] . '" alt="Foto de perfil" title="' . $f['nombres'] . '" width="35px" height="35px" class="rounded-circle img-fluid">
                         ';
            } else {
                echo '
                    <div class="bg-white rounded-circle p-2" style="width: 35px; height: 35px;" title="' . $f['nombres'] . '" >
                    <span style="color: black; font-weight: bold">' . strtoupper(substr($f['nombres'], 0, 1)) . '</span>
                    </div>
                    ';
            }
            echo '
                </button>
                <ul class="dropdown-menu p-3" style="width: 300px" aria-labelledby="dropdownMenuButton1">
                <li class="dropdown-header  text-center bg-gray">
                        ';
            if ($f['foto']) {
                echo '
                    <img src="../' . $f['foto'] . '" alt="Foto de perfil" width="40px" height="40px" class="rounded-circle img-fluid">
                                ';
            } else {
                echo '
                    <div class="m-auto bg-primary rounded-circle p-2" style="width:35px; height: 35px;">
                    <span style="color:white; font-weight: bold;">' . strtoupper(substr($f['nombres'], 0, 1)) . '</span>
                    </div>
                ';
            }
            echo '
                    </li>
                    <li class="text-center "><span style=" font-size:14px">' . $f['nombres'] . ' ' . $f['apellidos'] . '</span></li>
                    <li class="text-center mb-4 "><span style=" font-size:14px">' . $f['email'] . '</span></li>
                    <li><a class="dropdown-item" href="../../Views/Usuario/perfilUserNew.php">Ver Perfil</a></li>
                    <li><a class="dropdown-item" href="#">Mis Pedidos</a></li>
                    <li><a class="dropdown-item" href="../../Controllers/cerrarSesionCliente.php">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
                    ';
        }
    } else {
        echo '<a href="Views/client-site/login.html" class="book-a-table-btn scrollto d-none d-lg-flex">Iniciar sesión</a>';
    }
}



function perfilUser()
{
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];

        $objConsultas = new Consultas();
        $result = $objConsultas->verPerfil($id);

        foreach ($result as $f) {
            echo '
                
              
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                            <img src="../' . $f['foto'] . ' " alt="Foto perfil"
                                class="rounded-circle img-fluid" style="width: 150px; height:150px">
                                <div style="margin-top:30px;  display: flex; justify-content: center; aling-items: center; gap:8px;" >
                                    <h5>' . $f['nombres'] . '</h5>
                                    <a href="editUser.php" style="" >
                                    <img src="../../Views/client-site/assets/img/perfilUser/edit.png " alt="Foto perfil"
                                            class="img-fluid" style="width: 20px;"></a>
                                    </div>
                            </div>
                        </div>
                        <div class="card">
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                    <p class="mb-0">Nombre</p>
                                    </div>
                                    <div class="col-sm-8">
                                    <p class="text-muted mb-0">' . $f['nombres'] . ' ' . $f['apellidos'] . '</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                    <p class="text-muted mb-0">' . $f['email'] . '</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                    <p class="mb-0">Teléfono</p>
                                    </div>
                                    <div class="col-sm-8">
                                    <p class="text-muted mb-0">' . $f['telefono'] . '</p>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
                    <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                    <p class="mb-0">Nombre</p>
                                    </div>
                                    <div class="col-sm-9">
                                    <p class="text-muted mb-0">' . $f['nombres'] . ' ' . $f['apellidos'] . '</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                    <p class="text-muted mb-0">' . $f['email'] . '</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <p class="mb-0">Teléfono</p>
                                    </div>
                                    <div class="col-sm-9">
                                    <p class="text-muted mb-0">' . $f['telefono'] . '</p>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                    
                </div>
                
               
                          </div>
                
                    ';
        }
    }
}


function perfilEditarUser()
{
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];

        $objConsultas = new Consultas();
        $result = $objConsultas->verPerfil($id);

        foreach ($result as $f) {
            echo '
                    <div class="row">
                        <div class="col-md-3 col-sm-12 mb-5">
                            <div class="card h-100">
                            ';
            if ($f['foto']) {
                echo '
                                 <img src="../' . $f['foto'] . '" alt="Foto de perfil" title="' . $f['nombres'] . '" class="card-img-top">
                                     ';
            } else {
                echo '
                                <div class="bg-primary rounded-circle p-5 mx-auto my-auto mb-5 mt-5" style="width: 45px; height: 45px;" title="' . $f['nombres'] . '" >
                                <div class="d-flex justify-content-center align-items-center" style="width: 100%; height: 100%;">
                                <span style="color:white; font-weight: bold; font-size: 50px;">' . strtoupper(substr($f['nombres'], 0, 1)) . '</span>
                            </div>
                                </div>
                               
                                ';
            }
            echo '
                                <div class="card-body">
                                <h2 class="card-title text-center">' . $f['nombres'] . ' ' . $f['apellidos'] . '</h2>
                                </div>
                        </div>
                    </div>
    
                    <div class="col-md-4 col-sm-12 content2">
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
                      <hr>
                      <div class="text-content">
                          <div class="home text">
                              <form action="../../Controllers/modificarCuentaUser.php" method="POST" enctype="multipart/form-data">
                                  <div class="row">
                                      <div class="mb-3 col-md-6">
                                          <label class="form-label">Identificación</label>
                                          <input type="text" value="' . $f['identificacion'] . '" class="form-control" name="identificacion" readonly>
                                      </div>
                                      <div class="mb-3 col-md-6">
                                          <label class="form-label">Tipo de Documento</label>
                                          <select name="tipo_doc" class="select2 form-select">
                                              <option value="' . $f['tipo_doc'] . '">' . $f['tipo_doc'] . '</option>
                                              <option value="CC">CC</option>
                                              <option value="CE">CE</option>
                                              <option value="Pasaporte">Pasaporte</option>
                                          </select>
                                      </div>
                                      <div class="mb-3 col-md-6">
                                          <label class="form-label">Nombres</label>
                                          <input class="form-control" value="' . $f['nombres'] . '" type="text" name="nombres">
                                      </div>
                                      <div class="mb-3 col-md-6">
                                          <label class="form-label">Apellidos</label>
                                          <input type="text" class="form-control" value="' . $f['apellidos'] . '" name="apellidos">
                                      </div>
                                      <div class="mb-3 col-md-6">
                                          <label class="form-label">Correo</label>
                                            <input type="email" name="email" value="' . $f['email'] . '" class="form-control">
                                      </div>
                                      <div class="mb-3 col-md-6">
                                          <label class="form-label">Teléfono</label>
                                          <input type="number" class="form-control" value="' . $f['telefono'] . '" name="telefono">
                                      </div>
                                      <div class="mt-2 buttons">
                                          <button type="submit" class="btn btn-primary mb-2">Actualizar Datos</button>
                                          <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                          <div class="blog text">
                            <form action="../../Controllers/modificarFotoUser.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Identificación</label>
                                        <input type="text" class="form-control" value="' . $f['identificacion'] . '" name="identificacion" readonly>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Nueva Foto de Usuario </label>
                                        <input class="form-control" type="file" name="foto" accept=".jpeg, .jpg, .png, .gif" required>
                                    </div>
                                    <div class="mt-2 buttons">
                                        <button type="submit" class="btn btn-primary mb-2">Cambiar Foto</button>
                                        <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                          </div>
                          <div class="help text">
                              <form action="../../Controllers/modificarClaveUser.php" method="POST" enctype="multipart/form-data">
                                  <div class="row">
                                      <div class="mb-3 col-md-12">
                                          <label class="form-label">Identificación</label>
                                          <input type="text" value="' . $f['identificacion'] . '" class="form-control" name="identificacion" readonly>
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
                                      <div class="mt-4 buttons">
                                          <button type="submit" class="btn btn-primary mb-2">Cambiar Clave</button>
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
}





?>