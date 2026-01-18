<?php
    //Aquest apartat contidra funcions que pasades
    //amb arguments o sense ells guardaran en un registe stots i cadascuna
    //de les acciones que realitze el usuari

    /*
        -fopen() --> per a obrir arxius
        -fclose() --> per a tancar
        -fputs() o fwrite() --> per a escriure sobre el document
        -fgets() o fread() -->  per a llegir el document
        -feof() --> per a comprobar si el document ha aplegat al final
        -file_put_contents() i file_get_contents():

        Version més potents de fgets i fputs
    */
        
    $ruta_fitxer ="../logs/navegacio.log";
    $apartat = isset($_GET["id"])? $apartat = $_GET["id"] : "";
    $contador = 0;
    // function registreApartat( $ruta_fitxer, $apartat){
         
    //     $contador = 0;
    //     $contingut = $contador." :: Accés a l'apartat ".strtoupper($apartat)." el día ".date("m.d.y")." a l'hora ".date("H:i:s")."\n";
    //     //while(!feof($contingut)){}
    //     
    //     //$contador += 1;
    //     return $contingut;
    //   }

    //   registreApartat($ruta_fitxer, $apartat);

      $contingut = $contador." :: Accés a l'apartat ".strtoupper($apartat)." el día ".date("m.d.y")." a l'hora ".date("H:i:s")."\n";
      file_put_contents($ruta_fitxer, $contingut);
?>
