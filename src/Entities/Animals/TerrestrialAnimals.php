<?php 

    class TerrestrialAnimals extends Animals {

        public function __construct(int $age, string $race, float $weight, float $height, bool $isHungry, bool $isAsleep, bool $isSick)
        {
            return parent::__construct($age, $race, $weight, $height, $isHungry, $isAsleep, $isSick);
        }
        
        public function bigWalk() {

            return "Big Walking around...";

        }

    }

?>