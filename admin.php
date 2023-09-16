<?php include('header.php') ?>

<div class="first">
<h1 class="h2 d-flex justify-content-center text-white">Panel de control</h1>
<div class="navbarAdmin d-flex justify-content-center">
        <a href="#" class="m-2" onclick="mostrarContenido('home')">Turnos</a>
        <a href="#" class="m-2" onclick="mostrarContenido('turnos')">Barberos</a>
        <a href="#" class="m-2" onclick="mostrarContenido('sucursales')">Sucursales</a>
        <a href="#" class="m-2" onclick="mostrarContenido('barberos')">Servicios</a>
        <a href="#" class="m-2" onclick="mostrarContenido('resenas')">Reseñas</a>
</div>
    <div class="">
    <div class="contenido" id="home">
        <!-- Contenido de la página turnos-->
        <?php include('registroturnos.php')?>
    </div>
    <div class="contenido" id="turnos" style="display:none;">
        <!-- Contenido de la página Barberos -->
        <?php include('vistaadministracion/barberos.php')?>
    </div>
    <div class="contenido" id="sucursales" style="display:none;">
        <!-- Contenido de la página Sucursales -->
        <?php include('vistaadministracion/sucursales.php')?>
    </div>
    <div class="contenido" id="barberos" style="display:none;">
        <!-- Contenido de la página Servicios -->
        <?php include('vistaadministracion/serviciosAdm.php')?>
    </div>
    <div class="contenido" id="resenas" style="display:none;">
        <!-- Contenido de la página Reseñas -->
        <?php include('vistaadministracion/resenias.php')?>
    </div>
    </div>
    </div>


    <script>
        function mostrarContenido(id) { 
            var contenidos = document.getElementsByClassName("contenido");
            for (var i = 0; i < contenidos.length; i++) {
                contenidos[i].style.display = "none";
            }
            document.getElementById(id).style.display = "block";
}

    </script>