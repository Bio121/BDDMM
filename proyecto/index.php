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
        <title>Formato</title>
    </head>
    <body>
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark" style="background-color: #351a5e;">
            <a class="navbar-brand" href="index.php">Novedades del Bot</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-link" href="#">Features</a>
                    <a class="nav-link" href="#">Pricing</a>
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
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
                            <img src="https://pbs.twimg.com/media/EdrGEWvXsAEXyI6?format=jpg&name=small" class="notaIMG"/>
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


            <div class="barra">
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