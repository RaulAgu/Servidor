<?php


    //vector de cookies
    if(!isset($_COOKIE['v'])){
        //Si no existe, la creo
        setcookie("v[1]","rojo",time()+5*60);
        setcookie("v[2]","otoño",time()+5*60);
        setcookie("v[3]","noviembre",time()+5*60);
        echo "No existe el vector de cookies";
        echo "<br/>";
    } else {
        echo "Ya has estado por aqui";
        echo "<br/>";
        $v=$_COOKIE['v'];
        foreach($v as $indice=>$valor){
            echo $indice." --> ".$valor;
            echo "<br/>";
        }
    }

    // //contador
    // if(!isset($_COOKIE['contador'])){
    //     //Si no existe, la creo
    //     setcookie("contador",1,time()+5*60);//5mins (5 seg por 60 seg)
    //     echo "Bienvenido a mi página";
    //     echo "<br/>";
    // } else {
    //     echo "Vienes mucho por aqui";
    //     $veces=$_COOKIE['contador']+1;
    //     echo ", unas ".$veces." veces...";
    //     setcookie("contador",$veces,time()+5*60); //incremento
    //     echo "<br/>";
    // }


    // //Se guardan en el cliente (navegador/programa)
    // setcookie("probando"/*Nombre */, 33 /*Valor almacenado */, time()+60*60/*cuando expira la cookie (1min)*/);
    
    // //Para que no se guarde, poner un tiempo negativo
    // echo "He almacenado la cookie";

    // //recuperar el valor de la cookie
    // $valor=$_COOKIE['probando'];
    // echo "<br/>"."El valor es: ".$valor;


?>