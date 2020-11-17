<?php
declare(strict_types=1);

namespace LaSalle\Film\Domain\ValueObject;

class FilmDirector
{
    public function __construct(private string $name,)
    {}

    public function value(): string {
        return $this->name;
    }
}