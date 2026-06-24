<?php

    declare(strict_types=1);
    session_start();

    //====================================================================================================================================

     //Guardem les variables de sesió necessaries per al login 
    //que després serań utilitzades

    //$nomDB = $_SESSION["nom_usuari"];$passwordDB = $_SESSION["contrasenya_usuari"];$correuDB = $_SESSION["correu_usuari"];

    //Variable de sessió del correu que ve de PRocessaLogin
    $correuDB = "";
    if(isset($_SESSION["correu_usuari"])){
        $correuDB = $_SESSION["correu_usuari"];
    }

    $usuariActual = $correuDB;
    

    //Variable de sessió de la contrasenya
    $passwordDB = "";
    if(isset($_SESSION["contrasenya_usuari"])){
        $passwordDB = $_SESSION["contrasenya_usuari"];
    }

    $contrasenyaActual = $passwordDB;

    //Variable de sessió que prove del nom
    $nomDB = "";
    if(isset($_SESSION["nom_usuari"])){
        $nomDB = $_SESSION["nom_usuari"];
    }

    $nomActual = $nomDB;

    //Variables de Sessió que vindra les formularis dels animals de la secció apadrina
    //Van a ser utilitzades per al Carret per a les págines index.php, processaContacte.php i processaRegistre.php

    if(isset($_POST["quantitatAnimal"])){
        $_SESSION["quantitatAnimal"] = $_POST["quantitatAnimal"];
    }

    $preuQuantitat = "";
    if(isset($_SESSION["quantitatAnimal"])){
        $preuQuantitat = $_SESSION["quantitatAnimal"];
    }

    $quantitatSessio = $preuQuantitat;

    if(isset($_POST["id_animal"])){
         $_SESSION["id_animal"] = $_POST["id_animal"];
    }

    $idDBanimal = "";
    if(isset($_SESSION["id_animal"])){
         $idDBanimal = $_SESSION["id_animal"];
    }

    $idDBanimalSessio = $idDBanimal;

    //================================================================================================================================
    
    //importar las variables de sessió de la base de dades animal i usuari per a mantindre id i quantitat

    include "./Entity/Animal.php";
    include "./Entity/CarretCompra.php";
    include "./Entity/Exceptions.php";
    //==============================================================================
    //Conexió a la base de dades

    try {
        include "../db/conexio.php";
    } catch (Exception $e) {
        die("Error de conexió a la base de dades ".$e);
    }

    //===========================================================================
    //Carret


    $c1 = unserialize($_SESSION["carret"]);
    
    //echo $_SESSION["carret"]; //Millor crear dos métodes per a inserir en la base de dades.

    $llistatAnimals = $c1->getLlistatAnimals();

    //echo $llistatAnimals;

    //Aquest fitxer procesesara tota aquella incesió o actulització del animals a la base de dades
    //el valor de id aparirn en 1

    /* 
        Cada secció consistira en guardar en cada paramétre
        de la base de dades apadrina que no siguen el id i la data:
        -> El camp idapadrina depenguent del total de línies que hi hagen en la taula será el valor amb un SELECT MAX(), sino el valor será 1
        -> El id animal i id usuari será un select que agafara cada valor
        -> la quantitat que tinga la variable de sessió o el getter
        -> La donació total sera la suma de tots els preus * la donació per cada objecte del array
    */

    //Amb un select obtindre el id de la taula usuari
    //Una altra consulta per a obtindre el id de la taula animal
    //El tercer id dependra de la quantitat de taules que hi ha en la base de dades en la taula apadrina

    /* CAMP IDAPADRINA */

    $idApadrinar = 0;

    if($idApadrinar >= 1){
        //Incrementar el valor cogiendo el resultado de la consulta
        $consultaApadrina  = "SELECT MAX(`idapadrina`) FROM `apadrina` ";
        $idApadrinar += 1;

    }else{
        $idApadrinar = 1;
    }
    
    echo $idApadrinar."<br>";

    //$select_1 = $mysql->query($consultaApadrina);


    /* CAMP ID USUARI */

    $usuariId = $c1->getIdUsuari();

    echo $usuariId."<br>";

    $consultaUsuari = "SELECT `id` FROM `usuaris` WHERE `id` = ".$usuariId;

    /* CAMP ID APADRINA */

    $animalId = 0;
    foreach ($llistatAnimals as $clau => $animal) {
        $animalId = $animal->getId();
    }
    echo $animalId."<br>";

    $consultaAnimal = "SELECT `id_animal' FROM `animals` WHERE `id_animal` = ".$animalId;

    /* CAMP QUANTITAT */
    //variable de sessió que ve aculumada anteriorment o empara getQuantitat

    $quantitatAIncerir = 0;
    foreach ($llistatAnimals as $clau => $animal) {
        $quantitatAIncerir += $animal->getQuantitat();
    }

    echo $quantitatAIncerir."<br>";

    //$quantitatConcreta = $c1->getQuantitat();

    /* CAMP DONACIÓ TOTAL */
    //Us de un bucle foreach

    $donacioTotal = 0; //Es inicia a 0, el bucle fara la suma de la donacio * la quantitat
    foreach ($llistatAnimals as $clau => $animal) {
        $donacioTotal += $animal->getQuantitat() * $animal->getDonacio();
    }

    echo $donacioTotal;

    //incrementa
    try {
        $inserir = "INSERT INTO `apadrina`(idapadrina, idusuari, idanimal, quantitatAnimal, donacio_unitaria) VALUES (".$idApadrinar.",'".(int)substr(md5($usuariId), 0 , 1)."',".$animalId.",".$quantitatAIncerir.",".$donacioTotal.")";
        //us de la funció crc32() per a convertir un text amb lletres en enter de 32 bits, buscat per intenet
        //md5() es igula pero amb valors hexadecimals
        //provat amb subtring(md5(variable del correu, 0 , numero))

        if($mysql -> query($inserir) && !isset($usuariActual)){
            echo "Inserció correcta";
        }else{
            echo "Error: ".$inserir."<br>".$mysql->error;
        }
    } catch (ErrorInserirException $e) {
        echo $e->getMessage();
    }
    

    //$c1->buidarCarret(); //EL CARRET ES BUIDA
    
    /* UPDATE -> quant la quantitat siga augmentada, cambiarla*/

    try {
        $actualitzar = "UPDATE `animals` SET `quantitat` = `quantitat`+ ".$quantitatSessio." WHERE `id_animal` = ".$idDBanimalSessio;

        if($mysql -> query($actualitzar) === TRUE){
            echo "Actualizació correcte";
        }else{
            echo "Error en el registre ".$actualitzar."<br>".$mysql->error;
        }
    } catch (ErrorActualitzarException $e) {
        echo $e->getMessage();
    }

    $mysql->close();

    serialize($_SESSION["carret"]);
    unset($c1); //Eliminar el carret después de serializar la variable de sessió

    //Una vegada s'ha realitat les opcions actualitzar i inserir, redirigir, fijarse amb el patro inserir= correcte, aixo ens marcara en
    //processaApadrina que si la inserió i la actualizació han sigut correctes, es mostrara el missatge correponent al document

    header("Location: ../index.php?id=apadrina&mostrar=apadrina&inserir=correcte");
    die();

?>