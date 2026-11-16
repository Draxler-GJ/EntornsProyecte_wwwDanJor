<?php


//Aquesta clase es exclusiva per a Excepcions amb el insert i update del arxiu processaApadrina

class ErrorInserirException extends PDOException{
    public function missatgeErrorInsert(){
        return "Error en la inserció";
    }
}

class ErrorActualitzarException extends PDOException{
    public function missatgeErrorUpdate(){
        return "Error en la actualització de dades";
    }
}

?>