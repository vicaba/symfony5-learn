<?php
declare(strict_types=1);

namespace LaSalle\Film\Application;

use LaSalle\Film\Application\Request\GetFilmByIdRequest;
use LaSalle\Film\Domain\Entity\Film;
use LaSalle\Film\Domain\Event\FilmSearchedEvent;
use LaSalle\Film\Domain\Repository\FilmRepository;
use LaSalle\Film\Domain\Service\Notifier;
use LaSalle\Film\Domain\ValueObject\FilmId;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class GetFilmByIdUseCase
{
    public function __construct(
        private FilmRepository $filmRepository,
        private Notifier $filmNotifier,
        private EventDispatcherInterface $eventDispatcher
    ) {}

    public function __invoke(GetFilmByIdRequest $request): Film
    {
        $filmId = new FilmId($request->filmId());

        //$this->filmNotifier->notify("Someone is searching for a film");

        $this->eventDispatcher->dispatch(new FilmSearchedEvent($filmId), "film.searched");

        return $this->filmRepository->searchFilmById($filmId);
    }
}