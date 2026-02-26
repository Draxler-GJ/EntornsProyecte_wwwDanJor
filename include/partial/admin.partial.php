<div>

    <h2>AQUESTA ES LA PÀGINA DEL ADMINISTRADOR DEL PROJECTE PHP</h2>
    <picture>
        <img src="./img/roman_admin.png" title="admin" alt="admin" width="450">
    </picture>
    <figcaption>ROMANSAURUS_REX</figcaption>

    <?php

        if(!empty($usuariActual)){
            echo "<div>Hola ".$usuariActual." <a href='./include/processaLogout.php'>Log Out</a></div>";
        }

    ?>

</div>