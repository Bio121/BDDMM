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
        <nav class="nav navbar navbar-expand-lg navbar-dark fixed-top fixed-top-2">
            <form class="form-inline ml-auto">
                <div class="md-form my-0">
                    <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                </div>
                <button href="#!" class="btn btn-primary btn-outline-white btn-md my-0 ml-sm-2" type="submit">Buscar</button>
            </form>
        </nav>

        <nav class="nav navbar navbar-expand-lg navbar-dark fixed-top">
            <a class="navbar-brand" href="index.php">Novedades del Bot</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-right" id="navbarNavAltMarkup">

                <div class="dropdown ml-auto iniciarSesionDrop">
                    <button class="btn btn-secondary dropdown-toggle pull-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        iniciar sesion
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <form class="px-4 py-3" action="ConfigUser.php" onsubmit="return validacionInicioSesion()">
                            <div class="form-group">
                                <label for="emailIniciarSecion">Email</label>
                                <input type="email" class="form-control" id="emailIniciarSesion" placeholder="email@example.com">
                            </div>

                            <div class="form-group">
                                <label for="usuarioIniciarSesion">Usuario</label>
                                <input type="text" class="form-control" id="usuarioIniciarSesion" placeholder="Usuario">
                            </div>
                            <div class="form-group">
                                <label for="contraseñaIniciarSesion">Contraseña</label>
                                <input type="password" class="form-control" id="contraseñaIniciarSesion" placeholder="Contraseña">
                            </div>                           
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="dropdownCheck">
                                <label class="form-check-label" for="dropdownCheck">
                                    Recuerdame
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary" >iniciar sesion</button>
                        </form>

                    </div>


                </div>

                <div class="dropdown RegistrarseDrop">
                    <button class="btn btn-secondary dropdown-toggle pull-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        registrarse
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <form class="px-4 py-3">
                            <div class="form-group">
                                <label for="emailRegistrarse">Email</label>
                                <input type="email" class="form-control" id="emailRegistrarse" placeholder="email@example.com">
                            </div>
                            <div class="form-group">
                                <label for="usuarioRegistrarse">Usuario</label>
                                <input type="text" class="form-control" id="usuarioRegistrarse" placeholder="Usuario">
                            </div>
                            <div class="form-group">
                                <label for="telefonoRegistrarse">Telefono</label>
                                <input type="number" class="form-control" id="telefonoRegistrarse" placeholder="telefono">
                            </div>
                            <div class="form-group">
                                <label for="contraseñaRegistrarse">Contraseña</label>
                                <input type="password" class="form-control" id="contraseñaRegistrarse" placeholder="Contraseña">
                            </div>
                            <div class="form-group">
                                <label for="contraseñaConfirmarRegistrarse">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="contraseñaConfirmarRegistrarse" placeholder="Confirmar Contraseña">
                            </div>
                            <button type="submit" class="btn btn-primary" onclick="validacionRegistrarse()">Registrarse</button>
                        </form>

                    </div>
                </div>

            </div>
        </nav>

        <?php
        phpinfo();
        // put your code here
        ?>
    </body>
</html>
