<?php

    class HabitatsMapper {

        public function mapToObject(array $data): Habitat {

            switch ($data['type']) {

                case "bear":
                case "tiger":
                    $habitat = new Enclosure($data['name'], $data['sanity']);
                    break;

                case "fish":
                    $habitat = new Aquarium($data['name'], $data['salinity'], $data['sanity']);
                    break;

                case "eagle":
                    $habitat = new Aviary($data['name'], $data['height'], $data['tier'], $data['sanity']);
                    break;

                default:
                    throw new InvalidArgumentException("Type d'habitat inconnu.");
            }

            // On conserve l'identifiant provenant de la BDD.
            $habitat->setId((int) $data['id']);

            return $habitat;
        }


        public function mapToArray(Habitat $Habitat): array {

            // Propriétés communes à tous les habitats.
            $data = [

                'name' => $Habitat->getName(),
                'sanity' => $Habitat->getSanity()

            ];

            // Propriétés propres aux aquariums.
            if ($Habitat instanceof Aquarium) {

                $data['salinity'] = $Habitat->getSalinity();

            // Propriétés propres aux volières.
            } elseif ($Habitat instanceof Aviary) {

                $data['tier'] = $Habitat->getTier();
                $data['height'] = $Habitat->getHeight();

            }

            return $data;

            

        }

    }

?>