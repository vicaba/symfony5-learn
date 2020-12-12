<?php
declare(strict_types=1);

namespace LaSalle\Film\Infrastructure\Serialization;

use LaSalle\Film\Domain\Entity\Film;

class FilmArraySerializer
{
    public const FILM_ID = "id";
    public const FILM_NAME = "name";
    public const FILM_DIRECTOR = "director";

    public function __invoke(Film $film): array {
        return [
            self::FILM_ID => $film->id()->value(),
            self::FILM_NAME => $film->name()->value(),
            self::FILM_DIRECTOR => $film->director()->value()
        ];
    }
}