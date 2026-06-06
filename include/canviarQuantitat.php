<?php

declare(strict_types=1);

session_start();

include "Entity/Animal.php";
include "Entity/CarretCompra.php";

//Esta vegada canvien la quantitat que es venia guardant desde la resyta de páginaes
//Per get agafem el valor i es guarda en la variable de Sessio quantitatAnimal
if(isset($_POST["canviarQuantitat"])){
        $_SESSION["canviarQuantitat"] = $_POST["canviarQuantitat"];
    }

$preuQuantitat = "";
if(isset($_SESSION["canviarQuantitat"])){
    $preuQuantitat = $_SESSION["canviarQuantitat"];
}

$quantitatCanviadaSessio = $preuQuantitat;


if(isset($_POST["id_animal"])){
    $_SESSION["id_animal"] = $_POST["id_animal"];
}

$idDBanimal = "";
if(isset($_SESSION["id_animal"])){
    $idDBanimal = $_SESSION["id_animal"];
}

$idDBanimalSessio = $idDBanimal;
//Aquestes variables no serveixen per aara


//=======================================================================================

//Aquest document emprara el métodes canviar Quantitat del animal del CarretCompre.php
$c1 = unserialize($_SESSION["carret"]);


if(isset($_POST["idSelect"])){
    $idSelecionat = htmlspecialchars($_POST["idSelect"]);
    //echo $quantitatCanviadaSessio;
    //echo $idSelecionat;
    echo $c1->canviarQuantitatAnimal(intval($idSelecionat),intval($quantitatCanviadaSessio));
   
    // die();
}


// echo $c1->canviarQuantitatAnimal(intval($idDBanimalSessio),intval($quantitatSessio)); 
// die();



header("Location: ../index.php?id=apadrina&mostrar=carret");
die();

?>