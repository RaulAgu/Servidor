<html>
    <body>
        <?php
            $m[0][0] = "Manolo";
            $m[0][1] = 1234.12;
            $m[1][0] = "Luisa";
            $m[1][1] = 923.12;
            $m[2][0] = "Juan";
            $m[2][1] = 322.99;
            $m[3][0] = "Paco";
            $m[3][1] = 2331.2;
            echo maquinilla($m);

            function maquinilla($m){
                echo"<table border=1>";
                foreach($m as $a=>$b){
                    echo"<tr>";
                    foreach($b as $c=>$d){
                        echo"<td>";
                        echo $d;
                        echo"</td>";
                    }
                    echo"</tr>";
                }
                echo "</table>";
            }

        ?>
    </body>
</html>