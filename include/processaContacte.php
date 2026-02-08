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

        //include "partial/menu.partial.php";
        //he tingut problemes i no he pogut esdevinar
        //com fer funcionar lo de basename i $_SERVER['PHP_SELF']
        //Solventat
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

<?php include "funcions.php"; registreAccionsUsuari($apartat_accio, $usuari, $fitxer_usuari); esborrarSessions();?>