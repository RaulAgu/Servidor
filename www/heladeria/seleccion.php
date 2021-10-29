<!DOCTYPE html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="estilos.css"/>
    </head>

    <body>
        <div class=cabecera>
            <h1>Heladeria de Invierno</h1>
            <a href="index.php">Inicio</a>
        </div>
        <div class=resto>
        <?php
            $conexion=new mysqli("localhost", "root", "root", "heladeria");
            $listar_articulos="SELECT Id_articulo,Nombre_art,Precio,Activo FROM articulos";
            $jamon=$conexion->query($listar_articulos);
            $nombre=$_POST["nombre"];
            $sabor=false;
            echo "<h2>Buenas ".$nombre.", has iniciado sesión a las ".fecha()." </h2>";
            if(isset($_POST["seleccion"])){
                $sabor=$_POST["seleccion"];
                $listar_precio="SELECT Precio FROM articulos WHERE Nombre_art='".$sabor."'";
                $sacarPrecio=$conexion->query($listar_precio);
                $loncha3=$sacarPrecio->fetch_array();
                
                $cantidad=$_POST["cantidad"];
                $precioSel= $cantidad*$loncha3[0];
                echo "<h3>Sabor elegido: ".$sabor."</h3>";
                $sabor=true;
            } else{
                echo "<h3>Selecciona sabor</h3>";
            }
            //Parte izquierda
            echo "<div class=izquierda>";
            echo "<h3>SABORES</h3>";
            echo "<table border=1>";
             while($loncha1=$jamon->fetch_array()){
                echo "<form name=pedido method=POST action=seleccion.php>";
                if($loncha1[3]>0){
                    echo "<tr>";
                    echo "<td>";
                    echo "<input type=image class=imagenes src=imgs/".$loncha1[1].".jpg name=seleccion value=".$loncha1[1].">";     
                    echo "<input type=hidden name=seleccion value=".$loncha1[1].">";
                    echo "</td>";
                    echo "</tr>";
                    echo "<input type=hidden name=nombre value=".$nombre.">";
                    echo "</form>";
                }
                
            }
            echo "</table>";
            echo "</div>";

            //parte derecha
            echo "<div class=derecha>";
            echo "<h3>TICKET</h3>";
            echo "<p>==============</p>";
            if(isset($_POST["tipo"])){
                $recipiente=$_POST["tipo"];
                echo "<h4>".$sabor."</h4>";
                echo "<p>".$recipiente."</p>";
                echo "<p>".$cantidad."</p>";
            } else {
                echo "<h3>Selecciona un artículo</h3>";
                echo "<p>==============</p>";
            }
            echo "</div>";

            //parte central
            echo "<div class=medio>";
            if($sabor==true){
                echo "<h3>RECIPIENTES</h3>";
                $listar_tipos="SELECT Id_tipo,Descripcion,Mult_precio FROM tipos";
                $jamon=$conexion->query($listar_tipos);
                echo "<table border=1>";
                echo "<form name=recipiente method=POST action=seleccion.php>";
                echo "<tr>";
                echo "<th>Recipiente</th>";
                echo "<th>Precio</th>";
                echo "<th>Cantidad</th>";
                echo "</tr>";
                while($loncha2=$jamon->fetch_array()){
                    echo "<tr>";
                    echo "<td>";
                    echo "<input type=image class=imagenes src=imgs/".$loncha2[1].".jpg name=tipo value=".$loncha2[1].">";
                    echo "<input type=hidden name=nombre value=".$nombre.">";
                    if($sabor==true){
                    echo "<input type=hidden name=seleccion value=".$loncha1[1].">"; 
                    }
                    echo "</td>";
                    echo "<td>";
                    echo $loncha2[2]."€";
                    echo "</td>";
                    echo "<td>";
                    echo "<select value=cantidad name=cantidad>";
                    echo "<option>1</option>";
                    echo "<option>2</option>";
                    echo "<option>3</option>";
                    echo "<option>4</option>";
                    echo "<option>5</option>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</form>";
                echo "</table>";
            }
            echo "</div>";


            function fecha(){
                date_default_timezone_set('UTC');
                $fecha = date("G:i d/m/y");
                return $fecha;
            }

        echo "</div>";
        ?>