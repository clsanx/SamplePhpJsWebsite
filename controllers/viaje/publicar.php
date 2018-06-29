<?php
    session_start();
    require_once 'config/connect.php';
    require_once 'models/Viaje.php';
    require_once 'models/Alerta.php';
    require_once 'models/Mensaje.php';
    require_once 'php_functions/dateFormat.php';
    require_once 'sendMail/send.php';

    $viajehdl = new Viaje($conn);
    $alertahdl = new Alerta($conn);
    $mensajehdl = new Mensaje($conn);

    // ****** PUBLICAR VIAJE ****** //

        // Obtener post y decodificar json
        $postdata = json_decode(file_get_contents('php://input'), true);

        $data = array(); // Guardamos array de mensajes de error o exito.
        //$errors = array(); // Array de mensajes de errores.

        if (!empty($postdata)) {
            $fecha = dateToYmd($postdata['fecha']);

            $res = $viajehdl->nuevoViaje(
                    $postdata['origen'],
                    $postdata['ptoencuentro'],
                    $fecha,
                    $postdata['hora'],
                    $postdata['plazas'],
                    $_SESSION['id'],
                    $postdata['paradas'],
                    $postdata['coche']);

            if (!$res) {
                $data['success'] = false;
            } else {
                $data['success'] = true;

                $idviaje = $res;

                $origen = $postdata['origen'];

                //Obtener Alertas para ese origen
                $query = "SELECT * FROM alerta WHERE origen='$origen';";
                $alertas = $alertahdl->getAlertas($query);

                if ($alertas != 'nores') {
                    $fp = fopen('alertas.json', 'w');
                    fwrite($fp, json_encode($postdata));
                    fclose($fp);

                    // ENVIAR CORREO ALERTA, CREAR MENSAJE TIPO ALERTA
                    foreach ($alertas as $alerta) {
                        $msg = '<center>
                                    <p><img style="width:120px; height:40px;" src="https://reto3-clsantos.c9users.io/img/logo_z.png"><br>
                                    <span style="font-size:18px; font-family:impact;">Han publicado un viaje que parte desde '.$origen.'.
                                    <a href="https://reto3-clsantos.c9users.io/viaje.php?v='.$idviaje.'">
                                    Ver</a></span>
                                </center>';

                        $msgalerta = '<span>Han publicado un viaje que parte desde <a class="capitalize"> '.$origen.'.</a>
                                    <a class="btn btn-info btn-sm btn-responsive" href="https://reto3-clsantos.c9users.io/viaje.php?v='.$idviaje.'">
                                    Ver</a></span>';

                        $sendmail->sendMail($alerta['email'], $msg);
                        $mensajehdl->nuevoMensajeAlerta(1, 'Alertas Z-Car', $alerta['idusuario'], $msgalerta, 'alerta');
                    }
                }
            }

            $data['postdt'] = $postdata;
        } else {
            $data['error'] = 'Ha ocurrido un error.';
        }

            // echo '<pre>';
            // print_r($postdata);

            // echo '</pre>';

            // Returns $data para mostrar mensajes de error.
            echo json_encode($data);
        // }

    // ******* X ******* //
