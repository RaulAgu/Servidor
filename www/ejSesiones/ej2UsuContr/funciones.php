<?php

    function estaIdentificado(){ //si ha metido su nombre, devuelve que está identificao
        if(isset($_SESSION['nombre'])){
            return true;
        } else {
            return false;
        }
    }

?>