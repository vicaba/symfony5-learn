<?php
declare(strict_types=1);

namespace LaSalle\Film\Application\Request;

class CreateFilmRequest
{
    public function __construct(
        private string $id,
        private string $name,
        private string $director
    ) {}

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function director(): string
    {
        return $this->director;
    }
}