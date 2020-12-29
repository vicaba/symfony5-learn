<?php
declare(strict_types=1);

namespace LaSalle\Film\Infrastructure\Repository;

use LaSalle\Film\Domain\Entity\Film;
use LaSalle\Film\Domain\Repository\FilmRepository;
use LaSalle\Film\Domain\ValueObject\FilmId;
use Symfony\Component\Filesystem\Filesystem;

class FilesystemFilmRepository implements FilmRepository
{
    public function __construct(private Filesystem $filesystem)
    {}

    public function saveFilm(Film $film): bool
    {
        // TODO: Implement saveFilm() method.
    }

    public function searchFilmById(FilmId $filmId): Film
    {
        // TODO: Implement searchFilmById() method.
    }
}