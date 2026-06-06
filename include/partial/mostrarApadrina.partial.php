<?php


    echo "<div>";

        echo "<h1>APADRINA</h1>";

        //echo "<h3>En Manteniment</h3>";

        echo "<picture>";

            echo "<img src='img/images.png' alt='Construcció' title='Constucció'>";
            echo "<figcaption>Aquesta secsió consistira en gestionar l'apadrinament dels Animals</figcaption>";

        echo "</picture><br>";

        if(empty($_SESSION["carret"])) {
             echo "<div>Encara no tens animals al carret</div>";
        }elseif(!empty($_SESSION["carret"])){
                $c1 = unserialize($_SESSION["carret"]);
                $llistatAnimals = $c1->getLlistatAnimals();

                //var_dump($llistatAnimals);
                // print $llistatAnimals;    

                $c1->mostrarApadrina();

                if (!empty($quantitatSessio)) {
                    echo "<div><strong>Quantitat d'especies: ".$quantitatSessio."</strong></div>";

                    //Recorrer i sumar el preu i donació de cada valor
                    $llistatAnimals = $c1->getLlistatAnimals();

                    $donacioTotal = 0;
                    
                    foreach ($llistatAnimals as $clau => $animal) {
                        $donacioTotal += $animal->getQuantitat() * $animal->getDonacio();
                    }

                    echo "<div><strong>Donació total: ".$donacioTotal." €</strong></div>";
                }

                
        }

        //Si la inserció ha sigut correcta, existeix una variable GET
        if(isset($_GET["inserir"]) && strcmp($_GET["inserir"], "correcte") == 0){
            echo "<div class='inserir'> L'inserció en la base de dades ha sgut satisfactoria. Les dades han sigut actualizades</div>";
        }

        //depenent de si el usuari esta registrat o no, camvia l'enllaç per a que es resgitre o puga apadrinar
        if (empty($usuariActual)) {
            echo "<div>T`has de <a href='index.php?id=apadrina&mostrar=apadrina#'>registrar</a> per a poder apadrinar</div>";
        }else{
            echo "<div><a href='./include/processaApadrina.php'>Realitzar l'apadrinament</a></div>";

            //Falta un ultim enllaç en cas de no exstisca la variable de sessió carret
        }

        echo "<a href='index.php?id=apadrina' style='text-align: center; color: yellowgreen;'>Tornar a apadrinar</a>";

    echo "</div>";


?>