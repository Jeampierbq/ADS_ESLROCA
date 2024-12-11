<?php
    class controlAutenticarUsuario
    {
        public function verificarUsuario($login,$password)
        {
            include_once('../modelo/usuario.php');
            $objUsuario = new usuario();
            $respuesta = $objUsuario -> validarLogin($login);
            if($respuesta)
            {
                $respuesta = $objUsuario -> validarPassword($login,$password);
                if($respuesta)
                {
                    
                        include_once('../modelo/usuarioPrivilegio.php');
                        include_once('screenBienvenida.php');
                        $objUsuarioPrivilegio = new usuarioPrivilegio();
                        $objBienvenida = new screenBienvenida();
                        $listaPrivilegios = $objUsuarioPrivilegio -> obtenerPrivilegiosUsuario($login);
                        //print_r($listaPrivilegios);
                        $_SESSION['login'] = $login;
                        $objBienvenida -> screenBienvenidaShow($listaPrivilegios);
                    
                }
                else
                {
                    include_once('../shared/screenMensajeSistema.php'); 
                    $objMensaje = new screenMensajeSistema();
                    $objMensaje -> screenMensajeSistemaShow("Contraseña Incorrecta","<a href='../index.php'>Inicio</a>");
                }
            }
            else
            {
                include_once('../shared/screenMensajeSistema.php'); 
                $objMensaje = new screenMensajeSistema();
                $objMensaje -> screenMensajeSistemaShow("Este Usuario <'$login'><br>no existe","<a href='../index.php'>Inicio</a>");
            }
        }
    }
?>