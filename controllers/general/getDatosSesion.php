<?php

// Proporciona datos de la sesion a las aplicaciones de angular.

session_start();

$data = $_SESSION;
echo json_encode($data);
