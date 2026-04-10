<?php

    //Disposició del carret amb les variables de sessió dels carrets

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
                    echo "<li>Quantitat -> ".$quantitatSessio."</li><br>";

                    $total =  $quantitatSessio * $row["donacio"];
                    echo "<li>Total -> ".$total." €</li>";

                    
                }

                echo "</ul>";

                    if(empty($correuDB)){
                        echo "<strong>Usuari no registrat</strong>";
                        echo "<span>Total Apadrinats: ".$quantitatNova."</span>";
                    }else{
                        echo "<strong>Usuari: ".$correuDB."</strong>";
                        echo "<span>Total Apadrinats: ".$quantitatNova."</span>";
                    }

                echo "</div>";

            }

?>