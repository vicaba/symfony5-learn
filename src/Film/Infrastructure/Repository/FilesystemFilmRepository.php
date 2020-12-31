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
        $this->updateSearchCount();

        return Film::create(
            $filmId,
            new FilmName("Star Wars"),
            new FilmDirector("George Lucas")
        );
    }

    public function count(): int
    {
        return count($this->getDatabase());
    }

    private function updateSearchCount(): void
    {
        // Your code here
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