<form method="POST" action="include/processaRegistre.php">

        <h3>REGISTRE</h3>
    <div>
        <label for="nom">NOM:</label>
        <input type="text" id="nom" name="nom" required><br><br>
    </div>

    <div>
        <label for="cognoms">COGNOMS:</label>
        <input type="text" id="cognoms" name="cognoms"><br><br>
    </div>

    <div>
        <label for="adresa">ADREÇA:</label>
        <input type="text" id="adresa" name="adresa"><br><br>
    </div>

    <div>
        <label for="correu">CORREU ELECTRÒNIC:</label>
        <input type="email" id="correu" name="correu" required><br><br>
    </div>

    <div>
        <label for="password">CONTRASENYA:</label>
        <input type="password" id="password" name="password" required><br><br>
    </div>

    <div>
        <label for="repPassword">CONFIRMA CONTRASENYA:</label>
        <input type="password" id="pass" name="repPassword" required><br><br>
        <?php
        $error = "";
        if(isset($_GET["error"])){
            $error = $_GET["error"];
            echo "<span style='border: 1px solid #fff; border-radius: 5px; padding: 3px; background: #ffd3e2;'>La ".$error." no coincideix</span>";
        }
    ?>
    </div>


    <div>
        <label for="telefon">TELÉFON:</label>
        <input type="tel" id="telefon" name="telefon"><br><br>
    </div>

    <div>
        <label for="donacio">DONACIÓ:</label>
        <select name="donacio">
            <option selected>--Triá una opció--</option>
            <option value="cinc">5€</option>
            <option value="deu">10€</option>
            <option value="vint">20€</option>
            <option value="res">No vuic donar res</option>
        </select><br><br>
    </div>

    <div>
        <label for="animal">ANIMAL A APADRINAR</label>
        <select name="animal">
            <option selected>--Triá una opció--</option>
            <option value="goril·la">Goril·la Alví</option>
            <option value="linx">Linx Ibèric</option>
            <option value="axolot">Axolot</option>
            <option value="dodo">Dodo</option>
            <option value="romansaurus">Conill Romansaurus</option>
        </select><br><br>
    </div>

    <div>
        <label for="continent">CONTINENT:</label>
        Europa:<input type="radio" name="continent" value="Europa">
        América:<input type="radio" name="continent" value="América">
        Àsia:<input type="radio" name="continent" value="Àsia">
        Àfrica:<input type="radio" name="continent" value="Àfrica">
        Oceanía:<input type="radio" name="continent" value="Oceanía">
        <br><br>
    </div>

    <div>
        <label for="animal_mes[]">ANIMAL EN PERILL DEL MES: </label>
        <div>
            <input type="checkbox" name="animal_mes[]" value="goril·la" id="animal_mes">Goril·la Alví<br>
            <input type="checkbox" name="animal_mes[]" value="linx" id="animal_mes">Linx Ibéric<br>
            <input type="checkbox" name="animal_mes[]" value="axolot" id="animal_mes">Axolot<br>
            <input type="checkbox" name="animal_mes[]" value="dodo" id="animal_mes">Dodo<br>
            <input type="checkbox" name="animal_mes[]" value="romansaurus" id="animal_mes">Conill Romansaurus_Rex
        </div>
    </div>

    <!-- Aquest menú de selecció d'estils quedara comentat pq ara passra al header de la pàgina
    <div>
        <label for="estil">Estil Registre:</label>
        Blau Ceruli<input type="radio" name="estil" value="azure">
        Roig Carnesí<input type="radio" name="estil" value="crimson">
        Dorat Caótic<input type="radio" name="estil" value="gold">
        Safir<input type="radio" name="estil" value="sapphire">
    </div>
    -->

    <div>
        <input type="submit" name="enviar" value="Enviar">
        <input type="reset" name="borrar" value="Borrar">
    </div>
</form>