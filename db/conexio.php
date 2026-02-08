<?php

/*
    Aquestes van a ser plantilles sencilles de conexió a la base dades
    Serán modificables a mesura que el proyecta vatja creiquent
    Empleare els métodes de POO en PHP sobre MySQl
*/

    //Declaarció de variables per a fer la conexió
    $servidor =  "localhost";
    $usuari = "root";

    //$port = 3306; --> aquesta serà emprada quant siga bnecesari donat que
    //xampp i mysql poden treballar amb ports diferents, per defecte es el 3306
    //però comve no tocar-lo

    /*Aquesta variable canviara depenguent del sistema aon es treballe, pot tindre contrasenya o no*/

    $contrasenya = empty($contrasenya)? "root" : "";
    //$contrasenya = "" ;

    $db = "usuari_registre";
    //Tambe pot haber una variable per al nom de la base de dades

    //try-catch es la opció per realitzar la conexió
    //a la nostra base de dades

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
            echo "<p class='db'>Conexió feta amb exit</p>";
    }catch(Exception $e){
        die("Error de conexió a la base de dades ".$e);
    }

    $sql = "INSERT INTO `usuaris`(`nom_usuari` ,`cognoms_usuari` ,`correu_usuari` ,`contrasenya_usuari`) VALUES ('".$nom_sessioActual."', '".$cognoms_sessioActual."', '".$correu_sessioActual."', '".$pass_sessioActual."')";


        if($mysql -> query($sql) === TRUE){
            echo "<p class='db'>Usuari ".$correu_sessioActual." inserit correctament a la base de dades</p>";
            
        }elseif($mysql -> query($sql) === FALSE){
            //echo "Error d'inseció: ".$sql."<br/>".$mysql->error;
            echo "<p class='db'><span style='color: #f00'>ERROR:</span> Usuari ".$correu_sessioActual." no s'ha pogut inserir correctament en la base de dades</p>";
            
        }else{
            include "../include/funcions.php";
            usuariExistent();
        }

        $mysql->close();
?>