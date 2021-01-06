
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
            $('#myModal').on('shown.bs.modal', function () {
                $('#myInput').trigger('focus')
            })
        </script>
    </head>
    <body>

        <?php
        include "classes.php";

        $nav = new navbar();
        $nav->simple();
        $news = new mySQLphpClass();
        $color = '';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nav->yesSession($_SESSION["usuario"], $_SESSION["privilegio"], $_SESSION["imagen"]);

            if (array_key_exists('existent', $_POST)) {
                $_SESSION["noticiaActual"] = $_POST["existent"];
            }
            if (array_key_exists('aprove', $_POST)) {
                $news->noticias($_SESSION["noticiaActual"], null, null, null, null, null, null, null, 'Aprobada', null, null, null, "U");
            }
            if (array_key_exists('reject', $_POST)) {
                $news->noticias($_SESSION["noticiaActual"], null, null, null, null, null, null, null, 'Rechazada', null, null, null, "U");
            }
            if (array_key_exists('publish', $_POST)) {
                $currentDateTime = date('Y-m-d H:i:s');
                $news->noticias($_SESSION["noticiaActual"], null, null, $currentDateTime, null, null, null, null, 'Publicada', null, null, null, "U");
            }
            if (array_key_exists('editComment', $_POST)) {
                $news->noticias($_SESSION["noticiaActual"], null, null, null, null, null, null, null, 'Pendiente', null, null, null, "U");
            }

            $news = new mySQLphpClass();
            $result = $news->get_misNoticias(null, null, null, $_SESSION["noticiaActual"]);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $lugar = $row["lugar"];
                    $fechaNEW = $row["fechaNoticia"];

                    if (empty($row["fechaPublicado"])) {
                        $fechaPOST = 'PENDIENTE';
                    } else {
                        $fechaPOST = $row["fechaPublicado"];
                    }

                    $reportero = $row["reporteroFK"];
                    $authorIMG = $row["AuthorIMG"];
                    $repNombre = $row["nombreCompleto"];
                    $titulo = $row["título"];
                    $desc = $row["descripción"];

                    if (empty($row["secciónFK"])) {
                        $seccion = 'Ninguna aún. Elige una.';
                    } else {
                        $seccion = $row["secciónFK"];
                    }

                    $estado = $row["estado"];

                    if (empty($row["comentariosEditor"])) {
                        $editCOMM = '';
                    } else {
                        $editCOMM = $row["comentariosEditor"];
                    }

                    $keyword = $row["palabras_clave"];
                    $likes = $row["likes"];
                    $lastUpdate = $row["lastUpdate"];

                    if ($estado == 'Aprobada') {
                        $color = 'info';
                    }
                    if ($estado == 'Rechazada') {
                        $color = 'danger';
                    }
                    if ($estado == 'Pendiente') {
                        $color = 'warning';
                    }
                    if ($estado == 'Publicada') {
                        $color = 'success';
                    }
                }
            } else {
                echo "0 results";
            }
        } else {
            if (isset($_SESSION["usuario"])) {
                $nav->yesSession($_SESSION["usuario"], $_SESSION["privilegio"], $_SESSION["imagen"]);
                $news = new mySQLphpClass();
                $result = $news->get_misNoticias(null, null, null, $_SESSION["noticiaActual"]);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $lugar = $row["lugar"];
                        $fechaNEW = $row["fechaNoticia"];

                        if (empty($row["fechaPublicado"])) {
                            $fechaPOST = 'PENDIENTE';
                        } else {
                            $fechaPOST = $row["fechaPublicado"];
                        }

                        $reportero = $row["reporteroFK"];
                        $repNombre = $row["nombreCompleto"];
                        $titulo = $row["título"];
                        $desc = $row["descripción"];
                        $seccion = $row["secciónFK"];
                        $estado = $row["estado"];
                        $authorIMG = $row["AuthorIMG"];

                        if (empty($row["comentariosEditor"])) {
                            $editCOMM = '';
                        } else {
                            $editCOMM = $row["comentariosEditor"];
                        }

                        $keyword = $row["palabras_clave"];
                        $likes = $row["likes"];
                        $lastUpdate = $row["lastUpdate"];
                    }
                } else {
                    echo "0 results";
                }
            } else {
                header('Location: index.php');
            }
        }
        ?>

        <!--CONTENIDO (INICIO)-->
        <div class="contGlobal">
            <div class="mainContent">

                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="card text-white mb-3 <?php echo 'bg-' . $color; ?>" style="max-width: 18rem;">
                                <div class="card-header"><?php echo $estado; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class='mt-3'>Esta noticia pertenece a la Sección: <?php echo $seccion ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-muted"><small>
                                <?php echo $fechaNEW; ?><br><?php echo $lugar; ?>
                            </small></div>                    
                    </div>
                    <div class="row py-3">
                        <div class="col">
                            <div class="jumbotron" style="background: #e1cce5">
                                <h1><?php echo $titulo; ?></h1>
                                <h6><?php echo $desc; ?></h6>
                            </div>
                        </div>                    
                    </div>


                    <?php
                    $files = new archivos($_SESSION["noticiaActual"]);
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
                                    <?php
                                    $img = "https://pbs.twimg.com/media/EiNYM5CWAAAh9PV?format=png&name=240x240";
                                    if (!empty($authorIMG)) {
                                        $img = "data:image/jpg;base64," . base64_encode($authorIMG);
                                    }
                                    ?>
                                    <img src="<?php echo $img; ?>" alt="Avatar">
                                </div>
                                <div class="col-9 text-center m-auto text-wrap">
                                    <?php echo $repNombre ?>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>

                <div class="separador"></div>
                <!--SECCIÓN DE COMENTARIOS-->

                <div class="row mt-3">
                    <h3 class="mx-auto">COMENTARIOS</h3> 
                </div>

                <!--COMENTARIOS DE VERDAD-->
                <div class="listaNotas overflow-auto my-2">

                    <?php
                    $comentarios = new comentarios($_SESSION["noticiaActual"]);
                    $comentarios->cargarComentariosDevMode();
                    ?>

                </div>

            </div>


            <!--BARRA (INICIO)-->
            <div class="barra overflow-auto">

                <button type="button" class="btn btn-light my-3 d-block d-sm-block d-md-block d-lg-none" data-toggle="modal" data-target="#modalAutor" style="width: 100%;padding-top: 100%;position: relative; padding-bottom: 0; ">
                    <p style="position: absolute; font-size: 8vw; top: 2%; left: 0%; bottom: 0; right: 0;">A</p>
                </button>

                <button type="button" class="btn btn-light my-3 d-block d-sm-block d-md-block d-lg-none" data-toggle="modal" data-target="#modalStatus" style="width: 100%;padding-top: 100%;position: relative; padding-bottom: 0; ">
                    <p style="position: absolute; font-size: 8vw; top: 2%; left: 0%; bottom: 0; right: 0;">E</p>
                </button>

                <button type="button" class="btn btn-light my-3 d-block d-sm-block d-md-block d-lg-none" data-toggle="modal" data-target="#modalComment" style="width: 100%;padding-top: 100%;position: relative; padding-bottom: 0; ">
                    <p style="position: absolute; font-size: 8vw; top: 2%; left: 0%; bottom: 0; right: 0;">C</p>
                </button>

                <div class="perfil" style="color: azure;">
                    <div class="row no-gutters mt-3">
                        <div class="col tituloPrewieEditor d-none d-lg-block">
                            <h2>Autor</h2>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col">
                            <?php
                                    $img = "https://pbs.twimg.com/media/EiNYM5CWAAAh9PV?format=png&name=240x240";
                                    if (!empty($authorIMG)) {
                                        $img = "data:image/jpg;base64," . base64_encode($authorIMG);
                                    }
                                    ?>
                            <img class="imgReviewPrevieEditor d-none d-lg-block mx-auto" src="<?php echo $img; ?>" alt="Avatar">
                        </div>
                        <div class="col py-2 text-center d-none d-lg-block">
                            <br>
                            <div class="col py-2 text-center">
                                <h4><?php echo $reportero ?></h4>
                            </div>
                        </div>

                    </div>
                    <div class="row no-gutters">
                        <div class="col py-3 text-center d-none d-lg-block">
                            <p><?php echo $repNombre ?></p>
                        </div>
                    </div>
                    <form action="previewEditor.php" method="post" enctype='multipart/form-data'>
                        <div class="row no-gutters">
                            <div class="col py-3 text-center d-none d-lg-block">
                                <button type="submit" class="btn btn-danger" name="reject">Rechazar Noticia</button>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col py-3 text-center d-none d-lg-block">
                                <button type="submit" class="btn btn-info" name="aprove">Aprobar Noticia</button>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col py-3 text-center d-none d-lg-block">
                                <button type="submit" class="btn btn-success" name="publish">Publicar Noticia</button>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col py-3 text-center d-none d-lg-block">
                                <label for="comentarioEditor">Comentario</label>
                                <textarea name="txtArea" rows="10" cols="25"><?php echo $editCOMM ?></textarea>
                                <button type="submit" class="btn btn-warning btnRegreasarEditor" onclick="RegresarNoticia()" name="editComment">Regresar al Autor</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--BARRA (FIN)-->
        </div>
        <!--CONTENIDO (FIN)-->

        <!-- Modal Estado -->
        <div class="modal fade" id="modalStatus" data-backdrop="static" data-keyboard="true" tabindex="-1" aria-labelledby="modalStatus" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Opciones</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="previewEditor.php" method="post" enctype='multipart/form-data'> 
                        <div class="input-group">
                            <button type="submit" class="btn btn-danger m-2" name="reject">Rechazar Noticia</button>

                            <button type="submit" class="btn btn-info m-2" name="aprove">Aprobar Noticia</button>

                            <button type="submit" class="btn btn-success m-2" name="publish">Publicar Noticia</button>
                        </div>   
                </div>
                </form>
            </div>
        </div>

        <?php
        $comentarios->modales();
        ?>
    </div>

    <!-- Modal Comentatios del Editor -->
    <div class="modal fade" id="modalComment" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalComment" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Editar Título y Descripción</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="previewEditor.php" method="post" enctype='multipart/form-data'>
                    <div class="modal-body">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Comentarios</span>
                            </div>
                            <textarea class="form-control" aria-label="titleDescModal" name="txtArea" id="textAreaField" rows="10" cols="25"><?php echo $editCOMM; ?></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                        <button type="submit" class="btn btn-primary" name="editComment" value="editComment">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
