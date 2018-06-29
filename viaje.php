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

<html ng-app="appViaje">

<head>
    <title>RETO_3</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel=icon href=img/favicon.ico>-->
    
    <!--Estilos-->
    <?= $view->loadDependenciasEstilos(); ?>
    <link href="css/form_buscar.css" rel="stylesheet" type="text/css" />
    <link href="css/viaje.css" rel="stylesheet" type="text/css" />
    
</head>

<body>
    <div id="wrapper">
        <header>
            <?= $view->loadNavbar(); ?>
        </header>

        <main ng-controller="ctrViaje" ngCloak>
            <!-- Contenido aqui -->
            <h2 hidden>El ID recibido es: <?php  $_GET['v'] ?> </h2>
            <h2 hidden>Session nombre: <?=  $_SESSION['nombre'] ?> </h2>
            <h3 hidden ng-cloak ng-model="idViaje" ng-init="getViajeData(<?=  $_GET['v'] ?>)">{{ idViaje }}</h3>
            <h3 hidden ng-cloak ng-model="nombreRem" 
            ng-init="nombreRem = '<?=  $_SESSION['nombre'] ?>'"> {{ nombreRem }} </h3>
            
            
            <div id="datos-viaje" class="container msg-box animated fadeIn" ng-cloak>
                <h2><strong>Estado del viaje</strong></h2>
                <hr>
                <div calss="container">
                    <div class="row">
                        <div class="col-sm-5 col-md-5">
                            <div class="row">
                                <div class="group">
                                    <label class="col-xs-5 col-md-5 talign">Conductor:  </label>
                                    <label class="col-xs-7 col-md-7"><div class="glyphicon glyphicon-dashboard" ng-init"getUserData()"></div>&nbsp;<a style="text-decoration:none;" href="usuario.php?uid={{datosViaje.conductor}}">{{datosUsuario.nombre}}</a></label>
                                </div>
                                <div class="group">
                                    <label class="col-xs-5 col-md-5 talign">Plazas:  </label>
                                    <label class="col-xs-7 col-md-7"><div class="glyphicon glyphicon-user"></div>&nbsp;{{datosViaje.plazas}}</label>
                                </div>    
                                <div class="group">    
                                    <label class="col-xs-5 col-md-5 talign">Origen: </label>
                                    <label class="col-xs-7 col-md-7"><div class="glyphicon glyphicon-map-marker"></div>&nbsp;{{datosViaje.origen}}</label>
                                </div>    
                                <div class="group">    
                                    <label class="col-xs-5 col-md-5 talign">Encuentro: </label>
                                    <label class="col-xs-7 col-md-7"><div class="glyphicon glyphicon-road"></div>&nbsp;{{datosViaje.ptoencuentro}}</label>
                                </div>   
                                <div class="group">    
                                    <label class="col-xs-5 col-md-5 talign">Paradas: </label>
                                    <label class="col-xs-7 col-md-7"><div class="glyphicon glyphicon-screenshot"></div>&nbsp;{{datosViaje.paradas}}</label><br>
                                </div>
                                <div class="group">    
                                    <label class="col-xs-5 col-md-5 talign">Coche: </label>
                                    <label class="col-xs-7 col-md-7"><div class="fa fa-car"></div>&nbsp;{{datosViaje.coche}}</label><br>
                                </div>
                                <div class="group">    
                                    <label class="col-xs-5 col-md-5 talign">Fecha: </label>
                                    <label class="col-xs-7 col-md-7"><div class="glyphicon glyphicon-calendar"></div>&nbsp;{{datosViaje.fecha}} </label>
                                </div>    
                                <div class="group">    
                                    <label class="col-xs-5 col-md-5 talign">Hora: </label>
                                    <label class="col-xs-7 col-md-7"><div class="glyphicon glyphicon-time"></div>&nbsp;{{datosViaje.hora}}</label><br>
                                </div>    
                                
                                <div class="group">
                                    <div class="col-md-6 col-xs-6 col-xs-offset-3 col-md-offset-3" style="margin-top:100px">    
                                        <button id="boton_detalles" type="button" class="col btn btn-success btn-lg btn-responsive" 
                                        name="reservar" ng-click="reservarViaje(<?= $_SESSION['id'] ?>)" 
                                        ng-disabled="(<?= $_SESSION['id'] ?> == datosViaje.conductor) || (datosViaje.plazas == 0)"> 
                                        <span class="glyphicon glyphicon-ok"></span> Reservar</button>
                                        <span ng-class="text-danger" ng-if="datosViaje.plazas==0">No hay plazas disponibles.</span>
                                        <span ng-class="tipoMsj" ng-show="resReservar">{{ resReservar }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="g-map" class="col-sm-6 col-md-6 embed-responsive embed-responsive-16by9 mapBorder">
                          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3457.448252059938!2d-2.727386344335666!3d43.222999746284216!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4e369c4e0d1637%3A0x78ccbf7525105ab1!2sCIFP+ZORNOTZA+LHII!5e0!3m2!1ses!2ses!4v1485426523694" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>    
                </div>
                <br><br>
                
                    
                    
                
                
      
                
                
               
                <!--<pre>Datos Viaje (datosViaje): {{ datosUsuario | json }}</pre>-->
                
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
        <script src="js/viaje/viaje.js" type="text/javascript"></script>

</body>
</html>
