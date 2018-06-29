<?php

class Alerta
{
    private $conn;

    // Constructor por defecto
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Obtener todas las alertas de un usuario.
    public function getAlertas($query)
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

    //Nueva Alerta
    public function nuevaAlerta($origen, $idusuario, $email)
    {
        $conn = $this->conn;
        $sql = $conn->prepare("INSERT INTO `alerta`(`origen`, `idusuario`, `email`)
         VALUES ('$origen', '$idusuario', '$email');");

        try {
            $sql->execute();

            return true;
        } catch (PDOException $e) {
            die('Error: '.$e->getMessage());

            return false;
        }
    }

    //Eliminar Alerta
    public function eliminarAlerta($id)
    {
        $conn = $this->conn;
        $sql = $conn->prepare("DELETE FROM alerta WHERE id='$id';");

        try {
            $sql->execute();

            return true;
        } catch (PDOException $e) {
            die('Error: '.$e->getMessage());

            return false;
        }
    }
}
