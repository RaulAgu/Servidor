<?php
    session_start();
    //Destruyo las variables de sesión
    unset($_SESSION['nombre']);

    unset($_SESSION['cuando']); //ultima vez que el usuaio ha entrado

?>
<!-- identificación -->
<form name=f1 method=POST action=fichero1.php>
        <input type="text" name="nombre" placeholder="Introduce usuario">
        <br/>
        <input type="text" name="contrasena" placeholder="Contraseña">
        <input type="submit" value="enviar" name="enviar">
        
</form>