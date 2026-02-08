<header>

    <h1>APADRINA UN ANIMAL EN PERILL D'EXTINCIÓ</h1>

        <?php
            //Menú desplegable dels estils


              //el mateix proces que amb el menu passat el parametre per $_GET[]
            // $data_id = "";
            // isset($_GET["id"])? $data_id = $_GET["id"] : "";
            
    
            if(strcmp(basename($_SERVER['PHP_SELF']),"index.php") == 0){
                include "include/partial/data.partial.php";
            }else{
                include "partial/data.partial.php";
            }
        ?>

</header>
