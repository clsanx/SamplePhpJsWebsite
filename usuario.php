<?php
    session_start();

    if (empty($_SESSION)) {
        header('Location: https://reto3-clsantos.c9users.io/login.php');
        die();
    }

    require_once 'views/layout.php'; // Vistas Generales
    require_once 'views/Usuario_vista.php'; // Vistas Usuario
    require_once 'views/Viaje_vista.php'; // Vistas Viaje

    $view = new Layout();
    $viewuser = new Usuario_vista();
    $viewviaje = new Viaje_vista();
?>

<html ng-app="appPerfil">

<head>
    <title>RETO_3</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel=icon href=img/favicon.ico>-->
    
    <!--Estilos-->
    <?= $view->loadDependenciasEstilos(); ?>
    <link href="css/form_buscar.css" rel="stylesheet" type="text/css" />
    <link href="css/usuario.css" rel="stylesheet" type="text/css" />
    
</head>

<body>
    <div id="wrapper">
        <header>
            <?= $view->loadNavbar(); ?>
        </header>

        <main ng-controller="ctrPerfil" ngCloak>
            <!-- Contenido aqui -->
            <h2 hidden>El ID recibido es: <?=  $_GET['uid'] ?> </h2>
            <h3 hidden ng-model="idUsuario" ng-init="getUserData(<?=  $_GET['uid'] ?>)">{{ idUsuario }}</h3>
            
            <div class="container msg-box animated fadeIn" ng-cloak>
                <center>
                    <h2><strong>Perfil de usuario</strong></h2>
                    <hr>
                </center>
                <div class="row">
                    
                    <div class="col-xs-8 col-xs-offset-2 col-md-6 col-md-offset-0">
                        <center>
                            <img src="{{ datosPerfil.imagen_perfil }}" class="tmImg" ng-cloak>
                        </center>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="row">
                            <center>
                                <div class="group">
                                    <label class="col-xs-6 col-md-4 talign">Nombre:  </label>
                                    <label class="col-xs-6 col-md-8 talignl">&nbsp;&nbsp;{{datosPerfil.nombre}}</label>
                                </div>
                                <div class="group">
                                    <label class="col-xs-6 col-md-4 talign">Poblacion:  </label>
                                    <label class="col-xs-6 col-md-8 talignl">&nbsp;&nbsp;{{datosPerfil.poblacion}}</label>
                                </div>
                                <div class="group">
                                     <label class="col-xs-6 col-md-4 talign">Modulo:  </label>
                                    <label class="col-xs-6 col-md-8 talignl">&nbsp;&nbsp;{{datosPerfil.modulo}}</label>
                                </div>
                                <div class="group">
                                    <label class="col-xs-6 col-md-4 talign">Genero:  </label>
                                    <label class="col-xs-6 col-md-8 talignl">&nbsp;&nbsp;{{datosPerfil.genero}}</label>
                                </div>
                                <div class="group">
                                    <label class="col-xs-6 col-md-4 talign">Nivel:  </label>
                                    <label class="col-xs-6 col-md-8 talignl">&nbsp;&nbsp;{{datosPerfil.nivel}}</label>
                                </div>
                                <div class="group">
                                    <label class="col-xs-6 col-md-4 talign">Reputacion:  </label>
                                    <label class="col-xs-6 col-md-8 talignl">&nbsp;&nbsp;{{datosPerfil.reputacion}}&nbsp;&nbsp;de 5</label>
                                </div>
                            </center>
                        </div>
                    </div>
                    
                </div>   
                
            </div>
                
        </main>

        <footer>
            <?php 
                $view->loadFooter();
            ?>
        </footer>
        

    </div>

        <?= $view->loadDependenciasScripts(); ?>
        
        <!-- App Scripts -->
        <script src="js/usuario/uperfil.js" type="text/javascript"></script>

</body>
</html>
