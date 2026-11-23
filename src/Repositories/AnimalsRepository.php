<?php

    class AnimalsRepository  {

        private AnimalsMapper $animalsMapper;

        public function __construct(

            private PDO $db,

        ) {

            $this->animalsMapper = new AnimalsMapper();

        }


        /**
         * Méthode qui permet de récupérer 1 animal en fonction de son id
         */
        public function findById(int $id): Animals
        {
            $request = $this->db->prepare("SELECT * FROM animals WHERE id = :id");
            $request->execute([

                ":id" => $id

            ]);

            $animalData = $request->fetch(PDO::FETCH_ASSOC);

            if ($animalData === false) {
                throw new RuntimeException("Animal introuvable.");
            }

            return $this->animalsMapper->mapToObject($animalData);

            


        }

        /**
         * Méthode qui permet de récupérer tous les animaux
         * appartenant à un habitat spécifique.
         *
         * Retourne un tableau rempli d'objets Animals.
         */
        public function findByHabitatId(int $habitatId): array {

            $request = $this->db->prepare(

                "SELECT * FROM animals WHERE habitat_id = :habitat_id"

            );

            $request->execute([

                ":habitat_id" => $habitatId

            ]);

            $animalsDatas = $request->fetchAll(PDO::FETCH_ASSOC);

            $animals = [];

            foreach ($animalsDatas as $animalsData) {

                $animals[] = $this->animalsMapper->mapToObject($animalsData);

            }

            return $animals;

        }

        /**
         * Méthode qui permet de récupérer tous les animaux
         * Retourne un tableau, remplis d'objets Animals
         */
        public function findAll(): array {

            $request = $this->db->query("SELECT * FROM animals");

            $animalsDatas = $request->fetchAll(PDO::FETCH_ASSOC);

            $animals = [];

            foreach ($animalsDatas as $animalsData) {
                $animals[] = $this->animalsMapper->mapToObject($animalsData);
            }

            return $animals;

        }

        
        // Insère un nouvel auteur en base de données
        public function insert(Animals $animals, int $habitatId): int|false {

            $data = $this->animalsMapper->mapToArray($animals);
            $stmt = $this->db->prepare("INSERT INTO animals (habitat_id, type, age, weight, height, is_hungry, is_asleep, is_sick) 
                                                    VALUES  (:habitat_id, :type, :age, :weight, :height, :is_hungry, :is_asleep, :is_sick)");
            $success = $stmt->execute([

                ":habitat_id" => $habitatId,
                ":type" => $data['type'],
                ":age" => $data['age'],
                ":weight" => $data['weight'],
                ":height" => $data['height'],
                ":is_hungry" => (int) $data['is_hungry'],
                ":is_asleep" => (int) $data['is_asleep'],
                ":is_sick" => (int) $data['is_sick']

            ]);

            // if ($success === true) {
            //     return $this->db->lastInsertId();
            // } else {
            //     return false;
            // }

            return $success ? (int) $this->db->lastInsertId() : false;

        }

    }

?>