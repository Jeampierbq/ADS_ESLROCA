<?php
    include_once("../shared/pantalla.php");
    class screenBienvenida extends pantalla

    {
        public function screenBienvenidaShow($listaPrivilegios)
        {
            $login = $_SESSION['login'];
            $this -> cabeceraShow("Bienvenido usuario '$login'");
            for($i = 0; $i < count($listaPrivilegios);$i++)
            {
                ?>
                <form name = '<?php echo $listaPrivilegios[$i]['labelPrivilegio']?>' method = 'POST' action='<? echo $listaPrivilegios[$i]['pathPrivilegio']?>'>
                <input type='submit' name='<?php echo $listaPrivilegios[$i]['labelPrivilegio']?>' value = '<?php echo $listaPrivilegios[$i]['labelPrivilegio']?>' />
                
                </form>
                <?php
            }
            
            $this->pieShow();
        }
    }

?>