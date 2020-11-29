<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of barraCategory
 *
 * @author ira3ck
 */
include 'mySQLphpClass.php';

class category {

    function llenaLaBarra() {
        $conn = new mySQLphpClass();
        $result = $conn->get_secciones();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row["Estado"] == "a") {
                    $nombre = rawurlencode($row["Nombre"]);
                    echo "<div class='category user-select-none' onclick=" . "Redirect('index.php?variable1=" . $nombre . "')" . " style='background: #" . $row["Color"] . "'>" . $row["Nombre"] . "</div>";
                }
            }
        } else {
            echo "0 results";
        }
        $conn = null;
    }

    function seleccionCategoria() {
        $conn = new mySQLphpClass();
        $result = $conn->get_secciones();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $nombre = rawurlencode($row["Nombre"]);
                if ($row["Estado"] == "a") {
                    $estar = "activo";
                } else {
                    $estar = "inactivo";
                }
                echo "<div class='card listaCard' onclick=" . "Redirect('creacionSeccion.php?variable1=" . $row["Color"] . "&variable2=" . $nombre . "&variable3=" . $row["Orden"] . "&variable4=" . $row["Estado"] . "')" . " style='background: #" . $row["Color"] . "'>
                    <div class='row no-gutters'>
                        <div class='col-md-8'>
                            <div class='card-body'>
                                <h5 class='card-title'>" . $row["Nombre"] . "</h5>
                                <p class='card-text'>
                                    " . $estar . "
                                </p>
                            </div>
                        </div></div></div>";
            }
        } else {
            echo "0 results";
        }
        $conn = null;
    }

    function EliminarCategoria() {
        $conn = new mySQLphpClass();
        $result = $conn->get_secciones();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $nombre = rawurlencode($row["Nombre"]);
                if ($row["Estado"] == "a") {
                    echo "<div class='card listaCard' onclick=" . "Redirect('EliminarSeccion.php?variable1=" . $row["Color"] . "&variable2=" . $nombre . "&variable3=" . $row["Orden"] . "&variable4=" . $row["Estado"] . "')" . " style='background: #" . $row["Color"] . "'>
                    <div class='row no-gutters'>
                        <div class='col-md-8'>
                            <div class='card-body'>
                                <h5 class='card-title'>" . $row["Nombre"] . "</h5>
                                <p class='card-text'>
                                    " . $row["Orden"] . "
                                </p>
                            </div>
                        </div></div></div>";
                }
            }
        } else {
            echo "0 results";
        }
        $conn = null;
    }

    function CrearCategoria($orden, $color, $nombre, $estado, $nuevoNombre, $Seleccion) {
        $conn = new mySQLphpClass();
        $conn->Crear_secciones($orden, $color, $nombre, $estado, $nuevoNombre, $Seleccion);
        $conn = null;
    }

    function dropdown() {
        $conn = new mySQLphpClass();
        $result = $conn->get_secciones();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<input type="submit" class="dropdown-item" value="' . $row["Nombre"] . '" name="categorei">';
            }
        } else {
            echo "0 results";
        }
        $conn = null;
    }

}

class noticias {

