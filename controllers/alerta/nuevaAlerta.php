<?php
    session_start();
    require_once 'config/connect.php';
    require_once 'models/Alerta.php';

    $alertahdl = new Alerta($conn);

// ****** INSERTAR ALERTA ****** //

    /* Pendiente agregar validaciones:
        * Nro maximo de alertas *
        * Alertas con el mismo origen */

        // Obtener post y decodificar json
        $postdata = json_decode(file_get_contents('php://input'), true);

        $data = array(); // Guardamos array con datos que devolveremos al controlador de angular

        //  $fp = fopen('results.json', 'w');
        // // //fwrite($fp, json_encode($_FILES['type']));
        //  fwrite($fp, json_encode($postdata));
        //  fclose($fp);

        if (!empty($postdata)) {
            $postdata['origen'] = strtolower($postdata['origen']);
            $res = $alertahdl->nuevaAlerta($postdata['origen'], $postdata['idusuario'], $postdata['email']);

            if ($res) {
                $data['success'] = true;
            } else {
                $data['success'] = false;
            }
        }

        $data['postdt'] = $postdata; // Para comprobar datos enviados desde angular.

        echo json_encode($data);

    // ******* X ******* //
