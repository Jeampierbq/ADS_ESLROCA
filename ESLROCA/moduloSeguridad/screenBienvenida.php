<?php
include_once("../shared/pantalla.php");

class screenBienvenida extends pantalla
{
    public function screenBienvenidaShow($listaPrivilegios)
    {
        $login = $_SESSION['login'];
        $this->cabeceraShow("Bienvenido usuario '$login'"); 
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Menú Principal</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                }
                .container {
                    display: flex;
                    flex-direction: row;
                    width: 100%;
                }
                .menu {
                    width: 20%;
                    background-color: #008080;
                    padding: 20px;
                    box-sizing: border-box;
                    color: white;
                }
                .menu h2 {
                    text-align: center;
                    color: white;
                }
                .menu form {
                    margin: 10px 0;
                }
                .menu input[type="submit"] {
                    background-color: #006666;
                    color: white;
                    border: none;
                    padding: 10px;
                    width: 100%;
                    text-align: left;
                    font-size: 16px;
                    cursor: pointer;
                }
                .menu input[type="submit"]:hover {
                    background-color: #004d4d;
                }
                .content {
                    width: 80%;
                    text-align: center;
                    padding: 40px;
                    box-sizing: border-box;
                }
                .content h1 {
                    font-size: 2rem;
                    color: #002266;
                }
                .content img {
                    max-width: 200px;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <!-- Menú -->
                <div class="menu">
                    <h2>Menú</h2>
                    <?php
                    for ($i = 0; $i < count($listaPrivilegios); $i++) {
                        ?>
                        <form method="POST" action="<?php echo $listaPrivilegios[$i]['pathPrivilegio']; ?>"> 
                        <input type="submit" value="<?php echo $listaPrivilegios[$i]['labelPrivilegio']; ?>">
                        </form>
                        <?php
                    }
                    ?>
                </div>
                <!-- Contenido principal -->
                <div class="content">
                    <h1>Bienvenido, <?php echo $login; ?></h1>
                    <h2>EDIFICANDO SOBRE LA ROCA E.I.R.L.</h2>
                    <img src="leon.png" alt="Logo">
                </div>
            </div>
        </body>
        </html>
        <?php
        $this->pieShow();
    }
}
?>
