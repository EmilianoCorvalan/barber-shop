<?php
//session_start();
//include('header.php'); 
include('conexion.php');
if (isset($_SESSION['email']) && $_SESSION['nivel'] === '2') {
    //INICIAMOS LAS QUERIES PARA TRAER DATOS
    //$query_barberos = "SELECT idbarbero, nombre, apellido FROM `barberos`;";
    //$query = $conn->query($query_barberos);
    //$query_servicios = "SELECT idservicio, tiposervicio FROM `servicios`;";
    //$query = $conn->query($query_servicios);
?>
    <h4 class="text-center text-white mb-2">Informes</h4>
    <section class="main-font container-fluid d-flex justify-content-center text-light">
        <div class="row align-items-start justify-content-evenly">
            <div><!--SE ELIMINO LA CLASE DEL DIV  ( class="col-8" )PORQUE ME ACHICABA MUCHO. REVISAR DISTRIBUCION.-->
                <form method="POST" action="../informes/infoCompleto.php" target="_blank">
                    <!--ACA ESTA EL COSO DE BARBEROS-->
                    <label for="barbero">Seleccione un barbero</label>
                    <select name="barbero" id="barbero" class="form-control"> <!--ESTO SE PUEDE MEJORAR-->
                        <option class="bg-light m-2" value="none"> -SELECCIONAR- </option>
                        <?php
                        $barberos = $conn->query("SELECT * FROM barberos");
                        if ($barberos->num_rows > 0) {
                            while ($row = $barberos->fetch_assoc()) {
                                $idBarbero = $row["idbarbero"];
                                $nombreBarbero = $row["nombre"];
                                $apellidoBarbero = $row["apellido"];
                                echo '<option class="bg-light m-2" value="' . $idBarbero . '">' . $nombreBarbero . ' ' . $apellidoBarbero . '</option>';
                            }
                        } else {
                            echo "No se encontraron barberos.";
                        }
                        ?>
                    </select>
                    <!--ACA ESTA EL COSO DE SERVICIOS-->          
                    <label for="servicio">Seleccione un servicio</label>
                    <select name="servicio" id="servicio" class="form-control"> <!--ESTO SE PUEDE MEJORAR-->
                        <option class="bg-light m-2" value="none"> -SELECCIONAR- </option>
                        <?php
                        $servicios = $conn->query("SELECT * FROM servicios");
                        if ($servicios->num_rows > 0) {
                            while ($row = $servicios->fetch_assoc()) {
                                $idServicio = $row["idservicio"];
                                $nombreServicio = $row["tiposervicio"];
                                echo '<option class="bg-light" value="' . $idServicio . '">' . $nombreServicio . '</option>';
                            }
                        } else {
                            echo "No se encontraron servicios.";
                        }
                        ?>
                    </select>
                    <!--ACA ESTA EL COSO DE FECHAS-->
                    <div class="form-group">
                        <label for="fecha">Fecha inicial</label>
                        <input type="date" name="fecha" id="fecha" placeholder="DD/MM/AAAA" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="fecha2">Fecha final</label>
                        <input type="date" name="fecha2" id="fecha2" placeholder="DD/MM/AAAA" class="form-control">
                    </div>
                    <label for="cuanto">Seleccione un periodo</label>
                    <select name="cuanto" id="cuanto" class="form-control">
                        <option class="bg-light" value="none"> -SELECCIONAR- </option>
                        <option class="bg-light" value="dia">Día</option>
                        <option class="bg-light" value="semana">Semana</option>
                        <option class="bg-light" value="mes">Mes</option>
                        <option class="bg-light" value="anio">Año</option>
                    </select>
                    <input type="submit" class="btn btn-primary d-block mx-auto mt-2" value="Consultar">
                </form>
            </div>
        </div>
    </section>
<?php
} //CIERRA LA LLAVE DE ARIBA DE TODO!!!!
include('footer.php');
?>