    function enHome($cant, $opc, $categoria) {
        $conn = new mySQLphpClass();
        $result = $conn->get_noticias($cant);
        $img = '#';
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (array_key_exists('imagen', $row)) {
                    $img = $row["imagen"];
                }
                if ($opc == "T") {
                    $now = time();
                    $target = strtotime($row["fechaPublicado"]);
                    $diff = $now - $target;
                    echo "<div class='nota' onclick='noticia(01)'>";
                    if ($diff <= 68417) {
                        echo "<div class='flash'>¡ÚLTIMO MOMENTO!</div>";
                    }
                    echo "<div class='row no-gutters'>
                          <div class='col-12'><h2>" . $row["Título"] . "</h2></div></div>
                          <div class='row no-gutters'><div class='col-lg-5'>
                          <img src=" . $img . " class='notaIMG'/>
                          </div><div class='col-lg-7 p-2'><div class='row no-gutters' style='height: 90%;'>
                          <p>" . $row["Descripción"] . "</p></div><div class='row no-gutters'>
                          <div class='col'><p class='autor'>" . $row["Nombre_Rep"] . " - " . $row["fechaPublicado"] .
                    "</p></div></div></div></div></div>";
                }
                if ($opc == "C") {
                    if ($categoria == $row["SecciónFK"]) {
                        $now = time();
                        $target = strtotime($row["fechaPublicado"]);
                        $diff = $now - $target;
                        echo "<div class='nota' onclick='noticia(01)'>";
                        if ($diff <= 68417) {
                            echo "<div class='flash'>¡ÚLTIMO MOMENTO!</div>";
                        }
                        echo "<div class='row no-gutters'>
                                  <div class='col-12'><h2>" . $row["Título"] . "</h2></div></div>
                                  <div class='row no-gutters'><div class='col-lg-5'>
                                  <img src=" . $img . " class='notaIMG'/>
                                  </div><div class='col-lg-7 p-2'><div class='row no-gutters' style='height: 90%;'>
                                  <p>" . $row["Descripción"] . "</p></div><div class='row no-gutters'>
                                  <div class='col'><p class='autor'>" . $row["Nombre_Rep"] . " - " . $row["fechaPublicado"] .
                        "</p></div></div></div></div></div>";
                    }
                }
            }
        } else {
            echo "0 results";
        }
    }

    function Vistas($cant) {
        $conn = new mySQLphpClass();
        $ind = 0;
        $result = $conn->get_noticiasNew($cant);
        $img = '#';
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $now = time();
                $ind = $ind + 1;
                $target = strtotime($row["fechaPublicado"]);
                $diff = $now - $target;
                if (array_key_exists('imagen', $row)) {
                    $img = $row["imagen"];
                }
                if ($ind == 1) {
                    echo "<div class='carousel-item active'><div class='nota' onclick='noticia(01)'>";
                }
                if ($ind > 1) {
                    echo "<div class='carousel-item'><div class='nota' onclick='noticia(01)'>";
                }
                if ($diff <= 68417) {
                    echo "<div class='flash'>¡ÚLTIMO MOMENTO!</div>";
                }
                echo "<div class='row no-gutters'>
                        <div class='col-12'><h2>" . $row["Título"] . "</h2></div></div>
                        <div class='row no-gutters'><div class='col-lg-5'><img src=" . $img . " class='notaIMG'/>
                        </div><div class='col-lg-7 p-2'><div class='row no-gutters' style='height: 90%;'>
                        <p>" . $row["Descripción"] . "</p></div><div class='row no-gutters'>
                        <div class='col'><p class='autor'>" . $row["Nombre_Rep"] . " - " . $row["fechaPublicado"] . "</p></div></div></div></div></div></div>";
            }
        } else {
            echo "0 results";
        }
    }

    function misNoticias($usuario, $orden, $estado) {
        $conn = new mySQLphpClass();
        $result = $conn->get_misNoticias($usuario, $orden, $estado, null);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                echo '<div class="card listaCard"><div class="row no-gutters"><div class="col-md-4">
                      <img src="https://pbs.twimg.com/media/EdqjfxzXgAAdIgm?format=jpg&name=4096x4096" class="card-img" alt="...">
                      </div><div class="col-md-8"><div class="card-body"><h5 class="card-title">' . $row["título"] . '</h5><p class="card-text">'
                . $row["descripción"] . '</p><div class="row no-gutters"><div class="col-10">
                      <p class="card-text"><small class="text-muted">Última actualización ' . $row["lastUpdate"] . '</small></p></div>
                      <div class="col-2"><form action="preview.php" method="post" enctype="multipart/form-data" class="form-inline">
                      <button type="submit" name="existent" value="' . $row["código"] . '" class="btn btn-secondary" >IR</button>
                      </form></div></div></div></div></div></div>';
            }
        } else {
            echo "0 results";
        }
    }

    function lasNoticias($orden, $estado) {
        $conn = new mySQLphpClass();
        $result = $conn->get_lasNoticias($orden, $estado, null);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                echo '<div class="card listaCard"><div class="row no-gutters"><div class="col-md-4">
                      <img src="https://pbs.twimg.com/media/EdqjfxzXgAAdIgm?format=jpg&name=4096x4096" class="card-img" alt="...">
                      </div><div class="col-md-8"><div class="card-body"><h5 class="card-title">' . $row["título"] . '</h5><p class="card-text">'
                . $row["descripción"] . '</p><div class="row no-gutters"><div class="col-10">
                      <p class="card-text"><small class="text-muted">Última actualización ' . $row["lastUpdate"] . '</small></p></div>
                      <div class="col-2"><form action="previewEditor.php" method="post" enctype="multipart/form-data" class="form-inline">
                      <button type="submit" name="existent" value="' . $row["código"] . '" class="btn btn-secondary" >IR</button>
                      </form></div></div></div></div></div></div>';
            }
        } else {
            echo "0 results";
        }
    }

}

