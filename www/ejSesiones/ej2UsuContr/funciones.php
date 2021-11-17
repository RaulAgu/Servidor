<!-- <?php

    // function estaIdentificado(){ //si ha metido su nombre, devuelve que está identificao
    //     if(isset($_SESSION['nombre'])){
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // function haCaducado(){ //devuelve true, si ha pasado x tiempo, y false si no los han pasado
    //     if(time()-$_SESSION['cuando']>5){
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // function entrar($usu,$con){ //si esta el usuario, true, sino false
    //     $respuesta=false;

    //     //Evitar inyeccion de codigo | Consulta pre-preparada
    //     $datos="mysql:host-localhost;dbname=heladeria";
    //     $conexion=new PDO($datos,"root","root");
    //     $orden="SELECT Nombre FROM empleados WHERE usuario=:u AND contrasena=:c";
    //     $resultado=$conexion->prepare($orden);
    //     $resultado->execute([':u'=>$usu,':c'=>$con]);
    //     //Sin evitar inyeccion de codigo
    //     // $conexion=new mysqli("localhost","root","root","heladeria");
    //     // $orden="SELECT Nombre FROM empleados WHERE usuario='".$usu."' AND contrasena='".$con."'";
    //     // $resultado=$conexion->query($orden);
    //     // if($registro=$resultado->fetch_array()){

    //     if($registro=$resultado->fetch()){
    //         $_SESSION['nombre']=$registro[0];
    //         $_SESSION['cuando']=time();
    //         $respuesta=true;
    //     } else {
    //         unset($_SESSION['nombre']);
    //         unset($_SESSION['cuando']);
    //     }
    //     return $respuesta;
    // }

?> -->
<?php
function estaIdentificado(){
	if(isset($_SESSION['nombre'])) return true;
	else return false;
}

function haCaducado(){
	if(time()-$_SESSION['cuando']>5) return true;
	else return false;
}

function entrar($usu,$con){
	$respuesta=false;
	$datos="mysql:host=localhost;dbname=heladeria";
	$conexion=new PDO($datos,"root","root");
	$orden="SELECT nombre FROM empleados ";
	$orden.="WHERE usuario=:u ";
	$orden.="AND contrasena=:c";
	$resultado=$conexion->prepare($orden);
	$resultado->execute([':u' => $usu,':c' => $con]);
	if($registro=$resultado->fetch()){
		$_SESSION['nombre']=$registro[0];
		$_SESSION['cuando']=time();
		$respuesta=true;
	}else{
		unset($_SESSION['nombre']);
		unset($_SESSION['cuando']);
	}
	return $respuesta;
}
?>	
	