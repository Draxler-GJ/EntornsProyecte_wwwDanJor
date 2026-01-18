<?php 
    //Funcions per a capturar les sessions i que els estils
    //es mantiguen al navegar entre págines
    //session_start() i session_destroy()
    //obrin i trenquen aquestes sessions
    /*IMPORTANT! --> es necessari colocar-ho al inici de cada página*/

    session_start();

    //Crea la variable de session sempre i quant existisca
    //i guradem en una altra variable el resultat de session si existix

    //Açò es la primera vegada que ho faig i sense preguntar o buscar codi, no tenia ni idea
    if(isset($_POST["estil"])){
        $_SESSION["estil"] = $_POST["estil"];
    }
    
    $estil = isset($_SESSION["estil"])? $_SESSION["estil"] : "";

    $estil_actual = $estil;
    // if($estil_actual == $_SERVER['PHP_SELF']){
    
    //     header("Location: ./index.php");
    // }else{
    //     echo "Error de conexión";
    //     die();
    // }


?>


<!DOCTYPE html>
<html lang="ca">
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APADRINA A UN ANIMAL</title>
    <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->
     <?php
        $estil = "";
        isset($_POST["estil"])? $estil = $_POST["estil"]: $estil = "";

        if(strcmp($estil,"azure")==0){
            echo "<link rel='stylesheet' type='text/css' href='./css/azure-style.css'>";
        }elseif(strcmp($estil,"crimson")==0){
            echo "<link rel='stylesheet' type='text/css' href='./css/crimson-style.css'>";
        }elseif(strcmp($estil,"gold")==0){
            echo "<link rel='stylesheet' type='text/css' href='./css/gold-style.css'>";
        }elseif(strcmp($estil,"sapphire")==0){
            echo "<link rel='stylesheet' type='text/css' href='./css/sapphire-style.css'>";
        }elseif(strcmp($estil, "chaos") == 0){
            echo "<link rel='stylesheet' type='text/css' href='./css/chaos-style.css'>";
        }
        else{
            echo "<link rel='stylesheet' type='text/css' href='./css/style.css'>";
        }


    ?>
</head>
<body>
    <?php
        include "include/partial/css.partial.php";
        include 'include/partial/cap.partial.php';
    ?>
    <?php
        include 'include/partial/menu.partial.php';
    ?>
    <?php
        include 'include/partial/principal.partial.php';
    ?>
    <?php
        include 'include/partial/peu.partial.php';
    ?>
</body>
</html>

 <?php include "include/funcions.php";?>