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
        <title>Crear Seccion</title>
    </head>
    <body>
        <nav class="nav navbar navbar-expand-lg navbar-dark fixed-top fixed-top-2">
            
        </nav>

        <nav class="nav navbar navbar-expand-lg navbar-dark fixed-top">
            <a class="navbar-brand" href="index.php">Novedades del Bot</a>

        </nav>
        <?php
        include "classes.php";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $opc = $_POST["opc"];
            if($_POST["nombreN"] != ""){
                $nombre = $_POST["nombreN"];                
            }
            else{
                $nombre = $_POST["nombreSeccion"];
            }
            $barra = new category();
            $orden = $_POST["posicionSeccion"];
            $color = substr($_POST["colorSeccion"], -6);
            $estado = "a";
            $nuevoNombre = $_POST["nombreSeccion"];
            $barra->CrearCategoria($orden,$color,$nombre,$estado,$nuevoNombre,$opc);
            $nombre = $nuevoNombre;
            $opc = "U";
            $boton = "modificar y activar sección";

            
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if(isset($_GET["variable2"])){
                $orden = $_GET["variable3"];
                $color = $_GET["variable1"];
                $nombre = $_GET["variable2"];
                $estado = $_GET["variable4"];
                $nuevoNombre = $_GET["variable2"];
                $opc = "U";
                $boton = "modificar y activar sección sección";
            }
            else{
                $orden = "";
                $color = "";
                $nombre = "";
                $estado = "";
                $nuevoNombre = "";
                $opc = "I";
                $boton = "crear y activar sección";
            }

        }
        else{

        }
        ?>
        
        <div class="row"> 
            <div class="col-8 seccion" >
                <form action="creacionSeccion.php" onsubmit="" method="post" enctype='multipart/form-data'>

                    <label for="nombreSeccion">Nombre</label>
                    <input type="text" class="form-control campoConfig" id="nombreSeccion" name="nombreSeccion" value="<?php echo $nombre ?>">

                    <label for="posicionSeccion">posicion</label>
                    <input type="text" class="form-control campoConfig" id="posicionSeccion" name="posicionSeccion" value="<?php echo $orden ?>">
                    
                    <label for="colorSeccion">escoga el color</label>
                    <br>
                    <input type="color" id="colorSeccion" name="colorSeccion" value="<?php echo '#' . "$color" ?>">
                    <br>
                    <input type="hidden" name="opc" value="<?php echo $opc ?>" />
                    <input type="hidden" name="nombreN" value="<?php echo $nombre ?>" />
                    <button class="btn btn-primary btnConfig" type="submit"><?php echo $boton ?></button>

                </form>
            </div>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
