
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
            }
            .comentario img{
                display: inline-block;
                width: 50px;
                height: 50px;
                border-radius: 50%;
                margin-top: 10px;
                margin-left: 10px;
                margin-bottom: 2.5em;
            }
            .comentext{
                display: inline-block;
                background: azure;
                min-height: 6em;
                max-width: 1050px;
                padding: 0.75em;
                border-radius: 10px;
                margin-left: 0.75em;
                margin-right: 0.75em;
                margin-top: 0.7em;
            }
            .editBTN{
                position: absolute;
                padding: 3px;
                bottom: 20%;
                left: 90%;
            }
            .editBTN:hover{
                color: #9966ff;
            }

            .agregarBTN{
                position: relative;
                border: dotted #ddc5e3 3px;
                border-radius: 10px;
                min-height: 10rem;
                margin: 1rem;
                font-size: 20px;
                background-color: #f5e2ff;
                color: #351a5e;
            }

            .agregarBTN:hover{
                border: dotted #f5e2ff 3px;
                background-color: #ddc5e3;
                color: #351a5e;
            }

            .agregarBTN:active{
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

        if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET") {
            $nav->yesSession($_SESSION["usuario"], $_SESSION["privilegio"],$_SESSION["imagen"]);

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                if((isset($_FILES['image'])) && ($_FILES['image']['tmp_name'] !='')){
                        $file = $_FILES['image'];
                        $temName = $file['tmp_name'];
                        $fp = fopen($temName, "rb");
                        $contenido = fread($fp, filesize($temName));
                        $imagen = addslashes($contenido);
                        fclose($fp);
                        $_SESSION["imagen"] = $imagen;
                        echo $imagen;
                        $img_str = base64_encode($_SESSION["imagen"]);
                        echo '<img src="data:image/jpg;base64,'.$img_str.'" class="float-left imagenUserConfig" alt="Img "/>';
                }
                
                if (array_key_exists('createNew', $_POST)) {
                    $result = $news->noticias(null, 'Escribe aquí el lugar del suceso.', null, null, $_SESSION["usuario"], "Título de la Noticia",
                            "Descripción de la Noticia", null, "Pendiente", null, 'Escribe aquí palabras clave que identifiquen esta noticia', "0", "I");
                    $row = $result->fetch_assoc();
                    $_SESSION["noticiaActual"] = $row["código"];
                }
                if (array_key_exists('existent', $_POST)) {
                    $_SESSION["noticiaActual"] = $_POST["existent"];
                }
                if (array_key_exists('editKeywords', $_POST)) {
                    $keyword = $_POST["keywords"];
                    $news->noticias($_SESSION["noticiaActual"], null, null, null, $_SESSION["usuario"], null, null, null, null, null, $keyword, null, "U");
                }
                if (array_key_exists('editTitleDesc', $_POST)) {
                    $title = $_POST["title"];
                    $desc = $_POST["desc"];
                    $news->noticias($_SESSION["noticiaActual"], null, null, null, $_SESSION["usuario"], $title, $desc, null, null, null, null, null, "U");
                }
                if (array_key_exists('categorei', $_POST)) {
                    $seccion = $_POST["categorei"];
                    $news->noticias($_SESSION["noticiaActual"], null, null, null, $_SESSION["usuario"], null, null, $seccion, null, null, null, null, "U");
                }
                if (array_key_exists('editFechaHora', $_POST)) {
                    $lugar = $_POST["lugar"];
                    $fecha = $_POST["FechaEvento"];
                    $news->noticias($_SESSION["noticiaActual"], $lugar, $fecha, null, $_SESSION["usuario"], null, null, null, null, null, null, null, "U");
                }
                if (array_key_exists('editFile', $_POST)) {
                    $tipo = substr($_POST["editFile"], 0, 1);
                    $orden = substr($_POST["editFile"], 1);
                    $code = $_POST["code"];
                    if ($tipo == 'I') {
                        $video = null;
                        $texto = null;
                        $tamaño = '1';
                    }
                    if ($tipo == 'T') {
                        $imagen = null;
                        $video = null;
                        $texto = $_POST["textomodal" . $orden];
                        $tamaño = null;
                    }
                    if ($tipo == 'V') {
                        $imagen = null;
                        $video = '1';
                        $texto = null;
                        $tamaño = null;
                    }
                    $news->archivos($tipo, 'U', $_SESSION["noticiaActual"], null, $code, $imagen, $video, $texto, $tamaño);
                }

                if (array_key_exists('deleteFile', $_POST)) {
                    $tipo = substr($_POST["deleteFile"], 0, 1);
                    $orden = substr($_POST["deleteFile"], 1);
                    $code = $_POST["code"];
                    $news->archivos($tipo, 'D', $_SESSION["noticiaActual"], null, $code, null, null, null, null);
                }
            }

            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                if (array_key_exists('texto', $_GET)) {
                    $news->archivos('T', 'I', $_SESSION["noticiaActual"], null, null, null, null, 'Texto de Ejemplo Texto de Ejemplo Texto de Ejemplo Texto de Ejemplo Texto de Ejemplo ', null);
                }
                if (array_key_exists('imagen', $_GET)) {
                    $news->archivos('I', 'I', $_SESSION["noticiaActual"], null, null, '1', null, null, null);
                }
                if (array_key_exists('video', $_GET)) {
                    $news->archivos('V', 'I', $_SESSION["noticiaActual"], null, null, null, '1', null, null);
                }
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
                }
            } else {
                echo "0 results";
            }
        } else {
            if (isset($_SESSION["usuario"])) {
                $nav->yesSession($_SESSION["usuario"], $_SESSION["privilegio"],$_SESSION["imagen"]);
                
                $_SESSION["imagen"] = 0;
                
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
                        <div class="col mb-5">
                            <form action="preview.php" method="post" enctype='multipart/form-data'>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" style="background: #ccccff; border-color: #9999ff;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        CATEGORÍA
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <?php
                                        $barra = new category();
                                        $barra->dropdown();
                                        ?>
                                    </div>
                                </div>
                            </form>
                            <p class='mt-3'>Esta noticia pertenece a la Sección: <?php echo $seccion ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-muted"><small>
                                <?php echo $fechaNEW; ?><br><?php echo $lugar; ?>
                            </small>
                            <div class="editBTN" data-toggle="modal" data-target="#lugarFechaModal">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </div>
                        </div>   
                    </div>
                    <div class="row py-3">
                        <div class="col">
                            <div class="jumbotron" style="background: #e1cce5">
                                <h1><?php echo $titulo; ?></h1>
                                <h6><?php echo $desc; ?></h6>
                                <div class="editBTN" data-toggle="modal" data-target="#titleDesc">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>                    
                    </div>

                    <?php
                    $files = new archivos($_SESSION["noticiaActual"]);
                    $files->cargarArchivos();
                    ?>

                </div>

                <div class="row-fluid user-select-none text-center " style="border: dotted #ddc5e3 3px;
                     border-radius: 10px;">
                    <div class="row no-gutters">
                        <div class="col">
                            <div class="agregarBTN py-2" onclick="window.location = 'preview.php?texto=true';">
                                <div class="center">
                                    <div class="row no-gutters">
                                        <div class="col">
                                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                            </svg>
                                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-card-text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                            <path fill-rule="evenodd" d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="row no-gutters">
                                        <div class="col">
                                            Nuevo Texto
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col">
                            <div class="agregarBTN py-2" onclick="window.location = 'preview.php?imagen=true';">
                                <div class="center">
                                    <div class="row no-gutters">
                                        <div class="col">
                                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                            </svg>
                                            <svg width="2em" height="2em" viewBox="0 0 17 16" class="bi bi-image" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M14.002 2h-12a1 1 0 0 0-1 1v9l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094L15.002 9.5V3a1 1 0 0 0-1-1zm-12-1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm4 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                            </svg> 
                                        </div>
                                    </div>

                                    <div class="row no-gutters">
                                        <div class="col">
                                            Nueva Imagen
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="agregarBTN py-2" onclick="window.location = 'preview.php?video=true';">
                                <div class="center">
                                    <div class="row no-gutters">
                                        <div class="col">
                                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                            </svg>
                                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-film" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0h8v6H4V1zm8 8H4v6h8V9zM1 1h2v2H1V1zm2 3H1v2h2V4zM1 7h2v2H1V7zm2 3H1v2h2v-2zm-2 3h2v2H1v-2zM15 1h-2v2h2V1zm-2 3h2v2h-2V4zm2 3h-2v2h2V7zm-2 3h2v2h-2v-2zm2 3h-2v2h2v-2z"/>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="row no-gutters">
                                        <div class="col">
                                            Nuevo Video
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                    <img src="https://pbs.twimg.com/profile_images/1313334758114562048/G7bWOycn_400x400.jpg" alt="Avatar">
                                </div>
                                <div class="col-9 text-center m-auto text-wrap">
                                    <?php echo $repNombre ?>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>

                <div class="row mt-3">
                    <div class="col text-muted">
                        <p>Palabras Clave</p>
                        <p><?PHP echo $keyword; ?></p>
                        <div class="editBTN" data-toggle="modal" data-target="#keywordsModal">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </div>
                    </div>   
                </div>

            </div>


            <!--BARRA (INICIO)-->
            <div class="barra overflow-auto">

                <?php
                $prev = new preview();
                $prev->setStatusCard($estado);
                ?>

                <div class="card border-secondary my-3 d-none d-lg-block" style="max-width: 18rem;">
                    <div class="card-body text-secondary">
                        <h5 class="card-title">Comentarios</h5>
                        <p class="card-text"><?php echo $editCOMM; ?></p>
                    </div>
                </div>

                <?php
                $prev->botonesModales($estado);
                ?>

                <button type="button" class="btn btn-light my-3 d-block d-sm-block d-md-block d-lg-none" data-toggle="modal" data-target="#modalComment" style="width: 100%;padding-top: 100%;position: relative; padding-bottom: 0; ">
                    <p style="position: absolute; font-size: 8vw; top: 2%; left: 0%; bottom: 0; right: 0;">C</p>
                </button>

            </div>
            <!--BARRA (FIN)-->
        </div>
        <!--CONTENIDO (FIN)-->

        <?php
        $prev->ventanasModales($estado, $editCOMM);
        $files->modales();
        ?>
        
        <!-- Modal Palabras Clave -->
        <div class="modal fade" id="keywordsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="keywordsModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Editar Lugar y Fecha</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="preview.php" method="post" enctype='multipart/form-data'>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Palabras Clave</span>
                                </div>
                                <input type="text" class="form-control" aria-label="keywordsModal" aria-describedby="basic-addon1" name="keywords" value="<?php echo $keyword; ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                            <button type="submit" class="btn btn-primary" name="editKeywords" value="editKeywords">Aceptar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Lugar y Fecha -->
        <div class="modal fade" id="lugarFechaModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="lugarFechaModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Editar Lugar y Fecha</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="preview.php" method="post" enctype='multipart/form-data'>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Lugar</span>
                                </div>
                                <input type="text" class="form-control" aria-label="lugarFechaModal" aria-describedby="basic-addon1" name="lugar" value="<?php echo $lugar; ?>">
                            </div>
                            <div class="input-group">
                                <label for="FechaEvento" class="user-select-none pr-3">Fecha del suceso</label>
                                <input type="date" id="nacimiento" class="campoConfig" name="FechaEvento" min="1900-01-01" value="<?php echo $fechaNEW ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                            <button type="submit" class="btn btn-primary" name="editFechaHora" value="editFechaHora">Aceptar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Título y Descripción -->
        <div class="modal fade" id="titleDesc" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="titleDescModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Editar Título y Descripción</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="preview.php" method="post" enctype='multipart/form-data'>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Título</span>
                                </div>
                                <input type="text" class="form-control" aria-label="titleDescModal" aria-describedby="basic-addon1" name="title" value="<?php echo $titulo; ?>">
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Descripción</span>
                                </div>
                                <textarea class="form-control" aria-label="titleDescModal" name="desc" id="textAreaField" rows="4" cols="50"><?php echo $desc; ?></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                            <button type="submit" class="btn btn-primary" name="editTitleDesc" value="editTitleDesc">Aceptar</button>
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
