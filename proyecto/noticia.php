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
        </style>
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
                        <div class="col text-muted"><small>
                                20 de octubre, 2020.<br>Guadalupe, Nuevo León.
                            </small></div>                    
                    </div>
                    <div class="row py-3">
                        <div class="col">
                            <div class="jumbotron" style="background: #e1cce5">
                                <h1>Individuo pierde en Buscaminas</h1>
                                <h6>Triste historia de un individuo que iba a ganar, pero el destino tenía otros planes.</h6>
                            </div>
                        </div>                    
                    </div>
                    <div class="row py-3">
                        <div class="col" align="center">
                            <figure class="figure">
                                <img src="https://pbs.twimg.com/media/EgvGhYbXYAA2Ean?format=png&name=small" class="figure-img img-fluid rounded noticiaIMG-gd" alt="...">
                                <figcaption class="figure-caption">El desenlace de ese 50/50 no fue el 50 favorable.</figcaption>
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
                        </div>   
                    </div>
                    <div class="row py-3">
                        <div class="col" align="center">
                            <figure class="figure">
                                <img src="https://pbs.twimg.com/media/EdqjfxzXgAAdIgm?format=jpg&name=4096x4096" class="figure-img img-fluid rounded noticiaIMG-gd" alt="...">
                                <figcaption class="figure-caption">La frustración de un artista que solo quería relajarse.</figcaption>
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
                        </div>   
                    </div>
                </div>
                <div class="row">
                    <div class="col text-muted" align="right"><small>
                            Publicado el 20 de octubre, 2020.
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
                <div class="row">
                    <div class="col-1 my-5" id="likeCounter" style="font-size: 25px">
                        3
                    </div>
                    <div class="col-2 my-5 meGusta user-select-none text-center" onclick="like(this)">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-suit-heart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 6.236l.894-1.789c.222-.443.607-1.08 1.152-1.595C10.582 2.345 11.224 2 12 2c1.676 0 3 1.326 3 2.92 0 1.211-.554 2.066-1.868 3.37-.337.334-.721.695-1.146 1.093C10.878 10.423 9.5 11.717 8 13.447c-1.5-1.73-2.878-3.024-3.986-4.064-.425-.398-.81-.76-1.146-1.093C1.554 6.986 1 6.131 1 4.92 1 3.326 2.324 2 4 2c.776 0 1.418.345 1.954.852.545.515.93 1.152 1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"/>
                        </svg>
                        Me Gusta
                    </div>
                </div>



                <div class="separador"><h3>También podría interesarte...</h3></div>

                <div id="carouselExampleIndicators" class="carousel slide mx-auto mostRead" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="nota" onclick="noticia(01)">
                                <div class="row no-gutters">
                                    <div class="col-12">
                                        <h2>Individuo pierde en un Buscaminas</h2>
                                    </div>
                                </div>
                                <div class="row no-gutters">
                                    <div class="col-lg-5">
                                        <img src="https://pbs.twimg.com/media/EgvGhYbXYAA2Ean?format=png&name=small" class="notaIMG"/>
                                    </div>
                                    <div class="col-lg-7 p-2">
                                        <div class="row no-gutters" style="height: 90%;">
                                            <p>
                                                Donec aliquam, mauris mollis pharetra consequat, lectus dui pulvinar turpis, ut imperdiet elit erat vel elit.
                                                Praesent at libero facilisis, efficitur sem ac, porttitor arcu.
                                                Duis porta libero augue, a lobortis libero tempus a.
                                                Aenean purus enim, pulvinar dictum pharetra sit amet, malesuada vel arcu.
                                                Curabitur molestie urna nisl, vitae sollicitudin odio tempor a. In hac habitasse platea dictumst.
                                                Etiam quis turpis vel urna ultricies pretium. Donec non euismod nulla.
                                                Pellentesque imperdiet leo velit, eu vulputate orci sodales ac.
                                                In pharetra facilisis odio, eu aliquam sem laoreet eu.
                                                Praesent massa turpis, convallis ac dapibus id, euismod ut massa.
                                                Sed elementum et eros ut porta. Fusce consectetur aliquam sapien ac semper.
                                            </p>
                                        </div>
                                        <div class="row no-gutters">
                                            <div class="col">
                                                <p class="autor">
                                                    Hecho Por Daniel - 18 / 10 / 2020
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="carousel-item">
                            <div class="nota" onclick="noticia(01)">
                                <div class="row no-gutters">
                                    <div class="col-12">
                                        <h2>Individuo pierde en un Buscaminas</h2>
                                    </div>
                                </div>
                                <div class="row no-gutters">
                                    <div class="col-lg-5">
                                        <img src="https://pbs.twimg.com/media/EgvGhYbXYAA2Ean?format=png&name=small" class="notaIMG"/>
                                    </div>
                                    <div class="col-lg-7 p-2">
                                        <div class="row no-gutters" style="height: 90%;">
                                            <p>
                                                Donec aliquam, mauris mollis pharetra consequat, lectus dui pulvinar turpis, ut imperdiet elit erat vel elit.
                                                Praesent at libero facilisis, efficitur sem ac, porttitor arcu.
                                                Duis porta libero augue, a lobortis libero tempus a.
                                                Aenean purus enim, pulvinar dictum pharetra sit amet, malesuada vel arcu.
                                                Curabitur molestie urna nisl, vitae sollicitudin odio tempor a. In hac habitasse platea dictumst.
                                                Etiam quis turpis vel urna ultricies pretium. Donec non euismod nulla.
                                                Pellentesque imperdiet leo velit, eu vulputate orci sodales ac.
                                                In pharetra facilisis odio, eu aliquam sem laoreet eu.
                                                Praesent massa turpis, convallis ac dapibus id, euismod ut massa.
                                                Sed elementum et eros ut porta. Fusce consectetur aliquam sapien ac semper.
                                            </p>
                                        </div>
                                        <div class="row no-gutters">
                                            <div class="col">
                                                <p class="autor">
                                                    Hecho Por Daniel - 18 / 10 / 2020
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="carousel-item">
                            <div class="nota" onclick="noticia(01)">
                                <div class="row no-gutters">
                                    <div class="col-12">
                                        <h2>Individuo pierde en un Buscaminas</h2>
                                    </div>
                                </div>
                                <div class="row no-gutters">
                                    <div class="col-lg-5">
                                        <img src="https://pbs.twimg.com/media/EgvGhYbXYAA2Ean?format=png&name=small" class="notaIMG"/>
                                    </div>
                                    <div class="col-lg-7 p-2">
                                        <div class="row no-gutters" style="height: 90%;">
                                            <p>
                                                Donec aliquam, mauris mollis pharetra consequat, lectus dui pulvinar turpis, ut imperdiet elit erat vel elit.
                                                Praesent at libero facilisis, efficitur sem ac, porttitor arcu.
                                                Duis porta libero augue, a lobortis libero tempus a.
                                                Aenean purus enim, pulvinar dictum pharetra sit amet, malesuada vel arcu.
                                                Curabitur molestie urna nisl, vitae sollicitudin odio tempor a. In hac habitasse platea dictumst.
                                                Etiam quis turpis vel urna ultricies pretium. Donec non euismod nulla.
                                                Pellentesque imperdiet leo velit, eu vulputate orci sodales ac.
                                                In pharetra facilisis odio, eu aliquam sem laoreet eu.
                                                Praesent massa turpis, convallis ac dapibus id, euismod ut massa.
                                                Sed elementum et eros ut porta. Fusce consectetur aliquam sapien ac semper.
                                            </p>
                                        </div>
                                        <div class="row no-gutters">
                                            <div class="col">
                                                <p class="autor">
                                                    Hecho Por Daniel - 18 / 10 / 2020
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
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
                    <div class="col">
                        Hey, déjanos un comentario.
                    </div>
                </div>
                <div class="row mt-2">

                    <div class="col-lg-10 m-auto">
                        <textarea style="width:100%"></textarea>
                    </div>
                    <div class="col-lg-2 p-0 p-sm-2 p-lg-0">
                        <button type="button" class="btn btn-primary btn-lg btn-block">Enviar</button>
                    </div>                      
                </div>
                <div class="listaNotas overflow-auto my-2">

                    <div class="comentario">
                        <img src="https://pbs.twimg.com/media/EiNYM5CWAAAh9PV?format=png&name=240x240"/>
                        <div class="comentext">
                            <h4>Pollito</h4>
                            No pues la verdad pobre de ese sujeto, quién sabe qué habría sido si hubiera ganado.
                            <small class="text-muted"><br>Hace 5 minutos</small>
                        </div>
                    </div>
                    
                    <div class="comentario">
                        <img src="https://pbs.twimg.com/media/EiNYONQXkAEvm5d?format=png&name=360x360"/>
                        <div class="comentext">
                            <h4>Vela en Cubo</h4>
                            Sinceramente no entiendo a quién le puede interesar una noticia como esta. Ese juegot tiene como un siglo y la verdad nadie lo sabe jugar. Ojalá que el perdedor del que hablan en la noticia se encuentre un juego de verdad en lugar de seguir con esa porquería que nadie quiere.
                            <small class="text-muted"><br>Hace 8 minutos</small>
                        </div>
                    </div>

                </div>


            </div>


            <!--BARRA (INICIO)-->
            <div class="barra overflow-auto">
                <div class="separador user-select-none">CATEGORÍAS</div>
                <div class="category user-select-none" style="background: #3300cc">
                    Texto por aquí
                </div>
                <div class="category user-select-none" style="background: #333300">
                    Texto por allá
                </div>
                <div class="category user-select-none" style="background: #ff9999">
                    Texto en todas partes
                </div>
                <div class="category user-select-none" style="background: #6666ff" onclick="alertaRoja()">
                    Alerta Roja
                </div>
                <div class="category user-select-none" style="background: #ff6633" onclick="Redirect('formato.php')">
                    Al Formato
                </div>
                <div class="category user-select-none" style="background: #ff6633" onclick="Redirect('home.php')">
                    Al Perfil
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
