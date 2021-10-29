<?php
// Recojo todo
$codigo_empleado=$_POST['codigo_empleado'];
$comanda=unserialize($_POST['comanda']);
$codigo_sabor=$_POST['codigo_sabor'];
$codigo_recipiente=$_POST['codigo_recipiente'];
$cantidad=$_POST['cantidad'];
$precio=$_POST['precio'];

if($cantidad>0){
    // Esta comparando
    $indice=$codigo_recipiente*1000+$codigo_sabor;
    if(!isset($comanda[$indice])){
        $comanda[$indice]=$cantidad;
    }else{
        $comanda[$indice]+=$cantidad;
    }
}




?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<link rel="stylesheet" type="text/css" href="estilos.css"/>

<title>Menú de Selección</title>
</head>
<body>
    <?php
        //Añade las funciones del archivo funciones.php
        include "funciones.php";
        //Recibe las variables y la matriz
        echo"<div class=cabecera>";
        echo"<h1>Heladeria de Invierno</h1>";
        echo"<a href=index.php>Inicio</a>";
        echo"<h2>Buenas, ".sacarNombre($codigo_empleado)."</h2>";
        echo"</div>";

        //Resto de la pagina
        echo"<div class=resto>";

            //Parte izquierda (seleccion de sabores)
            echo"<div class=izquierda>";
            // listar_sabores();
            $conexion=new mysqli("localhost", "root", "root", "heladeria");
            $listar_sabores="SELECT Id_articulo,Nombre_art,Precio FROM articulos WHERE Activo=1";
            $jamon=$conexion->query($listar_sabores);
            while($loncha=$jamon->fetch_array()){
                echo "<form name=sabor method=POST action=seleccion.php>";
                echo "<input type=image class=imagenes src=imgs/".$loncha[1].".jpg name=seleccion value=".$loncha[1]."> <br />";   
                echo "<input type=hidden name=codigo_empleado value=".$codigo_empleado.">";
                echo "<input type=hidden name=codigo_sabor value=".$loncha[0].">";
                echo "<input type=hidden name=codigo_recipiente value=0>";
                echo "<input type=hidden name=cantidad value=0>";
                echo "<input type=hidden name=comanda value=".serialize($comanda).">";
                echo "<input type=hidden name=precio value=".$loncha[2].">";
                echo "</form>";
            }
        $conexion->close();
            echo"</div>";

            //Parte central (selección de recipientes)
            echo"<div class=medio>";
            if($codigo_sabor==0){
                echo "<h3>Elige un sabor a la izquierda para empezar</h3>";
                registrar($codigo_empleado);
            } else {
                echo "<h3>Sabor elegido: ".sacar_sabor($codigo_sabor)."</h3>";
                
                // listar_recipientes();
                $conexion=new mysqli("localhost", "root", "root", "heladeria");
                $listar_sabores="SELECT Id_tipo,Descripcion,Mult_precio FROM tipos";
                $jamon=$conexion->query($listar_sabores);
                while($loncha=$jamon->fetch_array()){
                    echo "<form name=recip method=POST action=seleccion.php>";
                    echo "<input type=image class=imagenes src=imgs/".$loncha[1].".jpg name=recipiente value=".$loncha[1].">";
                    //Calcula el precio de multiplicar el coste del sabor por el del recipiente
                    $precio=get_precio_sabor($codigo_sabor)*$loncha[2];
                    echo "<br /> Precio conjunto: ".$precio;
                    echo "<input type=hidden name=precio value=".$precio.">";
                    echo "<input type=hidden name=codigo_empleado value=".$codigo_empleado.">";
                    echo "<input type=hidden name=codigo_sabor value=".$codigo_sabor.">";
                    echo "<input type=hidden name=codigo_recipiente value=".$loncha[0].">";
                    echo "<input type=hidden name=cantidad value=1>";
                    echo "<input type=hidden name=comanda value=".serialize($comanda).">";
                    echo "</form>";
                }
                $conexion->close();

                
            }
            
            echo"</div>";

            //Parte derecha (progreso del ticket)
            echo "<div class=derecha>";
            echo "Ticket"."<br />";
            echo "=================="."<br/>";
            foreach($comanda as $indice=>$valor){

                $reci = $indice/1000;
                $sab = $indice%1000;
                echo "Sabor: ".sacar_sabor($sab)."<br />";
                echo "Recipiente: ".sacar_recipiente(round($reci))."<br />";
                echo "Cantidad: ".$valor."<br />";
                $prec = calc_precio($sab,round($reci))*$valor;
                echo "Precio: ".$prec."€"."<br />";
                
                // echo sacar_recipiente($reci)." ".sacar_sabor($sab)." ".$valor."<br>";
                echo "=================="."<br/>";
            }
            echo "<form name=cobrar method=POST action=confirmacion.php>";
                echo "<input type=submit value=COBRAR name=cobrar>";
                echo "<input type=hidden value=".serialize($comanda)." name=matriz>";
                echo "<input type=hidden value=cobrar name=cobrar>";
                echo "<input type=hidden name=codigo_empleado value=".$codigo_empleado.">";
            echo "</form>";
            echo "<form name=cancelar method=POST action=confirmacion.php>";
                echo "<input type=submit value=CANCELAR name=cancelar>";
                echo "<input type=hidden value=cancelar name=cobrar>";
                echo "<input type=hidden value=".serialize($comanda)." name=matriz>";
                echo "<input type=hidden name=codigo_empleado value=".$codigo_empleado.">";
            echo "</form>";
                // $conexion=new mysqli("localhost", "root", "root", "heladeria");
                // foreach($comanda as $indice=>$valor){
                //     $reci = $indice/1000;
                //     $sab = $indice%1000;
                    
                //     $sabor=$sab;
                //     echo $sabor .", ";
                //     $recipiente=round($reci);
                //     echo $recipiente .", ";
                //     $cantidad = $valor;
                //     echo $cantidad .", ";
                //     $idTicket=id_ticket();
                //     echo $idTicket .", ";
                //     $prec = calc_precio($sab,round($reci))*$valor;
                //     echo $prec;
                //     $meterTicket="INSERT INTO linea_ticket (Id_ticket,Id_articulo,Id_tipo,Cantidad,Precio_vendido) VALUES (".$idTicket.",".$sabor.",".$recipiente.", ".$cantidad.", ".$prec.")";
                //     $accion=$conexion->query($meterTicket);
                // }
            
            
            echo "</div>";
        echo "</div>";
    ?>
</body>
</html>