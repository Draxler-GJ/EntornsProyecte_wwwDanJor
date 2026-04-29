<?php

    echo "<div>";

        $c1 = unserialize($_SESSION["carret"]);

        print $llistatAnimals;    

        $c1->mostrarCarret($llistatAnimals);

        echo "<a href='index.php?id=apadrina' style='text-align: center; color: yellowgreen'>Tornar al apadrina</a>";

    echo "</div>";

?>