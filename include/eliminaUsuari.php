<?php

//Aquest document tractra de borrar aquells usuaris que pasen per el parametre que vinga de get, en aquest cas agafant el id
    $borrarId = "";
    if(isset($_GET["id"])){
        $borrarId = $_GET["id"];
    }

    include "../db/select_db.php";

    $sql= "DELETE FROM `usuaris` WHERE `id` = ".$borrarId;

    if($mysql->query($sql) === TRUE){
        //SI la consulta de borrar es correcta es torna a la página de admin en index amb l'acció

        header("Location: ../index.php?accioadmin=eliminat");
        die();
    }else{
        //En cas de que no haja sigut aixina, es redirigeis marcant un error
        header("Location: ../index.php?accioadmin=errorbasedades");
        die();
    }

    //$mysql->close();

?>