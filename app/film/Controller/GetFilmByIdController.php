<?php
declare(strict_types=1);

namespace LaSalle\App\Film\Controller;

use LaSalle\Film\Application\GetFilmByIdUseCase;
use LaSalle\Film\Application\Request\GetFilmByIdRequest;
use LaSalle\Film\Infrastructure\Serialization\FilmArraySerializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GetFilmByIdController
{
    public function __construct(
        private GetFilmByIdUseCase $getFilmByIdUseCase,
        private FilmArraySerializer $filmArraySerializer
    )
    {}

    public function apply(string $filmId): Response
    {
        $film = $this->getFilmByIdUseCase->__invoke(new GetFilmByIdRequest($filmId));

        $serializedFilm = $this->filmArraySerializer->__invoke($film);

        $response = new JsonResponse($serializedFilm);

        return $response;
    }
}