<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="infoStyle.css" />
    <title>Informe</title>
</head>
<body>
<?php
        session_start();
        //var_dump($_SESSION);
    ?>
    <div class="bloque">
        <h2 class="subTit">Informe de barberia</h2>
        
        <div class="enca2">Pedido por: <?php print($_SESSION['nombre']." ".$_SESSION['apellido']);?></div>
        <?php
            $timezone =  date_default_timezone_set("America/Argentina/Buenos_Aires");
            $date = date('Y-m-d H:i:s');
        ?>
        <div class="enca2"><?php print($date);?></div>
        <br><br>
    </div>
</body>
</html>