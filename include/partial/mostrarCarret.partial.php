<?php

//Es açi on es comproba que si la variable de sessió existeix mostra el carret vuit 
// o per el contrari, mostra tots els animals
    echo "<div border='1'>";

    

       if (empty($_SESSION["carret"])) {
            echo "<div><p>El carret es troba vuit</p></div>";
       }elseif(!empty($_SESSION["carret"])){
            $c1 = unserialize($_SESSION["carret"]);
            $llistatAnimals = $c1->getLlistatAnimals();

            //var_dump($llistatAnimals);
            // print $llistatAnimals;    

            $c1->mostrarCarret();
       }

        echo "<a href='index.php?id=apadrina' style='text-align: center; color: yellowgreen'>Tornar a apadrinar</a>";

    echo "</div>";

?>