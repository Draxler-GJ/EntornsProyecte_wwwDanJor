<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRES D'USUARI</title>
    <?php
        $estil = "";
        isset($_POST["estil"])? $estil = $_POST["estil"]: $estil = "";

        if(strcmp($estil,"azure")==0){
            echo "<link rel='stylesheet' type='text/css' href='../css/azure-style.css'>";
        }elseif(strcmp($estil,"crimson")==0){
            echo "<link rel='stylesheet' type='text/css' href='../css/crimson-style.css'>";
        }else{
            echo "<link rel='stylesheet' type='text/css' href='../css/style.css'>";
        }


    ?>
</head>
<body>
    <?php
        include "partial/cap.partial.php";

        include "partial/menu.partial.php";

        //Inici del main
        echo "<main>";
        //AQUESTA PART TRACTA DE PASSAR PER POST TOTS ELS
        //VALOSR PASSAT DEL FORMULARI
        //Camp Nom
        $nom = "";
        if(isset($_POST["nom"])){
            $nom = trim(htmlspecialchars($_POST["nom"]));
        }
        echo "<div>NOM: ".$nom."</div>";

        //Camp Cognoms
        $cognoms = "";
        if(isset($_POST["cognoms"])){
            $cognoms = trim(htmlspecialchars($_POST["cognoms"])); 
        }

        if(strcmp($cognoms, "cognoms") == 0){
            echo "<div>COGNOMS: ".$cognoms."</div>";
        }
        else{
            echo "<div>COGNONS: <em>*_Valor Buit_*</em></div>";
        }
        
        //Camp Adreça
        $adresa = "";
        if(isset($_POST["adresa"])){
            $adresa = trim(htmlspecialchars($_POST["adresa"]));
            
        }

        if(strcmp($adresa, "adresa") == 0){
            echo "<div>ADREÇA: ".$adresa."</div>";
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
        echo "<div>CORREU ELECTRÓNIC: ".$correu."</div>";

        //Camp Password
        $password = "";
        if(isset($_POST["password"])){
            $password = trim(htmlspecialchars($_POST["password"]));
        }
        echo "<div>CONTRASENYA: ".$password."</div>";

        //Camp telefón
        $telefon = "";
        if(isset($_POST["telefon"])){
            $telefon = trim(htmlspecialchars($_POST["telefon"])); 
        }

        if(strcmp($telefon, "telefon") == 0){
            echo "<div>TELÉFON: ".$telefon."</div>";
        }else{
            echo "<div>TELÉFON: <em>*_Valor Buit_*</em></div>";
        }
        

        //Per a la donació empre un switch per a fer-ho més curt
        //per a no repetir els condicionls i fer-ho mes curt i net
        
        $donacio = "";
        if(isset($_POST["donacio"])){
            $donacio = trim(htmlspecialchars($_POST["donacio"]));
        }

        switch($donacio){
            case "cinc":
                echo "<div>DONACIÓ: ".$donacio."</div>";
                break;
            case "deu":
                echo "<div>DONACIÓ: ".$donacio."</div>";
                break;
            case "vint":
                echo "<div>DONACIÓ: ".$donacio."</div>";
                break;
            case "cinc":
                echo "<div>DONACIÓ: ".$donacio."</div>";
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

        switch($animal){
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

        if(strcmp($continent, "europa") == 0){
            echo "<div>CONTINENT: ".$continent."</div>";
        }elseif(strcmp($continent, "america") == 0){
            echo "<div>CONTINENT: ".$continent."</div>";
        }elseif(strcmp($continent, "asia") == 0){
            echo "<div>CONTINENT: ".$continent."</div>";
        }elseif(strcmp($continent, "africa") == 0){
            echo "<div>CONTINENT: ".$continent."<7div>";
        }elseif(strcmp($continent, "oceania") == 0){
            echo "<div>CONTINENT: ".$continent."</div>";
        }else{
            echo "<div>CONTINENT: <em>*_Valor Buit_*</em></div>";
        }

        //Aquest apartat es per a mostrar en imatges els animals
        //seleccionats per el checkbox del registre.partial.php

        $animal_noms = "";
        if(isset($_POST["animal_mes"])){
            $animal_noms = $_POST["animal_mes"];
        }

        //Utilitzem el metode count() per veure la quantitat
        //de valors marcats als checkbox

        $quantitatAnimals = count($animal_noms);
        //Finalment amb l'ús de un for o foreach
        //Mostrarem els animal que han sigut seleccionats

        echo "<div>";
        echo "<strong>ANIMAL DEL MES: </strong><br>";
        for($i = 0; $i < $quantitatAnimals; $i++){
            echo "<img src='../img/".$animal_noms[$i]."'> ";
        } 
        echo "</div>";

        include "dadesAnimals.php";

        //Fin del main>        
        echo "</main>";
    
        include "partial/peu.partial.php";
    ?>
</body>
</html>