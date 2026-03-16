<?php

    session_start();

    include "funcions.php";
    registreAccionsUsuari($apartat_accio,$usuari,$fitxer_usuari);

    //Aquest arxiu unica i esclusivament destreix totes les variables de sessió
    //amb unset y redigis a index.php

    //Falta averiguar com tancar sessió desde ProcessaContacte i processaREgistre, Aquest últim quant no es loguetja com a admin 
    //Dona problemes de ubicacció de arxiu desde les dues págines
    
        session_unset();
        session_destroy();

        header("Location: ../index.php?id=inici");
        die();


?>