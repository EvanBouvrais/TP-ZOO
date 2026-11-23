
///////////////////
// popup habitat //
///////////////////

    ///////////////
    // Variables //
    ///////////////

        // Récupération de tous les animaux cliquables
        const animals = document.querySelectorAll(".clickable-animal");

        // Récupération du popup
        const habitatPopup = document.querySelector("#habitat-popup");

        // Récupération de la croix
        const XPopup = document.getElementById("close-popup");

        

    ////////////////////
    // Event Listener //
    ////////////////////

        // Écoute du clic sur chaque animal
        animals.forEach(animal => {

            animal.addEventListener("click", () => {

                // Correspondance entre les animaux et les backgrounds
                const animalBackgrounds = {

                    bear: "island",
                    tiger: "island",
                    fish: "fish-island",
                    eagle: "bird-island"

                };

                // Récupération du type d'animal
                const animalType = animal.dataset.animalType;

                console.log(animalType);

                // Suppression des anciens backgrounds
                habitatPopup.classList.remove(
                    "island",
                    "fish-island",
                    "bird-island"
                );

                // Récupération du background correspondant
                const background = animalBackgrounds[animalType];

                // Ajout du nouveau background
                if (background) {
                    habitatPopup.classList.add(background);
                }

                // Affichage du popup
                habitatPopup.classList.add("active");

            });

        });

        // Écoute du clic sur la croix
        XPopup.addEventListener("click", () => {

            habitatPopup.classList.remove("active");

        });

