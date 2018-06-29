<?php
    session_start();

    if (!empty($_SESSION)) {
        header('Location: https://reto3-clsantos.c9users.io/micuenta.php');
        die();
    }

    require_once 'views/layout.php'; // Vistas Generales
    require_once 'views/Usuario_vista.php'; // Vistas Usuario
    require_once 'views/Viaje_vista.php'; // Vistas Viaje

    $view = new Layout();
    $viewuser = new Usuario_vista();
    $viewviaje = new Viaje_vista();

?>
<html ng-app="appLogin">

    <head>
        <title>RETO_3</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link rel=icon href=img/favicon.ico>-->

        <!-- Estilos -->
        <?= $view->loadDependenciasEstilos(); ?>
        <link href="css/form_login.css" rel="stylesheet" type="text/css" />
        
    </head>

    <body>
        <div id="wrapper">
            <header>
                <?= $view->loadNavbar(); ?>
            </header>

            <main ng-controller="ctrLogin" class="ng-cloak">
                <!-- Contenido aqui -->
                <?= $viewuser->loadFormLogin(); ?>

            </main>

            <footer>
                <?= $view->loadFooter(); ?>
            </footer>

        </div>

        <!-- Scripts -->
        <?= $view->loadDependenciasScripts(); ?>
        
        <!-- App Scripts -->
        <script src="js/usuario/login.js" type="text/javascript"></script>


    </body>

</html>
