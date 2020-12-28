<?php
declare(strict_types=1);

namespace LaSalle\App\Film\Command;

use LaSalle\Film\Application\GetFilmByIdUseCase;
use LaSalle\Film\Application\Request\GetFilmByIdRequest;
use LaSalle\Film\Infrastructure\Serialization\FilmArraySerializer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetFilmByIdCommand extends Command
{
    private const INPUT_FILM_ID = "filmId";

    private GetFilmByIdUseCase $getFilmByIdUseCase;
    private FilmArraySerializer $filmArraySerializer;

    public function __construct(GetFilmByIdUseCase $getFilmByIdUseCase, FilmArraySerializer $filmArraySerializer)
    {
        $this->getFilmByIdUseCase = $getFilmByIdUseCase;
        $this->filmArraySerializer = $filmArraySerializer;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName("getfilmbyid")
            ->addArgument(self::INPUT_FILM_ID, InputArgument::REQUIRED, "Film id");
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filmId = $input->getArgument(self::INPUT_FILM_ID);

        $film = $this->getFilmByIdUseCase->__invoke(new GetFilmByIdRequest($filmId));

        $filmAsJson = json_encode($this->filmArraySerializer->__invoke($film));

        $output->writeln($filmAsJson);

        return Command::SUCCESS;
    }
}