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
                        <form class="px-4 py-3" onsubmit="return validacionRegistrarse()">
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
                            <button type="submit" class="btn btn-primary" >Registrarse</button>
                        </form>

                    </div>
                </div>

            </div>
        </nav>

        <div class="contGlobal">
            <div class="mainContent">

                <div class="flotador">
                    <div class="card bg-dark text-black m-3" style="width: 13rem;">
                        <img src="https://pbs.twimg.com/media/EdrGEWvXsAEXyI6?format=jpg&name=small" class="card-img" alt="...">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Noticiaza</h5>
                            <p class="card-text align-text-bottom">Hace 3 días</p>
                        </div>
                    </div>

                    <div class="card bg-dark text-black m-3" style="width: 13rem;">
                        <img src="https://pbs.twimg.com/media/EgvGhYbXYAA2Ean?format=png&name=small" class="card-img" alt="...">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Notición</h5>
                            <p class="card-text align-text-bottom">Hace 3 días</p>
                        </div>
                    </div>

                    <div class="card bg-dark text-black m-3" style="width: 13rem;">
                        <img src="https://pbs.twimg.com/media/EgvGhYbXYAA2Ean?format=png&name=small" class="card-img" alt="...">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Noticioso</h5>
                            <p class="card-text align-text-bottom">Hace 3 días</p>
                        </div>
                    </div>
                </div>

                <div class="separador"><h3>Lo más leído</h3></div>

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



                <div class="nota" onclick="noticia(01)">
                    <div class="flash">¡ÚLTIMO MOMENTO!</div>
                    <div class="row no-gutters">
                        <div class="col-12">
                            <h2>Individuo pierde en un Buscaminas</h2>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-lg-5">
                            <img src="https://pbs.twimg.com/media/EdrGEWvXsAEXyI6?format=jpg&name=small" class="notaIMG" />
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


            <div class="barra overflow-auto">
                <div class="separador">CATEGORÍAS</div>
                <div class="category" style="background: #3300cc">
                    Texto por aquí
                </div>
                <div class="category" style="background: #333300">
                    Texto por allá
                </div>
                <div class="category" style="background: #ff9999">
                    Texto en todas partes
                </div>
                <div class="category" style="background: #6666ff" onclick="alertaRoja()">
                    Alerta Roja
                </div>
                <div class="category" style="background: #ff6633" onclick="Redirect('formato.php')">
                    Al Formato
                </div>
                <div class="category" style="background: #ff6633" onclick="Redirect('home.php')">
                    Al Perfil
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
        <?php
        // put your code here
        //phpinfo();
        ?>
    </body>
</html>
