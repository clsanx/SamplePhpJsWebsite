<?php

    require_once 'config/connect.php';
    require_once 'models/Viaje.php';
    require_once 'models/Usuario.php';
    require_once 'php_functions/dateFormat.php';

    $viajehdl = new Viaje($conn);
    $userhdl = new Usuario($conn);

    // ****** BUSCAR VIAJE ****** //

        // Obtener post y decodificar json
        $postdata = json_decode(file_get_contents('php://input'), true);

        $fp = fopen('res.json', 'w');
        //fwrite($fp, json_encode($_FILES['type']));
        fwrite($fp, json_encode($postdata));
        fclose($fp);

        $data = array(); // Guardamos array con mensajes de error o exito.

        $userid = $postdata['conductor'];

        if ($postdata['tipoBusqueda'] == 1) {
            $query = "SELECT * FROM viaje WHERE conductor='$userid';";
            $res = $viajehdl->buscarViajes($query);

            if ($res) {
                $data['success'] = true;
                $data['viajes'] = $res;

                if ($res != 'nores') {
                    foreach ($data['viajes'] as $viaje) {
                        $viaje['fecha'] = dateToDmy($viaje['fecha']);
                    }
                }
            } else {
                $data['success'] = false;
                $data['error'] = '0'; // Error db
            }
        }

            // echo '<pre>';
            // print_r($postdata);

            // echo '</pre>';

            // Returns $data para mostrar mensajes de error.

            echo json_encode($data);
        // }

    // ******* X ******* //
