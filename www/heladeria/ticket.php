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
            // $loncha=$jamon->fetch_array();
            $nombre=$_POST["nombre"];
            echo "<h2>Buenas ".$nombre.", has iniciado sesión a las ".fecha()." </h2>";
            //Parte izquierda
            echo "<div class=izquierda>";
            echo "<h3>SELECCIÓN DE SABOR</h3>";
            echo "<table border=1>";
            //Envía el nombre del usuario a la siguinte página, escondido
            echo "<form name=pedido method=POST action=pedido.php>";
            echo "<tr>";
            while($loncha=$jamon->fetch_array()){
                if($loncha[3]>0){
                    echo "<td>";
                    echo "<input type=image class=imagenes src=imgs/".$loncha[1].".jpg name=seleccion value=".$loncha[1].">";     
                    echo "<input type=hidden name=seleccion value=".$loncha[1].">";
                    echo "</td>";
                }
            }
            echo "</tr>";
            echo "<input type=hidden name=nombre value=".$nombre.">";   
            echo "</form>";
            
            echo "</form>";
            echo "</table>";
            echo "</div>";
            $jamon->close();

            //parte derecha
            echo "<div class=derecha>";
            echo "<h3>TICKET</h3>";
            $progreso_ticket="SELECT Id_linea,Id_ticket,Id_articulo,Cantidad, Precio_vendido FROM linea_ticket";
            $jamon2=$conexion->query($progreso_ticket);
            if(isset($_POST["eleccion"])){
                //Lista de progreso del ticket
                $prod=$_POST["eleccion"];
                $envase=$_POST["envase"];
                $cantidad=$_POST["cantidad"];
                $precio=$_POST["precio"];
                echo "=====================";
                echo "<h3>".$prod."</h3>";
                echo $envase."<br/>";
                $multBases="SELECT Mult_precio FROM tipos WHERE Descripcion='".$envase."'";
                $multPrecio=$conexion->query($multBases);
                while($loncha2=$multPrecio->fetch_array()){
                    $precio=$precio*$loncha2[0];
                    echo $precio."€ la unidad"."<br/>";
                    echo $cantidad." unidades"."<br/>";
                    $precioConjunto=$precio*$cantidad;
                    echo "Precio total: ".$precioConjunto."<br/>";
                }
                echo "=====================";
                //Finalizar operaciones y crear ticket
                echo "<form name=ticket method=POST action=index.php>";
                echo "<input type=submit value=COBRAR name=cobrar>";
                
                $idEmpleado = "SELECT Id_empleado from empleados WHERE Nombre='".$nombre."'>";
                $idEmp = $conexion->query($idEmpleado);
                $crearTicket= "INSERT INTO tickets (Id_emp,Fecha) VALUES (".$idEmp.", now())";
                $nuevoTicket = $conexion->query($crearTicket);

            } else {
                echo "Sin pedidos";
                
            }

            echo "</div>";
            $jamon2->close();
            $conexion->close();
            function fecha(){
                date_default_timezone_set('UTC');
                $fecha = date("G:i d/m/y");
                return $fecha;
            }
            ?>
        </div>

    </body>
</html>