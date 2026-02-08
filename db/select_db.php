<?php

    // $servidor =  "localhost";
    // $usuari = "root";
    // $contrasenya = empty($contrasenya)? "root" : "";
    // $db = "usuari_registre";

    // try{
    //     //Es creara la conexió
    //     $mysql = new mysqli($servidor, $usuari, $contrasenya, $db);
    //     /*
    //         new mysqli() es el objecte que PHP utiliza
    //         per a fer conexións a una base de dades, després
    //         empra algunes funciones que poden servir per
    //         fer el cred i manipular la base de dades
    //         amb la que treballem.
    //     */
    //         echo "Conexió feta amb exit";
    // }catch(Exception $e){
    //     die("Error de conexió a la base de dades ".$e);
    // }
    //raquest document es fara servir a la funció del usuari inxerit
    //la conexió es realitzara desde altre fitxer
    //Es comprobara que si el usuari ja exxisteix, que no deixe registralo
    $sql = "SELECT * FROM `usuaris` WHERE `correu_usuari` = '".$correu_sessioActual."'";

    $consulta = $mysql -> query($sql);
    if($consulta -> num_rows > 0){
        echo "<p class='db'> ERROR: Usuari ".$correu_sessioActual." ja existeix a la base de dades</p>";
        exit;
    }

    

?>