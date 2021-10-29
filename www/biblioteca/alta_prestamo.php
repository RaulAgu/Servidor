<?php

    require="funciones.php";//importar funciones

    echo "<h1>PRESTAMOS</h1>";

    //Recojo lo que viene de libros.php
    $cod_libro=$_POST["cod_libro"];
    $cod_lector=$_POST["cod_lector"];

    //El libro existe?
    if(existe($cod_libro)){
        echo"<h2>El libro existe</h3>";
        if(dadoBaja($cod_libro)){
            echo "Ese libro está de baja";
        } else {
            //el libro esta ya prestado?
            if(estaPrestado($cod_libro){
                echo "<h2>El libro está prestado, elige otro</h2>";
            } else {
                echo "<h2>Todo correcto</h2>";
            }

            //Todo va bien
            if(lectorbueno($cod_lector)){
                prestaLibro($cod_libro,$cod_lector);
                echo "<h2>Prestamo realizado</h2>";
            } else {
                echo "<h2>Clinte no váido</h2>";
            }
        }
    }else{
        echo "<h2>El libro no existe</h2>";
    }
  
    echo "<a href=index.php>Volver</a>";

?>