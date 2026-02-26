<!--Queda pendent crear un div que mostre els animals-->

<!--Les variables de POST ara son subtituides per les variables de SESSIO -->

<?php 
    //Funcions per a capturar les sessions i que els estils
    //es mantiguen al navegar entre págines
    //session_start() i session_destroy()
    //obrin i trenquen aquestes sessions
    /*IMPORTANT! --> es necessari colocar-ho al inici de cada página*/
    session_start();

    ///Crea la variable de session sempre i quant existisca
    //i guradem en una altra variable el resultat de session si existix

    //Açò es la primera vegada que ho faig i sense preguntar o buscar codi, no tenia ni idea
    if(isset($_POST["estil"])){
        $_SESSION["estil"] = $_POST["estil"];
    }
    
    $estil = isset($_SESSION["estil"])? $_SESSION["estil"] : "";

    $estil_actual = $estil;

    //Variables de sessió de la página de processaRegistre.php

    //Nom i cogmons
    if(isset($_POST["nom"]) && isset($_POST["cognoms"])){
        $_SESSION["nom"] = $_POST["nom"];
        $_SESSION["cognoms"] = $_POST["cognoms"];
    }
    $nom_sessio = isset($_SESSION["nom"])? $_SESSION["nom"] : "";
    $cognom_sessio = isset($_SESSION["cognoms"])? $_SESSION["cognoms"] : "";

    $nom_sessioActual = $nom_sessio;
    $cognoms_sessioActual = $cognom_sessio;

    //Adreça

    if(isset($_POST["adresa"])){
        $_SESSION["adresa"] = $_POST["adresa"];
    }    
    $adresa_sessio = isset($_SESSION["adresa"])? $_SESSION["adresa"] : "";
    $adresa_sessioActual = $adresa_sessio;

    //Correu

    if(isset($_POST["correu"])){
        $_SESSION["correu"] = $_POST["correu"];
    }
    $correu_sessio = isset($_SESSION["correu"])? $_SESSION["correu"] :"";
    $correu_sessioActual = $correu_sessio;
    //Contraseya

    if (isset($_POST["password"])) {
        $_SESSION["password"] = $_POST["password"];
    }
    $pass_sessio = isset($_SESSION["password"])? $_SESSION["password"] : "";
    $pass_sessioActual = $pass_sessio;

    if(isset($_POST["repPassword"])){
        $_SESSION["repPassword"] = $_POST["repPassword"];
    }

    $repP_sessio = isset($_SESSION["repPassword"])? $_SESSION["repPassword"] : "";
    $repP_sessioActual = $repP_sessio;

    //Teléfon

    if (isset($_POST["telefon"])) {
        $_SESSION["telefon"] = $_POST["telefon"];
    }
    $telefon_sessio = isset($_SESSION["telefon"])? $_SESSION["telefon"] : 0;
    $telefon_sessioActual = $telefon_sessio;

    //Donació
    if(isset($_POST["donacio"])){
        $_SESSION["donacio"] = $_POST["donacio"];
    }
    $donacio_sessio = isset($_SESSION["donacio"])? $_SESSION["donacio"] : "";
    $donacio_sessioActual = $donacio_sessio;

    //Animal a apadrinar

    if(isset($_POST["animal"])){
        $_SESSION["animal"] = $_POST["animal"];
    }
    $animal_sessio = isset($_SESSION["animal"])? $_SESSION["animal"] : "";
    $animal_sessioActual = $animal_sessio;

    //Continent

    if (isset($_POST["continent"])) {
        $_SESSION["continent"] = $_POST["continent"];
    }
    $conti_sessio = isset($_SESSION["continent"])? $_SESSION["continent"] : "";
    $conti_sessioActual = $conti_sessio;

    //Animal en perill 
    //Açi s'utilitzara els mètodes serialize i uinserialize per 
    //a guardar en memòria dels dades dels arrays

    if(isset($_POST["animal_mes"])){
        $_SESSION["animal_mes"] = $_POST["animal_mes"];
    }
    isset($_SESSION["animal_mes"])? $taulerAni_unSessio = serialize($_SESSION["animal_mes"]) : $taulerAni_unSessio = "";
    
    $taulerAni_sessio = unserialize($taulerAni_unSessio );
    //preguntar

    //Comprobació que els camps de les contrasenyes son iguals, en cas de ser
    //el cas 
   
    include "funcions.php";
    comprobarContrasenya($pass_sessioActual, $repP_sessioActual);

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
    <title>REGISTRES D'USUARI</title>
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
        include "partial/css.partial.php";
        include "partial/cap.partial.php";

        //passar a processaContacte i processaRegistre i en basename saber aon estic
        if(empty($usuariActual)){
            include "partial/login.partial.php";
        }elseif(!empty($usuariActual)){
            echo "<div><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 640'><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path fill='rgb(255, 212, 59)' d='M352 188.5L300.1 175.5C293.6 173.9 288.8 168.4 288.1 161.7C287.4 155 290.9 148.6 296.8 145.6L337.6 125.2L294.3 92.7C288.8 88.6 286.5 81.4 288.7 74.8C290.9 68.2 297.1 64 304 64L464 64C494.2 64 522.7 78.2 540.8 102.4L598.4 179.2C604.6 187.5 608 197.6 608 208C608 234.5 586.5 256 560 256L538.5 256C521.5 256 505.2 249.3 493.2 237.3L479.9 224L447.9 224L447.9 245.5C447.9 270.3 460.7 293.4 481.7 306.6L588.3 373.2C620.4 393.3 639.9 428.4 639.9 466.3C639.9 526.9 590.8 576.1 530.1 576.1L32.3 576C29 576 25.7 575.6 22.7 574.6C13.5 571.8 6 565 2.3 556C1 552.7 .1 549.1 0 545.3C-.2 541.6 .3 538 1.3 534.6C4.1 525.4 10.9 517.9 19.9 514.2C22.9 513 26.1 512.2 29.4 512L433.3 476C441.6 475.3 448 468.3 448 459.9C448 455.6 446.3 451.5 443.3 448.5L398.9 404.1C368.9 374.1 352 333.4 352 291L352 188.5zM512 136.3C512 136.2 512 136.1 512 136C512 135.9 512 135.8 512 135.7L512 136.3zM510.7 143.7L464.3 132.1C464.1 133.4 464 134.7 464 136C464 149.3 474.7 160 488 160C498.6 160 507.5 153.2 510.7 143.7zM130.9 180.5C147.2 166 171.3 164.3 189.4 176.4L320 263.4L320 290.9C320 323.7 328.4 355.7 344 383.9L112 383.9C105.3 383.9 99.3 379.7 97 373.5C94.7 367.3 96.5 360.2 101.6 355.8L171 296.3L18.4 319.8C11.4 320.9 4.5 317.2 1.5 310.8C-1.5 304.4 .1 296.8 5.4 292L130.9 180.5z'/></svg>Hola ".$nomActual." <a href='./include/processaLogout.php'>Log Out</a></div>";
        }

        //include "partial/menu.partial.php";

         //include "partial/menu.partial.php";
        //he tingut problemes i no he pogut esdevinar
        //com fer funcionar lo de basename i $_SERVER['PHP_SELF']

        // if(empty($usuariActual)){
        //     include "include/partial/login.partial.php";
        // }elseif(!empty($usuariActual)){
        //     echo "<div>Hola ".$usuariActual." <a href='./include/processaLogout.php'>Log Out</a></div>";
        // }
    ?>
    
    <?php

        include 'partial/menu.partial.php';

    ?>
    <!-- Açi anira el text -> Usuari inserit correctamwent en la base de dades-->
    <?php 
        //include "funcions.php";
        insereixUsuari($nom_sessioActual ,$cognoms_sessioActual ,$correu_sessioActual ,$pass_sessioActual);
    ?>
    <?php
         //Inici del main
        echo "<main>";

        echo "<h1>DADES DE REGISTRE D'USUARI</h1>";
        //AQUESTA PART TRACTA DE PASSAR PER POST TOTS ELS
        //VALOSR PASSAT DEL FORMULARI
        //Camp Nom
        $nom = "";
        if(isset($_POST["nom"])){
            $nom = trim(htmlspecialchars($_POST["nom"]));
        }
        echo "<div>NOM: ".$nom_sessioActual."</div>";

        //Camp Cognoms
        $cognoms = "";
        if(isset($_POST["cognoms"])){
            $cognoms = trim(htmlspecialchars($_POST["cognoms"])); 
        }

        //(strcmp($cognoms_sessioActual, "cognoms") === 0)
        if(!empty($cognoms_sessioActual)){
            echo "<div>COGNOMS: ".(String)$cognoms_sessioActual."</div>";
        }
        else{
            echo "<div>COGNONS: <em>*_Valor Buit_*</em></div>";
        }
        
        //Camp Adreça
        $adresa = "";
        if(isset($_POST["adresa"])){
            $adresa = trim(htmlspecialchars($_POST["adresa"]));
            
        }

        //if(strcmp($adresa_sessioActual, "adresa") === 0)
        if(!empty($adresa_sessioActual)){
            echo "<div>ADREÇA: ".(String)$adresa_sessioActual."</div>";
        }
        else{
            echo "<div>ADREÇA: <em>*_Valor Buit_*</em></div>";
        }
        
        //Camp Correu
        $correu = "";
        if(isset($_POST["correu"])){
            //Reutilitce codi de processaContacte.php
            $correu = trim(htmlspecialchars($_POST["correu"]));
        }
        echo "<div>CORREU ELECTRÓNIC: ".$correu_sessioActual."</div>";

        //Camp Password
        $password = "";
        if(isset($_POST["password"])){
            $password = trim(htmlspecialchars($_POST["password"]));
        }
        echo "<div>CONTRASENYA: ".$pass_sessioActual."</div>";

        //Camp de confirmar si la contrasenya introuida es correcta
        $passwordRepetit = "";
        if(isset($_POST["repPassword"])){
            $passwordRepetit = trim(htmlspecialchars($_POST["repPassword"]));
        }

       
        //Camp telefón
        $telefon = "";
        if(isset($_POST["telefon"])){
            $telefon = trim(htmlspecialchars($_POST["telefon"])); 
        }

        //quant es treballen en variables de sessió no cal emprar strcmp, es millor empty per a vore si estan o no vuides
        //if(strcmp($telefon_sessioActual, "telefon") === 0)
        if(!empty($telefon_sessioActual)){
            echo "<div>TELÉFON: ".(String)$telefon_sessioActual."</div>";
        }else{
            echo "<div>TELÉFON: <em>*_Valor Buit_*</em></div>";
        }
        

        //Per a la donació empre un switch per a fer-ho més curt
        //per a no repetir els condicionls i fer-ho mes curt i net
        
        $donacio = "";
        if(isset($_POST["donacio"])){
            $donacio = trim(htmlspecialchars($_POST["donacio"]));
        }

        switch($donacio_sessioActual){
            case "cinc":
                echo "<div>DONACIÓ: ".$donacio_sessioActual."</div>";
                break;
            case "deu":
                echo "<div>DONACIÓ: ".$donacio_sessioActual."</div>";
                break;
            case "vint":
                echo "<div>DONACIÓ: ".$donacio_sessioActual."</div>";
                break;
            case "res":
                echo "<div>DONACIÓ: ".$donacio_sessioActual."</div>";
                break;
            default:
                echo "<div>DONACIÓ: <em>*_Valor Buit_*</em></div>";
        }

        //Creació de un altre switch per a les fotos del select
        //Passat per $_POST['']

        $animal = "";
        if(isset($_POST["animal"])){
            $animal = trim(htmlspecialchars($_POST["animal"]));
        }

        switch($animal_sessioActual){
            case "goril·la":
                echo "<div>";
                echo "<strong>ANIMAL A APADRINAR: GORIL·LA ALBÍ</strong><br>";
                echo "<img src='../img/gorilla-copito-de-nieve-bmc-paper.jpg' alt='goril·la' width='300px' title='goril·la'>";
                echo "</div>";
                break;
            case "linx":
                echo "<div>";
                echo "<strong>ANIMAL A APADRINAR: LINX IBÉRIC</strong><br>";
                echo "<img src='../img/Linces.jpg' alt='linx' width='300px' title='linx'>";
                echo "</div>";
                break;
            case "axolot":
                echo "<div>";
                echo "<strong>ANIMAL A APADRINAR: AXOLOT</strong><br>";
                echo "<img src='../img/ajolote.webp' alt='goril·la' width='300px' title='goril·la'>";
                echo "</div>";
                break;
            case "dodo":
                echo "<div>";
                echo "<strong>ANIMAL A APADRINAR: DODO</strong><br>";
                echo "<img src='../img/dodo.jpg' alt='dodo' width='300px' title='dodo'>";
                echo "</div>";
                break;
            case "romansaurus":
                echo "<div>";
                echo "<strong>ANIMAL A APADRINAR: CONILL DE NOM ROMANSAURUS_REX</strong><br>";
                echo "<img src='../img/romansaurus.png' alt='conill' width='300px' title='conill'>";
                echo "</div>";
                break;
            default:
                echo "<div>ANIMAL A APADRINAR: <img src='../img/gorilla-silhouette-illustration-white-background-vector.jpg' alt='goril·la' width='300px' title='goril·la'></div>";
        }

        //Per als radiobutton utilitzare els condicionals i el mẃtode
        //strcmp(); per a camparar value del name passat per POST

        $continent = "";
        isset($_POST["continent"])? $continent = $_POST["continent"] : $continent = "";

        if(strcmp($conti_sessioActual, "Europa") == 0){
            echo "<div>CONTINENT: ".$conti_sessioActual."</div>";
        }elseif(strcmp($conti_sessioActual, "América") == 0){
            echo "<div>CONTINENT: ".$conti_sessioActual."</div>";
        }elseif(strcmp($conti_sessioActual, "Àsia") == 0){
            echo "<div>CONTINENT: ".$conti_sessioActual."</div>";
        }elseif(strcmp($conti_sessioActual, "Àfrica") == 0){
            echo "<div>CONTINENT: ".$conti_sessioActual."</div>";
        }elseif(strcmp($conti_sessioActual, "Oceanía") == 0){
            echo "<div>CONTINENT: ".$conti_sessioActual."</div>";
        }else{
            echo "<div>CONTINENT: <em>*_Valor Buit_*</em></div>";
        }


        include "dadesAnimals.php";

        //Fin del main>        
        echo "</main>";
    
        include "partial/peu.partial.php";
    ?>
</body>
</html>

<?php //include_once "funcions.php";
 registreAccionsUsuari($apartat_accio, $correu_sessioActual, $fitxer_usuari); esborrarSessions();?>