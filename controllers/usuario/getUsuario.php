<?php
    session_start();
    require_once 'config/connect.php';
    require_once 'models/Usuario.php';

    $userhdl = new Usuario($conn);

// ****** OBTENER ARRAY DATOS DE USUARIO ****** //

        // Obtener post y decodificar json
        $postdata = json_decode(file_get_contents('php://input'), true);

        $data = array(); // Guardamos array de mensajes de error o exito.

        if ($data['resultado'] = $userhdl->getUsuario($postdata)) {
            $data['success'] = true;
        } else {
            $data['success'] = false;
        }

        $data['postdt'] = $postdata; // Para comprobar datos enviados desde angular.

        echo json_encode($data);

    // ******* X ******* //