class navbar {

    private $inSes;
    private $regis;

    function navbar() {
        $this->inSes = "<div class = 'dropdown ml-auto iniciarSesionDrop'><button class = 'btn btn-secondary dropdown-toggle pull-right' type = 'button' id = 'dropdownMenuButton' data-toggle = 'dropdown' aria-haspopup = 'true' aria-expanded = 'false'>
                  Iniciar Sesión</button><div class = 'dropdown-menu dropdown-menu-right'><form class = 'px-4 py-3' action = 'index.php' onsubmit = 'return validacionInicioSesion()' method = 'post' enctype='multipart/form-data'>
                  <div class = 'form-group'><label for = 'emailIniciarSecion'>Email</label><input type = 'email' class = 'form-control' id = 'emailIniciarSesion' placeholder = 'correo@ejemplo.com' name = 'Correo'>
                  </div><div class = 'form-group'><label for = 'usuarioIniciarSesion'>Usuario</label><input type = 'text' class = 'form-control' id = 'usuarioIniciarSesion' placeholder = 'Usuario' name = 'Usuario'>
                  </div><div class = 'form-group'><label for = 'contraseñaIniciarSesion'>Contraseña</label><input type = 'password' class = 'form-control' id = 'contraseñaIniciarSesion' placeholder = 'Contraseña' name = 'Contraseña'>
                  </div><button type = 'submit' class = 'btn btn-primary' >Iniciar Sesión</button></form></div></div>";
        $this->regis = "<div class = 'dropdown RegistrarseDrop'><button class = 'btn btn-secondary dropdown-toggle pull-right' type = 'button' id = 'dropdownMenuButton' data-toggle = 'dropdown' aria-haspopup = 'true' aria-expanded = 'false'>
                  Registrarse</button><div class = 'dropdown-menu dropdown-menu-right'><form class = 'px-4 py-3' action = 'index.php' onsubmit = 'return validacionRegistrarse()' method = 'post' enctype='multipart/form-data'>
                  <div class = 'form-group'><label for = 'emailRegistrarse'>Email</label><input type = 'email' class = 'form-control' id = 'emailRegistrarse' placeholder = 'correo@ejemplo.com' name = 'Correo'>
                  </div><div class = 'form-group'><label for = 'usuarioRegistrarse'>Usuario</label><input type = 'text' class = 'form-control' id = 'usuarioRegistrarse' placeholder = 'Usuario' name = 'Usuario'>
                  </div><div class = 'form-group'><label for = 'telefonoRegistrarse'>Teléfono</label><input type = 'text' class = 'form-control' id = 'telefonoRegistrarse' placeholder = 'Teléfono' name = 'Phone'>
                  </div><div class = 'form-group'><label for = 'contraseñaRegistrarse'>Contraseña</label><input type = 'password' class = 'form-control' id = 'contraseñaRegistrarse' placeholder = 'Contraseña' name = 'Contraseña'>
                  </div><div class = 'form-group'><label for = 'contraseñaConfirmarRegistrarse'>Confirmar Contraseña</label><input type = 'password' class = 'form-control' id = 'contraseñaConfirmarRegistrarse' placeholder = 'Confirmar Contraseña'>
                  </div><button type = 'submit' class = 'btn btn-primary' >Registrarse</button></form></div></div>";
    }

