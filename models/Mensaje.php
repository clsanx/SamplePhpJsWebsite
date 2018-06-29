<?php

class Mensaje
{
    private $conn;

    // Constructor por defecto
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Obtener todos los mensajes de un usuario.
    public function getMensajes($userid)
    {
        $conn = $this->conn;
        $sql = $conn->prepare("SELECT * FROM mensaje WHERE idDest='$userid' ORDER BY fc DESC;");

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

    //Reservar
    public function nuevoMensajeSolicitud($idRem, $nombreRem, $idConductor, $idViaje, $idReserva, $tipo)
    {
        $conn = $this->conn;
        $sql = $conn->prepare("INSERT INTO `mensaje`(`idRem`, `nombreRem`, `idDest`, `idViaje`, `idReserva`, `tipo`)
         VALUES ('$idRem', '$nombreRem', '$idConductor', '$idViaje', '$idReserva', '$tipo');");

        try {
            $sql->execute();

            return true;
        } catch (PDOException $e) {
            die('Error: '.$e->getMessage());

            return false;
        }
    }

    // Mensaje Alerta
    public function nuevoMensajeAlerta($idRem, $nombreRem, $idDest, $msg, $tipo)
    {
        $conn = $this->conn;
        $sql = $conn->prepare("INSERT INTO `mensaje`(`idRem`, `nombreRem`, `idDest`, `mensaje`, `tipo`)
         VALUES ('$idRem', '$nombreRem', '$idDest', '$msg', '$tipo');");

        try {
            $sql->execute();

            return true;
        } catch (PDOException $e) {
            die('Error: '.$e->getMessage());

            return false;
        }
    }

    // Respuesta Reserva
    public function respuestaReserva($idRem, $idDest, $idViaje, $tipo, $msg)
    {
        $conn = $this->conn;
        $sql = $conn->prepare("INSERT INTO `mensaje`(`idRem`, `idDest`, `idViaje`, `tipo`, `mensaje`)
         VALUES ('$idRem', '$idDest', '$idViaje', '$tipo', '$msg');");

        try {
            $sql->execute();

            return true;
        } catch (PDOException $e) {
            die('Error: '.$e->getMessage());

            return false;
        }
    }

    // update res
    /* Para saber si la solicitud ha tenido respuesta
        * 0 Sin responder.
        * 1 respuesta afirmativa
        * 2 respuesta negativa

    */

    public function updateRes($id, $resp)
    {
        $conn = $this->conn;
        $sql = $conn->prepare("UPDATE mensaje SET res='$resp' WHERE id='$id';");

        try {
            $sql->execute();

            return true;
        } catch (PDOException $e) {
            die('Error: '.$e->getMessage());

            return false;
        }
    }

    //Aceptar reserva

    //Rechazar reserva
}
