<?php 
    session_start();
    include 'header.php'; 
    if (isset($_SESSION['email'])){ 
        include 'conexion.php';
    ?>

<section class="first main-font container-fluid d-flex justify-content-center text-light">
    <div class="col-12 col-md-8 col-lg-6 col-xl-6">
    <div class="px-4">
        <?php 
            echo '<h4 class="mt-4">Bienvenido '. ucfirst($_SESSION['nombre']). '</h4>';
        ?>
        <h6>Completa el siguiente formulario para reservar tu turno</h6>
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
                            <input class="form-control required m-1" type="tel" placeholder="Cód area" name="codArea" id="codArea" value="11" minlength="2" maxlength="4">
                            <input class="form-control required m-1" type="tel" placeholder="XXXXXXXX" name="telefono" id="campoValidacion" minlength="5" maxlength="8">
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
                    <label class="control-label">Servicio</label>
                    <div class="form-control">
                        <select name="servicio" id="servicio" class="form-control" > <!--ESTO SE PUEDE MEJORAR-->
                            <option class="bg-light" value="1">Barba</option>
                            <option class="bg-light" value="2">Corte</option>
                            <option class="bg-light" value="3">Corte infantil</option>
                            <option class="bg-light" value="4">Pelo y barba</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row px-4">
            <div class="col-6">
                <div class="form-group">
                    <label class="control-label">Fecha</label>
                    <input type="date" name="fecha" id="fecha" placeholder="DD/MM/AAAA" class="form-control required" min=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label class="control-label">Hora</label><!--ESTO SE PUEDE COMPLETAR CON UN CICLO FOR DE PHP????-->
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
<?php 
} else {
    header("location:login.php");
}
include 'footer.php'; ?>