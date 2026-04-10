<?php

    //el declare es per a obligar a php a tipar les dades de les variables i els metodes
    declare(strict_types = 1);
    /*CLASE CARRET COMPRA*/

    include "Animal.php";

    class CarretCompra{

        //Variables de instancia i vissibilitat privada

        private string $idUsuari;
        private $llistatAnimals = [];
        
        //constructor

        public function __construct(string $idUsuari){

            $this->idUsuari = $idUsuari;

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

        public function setLlistatAnimals(string $llistatAnimals){
            $this->llistatAnimals = $llistatAnimals;
        }

        //Metodes de la clase que per ara no seran instanciats

        public function afegirAnimal($objAnimal){
            if(isset($objAnimal)){
                //Augmentar la quantitat del animal
                //$this->canviarQuantitatAnimals($id,$quantitat);
            }else{
                $llistatAnimals = array_push($objAnimal);
            }
            return $llistatAnimals;
            
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
                if($animalConcret == $id){
                    return $animalConcret;
                }
            }

            return null;
        }

        public function canviarQuantitatAnimal($id, $quantitat){
            if(isset($id)){
                
                $quantitatNova = $quantitat++;
            }
        }

        public function mostrarCarret($llistatAnimals){
            echo "Aquesta es la informació del carret";
            var_dump($llistatAnimals);
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