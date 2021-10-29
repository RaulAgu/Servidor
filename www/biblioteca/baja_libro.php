<?php

    echo "<h1>BAJA LIBRO</h1>";

    //PONER ACTIVO = NO

    //Recojo lo que viene de libros.php
    $CodigoLibro=$_POST["CodigoLibro"];
    //Conectar
    $conexion=new mysqli("localhost", "root", "root", "biblioteca");
    $orden="UPDATE libros SET activo=0 where CodigoLibro=".$CodigoLibro;
    $conexion->query($orden);
    $conexion->close();
    echo "<h2>Libro dado de baja</h2>";
    echo "<a href=libros.php>Volver</a>";
?>