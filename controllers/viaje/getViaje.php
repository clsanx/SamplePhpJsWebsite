<?php
    session_start();
    require_once 'config/connect.php';
    require_once 'models/Viaje.php';
    require_once 'php_functions/dateFormat.php';

    $viajehdl = new Viaje($conn);

// ****** OBTENER ARRAY DATOS DE USUARIO ****** //

        // Obtener post y decodificar json
        $postdata = json_decode(file_get_contents('php://input'), true);

        $data = array(); // Guardamos array de mensajes de error o exito.

        if ($data['resultado'] = $viajehdl->getViaje($postdata)) {
            $data['resultado']['fecha'] = dateToDmy($data['resultado']['fecha']);
            $data['success'] = true;
        } else {
            $data['success'] = false;
        }

        $data['postdt'] = $postdata; // Para comprobar datos enviados desde angular.

        echo json_encode($data);

    // ******* X ******* //
