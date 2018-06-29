<?php

// require_once '../../config/connect.php'; // Conexión a base de datos

// $servername = 'localhost';
// $dbname = 'db_reto3';

// //  ** CLOUD9 **
// $username = 'clsantos';
// $password = '';

// // Objeto PDO con UTF-8
// try {
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     die('Connection failed: '.$e->getMessage());
// }

//         $dir_subida = 'controllers/usuario/img/';
//         $fichero_subido = $dir_subida.basename($_FILES['archivo1']['name']);

//         if (move_uploaded_file($_FILES['archivo1']['tmp_name'], $fichero_subido)) {
//             $sql = $conn->prepare("INSERT INTO `usuario`(`imagen_perfil`) VALUES ($fichero_subido);");

//             try {
//                 $sql->execute();

//                 return true;
//             } catch (PDOException $e) {
//                 die('Error: '.$e->getMessage());

//                 return false;
//             }
//         } else {
//             echo "¡Posible ataque de subida de ficheros!\n";
//             echo $fichero_subido;
//         }

//         echo json_encode($_FILES);
require_once 'config/connect.php'; // Conexión a base de datos

$dir_subida = 'img/';
$fichero_subido = $dir_subida.basename($_FILES['archivo1']['name']);

// public function insertarImagen($imagen_perfil)
//     {
        if (move_uploaded_file($_FILES['archivo1']['tmp_name'], $fichero_subido)) {
            // $conn = $this->conn;
            $sql = $conn->prepare("INSERT INTO `usuario`(`imagen_perfil`) VALUES ('$fichero_subido');");

            try {
                $sql->execute();

                return true;
            } catch (PDOException $e) {
                die('Error: '.$e->getMessage());

                return false;
            }
        } else {
            // echo "¡Posible ataque de subida de ficheros!\n";
        }
        echo json_encode($_FILES);
    // }

// echo '<pre>';
// if (move_uploaded_file($_FILES['archivo1']['tmp_name'], $fichero_subido)) {

// } else {
//     // echo "¡Posible ataque de subida de ficheros!\n";
// }

// echo 'Más información de depuración:';
// echo json_encode($_FILES);

// echo '</pre>';;
