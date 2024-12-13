<?php
include_once('conexion.php');

class UsuarioPrivilegio
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function obtenerPrivilegiosUsuario($login)
    {
        $db = $this->conexion->conectarBD(); // Conectar a la base de datos

        // Preparar la consulta para evitar inyección SQL
        $sql = "SELECT P.NombrePrivilegio AS labelPrivilegio, 
                    P.pathPrivilegio, P.iconPrivilegio
                    FROM usuario U
                    INNER JOIN usuarioprivilegio UP 
                    ON U.UsuarioID = UP.UsuarioID
                    INNER JOIN privilegio P ON P.PrivilegioID = UP.PrivilegioID
                    WHERE U.NombreUsuario = ?";

        $stmt = $db->prepare($sql); // Preparar la consulta
        if (!$stmt) {
            die("Error al preparar la consulta: " . $db->error);
        }

        $stmt->bind_param('s', $login); // Enlazar el parámetro
        $stmt->execute(); // Ejecutar la consulta
        $result = $stmt->get_result(); // Obtener los resultados

        if (!$result) {
            die("Error en la consulta: " . $db->error);
        }

        $fila = [];
        while ($row = $result->fetch_assoc()) {
            $fila[] = $row;
        }

        $this->conexion->desConectarBD(); // Desconectar de la base de datos
        return $fila;
    }
}

