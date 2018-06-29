<?php
    session_start();
    require_once 'config/connect.php';
    require_once 'models/Mensaje.php';

    $mensajehdl = new Mensaje($conn);

// ****** OBTENER MENSAJES DE USUARIO ****** //

        // Obtener post y decodificar json
        $postdata = json_decode(file_get_contents('php://input'), true);

         $fp = fopen('results.json', 'w');
        // //fwrite($fp, json_encode($_FILES['type']));
         fwrite($fp, json_encode($postdata));
         fclose($fp);

        $data = array(); // Guardamos array de mensajes de error o exito.

        if ($data['mensajes'] = $mensajehdl->getMensajes($postdata)) {
            $data['success'] = true;
        } else {
            $data['success'] = false;
        }

        $data['postdt'] = $postdata; // Para comprobar datos enviados desde angular.

        echo json_encode($data);

    // ******* X ******* //
