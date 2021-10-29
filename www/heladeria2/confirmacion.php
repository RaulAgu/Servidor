<?php

    include "funciones.php";

    $codigo_empleado=$_POST['codigo_empleado'];
    $comanda=unserialize($_POST['comanda']);

    if(isset($cobrar)){
        $confirmacion=$_POST['cobrar'];
        foreach($comanda as $indice=>$valor){
            $reci = $indice/1000;
            $sab = $indice%1000;
            
            $sabor=$sab;
            echo $sabor .", ";
            $recipiente=round($reci);
            echo $recipiente .", ";
            $cantidad = $valor;
            echo $cantidad .", ";
            $idTicket=id_ticket();
            echo $idTicket .", ";
            $prec = calc_precio($sab,round($reci))*$valor;
            echo $prec;
            $meterTicket="INSERT INTO linea_ticket (Id_ticket,Id_articulo,Id_tipo,Cantidad,Precio_vendido) VALUES (".$idTicket.",".$sabor.",".$recipiente.", ".$cantidad.", ".$prec.")";
            $accion=$conexion->query($meterTicket);
        }
        registrar($GLOBALS["codigo_empleado"]); //registra la id del empelado en ticket
        echo "Pedido cobrado";
        echo "<form name=inicio action=index.php method=POST>";
        echo "<input type=submit value=VOLVER name=volver>";
        echo "</form>";
    }
    if(isset($cancelar)){
        $confirmacion=$_POST['cancelar'];
        echo "<form name=inicio action=index.php method=POST>";
        echo "<input type=submit value=VOLVER name=volver>";
        echo "</form>";
    }

?>