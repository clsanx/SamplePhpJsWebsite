<?php

class Usuario
{
    private $conn;

    // Constructor por defecto
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // funcion para registrar
    public function nuevoUsuario($usuario, $contrasena, $nombre, $apellidos, $email, $telefono, $poblacion, $modulo, $genero, $img)
    {
        $conn = $this->conn;
        $sql = $conn->prepare("INSERT INTO `usuario`(`usuario`, `contrasena`, `nombre`, `apellidos`, `email`, `telefono`, `poblacion`, `modulo`, `genero`, `imagen_perfil`) 
        VALUES ('$usuario','$contrasena','$nombre','$apellidos','$email','$telefono','$poblacion','$modulo','$genero', '$img');");

        try {
            $sql->execute();

            return true;
        } catch (PDOException $e) {
            die('Error: '.$e->getMessage());

            return false;
        }
    }

    // Comprobar si usuario existe.
    public function usuarioExiste($user)
    {
        $conn = $this->conn;
        $sql = $conn->prepare("SELECT usuario FROM usuario WHERE usuario = '$user'");

        try {
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die('Error: '.$e->getMessage());

            return false;
        }
    }

    //Comprobacion del email
    public function emailExiste($email)
    {
        $conn = $this->conn;
        $sql = $conn->prepare("SELECT email FROM usuario WHERE email = '$email'");

        try {
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die('Error: '.$e->getMessage());

            return false;
        }
    }

    // Login
    public function checkLogin($user, $pass)
    {
        $conn = $this->conn;
        $sql = $conn->prepare("SELECT * FROM usuario WHERE ((usuario = '$user') AND (contrasena = '$pass') AND (activado = '1') AND (verificado = '1'));");

        try {
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $res = $sql->fetch(PDO::FETCH_ASSOC);

                return array('valid', $res);
            } else {
                return array('invalid');
            }
        } catch (PDOException $e) {
            die('Error: '.$e->getMessage());

            return false;
        }
    }

    // Obtener Id
    public function getId($user)
    {
        $conn = $this->conn;
        $sql = $conn->prepare("SELECT id FROM usuario WHERE usuario = '$user'");

        try {
            $res = $sql->execute();
            if ($sql->rowCount() > 0) {
                //$res = $sql->fetch(PDO::FETCH_ASSOC);
                $res = $sql->fetch();
            } else {
                $res = 'Usuario no encontrado.';
            }

            return $res;
        } catch (PDOException $e) {
            die('Error: '.$e->getMessage());

            return false;
        }
    }

    // Obtener array datos de usuario
    public function getUsuario($userid)
    {
        $conn = $this->conn;
        $sql = $conn->prepare("SELECT * FROM usuario WHERE id = '$userid'");

        try {
            $res = $sql->execute();
            if ($sql->rowCount() > 0) {
                $res = $sql->fetch(PDO::FETCH_ASSOC);
            } else {
                $res = 'Usuario no encontrado.';
            }

            return $res;
        } catch (PDOException $e) {
            die('Error: '.$e->getMessage());

            return false;
        }
    }

    // Obtener array datos de usuario
    public function updateUsuario($userid, $nombre, $apellidos, $telefono, $poblacion)
    {
        $conn = $this->conn;
        $sql = $conn->prepare("UPDATE usuario SET 
            nombre='$nombre',
            apellidos='$apellidos',
            telefono='$telefono',
            poblacion='$poblacion' 
            WHERE id = '$userid'");

        try {
            $res = $sql->execute();

            return true;
        } catch (PDOException $e) {
            die('Error: '.$e->getMessage());

            return false;
        }
    }

    // Cambiar imagen de perfil
    public function updateImgPerfil($userid, $ruta)
    {
        $conn = $this->conn;
        $sql = $conn->prepare("UPDATE usuario SET 
            imagen_perfil='$ruta' WHERE id = '$userid'");

        try {
            $res = $sql->execute();

            return true;
        } catch (PDOException $e) {
            die('Error: '.$e->getMessage());

            return false;
        }
    }

    // Cambiar contraseña
    public function cambiarPass($userid, $pass)
    {
        $conn = $this->conn;
        $sql = $conn->prepare("UPDATE usuario SET 
            contrasena='$pass' WHERE id = '$userid'");

        try {
            $res = $sql->execute();

            return true;
        } catch (PDOException $e) {
            die('Error: '.$e->getMessage());

            return false;
        }
    }

    public function verificarUsuario($userid)
    {
        $conn = $this->conn;
        $sql = $conn->prepare("UPDATE usuario SET 
            verificado=1 WHERE id = '$userid'");

        try {
            $res = $sql->execute();

            return true;
        } catch (PDOException $e) {
            die('Error: '.$e->getMessage());

            return false;
        }
    }

    public function getX($query)
    {
        $conn = $this->conn;
        $sql = $conn->prepare($query);

        try {
            $res = $sql->execute();
            if ($sql->rowCount() > 0) {
                $res = $sql->fetch(PDO::FETCH_ASSOC);
            } else {
                $res = 'no';
            }

            return $res;
        } catch (PDOException $e) {
            die('Error: '.$e->getMessage());

            return false;
        }
    }
}
