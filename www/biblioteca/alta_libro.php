<?php

    echo "<h1>NUEVO LIBRO</h1>";

    //Recojo lo que viene de libros.php
    $Titulo=$_POST["Titulo"];
    $Autor=$_POST["Autor"];
    //Conectar
    $conexion=new mysqli("localhost", "root", "root", "biblioteca");
    //Necesito el ultimo Codigo
    $orden="SELECT max(CodigoLibro) FROM libros";
    $jamon=$conexion->query($orden);
    $loncha=$jamon->fetch_array(); //Último numero
    $siguiente =$loncha[0]+1;

    $jamon->close();
    $orden="INSERT INTO libros ($siguiente,Titulo,Autor,Activo) ";
    $orden.="VALUES (".$siguiente.", '".$Titulo."', '".$Autor."',1)";
    $conexion->close();
    echo "<h2>Libro dado de alta</h2>";
    echo "<a href=libros.php>Volver</a>";
?>