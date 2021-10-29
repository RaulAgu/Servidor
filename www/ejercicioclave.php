
<html>
    <body>
        <form name=x method=POST action=ejercicioclave2.php>
            <p>CLAVE
            <input type=password name=contrasena>
            <p>FRASE
            <input type=text name=frase>
            <p>NUMERO
            <?php
                echo"<select name=numero>";
                    for($i=1;$i<=20;$i++){
                       echo"<option>".$i;
                       echo"</option>"; 
                    };
                echo"</select>";
            ?>
            <br>
            <input type=submit name=enviar>
        </form>
    </body>
</html>