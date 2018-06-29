<?php

    require_once 'config/connect.php';
    require_once 'models/Usuario.php';

    $userhdl = new Usuario($conn);

// ****** COMPROBAR SI USUARIO EXISTE ****** //

        // Obtener post y decodificar json
        $postdata = file_get_contents('php://input');
        $request = json_decode($postdata);
        $data = $request->data;

        echo $userhdl->emailExiste($data);

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';

    // ******* X ******* //
