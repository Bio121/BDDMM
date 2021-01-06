
<?php
session_start();
ob_start();
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
        <style>
            .noticiaIMG-ch{
                display: block;
                width: 100%;
                max-width: 400px;
                height: auto;
            }
            .noticiaIMG-md{
                display: block;
                width: 100%;
                max-width: 600px;
                height: auto;
            }
            .noticiaIMG-gd{
                display: block;
                width: 100%;
                max-width: 800px;
                height: auto;
            }
            .autor{
                background: #e1cce5;
                width: 100%;
                max-width: 540px;
                height: 100%;
                max-height: 8em;
            }
            .autor img{
                width: 100%;
                height: auto;
                border-radius: 50%;
                padding: 1vw;
            }
            .meGusta{
                font-size: 25px;
            }
            .meGusta:hover{
                color: #ff6666;
            }
            .comentario{
                position: relative;
                display: block;
                margin: 2px;
            }
            .comentor{
                position: relative;
                display: block;
            }
            .comentIMG{
                width: 100px;
                height: 100px;
                border-radius: 50%;
                display: inline-block;
                padding: 5px;
                background-color: #cbb1d1;
            }
            .comentext{
                display: inline-block;
                background: azure;
                min-height: 4em;
                padding: 0.75em;
                border-radius: 10px;
                margin-left: 0.75em;
                margin-right: 0.75em;
                margin-top: 0.7em;
            }
            .commentBTN{
                position: relative;
                border: dotted #ddc5e3 3px;
                border-radius: 10px;
                min-height: 10rem;
                margin: 1rem;
                font-size: 20px;
                background-color: #f5e2ff;
                color: #351a5e;
            }
            .commentBTN:hover{
                border: dotted #f5e2ff 3px;
                background-color: #ddc5e3;
                color: #351a5e;
            }

            .commentBTN:active{
                border: dotted #351a5e 3px;
                background-color: #ddc5e3;
                color: #f5e2ff;
            }
            .center{
                margin: 0;
                position: absolute;
                top: 50%;
                left: 50%;
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
            }
            .responder{
                color: #50278a;
            }
            .responder:hover{
                color: #9966ff;
            }
            .responder:active{
                color: #cbb1d1;
            }
        </style>
        <script>
            function like(x) {
                x.classList.toggle("bi-suit-heart-fill");
                var count = document.getElementById("likeCounter").innerHTML;
                document.getElementById("likeCounter").innerHTML = Number(count) + 1;
            }
        </script>
    </head>
    <body>

        <?php
        include "classes.php";
        $noticias = new noticias();
        $nav = new navbar();
        $nav->simple();
        $mal = 0;
        $byebye = false;
        $modalID = "comment";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            if (array_key_exists('createNew', $_POST)){
                $ses = new inicioSesión();
                $usuario = $_POST["Usuario"];
                $correo = $_POST["Correo"];
                $contraseña = $_POST["Contraseña"];
                $result = $ses->verdad($usuario, $correo, $contraseña);
                if (!empty($result)) {
                    $_SESSION["usuario"] = $result[0];
                    $_SESSION["correo"] = $result[1];
                    $byebye = true;
                } else {
                    $mal = 1;
                    $_SESSION["usuario"] = null;
                    $byebye = true;
                }  
            }
            
            if (array_key_exists('commentSubmit', $_POST)){
                $respondiendo = null;
                if (array_key_exists('replying', $_POST)){
                    $respondiendo = $_POST["replying"];
                }
                $comment = new comentarios($_POST["code"]);
                $comment->newComment($_SESSION["usuario"], $_POST["commentText"], $respondiendo);
                $redirect = 'Location: noticia.php?new=' . $_POST["code"];
                header($redirect);
            }
            
        } else {
            if (isset($_SESSION["usuario"])) {
                $nav->yesSession($_SESSION["usuario"], $_SESSION["privilegio"], $_SESSION["imagen"]);
            } else {
                $_SESSION["usuario"] = null;
                $nav->notSession();
                $modalID = "commentNoSes";
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            
            if(isset($_GET["like"])){
                $con = new mySQLphpClass();
                $con->newsInteractions('L', $_GET["newX"]);
                header('Location: noticia.php?new=' . $_GET["newX"]);
            }
            
            if (isset($_GET["new"])) {
                $codigo = $_GET["new"];
                $new = new mySQLphpClass();
                $result = $new->get_lasNoticias(null, null, $codigo);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $estado = $row["estado"];
                    if ($estado != 'Publicada') {
                        $byebye = true;
                    }
                    $fechaNEW = $row["fechaNoticia"];
                    $fechaPOST = $row["fechaPublicado"];
                    $lugar = $row["lugar"];
                    $reporteroFK = $row["reporteroFK"];
                    $nombreRep = $row["nombreCompleto"];
                    $title = $row["título"];
                    $desc = $row["descripción"];
                    $seccion = $row["secciónFK"];
                    $keyword = $row["palabras_clave"];
                    $likes = $row["likes"];
                    if(empty($likes)){
                        $likes = 0;
                    }
                    $userIMG = $row["userIMG"];
                    
                    $new->newsInteractions("V", $codigo);
                } else {
                    $byebye = true;
                }
            }
        }
        if ($byebye) {
            header('Location: index.php');
        }
        ?>

        <!--CONTENIDO (INICIO)-->
        <div class="contGlobal">
            <div class="mainContent">

                <div class="container">
                    <div class="row">
                        <div class="col text-muted"><small>
                                <?php echo $fechaNEW; ?><br><?php echo $lugar; ?>
                            </small></div>                    
                    </div>
                    <div class="row py-3">
                        <div class="col">
                            <div class="jumbotron" style="background: #e1cce5">
                                <h1><?php echo $title; ?></h1>
                                <h6><?php echo $desc; ?></h6>
                            </div>
                        </div>                    
                    </div>

                    <?php
                    $files = new archivos($_GET["new"]);
                    $files->cargarNoticia();
                    ?>

                </div>
                <div class="row">
                    <div class="col text-muted" align="right"><small>
                            <?php echo 'Fecha de publicación: ' . $fechaPOST; ?>
                        </small></div>
                </div>                
                <div class="row py-3">
                    <div class="col">
                        <div class="autor">
                            <div class="row no-gutters">
                                <div class="col-3">
                                    <img src="data:image/jpg;base64,<?php echo base64_encode($userIMG); ?>" alt="Avatar">
                                </div>
                                <div class="col-9 text-center m-auto text-wrap">
                                    <?php echo $nombreRep ?>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
                <div class="row">
                    <div class="col-1 my-5" id="likeCounter" style="font-size: 25px">
                        <?php echo $likes ?>
                    </div>
                    <div class="col-2 my-5 meGusta user-select-none text-center" onclick="window.location = 'noticia.php?newX=<?php echo $codigo;?>&like=1';">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-suit-heart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 6.236l.894-1.789c.222-.443.607-1.08 1.152-1.595C10.582 2.345 11.224 2 12 2c1.676 0 3 1.326 3 2.92 0 1.211-.554 2.066-1.868 3.37-.337.334-.721.695-1.146 1.093C10.878 10.423 9.5 11.717 8 13.447c-1.5-1.73-2.878-3.024-3.986-4.064-.425-.398-.81-.76-1.146-1.093C1.554 6.986 1 6.131 1 4.92 1 3.326 2.324 2 4 2c.776 0 1.418.345 1.954.852.545.515.93 1.152 1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"/>
                        </svg>
                        Me Gusta
                    </div>
                </div>



                <div class="separador"><h3 class="mb-3">También podría interesarte...</h3></div>

                <div id="carouselExampleIndicators" class="carousel slide mx-auto mostRead" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <?php
                        $noticias->buscar($keyword, NULL, NULL, 3) ;
                        ?>

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>


                <div class="separador"></div>
                <!--SECCIÓN DE COMENTARIOS-->

                <div class="row mt-3">
                    <h3 class="mx-auto">COMENTARIOS</h3> 
                </div>

                <!--COMENTARIOS DE VERDAD-->
                <div class="listaNotas overflow-auto my-2">

                    <?php
                    $comentarios = new comentarios($codigo);
                    $comentarios->cargarComentarios();
                    ?>

                </div>


                <!-- Botón de Comentario -->
                <div>
                    <div class="commentBTN py-2" data-toggle="modal" data-target="#<?php echo $modalID; ?>">
                        <div class="center">
                            <div class="row no-gutters">
                                <div class="col pl-4">
                                    <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                    <path d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                    </svg>
                                </div>
                            </div>

                            <div class="row no-gutters">
                                <div class="col pb-3">
                                    Dejar un Comentario
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Comentario -->
                <div class="modal fade" id="comment" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="commentModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Comentar en la noticia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="noticia.php" method="post" enctype='multipart/form-data'>
                                <div class="modal-body">
                                    <div class="user-select-none">
                                        <input type="text" class="form-control user-select-none" name="code" value="<?php echo $codigo; ?>" readonly="readonly" style="color: #e9ecef;">
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Comentario</span>
                                        </div>
                                        <textarea class="form-control" aria-label="commentModal" name="commentText" id="textAreaField" rows="5" cols="100"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                                    <button type="submit" class="btn btn-primary" name="commentSubmit" value="commentSubmit">Comentar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Modal Comentario, pero no es cierto-->
                <div class="modal fade" id="commentNoSes" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="commentModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Comentar en la noticia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">
                                    <h1>Inicia sesión para poder comentar en esta noticia.</h1>
                                </div>
                        </div>
                    </div>
                </div>
                
                
                <?php $comentarios->modales(); ?>

            </div>


            <!--BARRA (INICIO)-->
            <div class="barra overflow-auto">
                <div class="separador user-select-none">CATEGORÍAS</div>
                <?php
                $barra = new category();
                $barra->llenaLaBarra();
                ?>
            </div>
            <!--BARRA (FIN)-->
        </div>
        <!--CONTENIDO (FIN)-->

        <!--FOOTER (INICIO)-->
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
        <!--FOOTER (FIN)-->

        <?php
        // put your code here
        //phpinfo();
        ?>
    </body>
</html>
