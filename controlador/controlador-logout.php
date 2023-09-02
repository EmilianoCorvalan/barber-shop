<?php
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
    
    echo '<script>alert("Has cerrado sesión correctamente.");</script>';
    echo '<script>window.location.href="/barber-shop/index.php";</script>';
    //header("location:../index.php");

?>