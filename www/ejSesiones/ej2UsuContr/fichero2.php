<?php
include "funciones.php";
session_start();
if(estaIdentificado()){
        if(haCaducado()){
            echo "Te has dormido!"."<br/>";
            echo "<a href=entrada.php>Pulsa aquí</a>";
        } else {
            $_SESSION['cuando']=time();
            echo "Hola, ".$_SESSION['nombre']."<br/>"; //Si esta identificado, le saluda
            echo "Estas en fichero2.php"."<br/>";
            echo "<a href=fichero1.php>Ir a fichero1</a>";
        }
        
} else {
    header("location:entrada.php"); //si se slata la identificación, le echa a entrada.php
}
?>