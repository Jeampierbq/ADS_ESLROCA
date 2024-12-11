<?php
include_once('conexion.php');

class Usuario
{
    public function validarLogin($login)
    {
        $sql = "SELECT login FROM usuario WHERE login = '$login'";
        $conexion = Conexion::conectarBD();
        $respuesta = $conexion->query($sql);

        if (!$respuesta) {
            die("Error en la consulta: " . $conexion->error);
        }

        $numFilas = $respuesta->num_rows;
        Conexion::desConectarBD();

        return $numFilas === 1 ? 1 : 0;
    }

    public function validarPassword($login, $password)
    {
        $sql = "SELECT login FROM usuario WHERE login = '$login' AND password ='$password'";
        $conexion = Conexion::conectarBD();
        $respuesta = $conexion->query($sql);

        if (!$respuesta) {
            die("Error en la consulta: " . $conexion->error);
        }

        $numFilas = $respuesta->num_rows;
        Conexion::desConectarBD();

        return $numFilas === 1 ? 1 : 0;
    }
}
?>
