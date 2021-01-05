
<?php
session_start();
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
        <title>Home</title>
        <style>
            .equis{
                position: absolute;
                right: 10px;
                display: block;
                padding-bottom: 5%;
                color: #50278a;
            }
            .equis:hover{
                color: #9966ff;
            }
            .equis:active{
                color: #cbb1d1;
            }
            .repContainer{
                background: #e1cce5;
                border-radius: 10px;
                width: 100%;
                overflow-x: auto;
                white-space: nowrap;
                overflow-y: hidden;
                padding: 3px;
            }
            .repUser{
                position: relative;
                bottom: 20%;
                display: inline-block;
                border: dotted #ddc5e3 3px;
                border-radius: 10px;
                min-height: 13rem;
                min-width: 8em;
                font-size: 20px;
                background-color: #f5e2ff;
                color: #351a5e;
                padding: 0;
            }
            .repIMG>img{
                width: 6rem;
                height: 6rem;
                border-radius: 50%;
                margin-left: 20%;
                margin-top: 15%;
                margin-bottom: 8px;
            }
            .addGuy{
                position: relative;
                text-align: center;
                color: #351a5e;
            }
        </style>
    </head>
    <body>

        <?php
        include "classes.php";

        $nav = new navbar();
        $nav->simple();
        $orden = 'D';
        $estado = null;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nav->yesSession($_SESSION["usuario"], $_SESSION["privilegio"], $_SESSION["imagen"]);

            if (array_key_exists('asc', $_POST)) {
                $orden = 'A';
                $estado = null;
            }
            if (array_key_exists('desc', $_POST)) {
                $orden = 'D';
                $estado = null;
            }
            if (array_key_exists('ascPen', $_POST)) {
                $orden = 'A';
                $estado = 'Pendiente';
            }
            if (array_key_exists('descPen', $_POST)) {
                $orden = 'D';
                $estado = 'Pendiente';
            }
            if (array_key_exists('ascRec', $_POST)) {
                $orden = 'A';
                $estado = 'Rechazada';
            }
            if (array_key_exists('descRec', $_POST)) {
                $orden = 'D';
                $estado = 'Rechazada';
            }
            if (array_key_exists('ascPub', $_POST)) {
                $orden = 'A';
                $estado = 'Publicada';
            }
            if (array_key_exists('descPub', $_POST)) {
                $orden = 'D';
                $estado = 'Publicada';
            }
            if (array_key_exists('ascApr', $_POST)) {
                $orden = 'A';
                $estado = 'Aprobada';
            }
            if (array_key_exists('descApr', $_POST)) {
                $orden = 'D';
                $estado = 'Aprobada';
            }

            if (isset($_POST["Phone"])) {
                $ses = new inicioRegistro();
                $usuario = $_POST["Usuario"];
                $correo = $_POST["Correo"];
                $contraseña = $_POST["Contraseña"];
                $telefono = $_POST["Phone"];
                $texto = $ses->regReportero($telefono, $correo, $usuario, $contraseña);
                $regis = true;
            }
        } else {
            if (isset($_SESSION["usuario"])) {
                if ($_SESSION["privilegio"] != 'Editor') {
                    header('Location: index.php');
                }
                $nav->yesSession($_SESSION["usuario"], $_SESSION["privilegio"], $_SESSION["imagen"]);
            } else {
                header('Location: index.php');
            }
        }
        ?>


        <div class="contGlobal">
            <div class="mainContent">

                <h1>¡Bienvenido de nuevo Editor!</h1>
                <p class="mb-5">Listos para checar algunas noticias :D</p>
                <div class="row justify-content-center">
                    <button type="button" class="btn btn-success btn-lg p-2 px-5 m-2" onclick="ventanaNueva('creacionSeccion.php')">
                        Crea una nueva sección
                    </button>
                    <button type="button" class="btn btn-warning btn-lg p-2 px-5 m-2" onclick="ventanaNueva('escogerSeccion.php')">
                        Modifica una sección
                    </button>
                    <button type="button" class="btn btn-danger btn-lg p-2 px-5 m-2" onclick="ventanaNueva('eliminarSeccion.php')">
                        Elimina una sección
                    </button>
                </div>

                <div class="separador my-3 user-select-none"><h4 class="mb-3">Reporteros</h4></div>

                <div class="repContainer user-select-none">

                    <?php
                    $rep = new reporteros();
                    $rep->fillReporteros();
                    ?>

                    <div class="repUser my-auto user-select-none">
                        <div class="row">
                            <div class="equis text-right pr-1" data-toggle="modal" data-target="#modal22">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="row repIMG mx-auto">
                            <img src="https://pbs.twimg.com/media/EiNYM5CWAAAh9PV?format=png&name=240x240" alt="Avatar">
                        </div>
                        <div>
                            <p class="text-center">MMMMMMM</p>
                        </div>
                    </div>

                </div>

                <div class="row pt-3 justify-content-center">
                    <button type="button" class="btn btn-success btn-lg px-5" data-toggle="modal" data-target="#modalNewRep">
                        Dar de alta un Reportero
                    </button>
                </div>


                <div class="separador my-3 user-select-none"><h4 class="mb-3">Noticias</h4></div>

                <form action="homeEditor.php" method="post" enctype='multipart/form-data'>
                    <div class="dropright">
                        <button class="btn btn-secondary dropdown-toggle" style="background: #ccccff; border-color: #9999ff;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Criterio de Orden
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <input type="submit" class="dropdown-item" value="Más recientes (histórico)" name="desc">
                            <input type="submit" class="dropdown-item" value="Más antiguos (histórico)" name="asc">
                            <input type="submit" class="dropdown-item" value="Pendientes de aprobación (recientes)" name="descPen">
                            <input type="submit" class="dropdown-item" value="Pendientes de aprobación (antiguos)" name="ascPen">
                            <input type="submit" class="dropdown-item" value="Rechazadas (recientes)" name="descRec">
                            <input type="submit" class="dropdown-item" value="Rechazadas (antiguos)" name="ascRec">
                            <input type="submit" class="dropdown-item" value="Aprobadas (recientes)" name="descApr">
                            <input type="submit" class="dropdown-item" value="Aprobadas (antiguos)" name="ascApr">
                            <input type="submit" class="dropdown-item" value="Publicadas (recientes)" name="descPub">
                            <input type="submit" class="dropdown-item" value="Publicadas (antiguos)" name="ascPub">

                        </div>
                    </div>
                </form>

                <div class="listaNotas overflow-auto my-2">

                    <div class="notaLista">

                        <?php
                        $lista = new noticias();
                        $lista->lasNoticias($orden, $estado);
                        ?>

                    </div>

                </div>

            </div>


            <div class="barra overflow-auto">

                <div class="perfil" style="color: azure;">
                    <div class="row no-gutters">
                        <div class="col">
                            <?php
                            $img = "https://pbs.twimg.com/media/EiNYM5CWAAAh9PV?format=png&name=240x240";
                            if (!empty($_SESSION["imagen"])) {
                                $img = "data:image/jpg;base64," . base64_encode($_SESSION["imagen"]);
                            }
                            ?>
                            <img src='<?php echo $img; ?>' alt='Avatar' style="height: auto;">
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col py-2 text-center">
                            <h3><?php echo $_SESSION["usuario"] ?></h3>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col px-2 text-center">
                            <p><?php echo $_SESSION["correo"] ?></p>

                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col px-2 text-right">
                            <p><?php echo $_SESSION["privilegio"] ?></p>

                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col py-3 text-center">
                            <p><?php echo $_SESSION["nombre"] . ' ' . $_SESSION["paterno"] . ' ' . $_SESSION["materno"] ?></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Ventanas Modales -->

        <!-- Modal Crear nuevo Reportero -->
        <div class="modal fade" id="modalNewRep" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="newRepModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Registrar Reportero</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="HomeEditor.php" method="post" enctype='multipart/form-data' onsubmit = 'return validacionRegistrarse()'>
                        <div class="modal-body">
                            <div class = 'dropdown RegistrarseDrop'>
                                <div class = 'form-group'>
                                    <label for = 'emailRegistrarse'>Email</label>
                                    <input type = 'email' class = 'form-control' id = 'emailRegistrarse' placeholder = 'correo@ejemplo.com' name = 'Correo'>
                                </div>
                                <div class = 'form-group'>
                                    <label for = 'usuarioRegistrarse'>Usuario</label>
                                    <input type = 'text' class = 'form-control' id = 'usuarioRegistrarse' placeholder = 'Usuario' name = 'Usuario'>
                                </div>
                                <div class = 'form-group'>
                                    <label for = 'telefonoRegistrarse'>Teléfono</label>
                                    <input type = 'text' class = 'form-control' id = 'telefonoRegistrarse' placeholder = 'Teléfono' name = 'Phone'>
                                </div>
                                <div class = 'form-group'>
                                    <label for = 'contraseñaRegistrarse'>Contraseña</label>
                                    <input type = 'password' class = 'form-control' id = 'contraseñaRegistrarse' placeholder = 'Contraseña' name = 'Contraseña'>
                                </div>
                                <div class = 'form-group'>
                                    <label for = 'contraseñaConfirmarRegistrarse'>Confirmar Contraseña</label>
                                    <input type = 'password' class = 'form-control' id = 'contraseñaConfirmarRegistrarse' placeholder = 'Confirmar Contraseña'>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                            <button type="submit" class="btn btn-primary" name="CreateRep" value="CreateRep">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
        $rep->modales();
        ?>

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
        //phpinfo();
        ?>
    </body>
</html>
