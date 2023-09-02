<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicon y estilos CSS locales-->
    <link rel="icon" type="image/png" href="img/logo32px.png" />
    <link rel="stylesheet" href="styles.css" />
    <!-- Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100;200;300;500;700&display=swap"
      rel="stylesheet"
    />
    <title>Barber Shop</title>
  </head>
  <body>
    <header>
      <div class="container">
        <header class="d-flex flex-wrap justify-content-center header-fix">
          <a
            href="index.php"
            class="col-12 link-offset-2 link-underline link-underline-opacity-0 text-white"
            ><h1 class="text-white text-center fw-lighter mt-1">
              <img
                src="img/logoamarillo32px.png"
                class="mb-1 mx-3"
                alt="logo-barbers-shop"
              />Barber Shop
            </h1></a
          >
          
          <ul class="nav nav-pills main-font responsive-font fw-lighter">
            <?php 
              if ($_SERVER['REQUEST_URI'] === '/barber-shop/index.php') {
            ?>
              <li class="nav-item">
              <a
                href="login.php"
                class="nav-link text-white links-hover"
                aria-current="page"
                >Login</a>
              </li>
            <?php 
              }
              else{
            ?>
              <li class="nav-item">
              <a
                href="index.php"
                class="nav-link text-white links-hover"
                aria-current="page"
                >Inicio</a>
              </li>
            <?php } ?>
            <li class="nav-item">
              <a href="servicios.php" class="nav-link text-white links-hover">Servicios</a>
            </li>
            <li class="nav-item">
              <a href="turnos.php" class="nav-link text-white links-hover">Turnos</a>
            </li>
            <li class="nav-item">
              <a href="trabajos.php" class="nav-link text-white links-hover"
                >Nuestros trabajos</a>
            </li>
            <li class="nav-item">
              <a href="contacto.php" class="nav-link text-white links-hover">Contacto</a>
            <?php 
              if (isset($_SESSION['email'])) {
              ?>
            </li>
            <li class="nav-item">
              <a href="controlador/controlador-logout.php" class="nav-link text-white links-hover">Logout</a>
            </li>
            <?php 
              }
              if (isset($_SESSION['email']) && $_SESSION['nivel']==='2') {
            ?>  
            </li>
            <li class="nav-item">
              <a href="registroturnos.php" class="nav-link text-white links-hover">Registro Turnos</a>
            </li>
            <?php } ?>
          </ul>
        </header>
      </div>
    </header>