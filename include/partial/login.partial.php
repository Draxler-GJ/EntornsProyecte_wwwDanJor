<span id="registre">Si ja tens un conter: <a href="#login" title="Iniciar Sessió" id="enllaç">Inicia Sessió</a><br>
    Si no:<a href="index.php?id=registre" title="registre">Registrat</a></span>

<div class="login" id="login">
    
    <form method="POST" action="./include/processaLogin.php">

        <label for="usuari">Usuari: </label>
        <input type="email" name="usuari" placeholder="usuari" required><br><br>

        <?php
        
            if(isset($_GET["error"])){
                echo "<em style='background: #d122d3; border-style: solid'>Error. Usuari incorrecte</em>";
            }

        ?>
    
        <label for="contrasenya">Contrasenya:</label>
        <input type="password" name="contrasenya" placeholder="contrasenya" required><br><br>

        <?php

           if(isset($_GET["error"])){
                 echo "<em style='background: #d122d3; border-style: solid'>Error. Contrasenya incorrecte</em>";
             }

        ?>

        <input type="submit" value="Iniciar Sessió">

    </form>
</div>