<?php
    session_start();
    require_once 'config/connect.php';
    require_once 'models/Opinion.php';

    $opinionhdl = new Opinion($conn);

// ****** OBTENER MENSAJES DE USUARIO ****** //

        // Obtener post y decodificar json
        $postdata = json_decode(file_get_contents('php://input'), true);

        //  $fp = fopen('resid.json', 'w');
        // // //fwrite($fp, json_encode($_FILES['type']));
        //  fwrite($fp, json_encode($postdata));
        //  fclose($fp);

        $data = array(); // Guardamos array con datos que devolveremos al controlador de angular

        if (!empty($postdata)) {
            $query = "SELECT * FROM opinion WHERE idOpinado = '$postdata';";
            $data['opiniones'] = $opinionhdl->getOpiniones($query);

            if ($data['opiniones']) {
                $data['success'] = true;
            } else {
                $data['success'] = false;
            }
        }

        echo json_encode($data);

    // ******* X ******* //
