<?php
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
                fclose($ruta_fitxer);
                //crear el backup
                    // if(count(file($fitxer)) >= 10){
                    //     $fitxer_backup = fopen("./logs/backup/backup_".date("d.m.y")."_".date("H:i:s").".log", "r+");
                    //     $copia_fitxer = fgets($ruta_fitxer);
                    //     copy($copia_fitxer,$fitxer_backup);
                    // }
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

    //Mateixa funció per a els actes del usuari

    $fitxer_usuari = "../logs/accionsUsuari.log";
    $usuari = isset($_POST["correu"])? $_POST["correu"] : "<em>Valor_Vuit</em>";
    
    function registreAccionsUsuari($apartat, $usuari, $fitxer_usuari){
        $ruta_fitUsuari = fopen($fitxer_usuari, "a+");
        if($ruta_fitUsuari){
            $accio = "L'usuari/a ".$usuari." ha realitzat l'acció ".$apartat." el día ".date("d.m.y")." a l'hora ".date("H:i:s").PHP_EOL;
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
    //esborrarSessions(){}



    //Métode de inserció d'usuari a la base de dades
    //Es fara un de la sentencuia Sql Insert per a ficar els valore
    //Que poc a poc anirem colocant desde registre a processaRegistre
    //la creació de la base de dades aniran apart
    //insereixUsuari(){}
?>
