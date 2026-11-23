<?php 

    class Aviary extends Habitat {

        ///////////////
        // Construct //
        ///////////////

        public function __construct(

            string $name,
            int $height = 2,
            int $tier = 1,
            string $sanity = "okay"

        ) 
        {

            parent::__construct($name, $sanity);
            $this->height = $height;
            $this->tier = $tier;

        }

        //////////////////////////////
        // Variables hors construct //
        //////////////////////////////

        private int $height;
        private int $tier;


        /////////////////////////
        // Getters and Setters //
        /////////////////////////

        public function getHeight(): int {

            return $this->height;

        }

        public function setHeight(int $height): self {

            $this->height = $height;
            return $this;

        }

        public function getTier(): int {

            return $this->tier;

        }

        public function setTier(int $tier): self {

            $this->tier = $tier;
            return $this;

        }

        //////////////
        // Methodes //
        //////////////

        // Vérifie que l'animal est bien un animal volant.
        protected function validateAnimalType(Animals $animal): void {

            if (!$animal instanceof FlyingAnimals) {

                throw new Exception("Cette volière ne peut accueillir que des animaux volants.");

            }

        }

        // Système de tier pour ajouter les oiseaux
        public function addAnimal(Animals $animal): void {

            if(count($this->animals) === 2 && $this->tier === 1) {

                throw new Exception("Améliorez votre volière au niveau 2 avant de pouvoir ajouter d'autres animaux");

            } elseif(count($this->animals) === 4 && $this->tier <= 2 ) {

                throw new Exception("Améliorez votre volière au niveau 3 avant de pouvoir ajouter d'autres animaux");

            }

            parent::addAnimal($animal);

        }

    }

?>