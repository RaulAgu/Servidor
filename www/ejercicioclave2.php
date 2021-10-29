<?php
    $frase=$_POST["frase"];
    $numero=$_POST["numero"];
    $clave=$_POST["contrasena"];
    if($clave=="correcta"){
        $contFrase = strlen($frase);
        $vFrase=str_split($frase);
        echo "Frase: ";
        for($c=$contFrase-1;$c>=0;$c--){
            echo $vFrase[$c];
        };
    } else {
        echo "La clave no es correcta";
        echo"<br>";
        for($mul=1;$mul<=10;$mul++){
            echo $numero."*".$mul." = ".($numero*$mul);
            echo "<br>";
        };
    };
?>