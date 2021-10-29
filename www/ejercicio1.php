<?php
    if(isset($_POST["escondido"])){
        $cadena=$_POST["escondido"];
    } else {
        $cadena="";
    }
?>

<html>
    <body>
        <form name=uno method=POST action=ejercicio1rec.php>
            <p>Nombre:
            <input type=text name=nombre>
            <p>Contraseña:
            <input type=password name=contraseña>
            <p>Tipo:
            <select type=text name=tipo>
                <option>Alumno</option>
                <option>Profesor</option>
            </select>
            <p>Cadena:
            <input type=text name=cadena>
            <br>
            <input type=submit name=boton value="enviar">
        </form>
    </body>
</html>
