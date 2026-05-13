<?php

    declare(strict_types=1);

    session_start();

    //Variables de Sessió que vindra les formularis dels animals de la secció apadrina
    //Van a ser utilitzades per al Carret per a les págines index.php, processaContacte.php i processaRegistre.php

    if(isset($_POST["quantitatAnimal"])){
        $_SESSION["quantitatAnimal"] = $_POST["quantitatAnimal"];
    }

    $preuQuantitat = "";
    if(isset($_SESSION["quantitatAnimal"])){
        $preuQuantitat = $_SESSION["quantitatAnimal"];
    }

    $quantitatSessio = $preuQuantitat;

    if(isset($_POST["id_animal"])){
        $_SESSION["id_animal"] = $_POST["id_animal"];
    }

    $idDBanimal = "";
    if(isset($_SESSION["id_animal"])){
        $idDBanimal = $_SESSION["id_animal"];
    }

    $idDBanimalSessio = $idDBanimal;

    //===========================================================================================

    //Aquest arxiu elimina un animal del array del carret i redirecciona a la 
    //pàgina del carrat de Compra

    include "Entity/CarretCompra.php";
    include "Entity/Animal.php";

    echo $_SESSION["carret"];
    
    $c1 = unserialize($_SESSION["carret"]);

    echo $c1->getAnimal($idDBanimalSessio);

    $c1->eliminarAnimal($idDBanimalSessio);

    $_SESSION["carret"] = serialize($c1);

    if(empty($_SESSION["carret"])){
        
        header("Location: ../index.php?id=apadrina");
        session_destroy();
        die();

    }else{
        
        header("Location: ../index.php?id=apadrina&mostrar=carret");
        //session_abort(); //Es mantenen les varibles -> no destreuix la sessio
        die();
    }

    //Buscar la forma de borrar les dades del carret quant es borren tots els elements
    //destruir sessió

?>

<!-- usort($array,function($a,$b){ //per ordenar ascendentment
return $a->getParametre() > $b->getParametre();
});  Per a mes avant-->