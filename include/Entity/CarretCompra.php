<?php

    //el declare es per a obligar a php a tipar les dades de les variables i els metodes
    declare(strict_types = 1);
    /*CLASE CARRET COMPRA*/

    //include "Animal.php";

    class CarretCompra{

        //Variables de instancia i vissibilitat privada

        private string $idUsuari;
        private $llistatAnimals = null;
        
        //constructor

        public function __construct(string $idUsuari){

            $this->idUsuari = $idUsuari;
            $this->llistatAnimals = [];
    
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
            foreach ($this->llistatAnimals as $id) {
                array_pop($this->llistatAnimals);
                //echo "El animal amb id -> ".$id." ha sigut eliminat correctament";
            }
            
        }

        public function getAnimal($id){
            
            foreach($this->llistatAnimals as $animal){
                if($animal->getId() === $id){
                    $animalConcret = $animal->getId();
                    return $animalConcret;
                }
            }
            return null;
        }

        /*Métode per a acumular la quantitat de animal existensts*/

        public function acumularQuantitatAnimal($id, $quantitat){

            //$quantitatParcial = 0;
            //comprobem que e ens passen es el mateix
           
            foreach ($this->llistatAnimals as $animal) {
                    
                    if ($animal->getId() === $id) {
                        $quantitatNova = $animal->getQuantitat();
                        $quantitatTotal = $animal->setQuantitat($quantitat + $quantitatNova);

                        return $quantitatTotal;
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
                   $animal->setQuantitat($quantitat);
                   return;//Aquest return s'utilitza per a finatlitzar la operació
                   //i que no continue tornar el resultat
                }
            }
            
        }

        public function mostrarCarret(){
            echo "<br><code>Aquesta es la informació del carret</code><br>";
            //var_dump($this->llistatAnimals);
            

            foreach ($this->llistatAnimals as $parametre) {
                echo "<div class='lime'>";
                echo "<form action='./include/canviarQuantitat.php' method=''>";
                echo "<ul>";
                echo "<li><p>ID => ".$parametre->getId()."<a href='./include/eliminaAnimalCarret.php' rel='nofollow'><img src='./img/delete_delete_exit_1577.png' width='15' alt='delete' title='delete' type='img/png'></a></p></li></br>";
                echo "<li><p>Nom => ".$parametre->getNomComu()."</p></li></br>";
                echo "<li><p>Quantitat => ".$parametre->getQuantitat()."</p></li><br>";
                echo "<li><p>Donació => ".$parametre->getDonacio()."</p></li><br>";
                echo "<li><strong style='color: darkblue'>Quantitat: </strong><input type='number' name='canviaQuantitat' min='1' size='5'><input type='submit' value='Canviar quantitat'><br></li><br>";
                echo "</ul>";
                echo "</form>";
                echo "</div>";
                
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