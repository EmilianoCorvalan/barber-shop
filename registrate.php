<?php
    session_start();
    include('header.php')
?>

<section class="first container-fluid text-white d-flex justify-content-center">
    
        <div class="px-4 col-12 col-md-6 col-lg-6 col-xl-4">
         <h3 class="mt-4 text-center">Registrate</h3>

        <form method="POST">
        <div class="form-group my-2">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre">
        </div>

        <div class="form-group my-2">
        <label for="apellido">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese su apellido">
        </div>

        <div class="form-group my-2">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su email">
        </div>

    <!--       <div class="form-group my-2">
        <label for="telefono">Telefono</label>
        <div class="input-group">
            <div class="input-group-prepend m-1">
            <span class="input-group-text">+54</span>
            </div>
            <input class="form-control required m-1" type="tel" placeholder="Cód area" name="codArea" id="codArea" value="11" minlength="2" maxlength="4">
            <input class="form-control required m-1" type="tel" placeholder="XXXXXXXX" maxlength="8" minlength="5" id="campoValidacion">
        </div>
        </div>
    -->

        <div class="form-group my-2">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña">
        </div>

        <?php
            include("conexion.php");
            include("controlador/controlador-registro.php");
        ?>

        <div class="d-grid col-12 mx-auto">
            <input type="submit" class="btn btn-primary btn-lg my-4" value="Registrate" name="btnRegistro">
            <a href="login.php" class="btn btn-dark btn-lg">Volver al inicio de sesion</a>
        </div>
        </form>
        </div>
</section>

<?php include('footer.php');?>