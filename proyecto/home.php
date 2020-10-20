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
        <title>Home</title>
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

                <h1>¡Bienvenido de nuevo ira3ck!</h1>
                <p class="mb-5">Listos para reportar :D</p>

                <button type="button" class="btn btn-success btn-lg p-2 px-5 my-5">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                    </svg> Crea una nueva nota
                </button>

                <div class="dropright">
                    <button class="btn btn-secondary dropdown-toggle" style="background: #ccccff; border-color: #9999ff;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Criterio de Orden
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <p class="dropdown-item">Más recientes</p>
                        <p class="dropdown-item">Más antiguos</p>
                        <p class="dropdown-item">Pendientes de aprobación (recientes)</p>
                        <p class="dropdown-item">Pendientes de aprobación (antiguos)</p>
                        <!--
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        -->
                    </div>
                </div>

                <div class="listaNotas overflow-auto my-2">

                    <div class="notaLista">

                        <div class="card listaCard" onclick="Redirect('preview.php')">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="https://pbs.twimg.com/media/EdqjfxzXgAAdIgm?format=jpg&name=4096x4096" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">El trabajo es demasiado complicado</h5>
                                        <p class="card-text">
                                            Resulta que el trabajo es muy difícil. No sabemos qué hacer al respecto, pero sí es muy complicado. 
                                            Pero, ¿qué hacer al respecto? Esa es una muy buena pregunta, ya veremos qué se podrá hacer al respecto.
                                        </p>
                                        <p class="card-text"><small class="text-muted">Última actualización hace 3 minutos</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card listaCard" onclick="Redirect('preview.php')">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="https://pbs.twimg.com/media/EdqjfxzXgAAdIgm?format=jpg&name=4096x4096" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">El trabajo es demasiado complicado</h5>
                                        <p class="card-text">
                                            Resulta que el trabajo es muy difícil. No sabemos qué hacer al respecto, pero sí es muy complicado. 
                                            Pero, ¿qué hacer al respecto? Esa es una muy buena pregunta, ya veremos qué se podrá hacer al respecto.
                                        </p>
                                        <p class="card-text"><small class="text-muted">Última actualización hace 3 minutos</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card listaCard" onclick="Redirect('preview.php')">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="https://pbs.twimg.com/media/EdqjfxzXgAAdIgm?format=jpg&name=4096x4096" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">El trabajo es demasiado complicado</h5>
                                        <p class="card-text">
                                            Resulta que el trabajo es muy difícil. No sabemos qué hacer al respecto, pero sí es muy complicado. 
                                            Pero, ¿qué hacer al respecto? Esa es una muy buena pregunta, ya veremos qué se podrá hacer al respecto.
                                        </p>
                                        <p class="card-text"><small class="text-muted">Última actualización hace 3 minutos</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card listaCard" onclick="Redirect('preview.php')">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="https://pbs.twimg.com/media/EdqjfxzXgAAdIgm?format=jpg&name=4096x4096" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">El trabajo es demasiado complicado</h5>
                                        <p class="card-text">
                                            Resulta que el trabajo es muy difícil. No sabemos qué hacer al respecto, pero sí es muy complicado. 
                                            Pero, ¿qué hacer al respecto? Esa es una muy buena pregunta, ya veremos qué se podrá hacer al respecto.
                                        </p>
                                        <p class="card-text"><small class="text-muted">Última actualización hace 3 minutos</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card listaCard" onclick="Redirect('preview.php')">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="https://pbs.twimg.com/media/EdqjfxzXgAAdIgm?format=jpg&name=4096x4096" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">El trabajo es demasiado complicado</h5>
                                        <p class="card-text">
                                            Resulta que el trabajo es muy difícil. No sabemos qué hacer al respecto, pero sí es muy complicado. 
                                            Pero, ¿qué hacer al respecto? Esa es una muy buena pregunta, ya veremos qué se podrá hacer al respecto.
                                        </p>
                                        <p class="card-text"><small class="text-muted">Última actualización hace 3 minutos</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card listaCard" onclick="Redirect('preview.php')">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="https://pbs.twimg.com/media/EdqjfxzXgAAdIgm?format=jpg&name=4096x4096" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">El trabajo es demasiado complicado</h5>
                                        <p class="card-text">
                                            Resulta que el trabajo es muy difícil. No sabemos qué hacer al respecto, pero sí es muy complicado. 
                                            Pero, ¿qué hacer al respecto? Esa es una muy buena pregunta, ya veremos qué se podrá hacer al respecto.
                                        </p>
                                        <p class="card-text"><small class="text-muted">Última actualización hace 3 minutos</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card listaCard" onclick="Redirect('preview.php')">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="https://pbs.twimg.com/media/EdqjfxzXgAAdIgm?format=jpg&name=4096x4096" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">El trabajo es demasiado complicado</h5>
                                        <p class="card-text">
                                            Resulta que el trabajo es muy difícil. No sabemos qué hacer al respecto, pero sí es muy complicado. 
                                            Pero, ¿qué hacer al respecto? Esa es una muy buena pregunta, ya veremos qué se podrá hacer al respecto.
                                        </p>
                                        <p class="card-text"><small class="text-muted">Última actualización hace 3 minutos</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card listaCard" onclick="Redirect('preview.php')">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="https://pbs.twimg.com/media/EdqjfxzXgAAdIgm?format=jpg&name=4096x4096" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">El trabajo es demasiado complicado</h5>
                                        <p class="card-text">
                                            Resulta que el trabajo es muy difícil. No sabemos qué hacer al respecto, pero sí es muy complicado. 
                                            Pero, ¿qué hacer al respecto? Esa es una muy buena pregunta, ya veremos qué se podrá hacer al respecto.
                                        </p>
                                        <p class="card-text"><small class="text-muted">Última actualización hace 3 minutos</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card listaCard" onclick="Redirect('preview.php')">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="https://pbs.twimg.com/media/EdqjfxzXgAAdIgm?format=jpg&name=4096x4096" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">El trabajo es demasiado complicado</h5>
                                        <p class="card-text">
                                            Resulta que el trabajo es muy difícil. No sabemos qué hacer al respecto, pero sí es muy complicado. 
                                            Pero, ¿qué hacer al respecto? Esa es una muy buena pregunta, ya veremos qué se podrá hacer al respecto.
                                        </p>
                                        <p class="card-text"><small class="text-muted">Última actualización hace 3 minutos</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card listaCard" onclick="Redirect('preview.php')">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="https://pbs.twimg.com/media/EdqjfxzXgAAdIgm?format=jpg&name=4096x4096" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">El trabajo es demasiado complicado</h5>
                                        <p class="card-text">
                                            Resulta que el trabajo es muy difícil. No sabemos qué hacer al respecto, pero sí es muy complicado. 
                                            Pero, ¿qué hacer al respecto? Esa es una muy buena pregunta, ya veremos qué se podrá hacer al respecto.
                                        </p>
                                        <p class="card-text"><small class="text-muted">Última actualización hace 3 minutos</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>

                 <div class="btn-group " role="group" aria-label="Anterior Siguiente" style="float: right;">
                        <button type="button" class="btn btn-secondary" style="background: #ccccff; border-color: #9999ff;">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-left-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.86 8.753l5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                            </svg>
                        </button>
                        <button type="button" class="btn btn-secondary" style="background: #ccccff; border-color: #9999ff;">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-right-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.14 8.753l-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                            </svg>
                        </button>
                    </div>
                
            </div>


            <div class="barra overflow-auto">

                <div class="perfil" style="color: azure;">
                    <div class="row no-gutters">
                        <div class="col">
                            <img src="https://pbs.twimg.com/profile_images/1313334758114562048/G7bWOycn_400x400.jpg" alt="Avatar">
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col py-2 text-center">
                            <h3>ira3ck</h3>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col px-2 text-center">
                            <p>ira3ck@correo.com</p>

                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col px-2 text-right">
                            <p>Reportero</p>

                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col py-3 text-center">
                            <p>Pequeña pero concisa descripción del usuario.</p>
                        </div>
                    </div>
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