<?php
    require_once 'config/connect.php'; // Conexión a base de datos
    require_once 'models/Usuario.php'; // Model Usuario

    session_start();

    $userhdl = new Usuario($conn); // Objeto Model Usuario

    // ****** LOGIN ****** //

    // Obtener post y decodificar json
    $postdata = json_decode(file_get_contents('php://input'), true);
    $data = array(); // Aqui guardamos datos que devolveremos al controlador de angular

    $pass = md5($postdata['contrasena']);

    $loginres = $userhdl->checkLogin($postdata['usuario'], $pass);

    if ($loginres) {
        $data['success'] = true;

        if ($loginres[0] == 'valid') {
            $data['valid'] = true;
            $_SESSION['usuario'] = $postdata['usuario']; // Usuario para la sesión
            $_SESSION['id'] = $loginres[1]['id'];
            $_SESSION['nombre'] = $loginres[1]['nombre'];
            $_SESSION['apellidos'] = $loginres[1]['apellidos'];
            $_SESSION['poblacion'] = $loginres[1]['poblacion'];
            $_SESSION['email'] = $loginres[1]['email'];
            $_SESSION['tlf'] = $loginres[1]['telefono'];
        } elseif ($loginres[0] == 'invalid') {
            $data['valid'] = false;
        }
    } else {
        $data['success'] = false;
    }

    echo json_encode($data);

    // ******* X ******* //
