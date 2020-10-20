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
                position: relative;
                padding: 3px;
                bottom: 100%;
                left: 90%;
            }
            .editBTN:hover{
                color: #9966ff;
            }
        </style>
        <script>
            $(document).ready(function () {
                $('[data-toggle="popover"]').popover();
            });
            $('.popover-dismiss').popover({
                trigger: 'focus'
            })
        </script>
    </head>
    <body>
        <!--NAVBAR (INICIO)-->
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
        <!--NAVBAR (FIN)-->

        <!--CONTENIDO (INICIO)-->
        <div class="contGlobal">
            <div class="mainContent">

                <div class="container">
                    <div class="row">
                        <div class="col mb-5">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" style="background: #ccccff; border-color: #9999ff;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    CATEGORÍA
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <p class="dropdown-item">Categoría 1</p>
                                    <p class="dropdown-item">Categoría 2</p>
                                    <p class="dropdown-item">Categoría 3</p>
                                    <p class="dropdown-item">Categoría 4</p>
                                    <p class="dropdown-item">Categoría 5</p>
                                    <p class="dropdown-item">Categoría 6</p>
                                    <p class="dropdown-item">Categoría 7</p>
                                    <p class="dropdown-item">Categoría 8</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-muted"><small>
                                20 de octubre, 2020.<br>Guadalupe, Nuevo León.
                            </small></div>   
                        <div class="editBTN">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col">
                            <div class="jumbotron" style="background: #e1cce5">
                                <h1>Individuo pierde en Buscaminas</h1>
                                <h6>Triste historia de un individuo que iba a ganar, pero el destino tenía otros planes.</h6>
                                <div class="editBTN">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>                    
                    </div>
                    <div class="row py-3">
                        <div class="col" align="center">
                            <figure class="figure">
                                <img src="https://pbs.twimg.com/media/EgvGhYbXYAA2Ean?format=png&name=small" class="figure-img img-fluid rounded noticiaIMG-gd" alt="...">
                                <figcaption class="figure-caption">El desenlace de ese 50/50 no fue el 50 favorable.</figcaption>
                                <div class="editBTN">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </div>
                            </figure>
                        </div>   
                    </div>
                    <div class="row py-3">
                        <div class="col">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi in nisl nibh. 
                                Donec consequat dapibus dolor et interdum. Donec eget suscipit magna, nec vulputate eros. 
                                Suspendisse convallis fermentum tellus, a finibus nibh condimentum tristique. 
                                Quisque commodo lectus sit amet nulla efficitur, at sodales ipsum porttitor. 
                                Vestibulum nec justo odio. Integer vitae hendrerit enim.</p>

                            <p>Aliquam neque lacus, euismod ac nulla eget, interdum pellentesque diam. 
                                Donec ac mi non quam pharetra eleifend. Aenean ultrices finibus tellus id aliquam. 
                                Ut gravida ipsum eu neque sollicitudin, nec pharetra augue convallis. Nam vitae elementum ex. 
                                Maecenas sit amet auctor nulla. Vivamus eget scelerisque risus, hendrerit imperdiet enim. 
                                Cras orci nibh, rutrum non dignissim vitae, hendrerit nec augue. Mauris sit amet purus nibh. 
                                Sed sit amet scelerisque tellus, sed blandit ligula.</p>

                            <p>Nunc sapien justo, accumsan sit amet luctus et, consectetur sed lacus. 
                                Cras sed dui at tortor gravida gravida. Cras luctus rutrum est at convallis. 
                                Suspendisse nisi magna, sodales nec iaculis vitae, finibus id erat. 
                                Curabitur ut sem cursus arcu tempor suscipit. Integer ut neque placerat, posuere ipsum quis, vulputate leo. 
                                Duis laoreet, ligula non efficitur vehicula, dui eros bibendum elit, eget volutpat purus tellus at ante. 
                                Aliquam sit amet volutpat turpis. Suspendisse dignissim finibus purus at volutpat. 
                                Donec a lacus vel turpis vestibulum cursus ac vitae magna. Proin mollis justo et tincidunt vestibulum. 
                                Aenean fermentum ipsum sit amet leo luctus, suscipit lobortis felis semper. 
                                Morbi eleifend semper justo, vulputate vehicula massa faucibus eget. Nunc in consectetur dolor.</p>

                            <p>Curabitur vehicula quis erat eu ullamcorper. 
                                Sed rutrum quam tortor, at vulputate ex feugiat vitae. Sed orci massa, feugiat ut varius ut, pharetra vel quam. 
                                Suspendisse mattis, est id fermentum sodales, nibh metus ullamcorper justo, vitae blandit ex risus non arcu. Nulla a est metus. 
                                Aliquam id luctus erat, tristique finibus urna. Vestibulum in rhoncus neque.</p>

                            <p>Curabitur efficitur ultricies mauris, eget eleifend quam tincidunt sed. 
                                Phasellus eu tristique arcu, a placerat diam. Morbi tincidunt odio eu malesuada porttitor. 
                                Donec ac erat ac nulla viverra fermentum. Praesent lacus velit, tempus pretium augue eu, egestas vulputate mauris. 
                                Donec cursus consequat est, a tristique ante posuere malesuada. Sed imperdiet nibh ac efficitur tempor. 
                                Morbi non ultrices erat, eu congue dolor.</p>
                            <div class="editBTN">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col" align="center">
                            <figure class="figure">
                                <img src="https://pbs.twimg.com/media/EdqjfxzXgAAdIgm?format=jpg&name=4096x4096" class="figure-img img-fluid rounded noticiaIMG-gd" alt="...">
                                <figcaption class="figure-caption">La frustración de un artista que solo quería relajarse.</figcaption>
                                <div class="editBTN">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </div>
                            </figure>
                        </div>   
                    </div>
                    <div class="row py-3">
                        <div class="col">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi in nisl nibh. 
                                Donec consequat dapibus dolor et interdum. Donec eget suscipit magna, nec vulputate eros. 
                                Suspendisse convallis fermentum tellus, a finibus nibh condimentum tristique. 
                                Quisque commodo lectus sit amet nulla efficitur, at sodales ipsum porttitor. 
                                Vestibulum nec justo odio. Integer vitae hendrerit enim.</p>

                            <p>Aliquam neque lacus, euismod ac nulla eget, interdum pellentesque diam. 
                                Donec ac mi non quam pharetra eleifend. Aenean ultrices finibus tellus id aliquam. 
                                Ut gravida ipsum eu neque sollicitudin, nec pharetra augue convallis. Nam vitae elementum ex. 
                                Maecenas sit amet auctor nulla. Vivamus eget scelerisque risus, hendrerit imperdiet enim. 
                                Cras orci nibh, rutrum non dignissim vitae, hendrerit nec augue. Mauris sit amet purus nibh. 
                                Sed sit amet scelerisque tellus, sed blandit ligula.</p>
                            <div class="editBTN">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </div>
                        </div>   
                    </div>
                </div>
                <div class="row">
                    <div class="col text-muted" align="right"><small>
                            Fecha de publicación Pendiente.
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
                                    Irack Francisco Alanís Irigoyen
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>

            </div>


            <!--BARRA (INICIO)-->
            <div class="barra overflow-auto">
                <div class="card text-white bg-warning text-wrap my-3 d-none d-lg-block" style="max-width: 18rem;">
                    <div class="card-header">ESTADO</div>
                    <div class="card-body">
                        <h5 class="card-title">Pendiente de corrección</h5>
                        <p class="card-text">La noticia no puede ser publicada porque hay uno o más detalles que atender.</p>
                    </div>
                </div>
                <div class="card border-secondary my-3 d-none d-lg-block" style="max-width: 18rem;">
                    <div class="card-body text-secondary">
                        <h5 class="card-title">Comentarios</h5>
                        <p class="card-text">Tu noticia ni siquiera tiene contenido. Solamente pusiste imágenes aleatorias y el contenido es texto generado automáticamente. Vuélvelo a hacer todo si quieres seguir trabajando. Saludos.</p>
                    </div>
                </div>

                <div class="card text-white bg-warning text-wrap my-3 d-block d-sm-block d-md-block d-lg-none"
                     style="width: 100%;padding-top: 100%;position: relative;">
                    <a style="position: absolute;
                       font-size: 8vw;
                       top: 5%;
                       left: 33%;
                       bottom: 0;
                       right: 0;"
                       tabindex="0"
                       role="button"
                       title="ESTADO: Pendiente"
                       data-toggle="popover" data-placement="right"
                       tabindex="0"
                       data-trigger="focus"
                       data-content="La noticia no puede ser publicada porque hay uno o más detalles que atender.">E</a>
                </div>
                <div class="card border-secondary my-3 d-block d-md-block d-sm-block d-lg-none"  style="width: 100%;padding-top: 100%;">

                </div>
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
