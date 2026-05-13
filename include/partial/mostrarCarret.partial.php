<?php

    echo "<div border='1'>";

        $c1 = unserialize($_SESSION["carret"]);

       if (!isset($_SESSION["carret"])) {
            echo "<div><p>El carret es troba vuit</p></div>";
       }else{
            $llistatAnimals = $c1->getLlistatAnimals();

            //var_dump($llistatAnimals);
            // print $llistatAnimals;    

            $c1->mostrarCarret();
       }

        echo "<a href='index.php?id=apadrina' style='text-align: center; color: yellowgreen'>Tornar a apadrinar</a>";

    echo "</div>";

?>