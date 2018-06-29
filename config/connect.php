<?php

$servername = 'localhost';
$dbname = 'db_reto3';

//  ** sentora **
//$username = 'admin';
//$password = 'Taldea316';

//  ** localhost **
//$username = 'root';
//$password = '';

//  ** CLOUD9 **
$username = 'clsantos';
$password = '';

// Objeto PDO con UTF-8
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

//try {
//    $conn = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
//    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
//} catch (PDOException $e) {
//    die("Connection failed: " . $e->getMessage());
//}

?>