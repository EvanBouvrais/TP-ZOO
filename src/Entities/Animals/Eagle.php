<?php 

    final class Eagle extends FlyingAnimals {

        public function __construct(int $age, float $weight, float $height, bool $isHungry, bool $isAsleep, bool $isSick) {

            return parent::__construct($age, 'eagle', $weight, $height, $isHungry, $isAsleep, $isSick);

        }

        public function fly() {

            return "Big Flight";
            
        }

        public function roar() {
            return "AAAAAAA !";
        }

    }

?>