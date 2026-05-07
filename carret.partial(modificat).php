<?php

    //Disposició del carret amb les variables de sessió dels carrets

    //aquest codi de mostrar sí que ha d'estar en carret.partial.php
            if(!isset($_SESSION["id"])){

                echo "<div class='nocarret'><strong><em>LES DADES DEL CARRET NO ESTAN ACCESIBLES</em></strong></div>";
            }elseif(isset($_SESSION["id"])){

                echo "<div class='carret' id='carret'>";

                include "./db/select_db.php";
                //comprovem que existeix una variable de sessio sobre el id del formulari
                //fem la consulta i agafem les dues variables de sesió del id i  la quantitat de animals
                //executem la consulta i posteriorment comprovem que el numero de files es superior a zero

                $carretSQL = 'SELECT * FROM `animals` WHERE `id` = '.$idDBanimalSessio;

                echo "<ul><h6>INFORMACIÓ CARRET</h6>";

                $carretConsulta = $mysql-> query($carretSQL);
                if($carretConsulta->num_rows > 0){

                    $row = $carretConsulta-> fetch_assoc();                

                    echo "<li>ID -> ".$idDBanimalSessio."</li><br>";
                    echo "<li>Nom -> ".$row["nom_comu"]."</li><br>";
                    echo "<li>Donació -> ".$row["donacio"]."</li><br>";
                    echo "<li>Quantitat -> ".$quantitatSessio."/".$quantitatSessio."</li><br>";

                    $total =  $quantitatSessio * $row["donacio"];
                    echo "<li>Total -> ".$total." €</li>";

                    
                }

                /*
                 * Despres d haver´hi creat el carret i la variable de sessió
                 * en index.php, en carret.partial.php, ficar en com totes les funcions de les 
                 * clases CarretAnimal i Animal, per a actualitzar les dades
                */

                //aquesta part hauria d'anar al fitxer index.php, en resposta al clic en afegir un nou animal al carret

                if(isset($_SESSION["carret"])){
                    //Pas 1. Deserialitzar la variable
                    $c1 = unserialize($_SESSION["carret"]);
                    //Pas 2. Es crea el carret amb la variable 
                    //Pas 3. Buscar el animal i obtindre les seues dades
                    $animal=$c1->getAnimal($idDBanimalSessio);
                    //Pas 4. Comprobar si existeix
                        if(isset($animal)){
                            $c1->canviarQuantitatAnimal(intval($idDBanimalSessio), floatval($quantitatSessio));
                        }else{
                            $animal=nouAnimal($idDBanimalSessio, $quantitatSessio);
                            $c1->afegirAnimal($animal);
                        }
                    //$objAnimal = serialize($c1);
                    //$c1->buidarCarret();
                    $_SESSION["carret"] = serialize($c1);
                    unset($c1);
                     echo "</ul>";

                      //el següent es queda en carret.partial.php
                        if(empty($correuDB)){
                            echo "<strong>Usuari no registrat</strong><br>";
                            echo "<span>Total Apadrinats: ".$quantitatSessio."</span>";
                        }elseif(!empty($correuDB)){
                            echo "<strong>Usuari: ".$correuDB."</strong><br>";
                            echo "<span>Total Apadrinats: ".$quantitatSessio."</span>";
                        }

                    echo "</div>";
                }else{
                    //no existeix: cal crear carret:
                    //cal comprovar si l'usuari està registrat o no
                    //si no està registrat:
                    //$c1= new CarretCompra(session_id());
                    //si està registrat:
                    //$c1 = new CarretCompra($correuUsuari);
                    //$animals=[];
                    //$animal=nouAnimal($idDBanimalSessio, $quantitatSessio);
                    //array_push($animals,$animal);
                    //$c1->setLlistatAnimals($animals);
                    //$_SESSION["carret"] = serialize($c1);
                    //unset($c1);

                    //el següent es queda en carret.partial.php
                     echo "</ul>";

                        if(empty($correuDB)){
                            echo "<strong>Usuari no registrat</strong><br>";
                            echo "<span>Total Apadrinats: ".$quantitatSessio."</span>";
                        }elseif(!empty($correuDB)){
                            echo "<strong>Usuari: ".$correuDB."</strong><br>";
                            echo "<span>Total Apadrinats: ".$quantitatSessio."</span>";
                        }

                    echo "</div>";
                }

    

                // echo "</ul>";

                //     if(empty($correuDB)){
                //         echo "<strong>Usuari no registrat</strong><br>";
                //         echo "<span>Total Apadrinats: ".$quantitatSessio."</span>";
                //     }elseif(!empty($correuDB)){
                //         echo "<strong>Usuari: ".$correuDB."</strong><br>";
                //         echo "<span>Total Apadrinats: ".$quantitatSessio."</span>";
                //     }

                // echo "</div>";

                //nouAnimal($idDBanimalSessio, $quantitatSessio);
                //echo $objAnimal;

            }

?>


object(CarretCompra)#1 (2) { ["idUsuari":"CarretCompra":private]=> string(26) "fi2lsatn2crusll7pabqud2sf5" 
                            ["llistatAnimals":"CarretCompra":private]=> array(1) { [0]=> object(Animal)#2 (7) { ["id":"Animal":private]=> int(1) ["nomComu":"Animal":private]=> string(15) "Goril·la Blanc" ["nomCientific":"Animal":private]=> string(10) "Nfumu Ngui" ["quantitat":"Animal":private]=> int(3) ["donacio":"Animal":private]=> float(20) ["descripcio":"Animal":private]=> string(603) "El nom científic de Floquet va ser Gorilla Gorilla, ja que va pertànyer a la espècie de Gorilla Occidental. Aquest goril·la va néixer a Rio Muni i va ser descobert per uns caçadors a la Selva de Nko ubicada a Guinea Equatorial, que el van denominar «Gorila Blanco». El van vendre a un professor que era conservador al Centre de Experimentació de Ikunde de la Ajuntament de Barcelona i el professor el va portar a Espanya al any 66, convertint-se en protagonista de la portada de National Geographic al any següent, convertint-se en un símbol del zoo de Barcelona i fent-se mundialment famós." ["imatgeAn":"Animal":private]=> string(17) "animalDefecte.png" } } } 

object(CarretCompra)#1 (2) { ["idUsuari":"CarretCompra":private]=> string(26) "o6dupm9319a8s3ek3676apcfkr" 
                            ["llistatAnimals":"CarretCompra":private]=> array(1) { [0]=> object(Animal)#2 (7) { ["id":"Animal":private]=> int(7) ["nomComu":"Animal":private]=> string(11) "Romansaurus" ["nomCientific":"Animal":private]=> string(15) "ROMANSAURUS_REX" ["quantitat":"Animal":private]=> int(1) ["donacio":"Animal":private]=> float(100) ["descripcio":"Animal":private]=> string(155) "Conill domèstic entrenat per el seu amo. Es un famòs youtuber que cada día impresiona al món amb les seues carreres i la forma grasiosa de fer sprints." ["imatgeAn":"Animal":private]=> string(17) "animalDefecte.png" } } } 