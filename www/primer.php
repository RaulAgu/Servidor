<html>
	<head>
	</head>
	<body>
		<h1>Mi Pagina</h1>
		<?php
			//Comentario
			/*Comentario
			largo*/
			
			//Variables
			$a=33; //Variuable de nombre a que tiene 33
			echo $a; //Muestra el 33
			$a="2"; //Se puede cambiar el tipo de la variable
			echo $a;
			echo "<br>"; //Salto de linea en comillas

			//Condición
			if($a>10){
				//Si se cumple
				echo"El número a es muy grande";
			} else {
				echo"Vale ".$a; 
			}
			echo "<br>";

			//For
			echo"Tabla del 8";
			echo "<br>";
			for($i=1;$i<=10;$i++){
				echo "8*".$i." = ".(8*$i);
				echo "<br>";
			};
			echo "<br>";

			//While
			$i=1;
			echo"Tabla del 9";
			echo "<br>";
			while($i<=10){
				echo "9*".$i." = ".(9*$i);
				echo "<br>";
				$i++;	
			}
			echo "<br>";

			//Vectores y matrices
			$vector[3]="Patata"; //El resto de posciones no existen
			$vector[8]="55"; //se pueden pner varios tipos de variables
			$vector["pepe"]="234.1"; //no hace falta poner números en los índices
			//Recorrer vector
			foreach($vector as $indice=>$valor){ //recorrer vector, en cada vuelta, sacando el índice y el contenido
				echo"indice: ".$indice.", valor: ".$valor;
				echo"<br>";
			}
			echo "<br>";
			
		?>
	</body>
</html>