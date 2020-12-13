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

}