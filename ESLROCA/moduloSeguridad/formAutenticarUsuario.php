<?php
    include_once("./shared/pantalla.php");
    class formAutenticarUsuario extends pantalla

    {
        public function formAutenticarUsuarioShow()
        {
            $this -> cabeceraShow("Autenticacion de usuario");
            ?>
            <form name='autenticar usuario' method = 'POST' action='./moduloSeguridad/getUsuario.php'>
                <table align='center' border = '0'>
                    <tr>
                        <td colspan ='2' align='left'>
                            EDIFICANDO SOBRE LA ROCA E.I.R.L
                        </td>
                    </tr>

                    <tr><td rowspan = '3' align = 'left'><img width="80" height="50" src="./moduloSeguridad/candado.png" alt = "Descripcion"></td></tr>
                    <tr>
                        <td>Login:</td>
                        <td><input name='txtLogin' id='txtLogin' type='text'/></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input name='txtPassword' id='txtPassword' type='password'/></td>
                    </tr>
                    <tr>
                        <td colspan ='2' align='center'>
                            <input type='submit' name='btnAceptar' value='Ingresar'/>
                        </td>
                    </tr>
                </table>
            </form>   
            <?php
            $this->pieShow();
        }
    }

?>