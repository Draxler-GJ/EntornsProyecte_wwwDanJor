<?php

    $servidor =  "localhost";
    $usuari = "root";
    $contrasenya = empty($contrasenya)? "root" : "";
    //$contrasenya = "";
    $db = "usuari_registre";

    try{
         //Es creara la conexió
         $mysql = new mysqli($servidor, $usuari, $contrasenya, $db);
         /*
             new mysqli() es el objecte que PHP utiliza
             per a fer conexións a una base de dades, després
             empra algunes funciones que poden servir per
             fer el cred i manipular la base de dades
             amb la que treballem.
         */
             //echo "Conexió feta amb exit";
    }catch(Exception $e){
         die("Error de conexió a la base de dades ".$e);
    }
    

?>