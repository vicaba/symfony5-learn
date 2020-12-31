<?php
declare(strict_types=1);

namespace LaSalle\Film\Application;

use LaSalle\Film\Application\Request\CreateFilmRequest;
use LaSalle\Film\Domain\Entity\Film;
use LaSalle\Film\Domain\Repository\FilmRepository;
use LaSalle\Film\Domain\ValueObject\FilmDirector;
use LaSalle\Film\Domain\ValueObject\FilmId;
use LaSalle\Film\Domain\ValueObject\FilmName;

class CreateFilmUseCase
{
    public function __construct(
        private FilmRepository $filmRepository
    ) {}

    public function __invoke(CreateFilmRequest $request): bool
    {
        $film = $this->createFilmFromPrimitives($request->id(), $request->name(), $request->director());

        return $this->filmRepository->saveFilm($film);
    }

    private function createFilmFromPrimitives(string $filmId, string $filmName, string $filmDirector)
    {
        return Film::create(
            new FilmId($filmId),
            new FilmName($filmName),
            new FilmDirector($filmDirector)
        );
    }
}