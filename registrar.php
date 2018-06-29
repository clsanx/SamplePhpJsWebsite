<?php
    session_start();

    if (!empty($_SESSION)) {
        header('Location: https://reto3-clsantos.c9users.io/index.php');
        die();
    }

    require_once 'views/layout.php'; // Vistas Generales
    require_once 'views/Usuario_vista.php'; // Vistas Usuario
    require_once 'views/Viaje_vista.php'; // Vistas Viaje

    $view = new Layout();
    $viewuser = new Usuario_vista();
    $viewviaje = new Viaje_vista();

?>
<html ng-app="appRegistro">

    <head>
        <title>RETO_3</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link rel=icon href=img/favicon.ico>-->

        <?= $view->loadDependenciasEstilos(); ?>
        <link href="css/registrar.css" rel="stylesheet" type="text/css" />
        
    </head>

    <body>
        <div id="wrapper">
            <header>
                <?= $view->loadNavbar(); ?>
            </header>

            <main ng-controller="ctrRegistro" class="ng-cloak">
                <!-- Contenido aqui -->
                <?= $viewuser->loadFormRegistro(); ?>

                <!--<br/><br/><center>-->
                
                <!--    <pre>{{ nuevoUsuarioForm | json }}</pre>-->
                <!--    <br/>-->
                    <!--<pre>{{ nuevoUsuario }}</pre>-->
                
                <!--</center>-->
            </main>

            <footer>
                <?= $view->loadFooter(); ?>
            </footer>

        </div>

        <?= $view->loadDependenciasScripts(); ?>
        
        <!-- App Scripts -->
        <script src="js/usuario/registro.js" type="text/javascript"></script>



    </body>

</html>
