<?php 
    session_start();
    include('header.php'); 
    include('conexion.php');
    if (isset($_SESSION['email']) && $_SESSION['nivel']==='2') {
    //INICIAMOS LAS QUERIES PARA TRAER DATOS
    $query_barberos = "SELECT idbarbero, nombre, apellido FROM `barberos`;";
    $query = $conn->query($query_barberos);
    $query_servicios = "SELECT idservicio, tiposervicio FROM `servicios`;";
    $query = $conn->query($query_servicios);
?>  

    <section class="first main-font container-fluid text-white d-flex justify-content-center">
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
        <!--ACA ESTA EL COSO DE FECHAS-->
        <form method="POST" action="./informes/infoFecha.php" target="_blank">
            <div class="form-group">
                <input type="date" name="fecha" id="fecha" placeholder="DD/MM/AAAA" class="form-control required" >
            </div>
            <select name="fechas" id="fechas" class="form-control" onchange="myFunction(event)"> <!--ESTO SE PUEDE MEJORAR-->
                <option class="bg-light" value="1">Semana</option>
                <option class="bg-light" value="2">Mes</option>
                <option class="bg-light" value="3">Año</option>                
            </select>



<!--UNA PRUEBA            
            <select name="" onchange="myFunction(event)">
    <option disabled selected>Choose Database Type</option>
    <option value="Green">green</option>
    <option value="Red">red</option>
    <option value="Orange">orange</option>
    <option value="Black">black</option>
</select>
And the function:-->
<script>
function myFunction(e) {
    alert("Has cerrado sesión correctamente."+value);
    //document.getElementById("myText").value = e.target.value
}
</script>
<!--And add the ID-->

<input id="myText" type="text" value="colors">

            <input type="submit" class="btn btn-primary d-block mx-auto " value="Consultar por servicio">
        </form>
    </section>
<?php 
    } //CIERRA LA LLAVE DE ARIBA DE TODO!!!!
    include('footer.php');
?>


<script>
        function mostrarContenido(id) { 
            var contenidos = document.getElementsByClassName("contenido");
            for (var i = 0; i < contenidos.length; i++) {
                contenidos[i].style.display = "none";
            }
            document.getElementById(id).style.display = "block";
        }
    </script>