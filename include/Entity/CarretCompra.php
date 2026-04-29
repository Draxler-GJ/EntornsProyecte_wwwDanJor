<?php

    //el declare es per a obligar a php a tipar les dades de les variables i els metodes
    declare(strict_types = 1);
    /*CLASE CARRET COMPRA*/

    //include "Animal.php";

    class CarretCompra{

        //Variables de instancia i vissibilitat privada

        private string $idUsuari;
        private $llistatAnimals;
        
        //constructor

        public function __construct(string $idUsuari){

            $this->idUsuari = $idUsuari;
       
            $this->llistatAnimals = null;
    

        }

        /*Getters - Setters de cada atribut*/

        //Variable $id
        public function getIdUsuari(){
            return $this->idUsuari;
        }

        public function setIdUsuari(string $idUsuari){
            $this->idUsuari = $idUsuari;
        }

        //Variable $nomComu
        public function getLlistatAnimals(){
            return $this->llistatAnimals;
        }

        public function setLlistatAnimals($llistatAnimals){
            $this->llistatAnimals = $llistatAnimals;
        }

        //Metodes de la clase que per ara no seran instanciats

        public function afegirAnimal(Animal $objAnimal){

            //primer es comproba el estat del array, si es null
            if($this->llistatAnimals === null){
                $this->llistatAnimals = [];
            }

            //Pasem a comprobar el id que obtinguem de la clase Animal
            $idAnimalPassat = $objAnimal->getId();

            //Aleshores comprobem que el id de la clase animal ya existeix i fem la suma o no
            //en cas de que el Animal estiga o no dins l'array
            if(isset($this->llistatAnimals[$idAnimalPassat])){
                //Augmentar la quantitat del animal cridant al setter de quantitat
                $quantitat = $this->llistatAnimals[$idAnimalPassat]->setQuantitat($this->llistatAnimals[$idAnimalPassat]->getQuantitat() + $objAnimal->getQuantitat());
                return $quantitat;
            }elseif(!isset($this->llistatAnimals[$idAnimalPassat])){
                array_push($this->llistatAnimals, $objAnimal);
                //return $llistatAnimals;
            }
        }

        public function eliminarAnimal($id){
            // include "../../db/select_db.php";
            foreach ($id as $animal) {
                array_pop($animal);
            }
            echo "El animal amb id -> ".$animal." ha sigut eliminat correctament";
        }

        public function getAnimal($id){
            
            foreach($this->llistatAnimals as $animalConcret){
                if($this->llistatAnimals[$animalConcret] === $id){
                    return $animalConcret;
                }
            }
            return null;
        }

        public function canviarQuantitatAnimal($id, $quantitat){
            //Moodificacions:
            /*
             *Amb l'ajuda de ia per a corregir....
             *  Agafem els valors de la array e la clase
             * Els recorreguem amb un foreach o for i posteriorment
             * si el id que ens pasen coincideix amb el id de la clase Animal.php
             * canvia la quantitat amb el metode setQauantitat, en cas de que
             * existisca el animal en el carret
            */
            foreach ($this->llistatAnimals as $animal) {
                if ($animal->getId() === $id) {
                   $animal->setQuantitat($animal->getQuantitat() + $quantitat);
                   return;//Aquest return s'utilitza per a finatlitzar la operació
                   //i que no continue tornar el resultat
                }
            }
            
        }

        public function mostrarCarret($llistatAnimals){
            echo "<br><code>Aquesta es la informació del carret</code>";
            var_dump($this->llistatAnimals);
            foreach ($this->llistatAnimals as $quantitat) {
                echo "<p>Romasaurus_Rex</p>";
                echo "<p>Quantitat -> ".$llistatAnimals[$quantitat]."</p><br>";
            }
        }

        public function buidarCarret(){
            unset($llistatAnimals);
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