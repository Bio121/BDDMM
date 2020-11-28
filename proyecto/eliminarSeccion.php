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
        <title>Escoger Seccion</title>
    </head>
    <body>
        <nav class="nav navbar navbar-expand-lg navbar-dark fixed-top fixed-top-2">

        </nav>

        <nav class="nav navbar navbar-expand-lg navbar-dark fixed-top">
            <a class="navbar-brand" href="index.php">Novedades del Bot</a>

        </nav>
        <div class="listaNotas overflow-auto my-2">

            <div class="notaLista">

                <div class="notaLista">

                    <?php
                    include "classes.php";
                    $barra = new category();
                    if ($_SERVER["REQUEST_METHOD"] == "GET") {
                        if (isset($_GET["variable2"])) {
                            $orden = $_GET["variable3"];
                            $color = $_GET["variable1"];
                            $nombre = $_GET["variable2"];
                            $estado = $_GET["variable4"];
                            $nuevoNombre = $_GET["variable2"];
                            $opc = "b";
                            $barra->CrearCategoria($orden,$color,$nombre,$estado,$nuevoNombre,$opc);
                        }
                    }

                    $barra->EliminarCategoria();
                    ?>
                </div>
            </div>

        </div>
        
        <?php
        // put your code here
        ?>
    </body>
</html>
