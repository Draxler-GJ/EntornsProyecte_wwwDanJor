<?php

    
    //Disposició del carret amb les variables de sessió dels carrets

            if(!isset($_SESSION["id_animal"])){

                echo "<div class='nocarret'><strong><em>LES DADES DEL CARRET NO ESTAN ACCESIBLES</em></strong></div>";

            }elseif(isset($_SESSION["id_animal"])){

                echo "<div class='carret' id='carret'>";

                include "./db/select_db.php";
                //comprovem que existeix una variable de sessio sobre el id del formulari
                //fem la consulta i agafem les dues variables de sesió del id i  la quantitat de animals
                //executem la consulta i posteriorment comprovem que el numero de files es superior a zero

                $carretSQL = 'SELECT * FROM `animals` WHERE `id_animal` = '.$idDBanimalSessio;

                echo "<ul><h6>INFORMACIÓ CARRET</h6>";

                $carretConsulta = $mysql-> query($carretSQL);
                if($carretConsulta->num_rows > 0){

                        $row = $carretConsulta-> fetch_assoc();                

                        echo "<li>ID -> ".$idDBanimalSessio."</li><br>";
                        echo "<li>Nom -> ".$row["nom_comu"]."</li><br>";
                        echo "<li>Donació -> ".$row["donacio"]."€</li><br>";
                        
                        $idExistent = $_SESSION["id_animal"];
                        if($idDBanimalSessio === $idExistent){
                            echo "<li>Quantitat -> ".$quantitatSessio."/".$quantitatTotal."</li><br>";
                        }elseif($idDBanimalSessio != $idExistent){
                            echo "<li>Quantitat -> ".$quantitatSessio."/".$quantitatSessio."</li><br>";
                        }

                        $total = $quantitatSessio * $row["donacio"];
                        echo "<li>Total -> ".$total." €</li>";

                        echo $quantitatTotal;
                    
                    
                echo "</ul>";

                        if(empty($correuDB)){
                            echo "<strong><small>Usuari no registrat</small></strong><br>";
                            echo "<small>Total Apadrinats: ".$quantitatSessio."</small>";
                        }elseif(!empty($correuDB)){
                            echo "<strong><small>Usuari: ".$correuDB."</small></strong><br>";
                            echo "<small>Total Apadrinats: ".$quantitatSessio."</small>";
                        }

                echo "<hr>";
                
                echo "<span><img src='./img/carrito-de-compras.png' alt='Carret Compra' width='25'><a href='index.php?id=apadrina&mostrar=carret' rel='nofollow'>Ves al carret</a><br></span>";

                echo "<span><img src='./img/tarjeta-bancaria.png' alt='Apadrina' width='25'><a href='index.php?id=apadrina&mostrar=apadrina' rel='nofollow'>Apadrina</a></span>";
                
                echo "</div>";

                            
                }
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


?>