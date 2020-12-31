<?php
declare(strict_types=1);

namespace LaSalle\Film\Infrastructure\Repository;

use LaSalle\Film\Domain\Entity\Film;
use LaSalle\Film\Domain\Repository\FilmRepository;
use LaSalle\Film\Domain\ValueObject\FilmDirector;
use LaSalle\Film\Domain\ValueObject\FilmId;
use LaSalle\Film\Domain\ValueObject\FilmName;

class InMemoryFilmRepository implements FilmRepository
{
    public function saveFilm(Film $film): bool
    {
        // TODO: Implement saveFilm() method.
    }

    // Just for testing purposes
    public function searchFilmById(FilmId $filmId): Film
    {
        return Film::create(
            $filmId,
            new FilmName("Star Wars"),
            new FilmDirector("George Lucas")
        );
    }

    public function count(): int
    {
        // TODO: Implement count() method.
    }
}