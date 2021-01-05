
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
            if (isset($_GET["variable1"])) {
                $seccion = $_GET["variable1"];
                $opc = "C";
            } else {
                $opc = "T";
            }
            
            if (isset($_GET["busqueda"])){
                $busqueda= $_GET["busqueda"];    
            }
            else{
            $busqueda = "";}
                
            if (isset($_GET["inicio"])){
                $inicio= $_GET["inicio"];
            }

                
            if (isset($_GET["final"])){
                $fin= $_GET["final"];
            }

                
        }
        ?>

        <div class="contGlobal">

            <div class="mainContent">

                <form action="buscar.php" method="get" class="" >
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg" name="busqueda" id="busqueda" placeholder="busqueda" value="<?php echo $busqueda ?>">
                        <div class="input-group-append">
                            <button href='#!' class='btn  btn-outline-secondary' type='submit'>Buscar</button>
                        </div>
                    </div>
                    <label  for="inicio" class="user-select-none">Inicio de busqueda</label>
                    <input type="date" id="inicio" class="campoConfig" name="inicio" min="1900-01-01" max="<?php echo date("Y-m-d") ?>" value="<?php echo $inicio ?>">
                    <label  for="final" class="user-select-none">Final de busqueda</label>
                    <input type="date" id="final" class="campoConfig" name="final" min="1900-01-01" max="<?php echo date("Y-m-d") ?>" value="<?php echo $fin ?>">
                    
                </form>

                <div class="separador"></div>


                <?php
                $noticias->enHome(null, $opc, $seccion);
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
