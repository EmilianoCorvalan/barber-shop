<?php 
//session_start();  //COMO ESTA EN EL LOGIN NO HACE FALTA PONERLO ACA. TIRA ERROR
if(!empty($_POST["btnLogin"])){
    if(empty($_POST["email"]) and empty($_POST["password"])){
        echo '<div class="alert alert-danger mt-4">No ingresó usuario y contraseña. Por favor intente nuevamente</div>';
    }
    else{
        $email = $_POST["email"];
        $password = $_POST["password"];
        $pass_cifrado = hash('sha256',$password.$email);
        $query = $conn->query("SELECT * FROM usuarios WHERE mail='$email' and pass='$pass_cifrado'");
        if ($datos = $query->fetch_object()){
            $result = get_object_vars($datos);  //TRANSFORMAMOS EL stdClass QUE NOS LLEGA EN UN ARRAY PARA PODER INGRESARLO
            $_SESSION['email'] = $result['mail'];   //OJO EN LA BASE DE DATOS ES mail EN EL FRONT LE PUSIMOS email!!!!
            $_SESSION['nombre'] = $result['nombre'];
            $_SESSION['apellido'] = $result['apellido'];
            $_SESSION['nivel'] = $result['nivel_seg'];  //ESTE LO SACA DE LA BDD PARA ACCESAR EL MENU DEL OPERADOR (SE ASIGNA A MANO EN LA BDD)
            if ($_SESSION['nivel']==='1'){
                header("location:turnos.php");
            } else if ($_SESSION['nivel']=='2'){
                header("location:registroturnos.php");
            }
        }
        else{
            echo '<div class="alert alert-danger mt-4">Email o contraseña incorrectos</div>';
        }
    }
}

?>