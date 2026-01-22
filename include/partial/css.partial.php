<?php 
    isset($_GET["id"])? $id = $_GET["id"] : "";
    
    if(strcmp(basename($_SERVER['PHP_SELF']), "processaContacte.php") == 0){
        $id = "contacte";
    }elseif(strcmp(basename($_SERVER['PHP_SELF']), "processaRegistre.php") == 0){
        $id = "registra";
    }
?>

<details class="estil-sessio">
    <summary><strong>MENÚ DE ESTILS</strong></summary>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo $id;?>">
    <!-- En aquesta part he buscar per ia, w3s, inclús per blogs, pq no máclaria -->
     <!-- NO sabía que deuries ficar un echo amb checked per a que es quede marcat -->
      <!-- Fins ahí si, pero la varible server nomes en du a index.php -->

            <ul>
                <label for="estil">Tría un estil: </label> 
                <li><input type="radio" name="estil" value="azure" <?php if($estil_actual == "azure") echo "checked";?> ><span>Blau Ceruli</span></li>
                <li><input type="radio" name="estil" value="crimson" <?php if($estil_actual == "crimson") echo "checked";?>><span>Roig Carmesí</span></li>
                <li><input type="radio" name="estil" value="gold" <?php if($estil_actual == "gold") echo "checked";?>><span>Dorat Crema</span></li>
                <li><input type="radio" name="estil" value="sapphire" <?php if($estil_actual == "sapphire") echo "checked";?>><span>Blau Safir</span></li>
                <li><input type="radio" name="estil" value="chaos" <?php if($estil_actual == "chaos") echo "checked";?>><span>Light & Darkness</span></li>

                <input type="submit" value="Tría estíl">
            </ul>

        </form>
</details>