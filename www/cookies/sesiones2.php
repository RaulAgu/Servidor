<?php

    session_start(); //comenzar la sesión
    $valor = $_SESSION['primera']*2;//Recupero la sesion y la multiplica por 2
    echo "Valor de primera: ".$valor;
    echo "<a href=sesiones.php>Pulsa aquí</a>"; //Vuelve a la otra

?>