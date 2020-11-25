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
// output data of each row
            while ($row = $result->fetch_assoc()) {

                echo "<div class='category user-select-none' style='background: #" . $row["Color"] . "'>" . $row["Nombre"] . "</div>";
            }
        } else {
            echo "0 results";
        }
        $conn = null;
    }

    function dropdown() {
        $conn = new mySQLphpClass();
        $result = $conn->get_secciones();
        if ($result->num_rows > 0) {
// output data of each row
            while ($row = $result->fetch_assoc()) {

                echo "<p class='dropdown-item'>" . $row["Nombre"] . "</p>";
            }
        } else {
            echo "0 results";
        }
        $conn = null;
    }

}

class noticias {

    function enHome($cant) {
        $conn = new mySQLphpClass();
        $result = $conn->get_noticias($cant);
        if ($result->num_rows > 0) {
// output data of each row
            while ($row = $result->fetch_assoc()) {

                echo "<div class='nota py-5' onclick='noticia(01)'><div class='row no-gutters'>
                      <div class='col-12'><h2>" . $row["Título"] . "</h2></div></div>
                      <div class='row no-gutters'><div class='col-lg-5'>
                      <img src='https://pbs.twimg.com/media/EgvGhYbXYAA2Ean?format=png&name=small' class='notaIMG'/>
                      </div><div class='col-lg-7 p-2'><div class='row no-gutters' style='height: 90%;'>
                      <p>" . $row["Descripción"] . "</p></div><div class='row no-gutters'>
                      <div class='col'><p class='autor'>" . $row["Nombre_Rep"] . " - " . $row["fechaPublicado"] .
                "</p></div></div></div></div></div>";
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
                  Iniciar Sesión</button><div class = 'dropdown-menu dropdown-menu-right'><form class = 'px-4 py-3' action = 'index.php' onsubmit = 'return validacionInicioSesion()' method = 'post'>
                  <div class = 'form-group'><label for = 'emailIniciarSecion'>Email</label><input type = 'email' class = 'form-control' id = 'emailIniciarSesion' placeholder = 'correo@ejemplo.com' name = 'Correo'>
                  </div><div class = 'form-group'><label for = 'usuarioIniciarSesion'>Usuario</label><input type = 'text' class = 'form-control' id = 'usuarioIniciarSesion' placeholder = 'Usuario' name = 'Usuario'>
                  </div><div class = 'form-group'><label for = 'contraseñaIniciarSesion'>Contraseña</label><input type = 'password' class = 'form-control' id = 'contraseñaIniciarSesion' placeholder = 'Contraseña' name = 'Contraseña'>
                  </div><div class = 'form-check'><input type = 'checkbox' class = 'form-check-input' id = 'dropdownCheck'><label class = 'form-check-label' for = 'dropdownCheck'>Recuérdame</label>
                  </div><button type = 'submit' class = 'btn btn-primary' >Iniciar Sesión</button></form></div></div>";

        $this->regis = "<div class = 'dropdown RegistrarseDrop'><button class = 'btn btn-secondary dropdown-toggle pull-right' type = 'button' id = 'dropdownMenuButton' data-toggle = 'dropdown' aria-haspopup = 'true' aria-expanded = 'false'>
                  Registrarse</button><div class = 'dropdown-menu dropdown-menu-right'><form class = 'px-4 py-3' onsubmit = 'return validacionRegistrarse()'>
                  <div class = 'form-group'><label for = 'emailRegistrarse'>Email</label><input type = 'email' class = 'form-control' id = 'emailRegistrarse' placeholder = 'correo@ejemplo.com'>
                  </div><div class = 'form-group'><label for = 'usuarioRegistrarse'>Usuario</label><input type = 'text' class = 'form-control' id = 'usuarioRegistrarse' placeholder = 'Usuario'>
                  </div><div class = 'form-group'><label for = 'telefonoRegistrarse'>Telefono</label><input type = 'number' class = 'form-control' id = 'telefonoRegistrarse' placeholder = 'Teléfono'>
                  </div><div class = 'form-group'><label for = 'contraseñaRegistrarse'>Contraseña</label><input type = 'password' class = 'form-control' id = 'contraseñaRegistrarse' placeholder = 'Contraseña'>
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

    function yesSession($nombre) {
        $code = "<nav class='nav navbar navbar-expand-lg navbar-dark fixed-top'>
                    <a class='navbar-brand' href='index.php'>Novedades del Bot</a>    
                    <div class='div-inline ml-auto  usuarioNav' > 
                        <img src='https://pbs.twimg.com/media/EjTY9nDWAAAYDdu?format=jpg&name=900x900' class='imgNavBar float-left imagenUserNavbar' alt='img de navbar'>
                        <a class='nav-link dropdown-toggle usuarioNomNav' href='#' id='navbarDropdown nav' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            " . $nombre . " 
                        </a>
                        <div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdown'>
                            <a class='dropdown-item' href='home.php'>Perfil</a>
                            <a class='dropdown-item' href='ConfigUser.php'>Configuracion de Perfil</a>
                            <div class='dropdown-divider'></div>
                            <a class='dropdown-item' href='index.php' onclick='salirDeAquí()'>Cerrar Sesión</a>
                        </div>  
                    </div> 
                </nav>";
        echo $code;
    }

}

class inicioSesión {

    function verdad($usuario, $correo, $contraseña) {
        $conn = new mySQLphpClass();
        $result = $conn->initSes($usuario, $correo, $contraseña);
        return $result;
    }

}


