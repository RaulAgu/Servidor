<html>
    <body>
        <form name=x method=POST action=formulario2.php> <!--Action es la página donde se recibe los datos-->
            <input type=text name=nombre> <!--introducir texto-->
            <input type=submit name=boton value="enviar"> <!--botón para enviar-->
            <input type=hidden name=escondido value="hola"> <!--no aparece en el formulario, pero se envía-->
        </form>
    </body>
</html>