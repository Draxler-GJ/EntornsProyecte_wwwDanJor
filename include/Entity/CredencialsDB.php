<?php

//Aquest document cumplira la funció per a programació orientada a objectes amb les credencials de la BASE DE DADES per a futures conexions

    class CredencialsDB{
        public const SERVIDOR = "localhost";
        public const USUARI = "root";
        public const CONTRASENYA =  "root";
        public const BASEDADES = "usuari_registre";

        public const CONEXIO = new mysqli(SERVIDOR, USUARI, CONTRASENYA, BASEDADES);

    }




?>