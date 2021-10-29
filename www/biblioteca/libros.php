<?php
    //Trabajando con mySQL


    //Acceso por mysqli

    //1º: Abrir la base de datos
    // new mysqli(host, usuario, contraeña, baseDatos); 
    $conexion=new mysqli("localhost", "root", "root", "biblioteca");

        //si no se puede conectar a la base de datos:
    if(mysqli_connect_errno()){
        die("Tenemos un problema ".mysqli_connect_error());  //Muestra el error y termina el programa
    }
    
    //2º: Creo la orden SQL
    $orden="SELECT CodigoLibro, Titulo, Autor FROM libros";

    /*Orden larga: 
    $orden="SELECT CodigoLibroLibro, Titulo, Autor ";
    $orden.="FROM libros "; Dejar espacio al final
    $orden.="FROM libros"; El .= es continuar la orden anterior */
    
    //3º: Ejecuo la orden
    if($jamon=$conexion->query($orden)){ //Comprueba errores en la bases de datos
    
        echo "<table border=1>";
        //4º: Corto el resultset en cosas "normales" (string, numero...)
        while($loncha=$jamon->fetch_array()){ //fetch_array() corta el array y avanza
            echo "<tr>";
            echo "<form name=f3 method=POST action=modifica_libro.php>";
            if($loncha[0]>0){
                echo "<td>";
                echo "<input type=text name=Titulo value='".$loncha[1]."'>"; //Titulo
                echo "</td>";
                echo "<td>";
                echo "<input type=text name=Autor value='".$loncha[2]."'>"; //Autor
                //comilllas simple para que coja todo el título,
                //no solo la primera palabra
                echo "</td>";
                echo "<td>";
                echo "<form name=f2 method=POST action=baja_libro.php>"; //botón de la baja 
                echo "<input type=submit name=b2 value=BAJA>";
                echo "<input type=hidden name=CodigoLibro value=".$loncha[0].">";

                echo "</td>";
                echo "<td>";
                echo "<input type=submit value=MODIFICAR name=b3>";
                echo "</td>";
                echo "<input type=hidden name=CodigoLibro value=".$loncha[0].">";
            }
            echo "</tr>";
            echo "</form>";
        }

        //PARA LAS ALTAS
        echo "<form name=f1 method=POST action=alta_libro.php>";
        echo "<tr>";
        echo "<td>";
        echo "<input type=text name=Titulo>";
        echo "</td>";
        echo "<td>";
        echo "<input type=text name=Autor>";
        echo "</td>";
        echo "<td>";
        echo "<input type=submit name=b1 value=NUEVO>";
        echo "</td>";
        echo "</form>";
        echo "</tr>";
        echo "</table>";
    }
    //5º: Tirar los restos
    $jamon->close();

    //6º: Cerrar la base de datos
    $conexion->close();
?>