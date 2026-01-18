<nav>
    <!--Averiguar sobre variable $_SERVER['PHP_SELF'] i metode basename-->
    <?php
    
        //comprovem qu el que be per GET per als enllaços
            $id = "";
            if(isset($_GET["id"])){
                $id = $_GET["id"];
            }

            
            //Declarem dos variables
            //No he aconseguit traureu per basename i $_SERVER
            //Aconseguit!!!!! Nomes es debía comparar el comparar el que 
            //la varible server treia amb index.php i després 
            if(strcmp(basename($_SERVER['PHP_SELF']),'index.php')==0){

                $inici = './index.php?id=inici';
                $contacte = './index.php?id=contacte';
                $registre = './index.php?id=registre';
                $apadrina = './index.php?id=apadrina';

            }else{

                $inici = '../index.php?id=inici';
                $contacte = '../index.php?id=contacte';
                $registre = '../index.php?id=registre';
                $apadrina = '../index.php?id=apadrina';

            }

            echo '<ul>';
            echo '<li><a href="'.$inici.'">Inici</a></li>';
            echo '<li><a href="'.$contacte.'">Contacte</a></li>';
            echo '<li><a href="'.$registre.'">Registre</a></li>';
            echo '<li><a href="'.$apadrina.'">Apadrina</a></li>';
            echo '</ul>';
    ?>


</nav>