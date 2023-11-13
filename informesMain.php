<?php 
    //session_start();
    //include('header.php'); 
    include('conexion.php');
    if (isset($_SESSION['email']) && $_SESSION['nivel']==='2') {
    //INICIAMOS LAS QUERIES PARA TRAER DATOS
    //$query_barberos = "SELECT idbarbero, nombre, apellido FROM `barberos`;";
    //$query = $conn->query($query_barberos);
    //$query_servicios = "SELECT idservicio, tiposervicio FROM `servicios`;";
    //$query = $conn->query($query_servicios);
?>  
<section class="first main-font container-fluid d-flex justify-content-center text-light">

<div class="row align-items-start justify-content-evenly">
    <div class="col-4">
        <!--ACA ESTA EL COSO DE BARBEROS-->
        <form method="POST" action="./informes/infoBarbero.php" target="_blank">
            <select name="barbero" id="barbero" class="form-control"> <!--ESTO SE PUEDE MEJORAR-->
                <?php
                $barberos = $conn->query("SELECT * FROM barberos");
                if ($barberos -> num_rows > 0) {
                    while ($row = $barberos->fetch_assoc()) {
                        $idBarbero = $row["idbarbero"];
                        $nombreBarbero = $row["nombre"];
                        $apellidoBarbero = $row["apellido"];
                        echo '<option class="bg-light" value="' . $idBarbero . '">' . $nombreBarbero .' '. $apellidoBarbero. '</option>';
                    }
                } else {
                    echo "No se encontraron barberos.";
                }
                ?>
            </select>
            <input type="submit" class="btn btn-primary d-block mx-auto " value="Consultar por barbero">
        </form>
    </div>

    <div class="col-4">
        <!--ACA ESTA EL COSO DE SERVICIOS-->
        <form method="POST" action="./informes/infoServicio.php" target="_blank">
            <select name="servicio" id="servicio" class="form-control"> <!--ESTO SE PUEDE MEJORAR-->
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
            <input type="submit" class="btn btn-primary d-block mx-auto " value="Consultar por servicio">
        </form>
    </div>

    
    <!--ACA ESTA EL COSO DE FECHAS-->
    <div class="col-4">
        <form method="POST" action="./informes/infoFecha.php" target="_blank">
            <div class="form-group">
                <input type="date" name="fecha" id="fecha" placeholder="DD/MM/AAAA" class="form-control required" required>
            </div>
            <div class="form-group">
                <input type="date" name="fecha2" id="fecha2" placeholder="DD/MM/AAAA" class="form-control required">
            </div>
            <select name="cuanto" id="cuanto" class="form-control" >
                <option class="bg-light" value="dia">Día</option>
                <option class="bg-light" value="semana">Semana</option>
                <option class="bg-light" value="mes">Mes</option>
                <option class="bg-light" value="anio">Año</option>                
            </select>
            <input type="submit" class="btn btn-primary d-block mx-auto " value="Consultar por fechas">
        </form>
    </div>
</div>
</section>
<?php 
    } //CIERRA LA LLAVE DE ARIBA DE TODO!!!!
    include('footer.php');
?>