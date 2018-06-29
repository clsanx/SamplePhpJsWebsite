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
<html ng-app="appMiCuenta">

    <head>
        <title>RETO_3</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link rel=icon href=img/favicon.ico>-->

        <!-- Estilos -->
        <?= $view->loadDependenciasEstilos(); ?>
        <link href="css/registrar.css" rel="stylesheet" type="text/css" />
        <link href="css/perfil.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div id="wrapper">
            <header>
                <?= $view->loadNavbar(); ?>
            </header>

            <main>
                <!-- Contenido aqui -->
                <div class="container animated fadeIn" id="form-perfil">
                <?php
                    $viewuser->loadNavbarUsuario();

                    switch ($_GET['s']) {
                        case 'viajes':
                            $viewuser->loadViajesUsuario();
                            break;
                        case 'reservas':
                            $viewuser->loadReservasUsuario();
                            break;
                        case 'alertas':
                            $viewuser->loadAlertasUsuario();
                            break;
                        case 'mensajes':
                            $viewuser->loadMensajesUsuario();
                            break;
                        case 'opiniones':
                            $viewuser->loadOpinionesUsuario();
                            break;
                        default:
                            $viewuser->loadPerfilUsuario();
                            break;
                    }

                ?>
                </div> 
                
            </main>

            <footer>
                <?= $view->loadFooter(); ?>
            </footer>

        </div>

        <!-- Scripts -->
        <?= $view->loadDependenciasScripts(); ?>
        <script src="node_modules/ng-file-upload/dist/ng-file-upload-shim.min.js"></script>
        <script src="node_modules/ng-file-upload/dist/ng-file-upload.min.js"></script>
        <script src="js/usuario/micuenta/app.js" type="text/javascript"></script>
        <script src="js/usuario/micuenta/perfil.js" type="text/javascript"></script>
        <script src="js/usuario/micuenta/mensajes.js" type="text/javascript"></script>
        <script src="js/usuario/micuenta/reservas.js" type="text/javascript"></script>
        <script src="js/usuario/micuenta/viajes.js" type="text/javascript"></script>
        <script src="js/usuario/micuenta/alertas.js" type="text/javascript"></script>
        <script src="js/usuario/micuenta/opiniones.js" type="text/javascript"></script>

    </body>

</html>
