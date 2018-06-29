<?php

class Opinion
{
    private $conn;

    // Constructor por defecto
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Obtener todos los mensajes de un usuario.
    public function getOpiniones($query)
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

    //Nueva Opinion
    public function nuevaOpinion($idOpinado, $idOpinador, $idViaje, $comentario, $valoracion, $nombreOpinador)
    {
        $conn = $this->conn;
        $sql = $conn->prepare("INSERT INTO `opinion`(`idOpinado`, `idOpinador`, `idViaje`, `comentario`, `valoracion`, `nombreOpinador`)
         VALUES ('$idOpinado', '$idOpinador', '$idViaje', '$comentario', '$valoracion', '$nombreOpinador');");

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

    //Aceptar reserva

    //Rechazar reserva
}
