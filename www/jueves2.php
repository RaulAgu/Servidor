<?php
    //Recibe la matriz
    $matriz=$_POST["matriz"];
    //Deserializar
        $h = unserialize($matriz);//Recorre la matriz fila a fila, columna a columna para imprimir
        foreach($h as $i=>$v){ //Por cada elemento de h, se saca su indice y lo que tenga dentro
            foreach($v as $ii=>$vv){ 
                echo $vv;
                echo "<br>";
            }
        }
        echo $h[1][1];
?>