<?php
    declare(strict_types = 1);
    //=====================================================================================================
    /**
     * Métode que permet canviar imatge de l'usuari 
    */

    function imatgeBaseDades($correu){
        echo "$correu elentronic -> proximament";
        //Canviar en la base de dades usuari imatge pe defcte per una foto d'una mida aprox de 300m
    }


    //=====================================================================================================
    /*
      Métode per a crear un nou Animal Amb POO
    */

    function nouAnimal($id,$quantitat){

        include "./db/select_db.php";
        //include "./include/Entity/Animal.php";

        $id = intval($id);

        $consulta = "SELECT * FROM `animals` WHERE `id_animal` = ".$id;

        $resposta = $mysql -> query($consulta);

        $row = $resposta->fetch_assoc();

        $a = new Animal(intval($row["id_animal"]),$row["nom_comu"],$row["nom_cientific"],intval($quantitat),floatval($row["donacio"]),$row["descripcio"],$row["imatge"]);

        return $a;

    }


    //=====================================================================================================
    //Métode per a mostrar a cada formulari de la part apadrina els animals a apadrinar
    //Es fara amb el metode mostrarAnimls() i despreś una altra funció per al formulari

    const REGISTRE_PAGINA = 3;

    function mostrarAnimals(){

        isset($_GET["pagina"])? $pagina = $_GET["pagina"] : $pagina = 0;
        //define("NUM_PAGINES", 5); //varibles i constant per a determinar el total de págines i la paginació

        /**
         * Dins de les funcions no podem declarar cosntants
         * Aquestes empren el métode define per a declaralesç
         * En cas contrari es poden definir fora de la funció
        */

        include "./db/select_db.php";

        //Consulta per establir el total de LIMIT i OFFSET a la taula animals(incorporar mes animals en perill d'extinció)
                /*
                    Declaració de variables per a establir el limit
                    offset. numero de págines, numero de registres
                */

        //Calcular offset
        // $offset = intval($paginaActual) * $elementsPagina;

        // $offsetSQL = "SELECT * FROM `animals` LIMIT ".intval($paginaActual)." OFFSET ".$offset;

        //echo $offsetSQL;

        $offset = intval($pagina) * REGISTRE_PAGINA;


        $sql = "SELECT * FROM `animals` LIMIT ".REGISTRE_PAGINA." OFFSET ".$offset;
        /*Antiga setencia -> $sql = "SELECT * FROM `animals`";*/

        $consultaAnimals = $mysql -> query($sql);

        if($consultaAnimals -> num_rows > 0){
            echo "<div id='taulaDB'>";
            while($row = $consultaAnimals -> fetch_assoc()){
                echo "<div>";
                echo "ID -> ". $row['id_animal']."</br>";
                echo "NOM COMÚ -> ".$row['nom_comu']."</br>";
                echo "NOM CIENTÍFIC -> ".$row["nom_cientific"]."</br>";
                echo "DONACIÓ -> ".$row["donacio"]."€</br>";
                echo "DESCRIPCIÓ -> ".$row["descripcio"]."</br>";
                mostrarFormulariAnimals($row['id_animal']);
                echo "</div>";
                
            }

            echo "</div>";
            
        }

        mostrarAnimalsPaginacio($pagina, REGISTRE_PAGINA);
        
         $mysql->close();
    }

    //=======================================================================================

    function mostrarFormulariAnimals($id){
    
        //Mostrarem tantes vegades com id pasen de la funció mostrarAnimals()
        switch ($id) {
            case 1:
                echo "<img src='./img/gorilla-copito-de-nieve-bmc-paper.jpg' title='goril·la' alt='goril·la' width='100'>";
                echo "<form action='./index.php?id=apadrina#carret' method='POST'>";
                echo "<input type='hidden' name='id_animal' id='".$id."' value='1'>";
                echo "<label for='quantitatAnimal'>Quantitat: </label>";
                echo "<input type='number' name='quantitatAnimal' min='1' step='1'>";
                echo "<button name='enviar' type='submit'>Afegeix al carret</button>";
                echo "</form>";
                break;
            
            case 2:
                echo "<img src='./img/Linces.jpg' title='linx' alt='linx' width='100'>";
                echo "<form action='./index.php?id=apadrina#carret' method='POST'>";
                echo "<input type='hidden' name='id_animal' id='".$id."' value='2'>";
                echo "<label for='quantitatAnimal'>Quantitat: </label>";
                echo "<input type='number' name='quantitatAnimal' min='1' step='1'>";
                echo "<button name='enviar' type='submit'>Afegeix al carret</button>";
                echo "</form>";
                break;

            case 3:
                echo "<img src='./img/ajolote.webp' title='axolot' alt='axolot' width='100'>";
                echo "<form action='./index.php?id=apadrina#carret' method='POST'>";
                echo "<input type='hidden' name='id_animal' id='".$id."' value='3'>";
                echo "<label for='quantitatAnimal'>Quantitat: </label>";
                echo "<input type='number' name='quantitatAnimal' min='1' step='1'>";
                echo "<button name='enviar' type='submit'>Afegeix al carret</button>";
                echo "</form>";
                break;

            case 4:
                echo "<img src='./img/dodo.jpg' title='dodo' alt='dodo' width='100'>";
                echo "<form action='./index.php?id=apadrina#carret' method='POST'>";
                echo "<input type='hidden' name='id_animal' id='".$id."' value='4'>";
                echo "<label for='quantitatAnimal'>Quantitat: </label>";
                echo "<input type='number' name='quantitatAnimal' min='1' step='1'>";
                echo "<button name='enviar' type='submit'>Afegeix al carret</button>";
                echo "</form>";
                break;

            case 5:
                echo "<img src='./img/reithrodontomys-soderstromi-ac.jpg' title='rosegador' alt='rosegador' width='100'>";
                echo "<form action='./index.php?id=apadrina#carret' method='POST'>";
                echo "<input type='hidden' name='id_animal' id='".$id."' value='5'>";
                echo "<label for='quantitatAnimal'>Quantitat: </label>";
                echo "<input type='number' name='quantitatAnimal' min='1' step='1'>";
                echo "<button name='enviar' type='submit'>Afegeix al carret</button>";
                echo "</form>";
                break;

            case 6:
                echo "<img src='./img/paquita.jpg' title='gos' alt='gos' width='100'>";
                echo "<form action='./index.php?id=apadrina#carret' method='POST'>";
                echo "<input type='hidden' name='id_animal' id='".$id."' value='6'>";
                echo "<label for='quantitatAnimal'>Quantitat: </label>";
                echo "<input type='number' name='quantitatAnimal' min='1' step='1'>";
                echo "<button name='enviar' type='submit'>Afegeix al carret</button>";
                echo "</form>";
                break;

            case 7:
                echo "<img src='./img/roman_admin.png' title='conill' alt='conill' width='100'>";
                echo "<form action='./index.php?id=apadrina#carret' method='POST'>";
                echo "<input type='hidden' name='id_animal' id='".$id."' value='7'>";
                echo "<label for='quantitatAnimal'>Quantitat: </label>";
                echo "<input type='number' name='quantitatAnimal' min='1' step='1'>";
                echo "<button name='enviar' type='submit'>Afegeix al carret</button>";
                echo "</form>";
                break;

            case 8:
                echo "<img src='./img/animalsNous/kakapo.webp' title='loro' alt='loro' width='100'>";
                echo "<form action='./index.php?id=apadrina#carret' method='POST'>";
                echo "<input type='hidden' name='id_animal' id='".$id."' value='8'>";
                echo "<label for='quantitatAnimal'>Quantitat: </label>";
                echo "<input type='number' name='quantitatAnimal' min='1' step='1'>";
                echo "<button name='enviar' type='submit'>Afegeix al carret</button>";
                echo "</form>";
                break;

            case 9:
                echo "<img src='./img/animalsNous/olm.jpg' title='olm' alt='olm' width='100'>";
                echo "<form action='./index.php?id=apadrina#carret' method='POST'>";
                echo "<input type='hidden' name='id_animal' id='".$id."' value='9'>";
                echo "<label for='quantitatAnimal'>Quantitat: </label>";
                echo "<input type='number' name='quantitatAnimal' min='1' step='1'>";
                echo "<button name='enviar' type='submit'>Afegeix al carret</button>";
                echo "</form>";
                break;

            case 10:
                echo "<img src='./img/animalsNous/quokka.jpg' title='koala' alt='koala' width='100'>";
                echo "<form action='./index.php?id=apadrina#carret' method='POST'>";
                echo "<input type='hidden' name='id_animal' id='".$id."' value='10'>";
                echo "<label for='quantitatAnimal'>Quantitat: </label>";
                echo "<input type='number' name='quantitatAnimal' min='1' step='1'>";
                echo "<button name='enviar' type='submit'>Afegeix al carret</button>";
                echo "</form>";
                break;

            case 11:
                echo "<img src='./img/animalsNous/Irrawaddy-dolphin.jpg' title='delfin' alt='delfin' width='100'>";
                echo "<form action='./index.php?id=apadrina#carret' method='POST'>";
                echo "<input type='hidden' name='id_animal' id='".$id."' value='11'>";
                echo "<label for='quantitatAnimal'>Quantitat: </label>";
                echo "<input type='number' name='quantitatAnimal' min='1' step='1'>";
                echo "<button name='enviar' type='submit'>Afegeix al carret</button>";
                echo "</form>";
                break;

            case 12:
                echo "<img src='./img/animalsNous/gatopallas.jpeg' title='gato' alt='gato' width='100'>";
                echo "<form action='./index.php?id=apadrina#carret' method='POST'>";
                echo "<input type='hidden' name='id_animal' id='".$id."' value='12'>";
                echo "<label for='quantitatAnimal'>Quantitat: </label>";
                echo "<input type='number' name='quantitatAnimal' min='1' step='1'>";
                echo "<button name='enviar' type='submit'>Afegeix al carret</button>";
                echo "</form>";
                break;

            case 13:
                echo "<img src='./img/animalsNous/Saiga.webp' title='saiga' alt='saiga' width='100'>";
                echo "<form action='./index.php?id=apadrina#carret' method='POST'>";
                echo "<input type='hidden' name='id_animal' id='".$id."' value='13'>";
                echo "<label for='quantitatAnimal'>Quantitat: </label>";
                echo "<input type='number' name='quantitatAnimal' min='1' step='1'>";
                echo "<button name='enviar' type='submit'>Afegeix al carret</button>";
                echo "</form>";
                break;

            case 14:
                echo "<img src='./img/animalsNous/logo_gris_mex.jpeg' title='lobo' alt='lobo' width='100'>";
                echo "<form action='./index.php?id=apadrina#carret' method='POST'>";
                echo "<input type='hidden' name='id_animal' id='".$id."' value='14'>";
                echo "<label for='quantitatAnimal'>Quantitat: </label>";
                echo "<input type='number' name='quantitatAnimal' min='1' step='1'>";
                echo "<button name='enviar' type='submit'>Afegeix al carret</button>";
                echo "</form>";
                break;

            case 15:
                echo "<img src='./img/animalsNous/capyabeja.webp' title='capy' alt='capy' width='100'>";
                echo "<form action='./index.php?id=apadrina#carret' method='POST'>";
                echo "<input type='hidden' name='id_animal' id='".$id."' value='15'>";
                echo "<label for='quantitatAnimal'>Quantitat: </label>";
                echo "<input type='number' name='quantitatAnimal' min='1' step='1'>";
                echo "<button name='enviar' type='submit'>Afegeix al carret</button>";
                echo "</form>";
                break;

            default:
                echo "<div><picture>

                <img src='img/images.png' alt='Construcció' title='Constucció'>

                </picture></div>";
                break;
        }
        
    }

    //=====================================================================================
    /*
                Funció de mostrar animals duplicada
                Aquesta tindra la opció de mostrar la paginació 
                i poder navegar entre les pàgines que hi hajen el apartat apadrina.partial.php
    */

    

    function mostrarAnimalsPaginacio($paginaActual, $elementsPagina){

        //Crear dues consultes per a establir el rang de le págines i una latra consulta per veure el total de págines a mostrar
        include "./db/select_db.php";

        
        //Consulta per a rebre el total de camps de la taula animals

        $sql = "SELECT COUNT(*) AS `total` FROM `animals`";

        //$pagina = 0;
        
        //$numero_re = 0;

        $consultaPagin = $mysql -> query($sql);

        if($consultaPagin -> num_rows > 0){
            echo "<div id='taulaDB'>";
            if($row = $consultaPagin -> fetch_assoc()){
                echo "Quantitat total d'animals: <span>".$row['total']."</span></br>";
                echo "Elements per pàgina: <span>".$elementsPagina."</span></br>";
                $num_pagines = ceil($row["total"]/$elementsPagina);//ceil() redondear hacia arriba
                echo "Total de pàgines: <span>".$num_pagines."</span></br>";
            }

            echo "</div>";

            echo "<p>Pagina ".(intval($paginaActual) + 1)." de ".$num_pagines."</p>";
            
        }

        //falta resposta de raúl per a fer la paginació dins d'aquesta funció en apadrina.partial.php
        //Seguir apunts per a montar tot el codi

        //Crear els enllaços per a navegar entre págines mes avant es comprobara depnent de la página en la quál treballes
        //si el enllaç es queda inutilitzat o no
        
        //Enllaç Inici i Anterior
        if(intval($paginaActual) != 0) {
            echo "<span class='paginacio'><a href='index.php?id=apadrina&pagina=0'>Inici</a></span>";
            echo "<span class='paginacio'><a href='index.php?id=apadrina&pagina=".(intval($paginaActual) - 1)."'><<</a></span>";
        }else{
            echo "<span class='paginacio'>Inici</span>";
            echo "<span class='paginacio'><<</span>";
        }
        
        //Enllaç dels enllaços dels bucles    
        for ($i=0; $i < $num_pagines; $i++) { 
            # per a les págines
            if(intval($paginaActual) != $i){
                //echo $i + 1;
                //die();
                echo "<span class='paginacio'><a href='index.php?id=apadrina&pagina=".(intval($i))."'>".($i + 1)."</a></span>";
            }else{
                echo "<span class='paginacio'>".($i + 1)."</span>";
            }
        }
            
        //Enllaç Final i Posterior
        if((intval($paginaActual) + 1) != $num_pagines){
            echo "<span class='paginacio'><a href='index.php?id=apadrina&pagina=".(intval($paginaActual) + 1)."'>>></a></span>";
            echo "<span class='paginacio'><a href='index.php?id=apadrina&pagina=".(intval($num_pagines) - 1)."'>Final</a></span>";
        }else{
            echo "<span class='paginacio'>>></span>";
            echo "<span class='paginacio'>Final</span>";
        }


    }


    //======================================================================================
    
    //funcio per a comprobar si les dues contrasenyes passades
    //per el usuari coinxideixen
    function comprobarContrasenya($contrasenya, $contrasenyaRep){

        if(strcmp($contrasenya,$contrasenyaRep) != 0){
                    header("Location: ../index.php?id=registre&error=contrasenya");
                    die();
            }
        
    }
    //==================================================================

    //Aquest apartat contidra funcions que pasades
    //amb arguments o sense ells guardaran en un registe stots i cadascuna
    //de les acciones que realitze el usuari
    //header("Location: wwwDanJorGom/index.php");
    /*
        -fopen() --> per a obrir arxius
        -fclose() --> per a tancar
        -fputs() o fwrite() --> per a escriure sobre el document
        -fgets() o fread() -->  per a llegir el document
        -feof() --> per a comprobar si el document ha aplegat al final
        -file_put_contents() i file_get_contents():

        Version més potents de fgets i fputs
    */

    $fitxer = "./logs/navegacio.log";
    //$fitxer = __DIR__."/logs/navegacio.log";
    $apartat = isset($_GET["id"])? $apartat = $_GET["id"] : "";

    function registreApartat($fitxer,$apartat){
         
    $ruta_fitxer = fopen($fitxer,"a+");
    //problema amb el contador
    $contador = count(file($fitxer));   
        while(!feof($ruta_fitxer)){
            
            if($ruta_fitxer){
                $contador++;
                $contingut = $contador." :: Accés a l'apartat ".strtoupper($apartat)." el día ".date("d.m.y")." a l'hora ".date("H:i:s").PHP_EOL;
                fwrite($ruta_fitxer,$contingut);
                //crear el backup
                    if(count(file($fitxer)) >= 20){
                        $fitxer_backup = "./logs/backup/backup_".date("d.m.y")."_".date("H:i:s").".log";
                        //$ruta_fitxer_backup = fopen($fitxer_backup, "a+");
                         //$copia_fitxer = fgets($ruta_fitxer);
                        copy($fitxer,$fitxer_backup);
                    }
                fclose($ruta_fitxer);
                return $contingut;
            }else{
                //die("El arxiu no s'ha creat correctament. ERROR FATAL");
                return false;
            }
            
            
        
        }

        
        
    }

    //Amb aço si aplega a funcionar;
      //$contingut = $contador." :: Accés a l'apartat ".strtoupper($apartat)." el día ".date("m.d.y")." a l'hora ".date("H:i:s")."\n";
      //file_put_contents($ruta_fitxer, $contingut);

    //==============================================================================================================

    //Mateixa funció per a els actes del usuari
    $apartat_accio = "";
    if(isset($_GET["id"])){
        $apartat_accio = $_GET["id"]; 
    }elseif(isset($_GET["error"]) && strcmp($_GET["error"], 'errorContrasenya') == 0){
        $apartat_accio = $_GET["error"];
    }elseif(isset($_GET["error"]) && strcmp($_GET["error"], 'errorUsuari') == 0){
        $apartat_accio = $_GET["error"];
    }elseif(isset($_GET["accioadmin"]) && strcmp($_GET["accioadmin"], 'eliminat') == 0){
        $apartat_accio = $_GET["accioadmin"];
    }



    if(strcmp(basename($_SERVER['PHP_SELF']), "processaContacte.php") == 0){
        $apartat_accio = "contacte";
    }elseif(strcmp(basename($_SERVER['PHP_SELF']), "processaRegistre.php") == 0){
        $apartat_accio = "registra";
    }elseif(strcmp(basename($_SERVER['PHP_SELF']), "processaLogin.php") == 0){
        $apartat_accio = "login";
    }elseif(strcmp(basename($_SERVER['PHP_SELF']), "processaLogout.php") == 0){
        $apartat_accio = "logout";
    }elseif(strcmp(basename($_SERVER['PHP_SELF']), "eliminaUsuari.php") == 0){
        $apartat_accio = "eliminar usuari";
    }elseif(strcmp(basename($_SERVER['PHP_SELF']), "index.php") == 0 && $apartat_accio == "errorUsuari" || $apartat_accio == "errorContrasenya"){
        $apartat_accio = "acces incorrecte";
    }


    if(strcmp(basename($_SERVER['PHP_SELF']), "processaContacte.php") == 0 || strcmp(basename($_SERVER['PHP_SELF']), "processaRegistre.php") == 0 || strcmp(basename($_SERVER['PHP_SELF']), "processaLogin.php") == 0 || strcmp(basename($_SERVER['PHP_SELF']), "processaLogout.php") == 0 ){
        $fitxer_usuari = "../logs/accionsUsuari.log";
    }elseif(strcmp(basename($_SERVER["PHP_SELF"]), "index.php") == 0){
        $fitxer_usuari = "./logs/accionsUsuari.log";
    }

    $usuari = isset($_POST["correu"])? $_POST["correu"] : "<em>Valor_Vuit</em>";
    
    function registreAccionsUsuari($apartat_accio, $usuari, $fitxer_usuari){
        $ruta_fitUsuari = fopen($fitxer_usuari, "a+");
        if($ruta_fitUsuari){
            $accio = "L'usuari/a ".$usuari." ha realitzat l'acció ".strtoupper($apartat_accio)." el día ".date("d.m.y")." a l'hora ".date("H:i:s").PHP_EOL;
            fwrite($ruta_fitUsuari, $accio);
            fclose($ruta_fitUsuari);

            return $accio;
        }else{
            return false;
        }
    }


    //Métode de borrat de variables de sessío
    //per ales págines de processaContacte i
    //processaRegistre
    function esborrarSessions(){
        if(strcmp(basename($_SERVER['PHP_SELF']), "index.php") == 0){
            //Preguntyar si header() funciona açi
            session_unset();
            session_destroy();
        }
    }

    //======================================================================

    //Métode de inserció d'usuari a la base de dades
    //Es fara un de la sentencuia Sql Insert per a ficar els valore
    //Que poc a poc anirem colocant desde registre a processaRegistre
    //la creació de la base de dades aniran apart
    

    function insereixUsuari($nom_sessioActual ,$cognoms_sessioActual ,$correu_sessioActual ,$pass_sessioActual){

        require "../db/conexio.php";
        
        $contrasenyaXifrada = password_hash($pass_sessioActual, PASSWORD_DEFAULT);

        if(!usuariExistent($correu_sessioActual, $mysql)){
            $sql = "INSERT INTO `usuaris`(`nom_usuari` ,`cognoms_usuari` ,`correu_usuari` ,`contrasenya_usuari`) VALUES ('".$nom_sessioActual."', '".$cognoms_sessioActual."', '".$correu_sessioActual."', '".$contrasenyaXifrada."')";


            if($mysql -> query($sql) === TRUE){
                echo "<p class='db'>Usuari ".$correu_sessioActual." inserit correctament a la base de dades</p>";            
            }else{
                echo "<p>Error insersió</p>";
            }
        }
          

        $mysql->close();
           
    }

    //Métode per comprobar que el correu introuit a la base de dades ja existeix
    function usuariExistent($correu, $mysql){

        //require "../db/select_db.php";

        //aquest document es fara servir a la funció del usuari inxerit
        //la conexió es realitzara desde altre fitxer
        //Es comprobara que si el usuari ja exxisteix, que no deixe registralo
        $sql = "SELECT * FROM `usuaris` WHERE `correu_usuari` = '".$correu."'";

        $consulta = $mysql -> query($sql);
        if($consulta -> num_rows > 0){
            echo "<p class='db'><span style='color: #f00'>ERROR:</span> Usuari ".$correu." ja existeix a la base de dades</p>";
            return true;
        }else{
            return false;
        }

    
    }

    //==========================================================================================

    //Métode creació de missatges d'error si el login no ha sigut correcte

    // function mostrarMissatgeError($usuari, $contrasenya){

    //     $errorLogin = isset($_GET["error"])? $_GET["error"] : "";

    //     if(!$errorLogin){
    //         echo "<em style='background: #d122d3; border-style: solid'>Error. Usuari incorrecte</em>";
    //     }else{
    //         echo "<em style='background: #d122d3; border-style: solid'>Error. Contrasenya incorrecte</em>";
    //     }
    // }

?>
