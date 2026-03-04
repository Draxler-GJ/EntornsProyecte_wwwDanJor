<?php 
    //Funcions per a capturar les sessions i que els estils
    //es mantiguen al navegar entre págines
    //session_start() i session_destroy()
    //obrin i trenquen aquestes sessions
    /*IMPORTANT! --> es necessari colocar-ho al inici de cada página*/

    session_start();
    include "include/funcions.php";
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

    //=======================================================================================================================

     //Guardem les variables de sesió necessaries per al login 
    //que després serań utilitzades

    //$nomDB = $_SESSION["nom_usuari"];$passwordDB = $_SESSION["contrasenya_usuari"];$correuDB = $_SESSION["correu_usuari"];

    //Variable de sessió del correu que ve de PRocessaLogin
    $correuDB = "";
    if(isset($_SESSION["correu_usuari"])){
        $correuDB = $_SESSION["correu_usuari"];
    }

    $usuariActual = $correuDB;
    

    //Variable de sessió de la contrasenya
    $passwordDB = "";
    if(isset($_SESSION["contrasenya_usuari"])){
        $passwordDB = $_SESSION["contrasenya_usuari"];
    }

    $contrasenyaActual = $passwordDB;

    //Variable de sessió que prove del nom
    $nomDB = "";
    if(isset($_SESSION["nom_usuari"])){
        $nomDB = $_SESSION["nom_usuari"];
    }

    $nomActual = $nomDB;

    //Variables de Sessió que vindra les formularis dels animals de la secció apadrina

    if(isset($_POST["quantitatAnimal"])){
        $_SESSION["quantitatAnimal"] = $_POST["quantitatAnimal"];
    }

    $preuQuantitat = "";
    if(isset($_SESSION["quantitatAnimal"])){
        $preuQuantitat = $_SESSION["quantitatAnimal"];
    }

    $quantitatSessio = $preuQuantitat;

    if(isset($_POST["id"])){
         $_SESSION["id"] = $_POST["id"];
    }

    $idDBanimal = "";
    if(isset($_SESSION["id"])){
         $idDBanimal = $_SESSION["id"];
    }

    $idDBanimalSessio = $idDBanimal;

?>


<!DOCTYPE html>
<html lang="ca">
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APADRINA A UN ANIMAL</title>
    <link rel="icon" type="image/x-icon" href="../img/kiwi-background.jpeg">
     <?php
        $estil = "";
        isset($_POST["estil"])? $estil = $_POST["estil"]: $estil = "";

        if(strcmp($estil_actual,"azure")==0){
            echo "<link rel='stylesheet' type='text/css' href='./css/azure-style.css'>";
        }elseif(strcmp($estil_actual,"crimson")==0){
            echo "<link rel='stylesheet' type='text/css' href='./css/crimson-style.css'>";
        }elseif(strcmp($estil_actual,"gold")==0){
            echo "<link rel='stylesheet' type='text/css' href='./css/gold-style.css'>";
        }elseif(strcmp($estil_actual,"sapphire")==0){
            echo "<link rel='stylesheet' type='text/css' href='./css/sapphire-style.css'>";
        }elseif(strcmp($estil_actual, "chaos") == 0){
            echo "<link rel='stylesheet' type='text/css' href='./css/chaos-style.css'>";
        }
        else{
            echo "<link rel='stylesheet' type='text/css' href='./css/style.css'>";
        }


    ?>

    <script src="./script/script.js"></script>
</head>
<body>
    <?php
        include "include/partial/css.partial.php";
        include 'include/partial/cap.partial.php';
        
        //passar a processaContacte i processaRegistre i en basename saber aon estic
        if(empty($usuariActual)){
            include "include/partial/login.partial.php";
        }elseif(!empty($usuariActual)){
            echo "<div><img src='./img/Hybrid-2025_mods-1.0.0.png.128x128_q95_crop.png' width='50'> Hola ".$nomActual." <a href='./include/processaLogout.php'>Log Out</a> <img src='./img/Hybrid-2025_mods-1.0.0.png.128x128_q95_crop.png' width='50'></div>";
        }
    ?>
    <?php
        if($usuariActual != "admin@daw.com"){
            include 'include/partial/menu.partial.php';
        }
    ?>
    <?php

        if($usuariActual == "admin@daw.com"){
            include 'include/partial/admin.partial.php';
        }else{
            include 'include/partial/principal.partial.php';
        }
    ?>
    <?php
        include 'include/partial/peu.partial.php';
    ?>
</body>
</html>

<?php registreApartat($fitxer, $apartat); ?>