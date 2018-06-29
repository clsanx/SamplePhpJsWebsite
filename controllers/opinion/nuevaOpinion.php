<?php
    session_start();
    require_once 'config/connect.php';
    require_once 'models/Opinion.php';
    require_once 'models/Mensaje.php';

    $opinionhdl = new Opinion($conn);
    $mensajehdl = new Mensaje($conn);

// ****** NUEVA OPINION ****** //

        // Obtener post y decodificar json
        $postdata = json_decode(file_get_contents('php://input'), true);

        $data = array(); // Guardamos array con datos que devolveremos al controlador de angular

         $fp = fopen('postd.json', 'w');
         fwrite($fp, json_encode($postdata));
         fclose($fp);

        if (!empty($postdata)) {
            $res = $opinionhdl->nuevaOpinion($postdata['idOpinado'], $postdata['idOpinador'], $postdata['idViaje'], $postdata['comentario'], $postdata['valoracion'], $postdata['nombreOpinador']);

            if ($res) {
                $data['success'] = true;
                $mensajehdl->updateRes($postdata['idMsj'], '1');
            } else {
                $data['success'] = false;
            }
        }

        $data['postdt'] = $postdata; // Para comprobar datos enviados desde angular.

        echo json_encode($data);

    // ******* X ******* //
