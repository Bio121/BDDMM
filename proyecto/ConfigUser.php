
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

        if (isset($_SESSION["usuario"]) && isset($_SESSION["clave"])) {
            echo $_SESSION["usuario"];
            echo "<br>";
            echo $_SESSION["clave"];
            $nav->yesSession($_SESSION["usuario"]);
        } else {
            $_SESSION["usuario"] = null;
            $_SESSION["clave"] = null;
            $nav->notSession();
        }
        session_unset();
        ?>

        <div class="contGlobal">
            <div class="mainContent">
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
                            <form action="ConfigUser.php" onsubmit="return validacionConfig()">

                                <label for="UsuarioConfig">Usuario</label>
                                <input type="text" class="form-control campoConfig" id="UsuarioConfig" name="UsuarioConfig" placeholder=" ">

                                <label for="mailCofig">Correo electrónico</label>
                                <input type="text" class="form-control campoConfig" id="mailCofig" name="mailCofig" placeholder=" ">

                                <label for="contraConfig">Contraseña</label>
                                <input type="password" class="form-control campoConfig" id="contraConfig" name="contraConfig" placeholder=" ">

                                <label for="confirmarContraConfig">Confirmar contraseña</label>
                                <input type="password" class="form-control campoConfig" id="confirmarContraConfig" name="confirmarContraConfig" placeholder=" ">

                                <div class="separadorConfig"></div>

                                <label for="nombreConfig">Nombre</label>
                                <input type="text" class="form-control campoConfig" id="nombreConfig" name="nombreConfig" placeholder=" ">

                                <label for="apellidoPaConfig">Apellido paterno</label>
                                <input type="text" class="form-control campoConfig" id="apellidoPaConfig" name="apellidoPaConfig" placeholder=" ">

                                <label for="apellidoMaConfig">Apellido materno</label>
                                <input type="text" class="form-control campoConfig" id="apellidoMaConfig" name="apellidoMaConfig" placeholder=" ">

                                <label for="TelefonoConfig">Telefono</label>
                                <input type="number" class="form-control campoConfig" id="TelefonoConfig" name="TelefonoConfig" placeholder=" ">

                                <label  for="nacimiento">Fecha de nacimiento</label>
                                <input type="date" id="nacimiento" class="campoConfig" name="nacimiento" value="2020-01-01" min="1900-01-01" max="2020-12-31">

                                <p id="seccion">Genero:</p>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="maculino" name="generoConfig" class="custom-control-input">
                                    <label class="custom-control-label" for="maculino">Maculino</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="femenino" name="generoConfig" class="custom-control-input">
                                    <label class="custom-control-label" for="femenino">Femenino</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="noBinario" name="generoConfig" class="custom-control-input">
                                    <label class="custom-control-label" for="noBinario">no binario</label>
                                </div>

                                <button class="btn btn-primary btnConfig" type="submit">Cambiar Datos</button>

                            </form>
                            <button class="btn btn-primary btnBaja" type="submit" onclick="BajaUsuariro()">Darse de baja </button>
                        </div>
                    </div>  
                </div>

            </div>


            <div class="barra overflow-auto">
                <div class="separador">CATEGORÍAS</div>
                <div class="category user-select-none" style="background: #3300cc">
                    Texto por aquí
                </div>
                <div class="category user-select-none" style="background: #333300">
                    Texto por allá
                </div>
                <div class="category user-select-none" style="background: #ff9999">
                    Texto en todas partes
                </div>
                <div class="category user-select-none" style="background: #6666ff" onclick="alertaRoja()">
                    Alerta Roja
                </div>
                <div class="category user-select-none" style="background: #ff6633" onclick="Redirect('formato.php')">
                    Al Formato
                </div>
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
        <?php
        // put your code here
        ?>
    </body>
</html>