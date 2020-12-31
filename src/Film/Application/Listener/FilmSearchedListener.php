<?php
declare(strict_types=1);

namespace LaSalle\Film\Application\Listener;

use LaSalle\Film\Domain\Event\FilmSearchedEvent;
use LaSalle\Film\Domain\Repository\FilmRepository;

class FilmSearchedListener
{
    public function __construct(
        private FilmRepository $filmRepository
    )
    {}

    public function onFilmSearched(FilmSearchedEvent $filmSearchedEvent)
    {
        $this->filmRepository->updateSearchCount();
    }
}