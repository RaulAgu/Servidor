<!DOCTYPE html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="estilos.css"/>
    </head>

    <body>
        <div class=cabecera>
            <h1>Heladeria de Invierno</h1>
        </div>
        <div class=resto>
        <?php
            $conexion=new mysqli("localhost", "root", "root", "heladeria");
            $listar_tipos="SELECT Id_tipo,Descripcion,Mult_precio FROM tipos";
            $jamon=$conexion->query($listar_tipos);
            //Recibe las variables enviadas de ticket
            $producto=$_POST["seleccion"];
            $nombre=$_POST["nombre"];
            //Saca de la base de datos el precio del producto seleccionado
            $precioArticulo= "SELECT Precio FROM articulos WHERE Nombre_Art='".$producto."'";
            $pBaseA=$conexion->query($precioArticulo);
            $pBase=$pBaseA->fetch_array();
            $precioLinea= "SELECT Precio_vendido FROM linea_ticket";
            $pSumaA=$conexion->query($precioLinea);
            $pSuma=$pSumaA->fetch_array();

            //Página
            echo "<h2>Buenas ".$nombre." </h2>";
            echo "<h2>Producto elegido: ".$producto."</h2>";

            echo "<table border=1>";
            echo "<form name=producto method=POST action=ticket.php>";
            echo "<tr>";
            echo "<th>Recipiente</th>";
            echo "<th>Precio</th>";
            echo "<th>Cantidad</th>";
            echo "</tr>";
            while($loncha=$jamon->fetch_array()){
                echo "<tr>";
                echo "<td>";
                echo "<img src=imgs/".$loncha[1].".jpg class=imagenes>";
                echo "</td>";
                echo "<td>";
                echo $loncha[2]."€";
                echo "</td>";
                echo "<td>";
                echo "<select value=cantidad name=cantidad>";
                echo "<option>0</option>";
                echo "<option>1</option>";
                echo "<option>2</option>";
                echo "<option>3</option>";
                echo "<option>4</option>";
                echo "<option>5</option>";
                echo "</td>";
                echo "</tr>";
            }
            
            // echo "<table border=1>";
            // echo "<tr>";
            // echo "<th>";
            // echo "Sabor";
            // echo "</th>";
            // echo "<th>";
            // echo "Precio base";
            // echo "</th>";
            // echo "</tr>";
            // echo "<tr>";
            // echo "<td>";
            // echo $producto;
            // echo "</td>";
            // echo "<td>";
            // echo $pBase[0];
            // echo "</td>";
            // echo "</tr>";
            // echo "<tr>";
            // echo "<th>";
            // echo "Recipiente";
            // echo "</th>";
            // echo "<th>";
            // echo "Cantidad";
            // echo "</th>";
            // echo "</tr>";
            // echo "<form name=producto method=POST action=ticket.php>";
            // echo "<tr>";
            // echo "<td>";
            // echo "<select value=envase name=envase>";
            // while($loncha=$jamon->fetch_array()){
            //     echo "<option>".$loncha[1]."</option>";
            // }
            // echo "</td>";
            // echo "<td>";
            // echo "<select value=cantidad name=cantidad>";
            // echo "<option>1</option>";
            // echo "<option>2</option>";
            // echo "<option>3</option>";
            // echo "<option>4</option>";
            // echo "<option>5</option>";
            // echo "</td>";
            // echo "</tr>";
            
            // while($loncha=$jamon->fetch_array()){
            //     echo "<tr>";
            //     echo "<td>";
            //     echo $loncha[1];
            //     echo "</td>";
            //     echo "<td>";
            //     echo $loncha[2];
            //     echo "</td>";
            //     echo "<td>";
            //     echo "<select value=cantidad name=cantidad>";
            //     echo "<option>0</option>";
            //     echo "<option>1</option>";
            //     echo "<option>2</option>";
            //     echo "<option>3</option>";
            //     echo "<option>4</option>";
            //     echo "<option>5</option>";
            //     echo "</td>";
            //     echo "</tr>";
            // }
            //Envía el nombre del usuario a la página anterior, escondido
            echo "<input type=hidden name=nombre value=".$nombre.">";
            //Envía el nombre del producto a la página anterior, escondido
            echo "<input type=hidden name=eleccion value=".$producto.">";
            //Envía el precio del producto a la página anterior, escondido
            echo "<input type=hidden name=precio value=".$pBase[0].">";
            echo "<tr>";
            echo "<td colspan=4>";
            echo "<input type=submit name=seleccion value=SIGUIENTE>";
            echo "</td>";
            echo "</tr>";
            echo "</form>";
            echo "</table>";

            //Cierra conexiones de la base de datos
            $pBaseA->close();
            $pSumaA->close();
            $jamon->close();
            $conexion->close();
        ?>
        </div>
    </body>
</html>