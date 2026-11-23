<?php 

    final class Fish extends AquaticAnimals {

        public function __construct(int $age, float $weight, float $height, bool $isHungry, bool $isAsleep, bool $isSick)
        {
            return parent::__construct($age, 'fish', $weight, $height, $isHungry, $isAsleep, $isSick);
        }
        
        public function swim() {

            return "Swimming!";

        }

        public function roar() {

            return "Bloup Bloup !";

        }
        
    }

?>