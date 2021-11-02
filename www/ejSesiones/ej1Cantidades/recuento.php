<?php

    // session_start();
    // if(!isset($_SESSION['cant'])){
    //     echo "Bienvenido a la página!";
    //     $cantidad=$_SESSION['cant'];
    //     echo $cantidad;
    //     $cantidad++;
    //     $_SESSION['cant']=$cantidad;
    // } else {
    //     $cantidad=$_SESSION['cant'];
    //     echo $cantidad;
    //     if($cantidad>1 && $cantidad<10){
    //         echo "Has estado ".$cantidad." veces en la página!";
    //         $cantidad++;
    //         $_SESSION['cant']=$cantidad;
    //     } else if($cantidad==10){
    //         echo "Pesado, pues ahora te reinicio el contador!";
    //         $cantidad=0;
    //         $_SESSION['cant']=$cantidad;
    //     }
    //     echo "<a href=index.php>Pulsa aquí</a>";
    // }

    session_start();
    if(isset($_POST['nombre'])){
        //vengo index.php
        $_SESSION['nombre']=$_POST['nombre'];
        $_SESSION['contador']=1;
        echo "Bienvenido por primera vez!";
    } else{
        //Incremento contador
        $_SESSION['contador']=$_SESSION['contador']+1;
        if($_SESSION['contador']==10){ //si llega a la 10 veces, lo envia a index
            header("location:index.php");
        }
        echo "Hola, ". $_SESSION['nombre']."<br/>";
        echo "Has pasado ".$_SESSION['contador']." veces por aqui";
    }


?>

<a href="recuento.php">Pulsa para seguir</a>