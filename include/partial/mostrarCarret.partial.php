<?php

    echo "<div border='1'>";

        $c1 = unserialize($_SESSION["carret"]);

        $llistatAnimals = $c1->getLlistatAnimals();

        //var_dump($llistatAnimals);
        // print $llistatAnimals;    

        $c1->mostrarCarret();

        echo "<a href='index.php?id=apadrina' style='text-align: center; color: yellowgreen'>Tornar al apadrina</a>";

    echo "</div>";

?>