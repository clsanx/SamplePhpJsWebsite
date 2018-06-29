<?php
    session_start();
    require_once 'config/connect.php';
    require_once 'models/Viaje.php';
    require_once 'models/Reserva.php';
    require_once 'models/Mensaje.php';

    $reservahdl = new Reserva($conn);
    $mensajehdl = new Mensaje($conn);
    $viajehdl = new Viaje($conn);

    // ****** RESERVAR ****** //

        // Obtener post y decodificar json
        $postdata = json_decode(file_get_contents('php://input'), true);

        $data = array(); // Guardamos array de mensajes de error o exito.
        //$errors = array(); // Array de mensajes de errores.

         $fp = fopen('post.json', 'w');

         fwrite($fp, json_encode($postdata));
         fclose($fp);

        if (!empty($postdata)) {
            if ($postdata['valor']) { // CASO ACEPTAR RESERVA
                $plazas = $viajehdl->getPlazas($postdata['idViaje']); // Obtener plazas

                //$data['viaje'] = $postdata['idViaje'];
                //$data['plazas'] = $plazas;
            if ($plazas > 0) {
                $plazas = (int) $plazas;
                $plazas = $plazas - 1; // Nuevo valor plazas
                if ($viajehdl->updatePlazas($plazas, $postdata['idViaje'])) {
                    if ($reservahdl->estadoReserva($postdata['idRes'], 'aceptada')) {
                        $mensajehdl->updateRes($postdata['idMensaje'], 1);
                        $data['success'] = true;
                        $data['msg'] = 'Reserva aceptada.';

                        $mensajehdl->respuestaReserva($postdata['idRem'], $postdata['idDest'], $postdata['idViaje'], 'normal', $_SESSION['tlf']);
                    } else {
                        $data['success'] = false;
                        $data['error'] = 'Error al cambiar estado de reserva';
                    }
                } else {
                    $data['success'] = false;
                    $data['error'] = 'Error al actualizar plazas';
                }
            } else {
                $data['success'] = true;
                $data['msg'] = 'No hay plazas disponibles';
            }
            } else { // CASO RECHAZAR
                if ($reservahdl->estadoReserva($postdata['idRes'], 'Rechazada')) {
                    $mensajehdl->updateRes($postdata['idMensaje'], 2);
                    $data['success'] = true;
                    $data['msg'] = 'Reserva rechazada';
                } else {
                    $data['success'] = false;
                    $data['error'] = 'Error al cambiar estado de reserva';
                }
            }
        } else {
            $data['success'] = false;
            $data['error'] = 'Empty postdata';
        }
            echo json_encode($data);
        // }

    // ******* X ******* //
