
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
        <title>Novedades del Bot</title>
    </head>
    <body>

        <?php
        include "classes.php";
        $noticias = new noticias();
        $nav = new navbar();
        $nav->simple();
        $mal = 0;
        $regis = false;
        $seccion = "ee";
        $opc = 'T';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["salir"])) {
                session_unset();
                session_destroy();
                $nav->notSession();
            } else {

                $ses = new inicioRegistro();
                $usuario = $_POST["Usuario"];
                $correo = $_POST["Correo"];
                $contraseña = $_POST["Contraseña"];

                if (isset($_POST["Phone"])) {
                    $telefono = $_POST["Phone"];
                    $texto = $ses->registro($telefono, $correo, $usuario, $contraseña);
                    $regis = true;
                    echo $texto;
                }

                $result = $ses->inicio($usuario, $correo, $contraseña);
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
                    $nav->yesSession($_SESSION["usuario"], $_SESSION["privilegio"], $_SESSION["imagen"]);
                } else {
                    if ($regis) {
                        $mal += 1;
                    }
                    $mal += 1;
                    $_SESSION["usuario"] = null;
                    $nav->notSession();
                }
            }
        } else {
            if (isset($_SESSION["usuario"])) {
                $nav->yesSession($_SESSION["usuario"], $_SESSION["privilegio"], $_SESSION["imagen"]);
            } else {
                $_SESSION["usuario"] = null;
                $nav->notSession();
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET["opcFecha"])) {
                $opcFecha = $_GET["opcFecha"];
            }
            else
                $opcFecha = 0;
            if (isset($_GET["opcTitulo"])) {
                $opcTitulo = $_GET["opcTitulo"];
            }
            else
                $opcTitulo = 0;
            
            if (isset($_GET["opcPalabra"])) {
                $opcPalabra = $_GET["opcPalabra"];
            }
            else
                $opcPalabra = 0;
            
            
            if (isset($_GET["busqueda"])) {
                $busqueda = $_GET["busqueda"];
            } else {
                $busqueda = "";
            }

            if (isset($_GET["inicio"])) {
                $inicio = $_GET["inicio"];
            } else
                $inicio = NULL;


            if (isset($_GET["final"])) {
                $fin = $_GET["final"];
            } else
                $fin = NULL;
        }
        ?>

        <div class="contGlobal">

            <div class="mainContent" style="min-height: 50em;">

                <form action="buscar.php" method="get" class="" >
                    <h3>Buscar por</h3>
                    <input type="checkbox" id="opcFecha" name="opcFecha" value="1"<?php if($opcFecha == 1) echo "checked"  ?>>
                    <label for="opcFecha" class="pr-3"> Por fecha</label>
                    <input type="checkbox" id="opcTitulo" name="opcTitulo" value="1"<?php if($opcTitulo == 1) echo "checked"  ?>>
                    <label for="opcTitulo" class="pr-3"> Título o descripción de la noticia</label>
                    <input type="checkbox" id="opcPalabra" name="opcPalabra" value="1"<?php if($opcPalabra == 1) echo "checked"  ?>>
                    <label for="opcPalabra" class="pr-3"> Palabras clave</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg" name="busqueda" id="busqueda" placeholder="búsqueda" value="<?php echo $busqueda ?>">
                        <div class="input-group-append">
                            <button href='#!' class='btn  btn-outline-secondary' type='submit'>Buscar</button>
                        </div>
                    </div>
                    <label  for="inicio" class="user-select-none">Inicio de búsqueda</label>
                    <input type="date" id="inicio" class="campoConfig" name="inicio" min="1900-01-01" max="<?php echo date("Y-m-d") ?>" placeholder="<?php echo date("Y-m-d") ?>" value="<?php echo $inicio ?>">
                    <label  for="final" class="user-select-none">Final de búsqueda</label>
                    <input type="date" id="final" class="campoConfig" name="final" min="1900-01-01" max="<?php echo date("Y-m-d") ?>" placeholder="<?php echo date("Y-m-d") ?>" value="<?php echo $fin ?>">

                </form>

                <div class="separador"></div>


                <?php
                $noticias->buscar2($busqueda, $inicio, $fin, $opcFecha,$opcTitulo,$opcPalabra);
                ?>

            </div>


            <div class="barra overflow-auto">

                <div class="separador user-select-none">CATEGORÍAS</div>
<?php
$barra = new category();
$barra->llenaLaBarra();
?>
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
        </div>
    </body>
</html>
