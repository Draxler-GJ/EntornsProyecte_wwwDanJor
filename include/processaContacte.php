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

      //Van a ser utilitzades per al Carret per a les págines index.php, processaContacte.php i processaRegistre.php

    if(isset($_POST["quantitatAnimal"])){
        $_SESSION["quantitatAnimal"] = $_POST["quantitatAnimal"];
    }

    $preuQuantitat = "";
    if(isset($_SESSION["quantitatAnimal"])){
        $preuQuantitat = $_SESSION["quantitatAnimal"];
    }

    $quantitatSessio = $preuQuantitat;

    if(isset($_POST["id_animal"])){
         $_SESSION["id_animal"] = $_POST["id_animal"];
    }

    $idDBanimal = "";
    if(isset($_SESSION["id_animal"])){
         $idDBanimal = $_SESSION["id_animal"];
    }

    $idDBanimalSessio = $idDBanimal;

        //Variable de sessio del carret
    //es fara us de serialize i unserialize 
    //cometada per a mes avant -> $_SESSION["carret"];
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
        }elseif(strcmp($estil_actual, "responsive") == 0){
            echo "<link rel='stylesheet' type='text/css' href='../css/style.responsive.css'>";
        }else{
            echo "<link rel='stylesheet' type='text/css' href='../css/style.css'>";
        }


    ?>
    <script src="../script/script.js"></script>
</head>
<body class="paytone-one-regular">
    <?php
        include "./partial/css.partial.php";
        include "partial/cap.partial.php";

        //passar a processaContacte i processaRegistre i en basename saber aon estic
        if(empty($usuariActual)){
            include "partial/login.partial.php";
        }elseif(!empty($usuariActual)){
            echo "<div><img src='../img/Hybrid-2025_mods-1.0.0.png.128x128_q95_crop.png' width='50'> Hola ".$nomActual." <a href='./processaLogout.php'>Log Out</a> <img src='./img/Hybrid-2025_mods-1.0.0.png.128x128_q95_crop.png' width='50'></div>";
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

            echo "<div><h2>MATRIU DEL MISSATGE</h2>";
            //per a veure com queda s'utilitzarem la funció random_int per a mostrar ls quantitat random de missatges
            //var_dump($missatgeCom);
            $random = random_int(0,10);
            //La matriu ens mostrara el missatge partit depenent de la part del missatge
            echo "<table border='1' class='matriu'>";
            
            for ($i=0; $i < count($missatgeCom); $i++) { 
                echo "<tr>";
                for ($j=0; $j < $random; $j++) {
                    //Estils segons la matriu 
                    if($random % 2 == 0){
                        echo "<td class='color'>".$missatgeCom[$i]."</td>";
                    }else{
                        echo "<td class='color2'>".$missatgeCom[$i]."</td>";
                    }

                    //Mateixos estils segons la longitud o si son minuscules o mayuscules
                    // if(strlen($missatgeCom[$i]) <= 7){
                    //     echo "<span style='border: solid 1px pink;background: black;color: orange; margin: 2px;'>".$missatgeCom[$i]."</span>";
                    // }elseif($missatgeCom[$i] == "animal" || $missatgeCom[$i] == "apadrinar"){
                    //     echo "<span style='border: solid 1px gold;background: chocolate;color: silver; margin: 2px;'>".$missatgeCom[$i]."</span>";
                    // }elseif(strtoupper($missatgeCom[$i])){
                    //     echo "<span style='border: solid 1px red;background: gray;color: white; margin: 2px;'>".$missatgeCom[$i]."</span>";
                    // }elseif(strtolower($missatgeCom[$i])){
                    //     echo "<span style='border: solid 1px lime;background: teal; color: turquoise; margin:2px;'>".$missatgeCom[$i]."</span>";
                    // }
                    // else{
                    //     echo "<span style='border: solid 1px yellow;background: aquamarine;color: white; margin: 2px;'>".$missatgeCom[$i]."</span>";
                    // }
                }
                echo "</tr>";
            }
            echo "</table>";

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
        
            <?php

                //Disposició del carret amb les variables de sessió dels carrets

                
                if(isset($_SESSION["id_animal"])){

                    echo "<div class='carret' id='carret'>";

                    include "../db/select_db.php";
                    //comprovem que existeix una variable de sessio sobre el id del formulari
                    //fem la consulta i agafem les dues variables de sesió del id i  la quantitat de animals
                    //executem la consulta i posteriorment comprovem que el numero de files es superior a zero

                    $carretSQL = "SELECT * FROM `animals` WHERE `id_animal` = ".$idDBanimalSessio."";

                    echo "<ul><h6>INFORMACIÓ CARRET</h6>";

                    $carretConsulta = $mysql-> query($carretSQL);
                    if($carretConsulta->num_rows > 0){

                        $row = $carretConsulta-> fetch_assoc();                

                        echo "<li>ID -> ".$idDBanimalSessio."</li><br>";
                        echo "<li>Nom -> ".$row["nom_comu"]."</li><br>";
                        echo "<li>Donació -> ".$row["donacio"]."</li><br>";
                        echo "<li>Quantitat -> ".$quantitatSessio."</li><br>";

                        $total =  $quantitatSessio * $row["donacio"];
                        echo "<li>Total -> ".$total." €</li>";
                    }

                    echo "</ul>";

                    echo "</div>";

                }elseif(!isset($_SESSION["id_animal"])){

                    echo "<div class='nocarret'><strong><em>LES DADES DEL CARRET NO ESTAN ACCESIBLES</em></strong></div>";
                }
            ?>

    </main>    
    <?php
        include "partial/peu.partial.php";
    ?>
</body>
</html>

<?php include "funcions.php"; registreAccionsUsuari($apartat_accio, $correu_sessioCont, $fitxer_usuari); esborrarSessions();?>