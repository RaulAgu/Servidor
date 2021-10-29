<?php

    require="funciones.php";//importar funciones

    echo "<h1>PRESTAMOS</h1>";

    //Recojo lo que viene de libros.php
    $cod_libro=$_POST["cod_libro"];


    //Prestar libro
    if(estaPrestado($cod_libro)){
        echo "<h2>Devolviendo</h2>";
        devuelve($cod-libro);
    } else {

    }
  
    echo "<a href=index.php>Volver</a>";
?>