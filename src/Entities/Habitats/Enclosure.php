<?php 

    class Enclosure extends Habitat {
        
        // Vérifie que l'animal est bien un animal terrestre.
        protected function validateAnimalType(Animals $animal): void {

            if (!$animal instanceof TerrestrialAnimals) {

                throw new Exception("Cet enclos ne peut accueillir que des animaux terrestres.");
                
            }

        }

    }

?>