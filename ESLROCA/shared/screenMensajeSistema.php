<?php
include_once("pantalla.php");
class screenMensajeSistema extends pantalla
{
    public function screenMensajeSistemaShow($msj,$link)
    {
        $this -> cabeceraShow("Mensaje del Sistema");
        ?>
        <p align ='center'>
            <strong><?php echo ucwords($msj); ?></strong>
            <br>
            <?php echo $link; ?>
        </p>       

        <?php
        $this->pieShow();
    }
}
?>