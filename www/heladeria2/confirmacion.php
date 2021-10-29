<?php

    include "funciones.php";

    $codigo_empleado=$_POST['codigo_empleado'];
    $confirmar=$_POST['cobrar'];
    $comanda=unserialize($_POST['matriz']);

    if($confirmar=="cobrar"){
        $confirmacion=$_POST['cobrar'];
        foreach($comanda as $indice=>$valor){
            $reci = $indice/1000;
            $sab = $indice%1000;
            
            $sabor=$sab;
            $recipiente=round($reci);
            $cantidad = $valor;
            $idTicket=id_ticket();
            $prec = calc_precio($sab,round($reci))*$valor;
            echo "Pedido cobrado y guardado";
            $conexion=new mysqli("localhost", "root", "root", "heladeria");
            $meterTicket="INSERT INTO linea_ticket (Id_ticket,Id_articulo,Id_tipo,Cantidad,Precio_vendido) VALUES (".$idTicket.",".$sabor.",".$recipiente.", ".$cantidad.", ".$prec.")";
            $accion=$conexion->query($meterTicket);
        }
        registrar($GLOBALS["codigo_empleado"]); //registra la id del empelado en ticket
        echo "Pedido cobrado";
        echo "<form name=inicio action=index.php method=POST>";
        echo "<input type=submit value=VOLVER name=volver>";
        echo "</form>";
    }
    if($confirmar=="cancelar"){
        $confirmacion=$_POST['cancelar'];
        echo "Pedido cancelado";
        echo "<form name=inicio action=index.php method=POST>";
        echo "<input type=submit value=VOLVER name=volver>";
        echo "</form>";
    }

?>