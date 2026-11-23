<?php

    require_once __DIR__ . "/utils/autoloader.php";
    require_once __DIR__ . "/utils/db_connect.php";

    $habitatsRepository = new HabitatsRepository($db);
    $animalsRepository = new AnimalsRepository($db);

    // Récupérer l'habitat numéro 1
    $habitat = $habitatsRepository->findById(1);

    // Récupérer les animaux de cet habitat
    $animals = $animalsRepository->findByHabitatId($habitat->getId());

    // Ajouter les animaux à l'habitat
    foreach ($animals as $animal) {

        $habitat->addAnimal($animal);
        
    }

    // Afficher les informations
    echo $habitat->getName() . "<br>";
    echo "Nombre d'animaux : " . $habitat->getNumberOfAnimals() . "<br>";

    foreach ($habitat->getAnimals() as $animal) {
        echo $animal->getRace() . " - ";
        echo $animal->getAge() . " ans<br>";
    }

?>


<?php

    //////////////////////////////////////////////
    // Test  récupération des données d'un ours //
    //////////////////////////////////////////////

    // require_once __DIR__ . "/utils/autoloader.php";
    // require_once __DIR__ . "/utils/db_connect.php";

    // $animalsRepository = new AnimalsRepository($db);

    // $animals = $animalsRepository->findByHabitatId(1);

    // foreach ($animals as $animal) {
    //     echo $animal->getRace() . "<br>";
    //     echo $animal->getAge() . "<br>";
    // }

?>

<?php

    //////////////////////////////////////////////
    // Test l'ajout d'un ours en base de donnée //
    //////////////////////////////////////////////

    // require_once __DIR__ . "/utils/autoloader.php";
    // require_once __DIR__ . "/utils/db_connect.php";

    // $animalsRepository = new AnimalsRepository($db);

    // // Créer un ours
    // $bear = new Bear(5, 150.0, 1.8, false, false, false);

    // // L'enregistrer dans l'habitat numéro 1
    // $animalId = $animalsRepository->insert($bear, 1);

    // echo "Animal enregistré avec l'ID : " . $animalId;

?>

<?php

    ////////////////////////////
    // Test findByHabitatId() //
    ////////////////////////////

    // require_once __DIR__ . "/utils/autoloader.php";
    // require_once __DIR__ . "/utils/db_connect.php";

    // $animalsRepository = new AnimalsRepository($db);

    // $animals = $animalsRepository->findByHabitatId(3);

    // foreach ($animals as $animal) {
    //     echo $animal->getRace() . "<br>";
    // }

?>

<?php

    /////////////////////
    // Test findById() //
    /////////////////////

    // require_once __DIR__ . "/utils/autoloader.php";
    // require_once __DIR__ . "/utils/db_connect.php";

    // $habitatsRepository = new HabitatsRepository($db);

    // // Récupérer l'habitat dont l'identifiant est 3
    // $habitat = $habitatsRepository->findById(3);

    // // Afficher son nom
    // echo $habitat->getName();

?>


<?php

    ////////////////////
    // Test FindAll() //
    ////////////////////

    // require_once __DIR__ . "/utils/autoloader.php";
    // require_once __DIR__ . "/utils/db_connect.php";

    // // Création du repository
    // $habitatsRepository = new HabitatsRepository($db);

    // // Récupération de tous les habitats
    // $habitats = $habitatsRepository->findAll();

    // // Affichage des résultats
    // foreach ($habitats as $habitat) {

    //     echo $habitat->getName() . "<br>";

    // }

?>

<?php

    ////////////////////
    // Test FindAll() //
    ////////////////////

    // require_once "utils/autoloader.php";

    // // Création d'un enclos.
    // $enclosure = new Enclosure();

    // // Création d'un ours.
    // $bear = new Bear(
    //     5,
    //     150.0,
    //     1.5,
    //     true,
    //     false,
    //     false
    // );

    // $bear2 = new Bear(
    //     5,
    //     150.0,
    //     1.5,
    //     true,
    //     false,
    //     false
    // );

    // $bear3 = new Bear(
    //     5,
    //     150.0,
    //     1.5,
    //     true,
    //     false,
    //     false
    // );

    // $bear4 = new Bear(
    //     5,
    //     150.0,
    //     1.5,
    //     true,
    //     false,
    //     false
    // );

    // $bear5 = new Bear(
    //     5,
    //     150.0,
    //     1.5,
    //     true,
    //     false,
    //     false
    // );

    // $bear6 = new Bear(
    //     5,
    //     150.0,
    //     1.5,
    //     true,
    //     false,
    //     false
    // );

    // $bear7 = new Bear(
    //     5,
    //     150.0,
    //     1.5,
    //     true,
    //     false,
    //     false
    // );

    // // Ajout de l'ours dans l'enclos.

    // try {
    //     $enclosure->addAnimal($bear);
    //     $enclosure->addAnimal($bear2);
    //     $enclosure->addAnimal($bear3);
    //     $enclosure->addAnimal($bear4);
    //     $enclosure->addAnimal($bear5);
    //     $enclosure->addAnimal($bear6);
    //     $enclosure->addAnimal($bear7);
    // } catch (Exception $e) {
    //     echo $e->getMessage();
    // }

    // // retrait de l'ours dans l'enclos.

    // // Affichage des animaux présents.
    // var_dump($enclosure->getAnimals());



?>