<?php


//partial per al canvi de imatge

$rutaCanviImatge = "./include/processaCanviImatge.php";
$rutaEliminaImatge = "./include/processaEliminaImatge.php";

//Comprovar que exiteixen les variables pasades per get, si el fitxer no es correcte en mida o format
//isset($_GET["imatge"])? $_GET["imatge"] = "errorFormat" : $_GET["imatge"] = "errorMida";
?>

<h3>Canvi de imatge de perfil</h3>

<form method="POST" enctype="multipart/form-data" action="./include/processaCanviImatge.php">
    <!-- processaCanviImatge o processaEliminaImatge segons l'acció que triem -->

    <div><label for="tipo">Tipus: </label><input type="text" name="tipo" value="jpeg,jpg, gif o png" readonly></div>
    <?php
  
        //Si el format de la imatge no es equivalent es mostrara un missatge de error

        if(isset($_GET["imatge"]) && strcmp($_GET["imatge"], "errorFormat") == 0){
            echo "<span style='background: coral'>Error en el format. La imatge deu ser jpg, jpeg, gif o png</span>";
        }
    ?>
    <div><label for="mida">Mida máxima: </label><input type="text" name="mida" value="400 KB" readonly></div>
    <?php
        //Si la mida de la imatge no correspon a la mida estandar, es mostra un missatge de error

        if(isset($_GET["imatge"]) && strcmp($_GET["imatge"], "errorMida") == 0){
            echo "<span style='background: coral'>Error en la mida. La imatge no pot superar els 400 KB</span>";
        }
    ?>
    <div><label for="fitxer">Puja el fitxer: </label><input type="file" name="imatge" placeholder="No s'ha seleccionat cap fitxer..." readonly></div>
    <?php
        //Si el camp de seleccionar un arxiu queda vuit, es mostrara el missatge del error

        if(isset($_GET["imatge"]) && strcmp($_GET["imatge"], "errorPujada") == 0){
            echo "<span style='background: coral'>Error en la pujada del arxiu. No pot quedar vuit</span>";
        }
    ?>
    <div>
        <input type="submit" value="Envia" name="enviar">
        <input type="reset" value="Cancel·la" name="cancellar">
<?php

    //En aquesta secció de codi PHP anira el enllaç a processaEliminaImagte.php
    /*
        Aquest enllaç es mostrara es en el moment que es vuiga eliminar
        echo "<a href='#'>Elimina</a>";

    */
    if(file_exists("./img/users/".$formatImg)){
        echo "<em style='background: teal; border: 1px solid #000'><a href='./include/processaEliminaImatge.php'>Elimina Imatge</a></em>";
    }
?>
    </div>

</form>