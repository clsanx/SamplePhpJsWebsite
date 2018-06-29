<?php
    session_start();
    require_once 'config/connect.php';
    require_once 'models/Usuario.php';
    require_once 'sendMail/send.php';

    $userhdl = new Usuario($conn);

// ****** REGISTRO NUEVO USUARIO ****** //

        // Obtener post y decodificar json
        $postdata = json_decode(file_get_contents('php://input'), true);

        $data = array(); // Guardamos array de mensajes de error o exito.
        $errors = array(); // Array de mensajes de errores.
        $emailhash = md5($postdata['email']);

        // Si post no esta vacio..
        // if (!empty($postdata)) {
            // echo '<pre>';
            //     print_r($postdata);
            // echo '</pre>';

             $fp = fopen('results.json', 'w');
            // //fwrite($fp, json_encode($_FILES['type']));
             fwrite($fp, json_encode($hash));
             fclose($fp);

            $formvalid = true;

            // Verificacion backend campos required no vacios. Y definir mensajes de error.

            // if (empty($postdata['usuario'])) {
            //     $errors['usuario'] = 'El campo usuario es obligatorio.';
            // }

            // if (empty($postdata['contrasena'])) {
            //     $errors['contrasena'] = 'El campo contrasena es obligatorio.';
            // }

            // if (empty($postdata['nombre'])) {
            //     $errors['nombre'] = 'El campo nombre es obligatorio.';
            // }

            // if (empty($postdata['apellidos'])) {
            //     $errors['apellidos'] = 'El campo apellidos es obligatorio.';
            // }

            // if (empty($postdata['email'])) {
            //     $errors['email'] = 'El campo email es obligatorio.';
            // }

            if (!empty($errors)) {
                $data['errors'] = $errors;
                $formvalid = false;
                $data['success'] = false;
            } else { // Si no se ha registrado nigun error...
                //Los datos son validos y llamamos a la funcion nuevoUsuario()
                //Datos de nuevo usuario obtenidos desde registro.js
                    $pass = md5($postdata['contrasena']);

                if (
                        $userhdl->nuevoUsuario(
                            $postdata['usuario'],
                            $pass,
                            $postdata['nombre'],
                            $postdata['apellidos'],
                            $postdata['email'],
                            $postdata['telefono'],
                            $postdata['poblacion'],
                            $postdata['modulo'],
                            $postdata['genero'],
                            'img/icons/usericon01.png'
                        )) {
                    // Si se ejecuta el query correctamente creamos mensaje de exito.
                            $data['success'] = true;
                    $data['message'] = 'Registro exitoso.';

                    if ($res = $userhdl->getId($postdata['usuario'])) {
                        // $_SESSION['usuario'] = $postdata['usuario']; // Usuario para la sesión
                                $id = $res[0];
                                // $_SESSION['nombre'] = $postdata['nombre'];
                                // $_SESSION['poblacion'] = $postdata['poblacion'];

                                //$data['session'] = $_SESSION;

                                $msg = '<center>
                                         <p><span style="font-size:24px; color:darkgray; font-family:impact;">Hola '.$postdata['nombre'].', bienvenido a </span><img style="width:120px; height:40px;" src="https://reto3-clsantos.c9users.io/img/logo_z.png"><br>
                                         <span style="font-size:18px; font-family:impact;">Para verificar tu cuenta haz click en el siguiente enlace: 
                                         <a href="https://reto3-clsantos.c9users.io/verificar.php?h='.$emailhash.'&id='.$id.'">
                                            Verificar cuenta</a></span>
                                        </center>';
                        $sendmail->sendMail($postdata['email'], $msg);
                    } else {
                        $data['error'] = 'error id';
                    }
                }
            }

            // echo '<pre>';
            // print_r($hash);
            // echo '</pre>';

            // Returns $data para mostrar mensajes de error.

            echo json_encode($data);
        // }

    // ******* X ******* //
