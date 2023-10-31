<?php
session_start();
include 'header.php';
include 'conexion.php';
?>

<section class="first main-font container-fluid d-flex justify-content-center text-light">
    <div class="col-12 col-md-8 col-lg-6 col-xl-6">
        <div class="px-4">
            <h4 class="mt-4">Agregar Nuevo Servicio</h4>
            <h6>Completa el siguiente formulario para agregar un nuevo servicio</h6>
            <hr>
        </div>

        <form action="" method="post">
            <div class="row px-4">
                <div class="col">
                    <div class="form-group">
                        <label class="control-label text-white">Tipo de Servicio</label>
                        <input type="text" class="form-control" name="tiposervicio" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="control-label text-white">Valor</label>
                        <input type="text" class="form-control" name="valor" required>
                    </div>
                </div>
            </div>

            <div class="row p-4 my-2">
                <div class="col d-flex justify-content-center gap-4">
                    <input type="submit" class="btn btn-success" value="Agregar Servicio" name="btnAgregarServicio">
                    <a href="admin.php" class="btn btn-outline-warning text-white">Volver al panel de control</a>
                </div>
            </div>
        </form>

        <!-- Mensaje de operacion -->
        <div id="mensajeExito" class="alert alert-success" style="display:none;"></div>
        <div id="mensajeError" class="alert alert-danger" style="display:none;"></div>
    </div>
    <?php include 'agregarservicio-procesar.php' ?>
</section>