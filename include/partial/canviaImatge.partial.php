<?php


//partial per al canvi de imatge

$rutaCanviImatge = "./include/processaCanviImatge.php";
$rutaEliminaImatge = "./include/processaEliminaImatge.php";



?>

<h3>Canvi de imatge de perfil</h3>

<form method="POST" enctype="multipart/form-data" action="./include/processaCanviImatge.php">
    <!-- processaCanviImatge o processaEliminaImatge segons l'acció que triem -->

    <div><label for="tipo">Tipus: </label><input type="text" name="tipo" value="jpeg,jpg, gif o png" readonly></div>
    <div><label for="mida">Mida máxima: </label><input type="text" name="mida" value="400 KB" readonly></div>
    <div><label for="fitxer">Puja el fitxer: </label><input type="file" name="fitxer" placeholder="No s'ha seleccionat cap fitxer..." readonly></div>
    <div>
        <input type="submit" value="Envia" name="enviar">
        <input type="reset" value="Cancel·la" name="cancellar">
<?php

    //En aquesta secció de codi PHP anira el enllaç a processaEliminaImagte.php
    
?>
    </div>

</form>