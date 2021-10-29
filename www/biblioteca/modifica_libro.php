<?php

    echo "<h1>ACTUALIZAR LIBRO</h1>";

    //Recojo lo que viene de libros.php
    $CodigoLibro=$_POST["CodigoLibro"];
    $Autor=$_POST["Autor"];
    $Titulo=$_POST["Titulo"];
    //Conectar
    $conexion=new mysqli("localhost", "root", "root", "biblioteca");
    //Modificar
    $orden="UPDATE libros SET Titulo='".$Titulo."', ";
    $orden.="Autor='".$Autor."' WHERE CodigoLibro=".$CodigoLibro;
    $conexion->query($orden);
    $conexion->close();
    header("Location: libros.php"); //Volver automáticamente
    echo "<h2>Libro actualizado</h2>";
    echo "<a href=libros.php>Volver</a>";
?>