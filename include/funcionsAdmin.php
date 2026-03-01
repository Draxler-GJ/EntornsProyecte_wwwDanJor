<?php

    /* En aquest arxiu aniran totes les accicions que l'administrador del projecte te per a dur a terme */

    function gestionaUsuaris(){

        //Conexió a la base de dades
        include "./db/conexio.php";

        $consulta = "SELECT `id`,`nom_usuari`, `correu_usuari`, `contrasenya_usuari` FROM `usuaris`";

        $accionsAdmin = $mysql -> query($consulta);


       

        //En aquesta funció el es creara una taula que arrepelgara totes les dades dels usuaris a la base de dades
        echo "<table border='1' class='admin' id='admin' style='background: indigo; color: white; text-align: center;' width='100%'>";
        echo "
            <tr>
                <th>ID</th>
                <th>NOM</th>
                <th>CORREU</th>
                <th>CONtRASENYA</th>
                <th>ACCIÓ</th>
            </tr>
            ";

            /*
                Per a mostrar els camps de la base de dades es podría fer amb doble bucle for o for i foreach
                mentre hi haguen files en la base da dades o utilitzanr el num_rows > 0, anar mostrant tots els resultat en pantalla
                While i do while son bones opcions
            */

            //Actualització-> el bucle do while serveis pero fica variables indefinides i dona error
            //Bucle for i foreach es mes exacte i a la vegada, mes complicat
            
        if($accionsAdmin -> num_rows > 0){
            while($row = $accionsAdmin -> fetch_assoc()){
                if($row["correu_usuari"] == "admin@daw.com"){
                    echo "<tr style='background: #b0a4a4'>";
                    echo "<td>".$row["id"]."</td>";
                    echo "<td>".$row["nom_usuari"]."</td>";
                    echo "<td>".$row["correu_usuari"]."</td>";
                    echo "<td>".substr($row["contrasenya_usuari"], 0, 15)."...</td>";
                    echo "<td><img src='./img/taskmanager_themonitor_6938.png' alt='admin' title='admin'></td>";
                    echo "</tr>";
                }else{
                    echo "<tr>";
                    echo "<td>".$row["id"]."</td>";
                    echo "<td>".$row["nom_usuari"]."</td>";
                    echo "<td>".$row["correu_usuari"]."</td>";
                    echo "<td>".substr($row["contrasenya_usuari"], 0, 15)."...</td>";
                    echo "<td><a href='./include/eliminaUsuari.php?id=".$row["id"]."'><img src='./img/delete_delete_exit_1577.png' alt='eliminar' title='eliminar'></td>";
                    echo "</tr>";
                }
            }
        }

        echo "</table>";

        $mysql->close();
    } 



?>