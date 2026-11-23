<?php

    class AnimalsMapper {

        public function mapToObject(array $data): Animals {
          
            switch ($data['type']) {

                case "bear":
                    return new Bear(
                    $data['age'],
                    $data['weight'],
                    $data['height'],
                    $data['is_hungry'],
                    $data['is_asleep'],
                    $data['is_sick']
                    );
                case "tiger":
                    return new Tiger(
                    $data['age'],
                    $data['weight'],
                    $data['height'],
                    $data['is_hungry'],
                    $data['is_asleep'],
                    $data['is_sick']
                    );
                case "fish":
                    return new Fish(
                    $data['age'],
                    $data['weight'],
                    $data['height'],
                    $data['is_hungry'],
                    $data['is_asleep'],
                    $data['is_sick']
                    );
                case "eagle":
                    return new Eagle(
                    $data['age'],
                    $data['weight'],
                    $data['height'],
                    $data['is_hungry'],
                    $data['is_asleep'],
                    $data['is_sick']
                    );
                default:
                    throw new InvalidArgumentException("Type d'animal inconnu.");
                    
            }

        }


        public function mapToArray(Animals $animals): array {

            return [

                'type' => $animals->getRace(),
                'age' => $animals->getAge(),
                'weight' => $animals->getWeight(),
                'height' => $animals->getHeight(),
                'is_hungry' => $animals->getIsHungry(),
                'is_asleep' => $animals->getIsAsleep(),
                'is_sick' => $animals->getIsSick()

            ];

        }

    }

?>