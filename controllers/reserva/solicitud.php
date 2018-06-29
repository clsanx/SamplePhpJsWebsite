<?php
    session_start();
    require_once 'config/connect.php';
    require_once 'models/Reserva.php';
    require_once 'models/Mensaje.php';

    $reservahdl = new Reserva($conn);
    $mensajehdl = new Mensaje($conn);

    // ****** PUBLICAR VIAJE ****** //

        // Obtener post y decodificar json
        $postdata = json_decode(file_get_contents('php://input'), true);

        $data = array(); // Guardamos array de mensajes de error o exito.
        //$errors = array(); // Array de mensajes de errores.

        // Comprobación datos
        //  $fp = fopen('results.json', 'w');
        // // //fwrite($fp, json_encode($_FILES['type']));
        //  fwrite($fp, json_encode($postdata));
        //  fclose($fp);

         $idPasajero = $postdata['idPasajero'];
         $idViaje = $postdata['idViaje'];

        $query = "SELECT id FROM reserva WHERE idUsuario='$idPasajero' AND idViaje='$idViaje';";

        if (($reservahdl->getReservas($query)) == 'nores') {
            if ($reservahdl->nuevaReserva(
                    $idPasajero,
                    $idViaje
                    )) {
                $data['success'] = true;

                $res = $reservahdl->getReservas($query);
                $idReserva = $res[0]['id'];

                $data['idres'] = $idReserva;

                $data['msg_success'] = $mensajehdl->nuevoMensajeSolicitud(
                        $postdata['idPasajero'],
                        $postdata['nombrePasajero'],
                        $postdata['idConductor'],
                        $idViaje,
                        $idReserva,
                        'solicitud');
            } else {
                $data['success'] = false;
                $data['error'] = 0; // Error con la bd
            }
        } else {
            $data['success'] = false;
            $data['error'] = 1; // El usuario ya tiene una reserva en este viaje.
        }
            //$data['postdt'] = $postdata;

            // echo '<pre>';
            // print_r($postdata);

            // echo '</pre>';

            // Returns $data para mostrar mensajes de error.

            echo json_encode($data);
        // }

    // ******* X ******* //
