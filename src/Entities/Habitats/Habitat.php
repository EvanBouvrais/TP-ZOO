<?php 

    abstract class Habitat {
        
        ///////////////
        // Construct //
        ///////////////

        public function __construct(

            private string $name,
            private string $sanity = "okay"

        ) 
        {

        }

        //////////////////////////////
        // Variables hors construct //
        //////////////////////////////

        // Liste des animaux présents dans l'habitat
        protected array $animals = [];

        //id pour SQL
        private ?int $id = null;

        /////////////////////////
        // Getters and Setters //
        /////////////////////////

        public function getSanity(): string {

            return $this->sanity;

        }

        public function setSanity(string $sanity): self {

            $this->sanity = $sanity;
            return $this;

        }

        // compte le nombre d'animaux dans l'enclos
        public function getNumberOfAnimals(): int {

            return count($this->animals);

        }

        // Récupérer les animaux présents
        public function getAnimals(): array {

            return $this->animals;

        }

        public function getName(): string {

            return $this->name;

        }

        public function getId(): ?int {
            return $this->id;
        }

        public function setId(int $id): self {
            $this->id = $id;
            return $this;
        }

        //////////////
        // Methodes //
        //////////////

        //affiche les infos de l'habitat
        public function infoHabitat(): void {

            echo "Nom : " . $this->name . "<br>";
            echo "Propreté : " . $this->getSanity() . "<br>";
            echo "Nombre d'animaux : " . $this->getNumberOfAnimals() . "<br>";

        }

        // affiche les infos des animaux présents dans l'habitat
        public function infoAnimals(): void {

            foreach ($this->animals as $animal) {

                echo "Age : " . $animal->getAge() . "<br>";
                echo "race : " . $animal->getRace() . "<br>";
                echo "weight : " . $animal->getWeight() . "<br>";
                echo "height : " . $animal->getHeight() . "<br>";
                echo "hungry : " . $animal->getIsHungry() . "<br>";
                echo "asleep : " . $animal->getIsAsleep() . "<br>";
                echo "sick : " . $animal->getIsSick() . "<br>";

            }

        }

        // Ajouter un animal
        public function addAnimal(Animals $animal): void {

            // Vérifie que l'animal est compatible avec cet habitat.
            $this->validateAnimalType($animal);

            // Vérifie que l'habitat n'a pas atteint sa capacité maximale.
            if (count($this->animals) >= 6) {

                throw new Exception("L'habitat est plein.");

            }

            // Vérifie que l'espèce correspond aux animaux déjà présents.
            foreach ($this->animals as $existingAnimal) {

                if (get_class($existingAnimal) !== get_class($animal)) {

                    throw new Exception("Cet habitat ne peut accueillir qu'une seule espèce.");

                }

            }

            // Ajoute l'animal si toutes les conditions sont respectées.
            $this->animals[] = $animal;
        }

        // Retirer un animal
        public function removeAnimal(Animals $animal): void {

            // Recherche l'animal dans le tableau.
            $index = array_search($animal, $this->animals, true);

            // Vérifie que l'animal existe dans le tableau.
            if ($index !== false) {

                // Supprime l'animal du tableau.
                unset($this->animals[$index]);

                // Réindexe les clés du tableau des animaux
                $this->animals = array_values($this->animals);

            }

        }

        // Vérifie si l'animal correspond au type d'habitat.
        abstract protected function validateAnimalType(Animals $animal): void;

        public function maintenance(): void {

            if(count($this->animals) === 0) {

                $this->setSanity("good");

            } else {

                echo "videz cet habitat avant de pouvoir le laver";

            }

        }

    }

    

?>