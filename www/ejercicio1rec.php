<?php
    $nombre=$_POST["nombre"];
    echo "Hola, ".$nombre;
    $tipo=$_POST["tipo"];
    echo ", ".$tipo;
    //Volver a enviar una palabra a ejercicio1
    $cadena=$_POST["cadena"];
    echo "<form name=x mehod=post action=ejercicio1.php>";
    echo "<input type=hidden name=escondido value=".$n.">";
    echo "<input type=submit name=return value=mas>";
    echo "</form>";
    echo "$cadena";
    
?>