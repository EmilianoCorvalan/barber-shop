<?php
session_start();
include 'header.php';
include 'conexion.php';
?>

<section class="first main-font container-fluid d-flex justify-content-center text-light">
    <div class="col-12 col-md-8 col-lg-6 col-xl-6">
        <div class="px-4">
            <h4 class="mt-4">Agregar Nueva Sucursal</h4>
            <h6>Completa el siguiente formulario para agregar una nueva sucursal</h6>
            <hr>
        </div>

        <form action="" method="post">
            <div class="row px-4">
                <div class="col">
                    <div class="form-group">
                        <label class="control-label text-white">Nombre Sucursal</label>
                        <input type="text" class="form-control" name="nombre" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="control-label text-white">Dirección</label>
                        <input type="text" class="form-control" name="direccion" required>
                    </div>
                </div>
            </div>

            <div class="row px-4">
                <div class="col">
                    <div class="form-group">
                        <label class="control-label text-white">Ciudad</label>
                        <input type="text" class="form-control" name="ciudad" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="control-label text-white">Teléfono</label>
                        <input type="text" class="form-control" name="telefono" minlength="8" maxlength="10" required>
                    </div>
                </div>
            </div>

            <div class="row px-4">
                <div class="col">
                    <div class="form-group">
                        <label class="control-label text-white">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                </div>
            </div>

            <div class="row p-4 my-2">
                <div class="col d-flex justify-content-center gap-4">
                    <input type="submit" class="btn btn-success" value="Agregar Sucursal" name="btnAgregarSucursal">
                    <a href="admin.php" class="btn btn-outline-warning text-white">Volver al panel de control</a>
                </div>
            </div>
        </form>

        <!-- Mensaje de operacion -->
        <div id="mensajeExito" class="alert alert-success" style="display:none;"></div>
        <div id="mensajeError" class="alert alert-danger" style="display:none;"></div>
    </div>
    <?php include 'agregarsucursal-procesar.php' ?>
</section>