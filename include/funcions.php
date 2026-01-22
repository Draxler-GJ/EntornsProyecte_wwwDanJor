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
         
        //while(!feof($ruta_fitxer)){}
        //$contador += 1;
        if($ruta_fitxer){
            $contingut = " :: Accés a l'apartat ".strtoupper($apartat)." el día ".date("m.d.y")." a l'hora ".date("H:i:s").PHP_EOL;
            fwrite($ruta_fitxer,$contingut);
            fclose($ruta_fitxer);
            
            return $contingut;
        }else{
            //die("El arxiu no s'ha creat correctament. ERROR FATAL");
            return false;
        } 
         
        
    }

    //Amb aço si aplega a funcionar;
      //$contingut = $contador." :: Accés a l'apartat ".strtoupper($apartat)." el día ".date("m.d.y")." a l'hora ".date("H:i:s")."\n";
      //file_put_contents($ruta_fitxer, $contingut);
?>