    function simple() {
        $code = "<nav class='nav navbar navbar-expand-lg navbar-dark fixed-top fixed-top-2'>
                    <form class='form-inline ml-auto'>
                        <div class='md-form my-0'>
                            <input class='form-control' type='text' placeholder='Search' aria-label='Search'>
                        </div>
                        <button href='#!' class='btn btn-primary btn-outline-white btn-md my-0 ml-sm-2' type='submit'>Buscar</button>
                    </form>
                </nav>";
        echo $code;
    }

    function notSession() {
        $code = "<nav class = 'nav navbar navbar-expand-lg navbar-dark fixed-top'>
                    <a class = 'navbar-brand' href = 'index.php'>Novedades del Bot</a>
                    <button class = 'navbar-toggler' type = 'button' data-toggle = 'collapse' data-target = '#navbarNavAltMarkup' aria-controls = 'navbarNavAltMarkup' aria-expanded = 'false' aria-label = 'Toggle navigation'>
                        <span class = 'navbar-toggler-icon'></span>
                    </button>
                    <div class = 'collapse navbar-collapse navbar-right' id = 'navbarNavAltMarkup'>
                        " . $this->inSes . $this->regis . "
                    </div>
                </nav>";
        echo $code;
    }

    function yesSession($nombre, $privilegio, $imagen) {
        $page = 'index.php';
        if ($privilegio == 'Editor') {
            $page = 'HomeEditor.php';
        }
        if ($privilegio == 'Reportero') {
            $page = 'Home.php';
        }
        echo "<nav class='nav navbar navbar-expand-lg navbar-dark fixed-top'>
                    <a class='navbar-brand' href='index.php'>Novedades del Bot</a>    
                    <div class='div-inline ml-auto  usuarioNav' > ";
        $img_str = base64_encode($imagen);
        echo '<img src="data:image/jpg;base64,' . $img_str . '" class="imgNavBar float-left imagenUserNavbar" alt="img de navbar "/>';
        echo "<a class='nav-link dropdown-toggle usuarioNomNav' href='#' id='navbarDropdown nav' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            " . $nombre . " 
                        </a>
                        <div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdown'>
                            <form action = 'index.php' method = 'post'>
                                <a class='dropdown-item' href='" . $page . "'>Perfil</a>
                                <a class='dropdown-item' href='ConfigUser.php'>Configuracion de Perfil</a>
                                <div class='dropdown-divider'></div>
                                <input type='submit'  href='index.php' class='button mx-3 px-5' name='salir' value='Salir' style='background=azure; border=none;'/>
                            </form>
                        </div>  
                    </div> 
                </nav>";
    }

}

class inicioRegistro {

    function inicio($usuario, $correo, $contraseña) {
        $conn = new mySQLphpClass();
        $result = $conn->initSes($usuario, $correo, $contraseña);
        return $result;
    }

    function registro($telefono, $correo, $usuario, $contraseña) {
        $conn = new mySQLphpClass();
        $result = $conn->usuarios(null, null, null, $telefono, $correo, $usuario, $contraseña, null, null, null, 'Registrado', null, 'I');
        return $result;
    }

}

class preview {

    function setStatusCard($estado) {
        if ($estado == 'Aprobada') {
            echo '<div class="card text-white bg-info text-wrap my-3 d-none d-lg-block" style="max-width: 18rem;"><div class="card-header">ESTADO</div><div class="card-body">
                  <h5 class="card-title">Revisada y Aprobada</h5><p class="card-text">La noticia ha sido aprobada, y está lista para ser publicada.</p></div></div>';
        } else if ($estado == 'Pendiente') {
            echo '<div class="card text-white bg-warning text-wrap my-3 d-none d-lg-block" style="max-width: 18rem;"><div class="card-header">ESTADO</div><div class="card-body">
                  <h5 class="card-title">Pendiente de corrección</h5><p class="card-text">La noticia no puede ser publicada porque hay uno o más detalles que atender.</p></div></div>';
        } else if ($estado == 'Rechazada') {
            echo '<div class="card text-white bg-danger text-wrap my-3 d-none d-lg-block" style="max-width: 18rem;"><div class="card-header">ESTADO</div><div class="card-body">
                  <h5 class="card-title">Rechazada por el Editor</h5><p class="card-text">El Editor ha decidido rechazar la noticia, por lo tanto no podrá ser publicada.</p></div></div>';
        } else if ($estado == 'Publicada') {
            echo '<div class="card text-white bg-success text-wrap my-3 d-none d-lg-block" style="max-width: 18rem;"><div class="card-header">ESTADO</div><div class="card-body">
                   <h5 class="card-title">Publicada</h5><p class="card-text">La noticia ya ha sido publicada en el portal de noticias.</p></div></div>';
        } else {
            echo 'NADA';
        }
    }

