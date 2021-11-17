<?php
include "funciones.php";
session_start();
    //si viene de entrada.php
    if(isset($_POST['nombre'])){
        //vengo entrada.php
        // //compruebo s está bien identificado
        // $_SESSION['nombre']=$_POST['nombre'];

        // //Actualiza cuando ha entrado
        // $_SESSION['cuando']=time(); //nº de segundos actuales

        if(entrar($_POST['nombre'],$_POST['contrasena'])){
            echo "Bienvenido a la web"."<br/>";
        } else {
            echo "Impostor!";
        }
    } 

    if(estaIdentificado()){
        if(haCaducado()){
            echo "Te has dormido!"."<br/>";
            echo "<a href=entrada.php>Pulsa aquí</a>";
        } else {
            $_SESSION['cuando']=time();
            echo "Hola, ".$_SESSION['nombre']."<br/>"; //Si esta identificado, le saluda
            echo "Estas en fichero1.php"."<br/>";
            echo "<a href=fichero2.php>Ir a fichero2</a>";
            echo "<a href=entrada.php>Pulsa para volver</a>";
        }
        
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

