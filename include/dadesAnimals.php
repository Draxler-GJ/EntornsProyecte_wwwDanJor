<div>
        <?php

            $arrayAnimals = array("goril·la" => array("nom" => " Nfumu ngui","estat" => "Perill d'extinció", "hàbitat" => "Guinea Ecuatorial", "alimentació" => "Un gran número de hojas y de verduras variadas.", "descripció" => "El nombre científico de Copito fue Gorilla Gorilla, ya que perteneció a la especie de Gorilla Occidental. Este gorila nació en Río Muni y fue descubierto por unos cazadores en la Selva de Nko ubicada en Guinea Ecuatorial, que lo denominaron «Gorila Blanco». Lo vendieron a un profesor que era conservador en el Centro de Experimentación de Ikunde del Ayuntamiento de Barcelona y el profesor lo trajo a España en el año 66, convirtiéndose en protagonista de la portada de National Geographic al siguiente año, convirtiéndose en un símbolo del zoo de Barcelona y haciéndose mundialmente famoso."),
                                  "linx" => array("nom" => "Lynx pardinus", "estat" => "Perill d'extinció", "habitat" => "Península Ibèrica", "alimentació" => "el apoyo principal de la dieta de este lince es el conejo. Durante los meses de invierno, cuando las poblaciones de conejos son bajas, cambiará su base de presa al ciervo, gamo, muflón y patos.", "descripció" => "La especie más rara de lince es el lince español. Su hábitat natural son los bosques y dunas de arena abiertas en zonas aisladas de España y Portugal. Es una especie en peligro de extinción, con solo 1000 que permanecen en el medio silvestre. Su valorada piel y las plagas agrícolas han reducido considerablemente su hábitat. Ahora se encuentra principalmente en un pequeño enclave en España y algunas poblaciones dispersas en zonas remotas de Portugal."),
                                  "axolot" => array("nom" => "Ambystoma mexicanum", "estat" => "Perill d'extinció", "habitat" => "Zona central de la República Mexicana.", "alimentació" => "Su dieta habitual en libertad se basa en moluscos, gusanos, larvas de insectos, lombrices, artemias, pequeños crustáceos y peces.", "descripció" => "De color negro o marrón moteado, albino o blanco, el ajolote mexicano conserva su aleta dorsal de renacuajo que se extiende casi por todo su cuerpo que mide de 15 y hasta 30 centímetros de longitud, y sus branquias externas en forma de plumas sobresalen de la parte trasera de su ancha cabeza."),
                                  "dodo" => array("nom" => "Raphus cucullatus", "estat" => "Extinta", "habitat" => "En los bosques, en la Isla Mauricio, Madagascar.", "alimentació" => "Se alimentaba de fruta y anidaba en el suelo.", "descripció" => "Era un ave de aproximadamente un metro de altura, de plumaje grisáceo y con un peso, que de acuerdo a análisis realizados en 2012, rondaba los 10 kg; sin embargo, otras publicaciones estiman un rango de entre 9.5 y 17.5 kg."),
                                  "romansaurus" => array("nom" => "Romansaurus_Rex", "estat" => "A casa, amb els seus amos", "habitat" => "E.E.U.U", "alimentació" => "Brossa, lletuga i carlota", "descripció" => "Conill domèstic entrenat per el seu amo")
                                );
            
        ?>

        <table border="2">

        <tr>
                <th colspan="3"><h3>DESCRIPCIÓ DELS ANIMALS</h3></th>
        </tr>
                <?php
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
                                        echo "</tr><br>";
                                }
                        }

                ?>
        </table>
</div>