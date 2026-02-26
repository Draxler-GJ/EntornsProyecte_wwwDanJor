<?php

    session_start();

    

    //Aquest arxiu unica i esclusivament destreix totes les variables de sessió
    //amb unset y redigis a index.php

    session_unset();
    session_destroy();

    header("Location: ../index.php?id=inici");
    die();

?>