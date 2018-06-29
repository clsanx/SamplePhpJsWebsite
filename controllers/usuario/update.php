<?php

    require_once 'config/connect.php';
    require_once 'models/Usuario.php';

    $userhdl = new Usuario($conn);

// ****** EDITAR DATOS USUARIO ****** //

        // Obtener post y decodificar json
        $postdata = json_decode(file_get_contents('php://input'), true);

        $data = array(); // Guardamos array de mensajes de error o exito.
        $errors = array(); // Array de mensajes de errores.

            // Verificacion backend campos required no vacios. Y definir mensajes de error.

            if (empty($postdata['nombre'])) {
                $errors['nombre'] = 'El campo nombre es obligatorio.';
            }

            if (empty($postdata['apellidos'])) {
                $errors['apellidos'] = 'El campo apellidos es obligatorio.';
            }

            if (!empty($errors)) {
                $data['errors'] = $errors;
                $data['success'] = false;
            } else { // Si no se ha registrado nigun error...
                //Los datos son validos y llamamos a la funcion nuevoUsuario()
                //Datos de nuevo usuario obtenidos desde registro.js

                        if (
                        $userhdl->updateUsuario(
                            $postdata['id'],
                            $postdata['nombre'],
                            $postdata['apellidos'],
                            $postdata['telefono'],
                            $postdata['poblacion']
                        )) {
                            // Si se ejecuta el query correctamente creamos mensaje de exito.
                            $data['success'] = true;
                            $data['message'] = 'Registro exitoso.';
                        }
            }

            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';

            // Returns $data para mostrar mensajes de error.

            echo json_encode($data);
        // }

    // ******* X ******* //
