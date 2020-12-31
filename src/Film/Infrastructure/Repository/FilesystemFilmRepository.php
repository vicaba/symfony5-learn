<?php
declare(strict_types=1);

namespace LaSalle\Film\Infrastructure\Repository;

use LaSalle\Film\Domain\Entity\Film;
use LaSalle\Film\Domain\Repository\FilmRepository;
use LaSalle\Film\Domain\ValueObject\FilmDirector;
use LaSalle\Film\Domain\ValueObject\FilmId;
use LaSalle\Film\Domain\ValueObject\FilmName;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\File;

class FilesystemFilmRepository implements FilmRepository
{
    public function __construct(
        private string $databaseDirectoryPath,
        private string $databaseFilePath,
        private Filesystem $filesystem
    ) {}

    public function saveFilm(Film $film): bool
    {
        $db = $this->getDatabase();

        $db[] = $film;

        return $this->saveDatabase($db);
    }

    public function searchFilmById(FilmId $filmId): Film
    {
        var_dump($this->getDatabase());
    }

    public function count(): int
    {
        return count($this->getDatabase());
    }

    public function updateSearchCount(): void
    {
        $searchedFilmsCountFilePath = "$this->databaseDirectoryPath/count.txt";

        if (!$this->filesystem->exists($searchedFilmsCountFilePath)) {
            $this->filesystem->touch($searchedFilmsCountFilePath);
            $this->filesystem->appendToFile($searchedFilmsCountFilePath, serialize(0));
        }

        $searchedFilmsCountFile = new File($searchedFilmsCountFilePath);

        $searchedFilmsCount = (int) unserialize($searchedFilmsCountFile->getContent());

        $this->filesystem->remove($searchedFilmsCountFilePath);

        $this->filesystem->touch($this->databaseFilePath);
        $this->filesystem->appendToFile($searchedFilmsCountFilePath, serialize($searchedFilmsCount + 1));
    }

    private function getFilmDatabaseFile(): File
    {
        return new File($this->databaseFilePath);
    }

    private function getDatabase(): array
    {
        $filmDbFile = $this->getFilmDatabaseFile();

        $films = unserialize($filmDbFile->getContent());

        if ($films == false) {
            return [];
        }

        return $films;
    }

    private function saveDatabase(array $db): bool
    {
        $this->filesystem->remove($this->databaseFilePath);

        $this->filesystem->touch($this->databaseFilePath);
        $this->filesystem->appendToFile($this->databaseFilePath, serialize($db));

        return true;
    }
}