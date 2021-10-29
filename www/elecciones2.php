<html>
    <head>
    </head>

    <body>
       <h1>Elecciones de delegado</h1>
       
       <?php
            if(isset($_POST["boton"])){ //Si se pulsa el boton, entra
                $res=$_POST["opcion"];
                echo $res;
                
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

            echo"<form name=elecciones action=elecciones2.php method=post>";
                echo"<select name=opcion type=text>";
                    echo"<option>Op1</option>";
                    echo"<option>Op2</option>";
                echo"</select>";
                echo "<input type=submit value=votar name=boton>";
            echo"</form>";
            if(isset($_POST["boton"])){ //Si se pulsa el boton, entra
                $res=$_POST["opcion"];
                echo $res;
            }
       ?>

    </body> 
</html>