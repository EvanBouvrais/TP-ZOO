<?php

    try {
        $dsn = "mysql:HOST=localhost;dbname=zoo";
        $user = "root";
        $password = "";

        $db = new PDO($dsn, $user, $password);
    } catch (\PDOException $error) {
        header("location: ../public/home.php?error=connexion");
        exit;
    }

?>