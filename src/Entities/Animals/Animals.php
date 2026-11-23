<?php

    abstract class Animals {

        ///////////////
        // Construct //
        ///////////////

        public function __construct(

            private int $age,
            private string $race,
            private float $weight,
            private float $height,
            private bool $isHungry,
            private bool $isAsleep,
            private bool $isSick

        )
        {

        }

        /////////////////////////
        // Getters and Setters //
        /////////////////////////

        public function getAge(): int {

            return $this->age;

        }

        public function setAge(int $age): self {

            $this->age = $age;
            return $this;

        }

        public function getRace(): string {

            return $this->race;

        }

        public function setRace(string $race): self {

            $this->race = $race;
            return $this;

        }

        public function getWeight(): float {

            return $this->weight;

        }

        public function setWeight(float $weight): self {

            $this->weight = $weight;
            return $this;

        }

        public function getHeight(): float {

            return $this->height;

        }

        public function setHeight(float $height): self {

            $this->height = $height;
            return $this;

        }

        public function getIsHungry(): bool {

            return $this->isHungry;

        }

        public function setIsHungry(bool $isHungry): self {

            $this->isHungry = $isHungry;
            return $this;

        }

        public function getIsAsleep(): bool {

            return $this->isAsleep;

        }

        public function setIsAsleep(bool $isAsleep): self {

            $this->isAsleep = $isAsleep;
            return $this;

        }

        public function getIsSick(): bool {

            return $this->isSick;

        }

        public function setIsSick(bool $isSick): self {

            $this->isSick = $isSick;
            return $this;

        }

    }

?>