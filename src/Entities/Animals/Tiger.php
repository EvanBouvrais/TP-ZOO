<?php 

    final class Tiger extends TerrestrialAnimals {

        public function __construct(int $age, float $weight, float $height, bool $isHungry, bool $isAsleep, bool $isSick)
        {
            return parent::__construct($age, 'tiger', $weight, $height, $isHungry, $isAsleep, $isSick);
        }

        public function roar() {

            return "Meow";
            
        }

    }

?>