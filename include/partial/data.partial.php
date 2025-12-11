<?php
        $dia_semana = array(0 => "", 1 => "Dilluns", 2 => "Dimarts", 3 => "Dimecres", 4 => "Dijous", 5 => "Divendres", 6 => "Dissabte", 7 => "Diumenge");
        $meses = array(0 => "", 1 => "Gener", 2 => "Febrer", 3 => "Març", 4 => "Abril", 5 => "Maig", 6 => "Juny", 7 => "Juliol", 8 => "Agost", 9 => "Septembre", 10 => "Octubre", 11 => "Novembre", 12 => "Decembre");
       
        $formatoSemana = date("N");//Date N retorna de 1 a 7 los dias de la semana
        $semana = $dia_semana[$formatoSemana];
        $formatoMes = date("m");//date m retorna de 1 a 12 los meses del año
        $mes = $meses[$formatoMes];

        //date j  devuelve el dia del mes u date Y nos devuelve el año.
        //Empleamos el método date() con el formato necesario para poder
        //leer los datos del ordenador o servidor

        echo "<time datatime='#'>".$semana.", ".date('j')." de ".$mes." de " .date('Y')."</time>";

?>
