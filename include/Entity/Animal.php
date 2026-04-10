<?php
    //el declare es per a obligar a php a tipar les dades de les variables i els metodes
    declare(strict_types = 1);
    /*CLASE ANIMAL*/

    class Animal{

        //Variables de instancia i vissibilitat privada

        private int $id;
        private string $nomComu;
        private string $nomCientific;
        private int $quantitat;
        private float $donacio;
        private string $descripcio;
        private string $imatgeAn;
        
        //constructor

        function __construct(int $id, String $nomComu, String $nomCientific, int $quantitat, float $donacio, String $descripcio, String $imatgeAn){

            $this->id = $id;
            $this->nomComu = $nomComu;
            $this->nomCientific = $nomCientific;
            $this->quantitat = $quantitat;
            $this->donacio = $donacio;
            $this->descripcio = $descripcio;
            $this->imatgeAn = $imatgeAn; 
        }

        /*Getters - Setters de cada atribut*/

        //Variable $id
        public function getId(){
            return $this->id;
        }

        public function setId(int $id){
            $this->id = $id;
        }

        //Variable $nomComu
        public function getNomComu(){
            return $this->nomComu;
        }

        public function setNomComu(string $nomComu){
            $this->nomComu = $nomComu;
        }

        //Variable $nomCientific
        public function getNomCientific(){
            return $this->nomCientific;
        }

        public function setNomCientific(string $nomCientific){
            $this->nomCientific = $nomCientific;
        }

        //Variable $quantitat
        public function getQuantitat(){
            return $this->quantitat;
        }

        public function setQuantitat(int $quantitat){
            $this->quantitat = $quantitat;
        }

        //Variable $donacio
        public function getDonacio(){
            return $this->donacio;
        }

        public function setDonacio(float $donacio){
            $this->donacio= $donacio;
        }

        //Variable $descripcio
        public function getDescripcio(){
            return $this->descripcio;
        }

        public function setDescripcio(string $descripcio){
            $this->descripcio = $descripcio;
        }

        //Variable $imatgeAn
        public function getImatgeAn(){
            return $this->imatgeAn;
        }

        public function setImatgeAn(string $imatgeAn){
            $this->imatgeAn = $imatgeAn;
        }

        /*
         * Encara que no siga necesari, es fara  deixara un unset i un destructor en cas de fer falta
         */

        /*
          function __destruct(){
                // destructor
                echo "S'ha destruït l'objecte <br>";
                }
            Alla aon es cree un objecte es fara us de unset(); per a eliminar el objecte pq es un array
        */
    }


?>