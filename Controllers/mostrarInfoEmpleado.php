<?php

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
  
            <div class="col-md-3 content2">
              <div class="content">
                <input type="radio" name="slider" checked id="home" class="igual">
                <input type="radio" name="slider" id="blog" class="igual">
                <div class="list">
                    <label for="home" class="home">
                    
                    <span class="title tabs2">Perfil</span>
                </label>
                <label for="blog" class="blog">
                    <span class="icon"></span>
                    <span class="title tabs2">Clave</span>
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
                                    <select name="tipo_doc" class="select2 form-select" readonly>
                                        <option value="'.$f['tipo_doc'].'" >'.$f['tipo_doc'].'</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Nombres</label>
                                    <input class="form-control" value="'.$f['nombres'].'" type="text" name="nombres" readonly>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Apellidos</label>
                                    <input type="text" class="form-control" value="'.$f['apellidos'].'" name="apellidos" readonly>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Correo</label>
                                      <input type="email" name="email" value="'.$f['email'].'" class="form-control" readonly>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Teléfono</label>
                                    <input type="number" class="form-control" value="'.$f['telefono'].'" name="telefono" readonly>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="blog text">
                        <form action="../../Controllers/modifcarClaveEmpleado.php" method="POST" enctype="multipart/form-data">
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
                                    <button type="reset" class="btn btn-outline-secondary cancelar">Cancelar</button>
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
                      <a class="dropdown-item" href="datosCuentaEmpleado.php?=id'.$f['identificacion'].'">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">Editar Perfil</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="../../Controllers/cerrarSesionEmpleado.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Cerrar Sesión</span>
                      </a>
                    </li>
                  </ul>
                </li>
            ';
        }
      }
?>

