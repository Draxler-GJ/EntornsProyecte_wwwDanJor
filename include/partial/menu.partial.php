<nav>
    <!--Averiguar sobre variable $_SERVER['PHP_SELF'] i metode basename-->
    <?php
    
        //comprovem que el que be per GET per als enllaços
            $id = "";
            if(isset($_GET["id"])){
                $id = $_GET["id"];
            }

            
            //Declarem dos variables
            //No he aconseguit traureu per basename i $_SERVER
            //Aconseguit!!!!! Nomes es debía comparar  que 
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
            //Els enllaço deixaran de ser enllaços depenent de aon fen clic
            //Falten que els enllaços en processaContacte i processaRegistre no es mostren com enllaços

            /*Pagina inici*/
            if(strcmp($id, "inici")== 0){
                echo '<li><span style="color: indigo; border: 1px solid indigo; background: #de2df0;">Inici</span></li>';
            }else{
                echo '<li><a href="'.$inici.'">Inici</a></li>';
            }

            /*Pagina contacte -> Tindre en compte el si el usuari esta logejat. mateix pass per a processaContacte*/
            if(strcmp($id, 'contacte') == 0 ){//|| !empty($usuariActual)
                echo '<li><span style="color: indigo; border: 1px solid indigo; background: #de2df0;">Contacte</span></li>';
            }else{
                echo '<li><a href="'.$contacte.'">Contacte</a></li>';
            }

            /*Pagina registra -> Es mantindra oculta sempre i quant no es vetja quant se esta logejat, donant que no es vora registre. En cas de no estar processaRegistre ha de tindre bloquejat l'estil*/
            if(!empty($usuariActual)){
                echo '<li><a href="'.$registre.'" style="display: none;">Registre</a></li>';
            }else{
                if(strcmp($id, 'registre') == 0){
                    echo '<li><span style="color: indigo; border: 1px solid indigo; background: #de2df0;">Registre</span></li>';
                }else{
                    echo '<li><a href="'.$registre.'">Registre</a></li>';
                }
            }
            
            /*Pagina apadrina*/
            if(strcmp($id, 'apadrina') == 0){
                echo '<li><span style="color: indigo; border: 1px solid indigo; background: #de2df0;">Apadrina</span></li>';
            }else{
                echo '<li><a href="'.$apadrina.'">Apadrina</a></li>';
            }
            
            echo '</ul>';
    ?>


</nav>