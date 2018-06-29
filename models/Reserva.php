<?php

class Reserva
{
    private $conn;

    // Constructor por defecto
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // update Plazas
    public function estadoReserva($idRes, $estado)
    {
        $conn = $this->conn;
        $sql = $conn->prepare("UPDATE reserva SET estado='$estado' WHERE id='$idRes';");

        try {
            $sql->execute();

            return true;
        } catch (PDOException $e) {
            die('Error: '.$e->getMessage());

            return false;
        }
    }

    // Buscar reserva.
    public function getReservas($query)
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

    //Reservar
    public function nuevaReserva($idUsuario, $idViaje)
    {
        $conn = $this->conn;
        $sql = $conn->prepare("INSERT INTO `reserva`(`idUsuario`, `idViaje`, `estado`)
         VALUES ('$idUsuario','$idViaje','pendiente');");

        try {
            $sql->execute();

            return true;
        } catch (PDOException $e) {
            die('Error: '.$e->getMessage());

            return false;
        }
    }

    //Eliminar reserva
    public function eliminarReserva($id)
    {
        $conn = $this->conn;
        $sql = $conn->prepare("DELETE FROM `reserva` WHERE id='$id';");

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
