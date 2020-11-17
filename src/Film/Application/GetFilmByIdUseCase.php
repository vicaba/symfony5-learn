<?php
declare(strict_types=1);

namespace LaSalle\Film\Application;

use LaSalle\Film\Application\Request\GetFilmByIdRequest;
use LaSalle\Film\Domain\Entity\Film;
use LaSalle\Film\Domain\Repository\FilmRepository;
use LaSalle\Film\Domain\ValueObject\FilmId;

class GetFilmByIdUseCase
{
    public function __construct(private FilmRepository $filmRepository)
    {}

    public function __invoke(GetFilmByIdRequest $request): Film
    {
        $filmId = new FilmId($request->filmId());

        return $this->filmRepository->searchFilmById($filmId);
    }
}