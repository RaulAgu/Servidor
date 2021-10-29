<!DOCTYPE html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="estilos.css"/>
    </head>

    <body>

        <?php
            $conexion=new mysqli("localhost", "root", "root", "heladeria");
            $listar_empleados="SELECT Id_empleado,Nombre,Cargo,Activo FROM empleados";
            $jamon=$conexion->query($listar_empleados);
            echo "<div class=cabecera>";
            echo fecha();
            echo "</div>";
            echo "<div class=resto>";
            echo "<table border=1 class=empleados>";
            echo "<th>";
            echo "Iniciar Sesión";
            echo "</th>";
            echo "<form name=empleado method=POST action=seleccion.php>";
            while($loncha=$jamon->fetch_array()){
                echo "<tr>";
                if($loncha[3]>0){
                    echo "<td>";
                    //Envía el nombre del usuario a la siguinte página
                    echo "<input type=submit name=nombre value=".$loncha[1].">";
                    echo "</td>";        
                }
                echo "</tr>";
            }
            echo "</form>";
            echo "</table>";

            function fecha(){
                date_default_timezone_set('UTC');
                echo date("G:i d/m/y");
            }

            $jamon->close();
            $conexion->close();
            echo "</div>";
        ?>
        
    </body>
</html>