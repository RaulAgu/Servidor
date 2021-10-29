<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />

<title>Agenda</title>

</head>
<body>
    <h1>Agenda de teléfonos</h1>
    <h2>Menú de introducción</h2>
    <p>• Si el nombre está vacío, se mostrará una advertencia.</p>
    <p>• Si el nombre que se introdujo no existe en la agenda, y el número de teléfono no está vacío, se añadirá a la agenda.</p>
    <p>• Si el nombre que se introdujo ya existe en la agenda y se indica un número de teléfono, se sustituirá el número de teléfono anterior.</p>
    <p>• Si el nombre que se introdujo ya existe en la agenda y no se indica número de teléfono, se eliminará de la agenda la entrada correspondiente a ese nombre.</p>


            <?php
                $conexion=new mysqli("localhost", "root", "root", "agenda");
                echo "<form name=contacto method=POST action=agendaTlf.php>";
                if(isset($_POST["nombre"])){
                    $nombre=$_POST["nombre"];
                    $numero=$_POST["numero"];
                    $comprobarNombre="SELECT Nombre from agenda WHERE Nombre='".$nombre."'";
                    if($nombre==null){//Si no hay nombre
                        echo"<h2>Error: No se ha introducido ningún nombre!</h2>";
                    } else if($comprobarNombre==null){//Si el nombre ya existe

                    }
                    } else { //Si el nombre y el número son nuevos
                        $intro="INSERT INTO agenda (Nombre,Telefono) VALUES ('".$nombre."',".$numero.")";
                        $accion=$conexion->query($intro);
                    }

                    echo "<td>";
                    echo "<input type=submit name=continuar value=CONTINUAR>";
                    echo "</td>";
                } else {
                    echo "<table border=1px>";
                    echo "<tr>";
                    echo "<th>Nombre</th>";
                    echo "<th>Numero</th>";
                    echo "<th>Comprobar y enviar</th>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>";
                    echo "<input type=text placeholder=Nombre name=nombre>";
                    echo "</td>";
                    echo "<td>";
                    echo "<input type=text placeholder=Numero name=numero maxlength=9>";
                    echo "</td>";
                    echo "<td>";
                    echo "<input type=submit name=seleccion value=INTRODUCIR>";
                    echo "</td>";
                }
                echo "</form>";

            ?>
        </tr>  
    </table>
</body>
</html>