    function botonesModales($estado) {
        if ($estado == 'Aprobada') {
            echo '<button type="button" class="btn btn-info my-3 d-block d-sm-block d-md-block d-lg-none" data-toggle="modal" data-target="#modalStatus" style="width: 100%;padding-top: 100%;position: relative; padding-bottom: 0; ">
                  <p style="position: absolute; font-size: 8vw; top: 2%; left: 0%; bottom: 0; right: 0;">E</p></button>';
        } else if ($estado == 'Pendiente') {
            echo '<button type="button" class="btn btn-warning my-3 d-block d-sm-block d-md-block d-lg-none" data-toggle="modal" data-target="#modalStatus" style="width: 100%;padding-top: 100%;position: relative; padding-bottom: 0; ">
                  <p style="position: absolute; font-size: 8vw; top: 2%; left: 0%; bottom: 0; right: 0;">E</p></button>';
        } else if ($estado == 'Rechazada') {
            echo '<button type="button" class="btn btn-danger my-3 d-block d-sm-block d-md-block d-lg-none" data-toggle="modal" data-target="#modalStatus" style="width: 100%;padding-top: 100%;position: relative; padding-bottom: 0; ">
                  <p style="position: absolute; font-size: 8vw; top: 2%; left: 0%; bottom: 0; right: 0;">E</p></button>';
        } else if ($estado == 'Publicada') {
            echo '<button type="button" class="btn btn-success my-3 d-block d-sm-block d-md-block d-lg-none" data-toggle="modal" data-target="#modalStatus" style="width: 100%;padding-top: 100%;position: relative; padding-bottom: 0; ">
                   <p style="position: absolute; font-size: 8vw; top: 2%; left: 0%; bottom: 0; right: 0;">E</p></button>';
        } else {
            echo 'NADA';
        }
    }

    function ventanasModales($estado, $editComm) {
        $title = '';
        $text = '';
        $color = '';
        if ($estado == 'Aprobada') {
            $title = 'ESTADO: Revisada y Aprobada';
            $text = 'La noticia ha sido aprobada, y está lista para ser publicada.';
            $color = 'bg-info';
        } else if ($estado == 'Pendiente') {
            $title = 'ESTADO: Pendiente de corrección';
            $text = 'La noticia no puede ser publicada porque hay uno o más detalles que atender.';
            $color = 'bg-warning';
        } else if ($estado == 'Rechazada') {
            $title = 'ESTADO: Rechazada por el Editor';
            $text = 'El Editor ha decidido rechazar la noticia, por lo tanto no podrá ser publicada.';
            $color = 'bg-danger';
        } else if ($estado == 'Publicada') {
            $title = 'ESTADO: Publicada';
            $text = 'La noticia ya ha sido publicada en el portal de noticias.';
            $color = 'bg-success';
        } else {
            echo 'NADA';
        }
        echo '<div class="modal fade" id="modalStatus" tabindex="-1" aria-labelledby="modalStatusLabel" aria-hidden="true"><div class="modal-dialog modal-dialog-centered"><div class="modal-content ' . $color . '">
              <div class="modal-header"><h5 class="modal-title" id="modalStatusLabel">' . $title . '</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button></div><div class="modal-body">' . $text . '</div></div></div></div>';
        echo '<div class="modal fade" id="modalComment" tabindex="-1" aria-labelledby="modalCommentLabel" aria-hidden="true"><div class="modal-dialog modal-dialog-centered"><div class="modal-content">
              <div class="modal-header"><h5 class="modal-title" id="modalCommentLabel">Comentarios</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button></div><div class="modal-body">' . $editComm . '</div></div></div></div>';
    }

}

