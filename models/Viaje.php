<?php

class Viaje
{
    private $conn;

    // Constructor por defecto
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Buscar viaje.
    public function buscarViajes($query)
    {
        $conn = $this->conn;
        $sql = $conn->prepare($query);

        try {
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $res = $sql->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $res = 'nores';
            }

            return $res;
        } catch (PDOException $e) {
            die('Error: '.$e->getMessage());

            return false;
        }
    }

    // get Plazas
    public function getPlazas($viajeid)
    {
        $conn = $this->conn;
        $sql = $conn->prepare("SELECT plazas FROM viaje WHERE id='$viajeid';");

        try {
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $res = $sql->fetch();
            } else {
                $res = 'nores';
            }

            return $res;
        } catch (PDOException $e) {
            die('Error: '.$e->getMessage());

            return false;
        }
    }

    // update Plazas
    public function updatePlazas($plazas, $viajeid)
    {
        $conn = $this->conn;
        $sql = $conn->prepare("UPDATE viaje SET plazas='$plazas' WHERE id='$viajeid';");

        try {
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $res = $sql->fetch();
            } else {
                $res = 'nores';
            }

            return $res;
        } catch (PDOException $e) {
            die('Error: '.$e->getMessage());

            return false;
        }
    }

    //Publicar viaje.
    public function nuevoViaje($origen, $ptoencuentro, $fecha, $hora, $plazas, $conductor, $paradas, $coche)
    {
        $conn = $this->conn;
        $sql = $conn->prepare("INSERT INTO `viaje`(`origen`, `ptoencuentro`, `fecha`, `hora`, `plazas`, `conductor`, `paradas`, `coche`)
         VALUES ('$origen','$ptoencuentro','$fecha','$hora','$plazas','$conductor','$paradas','$coche');");

        try {
            $sql->execute();
            $res = $conn->lastInsertId();
            //$res = 62;

            return $res;
        } catch (PDOException $e) {
            die('Error: '.$e->getMessage());

            return false;
        }
    }

    // Obtener array datos de viaje
    public function getViaje($viajeid)
    {
        $conn = $this->conn;
        $sql = $conn->prepare("SELECT * FROM viaje WHERE id = '$viajeid'");

        try {
            $res = $sql->execute();
            if ($sql->rowCount() > 0) {
                $res = $sql->fetch(PDO::FETCH_ASSOC);
            } else {
                $res = 'Viaje no encontrado.';
            }

            return $res;
        } catch (PDOException $e) {
            die('Error: '.$e->getMessage());

            return false;
        }
    }
}
