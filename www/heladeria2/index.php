<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<link rel="stylesheet" type="text/css" href="estilos.css"/>

<title>Iniciar Sesión</title>
</head>
<body>
    <?php
        //Añade las funciones del archivo funciones.php
        include "funciones.php";
        //Declaración
        $codigo_empleado =0;
        $codigo_sabor=0;
        $codigo_recipiente=0;
        $cantidad=0;
        $comanda=array();

        //Muestro los empleados y envio cosas
        $conexion=new mysqli("localhost", "root", "root", "heladeria");
        $listar_empleados="SELECT Id_empleado,Nombre,Cargo FROM empleados WHERE Activo=1";
        $jamon=$conexion->query($listar_empleados);
        echo "<table>";
        while($registro=$jamon->fetch_array()){
            echo "<form name=empleado method=POST action=seleccion.php>";
                echo "<tr>";
                echo "<td>";
                echo "<form name=empleado method=POST action=seleccion.php>";
                echo "<input type=submit name=nombre value=".$registro[1].">";    
                echo "<input type=hidden name=codigo_empleado value=".$registro[0].">";
                echo "<input type=hidden name=codigo_sabor value=0>";
                echo "<input type=hidden name=codigo_recipiente value=0>";
                echo "<input type=hidden name=cantidad value=0>";
                echo "<input type=hidden name=comanda value=".serialize($comanda).">";
                echo "<input type=hidden name=precio value=0>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";            
        }

        $conexion->close();
        /*

        //Listar empleados
        echo "<div class=cabecera>";
        echo fecha();
        echo "</div>";
        echo "<div class=resto>";
        echo "<table border=1 class=empleados>";
        echo "<th>";
        echo "Iniciar Sesión";
        echo "</th>";
        // echo "<form name=empleado method=POST action=seleccion.php>";
        $codigo_empleado = listarEmpleados();
        // echo "</form>";
        echo "</table>";
        */
    ?>
</body>
</html>