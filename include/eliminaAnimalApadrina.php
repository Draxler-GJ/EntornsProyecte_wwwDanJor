<?php

    declare(strict_types=1);

    //<!-- Pagina que fa el mateix que eliminaAnimalCarret, pero evitar conflictes -->

    session_start();

    //==============================================================================================

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
    //Aquestes variables de sesio no son necesaries.... han de passar per get o post

    //===========================================================================================

    //Aquest arxiu elimina un animal del array del carret i redirecciona a la 
    //pàgina del carrat de Compra

    include "Entity/Animal.php";
    include "Entity/CarretCompra.php";

    echo $_SESSION["carret"];
    
    $c1 = unserialize($_SESSION["carret"]);

    if(isset($_GET["idEliminar"])){
        $idEliminar = $_GET["idEliminar"];

        $c1->getAnimal(intval($idEliminar));

        $c1->eliminarAnimal(intval($idEliminar));
    }

    $_SESSION["carret"] = serialize($c1);

    
    //retorna sense destruir la sessió
    header("Location: ../index.php?id=apadrina&mostrar=apadrina");
    session_destroy();
    die();

