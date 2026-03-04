<?php
    declare(strict_types = 1);

    //=====================================================================================================
    //Métode per a mostrar a cada formulari de la part apadrina els animals a apadrinar
    //Es fara amb el metode mostrarAnimls() i despreś una altra funció per al formulari

    function mostrarAnimals(){

        include "./db/select_db.php";

        $sql = "SELECT * FROM `animals`";

        $consultaAnimals = $mysql -> query($sql);

        if($consultaAnimals -> num_rows > 0){
            echo "<div id='taulaDB'>";
            while($row = $consultaAnimals -> fetch_assoc()){
                echo "ID -> ". $row['id']."</br>";
                echo "NOM COMÚ -> ".$row['nom_comu']."</br>";
                echo "NOM CIENTÍFIC -> ".$row["nom_cientific"]."</br>";
                echo "DONACIÓ -> ".$row["donacio"]."€</br>";
                echo "DESCRIPCIÓ -> ".$row["descripcio"]."</br>";
                mostrarFormulariAnimals($row['id']);
                echo "</br>"; 
            }

            echo "</div>";
            
        }

    }

    function mostrarFormulariAnimals($id){
    
        //Mostrarem tantes vegades com id pasen de la funció mostrarAnimals()
        switch ($id) {
            case 1:
                echo "<img src='./img/gorilla-copito-de-nieve-bmc-paper.jpg' title='goril·la' alt='goril·la' width='100'>";
                echo "<form action='./index.php?id=apadrina' method='POST'>";
                echo "<input type='hidden' name='idQ' id='1' value='1'>";
                echo "<label for='quantitatAnimal'>Quantitat: </label>";
                echo "<input type='number' name='quantitatAnimal' min='0' step='1'>";
                echo "<button name='enviar' type='submit'>Afegeix al carret</button>";
                echo "</form>";
                break;
            
            case 2:
                echo "<img src='./img/Linces.jpg' title='linx' alt='linx' width='100'>";
                echo "<form action='./index.php?id=apadrina' method='POST'>";
                echo "<input type='hidden' name='idQ' id='2' value='2'>";
                echo "<label for='quantitatAnimal'>Quantitat: </label>";
                echo "<input type='number' name='quantitatAnimal' min='0' step='1'>";
                echo "<button name='enviar' type='submit'>Afegeix al carret</button>";
                echo "</form>";
                break;

            case 3:
                echo "<img src='./img/ajolote.webp' title='axolot' alt='axolot' width='100'>";
                echo "<form action='./index.php?id=apadrina' method='POST'>";
                echo "<input type='hidden' name='idQ' id='3' value='3'>";
                echo "<label for='quantitatAnimal'>Quantitat: </label>";
                echo "<input type='number' name='quantitatAnimal' min='0' step='1'>";
                echo "<button name='enviar' type='submit'>Afegeix al carret</button>";
                echo "</form>";
                break;

            case 4:
                echo "<img src='./img/dodo.jpg' title='dodo' alt='dodo' width='100'>";
                echo "<form action='./index.php?id=apadrina' method='POST'>";
                echo "<input type='hidden' name='idQ' id='4' value='4'>";
                echo "<label for='quantitatAnimal'>Quantitat: </label>";
                echo "<input type='number' name='quantitatAnimal' min='0' step='1'>";
                echo "<button name='enviar' type='submit'>Afegeix al carret</button>";
                echo "</form>";
                break;

            case 5:
                echo "<img src='./img/reithrodontomys-soderstromi-ac.jpg' title='rosegador' alt='rosegador' width='100'>";
                echo "<form action='./index.php?id=apadrina' method='POST'>";
                echo "<input type='hidden' name='idQ' id='5' value='5'>";
                echo "<label for='quantitatAnimal'>Quantitat: </label>";
                echo "<input type='number' name='quantitatAnimal' min='0' step='1'>";
                echo "<button name='enviar' type='submit'>Afegeix al carret</button>";
                echo "</form>";
                break;

            case 6:
                echo "<img src='./img/paquita.jpg' title='gos' alt='gos' width='100'>";
                echo "<form action='./index.php?id=apadrina' method='POST'>";
                echo "<input type='hidden' name='idQ' id='6' value='6'>";
                echo "<label for='quantitatAnimal'>Quantitat: </label>";
                echo "<input type='number' name='quantitatAnimal' min='0' step='1'>";
                echo "<button name='enviar' type='submit'>Afegeix al carret</button>";
                echo "</form>";
                break;

            case 7:
                echo "<img src='./img/roman_admin.png' title='conill' alt='conill' width='100'>";
                echo "<form action='./index.php?id=apadrina' method='POST'>";
                echo "<input type='hidden' name='idQ' id='7' value='7'>";
                echo "<label for='quantitatAnimal'>Quantitat: </label>";
                echo "<input type='number' name='quantitatAnimal' min='0' step='1'>";
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
    }



    if(strcmp(basename($_SERVER['PHP_SELF']), "processaContacte.php") == 0){
        $apartat_accio = "contacte";
    }elseif(strcmp(basename($_SERVER['PHP_SELF']), "processaRegistre.php") == 0){
        $apartat_accio = "registra";
    }


    $fitxer_usuari = "../logs/accionsUsuari.log";
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