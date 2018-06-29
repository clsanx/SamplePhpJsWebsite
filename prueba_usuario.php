<?php
    session_start();
    require_once 'views/layout.php'; // Vistas Generales
    require_once 'views/Usuario_vista.php'; // Vistas Usuario
    require_once 'views/Viaje_vista.php'; // Vistas Viaje

    $view = new Layout();
    $viewuser = new Usuario_vista();
    $viewviaje = new Viaje_vista();
?>

<html ng-app="appBuscar">

<head>
    <title>RETO_3</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel=icon href=img/favicon.ico>-->
    
    <!--Estilos-->
    <?= $view->loadDependenciasEstilos(); ?>
    <link href="css/form_buscar.css" rel="stylesheet" type="text/css" />
    <link href="css/viaje_items.css" rel="stylesheet" type="text/css" />
    
</head>

<body>
    <div id="wrapper">
        <header>
            <?= $view->loadNavbar(); ?>
        </header>

        <main ng-controller="ctrBuscar" ngCloak>
            <!-- Contenido aqui -->
            
            <a href="usuario.php?uid=1">Ver Usuario</a>

        </main>

        <footer>
            <?php $view->loadFooter(); ?>
        </footer>
        

    </div>

        <?= $view->loadDependenciasScripts(); ?>
        
        <!-- App Scripts -->
        <script src="js/viaje/buscar_viaje.js" type="text/javascript"></script>

</body>
</html>
