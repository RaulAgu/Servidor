<?php
    session_start();
    //Destruyo las variables de sesión
    unset($_SESSION['nombre']);

?>
<!-- identificación -->
<form name=f1 method=POST action=fichero1.php>
        <input type="text" name="nombre">
        <input type="submit" value="enviar" name="enviar">
        
</form>