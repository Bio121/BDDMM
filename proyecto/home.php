
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
    </head>
    <body>

        <?php
        include "classes.php";

        $nav = new navbar();
        $nav->simple();
        $orden = 'D';
        $estado = null;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nav->yesSession($_SESSION["usuario"], $_SESSION["privilegio"],$_SESSION["imagen"]);

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
        } else {
            if (isset($_SESSION["usuario"])) {
                if($_SESSION["privilegio"] != 'Reportero'){
                    header('Location: index.php');
                }
                $nav->yesSession($_SESSION["usuario"], $_SESSION["privilegio"],$_SESSION["imagen"]);
            } else {
                header('Location: index.php');
            }
        }
        ?>


        <div class="contGlobal">
            <div class="mainContent">

                <div class="jumbotron" style="background: #e1cce5">
                    <h1>¡Bienvenido de nuevo <?php echo $_SESSION["usuario"] ?>!</h1>
                    <p class="mb-5">Listos para reportar :D</p>
                </div>


                <form action="preview.php" method="post" enctype='multipart/form-data'>
                    <button type="submit" class="btn btn-success btn-lg p-2 px-5 my-5" name="createNew" value="createNew">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                        </svg> Crea una nueva nota
                    </button>
                </form>

                <form action="home.php" method="post" enctype='multipart/form-data'>
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
                        $lista->misNoticias($_SESSION["usuario"], $orden, $estado);
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
                            if(!empty($_SESSION["imagen"])){
                                $img = "data:image/jpg;base64," . base64_encode($_SESSION["imagen"]);
                            }
                            ?>
                            <img src='<?php echo $img ?>' alt='Avatar' style="height: auto;">
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