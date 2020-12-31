<?php
declare(strict_types=1);

$projectDirectoryPath = $container->getParameter("kernel.project_dir");

// The parts "/var/film_db" and "/films.db" could be in the .env file to promote reusability and decoupling
$filmDatabaseDirectoryPath = "$projectDirectoryPath/var/film_db";
$filmDatabaseFilePath = "$filmDatabaseDirectoryPath/films.db";

$container->setParameter("film.database.dir", $filmDatabaseDirectoryPath);
$container->setParameter("film.database.file", $filmDatabaseFilePath);






