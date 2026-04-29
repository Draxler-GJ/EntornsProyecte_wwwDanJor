<!-- <h3>En Manteniment</h3>

<picture>

    <img src="img/images.png" alt="Construcció" title="Constucció">

</picture> -->
<?php

    //Apartir de ara, en aquesta part hi ha gestionar el contigut del apadrinatge
    //Depenent el resultat per get que pase per la query string es mostrar els formularis
    //o els enllaços depeent de la acció que fajta l'usuari
    $mostrarEnllaç = isset($_GET["mostrar"])? $_GET["mostrar"] : "";

    switch($mostrarEnllaç){
        case "carret":
            include "./include/partial/mostrarCarret.partial.php";
            break;
        case "apadrina":
            include "./include/partial/mostrarApadrina.partial.php";
            break;
        default:
            mostrarAnimals(); //Falta arreglar els formularis per veure el id i que es pase com a varible
            //Averiguar el tema de putjar fotos a base de dades, donat que la funció mostrarAnimals agafa les rutes de la caprte img
            break;

    }
?>