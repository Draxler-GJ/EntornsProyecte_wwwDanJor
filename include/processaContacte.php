<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DADES DE CONTACTE</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <?php
        include "partial/cap.partial.php";

        //include "partial/menu.partial.php";
        //he tingut problemes i no he pogut esdevinar
        //com fer funcionar lo de basename i $_SERVER['PHP_SELF']
    ?>
    
    <nav>
        <ul>
            <li><a href='../index.php?id=inici'>Inici</a></li>
            <li><a href='../index.php?id=contacte'>Contacte</a></li>
            <li><a href='../index.php?id=registre'>Registre</a></li>
            <li><a href='../index.php?id=apadrina'>Apadrina</a></li>
        </ul>
    </nav>
    <main>
        <?php 
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
            echo "<div>CORREU ELECTRÓNIC: ".$correu."</div>";

            $assumpte = "";
            if(isset($_POST["assumpte"])){
                $assumpte = trim(htmlspecialchars($_POST["assumpte"]));
            }
            echo "<div>ASSUMPTE: ".$assumpte."</div>";

            //El missatge del textare es mostrara de diferents estils segons 
            //si es mayuscula o minuscula

            $missatge = "";
            if(isset($_POST["missatge"])){
                $missatge = trim(htmlspecialchars($_POST["missatge"]));
            }
            //explode divideix la cadena en diferents parts per a crear un array
            $missatgeCom = explode(" ",$missatge);

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
                switch($punt){
                    case "1":
                        $resultat = $punt * $rang;
                        echo "<div>PUNTUACIÓ: ".$punt." * ".$rang;
                        for($i = 0; $i < $resultat; $i++){
                            echo "<img src='".$capy1."' width='20px' title='capy1' alt='capy1'>";
                        }
                        echo "</div>";
                        break;
                    case "2":
                        $resultat = $punt * $rang;
                        echo "<div>PUNTUACIÓ: ".$punt." * ".$rang;
                        for($i = 0; $i < $resultat; $i++){
                            echo "<img src='".$capy1."' width='20px' title='capy1' alt='capy1'>";
                        }
                        echo "</div>";
                        break;
                    case "3":
                        $resultat = $punt * $rang;
                        echo "<div>PUNTUACIÓ: ".$punt." * ".$rang;
                        for($i = 0; $i < $resultat; $i++){
                            echo "<img src='".$capy2."' width='20px' title='capy1' alt='capy1'>";
                        }
                        echo "</div>";
                        break;
                    case "4":
                        $resultat = $punt * $rang;
                        echo "<div>PUNTUACIÓ: ".$punt." * ".$rang;
                        for($i = 0; $i < $resultat; $i++){
                            echo "<img src='".$capy2."' width='20px' title='capy1' alt='capy1'>";
                        }
                        echo "</div>";
                        break;
                    case "5":
                        $resultat = $punt * $rang;
                        echo "<div>PUNTUACIÓ: ".$punt." * ".$rang;
                        for($i = 0; $i < $resultat; $i++){
                            echo "<img src='".$capy3."' width='20px' title='capy1' alt='capy1'>";
                        }
                        echo "</div>";
                        break;
                    default:
                        echo "<div>PUNTUACIÓ: ".$punt;
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