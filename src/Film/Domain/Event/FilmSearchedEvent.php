<?php
declare(strict_types=1);

namespace LaSalle\Film\Domain\Event;

use LaSalle\Film\Domain\ValueObject\FilmId;

class FilmSearchedEvent
{
    public function __construct(
        private FilmId $filmId
    ) {}

    public function filmId(): FilmId
    {
        return $this->filmId;
    }
}