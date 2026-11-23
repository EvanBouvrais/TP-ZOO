<?php

require_once "../utils/autoloader.php";
require_once "../utils/db_connect.php";



?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/hub.css">
    <link rel="stylesheet" href="../styles/style.css">
    
</head>


<body class="bodysize">
    
    <main class="bluesky">

        <?php 
            include "../partials/hub/main/clickable-images.php";
        ?>
        
    </main>

    <section class="pop-up habitat" id="habitat-popup">

        <div class="popup-content">

            <button class="close-popup" id="close-popup">X</button>

            <h2 id="animal-name"></h2>

            <div class="animal-grid" id="animal-grid">

                <?php
                // Récupère les animaux de l'habitat sélectionné.
                $Animals = $habitat->getAnimals();

                // Génère les cartes pour les animaux présents.
                foreach($Animals as $Animal) : 
                ?>

                    <!-- Carte d'animaux présents -->
                    <div class="animal-card">

                        <p>Age : <?= $Animal->getAge() ?></p>
                        <p>Race : <?= $Animal->getRace() ?></p>
                        <p>Poid : <?= $Animal->getWeight() ?></p>
                        <p>Taille : <?= $Animal->getHeight() ?></p>

                    </div>

                <?php endforeach; ?>

                    <?php for ($i = count($Animals); $i < 6; $i++): ?>

                        <div class="animal-card"></div>

                    <?php endfor; ?>



            </div>

        </div>

    </section>


    <footer class="redinfo">

        <?php 
            include "../partials/hub/footer/red-employee.php";
        ?>



    </footer>


    <script src="../scripts/script.js" defer></script>

</body>
</html>