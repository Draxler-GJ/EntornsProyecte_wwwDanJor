<div>

     <h2>AQUESTA ES LA PÀGINA DEL ADMINISTRADOR DEL PROJECTE PHP</h2>
    <?php 

        //Els missatges segons els parámtres de get de eliminar usuaris
        $accioAdmin = "";
        if(isset($_GET["accioadmin"])){
            $accioAdmin = $_GET["accioadmin"];
        }

        //Una vegada guardat la variables, es compara per a vore el missatges amb strcmp
        if(strcmp($accioAdmin, "eliminat") == 0){

            echo "<span style='width: 100%; background: rgb(241, 146, 146), text-align: center;'>Usuari eliminat</span>";
        }elseif(strcmp($accioAdmin, "errorbasedades") == 0){
            echo "<span style='width: 100%; background: rgb(241, 146, 146), text-align: center;'>Error en la base de dades</span>";
        }

        include "./include/funcionsAdmin.php";
        gestionaUsuaris();
    ?>

    <picture>
        <img src="./img/roman_admin.png" title="admin" alt="admin" width="100%">
    </picture>
    <figcaption>ROMANSAURUS_REX</figcaption>

    <?php

        if(!empty($usuariActual)){
            echo "<div><img src='./img/Hybrid-2025_mods-1.0.0.png.128x128_q95_crop.png' width='50'> :: Hola ".$usuariActual." :: <a href='./include/processaLogout.php'><img src='./img/delete_delete_exit_1577.png' alt='eliminar' title='eliminar' width='50'></a></div>";
        }

    ?>

</div>