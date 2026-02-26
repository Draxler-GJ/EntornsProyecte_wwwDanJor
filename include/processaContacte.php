<!--Queda fer el array en taula de cada fragfmen del textarea-->

<!--Les variables de POST ara son subtituides per les variables de SESSIO -->

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

    //Variables de sessió de la página de processaContacte.php

    //Correu

    if(isset($_POST["correu"])){
        $_SESSION["correu"] = $_POST["correu"];
    }
    $correu_sessio = isset($_SESSION["correu"])? $_SESSION["correu"] : "";
    $correu_sessioCont = $correu_sessio;

    //Assumpte

    if (isset($_POST["assumpte"])) {
        $_SESSION["assumpte"] = $_POST["assumpte"];
    }
    $assumpte_sessio = isset($_SESSION["assumpte"])? $_SESSION["assumpte"] : "";
    $assumpte_sessioCont = $assumpte_sessio;
    
    //Missage

    if (isset($_POST["missatge"])) {
        $_SESSION["missatge"] = $_POST["missatge"];
    }
    $miss_sessio = isset($_SESSION["missatge"])? $_SESSION["missatge"] : "";
    $miss_sessioCont = $miss_sessio;

    //Puntuació i rang de puntaució

    if(isset($_POST["punt"]) && isset($_POST["rango"])){
        $_SESSION["punt"] = $_POST["punt"];
        $_SESSION["rango"] = $_POST["rango"];
    }

    $punt_sessio = isset($_SESSION["punt"])? $_SESSION["punt"] : "";
    $punt_sessioCont = $punt_sessio;
    $rang_sessio = isset($_SESSION["rango"])? $_SESSION["rango"] : "";
    $rang_sessioCont = $rang_sessio;

    //Subtituir les variables de $_POST -> $_SESSION


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
?>


<!DOCTYPE html>
<html lang="ca">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DADES DE CONTACTE</title>
    <link rel="icon" type="image/x-icon" href="../img/kiwi-background.jpeg">
     <?php
        $estil = "";
        isset($_POST["estil"])? $estil = $_POST["estil"]: $estil = "";

        if(strcmp($estil_actual,"azure")==0){
            echo "<link rel='stylesheet' type='text/css' href='../css/azure-style.css'>";
        }elseif(strcmp($estil_actual,"crimson")==0){
            echo "<link rel='stylesheet' type='text/css' href='../css/crimson-style.css'>";
        }elseif(strcmp($estil_actual,"gold")==0){
            echo "<link rel='stylesheet' type='text/css' href='../css/gold-style.css'>";
        }elseif(strcmp($estil_actual,"sapphire")==0){
            echo "<link rel='stylesheet' type='text/css' href='../css/sapphire-style.css'>";
        }elseif(strcmp($estil_actual, "chaos") == 0){
            echo "<link rel='stylesheet' type='text/css' href='../css/chaos-style.css'>";
        }
        else{
            echo "<link rel='stylesheet' type='text/css' href='../css/style.css'>";
        }


    ?>
    <script src="../script/script.js"></script>
