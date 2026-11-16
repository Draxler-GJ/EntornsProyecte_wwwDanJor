<?php

//codi php per a processar l'eliminació de la imatge que es pyuje a la base de dades

session_start();

//scandir("../img/users");

//Variable de sessió del correu que ve de PRocessaLogin
    $correuDB = "";
    if(isset($_SESSION["correu_usuari"])){
        $correuDB = $_SESSION["correu_usuari"];
    }

    $usuariActual = $correuDB;

//Guardar en variable se session per a utilitzar en la funcio
$formatImg = "";

if(isset($_SESSION["format"])){
    $formatImg = $_SESSION["format"];
    //echo $formatImg;
}

$rutaArxiu = "../img/users/".$formatImg;

//Emprar la funció unlink() per a eliminar la imatge i tornar a tindre la imatge per defecte
if(file_exists($formatImg)){
    unlink($rutaArxiu);
}

//Una vegada la imatge siga eliminada, actualizar la imtage a la de per defecte per a que es mostre en la base de dades 'usuariDefecte.png'.

//Conectarse a la base de dades
include "../db/select_db.php";

if(!file_exists($formatImg)){

    //Actualitzem la taula usuaris per a que el camp imatge soles tinga "usuariDefecte.png"

    $consulta = "SELECT `imatge_usuari` FROM `usuaris` WHERE `correu_usuari` = '".$usuariActual."'";

    $resultat = $mysql->query($consulta);
    $row = $resultat->fetch_assoc();

    if($resultat->num_rows > 0){

        if(strcasecmp($row["imatge_usuari"], "usuariDefecte.png") != 0){

            $actualizar = "UPDATE `usuaris` SET `imatge_usuari` = 'usuariDefecte.png' WHERE `correu_usuari` = '".$usuariActual."'";

            if($mysql->query($actualizar) === TRUE){
                header("Location: ../index.php?id=index");
                die();
            }else{
                echo "Error. La imatge no ha sigut borrada";
                die();
            }
        }
    }

    $mysql->close();

}

