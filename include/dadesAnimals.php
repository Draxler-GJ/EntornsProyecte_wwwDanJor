<?php
        echo "<div>";

            $arrayAnimals = array("goril·la" => array("nom" => " Nfumu ngui","estat" => "Perill d'extinció", "hàbitat" => "Guinea Ecuatorial", "alimentació" => "Un gran nombre de fulles i de verdures variades.", "descripció" => "El nom científic de Floquet va ser Gorilla Gorilla, ja que va pertànyer a l'espècie de Gorilla Occidental. Aquest goril·la va néixer a Rio Muni i va ser descobert per uns caçadors a la Selva de Nko ubicada a Guinea Equatorial, que el van denominar «Gorila Blanco». El van vendre a un professor que era conservador al Centre d'Experimentació d'Ikunde de l'Ajuntament de Barcelona i el professor el va portar a Espanya l'any 66, convertint-se en protagonista de la portada de National Geographic l'any següent, convertint-se en un símbol del zoo de Barcelona i fent-se mundialment famós."),
                                  "linx" => array("nom" => "Lynx pardinus", "estat" => "Perill d'extinció", "habitat" => "Península Ibèrica", "alimentació" => "El suport principal de la dieta daquest linx és el conill. Durant els mesos d'hivern, quan les poblacions de conills són baixes, canviarà la base de presa al cérvol, daina, mufló i ànecs.", "descripció" => "L'espècie més rara de linx és el linx espanyol. El seu hàbitat natural són els boscos i les dunes de sorra obertes a zones aïllades d'Espanya i Portugal. És una espècie en perill d'extinció, amb només 1000 que romanen al mig silvestre. La seva valorada pell i les plagues agrícoles han reduït considerablement el seu hàbitat. Ara es troba principalment en un petit enclavament a Espanya i algunes poblacions disperses a zones remotes de Portugal."),
                                  "axolot" => array("nom" => "Ambystoma mexicanum", "estat" => "Perill d'extinció", "habitat" => "Zona central de la República Mexicana.", "alimentació" => "La seva dieta habitual en llibertat es basa en mol·luscs, cucs, larves d'insectes, cucs, artèmies, petits crustacis i peixos.", "descripció" => "De color negre o marró clapejat, albí o blanc, l'ajolot mexicà conserva la seva aleta dorsal de capgròs que s'estén gairebé per tot el cos que fa de 15 i fins a 30 centímetres de longitud, i les seves brànquies externes en forma de plomes sobresurten de la part del darrere del seu ample cap."),
                                  "dodo" => array("nom" => "Raphus cucullatus", "estat" => "Extinta", "habitat" => "En los bosques, en la Isla Mauricio, Madagascar.", "alimentació" => "S'alimentava de fruita i niava a terra.", "descripció" => "Era una au d'aproximadament un metre d'alçada, de plomatge grisenc i amb un pes, que segons anàlisis realitzades el 2012, rondava els 10 kg; no obstant això, altres publicacions estimen un rang dentre 9.5 i 17.5 kg."),
                                  "romansaurus" => array("nom" => "Romansaurus_Rex", "estat" => "A casa, amb els seus amos", "habitat" => "E.E.U.U", "alimentació" => "Brossa, lletuga i carlota", "descripció" => "Conill domèstic entrenat per el seu amo. Es un famòs 'youtuber' que cada día impresiona al món amb les seues carreres i la forma grasiosa de fer sprints.")
                                );
            
 
        //Aquest apartat es per a mostrar en imatges els animals
        //seleccionats per el checkbox del registre.partial.php

        // $animal_noms = "";
        // if(isset($_POST["animal_mes"])){
        //     $animal_noms = $_POST["animal_mes"];
        // }

        //Utilitzem el metode count() per veure la quantitat
        //de valors marcats als checkbox

        //$quantitatAnimals = count($animal_noms);
        //Finalment amb l'ús de un for o foreach
        //Mostrarem els animal que han sigut seleccionats

        // echo "<div>";
        // for($i = 0; $i < $quantitatAnimals; $i++){
        //     echo "<img src='../img/".$animal_noms[$i]."'> ";
        // } 
        // echo "</div>";

        echo "<h3>ANIMALS DEL MES: </h3>";

        echo "<table border='2'>";

        echo "<tr>";
        echo "<th colspan='3'><h3>DESCRIPCIÓ DELS ANIMALS</h3></th>";
        echo "</tr>";
        
                        $taulaAnimals = "";
                        if(!empty($_POST["animal_mes"])){
                                $taulaAnimals = $_POST["animal_mes"];
                        }else{
                                $taulaAnimals = [];
                        }

                        $fotoGorila = "gorilla-copito-de-nieve-bmc-paper.jpg";
                        $fotoLynx = "Linces.jpg";
                        $fotoAxolot = "ajolote.webp";
                        $fotoDodo = "dodo.jpg";
                        $fotoRomansaurus = "romansaurus.png";
                        $fotoRes = "kiwi-background.jpeg";

                        for($i = 0; $i < count($taulaAnimals); $i++){    
                                
                                foreach($arrayAnimals[$taulaAnimals[$i]] as $clau => $animalet){
                                        echo "<tr>";
                                        echo "<td rowspan='2'>";
                                                if($taulaAnimals[$i] == "goril·la"){
                                                        echo "<img src='../img/".$fotoGorila."' width='100px'>";
                                                }elseif($taulaAnimals[$i] == "linx"){
                                                        echo "<img src='../img/".$fotoLynx."' width='100px'>";   
                                                }elseif($taulaAnimals[$i] == "axolot"){
                                                        echo "<img src='../img/".$fotoAxolot."' width='100px'>";   
                                                }elseif($taulaAnimals[$i] == "dodo"){
                                                        echo "<img src='../img/".$fotoDodo."' width='100px'>";   
                                                }elseif($taulaAnimals[$i] == "romansaurus"){
                                                        echo "<img src='../img/".$fotoRomansaurus."' width='100px'>";   
                                                }
                                        echo "</td>";
                                        echo "</tr>";
                                        echo "<tr>";     
                                        echo "<td><strong>".$clau.": </strong></td>";
                                        echo "<td>".$animalet."</td>";
                                        echo "</tr>";
                                }
                        }

                
         echo "</table>";
        
         echo"</div>";
?>