<?php
    $total=0;
    $masVotos=0;
    $masVotado;

    //Se cuenta el voto que se ha enviado

    if(isset($_POST["boton"])){ //Si se pulsa el boton, entra
        $vota=$_POST["candidato"];
        $votador=$_POST["votante"];
        $m=$_POST["matriz"];
        $total=$_POST["total"];
        $candidatos = unserialize($m);
        for($i=1;$i<=10;$i++){
            if($candidatos[$i]["nombre"]==$votador){
                $candidatos[$i]["voto"]=1;
            }
            if($candidatos[$i]["nombre"]==$vota){
                $candidatos[$i]["Nvotos"]++;
                $total++;
            }
        }

    } else {
        //Matriz con los candidatos y su número de votos
        $candidatos[1]["nombre"]="Raul";
        $candidatos[1]["voto"]=0;
        $candidatos[1]["Nvotos"]=0;
        $candidatos[2]["nombre"]="Cosmin";
        $candidatos[2]["voto"]=0;
        $candidatos[2]["Nvotos"]=0;
        $candidatos[3]["nombre"]="Miguel";
        $candidatos[3]["voto"]=0;
        $candidatos[3]["Nvotos"]=0;
        $candidatos[4]["nombre"]="Carlos";
        $candidatos[4]["voto"]=0;
        $candidatos[4]["Nvotos"]=0;
        $candidatos[5]["nombre"]="Manuel";
        $candidatos[5]["voto"]=0;
        $candidatos[5]["Nvotos"]=0;
        $candidatos[6]["nombre"]="Jorge";
        $candidatos[6]["voto"]=0;
        $candidatos[6]["Nvotos"]=0;
        $candidatos[7]["nombre"]="Liss";
        $candidatos[7]["voto"]=0;
        $candidatos[7]["Nvotos"]=0;
        $candidatos[8]["nombre"]="Presley";
        $candidatos[8]["voto"]=0;
        $candidatos[8]["Nvotos"]=0;
        $candidatos[9]["nombre"]="Clara";
        $candidatos[9]["voto"]=0;
        $candidatos[9]["Nvotos"]=0;
        $candidatos[10]["nombre"]="Sergio";
        $candidatos[10]["voto"]=0;
        $candidatos[10]["Nvotos"]=0;
    }
    // for($i=1;$i<=10;$i++){
    //     if($candidatos[$i]["nombre"]==$vota){
    //         $candidatos[$i]["Nvotos"] = $candidatos[$i]["Nvotos"] + 1;
    //         echo"Numero votos:".$candidatos[$i]["Nvotos"];
    //         $candidatos[$i]["voto"]=1;
    //     }
        
    // }
    echo"<html>";
        echo"<head>";
            echo"<title>ELECCIONES</title>";
            echo"<style>";
            echo "
            h1,h2,h3{
                color: #03045e;
                font-family:sans-serif;
                outline: #0000;
                outline-width: 1px;
                text-shadow: 0 0 3px #00b4d8;
            }
            h2{
                font-family:sans-serif;
                outline: #0000;
                outline-width: 1px;
            }
            b{
                color: #0077b6;
                font-family:sans-serif;
            }
            body{
                background-color: #caf0f8;
                text-align: center;

                padding-left: 100px;
                padding-right: 100px;
                
            }
            hr {
                height: 5px;
                background-color:#00b4d8;
            }
            select {
                background-color: #ade8f4;
                border-radius: 30px;
                
            }
            select:hover{
                background-color: #48cae4;
            }
            @keyframes example {
                0%   {color: white;}
                100%  {color: black;}
            }
            h2 {
                animation-name: example;
                animation-duration: 10s;
            }
            ";
            echo"</style>";
        echo"</head>";
        echo"<body align=center>";
            echo"<h1>ELECCIONES DELEGADO DAW2</h1>";
            echo"<hr>";
            if($total<10){
                //Si el numero de votos es menor a 10, deja elegir votante y candidato
                echo"<form name=ele method=POST action=elecciones.php>";
                    //Eleccion de votante
                    echo"<p>Quien vota:";
                    echo"<select name=votante type=text>";
                        for($i=1;$i<=10;$i++){
                            if($candidatos[$i]["voto"]==0){
                                echo"<option>".$candidatos[$i]["nombre"]."</option>";
                            }
                            
                        }
                    echo"</select>";
                    //Eleccion de candidato
                    echo"<p>Mi candidato:";
                    echo"<select name=candidato type=text>";
                        for($i=1;$i<=10;$i++){
                            echo"<option>".$candidatos[$i]["nombre"]."</option>";
                        }
                    echo"</select>";
                    echo"<br>";
                    $m=serialize($candidatos);
                    echo "<input type=hidden name=total value=$total>";
                    echo "<input type=hidden name=matriz value=$m>";
                    echo "<br>";
                    echo "<input type=submit value=votar name=boton>";
                echo"</form>";
            }else{
                //Si no queda nadie por votar, se muestra el ganador
                echo"<h2>Delegado: ";
                for($c=1;$c<=10;$c++){
                    for($i=1;$i<=10;$i++){
                        if($masVotos<$candidatos[$i]["Nvotos"]){
                            $masVotado=$candidatos[$i]["nombre"];
                            $masVotos=$candidatos[$i]["Nvotos"];
                        }
                    }
                }
                echo $masVotado."</h2>";

            }
            //Estadisticas sobre la votacion
            echo"<hr>";
            echo"<h3>Estadísticas sobre la votación:</h3>";
            for($i=1;$i<=10;$i++){
                echo $candidatos[$i]["nombre"].": "."<b>".$candidatos[$i]["Nvotos"]."</b>"." voto/s";
                echo"<br>";
                
            }
            echo"<br>";
            echo "Número de votos emitidos hasta el momento: "."<b>".$total."</b>"."/10";
            echo"<br>";
            echo "<i>Nota: si hay candidatos con el mismo número de votos, se eligirá delegado al que esté primero en la lista.</i>";
            echo"</form>";
            echo"<hr>";
        echo"</body>";
    echo"</html>";

/* hacer pagina con 
    titulo de "elecciones delegado daw2"
    elegir quien vota (cuadro expandible con nombres de clase)
    cuadro de texto con el candidato (cuadro expandible con nombres)
    boton de votar
    abajo, estadisticas con los que no han votado aun (asteriscos)
    cuando se vota, los datos se envian a la misma pagina
    el que haya votado, no puede votar otra vez
    se actualiza los q no ha votado aun
    se añade a la lista el candidato con sus votos
    tras hacerse los 10 votos, se elimina el poder poner votante y candidatos
    se muestra el ganador
*/
?>