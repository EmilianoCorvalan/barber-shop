<?php 
session_start();
include('header.php') ?>

<div class="first">
<h1 class="h2 d-flex justify-content-center text-white">Panel de control</h1>
<div class="d-flex justify-content-center">
        <a href="#" class="m-2 text-decoration-none" onclick="mostrarContenido('home')">Turnos</a>
        <a href="#" class="m-2 text-decoration-none" onclick="mostrarContenido('turnos')">Barberos</a>
        <a href="#" class="m-2 text-decoration-none" onclick="mostrarContenido('sucursales')">Sucursales</a>
        <a href="#" class="m-2 text-decoration-none" onclick="mostrarContenido('barberos')">Servicios</a>
        <a href="#" class="m-2 text-decoration-none" onclick="mostrarContenido('resenas')">Reseñas</a>
        <!--<a href="#" class="m-2 text-decoration-none" onclick="mostrarContenido('informes')">Informes</a>-->
        <a href="#" class="m-2 text-decoration-none" onclick="mostrarContenido('informes2')">Informes</a>
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
        <div class="contenido" id="informes" style="display:none;">
            <!-- Contenido de la página Informes -->
            <?php include('./informesMain.php')?>
        </div>
        <div class="contenido" id="informes2" style="display:none;">
            <!-- Contenido de la página informes2 -->
            <?php include('./informesMain2.php')?>
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