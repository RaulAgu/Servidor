<?php
    function existe($libro){
            $c=conecta();
            $orden ="SELECT * FROM libros WHERE codigo=".$libro;
            $jamon=$c->query($orden); //Ejecuta la orden
            $c->close(); //cierra conexion
            if($loncha=$jamon->fetch_array()){
                return true; //Si puede cortar, el libro existe
            } else {
                return false;
            }
            
    }

    //Conectar
    function conecta(){
        $conexion=new mysqli("localhost", "root", "root", "biblioteca");
        return $conexion;
    }

    //libro de baja
    function dadoBaja($libro){
        $c=conecta();
        $orden ="SELECT activo FROM libros WHERE codigo=".$libro;
        $jamon=$c->query($orden); //Ejecuta la orden
        $c->close(); //cierra conexion
        $loncha=$jamon->fetch_array();
        if($loncha[0]==0){
            return true;
        } else {
            return false;
        }
        
    }

    function lectorBueno($codigo){
        $c=conecta();
        $orden ="SELECT activo FROM lectores WHERE activo = 1 AND codigo=".$codigo;
        $jamon=$c->query($orden); //Ejecuta la orden
        $c->close(); //cierra conexion
        $loncha=$jamon->fetch_array();
        if($loncha[0]==0){
            return true;
        } else {
            return false;
        }
    }

    function prestaLibro($libro,$lector){
        $c=conecta();
        $orden="SELECT max(CodigoLibro) FROM libros";
        $jamon=$c->query($orden); //Ejecuta la orden
        $siguiente =$loncha[0]+1;
        $loncha=$jamon->fetch_array();
        $c->close(); //cierra conexion
        $orden ="INSERT INTO prestamoes (codigo,codigo_libro, ";
        orden.="codigo_lector, fecha_prestamo, fecha_devolucion ";
        orden.=" VALUE (".$siguiente.", ".$libro.", ".lector.",now(),null()";
        $jamon=$c->query($orden);   
    }

    function estaPrestado($libro){
        $c=conecta();
        $orden ="SELECT activo FROM prestamos WHERE codigo_libro=".$codigo." AND fecha-devolucion IS NULL";
        $jamon=$c->query($orden); //Ejecuta la orden
        $c->close(); //cierra conexion
        $loncha=$jamon->fetch_array();
        if($loncha[0]==0){
            return true;
        } else {
            return false;
        }
    }

    function devuelve($libro){
        $c0conecta();
        $orden="UPDATE restamos ";
        $orden.=" SET fecha_devolucion=now() ";
        $orden.="WHERE codigo_libro
    }
?>