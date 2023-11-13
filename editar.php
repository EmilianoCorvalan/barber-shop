<?php
session_start();
include 'header.php';
if (isset($_SESSION['email'])) {
    include 'conexion.php';
    //var_dump($_GET);
    //print ($_GET['idturno']);
    $idturno = $_GET['idturno'];
    $new_query = "SELECT * FROM `turnos` WHERE idturno=$idturno LIMIT 1";
    $query = $conn->query($new_query);
    $turnoactual = mysqli_fetch_row($query);
    $fecha = $turnoactual['1'];
    $hora = $turnoactual['2'];
    $mail = $turnoactual['3'];
    $servicio = $turnoactual['4'];
    $codArea = $turnoactual['5'];
    $telefono = $turnoactual['6'];
    $barbero = $turnoactual['7'];
    var_dump ($turnoactual);

?>

    <section class="first main-font container-fluid d-flex justify-content-center text-light">
        <div class="col-12 col-md-8 col-lg-6 col-xl-6">
            <div class="px-4">
                <h4 class="mt-4">Edicion de turnos</h4>
                <h6>Edite el turno seleccionado</h6>
                <?php
                $id = $_GET['idturno'];
                $_POST['id'] = $id;
                ?>
                <hr>
            </div>
            <form method="post">
                <div class="row px-4">
                    <div class="col">
                        <h5 class="">Tus datos</h5>
                        <div class="form-group">
                            <label class="control-label text-white">Teléfono celular</label>
                            <div class="input-group">
                                <div class="input-group-prepend m-1">
                                    <span class="input-group-text">+54</span>
                                </div>
                                <input class="form-control required m-1" type="tel" placeholder="Cód area" name="codArea" id="codArea" value="<?php print($codArea);?>" minlength="2" maxlength="4">
                                <input class="form-control required m-1" type="tel" placeholder="XXXXXXXX" name="telefono" id="campoValidacion" value="<?php print($telefono);?>" minlength="5" maxlength="8">
                            </div>
                            <small>Sin 0 ni 15. Ingrese sólo números.</small>
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
                                <select class="form-control bg-light">
                                    <option>Peluqueria</option>
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
                                            $selected = ' ';
                                            $idbarbero = $row["idbarbero"];
                                            $nombrebarbero = $row["nombre"]." ".$row['apellido'];
                                            if ($idbarbero == $barbero){
                                                $selected = 'selected="selected"';
                                            }
                                            echo '<option class="bg-light" '.$selected.' value="' . $idbarbero . '">' . $nombrebarbero . '</option>';
                                        }
                                    } else {
                                        echo "No se encontraron servicios.";
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
                                            $selected = ' ';
                                            $idServicio = $row["idservicio"];
                                            $nombreServicio = $row["tiposervicio"];
                                            if ($idServicio == $servicio){
                                                $selected = 'selected="selected"';
                                            }
                                            echo '<option class="bg-light" '.$selected.' value="' . $idServicio . '">' . $nombreServicio . '</option>';
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
                            <label class="control-label">Fecha</label>
                            <input type="date" name="fecha" id="fecha" placeholder="DD/MM/AAAA" value="<?php print($fecha);?>" class="form-control required" min=<?php $hoy = date("Y-m-d");
                                                                                                                                    echo $hoy; ?>>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="control-label">Hora</label><!--ESTO SE PUEDE COMPLETAR CON UN CICLO FOR DE PHP????-->
                            <select id="horas" name="horas" class="form-control required">
                            <?php
                                $array = array('10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30');
                                foreach ($array as $value) {
                                    $selected = '';
                                    if ($value == $hora){
                                        $selected = 'selected="selected"';
                                    }
                                    print ('<option value="'.$value.'" class="bg-light"'.$selected.'>'.$value.'</option>');
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                </div>

                <?php
                include("conexion.php");
                include("controlador/controlador-editar.php");
                ?>

                <div class="row p-4 my-2">
                    <div class="col">
                        <input type="submit" class="btn btn-primary d-block mx-auto " value="Confirmar cambio" name="btnEditar">
                    </div>
                </div>

            </form>
        </div>
    </section>
<?php
} else {
    header("location:login.php");
}
include 'footer.php'; ?>