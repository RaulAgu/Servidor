<?php
    //EMPLEADOS
    //Para obetener el nombre del empleado seleccionado
    function sacarNombre($cod){ 
        $conexion=new mysqli("localhost", "root", "root", "heladeria");
        $sacarNombre="SELECT Nombre,Activo FROM empleados WHERE Id_empleado=".$cod."";
        $jamon=$conexion->query($sacarNombre);
        $loncha=$jamon->fetch_array();
        if($loncha[1]==1){
            return $loncha[0];
        }
        $conexion->close();
    }
    //Para listar todos los empleados (los activos)
    function listarEmpleados(){ 
        $conexion=new mysqli("localhost", "root", "root", "heladeria");
        $listar_empleados="SELECT Id_empleado,Activo FROM empleados";
        $jamon=$conexion->query($listar_empleados);

        echo "<form name=empleado method=POST action=seleccion.php>";
        while($codigo_empleado=$jamon->fetch_array()){
            echo "<tr>";
            if($codigo_empleado[1]>0){
                echo "<td>";
                echo "<form name=empleado method=POST action=seleccion.php>";
                //Envía el nombre del usuario a la siguinte página
                $nombre = sacarNombre($codigo_empleado[0]);
                echo "<input type=submit name=nombre value=".$nombre.">";
                set_empleado($codigo_empleado[0]);
                
                //Envía todo escondido
                echo "<input type=hidden name=codigo_empleado value=".get_empleado().">";
                echo "<input type=hidden name=codigo_sabor value=".$GLOBALS["codigo_sabor"].">";
                echo "<input type=hidden name=codigo_recipiente value=".$GLOBALS["codigo_recipiente"].">";
                echo "<input type=hidden name=cantidad value=".$GLOBALS["cantidad"].">";
                echo "<input type=hidden name=comanda value=".$GLOBALS["comanda"].">";
                echo "<input type=hidden name=precio value=".$GLOBALS["precio"].">";
                echo "</td>";
                echo "</form>";
            }
            echo "</tr>";
        }
        registrar($GLOBALS["codigo_empleado"]); //registra la id del empelado en ticket
        $conexion->close();
    }
    //Para establecer el empleado seleccionado
    function set_empleado($cod){
        $GLOBALS["codigo_empleado"] =$cod;
        
    } 
    //Para obtner la id del empleado
    function get_empleado(){
        return $GLOBALS["codigo_empleado"];
    }

    //SABORES
    //Para listar todos los sabores (los activos)
    function listar_sabores(){
        $conexion=new mysqli("localhost", "root", "root", "heladeria");
        $listar_sabores="SELECT Id_articulo,Nombre_art,Activo FROM articulos";
        $jamon=$conexion->query($listar_sabores);
        while($loncha=$jamon->fetch_array()){
            if($loncha[2]>0){
                echo "<form name=sabor method=POST action=seleccion.php>";
                echo "<input type=image class=imagenes src=imgs/".$loncha[1].".jpg name=seleccion value=".$loncha[1]."> <br />";   
                //set_sabor($loncha[0]);
                echo "<input type=hidden name=codigo_empleado value=".get_empleado().">";
                echo "<input type=hidden name=codigo_sabor value=".$loncha[0].">";
                echo "<input type=hidden name=codigo_recipiente value=0>";
                echo "<input type=hidden name=cantidad value=0>";
                echo "<input type=hidden name=comanda value=".$GLOBALS["comanda"].">";
                echo "<input type=hidden name=precio value=".$GLOBALS["precio"].">";
                echo "</form>";
            }
        }
        $conexion->close();
    }
    // function set_sabor($cod){
    //     $GLOBALS["codigo_sabor"] =$cod;
    // }
    //Para obtener el código del sabor seleccionado 
    function get_sabor(){
        return $GLOBALS["codigo_sabor"];
    }
    //Para obtener el nombre del sabor seleccionado 
    function sacar_sabor($cod){
        $conexion=new mysqli("localhost", "root", "root", "heladeria");
        $sacarNombre="SELECT Nombre_art FROM articulos WHERE Id_articulo=".$cod."";
        $jamon=$conexion->query($sacarNombre);
        $loncha=$jamon->fetch_array();
        return $loncha[0];
        $conexion->close();
    }

    //RECIPIENTES
    //Para listar todos los recipientes
    function listar_recipientes(){
        $conexion=new mysqli("localhost", "root", "root", "heladeria");
        $listar_sabores="SELECT Id_tipo,Descripcion,Mult_precio FROM tipos";
        $jamon=$conexion->query($listar_sabores);
        while($loncha=$jamon->fetch_array()){
            echo "<form name=recip method=POST action=seleccion.php>";
            echo "<input type=image class=imagenes src=imgs/".$loncha[1].".jpg name=recipiente value=".$loncha[1].">";
            //Calcula el precio de multiplicar el coste del sabor por el del recipiente
            $precioSabor=get_precio_sabor($GLOBALS["codigo_sabor"]);
            $multiplicador=get_multiplicador($loncha[0]);
            $precio=$precioSabor*$multiplicador;  
            echo "<br /> Precio conjunto: ".$precio;
            echo "<input type=hidden name=precio value=".$precio.">";
            $GLOBALS["precio"]=$precio;

            //Guarda el codigo del sabor, el del recipiente y el precio conjunto en la matriz comanda (comandaDes es la matriz comanda, pero 
            //deserializada)
            // anyadir_matriz();
            cantidad($GLOBALS["codigo_recipiente"]);
            echo "<input type=hidden name=codigo_empleado value=".get_empleado().">";
            echo "<input type=hidden name=codigo_sabor value=".$GLOBALS["codigo_sabor"].">";
            echo "<input type=hidden name=codigo_recipiente value=".$loncha[0].">";
            echo "<input type=hidden name=cantidad value=0>";
            echo "<input type=hidden name=comanda value=".$GLOBALS["comanda"].">";
            // anyadir_matriz();
            echo "</form>";
        }
        $conexion->close();
    }
    function sacar_recipiente($cod){
        $conexion=new mysqli("localhost", "root", "root", "heladeria");
        $sacarNombre="SELECT Descripcion FROM tipos WHERE Id_tipo=".$cod."";
        $jamon=$conexion->query($sacarNombre);
        $loncha=$jamon->fetch_array();
        $conexion->close();
        return $loncha[0];
    }

    function cantidad($cod){
        switch ($cod){
            case 1: 
                $GLOBALS["cantCono"]++;
                echo "<input type=hidden name=comanda value=".$GLOBALS["cantCono"].">";
                break;    
            case 2: 
                $GLOBALS["cantTar"] ++;
                echo "<input type=hidden name=comanda value=".$GLOBALS["cantTar"].">";
                break;
            case 3: 
                $GLOBALS["cantCub"]++;
                echo "<input type=hidden name=comanda value=".$GLOBALS["cantCub"].">";
                break;
            case 4: 
                $GLOBALS["cantDob"]++;
                echo "<input type=hidden name=comanda value=".$GLOBALS["cantDob"].">";
                break;      
        }
    }

    //PRECIO
    //Para sacar el precio base de los sabores
    function get_precio_sabor($cod){
        $conexion=new mysqli("localhost", "root", "root", "heladeria");
        $sacarPrecioSabor="SELECT Precio FROM articulos WHERE Id_articulo=".$cod."";
        $jamon=$conexion->query($sacarPrecioSabor);
        $loncha=$jamon->fetch_array();
        $conexion->close();
        return $loncha[0];
    }
    //Para obtener el multiplicador de los precios que tienen los recipientes
    function get_multiplicador($cod){
        $conexion=new mysqli("localhost", "root", "root", "heladeria");
        $sacarPrecioRecipiente="SELECT Mult_precio FROM tipos WHERE Id_tipo=".$cod."";
        $jamon=$conexion->query($sacarPrecioRecipiente);
        $loncha=$jamon->fetch_array();
        $conexion->close();
        return $loncha[0];
    }

    function calc_precio($cod1,$cod2){
        $conexion=new mysqli("localhost", "root", "root", "heladeria");
        $sacarPrecioSabor="SELECT Precio FROM articulos WHERE Id_articulo=".$cod1."";
        $jamon1=$conexion->query($sacarPrecioSabor);
        $loncha1=$jamon1->fetch_array();

        $sacarPrecioRecipiente="SELECT Mult_precio FROM tipos WHERE Id_tipo=".$cod2."";
        $jamon2=$conexion->query($sacarPrecioRecipiente);
        $loncha2=$jamon2->fetch_array();

        $precioSeleccion= $loncha1[0] * $loncha2[0];
        $conexion->close();
        return number_format($precioSeleccion,2);
    }

    // function mostrar_matriz(){
    //     if($GLOBALS["codigo_recipiente"]!=0){
    //     $comandaDes=unserialize($GLOBALS["comanda"]);



    //         // foreach($comandaDes as $i=>$v){ //Por cada elemento de h, se saca su indice y lo que tenga dentro
    //         //     foreach($v as $ii=>$vv){
    //         //             echo "Cod sabor:".$GLOBALS["codigo_sabor"];
    //         //             echo "<br>";
    //         //             echo "Cod recipiente:".$GLOBALS["codigo_recipiente"];
    //         //             echo "<br>";
    //         //             echo "Cantidad:".$vv;
    //         //             echo "<br>";
    //         //     }
    //         // }
    //     }
    // }
    // function anyadir_matriz(){
    //     if($GLOBALS["codigo_recipiente"]!=0){
    //         $comandaDes=unserialize($GLOBALS["comanda"]);

    //         $comandaDes[$GLOBALS["codigo_recipiente"]];

    //         // $comandaDes[$GLOBALS["codigo_sabor"]][$GLOBALS["codigo_recipiente"]]= calc_precio($GLOBALS["codigo_sabor"],$GLOBALS["codigo_recipiente"]);
    //         $GLOBALS["comanda"]=serialize($comandaDes);
    //     }
    // }

    function ver_lista(){
        $conexion=new mysqli("localhost", "root", "root", "heladeria");
        $idTicket=id_ticket();
        $verTicket="SELECT Id_ticket,Id_articulo,Id_tipo,Cantidad,Precio_vendido FROM linea_ticket WHERE Id_ticket=".$idTicket."";
        $accion=$conexion->query($verTicket);
        while($loncha=$accion->fetch_array()){
            echo "<br/>";
            echo "Sabor: ".sacar_sabor($loncha[1]);
            echo "<br/>";
            echo "Recipiente: ".sacar_recipiente($loncha[2]);
            echo "<br/>";
            echo "Cantidad: ".$loncha[3];
            echo "<br/>";
            echo "Precio: ".$loncha[4];
            echo "<p>===========</p>";
        }
    }

    function meter_ticket($cod1,$cod2,$cantidad){
        $conexion=new mysqli("localhost", "root", "root", "heladeria");
        $idTicket=id_ticket();
        if($cantidad=1){
            echo "entra";
            $meterTicket="INSERT INTO linea_ticket (Id_ticket,Id_articulo,Id_tipo,Cantidad,Precio_vendido) VALUES (".$idTicket.",".$cod1.",".$cod2.",1,".$cantidad.")";
            $accion=$conexion->query($meterTicket);
        } else {
            echo "else";
            $modifTicket="UPDATE linea_ticket SET Cantidad=".$cantidad." WHERE Id_ticket=".$idTicket.", Id_articulo=".$cod1.", Id_tipo=".$cod2."";
            $accion2=$conexion->query($modifTicket);
        }
        $conexion->close();
    }

    function comprobar_cantidad($cod1,$cod2){
        $conexion=new mysqli("localhost", "root", "root", "heladeria");
        $idTicket=id_ticket();
        $verTicket="SELECT Id_ticket,Id_articulo,Id_tipo,Cantidad,Precio_vendido FROM linea_ticket WHERE Id_ticket=".$idTicket."";
        $accion=$conexion->query($verTicket);
        echo "entra a cantitades","<br/>";
        while($loncha=$accion->fetch_array()){
            if($loncha[1]==$cod1 && $loncha[2]==$cod2){
                echo "entra a if","<br/>";
                $loncha[3]++;
                $modifTicket="UPDATE linea_ticket SET Cantidad=".$loncha[3]."";
                $accion2=$conexion->query($modifTicket);
                return $loncha[3];
            } else {
                echo "entra a otro","<br/>";
                return $loncha[3];
            }
        }
        $conexion->close();
    }


    //OTROS
    //Ajustes de fecha
    function fecha(){ 
        date_default_timezone_set('UTC');
        echo date("G:i d/m/y");
    }
    function registrar($cod){
        $conexion=new mysqli("localhost", "root", "root", "heladeria");
        $registrarEmp="INSERT INTO tickets (Id_emp,Fecha) VALUES (".$cod.", NOW())";
        $accion=$conexion->query($registrarEmp);
        $conexion->close();
    }

    function id_ticket(){
        $conexion=new mysqli("localhost", "root", "root", "heladeria");
        $sacarId="SELECT Id_ticket FROM tickets ORDER BY Id_ticket DESC";
        $jamon=$conexion->query($sacarId);
        $loncha=$jamon->fetch_array();
        $conexion->close();
        return $loncha[0];
    }

?>