<?php

    $n = primera(6,9);
    echo $n;
    echo "<br>";
    echo primera(10,25);

    function primera($a,$b){ //nombre y los argumentos que recibe
        $c=$a*$b;
        return $c;
    }

    include "funciones.php"; //incorpora un fichero para usar sus funciones
?>