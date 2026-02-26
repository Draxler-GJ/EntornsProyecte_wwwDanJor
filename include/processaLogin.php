<?php

    //En aquesta página procedirem a crear una página de inici de sessió

    session_start();
    
    //Guardem les variables de sesió necessaries per al login 
    //que després serań utilitzades

    $usuariLogin = "";
    if(isset($_POST["usuari"])){
        $usuariLogin = trim(htmlspecialchars($_POST["usuari"]));
    }

    $contraLogin = "";
    if(isset($_POST["contrasenya"])){
        $contraLogin = trim(htmlspecialchars($_POST["contrasenya"]));
    }


    //conexió i comprobació amb la base d dades
    //Cridem al arxiu que conte la conexió a la base de dades
    require "../db/select_db.php";

    //Com hem declarat les variables de sessió líneas amunt, es comparan amb el que vinga de la base de dades

    //Declarem la instrucció sql
    $sql = 'SELECT * FROM `usuaris` WHERE `correu_usuari` = "'.$usuariLogin.'"';

    $consultaLogin = $mysql -> query($sql);

    //$mysql -> close();

    
    
        //echo $usuariActual;
        //echo $contrasenyaActual;
        
        //Amb aquest buble do-while comprovem amb la consulta
        //que hi han valors superiors a 0, trocejant en variables camp er camp
        //Posteriorment les guarem en variables de sessió que es comproven si existeixen
        //per a després fer la comparació
        if($consultaLogin -> num_rows > 0){
            
            $row = $consultaLogin -> fetch_assoc();

             //contrasenya del usuari
             //Mes avant -> if(password_verify($contraLogin, $row["contrasenya_usuari"]))
            if(strcmp($contraLogin, $row["contrasenya_usuari"]) == 0){
                $_SESSION["contrasenya_usuari"] = $row["contrasenya_usuari"];

                

                //correu del usuari
                if(strcasecmp($usuariLogin, $row["correu_usuari"]) == 0){
                    $_SESSION["correu_usuari"] = $row["correu_usuari"];
                }

                
                //================================================================================
                $_SESSION["nom_usuari"] = $row["nom_usuari"];

                

                header("Location: ../index.php");
                die();
            }else{
                header("Location: ../index.php?id=inici&error=errorContrasenya");
                die();
            }
        }else{
            header("Location: ../index.php?id=inici&error=errorUsuari");
            die();
        }

    

  

        
        //echo "Usuari -> ".$row["correu_usuari"]." / contrasenya -> ".$row["contrasenya_usuari"];

        // if(strcmp($contrasenyaActual,$row["contrasenya_usuari"]) != 0){
        //     header("Location: ../index.php?id=inici&error=loginContrasenya");
        //     die();
        // }
        
    //Tal i com esta concebida la funció usuariExistent() he
    //he vist més factible comprobar-ho manualment
    //amb variables de sessio o en tot cas haber utilitzat les variables de post
    //per a comprobar que tant el usuari i el password si son iguals
    
?>