<?php

    // session_start();
    // if(!isset($_SESSION['cant'])){
    //     $_SESSION['cant']=1;
    // }
    // echo "<a href=recuento.php>Pulsa aquí</a>";

    session_start();
    //Destruyo las variables de sesión
    unset($_SESSION['nombre']);
    unset($_SESSION['contador']);

?>

<form name=f1 method=POST action=recuento.php>
        <input type="text" name="nombre">
        <input type="submit" value="enviar" name="enviar">
        
</form>