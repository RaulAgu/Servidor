

<?php
    $conexion=new mysqli("localhost", "root", "root", "heladeria");
    $listar_productos="SELECT Id_articulo,Nombre_art,Precio,Activo FROM articulos";
    $listar_tipos="SELECT Id_tipo, Descripcion, Mult_precio FROM tipos";
    $jamon=$conexion->query($listar_productos);
    $jamon2=$conexion->query($listar_tipos);
    echo "<table border=1>";
    echo "<th>";
    echo "Sabor";
    echo "</th>";
    echo "<th>";
    echo "Precio Base";
    echo "</th>";
    while($loncha=$jamon->fetch_array()){ //fetch_array() corta el array y avanza
        echo "<tr>";
        if($loncha[0]>0){
            echo "<td>";
            echo $loncha[1];
            echo "</td>";   
            echo "<td>";
            echo $loncha[2]."€";
            echo "</td>";      
        }
        echo "</tr>";
    }s
    echo "</table>";

    echo "<table border=1>";
    echo "<th>";
    echo "Recipiente";
    echo "</th>";
    echo "<th>";
    echo "Multiplicador de Precio";
    echo "</th>";
    while($loncha2=$jamon2->fetch_array()){ //fetch_array() corta el array y avanza
        echo "<tr>";
        if($loncha2[0]>0){
            echo "<td>";
            echo $loncha2[1];
            echo "</td>";   
            echo "<td>";
            echo  "x".$loncha2[2];
            echo "</td>";      
        }
        echo "</tr>";
    }
    echo "</table>";
    $jamon->close();
    $jamon2->close();
    $conexion->close();

?>