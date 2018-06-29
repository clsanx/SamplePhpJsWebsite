<?php
    require_once 'config/connect.php'; // Conexión a base de datos
    require_once 'models/Usuario.php'; // Model Usuario

    session_start();

    $userhdl = new Usuario($conn); // Objeto Model Usuario

    // ****** LOGIN ****** //

    if (isset($_POST['login-submit'])) { // Acción boton login
        $usuario = filter_input(INPUT_POST, 'usuario'); // Filtro input usuario
        $pass = filter_input(INPUT_POST, 'password'); // Filtro input password

        $loginres = $userhdl->checkLogin($usuario, $pass);

        // $fp = fopen('results.json', 'w');
        // fwrite($fp, json_encode($loginres));
        // fclose($fp);

        // echo '<pre>';
        // print_r($loginres);
        // echo '</pre>';

        if ($loginres[0]) { // Verificar login
            $_SESSION['usuario'] = $usuario; // Usuario para la sesión
            $_SESSION['id'] = $loginres[1];
            // $_SESSION['tipo'] = $results['tipo'];
            header('Location: https://reto3-clsantos.c9users.io/');
            die();
        } else {
            header('Location: https://reto3-clsantos.c9users.io/');
            die();
        }
    }

    // ******* X ******* //
