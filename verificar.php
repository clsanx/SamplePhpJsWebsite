<?php
    session_start();
    require_once 'config/connect.php';
    require_once 'models/Usuario.php';
    require_once 'views/layout.php'; // Vistas Generales
    require_once 'views/Usuario_vista.php'; // Vistas Usuario
    require_once 'views/Viaje_vista.php'; // Vistas Viaje

    $view = new Layout();
    $viewuser = new Usuario_vista();
    $viewviaje = new Viaje_vista();

    $userhdl = new Usuario($conn);

    if (!empty($_GET)) {
        $hash = $_GET['h'];
        $id = $_GET['id'];

        $dataver = $userhdl->getX("SELECT email,verificado FROM usuario WHERE id='$id';");

        $debug = array();

        $debug[] = $dataver;

        if ($dataver) {
            if ($dataver == 'no') {
                $msg = 'Ha ocurrido un error con la verificación.';
            } else {
                if ($dataver['verificado'] == 1) {
                    $msg = 'Tu cuenta ya esta verificada';
                    header('Location: https://reto3-clsantos.c9users.io/');
                    die();
                } else {
                    $emailhashdb = md5($dataver['email']);
                    $debug[] = $emailhashdb;

                    if ($hash == $emailhashdb) {
                        if ($userhdl->verificarUsuario($id)) {
                            $msg = 'Tu cuenta ha sido verificada.';
                            header('refresh:3;url=https://reto3-clsantos.c9users.io/micuenta.php');
                        } else {
                            $msg = 'Ha ocurrido un error con la verificación.';
                        }
                    } else {
                        $msg = 'Ha ocurrido un error con la verificación.';
                    }
                }
            }
        } else {
            $msg = 'Ha ocurrido un error con la verificación.';
        }

        $fp = fopen('debug.json', 'w');
        fwrite($fp, json_encode($debug));
        fclose($fp);
    } else {
        header('Location: https://reto3-clsantos.c9users.io/');
        die();
    }

?>

<html>

<head>
    <title>ZCAR</title>
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
            <div class="container" style="width:50%; padding-top:30px;">
            <p class="well well-lg text-center lead">
                <?= $msg ?>
            </p>
            </div>
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