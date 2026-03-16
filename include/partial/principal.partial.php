<main>

    <?php

        switch($id){
            case "contacte":
                include "include/partial/contacte.partial.php";
                break;
            case "registre":
                include "include/partial/registre.partial.php";
                break;
            case "apadrina":
                include "include/partial/apadrina.partial.php";
                break;
            default:
                include "include/partial/inici.partial.php";
                break;
        }
    ?>

        <div class="carret">
        <?php

            //Disposició del carret amb les variables de sessió dels carrets

            
            if(isset($idDBanimalSessio)){

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
            }

            echo "</ul>";
        ?>
    </div>
</main>