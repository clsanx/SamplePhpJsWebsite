<?php
    session_start();
    require_once 'views/layout.php'; // Vistas Generales
    require_once 'views/Usuario_vista.php'; // Vistas Usuario
    require_once 'views/Viaje_vista.php'; // Vistas Viaje

    $view = new Layout();
    $viewuser = new Usuario_vista();
    $viewviaje = new Viaje_vista();
?>
<html>

<head>
    <title>RETO_3</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel=icon href=img/favicon.ico>-->

    <!-- Estilos -->
    <?= $view->loadDependenciasEstilos(); ?>
    <link href="css/registrar.css" rel="stylesheet" type="text/css" />

    
    
</head>

<body>
    <div id="wrapper">
        <header>
            <?= $view->loadNavbar(); ?>
        </header>

        <main>
            <h2> <?=  $_SESSION['id'] ?> </h2>
            <h2> <?=  $_SESSION['usuario'] ?> </h2>
            <h2> <?=  $_SESSION['nombre'] ?> </h2>
            <!-- Contenido aqui -->
            <?= $viewuser->loadSuccessRegistro(); ?>
        </main>

        <footer>
            <?= $view->loadFooter(); ?>
        </footer>

    </div>




        <!-- App Dependencias -->
        <?= $view->loadDependenciasScripts(); ?>

</body>

</html>
