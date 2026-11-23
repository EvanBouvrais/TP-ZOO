<?php

    spl_autoload_register(function ($className) {

        // Définir le dossier de base du projet
        $baseDir = __DIR__ . '/../src/';

        // Déterminer le répertoire en fonction du suffixe du nom de la classe
        switch (true) {
            case substr($className, -10) === 'Repository':
                $directory = 'Repositories';
                break;

            case substr($className, -7) === 'Manager':
                $directory = 'Managers';
                break;

            case substr($className, -6) === 'Mapper':
                $directory = 'Mappers';
                break;

            default:
                $directory = 'Entities';
                break;
        }

        // Construire le chemin du répertoire à explorer
        $directoryPath = $baseDir . $directory;

        // Vérifier que le répertoire existe
        if (!is_dir($directoryPath)) {
            return;
        }

        // Pour les classes autres que les Entities,
        // rechercher directement dans leur dossier respectif
        if ($directory !== 'Entities') {

            $file = $directoryPath . '/' . $className . '.php';

            if (file_exists($file)) {
                require_once $file;
            }

            return;
        }

        // Parcourir récursivement les sous-dossiers de Entities
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator(
                $directoryPath,
                FilesystemIterator::SKIP_DOTS
            )
        );

        // Rechercher le fichier correspondant au nom de la classe
        foreach ($iterator as $file) {

            if ($file->isFile() && $file->getFilename() === $className . '.php') {
                require_once $file->getPathname();
                return;
            }
        }

    });

?>
