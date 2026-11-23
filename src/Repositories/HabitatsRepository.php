<?php
    class HabitatsRepository  {

        private HabitatsMapper $habitatsMapper;

        public function __construct(

            private PDO $db,

        ) {

            $this->habitatsMapper = new HabitatsMapper();

        }


        /**
         * Méthode qui permet de récupérer 1 habitat en fonction de son id
         */
        public function findById(int $id): Habitat
        {
            $request = $this->db->prepare(" SELECT  habitats.id AS id,
                                                    habitats.name AS name,
                                                    habitats.type AS type,
                                                    habitats.sanity AS sanity,
                                                    aquariums.salinity AS salinity,
                                                    aviaries.height AS height,
                                                    aviaries.tier AS tier
                                            FROM habitats   
                                                LEFT JOIN aquariums ON habitats.id = aquariums.habitat_id
                                                LEFT JOIN aviaries ON habitats.id = aviaries.habitat_id
                                            WHERE habitats.id = :id
            ");

            $request->execute([

                ":id" => $id

            ]);

            $habitatsData = $request->fetch(PDO::FETCH_ASSOC);

            if ($habitatsData === false) {

                throw new RuntimeException("Habitat introuvable.");

            }

            return $this->habitatsMapper->mapToObject($habitatsData);

            


        }

        /**
         * Méthode qui permet de récupérer tous les habitats
         * Retourne un tableau, remplis d'objets Habitats
         */
        public function findAll(): array {

            $request = $this->db->query("   SELECT  habitats.id AS id,
                                                    habitats.name AS name,
                                                    habitats.type AS type,
                                                    habitats.sanity AS sanity,
                                                    aquariums.salinity AS salinity,
                                                    aviaries.height AS height,
                                                    aviaries.tier AS tier
                                            FROM habitats   
                                                LEFT JOIN aquariums ON habitats.id = aquariums.habitat_id
                                                LEFT JOIN aviaries ON habitats.id = aviaries.habitat_id
            ");

            $habitatsDatas = $request->fetchAll(PDO::FETCH_ASSOC);

            $habitats = [];

            foreach ($habitatsDatas as $habitatsData) {

                $habitats[] = $this->habitatsMapper->mapToObject($habitatsData);

            }

            return $habitats;

        }

        
        // Insère un nouvel auteur en base de données
        public function insert(Habitat $habitats, int $habitatId): int|false {

            $data = $this->habitatsMapper->mapToArray($habitats);
            $stmt = $this->db->prepare("INSERT INTO habitats (habitat_id, type, age, weight, height, is_hungry, is_asleep, is_sick) 
                                                    VALUES  (:habitat_id, :type, :age, :weight, :height, :is_hungry, :is_asleep, :is_sick)");
            $success = $stmt->execute([

                ":habitat_id" => $habitatId,
                ":type" => $data['type'],
                ":age" => $data['age'],
                ":weight" => $data['weight'],
                ":height" => $data['height'],
                ":is_hungry" => $data['is_hungry'],
                ":is_asleep" => $data['is_asleep'],
                ":is_sick" => $data['is_sick']

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