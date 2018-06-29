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

        $data = array(); // Guardamos array con mensajes de error o exito.

        // Formatear fecha (d-m-Y) to (Y-m-d)
        if (!empty($postdata['fecha'])) {
            $fecha = dateToYmd($postdata['fecha']);
            $data['fechaYmd'] = $fecha;
        }

        // Buscar con campos vacios -> Muestra viajes mas recientes.
        $query = 'SELECT * FROM viaje ORDER BY fecha DESC LIMIT 10';

        // Buscar con todos los campos llenos -> Muestra viajes correspondientes ordenados por fecha de creacion del viaje.
        if ((!empty($postdata['origen'])) && (!empty($postdata['fecha'])) && (!empty($postdata['hora']))) {
            $query = "SELECT * FROM viaje WHERE (origen LIKE '%".$postdata['origen']."%') 
                AND (fecha = '".$fecha."') AND (hora = '".$postdata['hora']."') 
                ORDER BY fcreacion DESC LIMIT 10";

        // Buscar con origen y fecha -> Muestra viajes correspondientes ordenados por hora.
        } elseif ((!empty($postdata['origen'])) && (!empty($postdata['fecha']))) {
            $query = "SELECT * FROM viaje WHERE (origen LIKE '%".$postdata['origen']."%') 
                AND (fecha = '".$fecha."') ORDER BY hora LIMIT 10";

        // Buscar con origen -> Muestra viajes correspondientes ordenados por fecha mas reciente.
        } elseif ((!empty($postdata['origen'])) && (empty($postdata['fecha']))) {
            $query = "SELECT * FROM viaje WHERE (origen LIKE '%".$postdata['origen']."%') 
                ORDER BY fecha DESC LIMIT 10";

        // Buscar solo con fecha
        } elseif ((empty($postdata['origen'])) && (!empty($postdata['fecha'])) && (empty($postdata['hora']))) {
            $query = "SELECT * FROM viaje WHERE (fecha = '".$fecha."') 
                ORDER BY hora LIMIT 10";
        }

            if (!empty($query)) {
                if ($listaviajes = $viajehdl->buscarViajes($query)) {
                    // Obtenemos array con viajes encontrados.
                    // De momento buscamos 10 viajes maximo.
                    /* Pendiente implementar paginacion a la tabla para
                    * poder mostrar lista completa de viajes*/

                    $data['success'] = true;
                    $data['postdt'] = $postdata; // Datos que recibimos desde angular (para debug)
                    $data['qy'] = $query; //Query enviado (para debug)

                    if ($listaviajes != 'nores') { // Si se ha conseguido al menos un viaje
                        // Por cada viaje obtenemos los datos de su conductor
                        foreach ($listaviajes as $viaje) {
                            if ($usuariodt = $userhdl->getUsuario($viaje['conductor'])) {
                                $viaje['usNombre'] = $usuariodt['nombre'];
                                $viaje['usNivel'] = $usuariodt['nivel'];
                                $viaje['usReputacion'] = $usuariodt['reputacion'];
                                $viaje['usImg'] = $usuariodt['imagen_perfil'];
                                $viaje['fecha'] = dateToDmy($viaje['fecha']);

                                // Vamos rellenando array con datos de viaje + datos de conductor
                                $data['viajes'][] = $viaje;
                            }
                        }
                    } else {
                        $data['viajes'] = $listaviajes;
                    }
                } else {
                    $data['success'] = false;
                }
            }

            // echo '<pre>';
            // print_r($postdata);

            // echo '</pre>';

            // Returns $data para mostrar mensajes de error.

            echo json_encode($data);
        // }

    // ******* X ******* //
