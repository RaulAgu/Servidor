<?php
    $m[1][1]=33;
    $m[1][2]="Patata";
    $m[2][1]=44;
    $m[2][2]="Boniato";
    $m[3][1]=533;
    $m[3][2]="Lechuga";

    //creo formulario
    echo "<form name=f method=post action=jueves2.php>";
    //Serializa la matriz
    $copia=serialize($m); 
    //envia la matriz
    echo "<input type=hidden name=matriz value=$copia>";
    echo "<input type=submit name=boton value=enviar>";
    echo "</form>";
    /*
    //Serializo la matriz para poder enviarla a otro php
    $copia=serialize($m); 
    echo $copia;

    //Deserializar
    $h = unserialize($copia);//Recorre la matriz fila a fila, columna a columna para imprimir
    foreach($h as $i=>$v){ //Por cada elemento de h, se saca su indice y lo que tenga dentro
        foreach($v as $ii=>$vv){ 
            echo $vv;
            echo "<br>";
        }
    }
    */
?>