<?php
include "funciones.php";
session_start();
    //si viene de entrada.php
    if(isset($_POST['nombre'])){
        //vengo index.php
        //compruebo s está bien identificado
        $_SESSION['nombre']=$_POST['nombre'];

        echo "Bienvenido a la web";
    } 

    if(estaIdentificado()){
        echo "Hola, ".$_SESSION['nombre']."<br/>"; //Si esta identificado, le saluda
    } else {
        header("location:entrada.php"); //si se slata la identificación, le echa a entrada.php
    }


    //     //Incremento contador
    //     $_SESSION['contador']=$_SESSION['contador']+1;
    //     if($_SESSION['contador']==10){ //si llega a la 10 veces, lo envia a index
    //         header("location:index.php");
    //     }
    //     echo "Hola, ". $_SESSION['nombre']."<br/>";
    //     echo "Has pasado ".$_SESSION['contador']." veces por aqui";
    // }


?>

<a href="entrada.php">Pulsa para seguir</a>