</head>
<body>
    <?php
        include "./partial/css.partial.php";
        include "partial/cap.partial.php";

        //passar a processaContacte i processaRegistre i en basename saber aon estic
        if(empty($usuariActual)){
            include "partial/login.partial.php";
        }elseif(!empty($usuariActual)){
            echo "<div><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 640'><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path fill='rgb(255, 212, 59)' d='M352 188.5L300.1 175.5C293.6 173.9 288.8 168.4 288.1 161.7C287.4 155 290.9 148.6 296.8 145.6L337.6 125.2L294.3 92.7C288.8 88.6 286.5 81.4 288.7 74.8C290.9 68.2 297.1 64 304 64L464 64C494.2 64 522.7 78.2 540.8 102.4L598.4 179.2C604.6 187.5 608 197.6 608 208C608 234.5 586.5 256 560 256L538.5 256C521.5 256 505.2 249.3 493.2 237.3L479.9 224L447.9 224L447.9 245.5C447.9 270.3 460.7 293.4 481.7 306.6L588.3 373.2C620.4 393.3 639.9 428.4 639.9 466.3C639.9 526.9 590.8 576.1 530.1 576.1L32.3 576C29 576 25.7 575.6 22.7 574.6C13.5 571.8 6 565 2.3 556C1 552.7 .1 549.1 0 545.3C-.2 541.6 .3 538 1.3 534.6C4.1 525.4 10.9 517.9 19.9 514.2C22.9 513 26.1 512.2 29.4 512L433.3 476C441.6 475.3 448 468.3 448 459.9C448 455.6 446.3 451.5 443.3 448.5L398.9 404.1C368.9 374.1 352 333.4 352 291L352 188.5zM512 136.3C512 136.2 512 136.1 512 136C512 135.9 512 135.8 512 135.7L512 136.3zM510.7 143.7L464.3 132.1C464.1 133.4 464 134.7 464 136C464 149.3 474.7 160 488 160C498.6 160 507.5 153.2 510.7 143.7zM130.9 180.5C147.2 166 171.3 164.3 189.4 176.4L320 263.4L320 290.9C320 323.7 328.4 355.7 344 383.9L112 383.9C105.3 383.9 99.3 379.7 97 373.5C94.7 367.3 96.5 360.2 101.6 355.8L171 296.3L18.4 319.8C11.4 320.9 4.5 317.2 1.5 310.8C-1.5 304.4 .1 296.8 5.4 292L130.9 180.5z'/></svg>Hola ".$nomActual." <a href='./include/processaLogout.php'>Log Out</a></div>";
        }

        //include "partial/menu.partial.php";
        //he tingut problemes i no he pogut esdevinar
        //com fer funcionar lo de basename i $_SERVER['PHP_SELF']
        //Solventat

        // if(empty($usuariActual)){
        //     include "include/partial/login.partial.php";
        // }elseif(!empty($usuariActual)){
        //     echo "<div>Hola ".$usuariActual." <a href='./include/processaLogout.php'>Log Out</a></div>";
        // }
    ?>
    
    <?php

        include 'partial/menu.partial.php';

    ?>
    <main>
        <?php

            echo "<h1>DADES DE CONTACTE</h1>";
        //Declarem totes les variables i comprovem que
        //per motius de seguretat, no s'inxerix codig malicios
            $correu = "";
            if(isset($_POST["correu"])){
                //Emprem el metode trim() per a "tallar"
                //els valors que li indiquem, en aquest cas utilitzant
                //el mètode htmlspecialchars per a que fatja eixa feïna
                //Repetir el process en totes les variables del formulario de
                //contavte i registre
                $correu = trim(htmlspecialchars($_POST["correu"]));
            }
            echo "<div>CORREU ELECTRÓNIC: ".$correu_sessioCont."</div>";

            $assumpte = "";
            if(isset($_POST["assumpte"])){
                $assumpte = trim(htmlspecialchars($_POST["assumpte"]));
            }
            echo "<div>ASSUMPTE: ".$assumpte_sessioCont."</div>";

            //El missatge del textare es mostrara de diferents estils segons 
            //si es mayuscula o minuscula

            $missatge = "";
            if(isset($_POST["missatge"])){
                $missatge = trim(htmlspecialchars($_POST["missatge"]));
            }
            //explode divideix la cadena en diferents parts per a crear un array
            $missatgeCom = explode(" ",$miss_sessioCont);

            echo "<div>MISSATGE: ";
            echo "<ul>";
            //Utilize el métode strlen per a contar la longitud de la cadena dins del bucle
            //es paregut a count per als arrays
            //S'emprara per a fer el diferents estils en un condicional
            for($i = 0; $i < count($missatgeCom); $i++){
                if(strlen($missatgeCom[$i]) <= 7){
                    echo "<li><span style='border: solid 1px pink;background: black;color: orange; margin: 2px;'>".$missatgeCom[$i]."</span></li>";
                }elseif($missatgeCom[$i] == "animal" || $missatgeCom[$i] == "apadrinar"){
                    echo "<li><span style='border: solid 1px gold;background: chocolate;color: silver; margin: 2px;'>".$missatgeCom[$i]."</span></li>";
                }elseif(strtoupper($missatgeCom[$i])){
                    echo "<li><span style='border: solid 1px red;background: gray;color: white; margin: 2px;'>".$missatgeCom[$i]."</span></li>";
                }elseif(strtolower($missatgeCom[$i])){
                    echo "<li><span style='border: solid 1px lime;background: teal; color: turquoise; margin:2px;'>".$missatgeCom[$i]."</span></li>";
                }
                else{
                    echo "<li><span style='border: solid 1px yellow;background: aquamarine;color: white; margin: 2px;'>".$missatgeCom[$i]."</span></li>";
                }
            }
            echo "</ul>";
            echo "</div>";

            //switch per a valorar la página i mostrar fotos del resultat
            //Declarem les variables
            $punt = "";
            if(isset($_POST["punt"])){
                $punt = $_POST["punt"];
            }

            $rango = "";
            //Declarem variables amb la ruta de cada imatge

            $capy1 = "../img/capybara_15454954.png";
            $capy2 = "../img/capybara_7743312.png";
            $capy3 = "../img/capybara_7743315.png";

            //Passem els valors del input type="range"
            $rang = 0;
            if(isset($_POST["rango"])){
                $rang = $_POST["rango"];
            }
            
            echo "<div>";
                switch($punt_sessioCont){
                    case "1":
                        $resultat = $punt_sessioCont * $rang_sessioCont;
                        echo "<div>PUNTUACIÓ: ".$punt_sessioCont." * ".$rang_sessioCont;
                        for($i = 0; $i < $resultat; $i++){
                            echo "<img src='".$capy1."' width='20px' title='capy1' alt='capy1'>";
                        }
                        echo "</div>";
                        break;
                    case "2":
                        $resultat = $punt_sessioCont * $rang_sessioCont;
                        echo "<div>PUNTUACIÓ: ".$punt_sessioCont." * ".$rang_sessioCont;
                        for($i = 0; $i < $resultat; $i++){
                            echo "<img src='".$capy1."' width='20px' title='capy1' alt='capy1'>";
                        }
                        echo "</div>";
                        break;
                    case "3":
                        $resultat = $punt_sessioCont * $rang_sessioCont;
                        echo "<div>PUNTUACIÓ: ".$punt_sessioCont." * ".$rang_sessioCont;
                        for($i = 0; $i < $resultat; $i++){
                            echo "<img src='".$capy2."' width='20px' title='capy1' alt='capy1'>";
                        }
                        echo "</div>";
                        break;
                    case "4":
                        $resultat = $punt_sessioCont * $rang_sessioCont;
                        echo "<div>PUNTUACIÓ: ".$punt_sessioCont." * ".$rang_sessioCont;
                        for($i = 0; $i < $resultat; $i++){
                            echo "<img src='".$capy2."' width='20px' title='capy1' alt='capy1'>";
                        }
                        echo "</div>";
                        break;
                    case "5":
                        $resultat = $punt_sessioCont * $rang_sessioCont;
                        echo "<div>PUNTUACIÓ: ".$punt_sessioCont." * ".$rang_sessioCont;
                        for($i = 0; $i < $resultat; $i++){
                            echo "<img src='".$capy3."' width='20px' title='capy1' alt='capy1'>";
                        }
                        echo "</div>";
                        break;
                    default:
                        echo "<div>PUNTUACIÓ: ".$punt_sessioCont;
                        echo "<img src='".$capy3."' width='20px' title='capy1' alt='capy1'>";
                        echo "</div>";
                        break;
                }
            echo "</div>";
        ?>
    </main>    
    <?php
        include "partial/peu.partial.php";
    ?>
</body>
</html>

<?php include "funcions.php"; registreAccionsUsuari($apartat_accio, $correu_sessioCont, $fitxer_usuari); esborrarSessions();?>