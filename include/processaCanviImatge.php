<?php

//Archiu de processat per al canvi de imatge segons l'usuari

session_start();

include "funcions.php";

//echo $_FILES["imatge"]["name"].PHP_EOL;
//echo $_FILES["imatge"]["size"].PHP_EOL;
//echo $_FILES["imatge"]["error"].PHP_EOL;
//echo $_FILES["imatge"]["type"];

//Variable de sessió del correu que ve de PRocessaLogin
    $correuDB = "";
    if(isset($_SESSION["correu_usuari"])){
        $correuDB = $_SESSION["correu_usuari"];
    }

$usuariActual = $correuDB;
  
//comprobar extensió

$format = comprobarExtensio($_FILES["imatge"]["type"]);

$fotoUsuari = "$usuariActual$format";#Nova forma de concatenació

//echo $fotoUsuari;

// die();

//Açi es fara un altre comprobament del error, probar en javaScript que si no hi ha fitxer es desabilita el boto, en cas de que no, el boto es pot utilitzar
if($_FILES["imatge"]["error"] == 4){
    header("Location: ../index.php?id=index&perfil=Canvi&imatge=errorPujada");
    die(); 
}

//Si la mida de la imatge es matjor a la mida maxima en bytes, redigis amb el error passat per get
if($_FILES["imatge"]["size"] >= 40000){
    header("Location: ../index.php?id=index&perfil=Canvi&imatge=errorMida");
    die();
}else{//En cas de que la mida siga la correcta, comprobara el format, si no es correcte botara l'altre error
//En cas de ser correcte, simplemnet direccionara

    if(strcmp($_FILES["imatge"]["type"],"image/png") != 0  && strcmp($_FILES["imatge"]["type"],"image/gif") != 0 && strcmp($_FILES["imatge"]["type"],"image/jpeg") != 0 && strcmp($_FILES["imatge"]["type"], "image/jpg") != 0){
        header("Location: ../index.php?id=index&perfil=Canvi&imatge=errorFormat");
        die(); 
    }else{

        //Donar permisos per a que la carpeta img del projecte tinga posibilitats de menjar arxius

        chmod("../img/users", 777);
        //die();

        //Guardar en variable se session per a utilitzar en la funcio

        if(isset($fotoUsuari)){
            $_SESSION["format"] = $fotoUsuari;
        }

        move_uploaded_file($_FILES["imatge"]["tmp_name"], "../img/users/".$_SESSION["format"]); //buscar aon colocar el arxiu. Mirar apunts

        header("Location: ../index.php?id=index");
        die();
    }

    //Aon estaba el problema en el OR
    /*
        Si amb un OR es cumplia una de les opcions donaba el error...
        La historia era utilitzar el AND, per permetria ser mes restrictiu, donant que si la imatge no complix ningun del formats,
        redirigia i mostraba el error.

        Anotació, quant hi ha un OR, es te que complir un dels parametres per que entre la condició, amb el AND els dos duen der TRUE
    */

}

