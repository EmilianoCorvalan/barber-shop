<?php 
session_start();
include('header.php');
include('conexion.php');
$date ="'".date('Y-m-d')."'";
$new_query = "SELECT turnos.idturno, turnos.fecha, turnos.time, turnos.idservicio, servicios.tiposervicio, turnos.cod_area, turnos.telefono, 
                turnos.mail, usuarios.nombre, usuarios.apellido FROM turnos, usuarios,servicios 
                WHERE turnos.mail = usuarios.mail AND turnos.idservicio=servicios.idservicio AND turnos.fecha = $date ORDER BY turnos.time ASC";
$query = $conn->query($new_query);

?>
<section class="first main-font container-fluid text-white d-flex justify-content-center">

    <div class="container px-4 col-12 col-md-10 col-lg-10 col-xl-10">
        <h3 class="mt-4 text-center">Turnos del 
            <?php
                echo date('Y-m-d');
            ?>
        </h3>    
        <div>
            <table class="table table-dark table-hover">
                <thead>
                    <td scope="col">Id</td>
                    <td scope="col">Hora</td>
                    <td scope="col">Email</td>
                    <td scope="col">Nombre</td>
                    <td scope="col">Apellido</td>
                    <tdscope="col">Servicio</td>
                    <tdscope="col">Codigo de area</td>
                    <tdscope="col">Telefono</td>
                    <td></td>
                </thead>
                <tbody>
                    <?php
                        while ($fila = mysqli_fetch_array($query)){
                            $idturno = $fila['idturno'];
                            echo "<tr>
                                <td>".$fila['idturno']."</td>
                                <td>".$fila['time']."</td>
                                <td>".$fila['mail']."</td>
                                <td>".$fila['nombre']."</td>
                                <td>".$fila['apellido']."</td>
                                <td>".$fila['tiposervicio']."</td>
                                <td>".$fila['cod_area']."</td>
                                <td>".$fila['telefono'].'</td>
                                <td><div class="d-flex justify-content-center bg-dark text-white">
                                        <a href="editar.php?idturno='.$idturno.'" class="mx-2 link-primary bg-dark"><i class="bi bi-pencil-fill bg-dark"></i></a>
                                        <a href="borrar.php?idturno='.$idturno.'" class="mx-2 link-danger bg-dark"><i class="bi bi-trash icon bg-dark"></i></a>
                                    </div>
                                </td>
                            </tr>';
                        }
                    ?>  
                </tbody>
                
            </table>
        </div>
    </div>
</section>
<?php include('footer.php');?>

<!-- 
//while ($registro = $query -> fetch(PDO::FETCH_ASSOC)){
    //echo "ID: ".$registro["id_usuarios"] . "Usuarios: " . $registro["usuarios"] . "Password: ". $registro["password"] . "Passh: " . $registro["hash_password"] . "Email: " . $registro["mail"] . "Perfil: " . $registro["perfil"] . "Comentairos: " . $registro["comentarios_usuarios"] . "Estado: " . $registro["estado"] . "Fecha: " . $registro["fecha_usuario"] . "<br>";
//}-->