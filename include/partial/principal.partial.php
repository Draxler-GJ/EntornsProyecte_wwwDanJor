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

        
    <?php

            
            include "include/partial/carret.partial.php";

            
        ?>
    
</main>