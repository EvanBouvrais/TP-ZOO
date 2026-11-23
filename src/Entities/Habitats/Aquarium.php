<?php 

    class Aquarium extends Habitat {

        ///////////////
        // Construct //
        ///////////////

        public function __construct(

            string $name,
            float $salinity,
            string $sanity = "okay"

        ) 
        {

            parent::__construct($name, $sanity);
            $this->salinity = $salinity;

        }

        //////////////////////////////
        // Variables hors construct //
        //////////////////////////////

        private float $salinity;

        /////////////////////////
        // Getters and Setters //
        /////////////////////////

        public function getSalinity(): float {

            return $this->salinity;

        }

        public function setSalinity(float $salinity): self {

            $this->salinity = $salinity;
            return $this;

        }

        //////////////
        // Methodes //
        //////////////
        
        // Vérifie que l'animal est bien un animal aquatique.
        protected function validateAnimalType(Animals $animal): void {

            if (!$animal instanceof AquaticAnimals) {

                throw new Exception("Cet aquarium ne peut accueillir que des animaux aquatiques.");
                
            }

        }

        public function maintenance(): void {

            if(count($this->animals) === 0 && $this->salinity >= 30 && $this->salinity <= 40) {

                $this->setSanity("good");

            } elseif(count($this->animals) > 0) {

                echo "videz cet habitat avant de pouvoir le laver";

            } elseif($this->salinity < 30 || $this->salinity > 40) {

                echo "le niveau de salinité n'est pas correct";

            }


        }


    }

?>