<?php

    session_start(); //comenzar la sesión
    $_SESSION['primera']=33; //Nombe y valor, mientras no se cierre el navegador, va a estar guardada
    echo "Valor de primera: ".$_SESSION['primera'];
    echo "<a href=sesiones2.php>Pulsa aquí</a>";

?>