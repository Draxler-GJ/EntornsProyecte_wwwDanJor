<form method="POST" action="include/processaContacte.php">

    <h3>CONTACTE</h3>

    <div>
        <label for="correu">CORREU ELECTRÒNIC:</label>
        <input type="email" id="correu" name="correu" required><br><br>
    </div>

    <div>
        <label for="assumpte">ASSUMPTE:</label>
        <input type="text" id="assumpte" name="assumpte" required><br><br>
    </div>

    <div>
        <label for="missatge">MISSATGE:</label>
        <textarea name="missatge" id="missatge" placeholder="Deixa el teu missatge" required></textarea><br><br>
    </div>

    <div>
        <label for="punt">Puntúa del 1-5:</label>
        <input type="number" min="1" max="5" size="5" name="punt" id="punt" required><br>
        <input type="range" min="1" max="100"  value="1" name="rango" id="rango">
    </div>

    <div>
        <input type="submit" name="enviar" value="Enviar">
        <input type="reset" name="borrar" value="Borrar">
    </div>
</form>