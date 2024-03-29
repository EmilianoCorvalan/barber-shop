<?php
session_start();
include 'header.php';
if (isset($_SESSION['email'])) {
    include 'conexion.php';
?>

    <section class="first main-font container-fluid d-flex justify-content-center text-light">
        <div class="col-12 col-md-8 col-lg-6 col-xl-6">
            <div class="px-4">
                <?php
                echo '<h4 class="mt-4">Bienvenido ' . ucfirst($_SESSION['nombre']) . '</h4>';
                ?>
                <h6>Completa el siguiente formulario para reservar tu turno</h6>
                <hr>
            </div>

            <form method="post" onsubmit="return validarFormulario()">
                <div class="row px-4">
                    <div class="col">
                        <h5 class="">Tus datos</h5>
                        <div class="form-group">
                            <label class="control-label text-white">Teléfono celular</label>
                            <div class="input-group">
                                <div class="input-group-prepend m-1">
                                    <span class="input-group-text">+54 9</span>
                                </div>
                                <input class="form-control required m-1" type="tel" placeholder="Cód area" name="codArea" id="codArea" value="11" minlength="2" maxlength="4">
                                <input class="form-control required m-1" type="tel" placeholder="XXXXXXXX" name="telefono" id="campoValidacion" minlength="6" maxlength="8">
                            </div>
                            <small>Sin 0 ni 15. Ingrese sólo números.</small>
                            <div class="alert alert-danger" id="errorNotificacion" style="display:none;"></div> <!-- MENSAJE ERROR VALIDACION TEL -->
                        </div>
                    </div>
                </div>

                <div class="row px-4 my-2">

                    <div class="col my-1">
                        <h4>Reserva</h4>
                    </div>
                </div>

                <div class="row px-4">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="control-label">Categoria</label>
                            <div class=" form-control">
                                <select class="form-control bg-light" disabled>
                                    <option>Barberia y peluqueria</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 py-4">
                        <div class="form-group">

                        <label class="control-label">Barbero</label>
                            <div class="form-control">
                                <select name="barbero" id="barbero" class="form-control"> <!--ESTO SE PUEDE MEJORAR-->
                                    <?php
                                    $barberos = $conn->query("SELECT * FROM barberos");
                                    if ($barberos->num_rows > 0) {
                                        while ($row = $barberos->fetch_assoc()) {
                                            $idbarbero = $row["idbarbero"];
                                            $nombrebarbero = $row["nombre"]." ".$row['apellido'];
                                            if ($idbarbero != '999'){
                                                echo '<option class="bg-light" value="' . $idbarbero . '">' . $nombrebarbero . '</option>';
                                            }
                                        }
                                    } else {
                                        echo "No se encontraron barberos.";
                                    }
                                    ?>
                                </select>
                            </div>

                            <label class="control-label">Servicio</label>
                            <div class="form-control">
                                <select name="servicio" id="servicio" class="form-control"> <!--ESTO SE PUEDE MEJORAR-->
                                    <?php
                                    $servicios = $conn->query("SELECT * FROM servicios");
                                    if ($servicios->num_rows > 0) {
                                        while ($row = $servicios->fetch_assoc()) {
                                            $idServicio = $row["idservicio"];
                                            $nombreServicio = $row["tiposervicio"];
                                            if ($idServicio != '999'){
                                                echo '<option class="bg-light" value="' . $idServicio . '">' . $nombreServicio . '</option>';
                                            }
                                        }
                                    } else {
                                        echo "No se encontraron servicios.";
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row px-4">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">Fecha del turno</label>
                            <input type="date" name="fecha" id="fecha" placeholder="DD/MM/AAAA" class="form-control required" min=<?php $hoy = date("Y-m-d");
                                                                                                                                    echo $hoy; ?>>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="control-label">Hora del turno</label><!--ESTO SE PUEDE COMPLETAR CON UN CICLO FOR DE PHP????-->
                            <select id="horas" name="horas" class="form-control required">
                                <option value="10:00" class="bg-light">10:00</option>
                                <option value="10:30" class="bg-light">10:30</option>
                                <option value="11:00" class="bg-light">11:00</option>
                                <option value="11:30" class="bg-light">11:30</option>
                                <option value="12:00" class="bg-light">12:00</option>
                                <option value="12:30" class="bg-light">12:30</option>
                                <option value="13:00" class="bg-light">13:00</option>
                                <option value="13:30" class="bg-light">13:30</option>
                                <option value="14:00" class="bg-light">14:00</option>
                                <option value="14:30" class="bg-light">14:30</option>
                                <option value="15:00" class="bg-light">15:00</option>
                                <option value="15:30" class="bg-light">15:30</option>
                                <option value="16:00" class="bg-light">16:00</option>
                                <option value="16:30" class="bg-light">16:30</option>
                                <option value="17:00" class="bg-light">17:00</option>
                                <option value="17:30" class="bg-light">17:30</option>
                                <option value="18:00" class="bg-light">18:00</option>
                                <option value="18:30" class="bg-light">18:30</option>
                                <option value="19:00" class="bg-light">19:00</option>
                                <option value="19:30" class="bg-light">19:30</option>
                            </select>
                        </div>
                    </div>
                </div>

                <?php
                include("conexion.php");
                include("controlador/controlador-turnos.php");
                ?>

                <div class="row p-4 my-2">
                    <div class="col">
                        <input type="submit" class="btn btn-primary d-block mx-auto " value="Confirmar turno" name="btnTurno">
                    </div>
                </div>

            </form>
        </div>
    </section>

    <!-- SE AGREGA VALIDACION CAMPOS JS (no estaria funcionando script.js)-->
    <script>
        // Esta funcion esta agregada en boton Confirmar Turno mediante onsubmit().
        function validarFormulario() {
            let codArea = document.getElementById('codArea').value;
            let telefono = document.getElementById('campoValidacion').value;
            let notificacion = document.getElementById('errorNotificacion');

            const regexCodArea = /^\d{2,4}$/;
            const regexTelefono = /^\d{6,8}$/;

            if (!regexCodArea.test(codArea)) {
                notificacion.innerHTML = "El codigo de area debe tener entre 2 y 4 numeros";
                notificacion.style.display = "block";
                return false;
            }
            if (!regexTelefono.test(telefono)) {
                notificacion.innerHTML = "El numero de telefono debe tener entre 6 y 8 numeros";
                notificacion.style.display = "block";
                return false
            }

            return true //Si pasa todas las validaciones.
        }
    </script>

<?php
} else {
    header("location:login.php");
}
include 'footer.php'; ?>