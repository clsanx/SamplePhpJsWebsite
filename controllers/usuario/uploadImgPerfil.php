<?php
    require_once 'config/connect.php';
    require_once 'models/Usuario.php';

    $userhdl = new Usuario($conn);

    $filename = $_FILES['file']['name']; // Archivo de imagen
    $meta = $_POST;
    $folder = '../../'.$meta['rutaimg']; // Carpeta de usuario
    $destination = $folder.'/'.$filename; // Ruta donde se guardara la imagen
    $urldb = $meta['rutaimg'].'/'.$filename; // Ruta que guardamos en la base de datos

    $data = array(); // Respuesta a angular

    //$destination = $meta['rutaimg'].$filename;

    // Si la carpeta de usuario no existe procedemos a crearla...
    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }

    /* AGREGAR VALIDACIONES DE SEGURIDAD */
    /* PENDIENTE AGREGAR VALIDACIONES BACKEND, TIPO DE ARCHIVO, TAMAÑO, ETC. */
    /* ¿Se permitira tener varias imagenes subidas? ¿Solo una? ¿Borrar la antigua al cambiar? */

    // Upload imagen
    if (move_uploaded_file($_FILES['file']['tmp_name'], $destination)) {
        $data['upload_success'] = true;

          //Cambiar url en la base de datos
          $data['urldb_success'] = $userhdl->updateImgPerfil($meta['userid'], $urldb);
        $data['imgurl'] = $urldb;
    } else {
        $data['upload_success'] = false;
    }

    // Comprobación datos de imagen
    // $fp = fopen('results.json', 'w');
    // //fwrite($fp, json_encode($_FILES['type']));
    // fwrite($fp, json_encode($data));
    // fclose($fp);

    echo json_encode($data);
