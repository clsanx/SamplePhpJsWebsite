<?php

    require_once 'config/connect.php';
    require_once 'models/Usuario.php';

    $userhdl = new Usuario($conn);

// ****** CAMBIAR CONTRASEÑA ****** //

        // Obtener post y decodificar json
        $postdata = json_decode(file_get_contents('php://input'), true);

        $data = array(); // Guardamos array de mensajes de error o exito.
        //$errors = array(); // Array de mensajes de errores.

        if (!empty($postdata)) {
            $pass1 = md5($postdata['pass1']);
            $pass2 = md5($postdata['pass2']);
            
            $fp = fopen('pass111.json', 'w');
            fwrite($fp, json_encode($pass1));
            fclose($fp);

            $res = $userhdl->checkLogin($postdata['usuario'], $pass1);

        // $fp = fopen('postdata.json', 'w');
        // fwrite($fp, json_encode($postdata));
        // fclose($fp);
        
        // $fp = fopen('cp.json', 'w');
        // fwrite($fp, json_encode($res[0]));
        // fclose($fp);


            if ($res[0] == 'valid') {
                $cambio = $userhdl->cambiarPass($postdata['id'], $pass2);

                if ($cambio) {
                    $data['success'] = true;
                    $data['msg'] = 'Contraseña cambiada.';
                } else {
                    $data['success'] = false;
                    $data['error'] = 2;
                }
            } else {
                $data['success'] = false;
                $data['error'] = 1;
            }
        } else {
            $data['success'] = false;
            $data['error'] = 0;
        }

            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';

            echo json_encode($data);
        // }

    // ******* X ******* //
