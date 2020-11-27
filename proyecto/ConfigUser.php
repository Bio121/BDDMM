
<?php
if (session_id() == '') {
    session_start();
}
?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" href="styles.css" media="screen">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src= "scripts.js";></script>
        <meta charset="UTF-8">
        <title>configuracion de usuario </title>
    </head>
    <body>

        <?php
        include "classes.php";

        $nav = new navbar();
        $nav->simple();
        $RBmale = '';
        $RBfemale = '';
        $RBnb = 'checked="checked"';
        $mal = false;
        $Error1 = '';
        $Error2 = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($_POST["ConfirmarCKB"]) || isset($_POST["bajaText"])) {
                $adios = true;
                if (!isset($_POST['ConfirmarCKB'])) {
                    $Error1 = 'La cuenta no puede darse de baja sin marcar la casilla correspondiente<br>';
                    $mal = true;
                    $adios = false;
                }
                if ($_POST['bajaText'] != 'Dar de Baja mi cuenta') {
                    $Error2 = 'La frase de seguridad debe corresponder para dar de baja la cuenta';
                    $mal = true;
                    $adios = false;
                }
                $nav->yesSession($_SESSION["usuario"]);
                if ($adios) {
                    $newUser = $_SESSION["usuario"];
                    $nombre = 'queImporta';
                    $paterno = 'queImporta';
                    $materno = 'queImporta';
                    $telefono = 'queImporta';
                    $correo = $_SESSION["correo"];
                    $usuario = $_SESSION["usuario"];
                    $contraseña = $_SESSION["contraseishon"];
                    $confimacion = 'queImporta';
                    $genero = 'queImporta';
                    $nacimiento = null;
                    $imagen = '';
                    $con = new mySQLphpClass();
                    $con->usuarios($nombre, $paterno, $materno, $telefono, $correo, $usuario, $contraseña, $imagen, $genero, $nacimiento, $_SESSION["privilegio"], $newUser, 'D');
                    session_unset();
                    session_destroy();
                    header('Location: index.php');
                }
            } else {
                $nav->yesSession($_SESSION["usuario"]);
                $newUser = $_SESSION["usuario"];
                $nombre = $_POST["nombreConfig"];
                $paterno = $_POST["apellidoPaConfig"];
                $materno = $_POST["apellidoMaConfig"];
                $telefono = $_POST["TelefonoConfig"];
                $correo = $_POST["mailCofig"];
                $usuario = $_SESSION["usuario"];
                if ($newUser != $_POST["UsuarioConfig"])
                    $newUser = $_POST["UsuarioConfig"];
                $contraseña = $_POST["contraConfig"];
                $confimacion = $_POST["confirmarContraConfig"];
                $genero = $_POST["generoConfig"];
                $nacimiento = $_POST["nacimiento"];
                $imagen = '';
                if (empty($nacimiento)) {
                    $nacimiento = null;
                }
                $update = new mySQLphpClass();
                $ses = new inicioRegistro();
                $update->usuarios($nombre, $paterno, $materno, $telefono, $correo, $usuario, $contraseña, $imagen, $genero, $nacimiento, $_SESSION["privilegio"], $newUser, 'U');
                $result = $ses->inicio($newUser, $correo, $contraseña);
                if (!empty($result)) {
                    $_SESSION["nombre"] = $result[0];
                    $_SESSION["paterno"] = $result[1];
                    $_SESSION["materno"] = $result[2];
                    $_SESSION["telefono"] = $result[3];
                    $_SESSION["correo"] = $result[4];
                    $_SESSION["usuario"] = $result[5];
                    $_SESSION["contraseishon"] = $result[6];
                    $_SESSION["imagen"] = $result[7];
                    $_SESSION["genero"] = $result[8];
                    $_SESSION["nacimiento"] = $result[9];
                    $_SESSION["privilegio"] = $result[10];
                    $nav->yesSession($_SESSION["usuario"]);
                }
            }
        } else {
            if (isset($_SESSION["usuario"])) {
                $nav->yesSession($_SESSION["usuario"]);

                if ($_SESSION["genero"] == 'Hombre') {
                    $RBmale = 'checked="checked"';
                    $RBnb = '';
                } else if ($_SESSION["genero"] == 'Mujer') {
                    $RBfemale = 'checked="checked"';
                    $RBnb = '';
                } else {
                    $RBnb = 'checked="checked"';
                }
            } else {
                header('Location: index.php');
            }
        }
        ?>

        <div class="contGlobal">
            <div class="mainContent">

                <?php
                if ($mal) {
                    echo "<div class='alert alert-danger' role='alert'>Fallas en lo siguiente:<br>" . $Error1 . $Error2 . "</div>";
                }
                ?>

                <div class="container">
                    <div class="row"> 

                        <div class="col">                  
                            <img src="https://pbs.twimg.com/media/EjTY9nDWAAAYDdu?format=jpg&name=900x900" class="float-left imagenUserConfig" alt="..." >

                            <div class="custom-file">

                                <div class="btn btn-outline-secondary btn-rounded waves-effect float-left">
                                    <input type="file" >
                                </div>

                            </div>
                        </div>
                        <div class="col-8" >
                            <form action="ConfigUser.php" onsubmit="return validacionConfig()" method="post" enctype='multipart/form-data'>

                                <label for="UsuarioConfig" class="user-select-none">Usuario</label>
                                <input type="text" class="form-control campoConfig" id="UsuarioConfig" name="UsuarioConfig" value="<?php echo $_SESSION["usuario"] ?>">

                                <label for="mailCofig" class="user-select-none">Correo electrónico</label>
                                <input type="text" class="form-control campoConfig" id="mailCofig" name="mailCofig" value="<?php echo $_SESSION["correo"] ?>">

                                <label for="contraConfig" class="user-select-none">Contraseña</label>
                                <input type="password" class="form-control campoConfig" id="contraConfig" name="contraConfig" value="<?php echo $_SESSION["contraseishon"] ?>">

                                <label for="confirmarContraConfig" class="user-select-none">Confirmar contraseña</label>
                                <input type="password" class="form-control campoConfig" id="confirmarContraConfig" name="confirmarContraConfig" value="<?php echo $_SESSION["contraseishon"] ?>">

                                <div class="separadorConfig user-select-none"></div>

                                <label for="nombreConfig" class="user-select-none">Nombre</label>
                                <input type="text" class="form-control campoConfig" id="nombreConfig" name="nombreConfig" value="<?php echo $_SESSION["nombre"] ?>">

                                <label for="apellidoPaConfig" class="user-select-none">Apellido paterno</label>
                                <input type="text" class="form-control campoConfig" id="apellidoPaConfig" name="apellidoPaConfig" value="<?php echo $_SESSION["paterno"] ?>">

                                <label for="apellidoMaConfig" class="user-select-none">Apellido materno</label>
                                <input type="text" class="form-control campoConfig" id="apellidoMaConfig" name="apellidoMaConfig" value="<?php echo $_SESSION["materno"] ?>">

                                <label for="TelefonoConfig" class="user-select-none">Telefono</label>
                                <input type="number" class="form-control campoConfig" id="TelefonoConfig" name="TelefonoConfig" value="<?php echo $_SESSION["telefono"] ?>">

                                <label  for="nacimiento" class="user-select-none">Fecha de nacimiento</label>
                                <input type="date" id="nacimiento" class="campoConfig" name="nacimiento" min="1900-01-01" max="2020-12-31" value="<?php echo $_SESSION["nacimiento"] ?>">

                                <p id="seccion">Genero:</p>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="maculino" name="generoConfig" class="custom-control-input" <?php echo $RBmale; ?> value="Hombre">
                                    <label class="custom-control-label user-select-none" for="maculino">Maculino</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="femenino" name="generoConfig" class="custom-control-input" <?php echo $RBfemale; ?> value="Mujer">
                                    <label class="custom-control-label user-select-none" for="femenino">Femenino</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="noBinario" name="generoConfig" class="custom-control-input" <?php echo $RBnb; ?> value="No Binario">
                                    <label class="custom-control-label user-select-none" for="noBinario">No Binario</label>
                                </div>

                                <button class="btn btn-primary btnConfig" type="submit">Cambiar Datos</button>

                            </form>

                            <?php
                            if ($_SESSION["privilegio"] == "Registrado") {
                                echo '<br class="user-select-none">
                                        <form action="ConfigUser.php" method="post" enctype="multipart/form-data">

                                            <input id="ConfirmarCKB" type="checkbox" name="ConfirmarCKB" value="No" class="user-select-none"/>
                                            <label for="ConfirmarCKB" class="user-select-none">Marca esta casilla si quieres dar de baja tu cuenta</label>

                                            <br class="user-select-none">

                                            <label for="bajaText">Copia y pega la frase "Dar de Baja mi cuenta" sin los "", en el siguiente campo</label>
                                            <input type="text" class="form-control campoConfig" id="bajaText" name="bajaText">

                                            <button class="btn btn-primary btnBaja" type="submit" onclick="BajaUsuariro()">Darse de baja</button>

                                        </form>';
                            }
                            ?>
                        </div>
                    </div>  
                </div>

            </div>


            <div class="barra overflow-auto">
                <div class="separador">CATEGORÍAS</div>
                <?php
                $barra = new category();
                $barra->llenaLaBarra();
                ?>
            </div>
        </div>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col">
                        qué onda
                    </div>
                    <div class="col">
                        qué tal
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        cómo va todo?
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>