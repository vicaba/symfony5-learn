<?php
declare(strict_types=1);

namespace LaSalle\Film\Domain\Entity;

use LaSalle\Film\Domain\ValueObject\FilmDirector;
use LaSalle\Film\Domain\ValueObject\FilmId;
use LaSalle\Film\Domain\ValueObject\FilmName;

class Film
{
    private function __construct(
        private FilmId $id,
        private FilmName $name,
        private FilmDirector $director
    ) {}

    public static function create(
        FilmId $filmId,
        FilmName $filmName,
        FilmDirector $filmDirector
    ): Film
    {
        return new Film($filmId, $filmName, $filmDirector);
    }

    public function id(): FilmId
    {
        return $this->id;
    }

    public function name(): FilmName
    {
        return $this->name;
    }

    public function director(): FilmDirector
    {
        return $this->director;
    }



}