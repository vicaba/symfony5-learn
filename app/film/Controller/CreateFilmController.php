<?php
declare(strict_types=1);

namespace LaSalle\App\Film\Controller;

use LaSalle\Film\Application\CreateFilmUseCase;
use LaSalle\Film\Application\Request\CreateFilmRequest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;

class CreateFilmController
{
    public function __construct(
        private MessageBusInterface $bus
    )
    {}

    public function apply(Request $request): Response
    {
        $propertyArray = json_decode($request->getContent(), true);

        $filmId = $propertyArray["id"];
        $filmName = $propertyArray["name"];
        $filmDirector = $propertyArray["director"];

        $this->bus->dispatch(new CreateFilmRequest($filmId, $filmName, $filmDirector));

        $response = new Response();
        $response->setStatusCode(Response::HTTP_ACCEPTED);

        return $response;
    }
}