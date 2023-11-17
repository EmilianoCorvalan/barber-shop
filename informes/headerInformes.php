<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="infoStyle.css" />
    <link rel="stylesheet" href="../styles.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100;200;300;500;700&display=swap" rel="stylesheet" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <title>Informe</title>
</head>

<body class="bg-dark main-font">
    <?php
    session_start();
    //var_dump($_SESSION);
    ?>
    <div class="">
        <h2 class="main-font text-white text-center mt-2">Informe de Barber Shop</h2>

        <div class="main-font text-white text-center">Pedido por: <?php print(ucfirst($_SESSION['nombre']) . " " . ucfirst($_SESSION['apellido'])); ?></div>
        <?php
        $timezone =  date_default_timezone_set("America/Argentina/Buenos_Aires");
        $date = date('Y-m-d H:i:s');
        ?>
        <div class="text-white text-center"><?php print($date); ?></div>
    </div>
</body>

</html>