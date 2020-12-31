<?php
declare(strict_types=1);

namespace LaSalle\Film\Domain\Repository;

use LaSalle\Film\Domain\Entity\Film;
use LaSalle\Film\Domain\ValueObject\FilmId;

interface FilmRepository
{
    public function saveFilm(Film $film): bool;

    public function searchFilmById(FilmId $filmId): Film;

    public function count(): int;
}