class archivos {

    private $codigo;
    private $arr;

    function archivos($code) {
        $this->codigo = $code;
        $this->arr = array();
    }

    function cargarArchivos() {
        $conn = new mySQLphpClass();
        $i = 1;
        while (true) {
            $result = $conn->get_Archivos($this->codigo, null, $i);
            $row = $result->fetch_assoc();
            if ($row["tipo"] == 'vacio') {
                break;
            }
            $this->HTMLify($row);
            $i++;
        }
    }

    private function imash($size, $orden, $imagen) {
        //$img_str = base64_encode($imagen);
        $id = 'modal' . $orden;
        $str = '<div class="row py-3"><div class="col" align="center">
                  <img src="data:image/jpg;base64,' . $imagen . '" class="figure-img img-fluid rounded ' . $size . '" alt="..."><div class="editBTN" data-toggle="modal" data-target="#' . $id . '">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                  </svg></div></div></div>';
        return $str;
    }

    private function tecsto($text, $orden) {
        $id = 'modal' . $orden;
        $str = '<div class = "row py-3"><div class = "col"><p>' . $text . '</p><div class="editBTN" data-toggle="modal" data-target="#' . $id . '">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                  </svg></div></div></div>';
        return $str;
    }

    private function imashModal($orden, $code) {
        $id = 'modal' . $orden;
        $str = '<div class="modal fade" id="' . $id . '" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="' . $id . '" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="staticBackdropLabel">Editar Imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                <form action="preview.php" method="post" enctype="multipart/form-data"><div class="modal-body"><div class=" user-select-none"><input type="text" class="form-control" name="code" value="' . $code . '"readonly="readonly" style="color: #e9ecef;">
                </div><div class="input-group"><div class="custom-file"><div class="btn btn-outline-secondary btn-rounded waves-effect float-left">
                <input type="file" id="archivo" name="image" accept="image/png,image/jpeg"></div></div></div></div><div class="modal-footer"><button type="submit" class="btn btn-danger" name="deleteFile" value="I' . $orden . '">Eliminar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                <button type="submit" class="btn btn-primary" name="editFile" value="I' . $orden . '">Aceptar</button></div></form></div></div></div>';
        array_push($this->arr, $str);
    }

    private function tecstoModal($text, $orden, $code) {
        $id = 'modal' . $orden;
        $str = '<div class="modal fade" id="' . $id . '" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="' . $id . '" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="staticBackdropLabel">Editar Texto</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
               <form action="preview.php" method="post" enctype="multipart/form-data"><div class="modal-body"><div class=" user-select-none"><input type="text" class="form-control" name="code" value="' . $code . '" readonly="readonly" style="color: #e9ecef;">
               </div><div class="input-group"><div class="input-group-prepend"><span class="input-group-text">Texto</span></div>
               <textarea class="form-control" aria-label="titleDescModal" name="texto' . $id . '" id="textAreaField" rows="4" cols="50">' . $text . '</textarea></div></div>
               <div class="modal-footer"><button type="submit" class="btn btn-danger" name="deleteFile" value="T' . $orden . '">Eliminar</button>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button><button type="submit" class="btn btn-primary" name="editFile" value="T' . $orden . '">Aceptar</button></div></form></div></div></div>';
        array_push($this->arr, $str);
    }

    private function HTMLify($row) {
        if ($row["tipo"] == 'imagen') {
            $size = '';
            if ($row["tamaño"] == 1) {
                $size = 'noticiaIMG-ch';
            }
            if ($row["tamaño"] == 2) {
                $size = 'noticiaIMG-md';
            }
            if ($row["tamaño"] == 3) {
                $size = 'noticiaIMG-gd';
            }
            echo $this->imash($size, $row["orden"], $row["imagen"]);
            $this->imashModal($row["orden"], $row["clave"]);
        } else if ($row["tipo"] == 'texto') {
            echo $this->tecsto($row["texto"], $row["orden"]);
            $this->tecstoModal($row["texto"], $row["orden"], $row["clave"]);
        } else {
            echo 'nada pueh';
        }
    }

    public function modales() {
        foreach ($this->arr as $mode) {
            echo $mode;
        }
    }

}

