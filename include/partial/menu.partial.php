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
        
    ?>

    <ul>
        <li><a href='./index.php?id=inici'>Inici</a></li>
        <li><a href='./index.php?id=contacte'>Contacte</a></li>
        <li><a href='./index.php?id=registre'>Registre</a></li>
        <li><a href='./index.php?id=apadrina'>Apadrina</a></li>
    </ul>
</nav>