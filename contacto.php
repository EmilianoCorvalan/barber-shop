<?php 
    session_start();
    include('header.php')
?>

<section class="first main-font container-fluid text-white d-flex justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 col-xl-6">
        <div class="px-4">
            <h4 class="mt-4">Comunicate con nosotros</h4>
            <h6>A la brevedad responderemos tu consulta o comentario</h6>
            <hr>
        </div>

        <form method="POST">
        <div class="form-group my-2 px-4">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su nombre">
        </div>

        <div class="form-group my-2 px-4">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingrese su apellido">
        </div>

        <div class="form-group my-2 px-4">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese su email">
        </div>

        <div class="form-group my-2 px-4">
            <label for="asunto">Asunto</label>
            <input type="text" class="form-control" name="asunto" id="asunto" placeholder="Asunto">
        </div>

        <div class="form-group my-2 px-4">
            <label for="comentarios">Comentarios</label>
            <textarea class="form-control" name="comentarios" id="comentarios" rows="5" placeholder="Aqui sus comentarios"></textarea>
        </div>

        <?php
            include("conexion.php");
            include("controlador/controlador-contacto.php");
        ?>

        <div class="d-grid col-2 mx-auto">
            <input type="submit" class="btn btn-primary my-4" value="Enviar" name="btnContacto">
        </div>
        
        </form>
    </div>
</section>

<?php include('footer.php');?>