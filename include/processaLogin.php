<?php

    //En aquesta página procedirem a crear una página de inici de sessió

    session_start();
    
    //Guardem les variables de sesió necessaries per al login 
    //que després serań utilitzades

    if(isset($_POST["usuari"])){
        $_SESSION["usuari"] = trim(htmlspecialchars($_POST["usuari"]));
    }

    $usuariLogin = isset($_SESSION["usuari"]) ? $_SESSION["usuari"] :"";

    $usuariActual = $usuariLogin;

    if(isset($_POST["contrasenya"])){
        $_SESSION["contrasenya"] = $_POST["contrasenya"];
    }

    $contraLogin = isset($_SESSION["contrasenya"])? $_SESSION["contrasenya"] :"";

    $contrasenyaActual = $contraLogin;


    //conexió i comprobació amb la base d dades
    //Cridem al arxiu que conte la conexió a la base de dades
    require "../db/select_db.php";

    //Com hem declarat les variables de sessió líneas amunt, es comparan amb el que vinga de la base de dades

    //Declarem la instrucció sql
    $sql = 'SELECT * FROM `usuaris` WHERE `correu_usuari` = "'.$usuariActual.'"';

    $consultaLogin = $mysql -> query($sql);

    //$mysql -> close();

 
    
        //echo $usuariActual;
        //echo $contrasenyaActual;
        
        $row = $consultaLogin -> fetch_assoc();

        
        //echo "Usuari -> ".$row["correu_usuari"]." / contrasenya -> ".$row["contrasenya_usuari"];

        if(strcmp($usuariActual, $row["correu_usuari"]) == 0){
            header("Location: ../index.php");
            die();
            //echo "<div style='content:\007 '>HOLA ".$row["nom_usuari"]."</div></br>";
        }else{
            header("Location: ../index.php?id=inici&error=loginCorreu");
            die();
        }

        // if(strcmp($contrasenyaActual,$row["contrasenya_usuari"]) != 0){
        //     header("Location: ../index.php?id=inici&error=loginContrasenya");
        //     die();
        // }
        
    //Tal i com esta concebida la funció usuariExistent() he
    //he vist més factible comprobar-ho manualment
    //amb variables de sessio o en tot cas haber utilitzat les variables de post
    //per a comprobar que tant el usuari i el password si son iguals
    
?>